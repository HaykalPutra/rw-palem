@extends('layouts.admin')
@section('title', ($mode === 'create' ? 'Tambah' : 'Edit') . ' Anggota – Admin Palem')
@section('content')

@php
  $action = $mode === 'create'
    ? route('admin.org.store')
    : route('admin.org.update', $member);
@endphp

<div class="mb-6">
  <a href="{{ route('admin.org.index') }}" class="text-sm text-slate-500 hover:text-slate-800">&larr; Kembali ke Organisasi</a>
  <h1 class="text-2xl font-bold mt-1">{{ $mode === 'create' ? 'Tambah Anggota Baru' : 'Edit Anggota' }}</h1>
</div>

<form method="POST" action="{{ $action }}" class="max-w-2xl space-y-5">
  @csrf
  @if ($mode === 'edit') @method('PUT') @endif

  <div class="grid grid-cols-2 gap-4">
    <div>
      <label class="block text-sm font-semibold text-slate-700 mb-1.5">Nama Lengkap <span class="text-red-500">*</span></label>
      <input type="text" name="name" value="{{ old('name', $member->name) }}" required
             class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
      @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>
    <div>
      <label class="block text-sm font-semibold text-slate-700 mb-1.5">Jabatan <span class="text-red-500">*</span></label>
      <input type="text" name="position" value="{{ old('position', $member->position) }}" required
             class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none"
             placeholder="Ketua RW 10">
      @error('position') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>
  </div>

  <div class="grid grid-cols-2 gap-4">
    <div>
      <label class="block text-sm font-semibold text-slate-700 mb-1.5">Tipe Jabatan <span class="text-red-500">*</span></label>
      <select name="role_type" required class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none bg-white" id="roleType"
            x-data x-on:change="document.getElementById('rtNumberWrap').classList.toggle('hidden', $event.target.value !== 'rt')">
        <option value="ketua_rw" {{ old('role_type', $member->role_type) === 'ketua_rw' ? 'selected' : '' }}>Ketua RW</option>
        <option value="rt"       {{ old('role_type', $member->role_type) === 'rt'       ? 'selected' : '' }}>Ketua RT</option>
        <option value="divisi"   {{ old('role_type', $member->role_type) === 'divisi'   ? 'selected' : '' }}>Divisi</option>
      </select>
    </div>
    <div id="rtNumberWrap" class="{{ old('role_type', $member->role_type) !== 'rt' ? 'hidden' : '' }}">
      <label class="block text-sm font-semibold text-slate-700 mb-1.5">Nomor RT</label>
      <input type="number" name="rt_number" value="{{ old('rt_number', $member->rt_number) }}" min="1" max="20"
             class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
    </div>
  </div>

  <div>
    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Foto <span class="text-slate-400 font-normal">(kosongkan = avatar otomatis dari nama)</span></label>
    @include('admin.partials._img_upload', ['name' => 'photo_url', 'value' => old('photo_url', $member->getRawOriginal('photo_url') ?? '')])
  </div>

  <div class="grid grid-cols-2 gap-4">
    <div>
      <label class="block text-sm font-semibold text-slate-700 mb-1.5">Nomor HP</label>
      <input type="text" name="phone" value="{{ old('phone', $member->phone) }}"
             class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none"
             placeholder="0812-xxxx-xxxx">
    </div>
    <div>
      <label class="block text-sm font-semibold text-slate-700 mb-1.5">Periode</label>
      <input type="text" name="period" value="{{ old('period', $member->period) }}"
             class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none"
             placeholder="2023 – 2026">
    </div>
  </div>

  <div>
    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Keterangan (tooltip)</label>
    <input type="text" name="description" value="{{ old('description', $member->description) }}"
           class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none"
           placeholder="Deskripsi singkat tugas / jabatan...">
  </div>

  <div class="grid grid-cols-2 gap-4">
    <div>
      <label class="block text-sm font-semibold text-slate-700 mb-1.5">Warna Avatar (hex, tanpa #)</label>
      <div class="flex gap-2 items-center" x-data="{
        sync(from, to) { document.getElementById(to).value = document.getElementById(from).value.replace('#',''); },
      }">
        <input type="color" id="colorPicker" value="#{{ ltrim(old('bg_color', $member->bg_color ?? '2563eb'), '#') }}"
               class="w-10 h-10 rounded-lg border border-slate-200 cursor-pointer p-0.5"
               x-on:input="document.getElementById('bgColor').value = $event.target.value.replace('#','')">
        <input type="text" name="bg_color" id="bgColor" value="{{ ltrim(old('bg_color', $member->bg_color ?? '2563eb'), '#') }}"
               class="flex-1 border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none font-mono"
               placeholder="2563eb" maxlength="6"
               x-on:input="document.getElementById('colorPicker').value = '#' + $event.target.value">
      </div>
    </div>
    <div>
      <label class="block text-sm font-semibold text-slate-700 mb-1.5">Urutan Tampil</label>
      <input type="number" name="sort_order" value="{{ old('sort_order', $member->sort_order ?? 0) }}" min="0"
             class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
    </div>
  </div>

  <div class="flex gap-3 pt-2">
    <button type="submit" class="bg-blue-600 hover:bg-blue-700 transition text-white font-bold px-6 py-2.5 rounded-xl text-sm">
      {{ $mode === 'create' ? 'Tambah Anggota' : 'Simpan Perubahan' }}
    </button>
    <a href="{{ route('admin.org.index') }}" class="px-6 py-2.5 rounded-xl text-sm bg-slate-100 hover:bg-slate-200 transition text-slate-700 font-medium">Batal</a>
  </div>
</form>

@endsection
