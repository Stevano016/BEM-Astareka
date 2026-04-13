@extends('layouts.app')

@section('content')
{{-- Memastikan container utama mengikuti lebar 95% --}}
<main class="pt-32 pb-24 max-w-[95%] mx-auto">
    {{-- Mengubah max-w-7xl menjadi max-w-full --}}
    <section class="max-w-full mx-auto px-8 mb-24">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-8">
            <div class="space-y-4">
                <span class="text-secondary font-black uppercase tracking-[0.3em] text-sm">Eksistensi Digital</span>
                <h1 class="text-6xl md:text-8xl font-headline font-extrabold text-primary tracking-tighter leading-none">Struktur <br/>Organisasi</h1>
            </div>
            <div class="h-1 w-32 bg-secondary mb-4 hidden md:block"></div>
        </div>
    </section>

    <section class="max-w-full mx-auto px-8 mb-32">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach($strukturUtama as $leader)
                <div class="space-y-6 group">
                    <div class="aspect-[4/5] rounded-3xl overflow-hidden relative editorial-shadow bg-primary/5">
                        @if($leader->foto)
                            <img src="{{ Storage::url($leader->foto) }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" alt="{{ $leader->nama }}">
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-primary/80 to-transparent flex flex-col justify-end p-8">
                            <h3 class="text-2xl font-headline font-extrabold text-white leading-tight">{{ $leader->nama }}</h3>
                            <p class="text-secondary-fixed text-sm font-bold uppercase tracking-widest mt-2">{{ $leader->jabatan }}</p>
                        </div>
                    </div>
                    @if($leader->quote)
                    <p class="text-on-surface-variant italic leading-relaxed text-sm">"{{ $leader->quote }}"</p>
                    @endif
                </div>
                @endforeach
            </div>

            <div class="space-y-12">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach($strukturPendukung as $pendukung)
                    <div class="bg-surface-container-low p-8 rounded-3xl flex items-center gap-6 editorial-shadow border border-white">
                        <div class="w-32 aspect-[3/4] rounded-2xl overflow-hidden bg-primary/5 flex-shrink-0"> 
                            @if($pendukung->foto)
                                <img src="{{ Storage::url($pendukung->foto) }}" class="w-full h-full object-cover" alt="{{ $pendukung->nama }}">
                            @else
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($pendukung->nama) }}&background=001e40&color=fff" class="w-full h-full object-cover">
                            @endif
                        </div>
                        <div class="space-y-1">
                            <h4 class="font-headline font-extrabold text-primary leading-tight">{{ $pendukung->nama }}</h4>
                            <p class="text-xs font-bold text-outline uppercase tracking-widest">{{ $pendukung->jabatan }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="border-l-4 border-secondary bg-primary-container p-10 rounded-r-3xl text-white space-y-6 editorial-shadow relative overflow-hidden">
                    <span class="material-symbols-outlined text-secondary-fixed-dim text-5xl">format_quote</span>
                    <p class="text-2xl font-headline font-bold leading-tight relative z-10">{{ $profileBem['visi'] ?? 'Menjadi organisasi yang transformatif dan inklusif.' }}</p>
                    <div class="absolute -bottom-10 -right-10 w-40 h-40 bg-white/5 rounded-full blur-3xl"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="max-w-full mx-auto px-8 mb-32">
        <div class="flex items-center gap-6 mb-16">
            <h2 class="text-3xl font-headline font-extrabold text-primary tracking-tighter">Kementerian Kabinet</h2>
            <div class="flex-grow h-px bg-outline/10"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-24">
            @foreach($kementerian as $menteri)
            <div class="bg-surface-container-low p-10 rounded-3xl editorial-shadow border border-white group hover:border-secondary transition-all">
                <div class="flex items-start gap-6 mb-8">
                    <div class="w-32 aspect-[3/4] rounded-2xl overflow-hidden bg-primary/5 flex-shrink-0"> 
                        @if($menteri->foto)
                            <img src="{{ Storage::url($menteri->foto) }}" class="w-full h-full object-cover" alt="{{ $menteri->nama }}">
                        @else
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($menteri->nama) }}&background=001e40&color=fff&size=80" class="w-full h-full object-cover">
                        @endif
                    </div>
                    <div class="flex-1">
                        <span class="text-[10px] font-black uppercase tracking-[0.2em] text-secondary block mb-2">{{ $menteri->departemen }}</span>
                        <h3 class="text-xl font-headline font-extrabold text-primary leading-tight">{{ $menteri->nama }}</h3>
                        <p class="text-xs font-bold text-outline uppercase tracking-widest mt-1">{{ $menteri->jabatan }}</p>
                    </div>
                </div>
                @if($menteri->quote)
                <p class="text-on-surface-variant italic leading-relaxed text-sm opacity-70">"{{ $menteri->quote }}"</p>
                @endif
            </div>
            @endforeach
        </div>

        <div class="flex items-center gap-6 mb-16">
            <h2 class="text-3xl font-headline font-extrabold text-primary tracking-tighter">Staff & Fungsionaris</h2>
            <div class="flex-grow h-px bg-outline/10"></div>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-8">
            @foreach($staff as $item)
            <div class="text-center group">
                <div class="w-full aspect-[3/4] rounded-2xl overflow-hidden mb-4 editorial-shadow ring-4 ring-transparent group-hover:ring-secondary transition-all bg-surface-container">
                    @if($item->foto)
                        <img src="{{ Storage::url($item->foto) }}" class="w-full h-full object-cover">
                    @else
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($item->nama) }}&background=001e40&color=fff" class="w-full h-full object-cover">
                    @endif
                </div>
                <h4 class="font-headline font-extrabold text-primary text-sm leading-tight group-hover:text-secondary transition-colors">{{ $item->nama }}</h4>
                <p class="text-[10px] text-outline font-black uppercase tracking-widest mt-1">{{ $item->departemen ?? 'Staff' }}</p>
            </div>
            @endforeach
        </div>
    </section>

    <section class="max-w-full mx-auto px-8 mt-32">
        <div class="bg-primary rounded-3xl p-12 md:p-24 text-center text-white relative overflow-hidden">
            <div class="relative z-10 max-w-2xl mx-auto space-y-8">
                <h2 class="text-4xl md:text-6xl font-headline font-extrabold tracking-tighter leading-tight">Mari Berkolaborasi Untuk Perubahan.</h2>
                <p class="text-white/60 text-lg">Pintu kami selalu terbuka untuk ide, saran, dan kolaborasi yang membangun demi kemajuan mahasiswa.</p>
                <div class="flex flex-col md:flex-row items-center justify-center gap-6 pt-4">
                    <a href="{{ route('aspirasi.index') }}" class="bg-secondary text-white px-10 py-5 rounded-xl font-headline font-bold text-lg hover:bg-secondary/90 transition-all active:scale-95">Sampaikan Aspirasi</a>
                    <a href="#" class="text-white font-bold flex items-center gap-2 group">
                        Hubungi Kami
                        <span class="material-symbols-outlined group-hover:translate-x-2 transition-transform">arrow_forward</span>
                    </a>
                </div>
            </div>
            <div class="absolute -top-24 -left-24 w-64 h-64 bg-secondary/10 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-24 -right-24 w-96 h-96 bg-primary-container rounded-full blur-3xl"></div>
        </div>
    </section>
</main>
@endsection