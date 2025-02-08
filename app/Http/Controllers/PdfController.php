<?php

namespace App\Http\Controllers;

use App\Models\Pdf;
use App\Models\SubTopik;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $kelompok = null)
    {
        // Ambil semua kelompok unik dari tema yang berhubungan dengan topik
        $kelompokList = Pdf::with(['subtopik.topik.tema'])->get()->pluck('subtopik.topik.tema.kelompok')->unique();

        // Ambil kelompok dari query string (default ke kelompok pertama jika tidak ada)
        $selectedKelompok = $request->query('kelompok', $kelompokList->first());

        // Filter PDF berdasarkan kelompok yang dipilih
        $groupedPdfs = Pdf::when($selectedKelompok, function ($query) use ($selectedKelompok) {
            return $query->whereHas('subtopik.topik.tema', function ($query) use ($selectedKelompok) {
                $query->where('kelompok', $selectedKelompok);
            });
        })
            ->get()
            ->groupBy('subtopik.topik.tema.kelompok') // Grouping berdasarkan kelompok
            ->map(function ($kelompokGroup) {
                return $kelompokGroup->groupBy('subtopik.topik.tema.tema') // Grouping berdasarkan tema
                    ->map(function ($temaGroup) {
                        return $temaGroup->groupBy('subtopik.topik.topik') // Grouping berdasarkan topik
                            ->map(function ($topikGroup) {
                                return $topikGroup->groupBy('subtopik.subtopik'); // Grouping berdasarkan subtopik
                            });
                    });
            });

        return view('pdf.index', compact('groupedPdfs', 'kelompokList', 'selectedKelompok'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Mengambil semua subtopik dengan relasi topik, tema, dan kelompok
        $subtopiks = SubTopik::with(['topik.tema'])->get();

        return view('pdf.create', compact('subtopiks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'file' => 'required|mimes:pdf,xlx,csv|max:2048',
            'subtopik_id' => 'required|exists:sub_topiks,id', // Validasi untuk subtopik_id
        ]);

        $input = $request->all();

        if ($request->hasFile('file')) {
            $destinationPath = 'public/file';
            $file = $request->file('file');
            $file_name = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $path = $request->file('file')->storeAs($destinationPath, $file_name);

            $input['file'] = $file_name;
        }

        Pdf::create($input);

        return redirect()->route('pdf.index')
            ->with('success', 'PDF created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pdf $pdf)
    {
        // Mengambil semua subtopik dengan relasi topik, tema, dan kelompok
        $subtopiks = SubTopik::with(['topik.tema'])->get();
        return view('pdf.edit', compact('pdf', 'subtopiks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pdf $pdf)
    {
        $request->validate([
            'judul' => 'required',
            'file' => 'nullable|mimes:pdf,xlx,csv|max:2048',
            'subtopik_id' => 'required|exists:sub_topiks,id', // Validasi untuk subtopik_id
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

        $pdf->update($input);

        return redirect()->route('pdf.index')
            ->with('success', 'PDF updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pdf $pdf)
    {
        $pdf->delete();

        return back()->with('success', 'PDF deleted successfully');
    }
}
