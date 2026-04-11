<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Aspirasi;
use Illuminate\Http\Request;

class AspirasiController extends Controller
{
    public function index(Request $request)
    {
        $query = Aspirasi::latest();
        if ($request->status) {
            $query->where('status', $request->status);
        }
        $aspirasi = $query->paginate(15);
        return view('admin.aspirasi.index', compact('aspirasi'));
    }

    public function show($id)
    {
        $aspirasi = Aspirasi::findOrFail($id);
        return view('admin.aspirasi.show', compact('aspirasi'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:baru,dibaca,diproses,selesai',
            'catatan_admin' => 'nullable|string',
        ]);

        $aspirasi = Aspirasi::findOrFail($id);
        $aspirasi->update([
            'status' => $request->status,
            'catatan_admin' => $request->catatan_admin,
        ]);

        return back()->with('success', 'Status aspirasi berhasil diperbarui.');
    }
}
