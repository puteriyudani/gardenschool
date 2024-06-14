<?php

namespace App\Http\Controllers;

use App\Models\Recalling;
use App\Models\Siswa;
use Illuminate\Http\Request;

class RecallingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function kindergarten($id)
    {
        $siswa = Siswa::findOrFail($id);
        session(['siswa_id' => $id]);
        $recallings = Recalling::where('siswa_id', $siswa->id)->get();
        return view('guru.kindergarten.recalling.index', compact('siswa', 'recallings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $siswa_id = session('siswa_id');
        $siswa = Siswa::findOrFail($siswa_id);
        return view('guru.activity.recalling.create', compact('siswa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required',
            'siswa_id' => 'required',
            'indikator' => 'required',
            'keterangan' => 'required',
            'notifikasi' => 'required',
        ]);

        Recalling::create($request->all());

        return redirect()->back()->with('success', 'Recalling created successfully.');
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
    public function edit(Recalling $recalling)
    {
        $siswa_id = session('siswa_id');
        $siswa = Siswa::findOrFail($siswa_id);
        return view('guru.activity.recalling.edit', compact('recalling', 'siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Recalling $recalling)
    {
        $request->validate([
            'tanggal' => 'required',
            'siswa_id' => 'required',
            'indikator' => 'required',
            'keterangan' => 'required',
            'notifikasi' => 'required',
        ]);

        $recalling->update($request->all());

        return redirect()->back()->with('success','Recalling updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recalling $recalling)
    {
        $recalling->delete();

        return back()->with('success','Recalling deleted successfully');
    }
}
