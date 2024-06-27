<?php

namespace App\Http\Controllers;

use App\Models\DoaBaby;
use Illuminate\Http\Request;

class DoaBabyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doas = DoaBaby::paginate(5);
        return view('guru.kelola.islamic.doababy.index', compact('doas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('guru.kelola.islamic.doababy.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'doa' => 'required'
        ]);

        DoaBaby::create($request->all());

        return redirect()->route('doababy.index')->with('success', 'Doa created successfully.');
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
    public function edit(DoaBaby $doa)
    {
        return view('guru.kelola.islamic.doababy.edit', compact('doa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DoaBaby $doa)
    {
        $request->validate([
            'doa' => 'required'
        ]);

        $doa->update($request->all());

        return redirect()->route('doababy.index')->with('success','Doa updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DoaBaby $doa)
    {
        $doa->delete();

        return back()->with('success','Doa deleted successfully');
    }
}
