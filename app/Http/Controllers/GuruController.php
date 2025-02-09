<?php

namespace App\Http\Controllers;

use App\Models\Download;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Ambil input tanggal dan bulan dari request
        $tanggal = $request->input('tanggal');
        $bulan = $request->input('bulan');

        // Validasi input tanggal dan bulan
        if ($tanggal && !strtotime($tanggal)) {
            return response()->json(['error' => 'Format tanggal tidak valid'], 400);
        }
        if ($bulan && !preg_match('/^\d{4}-\d{2}$/', $bulan)) { // Format harus YYYY-MM
            return response()->json(['error' => 'Format bulan tidak valid'], 400);
        }

        // Ambil semua pengguna dengan level "ortu"
        $users = DB::table('users')->where('level', 2)->get();

        // Ambil pengguna yang sudah mendownload
        $downloadedUsers = DB::table('downloads')
            ->join('users', 'downloads.user_id', '=', 'users.id')
            ->select('users.id', 'users.name')
            ->distinct()
            ->when($tanggal, function ($query, $tanggal) {
                return $query->whereDate('downloads.tanggal', $tanggal);
            })
            ->when($bulan, function ($query, $bulan) {
                return $query->whereMonth('downloads.tanggal', Carbon::createFromFormat('Y-m', $bulan)->month)
                    ->whereYear('downloads.tanggal', Carbon::createFromFormat('Y-m', $bulan)->year);
            })
            ->get();

        // Identifikasi pengguna yang belum mendownload
        $downloadedUserIds = $downloadedUsers->pluck('id')->toArray();
        $notDownloadedUsers = $users->reject(function ($user) use ($downloadedUserIds) {
            return in_array($user->id, $downloadedUserIds);
        });

        // Grafik jumlah download per hari dalam bulan
        $dailyDownloadData = [];
        if ($bulan) {
            $daysInMonth = Carbon::createFromFormat('Y-m', $bulan)->daysInMonth;
            for ($day = 1; $day <= $daysInMonth; $day++) {
                $date = Carbon::createFromFormat('Y-m-d', "{$bulan}-" . str_pad($day, 2, '0', STR_PAD_LEFT));

                $downloadCount = DB::table('downloads')
                    ->whereDate('tanggal', $date)
                    ->count();

                $dailyDownloadData[] = [
                    'tanggal' => $date->format('Y-m-d'),
                    'jumlah' => $downloadCount
                ];
            }
        }

        // Hitung jumlah user level "ortu" yang login
        $jumlahUserLevel2 = DB::table('users')
            ->where('level', 2)
            ->when($tanggal, function ($query, $tanggal) {
                return $query->whereDate('last_login', $tanggal);
            })
            ->when($bulan, function ($query, $bulan) {
                return $query->whereMonth('last_login', Carbon::createFromFormat('Y-m', $bulan)->month)
                    ->whereYear('last_login', Carbon::createFromFormat('Y-m', $bulan)->year);
            })
            ->count();

        // Data untuk "Welcome Mood"
        $totalWelcome = DB::table('welcomes')
            ->when($tanggal, function ($query, $tanggal) {
                return $query->whereDate('tanggal', Carbon::parse($tanggal)->toDateString());
            })
            ->when($bulan, function ($query, $bulan) {
                return $query->whereMonth('tanggal', Carbon::parse($bulan)->month)
                    ->whereYear('tanggal', Carbon::parse($bulan)->year);
            })
            ->count();

        $welcomeData = DB::table('welcomes')
            ->select('keterangan', DB::raw('count(*) as count'))
            ->when($tanggal, function ($query, $tanggal) {
                return $query->whereDate('tanggal', Carbon::parse($tanggal)->toDateString());
            })
            ->when($bulan, function ($query, $bulan) {
                return $query->whereMonth('tanggal', Carbon::parse($bulan)->month)
                    ->whereYear('tanggal', Carbon::parse($bulan)->year);
            })
            ->groupBy('keterangan')
            ->get();

        $persentaseWelcome = $welcomeData->mapWithKeys(function ($item) use ($totalWelcome) {
            return [$item->keterangan => $totalWelcome > 0 ? ($item->count / $totalWelcome) * 100 : 0];
        });

        // Data untuk "Recalling"
        $totalRecalling = DB::table('recallings')
            ->when($tanggal, function ($query, $tanggal) {
                return $query->whereDate('tanggal', Carbon::parse($tanggal)->toDateString());
            })
            ->when($bulan, function ($query, $bulan) {
                return $query->whereMonth('tanggal', Carbon::parse($bulan)->month)
                    ->whereYear('tanggal', Carbon::parse($bulan)->year);
            })
            ->count();

        $recallingData = DB::table('recallings')
            ->select('keterangan', DB::raw('count(*) as count'))
            ->when($tanggal, function ($query, $tanggal) {
                return $query->whereDate('tanggal', Carbon::parse($tanggal)->toDateString());
            })
            ->when($bulan, function ($query, $bulan) {
                return $query->whereMonth('tanggal', Carbon::parse($bulan)->month)
                    ->whereYear('tanggal', Carbon::parse($bulan)->year);
            })
            ->groupBy('keterangan')
            ->get();

        $persentaseRecalling = $recallingData->mapWithKeys(function ($item) use ($totalRecalling) {
            return [$item->keterangan => $totalRecalling > 0 ? ($item->count / $totalRecalling) * 100 : 0];
        });

        // Hitung tingkat keberhasilan
        $statusKeberhasilan = [];
        foreach (['Happy', 'Neutral', 'Sad'] as $key) {
            $welcomeValue = $persentaseWelcome[$key] ?? 0;
            $recallingValue = $persentaseRecalling[$key] ?? 0;

            if ($recallingValue > $welcomeValue) {
                $statusKeberhasilan[$key] = 'increase';
            } elseif ($recallingValue < $welcomeValue) {
                $statusKeberhasilan[$key] = 'decrease';
            } else {
                $statusKeberhasilan[$key] = 'equal';
            }
        }

        return view('guru', compact(
            'tanggal',
            'bulan',
            'downloadedUsers',
            'notDownloadedUsers',
            'jumlahUserLevel2',
            'persentaseWelcome',
            'persentaseRecalling',
            'statusKeberhasilan',
            'dailyDownloadData' // Tambahkan data grafik ke view
        ));
    }

    public function sendNotification(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User tidak ditemukan'], 404);
        }

        // Ambil tanggal dari inputan form atau gunakan tanggal yang diterima dari parameter request
        $tanggal = $request->input('tanggal', Carbon::today()->toDateString());

        // Hapus notifikasi sebelumnya yang belum dibaca
        Notification::where('user_id', $user->id)
            ->where('is_read', false)
            ->delete();

        // Simpan notifikasi baru dengan pesan yang berisi tanggal
        Notification::create([
            'user_id' => $user->id,
            'message' => "Harap melihat laporan tanggal {$tanggal}",
            'is_read' => false
        ]);

        return response()->json(['message' => 'Notifikasi berhasil dikirim']);
    }

    public function kindergarten()
    {
        return view('guru.kindergarten');
    }

    public function playgroup()
    {
        return view('guru.playgroup');
    }

    public function babycamp()
    {
        return view('guru.babycamp');
    }
}
