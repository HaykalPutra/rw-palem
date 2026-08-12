@extends('layouts.admin')
@section('title', 'Kelola Per Halaman – Admin Palem')
@section('content')

<div class="mb-6">
  <h1 class="text-2xl font-bold">Kelola Isi Website</h1>
  <p class="text-sm text-slate-500">Pilih halaman, ubah gambar dan teks sesuai kebutuhan — tanpa coding.</p>
</div>

@php
$ic = 'w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none';
$tc = $ic . ' resize-none';
function s($settings, $group) { return $settings[$group] ?? collect(); }
@endphp

<div x-data="{
  tab: new URLSearchParams(location.search).get('page') || 'home',
  go(t) { this.tab = t; history.replaceState(null,'','?page='+t); }
}">

  {{-- ── Tab bar ── --}}
  <div class="flex bg-white border border-slate-200 rounded-2xl overflow-hidden mb-6 shadow-sm">
    @foreach([
      ['home',    '🏠', 'Home'],
      ['profil',  '👤', 'Profil'],
      ['layanan', '🔧', 'Layanan'],
      ['berita',  '📰', 'Berita &amp; Info'],
      ['umum',    '⚙️', 'Umum &amp; Kontak'],
    ] as [$k,$ico,$lbl])
    <button @click="go('{{ $k }}')"
            :class="tab==='{{ $k }}' ? 'bg-blue-600 text-white' : 'text-slate-500 hover:bg-slate-50'"
            class="flex-1 flex items-center justify-center gap-1.5 py-3 px-2 text-sm font-medium transition-colors">
      {{ $ico }} <span class="hidden sm:inline">{!! $lbl !!}</span>
    </button>
    @endforeach
  </div>

  {{-- ════════════════ HOME ════════════════ --}}
  <div x-show="tab==='home'" x-cloak>

    {{-- Carousel / Foto Slider --}}
    <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden mb-5">
      <div class="flex items-center justify-between bg-gradient-to-r from-blue-50 to-white border-b border-slate-100 px-5 py-4">
        <div class="flex items-center gap-3">
          <span class="text-xl">🖼️</span>
          <div>
            <div class="font-bold text-slate-800">Carousel / Foto Slider</div>
            <div class="text-xs text-slate-400">Foto besar yang berputar di bagian atas halaman Home</div>
          </div>
        </div>
        <a href="{{ route('admin.carousel.create') }}"
           class="text-sm font-semibold bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition">
          + Tambah Slide
        </a>
      </div>
      <div class="divide-y divide-slate-100">
        @forelse ($carousel as $slide)
        <div class="flex items-center gap-4 px-5 py-4 hover:bg-slate-50 transition">
          <img src="{{ $slide->image_url }}" class="w-24 h-14 object-cover rounded-lg border border-slate-200 shrink-0" alt="">
          <div class="flex-1 min-w-0">
            <div class="font-semibold text-slate-800 truncate">{{ $slide->title }}</div>
            <div class="text-xs text-slate-400 truncate mt-0.5">{{ $slide->subtitle }}</div>
            @if(!$slide->is_active)
              <span class="text-[10px] bg-slate-100 text-slate-500 px-2 py-0.5 rounded-full">Non-aktif</span>
            @endif
          </div>
          <div class="flex items-center gap-2 shrink-0">
            <a href="{{ route('admin.carousel.edit', $slide) }}"
               class="text-xs px-3 py-1.5 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-700 transition font-medium">Edit</a>
            <form action="{{ route('admin.carousel.destroy', $slide) }}" method="POST"
                @submit.prevent="window.dispatchEvent(new CustomEvent('palem-confirm',{detail:{title:'Hapus Slide',message:'Slide ini akan dihapus permanen dari carousel.',label:'Ya, Hapus',danger:true,form:$el}}))">
              @csrf @method('DELETE')
              <button class="text-xs px-3 py-1.5 rounded-lg bg-red-100 hover:bg-red-200 text-red-700 transition font-medium">Hapus</button>
            </form>
          </div>
        </div>
        @empty
        <div class="px-5 py-8 text-center text-sm text-slate-400">
          Belum ada slide. <a href="{{ route('admin.carousel.create') }}" class="text-blue-600">Tambah sekarang</a>
        </div>
        @endforelse
      </div>
    </div>

    {{-- Teks Hero, Statistik, PELINDUNG, Seksi Aplikasi --}}
    <form method="POST" action="{{ route('admin.settings.update') }}">
      @csrf
      @foreach (['hero'  => ['🎯','Teks di atas Carousel (Hero)','Badge, judul besar, dan sub-judul yang muncul di atas foto slider'],
                 'stats' => ['🔢','Angka Statistik  ←  Kepala Keluarga, RT, Tahun Berdiri','Angka yang tampil di baris putih bawah carousel'],
                 'home'  => ['📋','Seksi Portal & Kontak (bagian bawah halaman)','Foto, judul, sub-judul, dan 2 kartu di seksi portal bawah']] as $grp=>[$ico,$ttl,$desc])
        @if(s($settings,$grp)->isNotEmpty())
        <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden mb-5">
          <div class="flex items-center gap-3 bg-gradient-to-r from-slate-50 to-white border-b border-slate-100 px-5 py-4">
            <span class="text-xl">{{ $ico }}</span>
            <div><div class="font-bold text-slate-800">{{ $ttl }}</div><div class="text-xs text-slate-400">{{ $desc }}</div></div>
          </div>
          <div class="p-5 grid grid-cols-1 md:grid-cols-2 gap-4">
            @foreach(s($settings,$grp)->sortBy('sort_order') as $s)
            <div class="{{ $s->type==='textarea' ? 'md:col-span-2' : '' }}">
              <label class="block text-sm font-semibold text-slate-700 mb-1">{{ $s->label }}</label>
              @if($s->type==='textarea')
                <textarea name="settings[{{ $s->key }}]" rows="3" class="{{ $tc }}">{{ old("settings.{$s->key}",$s->value) }}</textarea>
              @elseif($s->type==='image')
                <div class="md:col-span-2">@include('admin.partials._img_upload',['name'=>'settings['.$s->key.']','value'=>old("settings.{$s->key}",$s->value)])</div>
              @else
                <input type="text" name="settings[{{ $s->key }}]" value="{{ old("settings.{$s->key}",$s->value) }}" class="{{ $ic }}">
              @endif
            </div>
            @endforeach
          </div>
        </div>
        @endif
      @endforeach
      <x-save-bar />
    </form>
  </div>

  {{-- ════════════════ PROFIL ════════════════ --}}
  <div x-show="tab==='profil'" x-cloak>

    <form method="POST" action="{{ route('admin.settings.update') }}" class="space-y-5">
      @csrf
      {{-- Teks profil settings --}}
      @if(s($settings,'profil')->isNotEmpty())
      <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden">
        <div class="flex items-center gap-3 bg-gradient-to-r from-slate-50 to-white border-b border-slate-100 px-5 py-4">
          <span class="text-xl">🏘️</span>
          <div><div class="font-bold text-slate-800">Teks &amp; Foto Halaman Profil</div><div class="text-xs text-slate-400">Hero, Visi, Misi, Sejarah, dan foto wilayah</div></div>
        </div>
        <div class="p-5 grid grid-cols-1 md:grid-cols-2 gap-4">
          @foreach(s($settings,'profil')->sortBy('sort_order') as $s)
          <div class="{{ in_array($s->type,['textarea','image']) ? 'md:col-span-2' : '' }}">
            <label class="block text-sm font-semibold text-slate-700 mb-1">{{ $s->label }}</label>
            @if($s->type==='textarea')
              <textarea name="settings[{{ $s->key }}]" rows="3" class="{{ $tc }}">{{ old("settings.{$s->key}",$s->value) }}</textarea>
            @elseif($s->type==='image')
              @include('admin.partials._img_upload',['name'=>'settings['.$s->key.']','value'=>old("settings.{$s->key}",$s->value)])
            @else
              <input type="text" name="settings[{{ $s->key }}]" value="{{ old("settings.{$s->key}",$s->value) }}" class="{{ $ic }}">
            @endif
          </div>
          @endforeach
        </div>
      </div>
      @endif
      <x-save-bar />
    </form>

    {{-- Struktur Organisasi --}}
    <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden mt-5">
      <div class="flex items-center justify-between bg-gradient-to-r from-emerald-50 to-white border-b border-slate-100 px-5 py-4">
        <div class="flex items-center gap-3">
          <span class="text-xl">👥</span>
          <div>
            <div class="font-bold text-slate-800">Struktur Organisasi</div>
            <div class="text-xs text-slate-400">Anggota dan foto yang tampil di org chart halaman Profil</div>
          </div>
        </div>
        <a href="{{ route('admin.org.create') }}"
           class="text-sm font-semibold bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-2 rounded-lg transition">
          + Tambah Anggota
        </a>
      </div>
      <div class="divide-y divide-slate-100">
        @forelse ($orgMembers as $m)
        <div class="flex items-center gap-4 px-5 py-3 hover:bg-slate-50 transition">
          <img src="{{ $m->photo_url }}" class="w-10 h-10 rounded-full object-cover shrink-0 border border-slate-200" alt="">
          <div class="flex-1 min-w-0">
            <div class="font-semibold text-slate-800 text-sm">{{ $m->name }}</div>
            <div class="text-xs text-slate-400">{{ $m->position }}</div>
          </div>
          <div class="flex items-center gap-2 shrink-0">
            <a href="{{ route('admin.org.edit', $m) }}"
               class="text-xs px-3 py-1.5 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-700 transition font-medium">Edit / Ganti Foto</a>
            <form action="{{ route('admin.org.destroy', $m) }}" method="POST"
                  @submit.prevent="window.dispatchEvent(new CustomEvent('palem-confirm',{detail:{title:'Hapus Anggota',message:'Anggota \"{{ $m->name }}\" akan dihapus dari struktur organisasi.',label:'Ya, Hapus',danger:true,form:$el}}))">
              @csrf @method('DELETE')
              <button class="text-xs px-3 py-1.5 rounded-lg bg-red-100 hover:bg-red-200 text-red-700 transition font-medium">Hapus</button>
            </form>
          </div>
        </div>
        @empty
        <div class="px-5 py-8 text-center text-sm text-slate-400">
          Belum ada anggota. <a href="{{ route('admin.org.create') }}" class="text-blue-600">Tambah sekarang</a>
        </div>
        @endforelse
      </div>
    </div>
  </div>

  {{-- ════════════════ LAYANAN ════════════════ --}}
  <div x-show="tab==='layanan'" x-cloak>
    <form method="POST" action="{{ route('admin.settings.update') }}">
      @csrf
      @foreach(['layanan'=>['⚙️','Semua Konten Halaman Layanan','Hero (judul + foto), 6 kartu layanan, tombol CTA hubungi kami']] as $grp=>[$ico,$ttl,$desc])
      @if(s($settings,$grp)->isNotEmpty())
      <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden mb-5">
        <div class="flex items-center gap-3 bg-gradient-to-r from-slate-50 to-white border-b border-slate-100 px-5 py-4">
          <span class="text-xl">{{ $ico }}</span>
          <div><div class="font-bold text-slate-800">{{ $ttl }}</div><div class="text-xs text-slate-400">{{ $desc }}</div></div>
        </div>
        <div class="p-5 grid grid-cols-1 md:grid-cols-2 gap-4">
          @foreach(s($settings,$grp)->sortBy('sort_order') as $s)
          <div class="{{ in_array($s->type,['textarea','image']) ? 'md:col-span-2' : '' }}">
            <label class="block text-sm font-semibold text-slate-700 mb-1">{{ $s->label }}</label>
            @if($s->type==='textarea')
              <textarea name="settings[{{ $s->key }}]" rows="2" class="{{ $tc }}">{{ old("settings.{$s->key}",$s->value) }}</textarea>
            @elseif($s->type==='image')
              @include('admin.partials._img_upload',['name'=>'settings['.$s->key.']','value'=>old("settings.{$s->key}",$s->value)])
            @else
              <input type="text" name="settings[{{ $s->key }}]" value="{{ old("settings.{$s->key}",$s->value) }}" class="{{ $ic }}">
            @endif
          </div>
          @endforeach
        </div>
      </div>
      @endif
      @endforeach
      <x-save-bar />
    </form>
  </div>

  {{-- ════════════════ BERITA & INFO ════════════════ --}}
  <div x-show="tab==='berita'" x-cloak>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
      <a href="{{ route('admin.posts.index', ['type'=>'berita']) }}"
         class="flex items-center gap-5 bg-white border border-slate-200 hover:border-blue-300 hover:shadow-md rounded-2xl p-6 transition group">
        <div class="w-14 h-14 rounded-2xl bg-blue-100 group-hover:bg-blue-200 text-blue-600 flex items-center justify-center text-2xl transition shrink-0">📰</div>
        <div>
          <div class="font-bold text-slate-800 mb-1">Kelola Berita</div>
          <div class="text-sm text-slate-500">Tambah, edit, hapus artikel berita. Atur foto, judul, isi, dan pilih berita unggulan.</div>
          <div class="text-xs text-blue-600 font-semibold mt-2">Buka →</div>
        </div>
      </a>
      <a href="{{ route('admin.posts.index', ['type'=>'informasi']) }}"
         class="flex items-center gap-5 bg-white border border-slate-200 hover:border-violet-300 hover:shadow-md rounded-2xl p-6 transition group">
        <div class="w-14 h-14 rounded-2xl bg-violet-100 group-hover:bg-violet-200 text-violet-600 flex items-center justify-center text-2xl transition shrink-0">📢</div>
        <div>
          <div class="font-bold text-slate-800 mb-1">Kelola Informasi / Pengumuman</div>
          <div class="text-sm text-slate-500">Tambah, edit, hapus pengumuman warga. Tandai pengumuman penting dengan label "Penting".</div>
          <div class="text-xs text-violet-600 font-semibold mt-2">Buka →</div>
        </div>
      </a>
    </div>
  </div>

  {{-- ════════════════ UMUM & KONTAK ════════════════ --}}
  <div x-show="tab==='umum'" x-cloak>
    <form method="POST" action="{{ route('admin.settings.update') }}">
      @csrf
      @foreach(['general'=>['🌐','Identitas Situs','Nama, tagline, dan teks copyright'],
                'contact'=>['📞','Kontak &amp; Lokasi','Alamat, telepon, WhatsApp, email, jam pelayanan'],
                'footer' =>['📋','Footer','Cuplikan berita di kotak footer']] as $grp=>[$ico,$ttl,$desc])
      @if(s($settings,$grp)->isNotEmpty())
      <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden mb-5">
        <div class="flex items-center gap-3 bg-gradient-to-r from-slate-50 to-white border-b border-slate-100 px-5 py-4">
          <span class="text-xl">{{ $ico }}</span>
          <div><div class="font-bold text-slate-800">{!! $ttl !!}</div><div class="text-xs text-slate-400">{!! $desc !!}</div></div>
        </div>
        <div class="p-5 grid grid-cols-1 md:grid-cols-2 gap-4">
          @foreach(s($settings,$grp)->sortBy('sort_order') as $s)
          <div class="{{ $s->type==='textarea' ? 'md:col-span-2' : '' }}">
            <label class="block text-sm font-semibold text-slate-700 mb-1">{{ $s->label }}</label>
            @if($s->type==='textarea')
              <textarea name="settings[{{ $s->key }}]" rows="2" class="{{ $tc }}">{{ old("settings.{$s->key}",$s->value) }}</textarea>
            @else
              <input type="text" name="settings[{{ $s->key }}]" value="{{ old("settings.{$s->key}",$s->value) }}" class="{{ $ic }}">
            @endif
          </div>
          @endforeach
        </div>
      </div>
      @endif
      @endforeach
      <x-save-bar />
    </form>
  </div>

</div>
@endsection
