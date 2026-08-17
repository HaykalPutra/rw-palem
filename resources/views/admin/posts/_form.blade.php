@csrf

@php $ic = 'w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none'; @endphp

<div class="grid grid-cols-1 md:grid-cols-2 gap-5">

  <div class="md:col-span-2">
    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Judul <span class="text-red-500">*</span></label>
    <input type="text" name="title" value="{{ old('title', $post->title) }}" class="{{ $ic }}" required maxlength="160" placeholder="Judul berita / informasi...">
    @error('title')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
  </div>

  <div>
    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Tipe Konten</label>
    <select name="type" class="{{ $ic }} bg-white">
      <option value="berita"    @selected(old('type', $post->type) === 'berita')>📰 Berita</option>
      <option value="informasi" @selected(old('type', $post->type) === 'informasi')>📢 Informasi / Pengumuman</option>
    </select>
    @error('type')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
  </div>

  <div>
    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Tanggal Publikasi</label>
    <input type="datetime-local" name="published_at" value="{{ old('published_at', optional($post->published_at)->format('Y-m-d\TH:i')) }}" class="{{ $ic }}">
    @error('published_at')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
  </div>

  <div class="md:col-span-2">
    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Ringkasan / Excerpt</label>
    <textarea name="excerpt" rows="2" class="{{ $ic }} resize-none" placeholder="Ringkasan singkat yang tampil di kartu berita...">{{ old('excerpt', $post->excerpt) }}</textarea>
    @error('excerpt')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
  </div>

  <div class="md:col-span-2">
    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Isi Konten</label>
    <textarea name="content" rows="8" class="{{ $ic }} resize-y" placeholder="Tulis isi lengkap berita di sini...">{{ old('content', $post->content) }}</textarea>
    @error('content')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
  </div>

  <div class="md:col-span-2">
    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Foto / Gambar</label>
    @include('admin.partials._img_upload', [
      'name'  => 'image_url',
      'value' => old('image_url', $post->image_url ?? ''),
    ])
    @error('image_url')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
  </div>

  <div class="md:col-span-2">
    <label class="flex items-center gap-2.5 cursor-pointer select-none">
      <input type="checkbox" id="is_featured" name="is_featured" value="1"
             @checked(old('is_featured', $post->is_featured))
             class="w-4 h-4 rounded text-blue-600">
      <span class="text-sm font-medium text-slate-700">⭐ Jadikan konten unggulan (tampil paling atas / di-highlight)</span>
    </label>
  </div>

  @if (!$post->exists)
  <div class="md:col-span-2">
    <label class="flex items-center gap-2.5 cursor-pointer select-none">
      <input type="checkbox" name="buat_carousel" value="1"
             class="w-4 h-4 rounded text-blue-600">
      <span class="text-sm font-medium text-slate-700">🎬 Jadikan juga sebagai slide carousel di Halaman Home</span>
    </label>
  </div>
  @endif

</div>

<div class="mt-6 flex items-center gap-3 pt-4 border-t border-slate-100">
  <button class="bg-blue-600 hover:bg-blue-700 transition text-white font-bold px-6 py-2.5 rounded-xl text-sm shadow-sm" type="submit">
    Simpan Konten
  </button>
  <a href="{{ route('admin.posts.index', ['type' => old('type', $post->type ?? $type ?? 'berita')]) }}"
     class="px-5 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-medium text-sm transition">Batal</a>
</div>