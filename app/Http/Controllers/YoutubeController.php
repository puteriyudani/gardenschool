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
        $youtubes = Youtube::with('pdf')->paginate(5); // Include related Pdf data
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
            'pdf_id' => 'required|exists:pdfs,id', // Ensure pdf_id exists in Pdf table
            'keterangan' => 'required',
            'link' => 'required|url',
        ]);

        // Fetch the judul from the related Pdf
        $pdf = Pdf::findOrFail($request->pdf_id);
        $requestData = $request->all();
        $requestData['judul'] = $pdf->judul; // Automatically set judul from Pdf

        Youtube::create($requestData);

        return redirect()->route('youtube.index')
                         ->with('success', 'Youtube created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Youtube $youtube)
    {
        $pdfs = Pdf::all();
        return view('youtube.edit', compact('youtube', 'pdfs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Youtube $youtube)
    {
        $request->validate([
            'pdf_id' => 'required|exists:pdfs,id', // Ensure pdf_id exists in Pdf table
            'keterangan' => 'required',
            'link' => 'required|url',
        ]);

        // Fetch the updated judul from the related Pdf
        $pdf = Pdf::findOrFail($request->pdf_id);
        $requestData = $request->all();
        $requestData['judul'] = $pdf->judul; // Automatically update judul from Pdf

        $youtube->update($requestData);

        return redirect()->route('youtube.index')
                         ->with('success', 'Youtube updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Youtube $youtube)
    {
        $youtube->delete();

        return back()->with('success', 'Youtube deleted successfully.');
    }
}
