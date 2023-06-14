<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('siswa.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ortus = User::where('level', '2')->get();
        return view('siswa.create', compact('ortus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'orangtua_id' => 'required',
            'nama' => 'required',
            'panggilan' => 'required',
            'noinduk' => 'required',
            'kelompok' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'anakke' => 'required',
            'nama_ayah' => 'required',
            'nama_ibu' => 'required',
            'alamat' => 'required',
        ]);
    
        Siswa::create($request->all());
    
        return redirect()->route('siswa.index')
                        ->with('success','Siswa created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $siswa)
    {
        $ortus = User::where('level', '2')->get();
        return view('siswa.edit',compact('siswa', 'ortus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Siswa $siswa)
    {
        $request->validate([
            'orangtua_id' => 'required',
            'nama' => 'required',
            'panggilan' => 'required',
            'noinduk' => 'required',
            'kelompok' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'anakke' => 'required',
            'nama_ayah' => 'required',
            'nama_ibu' => 'required',
            'alamat' => 'required',
        ]);
    
        $siswa->update($request->all());
    
        return redirect()->route('siswa.index')
                        ->with('success','Siswa updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siswa $siswa)
    {
        $siswa->delete();
    
        return back()->with('success','Siswa deleted successfully');
    }

    public function showKindergarten()
    {
        $ortus = User::where('level', '2')->get();
        $siswas = Siswa::where('kelompok', 'kindergarten')->get();
        return view('siswa.kindergarten', compact('siswas', 'ortus'));
    }

    public function showPlaygroup()
    {
        $ortus = User::where('level', '2')->get();
        $siswas = Siswa::where('kelompok', 'playgroup')->get();
        return view('siswa.playgroup', compact('siswas', 'ortus'));
    }

    public function showBabycamp()
    {
        $ortus = User::where('level', '2')->get();
        $siswas = Siswa::where('kelompok', 'babycamp')->get();
        return view('siswa.babycamp', compact('siswas', 'ortus'));
    }
}
