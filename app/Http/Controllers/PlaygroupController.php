<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class PlaygroupController extends Controller
{
    public function welcome()
    {
        $siswas = Siswa::where('kelompok', 'playgroup')->get();
        return view('guru.playgroup.welcome.siswa', compact('siswas'));
    }
    public function morning()
    {
        $siswas = Siswa::where('kelompok', 'playgroup')->get();
        return view('guru.playgroup.morning.siswa', compact('siswas'));
    }
    public function breakfast()
    {
        $siswas = Siswa::where('kelompok', 'playgroup')->get();
        return view('guru.playgroup.breakfast.siswa', compact('siswas'));
    }
    public function islamic()
    {
        $siswas = Siswa::where('kelompok', 'playgroup')->get();
        return view('guru.playgroup.islamic.siswa', compact('siswas'));
    }
    public function preschool()
    {
        $siswas = Siswa::where('kelompok', 'playgroup')->get();
        return view('guru.playgroup.preschool.siswa', compact('siswas'));
    }
    public function tematik()
    {
        $siswas = Siswa::where('kelompok', 'playgroup')->get();
        return view('guru.playgroup.tematik.siswa', compact('siswas'));
    }
    public function pooppee()
    {
        $siswas = Siswa::where('kelompok', 'playgroup')->get();
        return view('guru.playgroup.pooppee.siswa', compact('siswas'));
    }
    public function recalling()
    {
        $siswas = Siswa::where('kelompok', 'playgroup')->get();
        return view('guru.playgroup.recalling.siswa', compact('siswas'));
    }
    public function vocabulary()
    {
        $siswas = Siswa::where('kelompok', 'playgroup')->get();
        return view('guru.playgroup.vocabulary.siswa', compact('siswas'));
    }
}
