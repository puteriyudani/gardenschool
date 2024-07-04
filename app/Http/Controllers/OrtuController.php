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
use Illuminate\Support\Facades\Auth;

class OrtuController extends Controller
{
    public function indexlaporan()
    {
        $ortu = Auth::user();
        $siswas = $ortu->siswa()->get();

        return view('orangtua.indexlaporan', compact('siswas'));
    }

    public function laporan($id)
    {
        $user = Auth::user();
        session(['orangtua_id' => $user->id]);

        // Ambil siswa terkait orangtua yang sedang login
        $siswa = Siswa::findOrFail($id);

        if ($siswa) {
            session(['siswa_id' => $siswa->id]);

            // Dapatkan tanggal hari ini
            $today = date('Y-m-d');

            // Ambil welcome records terkait siswa untuk tanggal hari ini
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

            return view('orangtua.laporan', compact('user', 'siswa', 'welcomes', 'mornings', 'breakfasts', 'islamics', 'preschools', 'pooppees', 'tematiks', 'videos', 'recallings', 'vocabularys', 'acts', 'funs', 'lunchs', 'today', 'kelompok', 'hadist_list', 'quran_list', 'doa_list', 'hadistbaby_list', 'quranbaby_list', 'doababy_list'));
        } else {
            // Jika siswa tidak ditemukan, kembalikan pesan kesalahan atau tindakan lainnya
            return redirect()->back()->with('error', 'Siswa tidak ditemukan untuk orangtua ini.');
        }
    }

    public function index()
    {
        return view('orangtua.index');
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
