<?php

namespace App\Http\Controllers;

use App\Models\SubTopik;
use App\Models\Instagram;
use Illuminate\Http\Request;

class InstagramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Ambil daftar unik kelompok dari database dengan query yang lebih optimal
        $kelompokList = SubTopik::join('topiks', 'sub_topiks.topik_id', '=', 'topiks.id')
            ->join('temas', 'topiks.tema_id', '=', 'temas.id')
            ->select('temas.kelompok')
            ->distinct()
            ->pluck('temas.kelompok');

        // Ambil kelompok dari query string, pastikan valid
        $selectedKelompok = $request->query('kelompok');
        if (!$kelompokList->contains($selectedKelompok)) {
            $selectedKelompok = $kelompokList->first();
        }

        // Ambil dan kelompokkan data Instagram berdasarkan hierarki kelompok → tema → topik → subtopik
        $groupedInstagrams = Instagram::when($selectedKelompok, function ($query) use ($selectedKelompok) {
            return $query->whereHas('subtopik.topik.tema', function ($query) use ($selectedKelompok) {
                $query->where('kelompok', $selectedKelompok);
            });
        })
            ->with('subtopik.topik.tema') // Memuat relasi untuk menghindari N+1 Query
            ->get()
            ->groupBy('subtopik.topik.tema.kelompok') // Kelompok
            ->map(function ($kelompokGroup) {
                return $kelompokGroup->groupBy('subtopik.topik.tema.tema') // Tema
                    ->map(function ($temaGroup) {
                        return $temaGroup->groupBy('subtopik.topik.topik') // Topik
                            ->map(function ($topikGroup) {
                                return $topikGroup->groupBy('subtopik.subtopik'); // Subtopik
                            });
                    });
            });

        return view('instagram.index', compact('groupedInstagrams', 'kelompokList', 'selectedKelompok'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subtopiks = SubTopik::with(['topik.tema'])->get();
        return view('instagram.create', compact('subtopiks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'subtopik_id' => 'required|exists:sub_topiks,id', // Ensure subtopik_id exists in SubTopik table
            'link' => 'required|url',
        ]);

        // Fetch the subtopik title from the related SubTopik
        $subtopik = SubTopik::findOrFail($request->subtopik_id);
        $requestData = $request->all();
        $requestData['judul'] = $subtopik->subtopik; // Automatically set judul from SubTopik

        Instagram::create($requestData);

        return redirect()->route('instagram.index')
            ->with('success', 'Instagram post created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Instagram $instagram)
    {
        $subtopiks = SubTopik::with(['topik.tema'])->get();
        return view('instagram.edit', compact('instagram', 'subtopiks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Instagram $instagram)
    {
        $request->validate([
            'subtopik_id' => 'required|exists:sub_topiks,id', // Ensure subtopik_id exists in SubTopik table
            'link' => 'required|url',
        ]);

        // Fetch the updated subtopik title from the related SubTopik
        $subtopik = SubTopik::findOrFail($request->subtopik_id);
        $requestData = $request->all();
        $requestData['judul'] = $subtopik->subtopik; // Automatically update judul from SubTopik

        $instagram->update($requestData);

        return redirect()->route('instagram.index')
            ->with('success', 'Instagram post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Instagram $instagram)
    {
        $instagram->delete();

        return back()->with('success', 'Instagram post deleted successfully.');
    }
}
