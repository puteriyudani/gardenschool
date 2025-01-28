<?php

namespace App\Http\Controllers;

use App\Models\Tahun;
use Illuminate\Http\Request;

class TahunController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tahuns = Tahun::all();
        return view('tahun.index', compact('tahuns'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tahun.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tahun' => 'required',
        ]);

        Tahun::create($request->all());

        return redirect()->route('tahun.index')
            ->with('success', 'Tahun created successfully.');
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
    public function edit(Tahun $tahun)
    {
        return view('tahun.edit', compact('tahun'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tahun $tahun)
    {
        $request->validate([
            'tahun' => 'required',
        ]);

        $tahun->update($request->all());

        return redirect()->route('tahun.index')
            ->with('success', 'Tahun updated successfully');
    }

    /**
     * Show the form for editing the status of the specified resource.
     */
    public function editStatus(Tahun $tahun)
    {
        return view('tahun.editstatus', compact('tahun'));
    }

    /**
     * Update the status of the specified resource in storage.
     */
    public function updateStatus(Request $request, Tahun $tahun)
    {
        $request->validate([
            'status' => 'required|in:active,inactive', // Validasi untuk hanya menerima status tertentu
        ]);

        $tahun->update(['status' => $request->status]);

        return redirect()->route('tahun.index')
            ->with('success', 'Status updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tahun $tahun)
    {
        $tahun->delete();

        return back()->with('success', 'Tahun deleted successfully');
    }
}
