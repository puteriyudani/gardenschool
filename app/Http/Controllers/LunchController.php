<?php

namespace App\Http\Controllers;

use App\Models\Lunch;
use App\Models\Menu;
use App\Models\Siswa;
use Illuminate\Http\Request;

class LunchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function babycamp($id)
    {
        $siswa = Siswa::findOrFail($id);
        session(['siswa_id' => $id]);
        $lunchs = Lunch::with('menu')
            ->where('siswa_id', $siswa->id)
            ->get();
        return view('guru.babycamp.lunch.index', compact('siswa', 'lunchs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $siswa_id = session('siswa_id');
        $siswa = Siswa::findOrFail($siswa_id);
        $menus = Menu::get();
        return view('guru.activity.lunch.create', compact('siswa', 'menus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required',
            'siswa_id' => 'required',
            'menu_id' => 'required',
            'keterangan' => 'required',
            'indikator' => 'required',
            'catatan' => 'required',
        ]);

        Lunch::create($request->all());

        return redirect()->back()->with('success', 'Lunch created successfully.');
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
    public function edit(Lunch $lunch)
    {
        $siswa_id = session('siswa_id');
        $siswa = Siswa::findOrFail($siswa_id);
        $menus = Menu::get();
        return view('guru.activity.lunch.edit', compact('lunch', 'siswa', 'menus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lunch $lunch)
    {
        $request->validate([
            'tanggal' => 'required',
            'siswa_id' => 'required',
            'menu_id' => 'required',
            'keterangan' => 'required',
            'indikator' => 'required',
            'catatan' => 'required',
        ]);

        $lunch->update($request->all());

        return redirect()->back()->with('success', 'Lunch updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lunch $lunch)
    {
        $lunch->delete();

        return back()->with('success','Lunch deleted successfully');
    }
}
