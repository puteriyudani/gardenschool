<?php

namespace App\Http\Controllers;

use App\Models\Preschool;
use App\Models\Siswa;
use Illuminate\Http\Request;

class PreschoolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function kindergarten($id)
    {
        $siswa = Siswa::findOrFail($id);
        session(['siswa_id' => $id]);
        $preschools = Preschool::where('siswa_id', $siswa->id)->get();
        return view('guru.kindergarten.preschool.index', compact('siswa', 'preschools'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $siswa_id = session('siswa_id');
        $siswa = Siswa::findOrFail($siswa_id);
        return view('guru.activity.preschool.create', compact('siswa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required',
            'siswa_id' => 'required',
            'huruf' => 'required',
            'angka' => 'required',
            'english' => 'required',
        ]);

        Preschool::create($request->all());

        return redirect()->back()->with('success', 'Pre School created successfully.');
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
    public function edit(Preschool $preschool)
    {
        $siswa_id = session('siswa_id');
        $siswa = Siswa::findOrFail($siswa_id);
        return view('guru.activity.preschool.edit', compact('preschool', 'siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Preschool $preschool)
    {
        $request->validate([
            'tanggal' => 'required',
            'siswa_id' => 'required',
            'huruf' => 'required',
            'angka' => 'required',
            'english' => 'required',
        ]);

        $preschool->update($request->all());

        return redirect()->back()->with('success','Pre School updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Preschool $preschool)
    {
        $preschool->delete();

        return back()->with('success','Pre School deleted successfully');
    }
}
