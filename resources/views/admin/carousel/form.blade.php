@extends('layouts.admin')
@section('title', ($mode === 'create' ? 'Tambah' : 'Edit') . ' Slide – Admin Palem')
@section('content')

@php
  $action = $mode === 'create'
    ? route('admin.carousel.store')
    : route('admin.carousel.update', $item);
@endphp

<div class="mb-6">
  <a href="{{ route('admin.carousel.index') }}" class="text-sm text-slate-500 hover:text-slate-800">&larr; Kembali ke Carousel</a>
  <h1 class="text-2xl font-bold mt-1">{{ $mode === 'create' ? 'Tambah Slide Baru' : 'Edit Slide' }}</h1>
</div>

<form method="POST" action="{{ $action }}" class="max-w-2xl space-y-5">
  @csrf
  @if ($mode === 'edit') @method('PUT') @endif

  <div>
    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Foto / Gambar Slide <span class="text-red-500">*</span></label>
    @include('admin.partials._img_upload', ['name' => 'image_url', 'value' => old('image_url', $item->image_url ?? '')])
    @error('image_url') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
  </div>

  <div>
    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Judul / Caption Besar <span class="text-red-500">*</span></label>
    <input type="text" name="title" value="{{ old('title', $item->title) }}" required
           class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none"
           placeholder="Contoh: FINAL 17 Agustus Volley Palem">
    @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
  </div>

  <div>
    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Sub-judul / Keterangan</label>
    <textarea name="subtitle" rows="2"
              class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none resize-none"
              placeholder="Deskripsi singkat slide...">{{ old('subtitle', $item->subtitle) }}</textarea>
  </div>

  <div class="grid grid-cols-2 gap-4">
    <div>
      <label class="block text-sm font-semibold text-slate-700 mb-1.5">Teks Tombol</label>
      <input type="text" name="button_text" value="{{ old('button_text', $item->button_text ?? 'Selengkapnya') }}"
             class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
    </div>
    <div>
      <label class="block text-sm font-semibold text-slate-700 mb-1.5">URL Tombol</label>
      <input type="text" name="button_url" value="{{ old('button_url', $item->button_url ?? '#') }}"
             class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
    </div>
  </div>

  <div class="grid grid-cols-2 gap-4">
    <div>
      <label class="block text-sm font-semibold text-slate-700 mb-1.5">Urutan Tampil</label>
      <input type="number" name="sort_order" value="{{ old('sort_order', $item->sort_order ?? 0) }}" min="0"
             class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
    </div>
    <div class="flex items-end pb-2">
      <label class="flex items-center gap-2 text-sm font-medium text-slate-700 cursor-pointer">
        <input type="hidden" name="is_active" value="0">
        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $item->is_active ?? true) ? 'checked' : '' }}
               class="w-4 h-4 rounded text-blue-600">
        Aktifkan slide ini
      </label>
    </div>
  </div>

  <div class="flex gap-3 pt-2">
    <button type="submit" class="bg-blue-600 hover:bg-blue-700 transition text-white font-bold px-6 py-2.5 rounded-xl text-sm">
      {{ $mode === 'create' ? 'Tambah Slide' : 'Simpan Perubahan' }}
    </button>
    <a href="{{ route('admin.carousel.index') }}" class="px-6 py-2.5 rounded-xl text-sm bg-slate-100 hover:bg-slate-200 transition text-slate-700 font-medium">Batal</a>
  </div>
</form>

@endsection
