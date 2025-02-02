<?php

namespace App\Http\Controllers;

use App\Models\Tema;
use Illuminate\Http\Request;

class TemaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tkTemas = Tema::where('kelompok', 'TK')->paginate(5, ['*'], 'tk_page');
        $kbTemas = Tema::where('kelompok', 'KB')->paginate(5, ['*'], 'kb_page');
        $bcTemas = Tema::where('kelompok', 'BC')->paginate(5, ['*'], 'bc_page');

        return view('tema.index', compact('tkTemas', 'kbTemas', 'bcTemas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tema.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kelompok' => 'required',
            'tema' => 'required',
        ]);

        Tema::create($request->all());

        return redirect()->route('tema.index')
            ->with('success', 'Tema created successfully.');
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
    public function edit(Tema $tema)
    {
        return view('tema.edit', compact('tema'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tema $tema)
    {
        $request->validate([
            'kelompok' => 'required',
            'tema' => 'required',
        ]);

        $tema->update($request->all());

        return redirect()->route('tema.index')
            ->with('success', 'Tema updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tema $tema)
    {
        $tema->delete();
        return back()->with('success', 'Tema deleted successfully');
    }
}
