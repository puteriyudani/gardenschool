<?php

namespace App\Http\Controllers;

use App\Models\Breakfast;
use App\Models\Menu;
use App\Models\Siswa;
use Illuminate\Http\Request;

class BreakfastController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function kindergarten($id)
    {
        $siswa = Siswa::findOrFail($id);
        session(['siswa_id' => $id]);
        $breakfasts = Breakfast::with('menu')
            ->where('siswa_id', $siswa->id)
            ->get();
        return view('guru.kindergarten.breakfast.index', compact('siswa', 'breakfasts'));
    }

    public function playgroup($id)
    {
        $siswa = Siswa::findOrFail($id);
        session(['siswa_id' => $id]);
        $breakfasts = Breakfast::with('menu')
            ->where('siswa_id', $siswa->id)
            ->get();
        return view('guru.playgroup.breakfast.index', compact('siswa', 'breakfasts'));
    }

    public function babycamp($id)
    {
        $siswa = Siswa::findOrFail($id);
        session(['siswa_id' => $id]);
        $breakfasts = Breakfast::with('menu')
            ->where('siswa_id', $siswa->id)
            ->get();
        return view('guru.babycamp.breakfast.index', compact('siswa', 'breakfasts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $siswa_id = session('siswa_id');
        $siswa = Siswa::findOrFail($siswa_id);
        $menus = Menu::get();
        return view('guru.activity.breakfast.create', compact('siswa', 'menus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required',
            'siswa_id' => 'required',
            'menu' => 'required',
            'keterangan' => 'required',
            'indikator' => 'required',
            'catatan' => 'required',
        ]);

        Breakfast::create($request->all());

        return redirect()->back()->with('success', 'Breakfast created successfully.');
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
    public function edit(Breakfast $breakfast)
    {
        $siswa_id = session('siswa_id');
        $siswa = Siswa::findOrFail($siswa_id);
        $menus = Menu::get();
        return view('guru.activity.breakfast.edit', compact('breakfast', 'siswa', 'menus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Breakfast $breakfast)
    {
        $request->validate([
            'tanggal' => 'required',
            'siswa_id' => 'required',
            'menu' => 'required',
            'keterangan' => 'required',
            'indikator' => 'required',
            'catatan' => 'required',
        ]);

        $breakfast->update($request->all());

        return redirect()->back()->with('success', 'Breakfast updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Breakfast $breakfast)
    {
        $breakfast->delete();

        return back()->with('success','Breakfast deleted successfully');
    }
}
