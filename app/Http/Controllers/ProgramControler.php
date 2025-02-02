<?php

namespace App\Http\Controllers;

use App\Models\Pdf;
use App\Models\Youtube;
use Illuminate\Http\Request;

class ProgramControler extends Controller
{
    public function index(Request $request)
    {
        // Ambil semua kelompok unik dari tema yang berhubungan dengan PDF
        $kelompokList = Pdf::with(['subtopik.topik.tema'])->get()->pluck('subtopik.topik.tema.kelompok')->unique();

        // Ambil kelompok dari query string (default ke kelompok pertama jika tidak ada)
        $selectedKelompok = $request->query('kelompok', $kelompokList->first());

        // Filter PDF berdasarkan kelompok yang dipilih
        $groupedPdfs = Pdf::when($selectedKelompok, function ($query) use ($selectedKelompok) {
            return $query->whereHas('subtopik.topik.tema', function ($query) use ($selectedKelompok) {
                $query->where('kelompok', $selectedKelompok);
            });
        })
            ->with(['subtopik.topik.tema', 'youtubes']) // Memuat relasi subtopik, topik, tema, dan youtubes
            ->get()
            ->groupBy(function ($pdf) {
                return $pdf->subtopik->topik->tema->kelompok; // Kelompok berdasarkan tema
            })
            ->map(function ($kelompokGroup) {
                return $kelompokGroup->groupBy(function ($pdf) {
                    return $pdf->subtopik->topik->tema->tema; // Group berdasarkan tema
                })->map(function ($temaGroup) {
                    return $temaGroup->groupBy(function ($pdf) {
                        return $pdf->subtopik->topik->topik; // Group berdasarkan topik
                    });
                });
            });

        return view('program', compact('groupedPdfs', 'kelompokList', 'selectedKelompok'));
    }
}
