<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Vocabulary;
use Illuminate\Http\Request;

class VocabularyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function kindergarten($id)
    {
        $siswa = Siswa::findOrFail($id);
        session(['siswa_id' => $id]);
        $vocabularys = Vocabulary::where('siswa_id', $siswa->id)->get();
        return view('guru.kindergarten.vocabulary.index', compact('siswa', 'vocabularys'));
    }

    public function playgroup($id)
    {
        $siswa = Siswa::findOrFail($id);
        session(['siswa_id' => $id]);
        $vocabularys = Vocabulary::where('siswa_id', $siswa->id)->get();
        return view('guru.playgroup.vocabulary.index', compact('siswa', 'vocabularys'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $siswa_id = session('siswa_id');
        $siswa = Siswa::findOrFail($siswa_id);
        return view('guru.activity.vocabulary.create', compact('siswa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required',
            'siswa_id' => 'required',
            'vocabulary' => 'required',
        ]);

        Vocabulary::create($request->all());

        return redirect()->back()->with('success', 'Vocabulary created successfully.');
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
    public function edit(Vocabulary $vocabulary)
    {
        $siswa_id = session('siswa_id');
        $siswa = Siswa::findOrFail($siswa_id);
        return view('guru.activity.vocabulary.edit', compact('vocabulary', 'siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vocabulary $vocabulary)
    {
        $request->validate([
            'tanggal' => 'required',
            'siswa_id' => 'required',
            'vocabulary' => 'required',
        ]);

        $vocabulary->update($request->all());

        return redirect()->back()->with('success','Vocabulary updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vocabulary $vocabulary)
    {
        $vocabulary->delete();

        return back()->with('success','Vocabulary deleted successfully');
    }
}
