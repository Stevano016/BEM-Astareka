@extends('layouts.admin')
@section('page_title', 'Struktur Organisasi')
@section('content')
<div class="flex justify-end mb-8">
    <a href="{{ route('admin.struktur.create') }}" class="bg-primary text-white px-6 py-2.5 rounded-xl font-bold text-sm flex items-center gap-2 hover:bg-primary-container transition-all">
        <span class="material-symbols-outlined text-sm">add</span>
        Tambah Pengurus
    </a>
</div>
<div class="bg-white rounded-2xl shadow-sm border border-outline/5 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead class="bg-surface-container-low text-xs font-black uppercase tracking-widest text-outline">
                <tr>
                    <th class="px-8 py-4">Nama</th>
                    <th class="px-8 py-4">Jabatan</th>
                    <th class="px-8 py-4">Departemen</th>
                    <th class="px-8 py-4">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-outline/5">
                @foreach($struktur as $item)
                <tr>
                    <td class="px-8 py-4">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded-full bg-primary/5 overflow-hidden">
                                @if($item->foto) <img src="{{ Storage::url($item->foto) }}" class="w-full h-full object-cover"> @endif
                            </div>
                            <span class="font-bold text-primary">{{ $item->nama }}</span>
                        </div>
                    </td>
                    <td class="px-8 py-4 text-sm font-bold text-outline">{{ $item->jabatan }}</td>
                    <td class="px-8 py-4 text-sm font-bold text-outline">{{ $item->departemen ?? '-' }}</td>
                    <td class="px-8 py-4">
                        <div class="flex items-center gap-4">
                            <a href="{{ route('admin.struktur.edit', $item->id) }}" class="text-blue-600 hover:text-blue-800 font-bold text-sm">Edit</a>
                            <form action="{{ route('admin.struktur.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
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
</div>
@endsection
