<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Tematik;
use Illuminate\Http\Request;

class TematikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function kindergarten($id)
    {
        $siswa = Siswa::findOrFail($id);
        session(['siswa_id' => $id]);
        $tematiks = Tematik::where('siswa_id', $siswa->id)->get();
        return view('guru.kindergarten.tematik.index', compact('siswa', 'tematiks'));
    }

    public function playgroup($id)
    {
        $siswa = Siswa::findOrFail($id);
        session(['siswa_id' => $id]);
        $tematiks = Tematik::where('siswa_id', $siswa->id)->get();
        return view('guru.playgroup.tematik.index', compact('siswa', 'tematiks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $siswa_id = session('siswa_id');
        $siswa = Siswa::findOrFail($siswa_id);
        return view('guru.activity.tematik.create', compact('siswa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required',
            'siswa_id' => 'required',
            'judul1' => 'required',
            'judul2' => 'required',
            'kegiatan1' => 'required',
            'kegiatan2' => 'required',
        ]);

        Tematik::create($request->all());

        return redirect()->back()->with('success', 'Tematik created successfully.');
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
    public function edit(Tematik $tematik)
    {
        $siswa_id = session('siswa_id');
        $siswa = Siswa::findOrFail($siswa_id);
        return view('guru.activity.tematik.edit', compact('tematik', 'siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tematik $tematik)
    {
        $request->validate([
            'tanggal' => 'required',
            'siswa_id' => 'required',
            'judul1' => 'required',
            'judul2' => 'required',
            'kegiatan1' => 'required',
            'kegiatan2' => 'required',
        ]);

        $tematik->update($request->all());

        return redirect()->back()->with('success','Tematik updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tematik $tematik)
    {
        $tematik->delete();

        return back()->with('success','Tematik deleted successfully');
    }
}
