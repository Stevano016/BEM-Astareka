<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Aspirasi;
use App\Models\StrukturOrganisasi;
use App\Models\ProgramKerja;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_berita' => Berita::published()->count(),
            'aspirasi_baru' => Aspirasi::where('status', 'baru')->count(),
            'total_struktur' => StrukturOrganisasi::where('is_active', true)->count(),
            'total_program' => ProgramKerja::where('is_active', true)->count(),
        ];
        $aspirasiTerbaru = Aspirasi::latest()->take(5)->get();
        return view('admin.dashboard', compact('stats', 'aspirasiTerbaru'));
    }
}
