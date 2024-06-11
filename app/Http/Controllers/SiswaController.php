<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Tahun;
use App\Models\User;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kindergartens = Siswa::where('kelompok', 'kindergarten')->count();
        $playgroups = Siswa::where('kelompok', 'playgroup')->count();
        $babycamps = Siswa::where('kelompok', 'babycamp')->count();
        return view('siswa.index', compact('kindergartens','playgroups', 'babycamps'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ortus = User::where('level', '2')->get();
        $tahuns = Tahun::get();
        return view('siswa.create', compact('ortus', 'tahuns'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'orangtua_id' => 'required',
            'tahun_id' => 'required',
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
            'image' => 'required',
        ]);

        $input = $request->all();

        if ($request->hasFile('image')) {
            $destinationPath = 'public/images';
            $image = $request->file('image');
            $image_name = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $path = $request->file('image')->storeAs($destinationPath,$image_name);

            $input['image'] = $image_name;
        }

        Siswa::create($input);

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
        $tahuns = Tahun::get();
        return view('siswa.edit',compact('siswa', 'ortus', 'tahuns'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Siswa $siswa)
    {
        $request->validate([
            'orangtua_id' => 'required',
            'tahun_id' => 'required',
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
            'image' => 'required',
        ]);

        $input = $request->all();

        if ($request->hasFile('image')) {
            $destinationPath = 'public/images';
            $image = $request->file('image');
            $image_name = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $path = $request->file('image')->storeAs($destinationPath,$image_name);

            $input['image'] = $image_name;
        } else{
            unset($input['image']);
        }

        $siswa->update($input);

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
        $tahuns = Tahun::get();
        return view('siswa.kindergarten', compact('siswas', 'ortus', 'tahuns'));
    }

    public function showPlaygroup()
    {
        $ortus = User::where('level', '2')->get();
        $siswas = Siswa::where('kelompok', 'playgroup')->get();
        $tahuns = Tahun::get();
        return view('siswa.playgroup', compact('siswas', 'ortus', 'tahuns'));
    }

    public function showBabycamp()
    {
        $ortus = User::where('level', '2')->get();
        $siswas = Siswa::where('kelompok', 'babycamp')->get();
        $tahuns = Tahun::get();
        return view('siswa.babycamp', compact('siswas', 'ortus', 'tahuns'));
    }
}
