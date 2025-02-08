<?php

namespace App\Http\Controllers;

use App\Models\Brosur;
use Illuminate\Http\Request;

class BrosurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brosurs = Brosur::all();
        return view('brosur.index', compact('brosurs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('brosur.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
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

        Brosur::create($input);

        return redirect()->route('brosur.index')
            ->with('success', 'Brosur created successfully.');
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
    public function edit(Brosur $brosur)
    {
        return view('brosur.edit', compact('brosur'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brosur $brosur)
    {
        $request->validate([
            'name' => 'required',
            'image.*' => 'required|image|mimes:png,jpg,jpeg,webp,heic|max:2048',
        ]);

        $input = $request->only(['name']);

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

        $brosur->update($input);

        return redirect()->route('brosur.index')
            ->with('success', 'Brosur updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brosur $brosur)
    {
        $brosur->delete();

        return back()->with('success', 'Brosur deleted successfully');
    }
}
