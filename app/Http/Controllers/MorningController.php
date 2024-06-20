<?php

namespace App\Http\Controllers;

use App\Models\Morning;
use App\Models\Siswa;
use Illuminate\Http\Request;

class MorningController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function kindergarten($id)
    {
        $siswa = Siswa::findOrFail($id);
        session(['siswa_id' => $id]);
        $mornings = Morning::where('siswa_id', $siswa->id)->get();
        return view('guru.kindergarten.morning.index', compact('siswa', 'mornings'));
    }

    public function playgroup($id)
    {
        $siswa = Siswa::findOrFail($id);
        session(['siswa_id' => $id]);
        $mornings = Morning::where('siswa_id', $siswa->id)->get();
        return view('guru.playgroup.morning.index', compact('siswa', 'mornings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $siswa_id = session('siswa_id');
        $siswa = Siswa::findOrFail($siswa_id);
        return view('guru.activity.morning.create', compact('siswa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required',
            'siswa_id' => 'required',
            'kegiatan' => 'required',
            'circletime' => 'required|array',
            'circletime.*' => 'string',
            'notifikasi' => 'required',
        ]);

        $data = $request->all();
        $data['circletime'] = implode(', ', $request->circletime);

        Morning::create($data);

        return redirect()->back()->with('success', 'Morning created successfully.');
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
    public function edit(Morning $morning)
    {
        $siswa_id = session('siswa_id');
        $siswa = Siswa::findOrFail($siswa_id);
        return view('guru.activity.morning.edit', compact('morning', 'siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Morning $morning)
    {
        $request->validate([
            'tanggal' => 'required',
            'siswa_id' => 'required',
            'kegiatan' => 'required',
            'circletime' => 'required|array',
            'notifikasi' => 'required',
        ]);

        // Menggabungkan nilai checkbox circletime menjadi satu string yang dipisahkan koma
        $circletime = implode(', ', $request->circletime);

        $morning->update([
            'tanggal' => $request->tanggal,
            'siswa_id' => $request->siswa_id,
            'kegiatan' => $request->kegiatan,
            'circletime' => $circletime,
            'notifikasi' => $request->notifikasi,
        ]);

        return redirect()->back()->with('success', 'Morning updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Morning $morning)
    {
        $morning->delete();

        return back()->with('success', 'Morning deleted successfully');
    }
}
