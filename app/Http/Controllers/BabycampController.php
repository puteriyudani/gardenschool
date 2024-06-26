<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class BabycampController extends Controller
{
    public function welcome()
    {
        $siswas = Siswa::where('kelompok', 'babycamp')->get();
        return view('guru.babycamp.welcome.siswa', compact('siswas'));
    }
    public function morning()
    {
        $siswas = Siswa::where('kelompok', 'babycamp')->get();
        return view('guru.babycamp.morning.siswa', compact('siswas'));
    }
    public function breakfast()
    {
        $siswas = Siswa::where('kelompok', 'babycamp')->get();
        return view('guru.babycamp.breakfast.siswa', compact('siswas'));
    }
    public function islamic()
    {
        $siswas = Siswa::where('kelompok', 'babycamp')->get();
        return view('guru.babycamp.islamic.siswa', compact('siswas'));
    }
    public function act()
    {
        $siswas = Siswa::where('kelompok', 'babycamp')->get();
        return view('guru.babycamp.act.siswa', compact('siswas'));
    }
    public function fun()
    {
        $siswas = Siswa::where('kelompok', 'babycamp')->get();
        return view('guru.babycamp.fun.siswa', compact('siswas'));
    }
    public function lunch()
    {
        $siswas = Siswa::where('kelompok', 'babycamp')->get();
        return view('guru.babycamp.lunch.siswa', compact('siswas'));
    }
    public function recalling()
    {
        $siswas = Siswa::where('kelompok', 'babycamp')->get();
        return view('guru.babycamp.recalling.siswa', compact('siswas'));
    }
}
