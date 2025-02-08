<?php

namespace App\Http\Controllers;

use App\Models\Brosur;
use App\Models\FileBrosur;
use App\Models\Pdf;
use App\Models\Youtube;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $youtubes = Youtube::get();
        $pdfs = Pdf::get();
        return view('home', compact('youtubes', 'pdfs'));
    }

    public function joinus()
    {
        $brosurs = Brosur::get();
        $filebrosurs = FileBrosur::get();
        return view('joinus', compact('brosurs', 'filebrosurs'));
    }
}
