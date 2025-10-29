<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PositionController extends Controller
{
    public function index(): View
    {
        $positions = Position::latest()->paginate(10);
        return view('positions.index', compact('positions'));
    }

    public function create(): View
    {
        return view('positions.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'nama_jabatan' => 'required|string|max:100',
            'gaji_pokok' => 'required|numeric|min:0' // Tambahkan min:0
        ]);
        
       Position::create($validatedData); // Pastikan Anda menggunakan $validatedData
       return redirect()->route('positions.index')->with('success', 'Jabatan berhasil ditambahkan.');
    }

    public function show(Position $position): View
    {
        return view('positions.show', compact('position'));
    }

    public function edit(Position $position): View
    {
        return view('positions.edit', compact('position'));
    }

    public function update(Request $request, Position $position): RedirectResponse
    {
       $validatedData = $request->validate([
            'nama_jabatan' => 'required|string|max:100',
            'gaji_pokok' => 'required|integer|min:0',
        ]);

        $position->update($validatedData); 
        return redirect()->route('positions.index')->with('success', 'Jabatan berhasil diperbarui.');
    }

    public function destroy(Position $position): RedirectResponse
    {
        $position->delete();
        return redirect()->route('positions.index')->with('success', 'Jabatan berhasil dihapus.');
    }
}