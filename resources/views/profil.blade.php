@extends('layouts.app')

@section('title', 'Profil - Palem')

@section('content')

{{-- HERO --}}
<section class="relative h-64 overflow-hidden">
  <img src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?w=1200&q=80" class="w-full h-full object-cover" alt="Cluster Palem">
  <div class="absolute inset-0 bg-black/50 flex flex-col items-center justify-center text-center px-6">
    <h1 class="text-white text-3xl font-extrabold mb-2">{{ setting('profil.hero_title','Profil RW Cluster Palem') }}</h1>
    <p class="text-white/80 text-sm max-w-xl">{{ setting('profil.hero_subtitle','Mewujudkan lingkungan yang aman, nyaman, dan harmonis menuju tata kelola warga yang transparan dan partisipatif.') }}</p>
  </div>
</section>

{{-- VISI MISI --}}
<section class="max-w-6xl mx-auto px-6 -mt-10 relative grid grid-cols-1 md:grid-cols-2 gap-6">
  <div class="bg-white rounded-xl shadow p-6">
    <div class="text-blue-600 mb-3 text-2xl">👁</div>
    <h3 class="font-semibold mb-2">Visi Kami</h3>
    <p class="text-sm text-slate-500 leading-relaxed">{{ setting('profil.visi','Menjadi rukun warga yang mandiri, sejahtera, dan berbudaya lingkungan, berlandaskan semangat gotong royong dan toleransi di Cluster Palem.') }}</p>
  </div>
  <div class="bg-white rounded-xl shadow p-6">
    <div class="text-blue-600 mb-3 text-2xl">🏴</div>
    <h3 class="font-semibold mb-2">Misi Kami</h3>
    <ul class="text-sm text-slate-500 space-y-1.5 leading-relaxed">
      <li>✓ {{ setting('profil.misi_1','Meningkatkan keamanan dan ketertiban lingkungan secara swadaya dan terpadu.') }}</li>
      <li>✓ {{ setting('profil.misi_2','Mengoptimalkan kebersihan, penghijauan, dan kesehatan lingkungan cluster.') }}</li>
      <li>✓ {{ setting('profil.misi_3','Membangun kerukunan antar warga melalui kegiatan sosial dan kemasyarakatan.') }}</li>
      <li>✓ {{ setting('profil.misi_4','Mewujudkan transparansi pengelolaan dana kas RW yang akuntabel.') }}</li>
    </ul>
  </div>
</section>

{{-- STRUKTUR ORGANISASI --}}
<section class="max-w-6xl mx-auto px-6 mt-16 bg-slate-50 rounded-2xl py-12 text-center">
  <h2 class="text-xl font-bold mb-1">Struktur Pos Pelayanan Terpadu Palem</h2>
  <p class="text-sm text-slate-400 mb-12">{{ setting('profil.lokasi_label','Kelurahan Rancabolang') }}, {{ setting('profil.periode_label','Tahun 2026 - 2031') }}</p>

  <div class="max-w-5xl mx-auto space-y-12">

    {{-- Level 1: Ketua RW --}}
    @if ($ketua)
    <div class="flex justify-center">
      <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-100 w-64 flex flex-col items-center">
        <img src="{{ $ketua->photo_url }}" alt="{{ $ketua->name }}" class="w-12 h-12 rounded-full object-cover mb-4">
        <div class="text-sm font-bold text-slate-800">{{ $ketua->name }}</div>
        <div class="text-xs text-blue-600 font-medium">{{ $ketua->position }}</div>
      </div>
    </div>
    @endif

    {{-- Level 2: Sekretaris & Bendahara --}}
    @if ($sekretaris || $bendahara)
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-2xl mx-auto">
      @if ($sekretaris)
      <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-100 flex flex-col items-center">
        <img src="{{ $sekretaris->photo_url }}" alt="{{ $sekretaris->name }}" class="w-12 h-12 rounded-full object-cover mb-4">
        <div class="text-sm font-bold text-slate-800">{{ $sekretaris->name }}</div>
        <div class="text-xs text-blue-600 font-medium">Sekretaris</div>
      </div>
      @endif
      @if ($bendahara)
      <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-100 flex flex-col items-center">
        <img src="{{ $bendahara->photo_url }}" alt="{{ $bendahara->name }}" class="w-12 h-12 rounded-full object-cover mb-4">
        <div class="text-sm font-bold text-slate-800">{{ $bendahara->name }}</div>
        <div class="text-xs text-blue-600 font-medium">Bendahara</div>
      </div>
      @endif
    </div>
    @endif

    {{-- Level 3: Bidang / Seksi --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      @forelse ($bidangGroups as $bidang)
      <div class="bg-white/50 p-5 rounded-xl border border-blue-100 text-left">
        <h4 class="text-xs font-bold text-blue-600 uppercase mb-4 border-b border-blue-100 pb-2">{{ $bidang['nama'] }}</h4>
        <div class="space-y-3">
          @foreach ($bidang['anggota'] as $a)
          <div class="flex items-center gap-3">
            <img src="{{ $a['model']->photo_url }}" alt="{{ $a['model']->name }}" class="w-8 h-8 rounded-full object-cover">
            <div>
              <div class="text-xs font-semibold">{{ $a['model']->name }}</div>
              <div class="text-[10px] text-slate-400">{{ $a['jabatan'] }}</div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
      @empty
      <div class="md:col-span-3 rounded-xl border border-dashed border-slate-300 bg-white/70 p-6 text-center text-sm text-slate-500">
        Data bidang/seksi belum tersedia. Tambahkan dari panel admin.
      </div>
      @endforelse
    </div>

    {{-- Level 4: RT & PKK --}}
    <div class="pt-8 border-t border-slate-200">
      <div class="flex flex-col md:flex-row gap-8 items-start justify-center">
        <div class="w-full md:flex-1">
          <h3 class="text-xs font-bold text-slate-800 mb-4 uppercase tracking-wider text-left">Susunan Pengurus RT</h3>
          <div class="grid grid-cols-3 md:grid-cols-6 gap-2">
            @foreach ($rts as $rt)
            <div class="bg-white p-2 rounded-lg border border-slate-200 text-center">
              <div class="text-[10px] font-bold text-blue-600">RT {{ str_pad($rt->rt_number, 2, '0', STR_PAD_LEFT) }}</div>
            </div>
            @endforeach
          </div>
        </div>

        @if ($pkk->isNotEmpty())
        <div class="bg-emerald-500/10 p-5 rounded-xl border border-emerald-500/20 w-full md:w-auto">
          <h3 class="text-xs font-bold text-emerald-600 mb-4 uppercase tracking-wider">Tim Penggerak PKK</h3>
          <div class="flex gap-8 justify-center flex-wrap">
            @foreach ($pkk as $p)
            <div class="flex items-center gap-3">
              <img src="{{ $p['model']->photo_url }}" alt="{{ $p['model']->name }}" class="w-8 h-8 rounded-full object-cover border border-emerald-100">
              <div class="text-left">
                <div class="text-[10px] font-bold text-slate-500 uppercase">{{ $p['jabatan'] }}</div>
                <div class="text-xs text-slate-800 font-semibold">{{ $p['model']->name }}</div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
        @endif
      </div>
    </div>

  </div>
</section>

{{-- SEJARAH & WILAYAH --}}
<section class="max-w-6xl mx-auto px-6 mt-16 grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
  <div>
    <h2 class="text-xl font-bold mb-4">{{ setting('profil.sejarah_title','Sejarah & Wilayah') }}</h2>
    <p class="text-sm text-slate-500 leading-relaxed mb-6">{{ setting('profil.sejarah','Cluster Palem diresmikan pada tahun 2015 sebagai bagian dari pengembangan tahap kedua perumahan Bumi Adipura. Sejak awal, cluster ini dirancang dengan konsep hunian modern yang menyatu dengan alam, mengedepankan ruang terbuka hijau dan sistem keamanan terpadu satu pintu (One Gate System).') }}</p>
    <p class="text-sm text-slate-500 leading-relaxed mb-6">{{ setting('profil.sejarah_2','Secara administratif, Cluster Palem meliputi 6 Rukun Tetangga (RT) dengan total sekitar 250 Kepala Keluarga. Wilayah kami dilengkapi dengan berbagai fasilitas umum seperti taman bermain anak, lapangan multifungsi, dan balai warga yang menjadi pusat kegiatan kemasyarakatan.') }}</p>
    <div class="bg-slate-50 rounded-xl px-6 py-4 inline-block">
      <div class="text-3xl font-extrabold text-blue-600">{{ setting('stats.rt','6') }}</div>
      <div class="text-xs text-slate-400">Rukun Tetangga</div>
    </div>
  </div>
  <img src="{{ setting('profil.sejarah_img','https://images.unsplash.com/photo-1500382017468-9049fed747ef?w=700&q=80') }}"
       class="rounded-2xl w-full h-72 object-cover" alt="Peta RW Cluster Palem">
</section>

<div class="h-16"></div>
@endsection 