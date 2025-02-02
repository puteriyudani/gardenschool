<?php

namespace App\Http\Controllers;

use App\Models\SubTopik;
use App\Models\Topik;
use Illuminate\Http\Request;

class SubTopikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Ambil semua kelompok unik dari tema yang berhubungan dengan topik
        $kelompokList = SubTopik::with(['topik.tema'])->get()->pluck('topik.tema.kelompok')->unique();

        // Ambil kelompok dari query string (default ke kelompok pertama jika tidak ada)
        $selectedKelompok = $request->query('kelompok', $kelompokList->first());

        // Ambil semua subtopik berdasarkan kelompok yang dipilih
        $subtopiks = SubTopik::with(['topik.tema'])
            ->whereHas('topik.tema', function ($query) use ($selectedKelompok) {
                $query->where('kelompok', $selectedKelompok);
            })
            ->orderBy('created_at', 'asc') // Urutkan berdasarkan waktu pembuatan
            ->get(); // Ambil semua data tanpa pagination

        return view('subtopik.index', compact('subtopiks', 'kelompokList', 'selectedKelompok'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $topiks = Topik::with('tema')->get(); // Ambil topik dengan relasi tema
        return view('subtopik.create', compact('topiks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'topik_id' => 'required',
            'subtopik' => 'required',
        ]);

        SubTopik::create($request->all());

        return redirect()->route('subtopik.index')
            ->with('success', 'Sub Topik created successfully.');
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
    public function edit(SubTopik $subtopik)
    {
        $topiks = Topik::with('tema')->get(); // Ambil topik untuk dropdown
        return view('subtopik.edit', compact('subtopik', 'topiks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubTopik $subtopik)
    {
        $request->validate([
            'topik_id' => 'required',
            'subtopik' => 'required',
        ]);

        $subtopik->update($request->all());

        return redirect()->route('subtopik.index')
            ->with('success', 'Sub Topik updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubTopik $subtopik)
    {
        $subtopik->delete();
        return back()->with('success', 'Sub Topik deleted successfully');
    }
}
