<?php

namespace App\Http\Controllers;

use App\Models\FileBrosur;
use Illuminate\Http\Request;

class FileBrosurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $filebrosurs = FileBrosur::all();
        return view('filebrosur.index', compact('filebrosurs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('filebrosur.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'file' => 'required|mimes:pdf,xlx,csv|max:2048',
        ]);

        $input = $request->all();

        if ($request->hasFile('file')) {
            $destinationPath = 'public/file';
            $file = $request->file('file');
            $file_name = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $path = $request->file('file')->storeAs($destinationPath, $file_name);

            $input['file'] = $file_name;
        }

        FileBrosur::create($input);

        return redirect()->route('filebrosur.index')
            ->with('success', 'File Brosur created successfully.');
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
    public function edit(FileBrosur $filebrosur)
    {
        return view('filebrosur.edit', compact('filebrosur'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FileBrosur $filebrosur)
    {
        $request->validate([
            'name' => 'required',
            'file' => 'nullable|mimes:pdf,xlx,csv|max:2048',
        ]);

        $input = $request->all();

        if ($request->hasFile('file')) {
            $destinationPath = 'public/file';
            $file = $request->file('file');
            $file_name = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $path = $request->file('file')->storeAs($destinationPath, $file_name);

            $input['file'] = $file_name;
        } else {
            // Jika tidak ada file yang diupload, biarkan field 'file' tidak berubah
            unset($input['file']);
        }

        $filebrosur->update($input);

        return redirect()->route('filebrosur.index')
            ->with('success', 'File Brosur updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FileBrosur $filebrosur)
    {
        $filebrosur->delete();

        return back()->with('success', 'File Brosur deleted successfully');
    }
}
