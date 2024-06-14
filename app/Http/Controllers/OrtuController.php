<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class OrtuController extends Controller
{
    public function test()
    {
        return view('orangtua.test');
    }
    public function index()
    {
        return view('orangtua.index');
    }
}
