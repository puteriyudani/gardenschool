<?php

namespace App\Http\Controllers;

use App\Models\Tema;
use App\Models\Topik;
use Illuminate\Http\Request;

class TopikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Ambil semua kelompok unik
        $kelompokList = Topik::with('tema')->get()->pluck('tema.kelompok')->unique();

        // Ambil kelompok dari query string (default ke kelompok pertama jika tidak ada)
        $selectedKelompok = $request->query('kelompok', $kelompokList->first());

        // Ambil semua data topik tanpa paginasi
        $topiks = Topik::select('topiks.*')
            ->join('temas', 'topiks.tema_id', '=', 'temas.id') // Join dengan tabel temas
            ->where('temas.kelompok', $selectedKelompok)
            ->orderBy('topiks.created_at', 'asc') // Urutkan berdasarkan waktu pembuatan
            ->get()
            ->groupBy('tema.tema'); // Kelompokkan berdasarkan tema

        return view('topik.index', compact('topiks', 'kelompokList', 'selectedKelompok'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $temas = Tema::all(); // Mengambil semua data tema

        return view('topik.create', compact('temas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tema_id' => 'required',
            'topik' => 'required',
        ]);

        Topik::create($request->all());

        return redirect()->route('topik.index')
            ->with('success', 'Topik created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Topik $topik)
    {
        $temas = Tema::all(); // Mengambil semua tema untuk dropdown
        return view('topik.edit', compact('topik', 'temas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Topik $topik)
    {
        $request->validate([
            'tema_id' => 'required',
            'topik' => 'required',
        ]);

        $topik->update($request->all());

        return redirect()->route('topik.index')
            ->with('success', 'Topik updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Topik $topik)
    {
        $topik->delete();
        return back()->with('success', 'Topik deleted successfully');
    }
}
