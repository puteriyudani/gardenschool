<?php

namespace App\Http\Controllers;

use App\Models\QuranBaby;
use Illuminate\Http\Request;

class QuranBabyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $qurans = QuranBaby::paginate(5);
        return view('guru.kelola.islamic.quranbaby.index', compact('qurans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('guru.kelola.islamic.quranbaby.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'quran' => 'required'
        ]);

        QuranBaby::create($request->all());

        return redirect()->route('quranbaby.index')->with('success', 'Quran created successfully.');
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
    public function edit(QuranBaby $quran)
    {
        return view('guru.kelola.islamic.quranbaby.edit', compact('quran'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, QuranBaby $quran)
    {
        $request->validate([
            'quran' => 'required'
        ]);

        $quran->update($request->all());

        return redirect()->route('quranbaby.index')->with('success','Quran updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(QuranBaby $quran)
    {
        $quran->delete();

        return back()->with('success','Quran deleted successfully');
    }
}
