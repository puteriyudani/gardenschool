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

    public function showKindergarten(Request $request)
    {
        $ortus = User::where('level', '2')->orderBy('name', 'asc')->get();
        $kelompokTK = Kelompok::where('kategori', 'TK')->pluck('id');
        $tahuns = Tahun::get();

        // Ambil tahun dari request
        $tahunId = $request->get('tahun');

        // Filter siswa berdasarkan kelompok TK dan tahun jika tersedia
        $siswas = Siswa::whereIn('kelompok', $kelompokTK)
            ->when($tahunId, function ($query) use ($tahunId) {
                $query->where('tahun_id', $tahunId);
            })
            ->orderBy('nama', 'asc')
            ->paginate(10);

        return view('siswa.kindergarten', compact('siswas', 'ortus', 'tahuns'));
    }

    public function showPlaygroup(Request $request)
    {
        $ortus = User::where('level', '2')->orderBy('name', 'asc')->get();
        $kelompokKB = Kelompok::where('kategori', 'KB')->pluck('id');
        $tahuns = Tahun::get();

        // Ambil tahun dari request
        $tahunId = $request->get('tahun');

        // Filter siswa berdasarkan kelompok KB dan tahun jika tersedia
        $siswas = Siswa::whereIn('kelompok', $kelompokKB)
            ->when($tahunId, function ($query) use ($tahunId) {
                $query->where('tahun_id', $tahunId);
            })
            ->orderBy('nama', 'asc')
            ->paginate(10);

        return view('siswa.playgroup', compact('siswas', 'ortus', 'tahuns'));
    }

    public function showBabycamp(Request $request)
    {
        $ortus = User::where('level', '2')->orderBy('name', 'asc')->get();
        $kelompokBC = Kelompok::where('kategori', 'BC')->pluck('id');
        $tahuns = Tahun::get();

        // Ambil tahun dari request
        $tahunId = $request->get('tahun');

        // Filter siswa berdasarkan kelompok BC dan tahun jika tersedia
        $siswas = Siswa::whereIn('kelompok', $kelompokBC)
            ->when($tahunId, function ($query) use ($tahunId) {
                $query->where('tahun_id', $tahunId);
            })
            ->orderBy('nama', 'asc')
            ->paginate(10);

        return view('siswa.babycamp', compact('siswas', 'ortus', 'tahuns'));
    }
}
