@extends('layouts.admin')
@section('page_title', 'Manajemen Program Kerja')
@section('content')
<div class="flex justify-end mb-8">
    <a href="{{ route('admin.program-kerja.create') }}" class="bg-primary text-white px-6 py-2.5 rounded-xl font-bold text-sm flex items-center gap-2 hover:bg-primary-container transition-all">
        <span class="material-symbols-outlined text-sm">add</span>
        Tambah Program
    </a>
</div>
<div class="bg-white rounded-2xl shadow-sm border border-outline/5 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead class="bg-surface-container-low text-xs font-black uppercase tracking-widest text-outline">
                <tr>
                    <th class="px-8 py-4">Nama Program</th>
                    <th class="px-8 py-4">Departemen</th>
                    <th class="px-8 py-4">Status Bento</th>
                    <th class="px-8 py-4">Urutan</th>
                    <th class="px-8 py-4">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-outline/5">
                @foreach($programKerja as $item)
                <tr>
                    <td class="px-8 py-4">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded-lg bg-primary/5 flex items-center justify-center text-primary">
                                <span class="material-symbols-outlined">{{ $item->icon }}</span>
                            </div>
                            <span class="font-bold text-primary">{{ $item->nama }}</span>
                        </div>
                    </td>
                    <td class="px-8 py-4 text-sm font-bold text-outline">{{ $item->departemen }}</td>
                    <td class="px-8 py-4">
                        <span class="px-3 py-1 rounded-lg text-[10px] font-black uppercase tracking-widest {{ $item->is_featured ? 'bg-amber-100 text-amber-700' : 'bg-surface-container-low text-outline' }}">
                            {{ $item->is_featured ? 'Featured' : 'Regular' }}
                        </span>
                    </td>
                    <td class="px-8 py-4 text-sm font-bold text-primary">#{{ $item->urutan }}</td>
                    <td class="px-8 py-4">
                        <div class="flex items-center gap-4">
                            <a href="{{ route('admin.program-kerja.edit', $item->id) }}" class="text-blue-600 hover:text-blue-800 font-bold text-sm">Edit</a>
                            <form action="{{ route('admin.program-kerja.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
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
