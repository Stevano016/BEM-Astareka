<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProfileBem;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit()
    {
        $keys = [
            'visi', 'misi', 'sejarah', 'tentang_singkat', 'quote_inspirasi',
            'kontak_email', 'kontak_wa', 'alamat', 'sosmed_instagram', 'sosmed_linkedin',
            'faq_1_q', 'faq_1_a', 'faq_2_q', 'faq_2_a', 'faq_3_q', 'faq_3_a', 'faq_4_q', 'faq_4_a'
        ];
        $profile = ProfileBem::whereIn('key', $keys)->pluck('value', 'key');
        return view('admin.profile.edit', compact('profile', 'keys'));
    }

    public function update(Request $request)
    {
        foreach ($request->except('_token', '_method') as $key => $value) {
            ProfileBem::updateOrCreate(['key' => $key], ['value' => $value ?? '']);
        }
        return back()->with('success', 'Profil BEM berhasil diperbarui.');
    }
}
