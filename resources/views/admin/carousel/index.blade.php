@extends('layouts.admin')
@section('title', 'Kelola Carousel – Admin Palem')
@section('content')

<div class="flex items-center justify-between mb-6">
  <div>
    <h1 class="text-2xl font-bold">Kelola Carousel</h1>
    <p class="text-sm text-slate-500">Gambar slider di halaman utama (hero section).</p>
  </div>
  <a href="{{ route('admin.carousel.create') }}" class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold px-4 py-2 rounded-lg">+ Tambah Slide</a>
</div>

<div class="bg-white border border-slate-200 rounded-xl overflow-hidden">
  <table class="w-full text-sm">
    <thead class="bg-slate-50 text-slate-500 text-xs uppercase tracking-wide">
      <tr>
        <th class="text-left px-4 py-3 w-8">No</th>
        <th class="text-left px-4 py-3">Slide</th>
        <th class="text-left px-4 py-3">Urutan</th>
        <th class="text-left px-4 py-3">Status</th>
        <th class="text-right px-4 py-3">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($items as $item)
      <tr class="border-t border-slate-100 hover:bg-slate-50 transition">
        <td class="px-4 py-3 text-slate-400">{{ $loop->iteration }}</td>
        <td class="px-4 py-3">
          <div class="flex items-center gap-3">
            <img src="{{ $item->image_url }}" class="w-20 h-12 object-cover rounded-lg" alt="">
            <div>
              <div class="font-semibold text-slate-800">{{ $item->title }}</div>
              <div class="text-xs text-slate-400 mt-0.5">{{ Str::limit($item->subtitle, 60) }}</div>
            </div>
          </div>
        </td>
        <td class="px-4 py-3 text-slate-600">{{ $item->sort_order }}</td>
        <td class="px-4 py-3">
          @if ($item->is_active)
            <span class="text-xs bg-emerald-100 text-emerald-700 px-2 py-1 rounded-full">Aktif</span>
          @else
            <span class="text-xs bg-slate-100 text-slate-500 px-2 py-1 rounded-full">Non-aktif</span>
          @endif
        </td>
        <td class="px-4 py-3">
          <div class="flex items-center justify-end gap-2">
            <a href="{{ route('admin.carousel.edit', $item) }}" class="text-xs px-3 py-1.5 rounded-md bg-slate-100 hover:bg-slate-200 text-slate-700 transition">Edit</a>
            <form action="{{ route('admin.carousel.destroy', $item) }}" method="POST"
                  @submit.prevent="window.dispatchEvent(new CustomEvent('palem-confirm',{detail:{title:'Hapus Slide',message:'Slide \"'+{{ json_encode($item->title) }}+'\" akan dihapus permanen.',label:'Ya, Hapus',danger:true,form:$el}}))">
              @csrf @method('DELETE')
              <button class="text-xs px-3 py-1.5 rounded-md bg-red-100 hover:bg-red-200 text-red-700 transition" type="submit">Hapus</button>
            </form>
          </div>
        </td>
      </tr>
      @empty
      <tr>
        <td colspan="5" class="px-4 py-10 text-center text-slate-400">Belum ada slide. <a href="{{ route('admin.carousel.create') }}" class="text-blue-600">Tambah sekarang</a></td>
      </tr>
      @endforelse
    </tbody>
  </table>
</div>

@endsection
