<?php

namespace App\Http\Controllers;

use App\Models\Doa;
use App\Models\Hadist;
use App\Models\Islamic;
use App\Models\Quran;
use App\Models\Siswa;
use Illuminate\Http\Request;

class IslamicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function kindergarten($id)
    {
        $siswa = Siswa::findOrFail($id);
        session(['siswa_id' => $id]);
        $islamics = Islamic::with('hadist', 'quran', 'doa')
            ->where('siswa_id', $siswa->id)
            ->get();
        return view('guru.kindergarten.islamic.index', compact('siswa', 'islamics'));
    }

    public function playgroup($id)
    {
        $siswa = Siswa::findOrFail($id);
        session(['siswa_id' => $id]);
        $islamics = Islamic::with('hadist', 'quran', 'doa')
            ->where('siswa_id', $siswa->id)
            ->get();
        return view('guru.playgroup.islamic.index', compact('siswa', 'islamics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $siswa_id = session('siswa_id');
        $siswa = Siswa::findOrFail($siswa_id);
        $hadists = Hadist::get();
        $qurans = Quran::get();
        $doas = Doa::get();
        return view('guru.activity.islamic.create', compact('siswa', 'hadists', 'qurans', 'doas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'tanggal' => 'required',
            'siswa_id' => 'required',
            'hadist' => 'array|required',
            'hadist_stat' => 'required',
            'quran' => 'array|required',
            'quran_stat' => 'required',
            'doa' => 'array|required',
            'doa_stat' => 'required',
            'notifikasi' => 'required',
        ]);

        // Membuat array untuk menyimpan data yang akan diinsert
        $data = [
            'tanggal' => $request->tanggal,
            'siswa_id' => $request->siswa_id,
            'hadist' => json_encode($request->hadist),
            'hadist_stat' => $request->hadist_stat,
            'quran' => json_encode($request->quran),
            'quran_stat' => $request->quran_stat,
            'doa' => json_encode($request->doa),
            'doa_stat' => $request->doa_stat,
            'notifikasi' => $request->notifikasi,
        ];

        // Simpan data ke database
        Islamic::create($data);

        return redirect()->back()->with('success', 'Islamic created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Islamic $islamic)
    {
        $siswa_id = session('siswa_id');
        $siswa = Siswa::findOrFail($siswa_id);
        $hadists = Hadist::get();
        $qurans = Quran::get();
        $doas = Doa::get();
        return view('guru.activity.islamic.edit', compact('islamic', 'siswa', 'hadists', 'qurans', 'doas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'tanggal' => 'required',
            'siswa_id' => 'required',
            'hadist' => 'array|required',
            'hadist_stat' => 'required',
            'quran' => 'array|required',
            'quran_stat' => 'required',
            'doa' => 'array|required',
            'doa_stat' => 'required',
            'notifikasi' => 'required',
        ]);

        // Temukan entri yang akan diupdate
        $islamic = Islamic::findOrFail($id);

        // Membuat array untuk menyimpan data yang akan diupdate
        $data = [
            'tanggal' => $request->tanggal,
            'siswa_id' => $request->siswa_id,
            'hadist' => json_encode($request->hadist),
            'hadist_stat' => $request->hadist_stat,
            'quran' => json_encode($request->quran),
            'quran_stat' => $request->quran_stat,
            'doa' => json_encode($request->doa),
            'doa_stat' => $request->doa_stat,
            'notifikasi' => $request->notifikasi,
        ];

        // Update data di database
        $islamic->update($data);

        return redirect()->back()->with('success', 'Islamic updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Islamic $islamic)
    {
        $islamic->delete();

        return back()->with('success', 'Islamic deleted successfully');
    }
}
