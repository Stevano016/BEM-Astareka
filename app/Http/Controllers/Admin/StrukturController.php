<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StrukturOrganisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;
use Intervention\Image\Encoders\WebpEncoder;

class StrukturController extends Controller
{
    public function index()
    {
        $struktur = StrukturOrganisasi::orderBy('urutan')->paginate(15);
        return view('admin.struktur.index', compact('struktur'));
    }

    public function create()
    {
        return view('admin.struktur.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'nullable|string|max:20',
            'jabatan' => 'required|string|max:100',
            'departemen' => 'nullable|string|max:100',
            'foto' => 'nullable|image|max:2048',
            'quote' => 'nullable|string',
            'urutan' => 'integer',
        ]);

        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $filename = time() . '_' . uniqid() . '.webp';
            $path = 'struktur/' . $filename;

            $img = Image::decode($image);
            $img->scale(width: 800);

            Storage::disk('public')->put($path, $img->encode(new WebpEncoder(quality: 80))->toString());
            $data['foto'] = $path;
        }

        StrukturOrganisasi::create($data);
        return redirect()->route('admin.struktur.index')->with('success', 'Anggota struktur berhasil ditambahkan.');
    }

    public function edit(StrukturOrganisasi $struktur)
    {
        return view('admin.struktur.edit', compact('struktur'));
    }

    public function update(Request $request, StrukturOrganisasi $struktur)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'nullable|string|max:20',
            'jabatan' => 'required|string|max:100',
            'departemen' => 'nullable|string|max:100',
            'foto' => 'nullable|image|max:2048',
            'quote' => 'nullable|string',
            'urutan' => 'integer',
        ]);

        if ($request->hasFile('foto')) {
            if ($struktur->foto) {
                Storage::disk('public')->delete($struktur->foto);
            }

            $image = $request->file('foto');
            $filename = time() . '_' . uniqid() . '.webp';
            $path = 'struktur/' . $filename;

            $img = Image::decode($image);
            $img->scale(width: 800);

            Storage::disk('public')->put($path, $img->encode(new WebpEncoder(quality: 80))->toString());
            $data['foto'] = $path;
        }

        $struktur->update($data);
        return redirect()->route('admin.struktur.index')->with('success', 'Anggota struktur berhasil diperbarui.');
    }

    public function destroy(StrukturOrganisasi $struktur)
    {
        if ($struktur->foto) {
            Storage::disk('public')->delete($struktur->foto);
        }
        $struktur->delete();
        return back()->with('success', 'Anggota struktur berhasil dihapus.');
    }
}