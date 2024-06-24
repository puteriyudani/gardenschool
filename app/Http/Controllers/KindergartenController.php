<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class KindergartenController extends Controller
{
    public function welcome()
    {
        $siswas = Siswa::where('kelompok', 'kindergarten')->get();
        return view('guru.kindergarten.welcome.siswa', compact('siswas'));
    }
    public function morning()
    {
        $siswas = Siswa::where('kelompok', 'kindergarten')->get();
        return view('guru.kindergarten.morning.siswa', compact('siswas'));
    }
    public function breakfast()
    {
        $siswas = Siswa::where('kelompok', 'kindergarten')->get();
        return view('guru.kindergarten.breakfast.siswa', compact('siswas'));
    }
    public function islamic()
    {
        $siswas = Siswa::where('kelompok', 'kindergarten')->get();
        return view('guru.kindergarten.islamic.siswa', compact('siswas'));
    }
    public function preschool()
    {
        $siswas = Siswa::where('kelompok', 'kindergarten')->get();
        return view('guru.kindergarten.preschool.siswa', compact('siswas'));
    }
    public function tematik()
    {
        $siswas = Siswa::where('kelompok', 'kindergarten')->get();
        return view('guru.kindergarten.tematik.siswa', compact('siswas'));
    }
    public function pooppee()
    {
        $siswas = Siswa::where('kelompok', 'kindergarten')->get();
        return view('guru.kindergarten.pooppee.siswa', compact('siswas'));
    }
    public function recalling()
    {
        $siswas = Siswa::where('kelompok', 'kindergarten')->get();
        return view('guru.kindergarten.recalling.siswa', compact('siswas'));
    }

    public function vocabulary()
    {
        $siswas = Siswa::where('kelompok', 'kindergarten')->get();
        return view('guru.kindergarten.vocabulary.siswa', compact('siswas'));
    }
}
