<?php

namespace App\Http\Controllers;

use App\Models\Breakfast;
use App\Models\Islamic;
use App\Models\Morning;
use App\Models\Pooppee;
use App\Models\Preschool;
use App\Models\Recalling;
use App\Models\Siswa;
use App\Models\Tematik;
use App\Models\Video;
use App\Models\Welcome;
use Illuminate\Support\Facades\Auth;

class OrtuController extends Controller
{
    public function laporan()
    {
        $user = Auth::user();
        session(['orangtua_id' => $user->id]);

        // Ambil siswa terkait orangtua yang sedang login
        $siswa = Siswa::where('orangtua_id', $user->id)->first();

        if ($siswa) {
            session(['siswa_id' => $siswa->id]);

            // Ambil welcome records terkait siswa
            $welcomes = Welcome::where('siswa_id', $siswa->id)->get();
            $mornings = Morning::where('siswa_id', $siswa->id)->get();
            $breakfasts = Breakfast::with('menu')->where('siswa_id', $siswa->id)->get();
            $islamics = Islamic::with('hadist', 'quran', 'doa')->where('siswa_id', $siswa->id)->get();
            $preschools = Preschool::where('siswa_id', $siswa->id)->get();
            $pooppees = Pooppee::where('siswa_id', $siswa->id)->get();
            $tematiks = Tematik::where('siswa_id', $siswa->id)->get();
            $recallings = Recalling::where('siswa_id', $siswa->id)->get();
            $videos = Video::get();

            return view('orangtua.laporan', compact('user', 'siswa', 'welcomes', 'mornings', 'breakfasts', 'islamics', 'preschools', 'pooppees', 'tematiks', 'videos', 'recallings'));
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
