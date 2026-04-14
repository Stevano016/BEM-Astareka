@extends('layouts.app')

@section('content')
{{-- Tambahkan max-w-[95%] dan mx-auto di tag main --}}
<main class="pt-32 pb-24 max-w-[95%] mx-auto">
    {{-- Ganti max-w-7xl menjadi max-w-full --}}
    <section class="max-w-full mx-auto px-8 mb-24">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-end">
            <div class="md:col-span-8">
                <span class="text-secondary font-semibold mb-4 block uppercase tracking-[0.2em] text-sm">Suara Mahasiswa</span>
                <h1 class="text-5xl md:text-7xl font-headline font-extrabold text-primary tracking-tighter leading-[1.1] mb-8">
                    Setiap Aspirasi <br/>Adalah <span class="text-secondary-fixed-dim">Inovasi.</span>
                </h1>
            </div>
            <div class="md:col-span-4 pb-4">
                <p class="text-lg text-on-surface-variant leading-relaxed">{{ $profileBem['tentang_singkat'] ?? 'BEM Universitas Sugeng Hartono berkomitmen untuk menjadi wadah transformatif...' }}</p>
            </div>
        </div>
    </section>

    {{-- Ganti max-w-7xl menjadi max-w-full --}}
    <section class="max-w-full mx-auto px-8 grid grid-cols-1 lg:grid-cols-12 gap-16">
        <div class="lg:col-span-7">
            <div class="bg-surface-container-lowest rounded-3xl p-10 editorial-shadow border border-outline-variant/10">
                <h2 class="text-2xl font-headline font-extrabold text-primary mb-8">Sampaikan Aspirasimu</h2>
                
                <form action="{{ route('aspirasi.store') }}" method="POST" class="space-y-8">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="space-y-2">
                            <label class="text-xs font-semibold uppercase tracking-widest text-outline">Nama Lengkap (Opsional)</label>
                            <input type="text" name="nama" class="w-full bg-surface-container-low border-0 border-b-2 border-transparent focus:border-primary focus:ring-0 transition-all px-4 py-3 rounded-t-lg font-bold text-primary">
                        </div>
                        <div class="space-y-2">
                            <label class="text-xs font-semibold uppercase tracking-widest text-outline">NIM (Opsional)</label>
                            <input type="text" name="nim" class="w-full bg-surface-container-low border-0 border-b-2 border-transparent focus:border-primary focus:ring-0 transition-all px-4 py-3 rounded-t-lg font-bold text-primary">
                        </div>
                    </div>
 
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="space-y-2">
                            <label class="text-xs font-semibold uppercase tracking-widest text-outline">Program Studi</label>
                            <select name="prodi" class="w-full bg-surface-container-low border-0 border-b-2 border-transparent focus:border-primary focus:ring-0 transition-all px-4 py-3 rounded-t-lg font-bold text-primary">
                                <option value="Informatika">Ilmu Komputer</option>
                                <option value="Bisnis Digital">Bisnis Digital</option>
                                <option value="Management Bisnis Internasional">Management Bisnis Internasional</option>
                                <option value="Hukum Bisnis">Hukum Bisnis</option>
                                <option value="Gizi">Gizi</option>
                                <option value="Teknologi Pangan">Teknologi Pangan</option>
                                <option value="Pariwisata">Pariwisata</option>
                                <option value="Sastra Inggris">Sastra Inggris</option>
                            </select>
                        </div>
                        <div class="space-y-2">
                            <label class="text-xs font-semibold uppercase tracking-widest text-outline">Kategori Aspirasi</label>
                            <select name="kategori" required class="w-full bg-surface-container-low border-0 border-b-2 border-transparent focus:border-primary focus:ring-0 transition-all px-4 py-3 rounded-t-lg font-bold text-primary">
                                <option value="Pengaduan">Pengaduan</option>
                                <option value="Saran">Saran</option>
                                <option value="Kolaborasi">Kolaborasi</option>
                            </select>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="text-xs font-semibold uppercase tracking-widest text-outline">Pesan Aspirasi</label>
                        <textarea name="pesan" rows="6" required class="w-full bg-surface-container-low border-0 border-b-2 border-transparent focus:border-primary focus:ring-0 transition-all px-4 py-3 rounded-t-lg font-bold text-primary" placeholder="Tuliskan aspirasimu di sini..."></textarea>
                    </div>

                    <button type="submit" class="w-full py-5 bg-primary text-on-primary rounded-xl font-headline font-bold text-lg hover:bg-primary-container transition-all active:scale-95">
                        Kirim Aspirasi
                    </button>
                </form>
            </div>
        </div>

        <div class="lg:col-span-5 space-y-12">
            <div class="bg-surface-container-low rounded-3xl p-8 space-y-8">
                <div class="flex justify-between items-center">
                    <h3 class="text-xl font-headline font-extrabold text-primary">Status Terkini</h3>
                    <span class="material-symbols-outlined text-secondary">analytics</span>
                </div>
                <div class="space-y-6">
                    @forelse($statusTerkini as $st)
                    <div class="flex justify-between items-center p-4 bg-white rounded-2xl editorial-shadow">
                        <div class="space-y-1">
                            <p class="text-sm font-bold text-primary leading-tight">{{ Str::limit($st->pesan, 40) }}</p>
                            <p class="text-[10px] font-bold text-outline uppercase">{{ $st->created_at->format('d M Y') }}</p>
                        </div>
                        <span class="px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-widest 
                            @if($st->status == 'selesai') bg-green-100 text-green-700 
                            @else bg-secondary-container text-secondary @endif">
                            {{ $st->status }}
                        </span>
                    </div>
                    @empty
                    <p class="text-sm text-outline text-center py-4">Belum ada aspirasi yang diproses.</p>
                    @endforelse
                </div>
            </div>

            <div class="rounded-3xl aspect-video relative overflow-hidden flex items-center justify-center p-12 text-center group">
                <div class="absolute inset-0 bg-primary/90 z-10"></div>
                <img src="{{ asset('img/LOGO ASTAREKA.png') }}" class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" alt="Decoration">
                <div class="relative z-20 space-y-4">
                    <span class="material-symbols-outlined text-secondary text-5xl">format_quote</span>
                    <p class="text-xl font-headline font-bold text-white leading-relaxed italic">"{{ $profileBem['quote_inspirasi'] ?? 'Setiap aspirasi adalah inovasi.' }}"</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Ganti max-w-7xl menjadi max-w-full --}}
    <section class="max-w-full mx-auto px-8 mt-24">
        <div class="text-center mb-16 space-y-4">
            <h2 class="text-xs font-black uppercase tracking-[0.2em] text-secondary">Information Hub</h2>
            <h3 class="text-4xl font-headline font-extrabold text-primary tracking-tight">Pertanyaan Umum</h3>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @for($i=1; $i<=4; $i++)
            <div class="p-8 bg-surface-container rounded-2xl hover:bg-surface-container-high transition-all group">
                <h4 class="text-xl font-headline font-bold text-primary mb-4 group-hover:text-secondary transition-colors">{{ $profileBem['faq_'.$i.'_q'] ?? 'FAQ Question '.$i }}</h4>
                <p class="text-on-surface-variant leading-relaxed">{{ $profileBem['faq_'.$i.'_a'] ?? 'FAQ Answer content here.' }}</p>
            </div>
            @endfor
        </div>
    </section>
</main>
@endsection