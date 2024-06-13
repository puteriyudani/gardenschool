<?php

namespace App\Http\Controllers;

use App\Models\Pooppee;
use App\Models\Siswa;
use Illuminate\Http\Request;

class PoopPeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function kindergarten($id)
    {
        $siswa = Siswa::findOrFail($id);
        session(['siswa_id' => $id]);
        $pooppees = Pooppee::where('siswa_id', $siswa->id)->get();
        return view('guru.kindergarten.pooppee.index', compact('siswa', 'pooppees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $siswa_id = session('siswa_id');
        $siswa = Siswa::findOrFail($siswa_id);
        return view('guru.activity.pooppee.create', compact('siswa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required',
            'siswa_id' => 'required',
            'poop' => 'required',
            'pee' => 'required',
            'catatan' => 'required',
        ]);

        Pooppee::create($request->all());

        return redirect()->back()->with('success', 'Poop & Pee created successfully.');
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
    public function edit(Pooppee $pooppee)
    {
        $siswa_id = session('siswa_id');
        $siswa = Siswa::findOrFail($siswa_id);
        return view('guru.activity.pooppee.edit', compact('pooppee', 'siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pooppee $pooppee)
    {
        $request->validate([
            'tanggal' => 'required',
            'siswa_id' => 'required',
            'poop' => 'required',
            'pee' => 'required',
            'catatan' => 'required',
        ]);

        $pooppee->update($request->all());

        return redirect()->back()->with('success', 'Poop & Pee updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pooppee $pooppee)
    {
        $pooppee->delete();

        return back()->with('success', 'Poop & Pee deleted successfully');
    }
}
