<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KalenderEvent;
use Illuminate\Http\Request;

class KalenderController extends Controller
{
    public function index()
    {
        $events = KalenderEvent::latest()->paginate(10);
        return view('admin.kalender.index', compact('events'));
    }

    public function create()
    {
        return view('admin.kalender.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'waktu_mulai' => 'required|date',
            'waktu_selesai' => 'nullable|date|after_or_equal:waktu_mulai',
            'warna' => 'required|string',
            'deskripsi' => 'nullable|string'
        ]);

        KalenderEvent::create($request->all());

        return redirect()->route('admin.kalender.index')->with('success', 'Event berhasil ditambahkan.');
    }

    public function edit(KalenderEvent $kalender)
    {
        return view('admin.kalender.edit', compact('kalender'));
    }

    public function update(Request $request, KalenderEvent $kalender)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'waktu_mulai' => 'required|date',
            'waktu_selesai' => 'nullable|date|after_or_equal:waktu_mulai',
            'warna' => 'required|string',
            'deskripsi' => 'nullable|string'
        ]);

        $kalender->update($request->all());

        return redirect()->route('admin.kalender.index')->with('success', 'Event berhasil diperbarui.');
    }

    public function destroy(KalenderEvent $kalender)
    {
        $kalender->delete();
        return redirect()->route('admin.kalender.index')->with('success', 'Event berhasil dihapus.');
    }
}
