@extends('layouts.admin')
@section('page_title', 'Manajemen Berita')
@section('content')
<div class="flex justify-between items-center mb-8">
    <form action="{{ route('admin.berita.index') }}" method="GET" class="relative w-72">
        <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline/50">search</span>
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari berita..." class="w-full pl-10 pr-4 py-2 bg-white border border-outline/10 rounded-xl text-sm focus:ring-primary focus:border-primary font-bold">
    </form>
    <a href="{{ route('admin.berita.create') }}" class="bg-primary text-white px-6 py-2.5 rounded-xl font-bold text-sm flex items-center gap-2 hover:bg-primary-container transition-all">
        <span class="material-symbols-outlined text-sm">add</span>
        Tulis Berita Baru
    </a>
</div>
<div class="bg-white rounded-2xl shadow-sm border border-outline/5 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead class="bg-surface-container-low text-xs font-black uppercase tracking-widest text-outline">
                <tr>
                    <th class="px-8 py-4">Judul Berita</th>
                    <th class="px-8 py-4">Kategori</th>
                    <th class="px-8 py-4">Status</th>
                    <th class="px-8 py-4">Tanggal Publish</th>
                    <th class="px-8 py-4">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-outline/5">
                @foreach($berita as $item)
                <tr>
                    <td class="px-8 py-4">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-lg bg-primary/5 flex-shrink-0 overflow-hidden">
                                @if($item->gambar) <img src="{{ Storage::url($item->gambar) }}" class="w-full h-full object-cover"> @endif
                            </div>
                            <span class="font-bold text-primary truncate max-w-xs">{{ $item->judul }}</span>
                        </div>
                    </td>
                    <td class="px-8 py-4 text-sm font-bold text-outline">{{ $item->kategori }}</td>
                    <td class="px-8 py-4">
                        <form action="{{ route('admin.berita.publish', $item->id) }}" method="POST">
                            @csrf @method('PATCH')
                            <button type="submit" class="px-3 py-1 rounded-lg text-[10px] font-black uppercase tracking-widest {{ $item->is_published ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                {{ $item->is_published ? 'Published' : 'Draft' }}
                            </button>
                        </form>
                    </td>
                    <td class="px-8 py-4 text-sm font-bold text-outline">{{ $item->published_at?->format('d M Y') ?? '-' }}</td>
                    <td class="px-8 py-4">
                        <div class="flex items-center gap-4">
                            <a href="{{ route('admin.berita.edit', $item->id) }}" class="text-blue-600 hover:text-blue-800 font-bold text-sm">Edit</a>
                            <form action="{{ route('admin.berita.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 font-bold text-sm">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="p-8 border-t border-outline/5"> {{ $berita->links() }} </div>
</div>
@endsection
