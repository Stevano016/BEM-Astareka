<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\StrukturOrganisasi;
use App\Models\ProgramKerja;
use App\Models\ProfileBem;

class TentangController extends Controller
{
    public function index()
    {
        $strukturUtama = StrukturOrganisasi::whereIn('jabatan', ['Ketua BEM', 'Wakil Ketua BEM'])
            ->where('is_active', true)->orderBy('urutan')->get();

        $strukturPendukung = StrukturOrganisasi::whereIn('jabatan', ['Sekretaris', 'Bendahara'])
            ->where('is_active', true)->orderBy('urutan')->get();

        $kementerian = StrukturOrganisasi::where('is_active', true)
            ->where(function($q) {
                $q->where('jabatan', 'like', '%Menteri%')
                  ->orWhere('jabatan', 'like', '%Kepala%')
                  ->orWhere('jabatan', 'Ketua Divisi');
            })
            ->whereNotIn('jabatan', ['Ketua BEM', 'Wakil Ketua BEM'])
            ->orderBy('urutan')->get();

        $staff = StrukturOrganisasi::where('is_active', true)
            ->where('jabatan', 'like', '%Staff%')
            ->orderBy('urutan')->get();

        // Data khusus untuk Bagan Struktur (Tree)
        $ketua = StrukturOrganisasi::where('jabatan', 'Ketua BEM')->first();
        $wakilKetua = StrukturOrganisasi::where('jabatan', 'Wakil Ketua BEM')->first();
        $sekretaris = StrukturOrganisasi::where('jabatan', 'Sekretaris')->orderBy('urutan')->get();
        $bendahara = StrukturOrganisasi::where('jabatan', 'Bendahara')->orderBy('urutan')->get();
        
        $divisiData = StrukturOrganisasi::whereNotNull('departemen')
            ->whereIn('jabatan', ['Ketua Divisi', 'Staff'])
            ->orderBy('urutan')
            ->get()
            ->groupBy('departemen');

        $divisiTree = [];
        foreach ($divisiData as $deptName => $members) {
            $divisiTree[] = [
                'divisi' => $deptName,
                'ketua' => $members->where('jabatan', 'Ketua Divisi')->first(),
                'anggota' => $members->where('jabatan', 'Staff')
            ];
        }

        $departemen = ProgramKerja::where('is_active', true)->orderBy('urutan')->get();
        $profileBem = ProfileBem::pluck('value', 'key');

        return view('frontend.tentang', compact(
            'strukturUtama', 
            'strukturPendukung', 
            'kementerian', 
            'staff', 
            'departemen', 
            'profileBem',
            'ketua',
            'wakilKetua',
            'sekretaris',
            'bendahara',
            'divisiTree'
        ));
    }
}
