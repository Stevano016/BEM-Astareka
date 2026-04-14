@extends('layouts.app')

@section('content')
{{-- Menambahkan mx-auto dan max-w agar konten tengah konsisten dengan nav --}}
<main class="pt-32 pb-24 overflow-hidden max-w-[95%] mx-auto">
    
    @if($hero)
    <header class="relative pb-24 overflow-hidden">
        {{-- Ubah max-w-7xl menjadi max-w-full agar mengikuti container main --}}
        <div class="max-w-full mx-auto px-8 grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <div class="lg:col-span-7 space-y-8">
                <div class="inline-block px-4 py-1.5 bg-surface-container-high rounded-full">
                    <span class="text-xs font-bold uppercase tracking-[0.15em] text-primary font-label">{{ $hero->tagline }}</span>
                </div>
                <h1 class="text-5xl md:text-7xl font-headline font-extrabold text-primary leading-[1.05] tracking-tighter">
                    @php
                        $judul = $hero->judul;
                        if ($hero->judul_aksen) {
                            $judul = str_replace($hero->judul_aksen, '<span class="text-secondary">'.$hero->judul_aksen.'</span>', $judul);
                        }
                    @endphp
                    {!! $judul !!}
                </h1>
                <p class="text-lg text-on-surface-variant max-w-xl leading-relaxed font-body">{{ $hero->deskripsi }}</p>
                <div class="flex items-center gap-6 pt-4">
                    <a href="{{ route('tentang') }}" class="bg-primary text-on-primary px-8 py-4 rounded-xl font-headline font-bold text-base hover:bg-primary-container transition-all active:scale-95">{{ $hero->cta_text_1 }}</a>
                    <a href="{{ route('berita.index') }}" class="flex items-center gap-2 text-primary font-headline font-bold text-base group">
                        {{ $hero->cta_text_2 }}
                        <span class="material-symbols-outlined group-hover:translate-x-1 transition-transform">arrow_forward</span>
                    </a>
                </div>
            </div>
            <div class="lg:col-span-5 relative">
                <div class="relative rounded-2xl overflow-hidden h-[500px] editorial-shadow bg-surface-container-high">
                    @if($hero->gambar)
                        <img src="{{ Storage::url($hero->gambar) }}" class="w-full h-full object-cover" alt="Hero Image"/>
                    @else
                        <div class="w-full h-full bg-primary/5 flex items-center justify-center">
                            <span class="material-symbols-outlined text-primary/10 text-9xl">image</span>
                        </div>
                    @endif
                </div>
                @if($nextEvent)
                <div class="absolute -bottom-6 -left-6 bg-surface-container-lowest p-6 rounded-xl max-w-[200px] editorial-shadow">
                    <p class="text-xs font-label uppercase tracking-widest text-outline mb-2">Next Event</p>
                    <p class="text-sm font-bold text-primary">{{ $nextEvent->judul }}</p>
                </div>
                @endif
            </div>
        </div>
    </header>
    @endif

    <section class="py-24 bg-surface-container-low rounded-3xl"> {{-- Tambah rounded agar manis --}}
        <div class="max-w-full mx-auto px-8">
            <div class="flex flex-col lg:flex-row gap-16 items-start">
                <div class="lg:w-1/3">
                    <h2 class="text-sm font-label uppercase tracking-[0.2em] text-secondary mb-4">Discovery</h2>
                    <h3 class="text-4xl font-headline font-extrabold text-primary tracking-tight">Tentang {{ config('bem.kabinet') }}</h3>
                    <div class="w-16 h-1 bg-secondary mt-6"></div>
                </div>
                <div class="lg:w-2/3 grid grid-cols-1 md:grid-cols-2 gap-12">
                    <div class="space-y-6">
                        <div class="w-12 h-12 rounded-xl bg-primary flex items-center justify-center text-on-primary">
                            <span class="material-symbols-outlined">visibility</span>
                        </div>
                        <h4 class="text-2xl font-headline font-bold text-primary">Visi</h4>
                        <p class="text-on-surface-variant leading-relaxed">{{ $visi }}</p>
                    </div>
                    <div class="space-y-6">
                        <div class="w-12 h-12 rounded-xl bg-secondary flex items-center justify-center text-on-secondary">
                            <span class="material-symbols-outlined">rocket_launch</span>
                        </div>
                        <h4 class="text-2xl font-headline font-bold text-primary">Misi</h4>
                        <p class="text-on-surface-variant leading-relaxed">{{ $misi }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24">
        <style>
            .scrollbar-hide::-webkit-scrollbar { display: none; }
            .scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }
        </style>
        <div class="max-w-full mx-auto px-8">
            <div class="mb-12">
                <h2 class="text-sm font-label uppercase tracking-widest text-outline mb-4">Strategi & Inovasi</h2>
                <h3 class="text-4xl font-headline font-extrabold text-primary tracking-tight">Program Kerja Unggulan</h3>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 h-auto md:h-[600px]">
                @foreach($programKerja as $prog)
                <div class="{{ $prog->is_featured ? 'md:col-span-2 md:row-span-2' : '' }} p-10 rounded-2xl flex flex-col justify-between group relative overflow-hidden transition-all duration-300 hover:scale-[1.02]
                    @if($prog->bg_style == 'primary') bg-primary text-white 
                    @elseif($prog->bg_style == 'secondary-container') bg-secondary-container text-on-secondary-container
                    @elseif($prog->bg_style == 'surface-container-highest') bg-surface-container-highest text-primary
                    @else bg-surface-container-low text-primary @endif">
                    
                    <div class="space-y-6 z-10 {{ !$prog->is_featured ? 'overflow-y-auto scrollbar-hide' : '' }}">
                        <div class="w-12 h-12 rounded-xl flex items-center justify-center {{ $prog->bg_style == 'primary' ? 'bg-white/10' : 'bg-primary/5' }}">
                            <span class="material-symbols-outlined">{{ $prog->icon }}</span>
                        </div>
                        <h4 class="text-2xl md:text-3xl font-headline font-extrabold leading-tight">{{ $prog->nama }}</h4>
                        <p class="opacity-80 leading-relaxed {{ $prog->is_featured ? 'text-lg max-w-sm' : 'text-sm' }}">{{ $prog->deskripsi }}</p>
                    </div>
                    
                    <div class="flex justify-between items-center z-10">
                        <span class="text-xs font-bold uppercase tracking-widest opacity-50">{{ $prog->departemen }}</span>
                        <span class="material-symbols-outlined transform group-hover:rotate-45 transition-transform">north_east</span>
                    </div>

                    @if($prog->bg_style == 'primary')
                    <div class="absolute -bottom-20 -right-20 w-64 h-64 bg-white/5 rounded-full blur-3xl"></div>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="py-24">
        <div class="max-w-full mx-auto px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 items-start">
                <div class="lg:col-span-4 space-y-8">
                    <div>
                        <h2 class="text-sm font-label uppercase tracking-[0.2em] text-secondary mb-4">Timeline</h2>
                        <h3 class="text-4xl font-headline font-extrabold text-primary tracking-tight">Kalender Kegiatan</h3>
                        <div class="w-16 h-1 bg-secondary mt-6"></div>
                    </div>
                    <p class="text-on-surface-variant leading-relaxed font-body">Pantau seluruh agenda dan kegiatan BEM Universitas Sugeng Hartono di sini. Jangan lewatkan setiap momen kolaborasi dan inovasi kami.</p>
                    
                    <div id="event-details" class="p-6 bg-surface-container-low rounded-2xl border border-outline/5 min-h-[150px] flex items-center justify-center text-center">
                        <div class="space-y-2">
                            <span class="material-symbols-outlined text-outline text-4xl">event_note</span>
                            <p class="text-sm font-bold text-outline uppercase tracking-widest">Klik event untuk detail</p>
                        </div>
                    </div>
                </div>
                <div class="lg:col-span-8">
                    <div class="bg-white p-8 rounded-3xl editorial-shadow border border-outline/5">
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 bg-surface-container-low/30 rounded-3xl">
        <div class="max-w-full mx-auto px-8">
            <div class="flex justify-between items-end mb-12">
                <div class="space-y-4">
                    <h2 class="text-sm font-label uppercase tracking-widest text-outline">Editorial</h2>
                    <h3 class="text-4xl font-headline font-extrabold text-primary tracking-tight">Berita & Event Terkini</h3>
                </div>
                <a href="{{ route('berita.index') }}" class="text-primary font-bold border-b border-primary/20 pb-1 hover:border-primary transition-all">Lihat Semua Berita</a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($beritaTerkini as $berita)
                <a href="{{ route('berita.show', $berita->slug) }}" class="bg-surface-container-lowest rounded-2xl overflow-hidden group cursor-pointer editorial-shadow">
                    <div class="h-56 overflow-hidden bg-primary/5">
                        @if($berita->gambar)
                            <img src="{{ Storage::url($berita->gambar) }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" alt="{{ $berita->judul }}"/>
                        @else
                            <div class="w-full h-full flex items-center justify-center opacity-10">
                                <span class="material-symbols-outlined text-6xl">newspaper</span>
                            </div>
                        @endif
                    </div>
                    <div class="p-8 space-y-4">
                        <span class="text-xs font-bold text-secondary uppercase tracking-tighter">{{ $berita->kategori }} • {{ $berita->published_at?->format('d M Y') }}</span>
                        <h5 class="text-xl font-headline font-bold text-primary leading-snug">{{ $berita->judul }}</h5>
                        <p class="text-sm text-on-surface-variant line-clamp-2">{{ $berita->excerpt }}</p>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </section>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        if (!calendarEl || !window.FullCalendar) return;

        var events = @json($kalenderEvents);

        var calendar = new window.FullCalendar.Calendar(calendarEl, {
            plugins: [ 
                window.FullCalendar.dayGridPlugin, 
                window.FullCalendar.interactionPlugin, 
                window.FullCalendar.listPlugin 
            ],
            initialView: 'dayGridMonth',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,listMonth'
            },
            events: events,
            eventClick: function(info) {
                var detailsEl = document.getElementById('event-details');
                var start = new Date(info.event.start).toLocaleDateString('id-ID', { 
                    day: '2-digit', month: 'long', year: 'numeric', hour: '2-digit', minute: '2-digit' 
                });
                
                detailsEl.innerHTML = `
                    <div class="animate-in fade-in slide-in-from-bottom-2 duration-500 text-left w-full space-y-4">
                        <div class="flex items-center gap-3">
                            <div class="w-3 h-12 rounded-full" style="background-color: ${info.event.backgroundColor}"></div>
                            <div>
                                <p class="text-[10px] font-black uppercase tracking-widest text-outline">${start}</p>
                                <h4 class="text-xl font-headline font-black text-primary leading-tight">${info.event.title}</h4>
                            </div>
                        </div>
                        <p class="text-sm text-on-surface-variant leading-relaxed">${info.event.extendedProps.description || 'Tidak ada deskripsi tambahan.'}</p>
                    </div>
                `;
            },
            height: 'auto',
            themeSystem: 'standard'
        });
        calendar.render();
    });
</script>

<style>
    :root {
        --fc-border-color: rgba(0,0,0,0.05);
        --fc-daygrid-dot-event-hover-bg-color: rgba(0,0,0,0.02);
        --fc-today-bg-color: rgba(var(--primary-rgb, 59, 130, 246), 0.05);
    }
    .fc { font-family: 'Plus Jakarta Sans', sans-serif; }
    .fc .fc-toolbar-title { font-family: 'Plus Jakarta Sans', sans-serif; font-weight: 800; color: #1a1c1e; text-transform: uppercase; letter-spacing: -0.02em; }
    .fc .fc-button-primary { 
        background-color: #f0f4f8; 
        border: none; 
        color: #1a1c1e; 
        font-weight: 700; 
        text-transform: uppercase; 
        font-size: 10px; 
        letter-spacing: 0.1em; 
        padding: 10px 16px; 
        border-radius: 12px; 
        cursor: pointer;
        transition: all 0.2s ease;
    }
    .fc .fc-button-primary:hover { background-color: #e1e7ef; color: #1a1c1e; opacity: 0.8; }
    .fc .fc-button-primary:not(:disabled):active, 
    .fc .fc-button-primary:not(:disabled).fc-button-active { 
        background-color: #1a1c1e !important; 
        color: #fff !important; 
        box-shadow: none !important;
    }
    .fc .fc-button:focus { box-shadow: none !important; }
    .fc th { padding: 12px 0; font-size: 10px; font-weight: 900; text-transform: uppercase; letter-spacing: 0.1em; color: #74777f; border: none; }
    .fc-theme-standard td, .fc-theme-standard th { border: 1px solid rgba(0,0,0,0.03); }
    .fc-daygrid-event { border-radius: 6px; padding: 2px 6px; font-weight: 700; font-size: 11px; border: none; }
    .fc-h-event { background-color: var(--fc-event-bg-color, #3b82f6); }
</style>
@endsection