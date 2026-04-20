@extends('layouts.app')

@section('content')
{{-- Memastikan container utama mengikuti lebar 95% --}}
<main class="pt-24 sm:pt-32 pb-16 sm:pb-24 max-w-[95%] mx-auto">
    {{-- Mengubah max-w-7xl menjadi max-w-full --}}
    <section class="max-w-full mx-auto px-4 sm:px-8 mb-16 sm:mb-24">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-8 text-center md:text-left">
            <div class="space-y-4">
                <span class="text-secondary font-black uppercase tracking-[0.3em] text-[10px] sm:text-sm">Eksistensi Digital</span>
                <h1 class="text-4xl sm:text-6xl md:text-7xl lg:text-8xl font-headline font-extrabold text-primary tracking-tighter leading-tight sm:leading-none">Struktur <br class="hidden sm:block"/>Organisasi</h1>
            </div>
            <div class="h-1 w-32 bg-secondary mb-4 hidden md:block"></div>
        </div>
    </section>

    <section class="max-w-full mx-auto px-4 sm:px-8 mb-20 sm:mb-32">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 sm:gap-8">
                @foreach($strukturUtama as $leader)
                <div class="space-y-4 sm:space-y-6 group">
                    <div class="aspect-[4/5] rounded-3xl overflow-hidden relative editorial-shadow bg-primary/5">
                        @if($leader->foto)
                            <img src="{{ asset('storage/' . $leader->foto) }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" alt="{{ $leader->nama }}">
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-primary/80 to-transparent flex flex-col justify-end p-6 sm:p-8">
                            <h3 class="text-xl sm:text-2xl font-headline font-extrabold text-white leading-tight">{{ $leader->nama }}</h3>
                            <p class="text-secondary-fixed text-xs sm:text-sm font-bold uppercase tracking-widest mt-1 sm:mt-2">{{ $leader->jabatan }}</p>
                        </div>
                    </div>
                    @if($leader->quote)
                    <p class="text-on-surface-variant italic leading-relaxed text-xs sm:text-sm">"{{ $leader->quote }}"</p>
                    @endif
                </div>
                @endforeach
            </div>

            <div class="space-y-8 sm:space-y-12">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
                    @foreach($strukturPendukung as $pendukung)
                    <div class="bg-surface-container-low p-6 sm:p-8 rounded-3xl flex items-center gap-4 sm:gap-6 editorial-shadow border border-white">
                        <div class="w-24 sm:w-32 aspect-[3/4] rounded-2xl overflow-hidden bg-primary/5 flex-shrink-0"> 
                            @if($pendukung->foto)
                                <img src="{{ asset('storage/' . $pendukung->foto) }}" class="w-full h-full object-cover" alt="{{ $pendukung->nama }}">
                            @else
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($pendukung->nama) }}&background=001e40&color=fff" class="w-full h-full object-cover">
                            @endif
                        </div>
                        <div class="space-y-1 overflow-hidden">
                            <h4 class="font-headline font-extrabold text-primary leading-tight text-sm sm:text-base truncate">{{ $pendukung->nama }}</h4>
                            <p class="text-[10px] sm:text-xs font-bold text-outline uppercase tracking-widest">{{ $pendukung->jabatan }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="border-l-4 border-secondary bg-primary-container p-8 sm:p-10 rounded-r-3xl text-white space-y-4 sm:space-y-6 editorial-shadow relative overflow-hidden">
                    <div class="text-lg sm:text-2xl font-headline font-bold leading-tight relative z-10 
                                prose prose-lg sm:prose-2xl prose-invert max-w-none 
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

    <section class="max-w-full mx-auto px-4 sm:px-8 mb-20 sm:mb-32">
        <div class="flex items-center gap-4 sm:gap-6 mb-12 sm:mb-16">
            <h2 class="text-2xl sm:text-3xl font-headline font-extrabold text-primary tracking-tighter">Kementerian Kabinet</h2>
            <div class="flex-grow h-px bg-outline/10"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8 mb-16 sm:mb-24">
            @foreach($kementerian as $menteri)
            <div class="bg-surface-container-low p-6 sm:p-10 rounded-3xl editorial-shadow border border-white group hover:border-secondary transition-all">
                <div class="flex items-start gap-4 sm:gap-6 mb-6 sm:mb-8">
                    <div class="w-24 sm:w-32 aspect-[3/4] rounded-2xl overflow-hidden bg-primary/5 flex-shrink-0"> 
                        @if($menteri->foto)
                            <img src="{{ asset('storage/' . $menteri->foto) }}" class="w-full h-full object-cover" alt="{{ $menteri->nama }}">
                        @else
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($menteri->nama) }}&background=001e40&color=fff&size=80" class="w-full h-full object-cover">
                        @endif
                    </div>
                    <div class="flex-1 overflow-hidden">
                        <span class="text-[9px] sm:text-[10px] font-black uppercase tracking-[0.2em] text-secondary block mb-1 sm:mb-2">{{ $menteri->departemen }}</span>
                        <h3 class="text-lg sm:text-xl font-headline font-extrabold text-primary leading-tight truncate">{{ $menteri->nama }}</h3>
                        <p class="text-[10px] sm:text-xs font-bold text-outline uppercase tracking-widest mt-1">{{ $menteri->jabatan }}</p>
                    </div>
                </div>
                @if($menteri->quote)
                <p class="text-on-surface-variant italic leading-relaxed text-xs sm:text-sm opacity-70">"{{ $menteri->quote }}"</p>
                @endif
            </div>
            @endforeach
        </div>

        <div class="flex items-center gap-4 sm:gap-6 mb-12 sm:mb-16">
            <h2 class="text-2xl sm:text-3xl font-headline font-extrabold text-primary tracking-tighter">Staff & Fungsionaris</h2>
            <div class="flex-grow h-px bg-outline/10"></div>
        </div>

        <div class="flex overflow-x-auto gap-6 sm:gap-8 pb-12 scrollbar-hide snap-x snap-mandatory -mx-4 sm:-mx-8 px-4 sm:px-8">
            @foreach($staff as $item)
            <div class="text-center group shrink-0 w-36 sm:w-56 snap-center">
                <div class="w-full aspect-[3/4] rounded-2xl overflow-hidden mb-4 editorial-shadow ring-4 ring-transparent group-hover:ring-secondary transition-all bg-surface-container">
                    @if($item->foto)
                        <img src="{{ asset('storage/' . $item->foto) }}" class="w-full h-full object-cover">
                    @else
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($item->nama) }}&background=001e40&color=fff" class="w-full h-full object-cover">
                    @endif
                </div>
                <h4 class="font-headline font-extrabold text-primary text-xs sm:text-sm leading-tight group-hover:text-secondary transition-colors truncate px-2">{{ $item->nama }}</h4>
                <p class="text-[9px] sm:text-[10px] text-outline font-black uppercase tracking-widest mt-1">{{ $item->departemen ?? 'Staff' }}</p>
            </div>
            @endforeach
        </div>

        <style>
            .scrollbar-hide::-webkit-scrollbar { display: none; }
            .scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }
        </style>
    </section>

    <section class="max-w-full mx-auto px-4 sm:px-8 mt-20 sm:mt-32 mb-20 sm:mb-32">
        <div class="flex flex-col sm:flex-row sm:items-center gap-4 sm:gap-6 mb-8 sm:mb-12">
            <h2 class="text-2xl sm:text-3xl font-headline font-extrabold text-primary tracking-tighter">Bagan Struktur Organisasi</h2>
            <div class="flex-grow h-px bg-outline/10"></div>
        </div>

        {{-- Legend Keterangan Garis --}}
        <div class="flex flex-wrap gap-6 sm:gap-8 mb-8 text-[10px] sm:text-xs font-bold text-outline">
            <div class="flex items-center gap-3">
                <div class="w-8 sm:w-10 h-[2px] bg-primary/40"></div>
                <span class="tracking-widest uppercase">GARIS KOMANDO</span>
            </div>
            <div class="flex items-center gap-3">
                <div class="w-8 sm:w-10 h-[2px] border-b-[2px] border-dashed border-primary/40"></div>
                <span class="tracking-widest uppercase">GARIS KOORDINASI</span>
            </div>
        </div>

        {{-- Scrollable Container for Wide Tree --}}
        <div class="w-full overflow-x-auto pb-12 sm:pb-16 [&::-webkit-scrollbar]:h-2 [&::-webkit-scrollbar-thumb]:bg-outline/20 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-transparent">
            {{-- Hint for Mobile --}}
            <div class="lg:hidden flex items-center justify-center gap-2 text-[10px] text-outline font-bold mb-6 animate-pulse uppercase tracking-widest">
                <span class="material-symbols-outlined text-sm">swipe_left</span>
                Geser untuk melihat bagan lengkap
            </div>
            
            {{-- Menggunakan min-w-max dan px-12 agar tidak terpotong saat di-scroll --}}
            <div class="min-w-max px-8 sm:px-12 flex flex-col items-center pt-8 relative select-none">
                
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