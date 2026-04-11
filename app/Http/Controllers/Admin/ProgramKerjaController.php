<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProgramKerja;
use Illuminate\Http\Request;

class ProgramKerjaController extends Controller
{
    public function index()
    {
        $programKerja = ProgramKerja::orderBy('urutan')->paginate(10);
        return view('admin.program-kerja.index', compact('programKerja'));
    }

    public function create()
    {
        return view('admin.program-kerja.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'departemen' => 'nullable|string|max:100',
            'icon' => 'required|string|max:50',
            'bg_style' => 'required|string',
            'is_featured' => 'boolean',
            'urutan' => 'integer',
        ]);

        ProgramKerja::create($data);
        return redirect()->route('admin.program-kerja.index')->with('success', 'Program kerja berhasil ditambahkan.');
    }

    public function edit(ProgramKerja $programKerja)
    {
        return view('admin.program-kerja.edit', compact('programKerja'));
    }

    public function update(Request $request, ProgramKerja $programKerja)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'departemen' => 'nullable|string|max:100',
            'icon' => 'required|string|max:50',
            'bg_style' => 'required|string',
            'is_featured' => 'boolean',
            'urutan' => 'integer',
        ]);

        $programKerja->update($data);
        return redirect()->route('admin.program-kerja.index')->with('success', 'Program kerja berhasil diperbarui.');
    }

    public function destroy(ProgramKerja $programKerja)
    {
        $programKerja->delete();
        return back()->with('success', 'Program kerja berhasil dihapus.');
    }
}
