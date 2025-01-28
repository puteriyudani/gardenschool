<?php

namespace App\Http\Controllers;

use App\Models\Kelompok;
use App\Models\Siswa;
use Illuminate\Http\Request;

class BabycampController extends Controller
{
    public function welcome()
    {
        // Ambil kelompok dengan kategori 'BC'
        $kelompokBC = Kelompok::where('kategori', 'BC')->get();

        // Ambil siswa yang memiliki kelompok dan hanya tahun aktif
        $siswas = [];
        foreach ($kelompokBC as $kelompok) {
            $siswas[$kelompok->kelompok] = Siswa::where('kelompok', $kelompok->id)
                ->whereHas('tahun', function ($query) {
                    $query->where('status', 'active'); // Filter berdasarkan tahun aktif
                })
                ->paginate(10); // Pagination untuk siswa per kelompok
        }

        return view('guru.babycamp.welcome.siswa', compact('siswas'));
    }

    public function morning()
    {
        // Ambil kelompok dengan kategori 'BC'
        $kelompokBC = Kelompok::where('kategori', 'BC')->get();

        // Ambil siswa yang memiliki kelompok dan hanya tahun aktif
        $siswas = [];
        foreach ($kelompokBC as $kelompok) {
            $siswas[$kelompok->kelompok] = Siswa::where('kelompok', $kelompok->id)
                ->whereHas('tahun', function ($query) {
                    $query->where('status', 'active'); // Filter berdasarkan tahun aktif
                })
                ->paginate(10); // Pagination untuk siswa per kelompok
        }

        return view('guru.babycamp.morning.siswa', compact('siswas'));
    }

    public function breakfast()
    {
        // Ambil kelompok dengan kategori 'BC'
        $kelompokBC = Kelompok::where('kategori', 'BC')->get();

        // Ambil siswa yang memiliki kelompok dan hanya tahun aktif
        $siswas = [];
        foreach ($kelompokBC as $kelompok) {
            $siswas[$kelompok->kelompok] = Siswa::where('kelompok', $kelompok->id)
                ->whereHas('tahun', function ($query) {
                    $query->where('status', 'active'); // Filter berdasarkan tahun aktif
                })
                ->paginate(10); // Pagination untuk siswa per kelompok
        }

        return view('guru.babycamp.breakfast.siswa', compact('siswas'));
    }

    public function islamic()
    {
        // Ambil kelompok dengan kategori 'BC'
        $kelompokBC = Kelompok::where('kategori', 'BC')->get();

        // Ambil siswa yang memiliki kelompok dan hanya tahun aktif
        $siswas = [];
        foreach ($kelompokBC as $kelompok) {
            $siswas[$kelompok->kelompok] = Siswa::where('kelompok', $kelompok->id)
                ->whereHas('tahun', function ($query) {
                    $query->where('status', 'active'); // Filter berdasarkan tahun aktif
                })
                ->paginate(10); // Pagination untuk siswa per kelompok
        }

        return view('guru.babycamp.islamic.siswa', compact('siswas'));
    }

    public function act()
    {
        // Ambil kelompok dengan kategori 'BC'
        $kelompokBC = Kelompok::where('kategori', 'BC')->get();

        // Ambil siswa yang memiliki kelompok dan hanya tahun aktif
        $siswas = [];
        foreach ($kelompokBC as $kelompok) {
            $siswas[$kelompok->kelompok] = Siswa::where('kelompok', $kelompok->id)
                ->whereHas('tahun', function ($query) {
                    $query->where('status', 'active'); // Filter berdasarkan tahun aktif
                })
                ->paginate(10); // Pagination untuk siswa per kelompok
        }

        return view('guru.babycamp.act.siswa', compact('siswas'));
    }

    public function fun()
    {
        // Ambil kelompok dengan kategori 'BC'
        $kelompokBC = Kelompok::where('kategori', 'BC')->get();

        // Ambil siswa yang memiliki kelompok dan hanya tahun aktif
        $siswas = [];
        foreach ($kelompokBC as $kelompok) {
            $siswas[$kelompok->kelompok] = Siswa::where('kelompok', $kelompok->id)
                ->whereHas('tahun', function ($query) {
                    $query->where('status', 'active'); // Filter berdasarkan tahun aktif
                })
                ->paginate(10); // Pagination untuk siswa per kelompok
        }

        return view('guru.babycamp.fun.siswa', compact('siswas'));
    }

    public function lunch()
    {
        // Ambil kelompok dengan kategori 'BC'
        $kelompokBC = Kelompok::where('kategori', 'BC')->get();

        // Ambil siswa yang memiliki kelompok dan hanya tahun aktif
        $siswas = [];
        foreach ($kelompokBC as $kelompok) {
            $siswas[$kelompok->kelompok] = Siswa::where('kelompok', $kelompok->id)
                ->whereHas('tahun', function ($query) {
                    $query->where('status', 'active'); // Filter berdasarkan tahun aktif
                })
                ->paginate(10); // Pagination untuk siswa per kelompok
        }

        return view('guru.babycamp.lunch.siswa', compact('siswas'));
    }

    public function recalling()
    {
        // Ambil kelompok dengan kategori 'BC'
        $kelompokBC = Kelompok::where('kategori', 'BC')->get();

        // Ambil siswa yang memiliki kelompok dan hanya tahun aktif
        $siswas = [];
        foreach ($kelompokBC as $kelompok) {
            $siswas[$kelompok->kelompok] = Siswa::where('kelompok', $kelompok->id)
                ->whereHas('tahun', function ($query) {
                    $query->where('status', 'active'); // Filter berdasarkan tahun aktif
                })
                ->paginate(10); // Pagination untuk siswa per kelompok
        }

        return view('guru.babycamp.recalling.siswa', compact('siswas'));
    }
}
