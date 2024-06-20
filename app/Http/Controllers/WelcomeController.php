<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Welcome;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function kindergarten($id)
    {
        $siswa = Siswa::findOrFail($id);
        session(['siswa_id' => $id]);
        $welcomes = Welcome::where('siswa_id', $siswa->id)->get();
        return view('guru.kindergarten.welcome.index', compact('siswa', 'welcomes'));
    }

    public function playgroup($id)
    {
        $siswa = Siswa::findOrFail($id);
        session(['siswa_id' => $id]);
        $welcomes = Welcome::where('siswa_id', $siswa->id)->get();
        return view('guru.playgroup.welcome.index', compact('siswa', 'welcomes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $siswa_id = session('siswa_id');
        $siswa = Siswa::findOrFail($siswa_id);
        return view('guru.activity.welcome.create', compact('siswa'));
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

        Welcome::create($request->all());

        return redirect()->back()->with('success', 'Welcome created successfully.');
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
    public function edit(Welcome $welcome)
    {
        $siswa_id = session('siswa_id');
        $siswa = Siswa::findOrFail($siswa_id);
        return view('guru.activity.welcome.edit', compact('welcome', 'siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Welcome $welcome)
    {
        $request->validate([
            'tanggal' => 'required',
            'siswa_id' => 'required',
            'indikator' => 'required',
            'keterangan' => 'required',
            'notifikasi' => 'required',
        ]);

        $welcome->update($request->all());

        return redirect()->back()->with('success','Welcome updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Welcome $welcome)
    {
        $welcome->delete();

        return back()->with('success','Welcome deleted successfully');
    }
}
