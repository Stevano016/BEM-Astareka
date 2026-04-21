@extends('layouts.admin')

@section('page_title', 'Dashboard Overview')

@section('content')
{{-- Statistik Cards: Responsif Grid --}}
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8 mb-12">
    <div class="bg-white p-6 md:p-8 rounded-[2rem] shadow-sm border border-outline/5 space-y-4 hover:border-primary/20 transition-all group">
        <div class="w-14 h-14 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center group-hover:scale-110 transition-transform">
            <span class="material-symbols-outlined text-3xl">newspaper</span>
        </div>
        <div>
            <p class="text-[10px] font-black text-outline uppercase tracking-[0.2em] mb-1">Total Berita</p>
            <h3 class="text-4xl font-headline font-black text-primary tracking-tighter">{{ $stats['total_berita'] }}</h3>
        </div>
    </div>

    <div class="bg-white p-6 md:p-8 rounded-[2rem] shadow-sm border border-outline/5 space-y-4 hover:border-primary/20 transition-all group">
        <div class="w-14 h-14 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center group-hover:scale-110 transition-transform">
            <span class="material-symbols-outlined text-3xl">campaign</span>
        </div>
        <div>
            <p class="text-[10px] font-black text-outline uppercase tracking-[0.2em] mb-1">Aspirasi Baru</p>
            <h3 class="text-4xl font-headline font-black text-primary tracking-tighter">{{ $stats['aspirasi_baru'] }}</h3>
        </div>
    </div>

    <div class="bg-white p-6 md:p-8 rounded-[2rem] shadow-sm border border-outline/5 space-y-4 hover:border-primary/20 transition-all group">
        <div class="w-14 h-14 rounded-2xl bg-purple-50 text-purple-600 flex items-center justify-center group-hover:scale-110 transition-transform">
            <span class="material-symbols-outlined text-3xl">groups</span>
        </div>
        <div>
            <p class="text-[10px] font-black text-outline uppercase tracking-[0.2em] mb-1">Struktur BEM</p>
            <h3 class="text-4xl font-headline font-black text-primary tracking-tighter">{{ $stats['total_struktur'] }}</h3>
        </div>
    </div>

    <div class="bg-white p-6 md:p-8 rounded-[2rem] shadow-sm border border-outline/5 space-y-4 hover:border-primary/20 transition-all group">
        <div class="w-14 h-14 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center group-hover:scale-110 transition-transform">
            <span class="material-symbols-outlined text-3xl">hub</span>
        </div>
        <div>
            <p class="text-[10px] font-black text-outline uppercase tracking-[0.2em] mb-1">Program Kerja</p>
            <h3 class="text-4xl font-headline font-black text-primary tracking-tighter">{{ $stats['total_program'] }}</h3>
        </div>
    </div>
</div>

{{-- Recent Aspirations Table --}}
<div class="bg-white rounded-[2.5rem] shadow-sm border border-outline/5 overflow-hidden">
    <div class="px-8 py-8 border-b border-outline/5 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <h3 class="font-headline font-extrabold text-primary text-xl tracking-tight">Aspirasi Terbaru</h3>
            <p class="text-xs font-bold text-outline uppercase tracking-widest mt-1">Umpan balik dari mahasiswa</p>
        </div>
        <a href="{{ route('admin.aspirasi.index') }}" 
           class="px-6 py-2 bg-surface-container-low text-primary rounded-xl text-xs font-black uppercase tracking-widest hover:bg-primary hover:text-white transition-all">
           Lihat Semua
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left min-w-[800px]">
            <thead class="bg-surface-container-low text-[10px] font-black uppercase tracking-[0.2em] text-outline">
                <tr>
                    <th class="px-8 py-6">Nama Pengirim</th>
                    <th class="px-8 py-6">Kategori</th>
                    <th class="px-8 py-6">Isi Pesan</th>
                    <th class="px-8 py-6">Status</th>
                    <th class="px-8 py-6 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-outline/5">
                @forelse($aspirasiTerbaru as $asp)
                <tr class="hover:bg-surface-container-lowest/50 transition-colors">
                    <td class="px-8 py-5">
                        <div class="flex flex-col">
                            <span class="font-bold text-primary">{{ $asp->nama ?? 'Anonim' }}</span>
                            <span class="text-[10px] text-outline font-black uppercase tracking-widest">{{ $asp->prodi ?? '-' }}</span>
                        </div>
                    </td>
                    <td class="px-8 py-5">
                        <span class="px-3 py-1.5 bg-surface-container rounded-lg text-[10px] font-black text-primary uppercase tracking-widest">
                            {{ $asp->kategori }}
                        </span>
                    </td>
                    <td class="px-8 py-5">
                        <p class="text-sm text-on-surface-variant max-w-xs truncate font-medium italic opacity-70">"{{ $asp->pesan }}"</p>
                    </td>
                    <td class="px-8 py-5">
                        <span class="px-4 py-2 rounded-xl text-[9px] font-black uppercase tracking-[0.15em]
                            @if($asp->status == 'baru') bg-blue-100 text-blue-700 
                            @elseif($asp->status == 'selesai') bg-green-100 text-green-700 
                            @else bg-amber-100 text-amber-700 @endif">
                            {{ $asp->status }}
                        </span>
                    </td>
                    <td class="px-8 py-5 text-right">
                        <a href="{{ route('admin.aspirasi.show', $asp->id) }}" 
                           class="w-10 h-10 rounded-xl bg-primary-container/10 text-primary inline-flex items-center justify-center hover:bg-primary hover:text-white transition-all shadow-sm">
                            <span class="material-symbols-outlined text-lg">visibility</span>
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-8 py-20 text-center">
                        <div class="flex flex-col items-center gap-4 text-outline/30 font-bold">
                            <span class="material-symbols-outlined text-6xl">campaign</span>
                            <p>Belum ada aspirasi yang masuk.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
