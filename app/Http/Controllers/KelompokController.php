<?php

namespace App\Http\Controllers;

use App\Models\Kelompok;
use Illuminate\Http\Request;

class KelompokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelompoks = Kelompok::all();
        return view('kelompok.index', compact('kelompoks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kelompok.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kelompok' => 'required',
            'kategori' => 'required',
        ]);

        Kelompok::create($request->all());

        return redirect()->route('kelompok.index')
            ->with('success', 'Kelompok created successfully.');
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
    public function edit(Kelompok $kelompok)
    {
        return view('kelompok.edit', compact('kelompok'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kelompok $kelompok)
    {
        $request->validate([
            'kelompok' => 'required',
            'kategori' => 'required',
        ]);

        $kelompok->update($request->all());

        return redirect()->route('kelompok.index')
            ->with('success', 'Kelompok updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kelompok $kelompok)
    {
        $kelompok->delete();

        return back()->with('success', 'Kelompok deleted successfully');
    }
}
