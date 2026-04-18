@extends('layouts.admin')
@section('page_title', 'Daftar Aspirasi')
@section('content')
<div class="mb-8 flex gap-2 overflow-x-auto no-scrollbar pb-2">
    @foreach(['baru', 'dibaca', 'diproses', 'selesai'] as $st)
        <a href="{{ route('admin.aspirasi.index', ['status' => $st]) }}" 
            class="px-6 py-3 rounded-xl text-sm font-bold whitespace-nowrap transition-all
            {{ (request('status') == $st) ? 'bg-primary text-white' : 'bg-white text-primary/60 hover:text-primary border border-outline/5' }}">
            {{ ucfirst($st) }}
        </a>
    @endforeach
    <a href="{{ route('admin.aspirasi.index') }}" class="px-6 py-3 rounded-xl text-sm font-bold bg-white text-primary/60 border border-outline/5">Semua</a>
</div>
<div class="bg-white rounded-2xl shadow-sm border border-outline/5 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead class="bg-surface-container-low text-xs font-black uppercase tracking-widest text-outline">
                <tr>
                    <th class="px-8 py-4">Pengirim</th>
                    <th class="px-8 py-4">Kategori</th>
                    <th class="px-8 py-4">Pesan</th>
                    <th class="px-8 py-4">Status</th>
                    <th class="px-8 py-4">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-outline/5">
                @foreach($aspirasi as $asp)
                <tr>
                    <td class="px-8 py-4">
                        <div class="space-y-1">
                            <p class="font-bold text-primary">{{ $asp->nama ?? 'Anonim' }}</p>
                            <p class="text-[10px] text-outline font-bold">{{ $asp->prodi }}</p>
                        </div>
                    </td>
                    <td class="px-8 py-4 text-sm font-bold text-outline">{{ $asp->kategori }}</td>
                    <td class="px-8 py-4 text-sm text-on-surface-variant max-w-xs truncate">{{ $asp->pesan }}</td>
                    <td class="px-8 py-4">
                        <span class="px-3 py-1 rounded-lg text-[10px] font-black uppercase tracking-widest 
                            @if($asp->status == 'baru') bg-blue-100 text-blue-700 
                            @elseif($asp->status == 'selesai') bg-green-100 text-green-700 
                            @else bg-amber-100 text-amber-700 @endif">
                            {{ $asp->status }}
                        </span>
                    </td>
                    <td class="px-8 py-4 flex items-center gap-4">
                        <a href="{{ route('admin.aspirasi.show', $asp->id) }}" class="text-primary hover:text-secondary font-bold text-sm">Detail</a>
                        <form action="{{ route('admin.aspirasi.destroy', $asp->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus aspirasi ini?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700 font-bold text-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="p-8 border-t border-outline/5"> {{ $aspirasi->links() }} </div>
</div>
@endsection
