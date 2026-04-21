<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $berita = Berita::where('is_published', true)->latest()->get();

        $content = view('frontend.sitemap', [
            'berita' => $berita,
        ])->render();

        return response($content, 200)
            ->header('Content-Type', 'text/xml');
    }
}
