<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Aspirasi;
use App\Models\ProfileBem;
use App\Http\Requests\StoreAspirasiRequest;

class AspirasiController extends Controller
{
    public function index()
    {
        $statusTerkini = Aspirasi::whereIn('status', ['diproses', 'selesai'])->latest()->take(3)->get();
        $profileBem = ProfileBem::pluck('value', 'key');
        return view('frontend.aspirasi', compact('statusTerkini', 'profileBem'));
    }

    public function store(StoreAspirasiRequest $request)
    {
        Aspirasi::create($request->validated());
        return back()->with('success', 'Aspirasi Anda berhasil terkirim! Tim BEM akan meninjau dalam 3x24 jam.');
    }
}
