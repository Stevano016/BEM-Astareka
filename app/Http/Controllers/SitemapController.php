<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index(): Response
{
    $berita = Berita::where('is_published', true)
                    ->whereNotNull('slug')
                    ->latest('updated_at')  // sort by updated, bukan created
                    ->get();

    $content = view('frontend.sitemap', [
        'berita' => $berita,
    ])->render();

    return response($content, 200)
        ->header('Content-Type', 'application/xml');
}
}
