<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use App\Models\ProgramKerja;
use App\Models\Berita;
use App\Models\ProfileBem;
use App\Models\KalenderEvent;

class BerandaController extends Controller
{
    public function index()
    {
        $hero = Hero::where('is_active', true)->first();
        $programKerja = ProgramKerja::where('is_active', true)->orderBy('urutan')->get();
        $beritaTerkini = Berita::published()->latest('published_at')->take(3)->get();
        $nextEvent = Berita::published()->where('kategori', 'Event')->latest('published_at')->first();
        $visi = ProfileBem::getValue('visi');
        $misi = ProfileBem::getValue('misi');
        $kalenderEvents = KalenderEvent::all()->map(function($event) {
            return [
                'title' => $event->judul,
                'start' => \Carbon\Carbon::parse($event->waktu_mulai)->toIso8601String(),
                'end' => $event->waktu_selesai ? \Carbon\Carbon::parse($event->waktu_selesai)->toIso8601String() : null,
                'color' => $event->warna,
                'description' => $event->deskripsi
            ];
        });

        return view('frontend.beranda', compact('hero', 'programKerja', 'beritaTerkini', 'nextEvent', 'visi', 'misi', 'kalenderEvents'));
    }
}
