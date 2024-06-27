<?php

namespace App\Http\Controllers;

use App\Models\HadistBaby;
use Illuminate\Http\Request;

class HadistBabyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hadists = HadistBaby::paginate(5);
        return view('guru.kelola.islamic.hadistbaby.index', compact('hadists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('guru.kelola.islamic.hadistbaby.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'hadist' => 'required'
        ]);

        HadistBaby::create($request->all());

        return redirect()->route('hadistbaby.index')->with('success', 'Hadist created successfully.');
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
    public function edit(HadistBaby $hadist)
    {
        return view('guru.kelola.islamic.hadistbaby.edit', compact('hadist'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HadistBaby $hadist)
    {
        $request->validate([
            'hadist' => 'required'
        ]);

        $hadist->update($request->all());

        return redirect()->route('hadistbaby.index')->with('success','Hadist updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HadistBaby $hadist)
    {
        $hadist->delete();

        return back()->with('success','Hadist deleted successfully');
    }
}
