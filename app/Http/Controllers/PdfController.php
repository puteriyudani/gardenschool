<?php

namespace App\Http\Controllers;

use App\Models\Pdf;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pdfs = Pdf::paginate(5);
        return view('pdf.index', compact('pdfs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pdf.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'keterangan' => 'required',
            'file' => 'required|mimes:pdf,xlx,csv|max:2048',
        ]);

        $input = $request->all();

        if ($request->hasFile('file')) {
            $destinationPath = 'public/file';
            $file = $request->file('file');
            $file_name = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $path = $request->file('file')->storeAs($destinationPath,$file_name);

            $input['file'] = $file_name;
        }

        Pdf::create($input);

        return redirect()->route('pdf.index')
                        ->with('success','PDF created successfully.');
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
    public function edit(Pdf $pdf)
    {
        return view('pdf.edit',compact('pdf'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pdf $pdf)
    {
        $request->validate([
            'judul' => 'required',
            'keterangan' => 'required',
            'file' => 'mimes:pdf,xlx,csv|max:2048',
        ]);

        $input = $request->all();

        if ($request->hasFile('file')) {
            $destinationPath = 'public/file';
            $file = $request->file('file');
            $file_name = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $path = $request->file('file')->storeAs($destinationPath,$file_name);

            $input['file'] = $file_name;
        }

        $pdf->update($input);

        return redirect()->route('pdf.index')
                        ->with('success','PDF updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pdf $pdf)
    {
        $pdf->delete();

        return back()->with('success','PDF deleted successfully');
    }
}
