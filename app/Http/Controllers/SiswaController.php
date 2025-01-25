<?php

namespace App\Http\Controllers;

use App\Models\Kelompok;
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
        $kindergartens = Siswa::whereIn('kelompok', Kelompok::where('kategori', 'TK')->pluck('id'))->count();
        $playgroups = Siswa::whereIn('kelompok', Kelompok::where('kategori', 'KB')->pluck('id'))->count();
        $babycamps = Siswa::whereIn('kelompok', Kelompok::where('kategori', 'BC')->pluck('id'))->count();

        return view('siswa.index', compact('kindergartens', 'playgroups', 'babycamps'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ortus = User::where('level', '2')->orderBy('name', 'asc')->get();
        $tahuns = Tahun::get();
        $kelompok = Kelompok::all();  // Ambil semua kelompok dari tabel Kelompok
        return view('siswa.create', compact('ortus', 'tahuns', 'kelompok'));
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
            'image' => 'required|image|mimes:png,jpg,jpeg,webp,heic|max:2048',
        ]);

        $input = $request->all();

        if ($request->hasFile('image')) {
            $destinationPath = 'public/images';
            $image = $request->file('image');
            $image_name = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $path = $request->file('image')->storeAs($destinationPath, $image_name);

            $input['image'] = $image_name;
        }

        Siswa::create($input);

        return redirect()->route('siswa.index')
            ->with('success', 'Siswa created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $siswa)
    {
        $ortus = User::where('level', '2')->orderBy('name', 'asc')->get();
        $tahuns = Tahun::get();
        $kelompok = Kelompok::all();  // Ambil data kelompok dari tabel Kelompok
        return view('siswa.edit', compact('siswa', 'ortus', 'tahuns', 'kelompok'));
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
            'image.*' => 'required|image|mimes:png,jpg,jpeg,webp,heic|max:2048',
        ]);

        $input = $request->only(['orangtua_id', 'tahun_id', 'nama', 'panggilan', 'noinduk', 'kelompok', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'agama', 'anakke', 'nama_ayah', 'nama_ibu', 'alamat']);

        if ($request->hasFile('image')) {
            $imageData = [];

            foreach ($request->file('image') as $key => $file) {
                $destinationPath = 'public/images';
                $image_name = date('YmdHis') . '-' . $key . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs($destinationPath, $image_name);

                $imageData[] = $image_name;
            }

            $input['image'] = $imageData[0];
        }

        $siswa->update($input);

        return redirect()->route('siswa.index')
            ->with('success', 'Siswa updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siswa $siswa)
    {
        $siswa->delete();

        return back()->with('success', 'Siswa deleted successfully');
    }

    public function showKindergarten()
    {
        $ortus = User::where('level', '2')->orderBy('name', 'asc')->get();
        // Ambil ID kelompok dengan kategori 'TK'
        $kelompokTK = Kelompok::where('kategori', 'TK')->pluck('id');
        // Ambil siswa yang memiliki kelompok dengan ID yang sesuai
        $siswas = Siswa::whereIn('kelompok', $kelompokTK)->paginate(10);
        $tahuns = Tahun::get();
        return view('siswa.kindergarten', compact('siswas', 'ortus', 'tahuns'));
    }

    public function showPlaygroup()
    {
        $ortus = User::where('level', '2')->orderBy('name', 'asc')->get();
        // Ambil ID kelompok dengan kategori 'KB'
        $kelompokKB = Kelompok::where('kategori', 'KB')->pluck('id');
        // Ambil siswa yang memiliki kelompok dengan ID yang sesuai
        $siswas = Siswa::whereIn('kelompok', $kelompokKB)->paginate(10);
        $tahuns = Tahun::get();
        return view('siswa.playgroup', compact('siswas', 'ortus', 'tahuns'));
    }

    public function showBabycamp()
    {
        $ortus = User::where('level', '2')->orderBy('name', 'asc')->get();
        // Ambil ID kelompok dengan kategori 'BC'
        $kelompokBC = Kelompok::where('kategori', 'BC')->pluck('id');
        // Ambil siswa yang memiliki kelompok dengan ID yang sesuai
        $siswas = Siswa::whereIn('kelompok', $kelompokBC)->paginate(10);
        $tahuns = Tahun::get();
        return view('siswa.babycamp', compact('siswas', 'ortus', 'tahuns'));
    }
}
