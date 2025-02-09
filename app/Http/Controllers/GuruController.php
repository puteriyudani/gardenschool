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
        // Ambil tanggal dari input atau gunakan hari ini sebagai default
        $tanggal = $request->input('tanggal', Carbon::today()->toDateString());

        // Ambil semua pengguna dengan level "ortu"
        $users = DB::table('users')
            ->where('level', 2) // Hanya pengguna dengan level "ortu"
            ->get();

        // Ambil data pengguna yang telah mendownload berdasarkan tanggal yang dipilih
        $downloadedUsers = DB::table('downloads')
            ->join('users', 'downloads.user_id', '=', 'users.id')
            ->select('users.id', 'users.name')
            ->whereDate('downloads.tanggal', $tanggal)
            ->groupBy('users.id', 'users.name')
            ->get();

        // Identifikasi pengguna yang belum mendownload
        $downloadedUserIds = $downloadedUsers->pluck('id')->toArray();
        $notDownloadedUsers = $users->reject(function ($user) use ($downloadedUserIds) {
            return in_array($user->id, $downloadedUserIds);
        });

        // Hitung jumlah user level "ortu" yang login hari ini
        $jumlahUserLevel2 = DB::table('users')
            ->where('level', 2)
            ->whereDate('last_login', Carbon::today()->toDateString())
            ->count();

        // Data untuk "Welcome Mood"
        $totalWelcome = DB::table('welcomes')
            ->whereDate('tanggal', $tanggal)
            ->count();

        $welcomeData = DB::table('welcomes')
            ->select('keterangan', DB::raw('count(*) as count'))
            ->whereDate('tanggal', $tanggal)
            ->groupBy('keterangan')
            ->get();

        $persentaseWelcome = $welcomeData->mapWithKeys(function ($item) use ($totalWelcome) {
            return [$item->keterangan => $totalWelcome > 0 ? ($item->count / $totalWelcome) * 100 : 0];
        });

        // Data untuk "Recalling"
        $totalRecalling = DB::table('recallings')
            ->whereDate('tanggal', $tanggal)
            ->count();

        $recallingData = DB::table('recallings')
            ->select('keterangan', DB::raw('count(*) as count'))
            ->whereDate('tanggal', $tanggal)
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
            'downloadedUsers',
            'notDownloadedUsers',
            'jumlahUserLevel2',
            'persentaseWelcome',
            'persentaseRecalling',
            'statusKeberhasilan'
        ));
    }

    public function getDownloadStatistics(Request $request)
    {
        // Ambil tanggal dari input atau gunakan hari ini sebagai default
        $tanggal = $request->input('tanggal', Carbon::today()->toDateString());

        // Ambil semua pengguna dengan level "ortu"
        $users = DB::table('users')
            ->where('level', 2) // Hanya pengguna dengan level "ortu"
            ->get();

        // Ambil data download untuk setiap pengguna berdasarkan tanggal yang dipilih
        $downloadData = DB::table('downloads')
            ->join('users', 'downloads.user_id', '=', 'users.id')
            ->select('users.id', 'users.name', DB::raw('count(downloads.id) as jumlah'))
            ->whereDate('downloads.tanggal', $tanggal) // Filter berdasarkan tanggal
            ->groupBy('users.id', 'users.name')
            ->get();

        // Gabungkan data download dengan pengguna ortu
        $result = $users->map(function ($user) use ($downloadData) {
            // Cari data download untuk pengguna ini
            $download = $downloadData->firstWhere('id', $user->id);

            // Jika tidak ada data download, set jumlah menjadi 0
            $jumlahDownload = $download ? $download->jumlah : 0;

            // Tentukan apakah notifikasi perlu dikirim
            $kirimNotifikasi = $jumlahDownload == 0 ? true : false;

            return [
                'id' => $user->id,  // Menambahkan ID pengguna
                'name' => $user->name,
                'jumlah' => $jumlahDownload,
                'kirim_notifikasi' => $kirimNotifikasi
            ];
        });

        // Kirim data dalam format JSON
        return response()->json(['downloads' => $result]);
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
