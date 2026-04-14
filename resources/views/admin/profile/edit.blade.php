@extends('layouts.admin')
@section('page_title', 'Profil BEM & Pengaturan Umum')
@section('content')
<div class="max-w-4xl bg-white p-12 rounded-2xl shadow-sm border border-outline/5">
    <form action="{{ route('admin.profile.update') }}" method="POST" class="space-y-12">
        @csrf @method('PUT')
        
        <div class="space-y-8">
            <h3 class="text-xl font-headline font-black text-primary border-b border-outline/5 pb-4">Identitas & Visi Misi</h3>
            <div class="space-y-6">
                <div class="space-y-2">
                    <label class="text-xs font-black uppercase tracking-widest text-outline">Visi Kabinet</label>
                    <textarea name="visi" rows="3" class="editor-rich w-full bg-surface-container-low border-0 border-b-2 border-transparent focus:border-primary focus:ring-0 transition-all px-4 py-3 rounded-t-lg font-bold text-primary">{{ $profile['visi'] ?? '' }}</textarea>
                    <p class="text-[10px] text-outline italic">*Gunakan enter untuk baris baru.</p>
                </div>
                <div class="space-y-2">
                    <label class="text-xs font-black uppercase tracking-widest text-outline">Misi Kabinet</label>
                    <textarea name="misi" rows="10" class="editor-rich w-full bg-surface-container-low border-0 border-b-2 border-transparent focus:border-primary focus:ring-0 transition-all px-4 py-3 rounded-t-lg font-bold text-primary">{{ $profile['misi'] ?? '' }}</textarea>
                    <p class="text-[10px] text-outline italic">*Gunakan bullet list untuk misi yang lebih rapi.</p>
                </div>
                <div class="space-y-2">
                    <label class="text-xs font-black uppercase tracking-widest text-outline">Tentang Singkat (Footer/Hero)</label>
                    <textarea name="tentang_singkat" rows="2" class="w-full bg-surface-container-low border-0 border-b-2 border-transparent focus:border-primary focus:ring-0 transition-all px-4 py-3 rounded-t-lg font-bold text-primary">{{ $profile['tentang_singkat'] ?? '' }}</textarea>
                </div>
            </div>
        </div>

        <div class="space-y-8">
            <h3 class="text-xl font-headline font-black text-primary border-b border-outline/5 pb-4">Kontak & Sosial Media</h3>
            <div class="grid grid-cols-2 gap-8">
                <div class="space-y-2">
                    <label class="text-xs font-black uppercase tracking-widest text-outline">Email</label>
                    <input type="text" name="kontak_email" value="{{ $profile['kontak_email'] ?? '' }}" class="w-full bg-surface-container-low border-0 border-b-2 border-transparent focus:border-primary focus:ring-0 transition-all px-4 py-3 rounded-t-lg font-bold text-primary">
                </div>
                <div class="space-y-2">
                    <label class="text-xs font-black uppercase tracking-widest text-outline">WhatsApp</label>
                    <input type="text" name="kontak_wa" value="{{ $profile['kontak_wa'] ?? '' }}" class="w-full bg-surface-container-low border-0 border-b-2 border-transparent focus:border-primary focus:ring-0 transition-all px-4 py-3 rounded-t-lg font-bold text-primary">
                </div>
            </div>
        </div>

        <button type="submit" class="bg-primary text-white px-8 py-4 rounded-xl font-bold hover:bg-primary-container transition-all">Simpan Seluruh Perubahan</button>
    </form>
</div>
@endsection
