@extends('layouts.admin')

@section('page_title', 'SEO & Monitor Performa')

@section('content')
<div class="space-y-8">
    {{-- Header Info --}}
    <div class="bg-primary rounded-[2rem] p-8 md:p-12 text-white relative overflow-hidden shadow-lg shadow-primary/20">
        <div class="relative z-10 max-w-2xl space-y-4">
            <span class="px-4 py-1 bg-secondary text-primary rounded-full text-[10px] font-black uppercase tracking-widest">Search Engine Optimization</span>
            <h3 class="text-3xl md:text-5xl font-headline font-black leading-tight tracking-tighter">Optimalkan Kehadiran Digital ASTAREKA.</h3>
            <p class="text-white/60 text-sm md:text-base font-medium leading-relaxed">Kelola sitemap Anda dan pantau bagaimana mesin pencari seperti Google melihat website Anda untuk menjangkau lebih banyak mahasiswa.</p>
        </div>
        <div class="absolute -bottom-10 -right-10 w-64 h-64 bg-white/5 rounded-full blur-3xl"></div>
    </div>

    {{-- SEO Tools Grid --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        {{-- Sitemap Section --}}
        <div class="bg-white p-8 rounded-[2rem] shadow-sm border border-outline/5 space-y-6">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center">
                    <span class="material-symbols-outlined text-2xl">account_tree</span>
                </div>
                <div>
                    <h4 class="font-headline font-extrabold text-primary tracking-tight">Sitemap XML</h4>
                    <p class="text-[10px] font-bold text-outline uppercase tracking-widest">Indeks Otomatis</p>
                </div>
            </div>
            
            <p class="text-sm text-on-surface-variant leading-relaxed">Sitemap Anda diperbarui secara otomatis setiap kali Anda mempublikasikan berita baru.</p>
            
            <div class="space-y-3">
                <label class="text-[10px] font-black uppercase tracking-widest text-outline ml-1">URL Sitemap Anda</label>
                <div class="flex items-center gap-2 bg-surface-container-low p-2 pr-4 rounded-xl border border-outline/5">
                    <input type="text" readonly value="{{ url('/sitemap.xml') }}" class="flex-1 bg-transparent border-none focus:ring-0 text-xs font-bold text-primary truncate">
                    <button onclick="navigator.clipboard.writeText('{{ url('/sitemap.xml') }}'); alert('URL Berhasil disalin!')" 
                            class="text-primary/40 hover:text-primary transition-colors">
                        <span class="material-symbols-outlined text-base">content_copy</span>
                    </button>
                </div>
            </div>

            <a href="https://search.google.com/search-console/sitemaps" target="_blank" 
               class="flex items-center justify-center gap-3 w-full py-4 bg-emerald-600 text-white rounded-2xl font-black uppercase tracking-widest text-[10px] hover:bg-emerald-700 transition-all active:scale-95 shadow-lg shadow-emerald-600/10">
                <span class="material-symbols-outlined text-base">publish</span>
                Submit ke Google Console
            </a>
        </div>

        {{-- Performance Monitor --}}
        <div class="bg-white p-8 rounded-[2rem] shadow-sm border border-outline/5 space-y-6">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center">
                    <span class="material-symbols-outlined text-2xl">speed</span>
                </div>
                <div>
                    <h4 class="font-headline font-extrabold text-primary tracking-tight">Monitor Performa</h4>
                    <p class="text-[10px] font-bold text-outline uppercase tracking-widest">Core Web Vitals</p>
                </div>
            </div>
            
            <p class="text-sm text-on-surface-variant leading-relaxed">Pastikan website Anda cepat dan responsif untuk mendapatkan peringkat lebih tinggi di hasil pencarian.</p>
            
            <div class="grid grid-cols-2 gap-4">
                <a href="https://pagespeed.web.dev/report?url={{ urlencode(url('/')) }}" target="_blank" 
                   class="flex flex-col items-center gap-3 p-4 bg-surface-container-low rounded-2xl hover:bg-amber-50 group transition-all">
                    <span class="material-symbols-outlined text-amber-600">bolt</span>
                    <span class="text-[10px] font-black uppercase text-primary/60 group-hover:text-amber-600 transition-colors">PageSpeed</span>
                </a>
                <a href="https://search.google.com/search-console/performance/search-analytics" target="_blank" 
                   class="flex flex-col items-center gap-3 p-4 bg-surface-container-low rounded-2xl hover:bg-blue-50 group transition-all">
                    <span class="material-symbols-outlined text-blue-600">analytics</span>
                    <span class="text-[10px] font-black uppercase text-primary/60 group-hover:text-blue-600 transition-colors">Analytics</span>
                </a>
            </div>

            <div class="p-4 bg-primary/5 rounded-2xl border border-primary/10">
                <div class="flex items-center gap-3 text-primary">
                    <span class="material-symbols-outlined text-sm">info</span>
                    <span class="text-[10px] font-bold uppercase tracking-wider">Tips SEO</span>
                </div>
                <p class="mt-2 text-[11px] text-primary/60 leading-relaxed font-medium">Gunakan kata kunci yang relevan pada judul berita dan pastikan gambar memiliki atribut 'Alt Text' untuk hasil maksimal.</p>
            </div>
        </div>
    </div>
</div>
@endsection
