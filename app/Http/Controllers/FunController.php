<?php

namespace App\Http\Controllers;

use App\Models\Fun;
use App\Models\Siswa;
use Illuminate\Http\Request;

class FunController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function babycamp($id)
    {
        $siswa = Siswa::findOrFail($id);
        session(['siswa_id' => $id]);
        $funs = Fun::where('siswa_id', $siswa->id)->get();
        return view('guru.babycamp.fun.index', compact('siswa', 'funs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $siswa_id = session('siswa_id');
        $siswa = Siswa::findOrFail($siswa_id);
        return view('guru.activity.fun.create', compact('siswa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required',
            'siswa_id' => 'required',
            'tidur' => 'required',
            'poop' => 'required',
            'pee' => 'required',
            'mandi' => 'required',
            'notifikasi' => 'required',
        ]);

        Fun::create($request->all());

        return redirect()->back()->with('success', 'Fun Activities created successfully.');
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
    public function edit(Fun $fun)
    {
        $siswa_id = session('siswa_id');
        $siswa = Siswa::findOrFail($siswa_id);
        return view('guru.activity.fun.edit', compact('fun', 'siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fun $fun)
    {
        $request->validate([
            'tanggal' => 'required',
            'siswa_id' => 'required',
            'tidur' => 'required',
            'poop' => 'required',
            'pee' => 'required',
            'mandi' => 'required',
            'notifikasi' => 'required',
        ]);

        $fun->update($request->all());

        return redirect()->back()->with('success', 'Fun Activities updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fun $fun)
    {
        $fun->delete();

        return back()->with('success', 'Fun Activities deleted successfully');
    }
}
