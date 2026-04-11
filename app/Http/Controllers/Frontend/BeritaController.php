<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $query = Berita::published()->latest('published_at');

        if ($request->search) {
            $query->where('judul', 'like', '%' . $request->search . '%');
        }
        if ($request->kategori && $request->kategori !== 'All Items') {
            $query->where('kategori', $request->kategori);
        }

        $berita = $query->paginate(9)->withQueryString();
        $featured = Berita::published()->where('kategori', 'Event')->latest('published_at')->first();
        $popular = Berita::published()->latest()->take(3)->get(); // In real app, add views count

        return view('frontend.berita.index', compact('berita', 'featured', 'popular'));
    }

    public function show($slug)
    {
        $berita = Berita::where('slug', $slug)->published()->firstOrFail();
        return view('frontend.berita.show', compact('berita'));
    }
}
