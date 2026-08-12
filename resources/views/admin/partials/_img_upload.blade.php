{{--
  Reusable image-upload field.
  Usage: @include('admin.partials._img_upload', ['name' => 'image_url', 'value' => $item->image_url])
--}}
<div x-data="imgUpload('{{ $value ?? '' }}')" class="space-y-2">

  {{-- Actual URL submitted with the form --}}
  <input type="hidden" name="{{ $name }}" :value="url">

  {{-- Preview --}}
  <div x-show="url" class="relative w-fit">
    <img :src="url" class="h-36 rounded-xl object-cover border border-slate-200 block max-w-xs" alt="">
    <button type="button" @click="url = ''"
            class="absolute -top-2 -right-2 w-5 h-5 bg-red-500 hover:bg-red-600 text-white rounded-full text-xs flex items-center justify-center shadow">
      &#10005;
    </button>
  </div>

  {{-- Buttons row --}}
  <div class="flex flex-wrap items-center gap-2">
    <label class="cursor-pointer inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold px-4 py-2 rounded-lg transition shadow-sm">
      &#128247; Upload dari HP / Komputer
      <input type="file" class="hidden" accept="image/*" @change="pick($event)">
    </label>
    <span class="text-xs text-slate-400">atau pakai URL:</span>
    <input type="url" x-model="url" placeholder="https://..."
           class="flex-1 min-w-[200px] border border-slate-200 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
  </div>

  <p x-show="loading" class="text-xs text-blue-500 animate-pulse">&#8593; Sedang mengupload gambar...</p>
  <p x-show="err"     x-text="err" class="text-xs text-red-500"></p>
</div>
