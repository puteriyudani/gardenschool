<?php

namespace App\Http\Controllers;

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
}
