<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBeritaRequest;
use App\Http\Requests\UpdateBeritaRequest;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $query = Berita::latest();
        if ($request->search) {
            $query->where('judul', 'like', '%' . $request->search . '%');
        }
        $berita = $query->paginate(10);
        return view('admin.berita.index', compact('berita'));
    }

    public function create()
    {
        return view('admin.berita.create');
    }

    public function store(StoreBeritaRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('berita', 'public');
        }
        $data['user_id'] = auth()->id();
        if ($request->is_published) {
            $data['published_at'] = now();
        }

        Berita::create($data);
        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dibuat.');
    }

    public function edit(Berita $berita)
    {
        return view('admin.berita.edit', compact('berita'));
    }

    public function update(UpdateBeritaRequest $request, Berita $berita)
    {
        $data = $request->validated();
        if ($request->hasFile('gambar')) {
            if ($berita->gambar) {
                Storage::disk('public')->delete($berita->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('berita', 'public');
        }

        if ($request->is_published && !$berita->is_published) {
            $data['published_at'] = now();
        }

        $berita->update($data);
        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(Berita $berita)
    {
        if ($berita->gambar) {
            Storage::disk('public')->delete($berita->gambar);
        }
        $berita->delete();
        return back()->with('success', 'Berita berhasil dihapus.');
    }

    public function togglePublish(Berita $berita)
    {
        $berita->is_published = !$berita->is_published;
        if ($berita->is_published && !$berita->published_at) {
            $berita->published_at = now();
        }
        $berita->save();
        return back()->with('success', 'Status publikasi berhasil diubah.');
    }
}
