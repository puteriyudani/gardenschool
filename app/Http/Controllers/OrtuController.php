<?php

namespace App\Http\Controllers;

use App\Models\Breakfast;
use App\Models\Catatanguru;
use App\Models\Catatanorangtua;
use App\Models\Indikator;
use App\Models\Inti;
use App\Models\Intibaby;
use App\Models\Pembuka;
use App\Models\Pembukababy;
use App\Models\Penutup;
use App\Models\Penutupbaby;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrtuController extends Controller
{
    public function test()
    {
        return view('orangtua.test');
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
