<?php

namespace App\Http\Controllers;

use App\Models\Pdf;
use App\Models\Youtube;
use Illuminate\Http\Request;

class YoutubeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $youtubes = Youtube::paginate(5);
        return view('youtube.index', compact('youtubes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pdfs = Pdf::all();
        return view('youtube.create', compact('pdfs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'keterangan' => 'required',
            'link' => 'required',
        ]);

        Youtube::create($request->all());

        return redirect()->route('youtube.index')
                        ->with('success','Youtube created successfully.');
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
    public function edit(Youtube $youtube)
    {
        $pdfs = Pdf::all();
        return view('youtube.edit',compact('youtube', 'pdfs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Youtube $youtube)
    {
        $request->validate([
            'judul' => 'required',
            'keterangan' => 'required',
            'link' => 'required',
        ]);

        $youtube->update($request->all());

        return redirect()->route('youtube.index')
                        ->with('success','Youtube updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Youtube $youtube)
    {
        $youtube->delete();

        return back()->with('success','Youtube deleted successfully');
    }
}
