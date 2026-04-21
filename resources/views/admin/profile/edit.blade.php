@extends('layouts.admin')

@section('page_title', 'Profil BEM & Pengaturan Umum')

@section('content')
<div class="max-w-4xl bg-white p-6 md:p-12 rounded-[2rem] shadow-sm border border-outline/5">
    <form action="{{ route('admin.profile.update') }}" method="POST" class="space-y-12">
        @csrf @method('PUT')
        
        {{-- Identitas & Visi Misi --}}
        <div class="space-y-8">
            <div class="flex items-center gap-4 border-b border-outline/5 pb-4">
                <span class="material-symbols-outlined text-primary">visibility</span>
                <h3 class="text-xl font-headline font-black text-primary uppercase tracking-tighter">Identitas & Visi Misi</h3>
            </div>
            
            <div class="space-y-6">
                <div class="space-y-3">
                    <label class="text-[10px] font-black uppercase tracking-[0.2em] text-outline ml-1">Visi Kabinet</label>
                    <textarea name="visi" rows="3" 
                              class="w-full bg-surface-container-low border-2 border-transparent focus:border-primary focus:bg-white focus:ring-0 transition-all px-6 py-4 rounded-2xl font-bold text-primary shadow-sm">{{ $profile['visi'] ?? '' }}</textarea>
                    <p class="text-[10px] text-outline italic ml-1">*Tuliskan visi utama organisasi.</p>
                </div>

                <div class="space-y-3">
                    <label class="text-[10px] font-black uppercase tracking-[0.2em] text-outline ml-1">Misi Kabinet</label>
                    <textarea name="misi" rows="10" 
                              class="w-full bg-surface-container-low border-2 border-transparent focus:border-primary focus:bg-white focus:ring-0 transition-all px-6 py-4 rounded-2xl font-bold text-primary shadow-sm">{{ $profile['misi'] ?? '' }}</textarea>
                    <p class="text-[10px] text-outline italic ml-1">*Gunakan poin-poin untuk misi yang lebih rapi.</p>
                </div>

                <div class="space-y-3">
                    <label class="text-[10px] font-black uppercase tracking-[0.2em] text-outline ml-1">Tentang Singkat (Footer/Hero)</label>
                    <textarea name="tentang_singkat" rows="3" 
                              placeholder="Deskripsi singkat organisasi..."
                              class="w-full bg-surface-container-low border-2 border-transparent focus:border-primary focus:bg-white focus:ring-0 transition-all px-6 py-4 rounded-2xl font-bold text-primary shadow-sm">{{ $profile['tentang_singkat'] ?? '' }}</textarea>
                </div>
            </div>
        </div>

        {{-- Kontak & Sosial Media --}}
        <div class="space-y-8">
            <div class="flex items-center gap-4 border-b border-outline/5 pb-4">
                <span class="material-symbols-outlined text-primary">contact_support</span>
                <h3 class="text-xl font-headline font-black text-primary uppercase tracking-tighter">Kontak & Sosial Media</h3>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8">
                <div class="space-y-3">
                    <label class="text-[10px] font-black uppercase tracking-[0.2em] text-outline ml-1">Email Resmi</label>
                    <div class="relative">
                        <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-primary/30">mail</span>
                        <input type="email" name="kontak_email" value="{{ $profile['kontak_email'] ?? '' }}" 
                               class="w-full pl-12 pr-6 py-4 bg-surface-container-low border-2 border-transparent focus:border-primary focus:bg-white focus:ring-0 transition-all rounded-2xl font-bold text-primary shadow-sm">
                    </div>
                </div>

                <div class="space-y-3">
                    <label class="text-[10px] font-black uppercase tracking-[0.2em] text-outline ml-1">WhatsApp</label>
                    <div class="relative">
                        <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-primary/30">call</span>
                        <input type="text" name="kontak_wa" value="{{ $profile['kontak_wa'] ?? '' }}" 
                               placeholder="628123456789"
                               class="w-full pl-12 pr-6 py-4 bg-surface-container-low border-2 border-transparent focus:border-primary focus:bg-white focus:ring-0 transition-all rounded-2xl font-bold text-primary shadow-sm">
                    </div>
                </div>
            </div>
        </div>

        {{-- Submit Button --}}
        <div class="pt-4">
            <button type="submit" 
                    class="w-full md:w-auto px-10 py-5 md:py-4 bg-primary text-white rounded-2xl font-black uppercase tracking-widest text-xs hover:bg-primary-container active:scale-95 transition-all shadow-lg shadow-primary/10">
                Simpan Seluruh Perubahan
            </button>
        </div>
    </form>
</div>
@endsection
