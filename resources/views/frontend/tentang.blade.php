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
                            <img src="{{ asset('storage/' . $leader->foto) }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" alt="{{ $leader->nama }}">
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
                                <img src="{{ asset('storage/' . $pendukung->foto) }}" class="w-full h-full object-cover" alt="{{ $pendukung->nama }}">
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
                    <!-- <span class="material-symbols-outlined text-secondary-fixed-dim text-5xl">
                        format_quote
                    </span> -->
                    <div class="text-2xl font-headline font-bold leading-tight relative z-10 
                                prose prose-2xl prose-invert max-w-none 
                                prose-p:leading-tight
                                prose-headings:text-white 
                                prose-p:text-white 
                                prose-strong:text-white 
                                prose-li:text-white
                                prose-a:text-white
                                prose-blockquote:text-white
                                [&_*]:text-white">
                        {!! $profileBem['visi'] ?? '<p>Menjadi organisasi yang transformatif dan inklusif.</p>' !!}
                    </div>
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
                            <img src="{{ asset('storage/' . $menteri->foto) }}" class="w-full h-full object-cover" alt="{{ $menteri->nama }}">
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

        <div class="flex overflow-x-auto gap-8 pb-12 scrollbar-hide snap-x snap-mandatory -mx-8 px-8">
            @foreach($staff as $item)
            <div class="text-center group shrink-0 w-40 md:w-56 snap-center">
                <div class="w-full aspect-[3/4] rounded-2xl overflow-hidden mb-4 editorial-shadow ring-4 ring-transparent group-hover:ring-secondary transition-all bg-surface-container">
                    @if($item->foto)
                        <img src="{{ asset('storage/' . $item->foto) }}" class="w-full h-full object-cover">
                    @else
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($item->nama) }}&background=001e40&color=fff" class="w-full h-full object-cover">
                    @endif
                </div>
                <h4 class="font-headline font-extrabold text-primary text-sm leading-tight group-hover:text-secondary transition-colors truncate px-2">{{ $item->nama }}</h4>
                <p class="text-[10px] text-outline font-black uppercase tracking-widest mt-1">{{ $item->departemen ?? 'Staff' }}</p>
            </div>
            @endforeach
        </div>

        <style>
            .scrollbar-hide::-webkit-scrollbar { display: none; }
            .scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }
        </style>
    </section>

    
    {{-- ========================================== --}}
    {{-- SECTION BAGAN STRUKTUR ORGANISASI (TREE)   --}}
    {{-- ========================================== --}}
    <section class="max-w-full mx-auto px-8 mt-32 mb-32">
        <div class="flex items-center gap-6 mb-12">
            <h2 class="text-3xl font-headline font-extrabold text-primary tracking-tighter">Bagan Struktur Organisasi</h2>
            <div class="flex-grow h-px bg-outline/10"></div>
        </div>

        {{-- Legend Keterangan Garis --}}
        <div class="flex flex-wrap gap-8 mb-8 text-xs font-bold text-outline">
            <div class="flex items-center gap-3">
                <div class="w-10 h-[2px] bg-primary/40"></div>
                <span class="tracking-widest">GARIS KOMANDO</span>
            </div>
            <div class="flex items-center gap-3">
                <div class="w-10 h-[2px] border-b-[2px] border-dashed border-primary/40"></div>
                <span class="tracking-widest">GARIS KOORDINASI</span>
            </div>
        </div>

        {{-- Scrollable Container for Wide Tree --}}
        <div class="w-full overflow-x-auto pb-16 [&::-webkit-scrollbar]:h-2 [&::-webkit-scrollbar-thumb]:bg-outline/20 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-transparent">
            {{-- Menggunakan min-w-max dan px-12 agar tidak terpotong saat di-scroll --}}
            <div class="min-w-max px-12 flex flex-col items-center pt-8 relative select-none">
                
                {{-- 1. LEVEL: KETUA --}}
                @if($ketua)
                <div class="flex flex-col items-center relative z-10">
                    <div class="flex items-center gap-4 bg-surface-container-low p-2 pr-6 rounded-full border border-white editorial-shadow w-[280px] hover:border-secondary transition-all">
                        @if($ketua->foto)
                            <img src="{{ asset('storage/' . $ketua->foto) }}" class="w-12 h-12 rounded-full object-cover shrink-0">
                        @else
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($ketua->nama) }}&background=001e40&color=fff" class="w-12 h-12 rounded-full object-cover shrink-0">
                        @endif
                        <div class="text-left">
                            <h4 class="text-[10px] font-black text-secondary uppercase tracking-[0.2em] leading-tight mb-1">Ketua</h4>
                            <p class="text-sm font-headline font-extrabold text-primary leading-tight">{{ $ketua->nama }}</p>
                            <p class="text-[9px] text-outline mt-0.5">{{ $ketua->nim }}</p>
                        </div>
                    </div>
                </div>
                @endif

                {{-- SPACING & CABANG KE WAKIL KETUA --}}
                <div class="w-full relative flex justify-center h-20">
                    {{-- Garis Komando Utama (Solid) --}}
                    <div class="w-[2px] h-full bg-primary/30"></div>
                    
                    {{-- Garis Koordinasi ke Wakil Ketua (Dashed) --}}
                    @if($wakilKetua)
                    <div class="absolute top-1/2 left-1/2 w-[340px] border-t-[2px] border-dashed border-primary/40 z-0"></div>
                    
                    {{-- 2. LEVEL: WAKIL KETUA --}}
                    <div class="absolute top-1/2 left-[calc(50%+340px)] -translate-y-1/2 z-10">
                        <div class="flex items-center gap-4 bg-surface-container-low p-2 pr-6 rounded-full border border-white editorial-shadow w-[280px] hover:border-secondary transition-all">
                            @if($wakilKetua->foto)
                                <img src="{{ asset('storage/' . $wakilKetua->foto) }}" class="w-12 h-12 rounded-full object-cover shrink-0">
                            @else
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($wakilKetua->nama) }}&background=001e40&color=fff" class="w-12 h-12 rounded-full object-cover shrink-0">
                            @endif
                            <div class="text-left">
                                <h4 class="text-[10px] font-black text-secondary uppercase tracking-[0.2em] leading-tight mb-1">Wakil Ketua</h4>
                                <p class="text-sm font-headline font-extrabold text-primary leading-tight truncate">{{ $wakilKetua->nama }}</p>
                                <p class="text-[9px] text-outline mt-0.5">{{ $wakilKetua->nim }}</p>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>

                {{-- SPACING SEBELUM SEKRE & BENDAHARA --}}
                <div class="w-full flex justify-center h-16 relative">
                    <div class="w-[2px] h-full bg-primary/30"></div>
                </div>

                {{-- 3. LEVEL: SEKRETARIS & BENDAHARA (KOORDINASI) --}}
                @php
                    $admins = [];
                    if(isset($sekretaris) && $sekretaris->isNotEmpty()) {
                        $admins[] = ['jabatan' => 'Sekretaris', 'anggota' => $sekretaris];
                    }
                    if(isset($bendahara) && $bendahara->isNotEmpty()) {
                        $admins[] = ['jabatan' => 'Bendahara', 'anggota' => $bendahara];
                    }
                    $adminCount = count($admins);
                @endphp

                <div class="flex justify-center gap-24 relative">
                    {{-- Garis Komando Utama Lanjut ke Bawah (Otomatis se-tinggi container terdalam) --}}
                    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[2px] h-full bg-primary/30 z-0"></div>
                    
                    {{-- Garis Koordinasi Horizontal (Dashed) Otomatis Berdasarkan Jumlah Admin --}}
                    {{-- (Lebar Item 320px + Gap 96px = Jarak antar tengah adalah 416px) --}}
                    @if($adminCount > 1)
                    <div class="absolute top-0 left-1/2 -translate-x-1/2 border-t-[2px] border-dashed border-primary/40 z-0" style="width: {{ ($adminCount - 1) * 416 }}px;"></div>
                    @endif
                    
                    @foreach($admins as $admin)
                    <div class="flex flex-col items-center w-[320px] relative z-10">
                        {{-- Drop down dashed line --}}
                        <div class="w-[2px] h-8 border-l-[2px] border-dashed border-primary/40 mb-3"></div>
                        
                        <div class="bg-surface-container-low p-5 rounded-2xl border border-white editorial-shadow w-full hover:border-secondary transition-all">
                            <h4 class="text-[11px] font-black text-secondary uppercase tracking-[0.2em] leading-tight mb-4 text-center border-b border-outline/10 pb-3">{{ $admin['jabatan'] }}</h4>
                            <div class="space-y-3">
                                @foreach($admin['anggota'] as $person)
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-full bg-primary/5 overflow-hidden shrink-0 border border-outline/5">
                                        @if($person->foto)
                                            <img src="{{ asset('storage/' . $person->foto) }}" class="w-full h-full object-cover">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center">
                                                <span class="text-[10px] font-bold text-primary">{{ substr($person->nama, 0, 1) }}</span>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="flex-1 overflow-hidden text-left">
                                        <p class="text-[11px] font-headline font-extrabold text-primary truncate leading-tight">{{ $person->nama }}</p>
                                        <p class="text-[9px] text-outline mt-0.5">{{ $person->nim }}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                {{-- SPACING SEBELUM DIVISI --}}
                <div class="w-full flex justify-center h-20 relative">
                    <div class="w-[2px] h-full bg-primary/30"></div>
                </div>

                {{-- 4 & 5. LEVEL: DIVISI & ANGGOTA --}}
                @php
                    // Menghitung jumlah divisi untuk menentukan panjang garis horizontal
                    $divisiCount = isset($divisiTree) ? count($divisiTree) : 0;
                @endphp

                <div class="flex relative w-full justify-center gap-10">
                    {{-- Garis Komando Horizontal Divisi (Solid) Dihitung Dinamis --}}
                    {{-- (Lebar Item 350px + Gap 40px = Jarak antar tengah adalah 390px) --}}
                    @if($divisiCount > 1)
                    <div class="absolute top-0 left-1/2 -translate-x-1/2 border-t-[2px] border-primary/30 z-0" style="width: {{ ($divisiCount - 1) * 390 }}px;"></div>
                    @endif

                    @foreach($divisiTree as $divisi)
                    <div class="flex flex-col items-center w-[350px] relative z-10">
                        {{-- Drop down solid line to Divisi --}}
                        <div class="w-[2px] h-8 bg-primary/30 mb-3"></div>
                        
                        {{-- Node Ketua Divisi --}}
                        @if($divisi['ketua'])
                        <div class="flex items-center gap-3 bg-surface-container-low p-2 pr-4 rounded-full border border-white editorial-shadow w-[300px] hover:border-secondary transition-all">
                            @if($divisi['ketua']->foto)
                                <img src="{{ asset('storage/' . $divisi['ketua']->foto) }}" class="w-11 h-11 rounded-full object-cover shrink-0 bg-primary/5">
                            @else
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($divisi['ketua']->nama) }}&background=001e40&color=fff" class="w-11 h-11 rounded-full object-cover shrink-0 bg-primary/5">
                            @endif
                            <div class="text-left w-full overflow-hidden">
                                <h4 class="text-[9px] font-black text-secondary uppercase tracking-widest leading-tight mb-0.5 truncate">{{ $divisi['divisi'] }}</h4>
                                <p class="text-[12px] font-headline font-extrabold text-primary leading-tight truncate">{{ $divisi['ketua']->nama }}</p>
                                <p class="text-[9px] text-outline mt-0.5">Ketua Divisi • {{ $divisi['ketua']->nim }}</p>
                            </div>
                        </div>
                        @else
                        <div class="flex items-center justify-center bg-surface-container-low p-2 rounded-full border border-dashed border-outline/20 w-[300px]">
                            <p class="text-[10px] text-outline uppercase font-bold">{{ $divisi['divisi'] }}</p>
                        </div>
                        @endif

                        {{-- Drop down line to Anggota --}}
                        <div class="w-[2px] h-10 bg-primary/30 mt-3 mb-3"></div>

                        {{-- Kartu Anggota --}}
                        <div class="bg-surface-container-low p-5 rounded-2xl border border-white editorial-shadow w-full hover:border-secondary transition-all">
                            <h4 class="text-[10px] font-black text-outline uppercase tracking-[0.2em] leading-tight mb-4 text-center border-b border-outline/10 pb-3">Anggota Divisi</h4>
                            <div class="space-y-4">
                                @if(isset($divisi['anggota']) && count($divisi['anggota']) > 0)
                                    @foreach($divisi['anggota'] as $anggota)
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full bg-primary/5 overflow-hidden shrink-0 border border-outline/5">
                                            @if($anggota->foto)
                                                <img src="{{ asset('storage/' . $anggota->foto) }}" class="w-full h-full object-cover">
                                            @else
                                                <div class="w-full h-full flex items-center justify-center">
                                                    <span class="text-[9px] font-bold text-primary">{{ substr($anggota->nama, 0, 1) }}</span>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="flex-1 overflow-hidden text-left">
                                            <p class="text-[11px] font-headline font-extrabold text-primary truncate leading-tight">{{ $anggota->nama }}</p>
                                            <p class="text-[9px] text-outline mt-0.5">{{ $anggota->nim }}</p>
                                        </div>
                                    </div>
                                    @endforeach
                                @else
                                    <p class="text-[10px] text-outline text-center italic">Belum ada anggota</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
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