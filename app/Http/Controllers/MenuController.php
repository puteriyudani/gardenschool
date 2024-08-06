<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::paginate(5);
        return view('guru.kelola.menu.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('guru.kelola.menu.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'menu' => 'required',
            'karbohidrat' => 'required',
            'protein' => 'required',
            'lemak' => 'required',
            'serat' => 'required',
            'kalori' => 'required',
        ]);

        Menu::create($request->all());

        return redirect()->route('menu.index')->with('success', 'Menu created successfully.');
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
    public function edit(Menu $menu)
    {
        return view('guru.kelola.menu.edit', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'menu' => 'required',
            'karbohidrat' => 'required',
            'protein' => 'required',
            'lemak' => 'required',
            'serat' => 'required',
            'kalori' => 'required',
        ]);

        $menu->update($request->all());

        return redirect()->route('menu.index')->with('success','Menu updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();

        return back()->with('success','Menu deleted successfully');
    }
}
