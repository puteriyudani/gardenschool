<?php

namespace App\Http\Controllers;

use App\Models\Kelompok;
use App\Models\Siswa;
use Illuminate\Http\Request;

class PlaygroupController extends Controller
{
    public function welcome()
    {
        // Ambil kelompok dengan kategori 'KB'
        $kelompokKB = Kelompok::where('kategori', 'KB')->get();

        // Ambil siswa yang memiliki kelompok dan hanya tahun aktif
        $siswas = [];
        foreach ($kelompokKB as $kelompok) {
            $siswas[$kelompok->kelompok] = Siswa::where('kelompok', $kelompok->id)
                ->whereHas('tahun', function ($query) {
                    $query->where('status', 'active'); // Filter berdasarkan tahun aktif
                })
                ->paginate(10); // Pagination untuk siswa per kelompok
        }

        return view('guru.playgroup.welcome.siswa', compact('siswas'));
    }

    public function morning()
    {
        // Ambil kelompok dengan kategori 'KB'
        $kelompokKB = Kelompok::where('kategori', 'KB')->get();

        // Ambil siswa yang memiliki kelompok dan hanya tahun aktif
        $siswas = [];
        foreach ($kelompokKB as $kelompok) {
            $siswas[$kelompok->kelompok] = Siswa::where('kelompok', $kelompok->id)
                ->whereHas('tahun', function ($query) {
                    $query->where('status', 'active'); // Filter berdasarkan tahun aktif
                })
                ->paginate(10); // Pagination untuk siswa per kelompok
        }

        return view('guru.playgroup.morning.siswa', compact('siswas'));
    }

    public function breakfast()
    {
        // Ambil kelompok dengan kategori 'KB'
        $kelompokKB = Kelompok::where('kategori', 'KB')->get();

        // Ambil siswa yang memiliki kelompok dan hanya tahun aktif
        $siswas = [];
        foreach ($kelompokKB as $kelompok) {
            $siswas[$kelompok->kelompok] = Siswa::where('kelompok', $kelompok->id)
                ->whereHas('tahun', function ($query) {
                    $query->where('status', 'active'); // Filter berdasarkan tahun aktif
                })
                ->paginate(10); // Pagination untuk siswa per kelompok
        }

        return view('guru.playgroup.breakfast.siswa', compact('siswas'));
    }

    public function islamic()
    {
        // Ambil kelompok dengan kategori 'KB'
        $kelompokKB = Kelompok::where('kategori', 'KB')->get();

        // Ambil siswa yang memiliki kelompok dan hanya tahun aktif
        $siswas = [];
        foreach ($kelompokKB as $kelompok) {
            $siswas[$kelompok->kelompok] = Siswa::where('kelompok', $kelompok->id)
                ->whereHas('tahun', function ($query) {
                    $query->where('status', 'active'); // Filter berdasarkan tahun aktif
                })
                ->paginate(10); // Pagination untuk siswa per kelompok
        }

        return view('guru.playgroup.islamic.siswa', compact('siswas'));
    }

    public function preschool()
    {
        // Ambil kelompok dengan kategori 'KB'
        $kelompokKB = Kelompok::where('kategori', 'KB')->get();

        // Ambil siswa yang memiliki kelompok dan hanya tahun aktif
        $siswas = [];
        foreach ($kelompokKB as $kelompok) {
            $siswas[$kelompok->kelompok] = Siswa::where('kelompok', $kelompok->id)
                ->whereHas('tahun', function ($query) {
                    $query->where('status', 'active'); // Filter berdasarkan tahun aktif
                })
                ->paginate(10); // Pagination untuk siswa per kelompok
        }

        return view('guru.playgroup.preschool.siswa', compact('siswas'));
    }

    public function tematik()
    {
        // Ambil kelompok dengan kategori 'KB'
        $kelompokKB = Kelompok::where('kategori', 'KB')->get();

        // Ambil siswa yang memiliki kelompok dan hanya tahun aktif
        $siswas = [];
        foreach ($kelompokKB as $kelompok) {
            $siswas[$kelompok->kelompok] = Siswa::where('kelompok', $kelompok->id)
                ->whereHas('tahun', function ($query) {
                    $query->where('status', 'active'); // Filter berdasarkan tahun aktif
                })
                ->paginate(10); // Pagination untuk siswa per kelompok
        }

        return view('guru.playgroup.tematik.siswa', compact('siswas'));
    }

    public function pooppee()
    {
        // Ambil kelompok dengan kategori 'KB'
        $kelompokKB = Kelompok::where('kategori', 'KB')->get();

        // Ambil siswa yang memiliki kelompok dan hanya tahun aktif
        $siswas = [];
        foreach ($kelompokKB as $kelompok) {
            $siswas[$kelompok->kelompok] = Siswa::where('kelompok', $kelompok->id)
                ->whereHas('tahun', function ($query) {
                    $query->where('status', 'active'); // Filter berdasarkan tahun aktif
                })
                ->paginate(10); // Pagination untuk siswa per kelompok
        }

        return view('guru.playgroup.pooppee.siswa', compact('siswas'));
    }

    public function recalling()
    {
        // Ambil kelompok dengan kategori 'KB'
        $kelompokKB = Kelompok::where('kategori', 'KB')->get();

        // Ambil siswa yang memiliki kelompok dan hanya tahun aktif
        $siswas = [];
        foreach ($kelompokKB as $kelompok) {
            $siswas[$kelompok->kelompok] = Siswa::where('kelompok', $kelompok->id)
                ->whereHas('tahun', function ($query) {
                    $query->where('status', 'active'); // Filter berdasarkan tahun aktif
                })
                ->paginate(10); // Pagination untuk siswa per kelompok
        }

        return view('guru.playgroup.recalling.siswa', compact('siswas'));
    }

    public function vocabulary()
    {
        // Ambil kelompok dengan kategori 'KB'
        $kelompokKB = Kelompok::where('kategori', 'KB')->get();

        // Ambil siswa yang memiliki kelompok dan hanya tahun aktif
        $siswas = [];
        foreach ($kelompokKB as $kelompok) {
            $siswas[$kelompok->kelompok] = Siswa::where('kelompok', $kelompok->id)
                ->whereHas('tahun', function ($query) {
                    $query->where('status', 'active'); // Filter berdasarkan tahun aktif
                })
                ->paginate(10); // Pagination untuk siswa per kelompok
        }

        return view('guru.playgroup.vocabulary.siswa', compact('siswas'));
    }
}
