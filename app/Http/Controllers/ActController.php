<?php

namespace App\Http\Controllers;

use App\Models\Act;
use App\Models\Siswa;
use Illuminate\Http\Request;

class ActController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function babycamp($id)
    {
        $siswa = Siswa::findOrFail($id);
        session(['siswa_id' => $id]);
        $acts = Act::where('siswa_id', $siswa->id)->get();
        return view('guru.babycamp.act.index', compact('siswa', 'acts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $siswa_id = session('siswa_id');
        $siswa = Siswa::findOrFail($siswa_id);
        return view('guru.activity.act.create', compact('siswa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required',
            'siswa_id' => 'required',
            'practical' => 'required',
            'sensorial' => 'required',
            'language' => 'required',
            'math' => 'required',
            'culture' => 'required',
            'notifikasi' => 'required',
        ]);

        Act::create($request->all());

        return redirect()->back()->with('success', 'Act Base Learning created successfully.');
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
    public function edit(Act $act)
    {
        $siswa_id = session('siswa_id');
        $siswa = Siswa::findOrFail($siswa_id);
        return view('guru.activity.act.edit', compact('act', 'siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Act $act)
    {
        $request->validate([
            'tanggal' => 'required',
            'siswa_id' => 'required',
            'practical' => 'required',
            'sensorial' => 'required',
            'language' => 'required',
            'math' => 'required',
            'culture' => 'required',
            'notifikasi' => 'required',
        ]);

        $act->update($request->all());

        return redirect()->back()->with('success', 'Act Base Learning updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Act $act)
    {
        $act->delete();

        return back()->with('success', 'Act Base Learning deleted successfully');
    }
}
