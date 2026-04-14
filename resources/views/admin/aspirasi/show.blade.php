@extends('layouts.admin')
@section('page_title', 'Detail Aspirasi')
@section('content')
<div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
    <div class="lg:col-span-8 space-y-8">
        <div class="bg-white p-12 rounded-2xl shadow-sm border border-outline/5 space-y-8">
            <div class="flex justify-between items-start">
                <div class="space-y-1">
                    <span class="text-xs font-black uppercase tracking-widest text-outline">Pengirim</span>
                    <h3 class="text-2xl font-headline font-black text-primary">{{ $aspirasi->nama ?? 'Anonim' }}</h3>
                    <p class="font-bold text-outline">
                        {{ $aspirasi->nim ?? '-' }} • 
                        @php
                            $prodiMap = [
                                'Informatika' => 'Ilmu Komputer',
                                'Bisnis Digital' => 'Bisnis Digital',
                                'Management Bisnis Internasional' => 'Management Bisnis Internasional',
                                'Hukum Bisnis' => 'Hukum Bisnis',
                                'Gizi' => 'Gizi',
                                'Teknologi Pangan' => 'Teknologi Pangan',
                                'Pariwisata' => 'Pariwisata',
                                'Sastra Inggris' => 'Sastra Inggris',
                            ];
                            echo $prodiMap[$aspirasi->prodi] ?? $aspirasi->prodi ?? '-';
                        @endphp
                    </p>
                </div>
                <div class="text-right space-y-1">
                    <span class="text-xs font-black uppercase tracking-widest text-outline">Kategori</span>
                    <p class="font-bold text-secondary">{{ $aspirasi->kategori }}</p>
                    <p class="text-[10px] text-outline font-black">{{ $aspirasi->created_at->format('d M Y H:i') }}</p>
                </div>
            </div>
            <div class="p-8 bg-surface-container-low rounded-xl border border-outline/5 italic text-on-surface-variant leading-relaxed">
                "{{ $aspirasi->pesan }}"
            </div>
        </div>
    </div>
    <div class="lg:col-span-4">
        <div class="bg-white p-8 rounded-2xl shadow-sm border border-outline/5 space-y-6">
            <h4 class="font-headline font-extrabold text-primary">Tindakan Admin</h4>
            <form action="{{ route('admin.aspirasi.updateStatus', $aspirasi->id) }}" method="POST" class="space-y-6">
                @csrf @method('PATCH')
                <div class="space-y-2">
                    <label class="text-xs font-black uppercase tracking-widest text-outline">Update Status</label>
                    <select name="status" class="w-full bg-surface-container-low border-0 border-b-2 border-transparent focus:border-primary focus:ring-0 transition-all px-4 py-3 rounded-t-lg font-bold text-primary">
                        <option value="baru" {{ $aspirasi->status == 'baru' ? 'selected' : '' }}>Baru</option>
                        <option value="dibaca" {{ $aspirasi->status == 'dibaca' ? 'selected' : '' }}>Dibaca</option>
                        <option value="diproses" {{ $aspirasi->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
                        <option value="selesai" {{ $aspirasi->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                    </select>
                </div>
                <div class="space-y-2">
                    <label class="text-xs font-black uppercase tracking-widest text-outline">Catatan Admin</label>
                    <textarea name="catatan_admin" rows="4" class="w-full bg-surface-container-low border-0 border-b-2 border-transparent focus:border-primary focus:ring-0 transition-all px-4 py-3 rounded-t-lg font-bold text-primary" placeholder="Tuliskan perkembangan aspirasi...">{{ $aspirasi->catatan_admin }}</textarea>
                </div>
                <button type="submit" class="w-full py-4 bg-primary text-white rounded-xl font-bold hover:bg-primary-container transition-all">Simpan Perubahan</button>
            </form>
        </div>
    </div>
</div>
@endsection
