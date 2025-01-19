<?php

namespace App\Http\Controllers;

use App\Models\Pdf;
use App\Models\Youtube;
use Illuminate\Http\Request;

class ProgramControler extends Controller
{
    public function index()
    {
        $pdfs = Pdf::all(); // Ambil semua data PDF
        $youtubes = Youtube::all(); // Ambil semua data YouTube

        // Gabungkan data berdasarkan judul yang sama
        $data = $pdfs->map(function ($pdf) use ($youtubes) {
            $youtube = $youtubes->firstWhere('judul', $pdf->judul); // Cari video YouTube dengan judul yang sama
            return [
                'judul' => $pdf->judul,
                'pdf_keterangan' => $pdf->keterangan,
                'pdf_file' => $pdf->file,
                'youtube_keterangan' => $youtube->keterangan ?? null,
                'youtube_link' => $youtube->link ?? null,
            ];
        });

        return view('program', compact('data'));
    }
}
