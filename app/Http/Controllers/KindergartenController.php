<?php

namespace App\Http\Controllers;

use App\Models\Kelompok;
use App\Models\Siswa;
use Illuminate\Http\Request;

class KindergartenController extends Controller
{
    public function welcome()
    {
        // Ambil kelompok dengan kategori 'TK'
        $kelompokTK = Kelompok::where('kategori', 'TK')->get();

        // Ambil siswa yang memiliki kelompok berdasarkan kategori 'TK'
        $siswas = [];
        foreach ($kelompokTK as $kelompok) {
            // Menyimpan siswa dalam objek paginator
            $siswas[$kelompok->kelompok] = Siswa::where('kelompok', $kelompok->id)->paginate(10);
        }

        return view('guru.kindergarten.welcome.siswa', compact('siswas'));
    }

    public function morning()
    {
        // Ambil kelompok dengan kategori 'TK'
        $kelompokTK = Kelompok::where('kategori', 'TK')->get();

        // Ambil siswa yang memiliki kelompok berdasarkan kategori 'TK'
        $siswas = [];
        foreach ($kelompokTK as $kelompok) {
            // Menyimpan siswa dalam objek paginator
            $siswas[$kelompok->kelompok] = Siswa::where('kelompok', $kelompok->id)->paginate(10);
        }

        return view('guru.kindergarten.morning.siswa', compact('siswas'));
    }

    public function breakfast()
    {
        // Ambil kelompok dengan kategori 'TK'
        $kelompokTK = Kelompok::where('kategori', 'TK')->get();

        // Ambil siswa yang memiliki kelompok berdasarkan kategori 'TK'
        $siswas = [];
        foreach ($kelompokTK as $kelompok) {
            // Menyimpan siswa dalam objek paginator
            $siswas[$kelompok->kelompok] = Siswa::where('kelompok', $kelompok->id)->paginate(10);
        }

        return view('guru.kindergarten.breakfast.siswa', compact('siswas'));
    }

    public function islamic()
    {
        // Ambil kelompok dengan kategori 'TK'
        $kelompokTK = Kelompok::where('kategori', 'TK')->get();

        // Ambil siswa yang memiliki kelompok berdasarkan kategori 'TK'
        $siswas = [];
        foreach ($kelompokTK as $kelompok) {
            // Menyimpan siswa dalam objek paginator
            $siswas[$kelompok->kelompok] = Siswa::where('kelompok', $kelompok->id)->paginate(10);
        }

        return view('guru.kindergarten.islamic.siswa', compact('siswas'));
    }

    public function preschool()
    {
        // Ambil kelompok dengan kategori 'TK'
        $kelompokTK = Kelompok::where('kategori', 'TK')->get();

        // Ambil siswa yang memiliki kelompok berdasarkan kategori 'TK'
        $siswas = [];
        foreach ($kelompokTK as $kelompok) {
            // Menyimpan siswa dalam objek paginator
            $siswas[$kelompok->kelompok] = Siswa::where('kelompok', $kelompok->id)->paginate(10);
        }

        return view('guru.kindergarten.preschool.siswa', compact('siswas'));
    }

    public function tematik()
    {
        // Ambil kelompok dengan kategori 'TK'
        $kelompokTK = Kelompok::where('kategori', 'TK')->get();

        // Ambil siswa yang memiliki kelompok berdasarkan kategori 'TK'
        $siswas = [];
        foreach ($kelompokTK as $kelompok) {
            // Menyimpan siswa dalam objek paginator
            $siswas[$kelompok->kelompok] = Siswa::where('kelompok', $kelompok->id)->paginate(10);
        }

        return view('guru.kindergarten.tematik.siswa', compact('siswas'));
    }

    public function pooppee()
    {
        // Ambil kelompok dengan kategori 'TK'
        $kelompokTK = Kelompok::where('kategori', 'TK')->get();

        // Ambil siswa yang memiliki kelompok berdasarkan kategori 'TK'
        $siswas = [];
        foreach ($kelompokTK as $kelompok) {
            // Menyimpan siswa dalam objek paginator
            $siswas[$kelompok->kelompok] = Siswa::where('kelompok', $kelompok->id)->paginate(10);
        }

        return view('guru.kindergarten.pooppee.siswa', compact('siswas'));
    }

    public function recalling()
    {
        // Ambil kelompok dengan kategori 'TK'
        $kelompokTK = Kelompok::where('kategori', 'TK')->get();

        // Ambil siswa yang memiliki kelompok berdasarkan kategori 'TK'
        $siswas = [];
        foreach ($kelompokTK as $kelompok) {
            // Menyimpan siswa dalam objek paginator
            $siswas[$kelompok->kelompok] = Siswa::where('kelompok', $kelompok->id)->paginate(10);
        }

        return view('guru.kindergarten.recalling.siswa', compact('siswas'));
    }

    public function vocabulary()
    {
        // Ambil kelompok dengan kategori 'TK'
        $kelompokTK = Kelompok::where('kategori', 'TK')->get();

        // Ambil siswa yang memiliki kelompok berdasarkan kategori 'TK'
        $siswas = [];
        foreach ($kelompokTK as $kelompok) {
            // Menyimpan siswa dalam objek paginator
            $siswas[$kelompok->kelompok] = Siswa::where('kelompok', $kelompok->id)->paginate(10);
        }

        return view('guru.kindergarten.vocabulary.siswa', compact('siswas'));
    }
}
