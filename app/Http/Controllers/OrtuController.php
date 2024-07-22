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

class OrtuController extends Controller
{
    public function index()
    {
        $ortu = Auth::user();
        $siswas = $ortu->siswa()->get();

        return view('orangtua.index', compact('siswas'));
    }

    // Method untuk menampilkan halaman laporan
    public function showLaporan($id)
    {
        $user = Auth::user();
        session(['orangtua_id' => $user->id]);

        // Ambil siswa terkait orangtua yang sedang login
        $siswa = Siswa::findOrFail($id);

        if ($siswa) {
            session(['siswa_id' => $siswa->id]);

            // Buat array tanggal
            $dates = [];
            for ($i = 0; $i < 31; $i++) {
                $dates[] = date('Y-m-d', strtotime("-$i days"));
            }

            // Tentukan kelompok siswa
            $kelompok = $siswa->kelompok;

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
                'dates',
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

    // Method untuk menangani form submission
    public function laporan(Request $request)
    {
        $user = Auth::user();
        session(['orangtua_id' => $user->id]);

        // Ambil siswa terkait orangtua yang sedang login
        $siswa = Siswa::findOrFail(session('siswa_id'));

        if ($siswa) {
            session(['siswa_id' => $siswa->id]);

            // Ambil tanggal yang dipilih dari form
            $today = $request->input('tanggal');

            // Buat array tanggal
            $dates = [];
            for ($i = 0; $i < 31; $i++) {
                $dates[] = date('Y-m-d', strtotime("-$i days"));
            }

            // Ambil data laporan terkait siswa untuk tanggal yang dipilih
            $welcomes = Welcome::where('siswa_id', $siswa->id)->whereDate('tanggal', $today)->get();
            $mornings = Morning::where('siswa_id', $siswa->id)->whereDate('tanggal', $today)->get();
            $breakfasts = Breakfast::with('menu')->where('siswa_id', $siswa->id)->whereDate('tanggal', $today)->get();
            $islamics = Islamic::with('hadist', 'quran', 'doa')->where('siswa_id', $siswa->id)->whereDate('tanggal', $today)->get();
            $preschools = Preschool::where('siswa_id', $siswa->id)->whereDate('tanggal', $today)->get();
            $pooppees = Pooppee::where('siswa_id', $siswa->id)->whereDate('tanggal', $today)->get();
            $tematiks = Tematik::where('siswa_id', $siswa->id)->whereDate('tanggal', $today)->get();
            $recallings = Recalling::where('siswa_id', $siswa->id)->whereDate('tanggal', $today)->get();
            $vocabularys = Vocabulary::where('siswa_id', $siswa->id)->whereDate('tanggal', $today)->get();
            $videos = Video::whereDate('tanggal', $today)->get();
            $acts = Act::where('siswa_id', $siswa->id)->whereDate('tanggal', $today)->get();
            $funs = Fun::where('siswa_id', $siswa->id)->whereDate('tanggal', $today)->get();
            $lunchs = Lunch::where('siswa_id', $siswa->id)->whereDate('tanggal', $today)->get();

            // Ambil data islamic dari database
            $hadist_list = Hadist::all();
            $quran_list = Quran::all();
            $doa_list = Doa::all();

            $hadistbaby_list = HadistBaby::all();
            $quranbaby_list = QuranBaby::all();
            $doababy_list = DoaBaby::all();

            // Tentukan kelompok siswa
            $kelompok = $siswa->kelompok;

            // Set the selected date
            $selected = $today;

            return view('orangtua.laporan', compact(
                'user',
                'siswa',
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
                'today',
                'kelompok',
                'hadist_list',
                'quran_list',
                'doa_list',
                'hadistbaby_list',
                'quranbaby_list',
                'doababy_list',
                'dates',
                'selected'
            ));
        } else {
            // Jika siswa tidak ditemukan, kembalikan pesan kesalahan atau tindakan lainnya
            return redirect()->back()->with('error', 'Siswa tidak ditemukan untuk orangtua ini.');
        }
    }

    public function siswa()
    {
        $ortu = Auth::user();
        $kindergarten = $ortu->siswa()->where('kelompok', 'kindergarten')->get();
        $playgroup = $ortu->siswa()->where('kelompok', 'playgroup')->get();
        $babycamp = $ortu->siswa()->where('kelompok', 'babycamp')->get();

        return view('orangtua.siswa', compact('kindergarten', 'playgroup', 'babycamp'));
    }
}
