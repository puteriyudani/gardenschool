<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DownloadController extends Controller
{
    public function store(Request $request)
    {
        DB::table('downloads')->insert([
            'user_id' => $request->user_id,
            'tanggal' => $request->tanggal,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return response()->json(['success' => true]);
    }
}
