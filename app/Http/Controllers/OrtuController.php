<?php

namespace App\Http\Controllers;

use App\Models\Act;
use App\Models\Breakfast;
use App\Models\Doa;
use App\Models\DoaBaby;
use App\Models\Fun;
use App\Models\Hadist;
use App\Models\HadistBaby;
use App\Models\Islamic;
use App\Models\Lunch;
use App\Models\Morning;
use App\Models\Notification;
use App\Models\Pooppee;
use App\Models\Preschool;
use App\Models\Quran;
use App\Models\QuranBaby;
use App\Models\Recalling;
use App\Models\Siswa;
use App\Models\Tematik;
use App\Models\Video;
use App\Models\Vocabulary;
use App\Models\Welcome;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class OrtuController extends Controller
{
    public function index()
    {
        $ortu = Auth::user();
        $siswas = $ortu->siswa()->get();

        // Ambil notifikasi terbaru
        $notifications = Notification::where('user_id', $ortu->id)
            ->where('is_read', false)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('orangtua.index', compact('siswas', 'notifications'));
    }

    public function markAndDeleteNotification($notificationId)
    {
        $notification = Notification::find($notificationId);

        // Pastikan notifikasi ditemukan dan milik user yang sesuai
        if ($notification && $notification->user_id === Auth::id()) {
            // Tandai sebagai dibaca dan hapus
            $notification->update(['is_read' => true]);
            $notification->delete(); // Menghapus notifikasi setelah dibaca
        }

        return redirect()->back(); // Kembali ke halaman sebelumnya
    }

    public function showLaporan($id)
    {
        $user = Auth::user();
        session(['orangtua_id' => $user->id]);

        // Ambil siswa terkait orangtua yang sedang login
        $siswa = Siswa::with('kelompoks')->findOrFail($id);

        if ($siswa) {
            session(['siswa_id' => $siswa->id]);

            // Tentukan kelompok siswa
            $kelompok = $siswa->kelompoks->kategori;

            // Default selected date is today
            $selected = date('Y-m-d');

            // Definisikan variabel laporan kosong
            $welcomes = collect([]);
            $mornings = collect([]);
            $breakfasts = collect([]);
            $islamics = collect([]);
            $preschools = collect([]);
            $pooppees = collect([]);
            $tematiks = collect([]);
            $recallings = collect([]);
            $vocabularys = collect([]);
            $videos = collect([]);
            $acts = collect([]);
            $funs = collect([]);
            $lunchs = collect([]);
            $hadist_list = collect([]);
            $quran_list = collect([]);
            $doa_list = collect([]);
            $hadistbaby_list = collect([]);
            $quranbaby_list = collect([]);
            $doababy_list = collect([]);

            return view('orangtua.laporan', compact(
                'user',
                'siswa',
                'kelompok',
                'selected',
                'welcomes',
                'mornings',
                'breakfasts',
                'islamics',
                'preschools',
                'pooppees',
                'tematiks',
                'recallings',
                'vocabularys',
                'videos',
                'acts',
                'funs',
                'lunchs',
                'hadist_list',
                'quran_list',
                'doa_list',
                'hadistbaby_list',
                'quranbaby_list',
                'doababy_list'
            ));
        } else {
            // Jika siswa tidak ditemukan, kembalikan pesan kesalahan atau tindakan lainnya
            return redirect()->back()->with('error', 'Siswa tidak ditemukan untuk orangtua ini.');
        }
    }

    public function laporan(Request $request, $id)
    {
        // Cek apakah tanggal sudah ada di request, jika tidak redirect ke tanggal hari ini
        if (!$request->has('tanggal')) {
            return redirect()->route('laporan.tanggal', ['id' => $id, 'tanggal' => Carbon::today()->toDateString()]);
        }

        // Ambil user yang login dan set session
        $user = Auth::user();
        session(['orangtua_id' => $user->id]);

        // Ambil data siswa berdasarkan ID
        $siswa = Siswa::with('kelompoks')->findOrFail($id);

        // Set session siswa jika ditemukan
        session(['siswa_id' => $siswa->id]);

        // Ambil tanggal dari request
        $today = $request->input('tanggal');

        // Ambil semua data laporan berdasarkan tanggal
        $dataLaporan = [
            'welcomes' => Welcome::where('siswa_id', $siswa->id)->whereDate('tanggal', $today)->get(),
            'mornings' => Morning::where('siswa_id', $siswa->id)->whereDate('tanggal', $today)->get(),
            'breakfasts' => Breakfast::with('menuData')->where('siswa_id', $siswa->id)->whereDate('tanggal', $today)->get(),
            'islamics' => Islamic::with('hadist', 'quran', 'doa')->where('siswa_id', $siswa->id)->whereDate('tanggal', $today)->get(),
            'preschools' => Preschool::where('siswa_id', $siswa->id)->whereDate('tanggal', $today)->get(),
            'pooppees' => Pooppee::where('siswa_id', $siswa->id)->whereDate('tanggal', $today)->get(),
            'tematiks' => Tematik::where('siswa_id', $siswa->id)->whereDate('tanggal', $today)->get(),
            'recallings' => Recalling::where('siswa_id', $siswa->id)->whereDate('tanggal', $today)->get(),
            'vocabularys' => Vocabulary::where('siswa_id', $siswa->id)->whereDate('tanggal', $today)->get(),
            'videos' => Video::whereDate('tanggal', $today)->get(),
            'acts' => Act::where('siswa_id', $siswa->id)->whereDate('tanggal', $today)->get(),
            'funs' => Fun::where('siswa_id', $siswa->id)->whereDate('tanggal', $today)->get(),
            'lunchs' => Lunch::with('menuData')->where('siswa_id', $siswa->id)->whereDate('tanggal', $today)->get(),
        ];

        // Ambil data islamic dari database
        $islamicData = [
            'hadist_list' => Hadist::all(),
            'quran_list' => Quran::all(),
            'doa_list' => Doa::all(),
            'hadistbaby_list' => HadistBaby::all(),
            'quranbaby_list' => QuranBaby::all(),
            'doababy_list' => DoaBaby::all(),
        ];

        // Tentukan kelompok siswa
        $kelompok = $siswa->kelompoks->kategori;

        // Set tanggal yang dipilih
        $selected = $today;

        // Kirim data ke view
        return view('orangtua.laporan', array_merge(
            compact('user', 'siswa', 'today', 'kelompok', 'selected'),
            $dataLaporan,
            $islamicData
        ));
    }
}
