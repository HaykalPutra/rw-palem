@extends('layouts.app')

@section('title', 'Profil - Palem')

@section('content')

{{-- HERO --}}
<section class="relative h-72 overflow-hidden">
  <img src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?w=1200&q=80" class="w-full h-full object-cover" alt="Cluster Palem">
  <div class="absolute inset-0 bg-gradient-to-r from-blue-950/85 via-blue-900/60 to-blue-700/20"></div>
  <div class="absolute inset-0 flex flex-col items-center justify-center text-center px-6">
    <div class="inline-flex items-center gap-2 bg-white/15 border border-white/25 text-white/90 text-xs font-semibold px-3 py-1.5 rounded-full mb-4">
      &#127968; {{ setting('profil.hero_badge','RW 10 Cluster Palem') }}
    </div>
    <h1 class="text-white text-3xl md:text-4xl font-extrabold mb-3">{{ setting('profil.hero_title','Profil RW Cluster Palem') }}</h1>
    <p class="text-white/75 text-sm max-w-xl leading-relaxed">{{ setting('profil.hero_subtitle','Mewujudkan lingkungan yang aman, nyaman, dan harmonis.') }}</p>
  </div>
</section>

{{-- VISI MISI --}}
<section class="max-w-6xl mx-auto px-6 -mt-8 relative grid grid-cols-1 md:grid-cols-2 gap-6 z-10">
  <div class="bg-white rounded-2xl shadow-lg p-7 border border-slate-100 hover:shadow-xl transition-shadow reveal-left d1">
    <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center text-xl mb-4">&#128065;</div>
    <h3 class="font-bold text-slate-800 mb-3">Visi Kami</h3>
    <p class="text-sm text-slate-500 leading-relaxed">{{ setting('profil.visi','Menjadi rukun warga yang mandiri, sejahtera, dan berbudaya lingkungan.') }}</p>
  </div>
  <div class="bg-white rounded-2xl shadow-lg p-7 border border-slate-100 hover:shadow-xl transition-shadow reveal-right d2">
    <div class="w-10 h-10 rounded-xl bg-emerald-50 flex items-center justify-center text-xl mb-4">&#127988;</div>
    <h3 class="font-bold text-slate-800 mb-3">Misi Kami</h3>
    <ul class="text-sm text-slate-500 space-y-2 leading-relaxed">
      <li class="flex items-start gap-2"><span class="text-emerald-500 font-bold shrink-0 mt-0.5">&#10003;</span> {{ setting('profil.misi_1','Meningkatkan keamanan dan ketertiban lingkungan.') }}</li>
      <li class="flex items-start gap-2"><span class="text-emerald-500 font-bold shrink-0 mt-0.5">&#10003;</span> {{ setting('profil.misi_2','Mengoptimalkan kebersihan dan kesehatan lingkungan.') }}</li>
      <li class="flex items-start gap-2"><span class="text-emerald-500 font-bold shrink-0 mt-0.5">&#10003;</span> {{ setting('profil.misi_3','Membangun kerukunan antar warga melalui kegiatan sosial.') }}</li>
      <li class="flex items-start gap-2"><span class="text-emerald-500 font-bold shrink-0 mt-0.5">&#10003;</span> {{ setting('profil.misi_4','Mewujudkan transparansi pengelolaan dana kas RW.') }}</li>
    </ul>
  </div>
</section>

{{-- STRUKTUR ORGANISASI --}}
<section class="max-w-6xl mx-auto px-6 mt-16">
  <div class="relative overflow-hidden bg-gradient-to-br from-sky-50 via-white to-cyan-50/70 rounded-3xl py-14 px-5 md:px-8 border border-sky-100 shadow-sm reveal">
    <div class="pointer-events-none absolute inset-0">
      <div class="absolute -top-16 -left-12 w-56 h-56 rounded-full bg-sky-200/20 blur-3xl"></div>
      <div class="absolute -bottom-20 -right-12 w-64 h-64 rounded-full bg-emerald-200/20 blur-3xl"></div>
    </div>

    <div class="relative text-center mb-12">
      <div class="inline-flex items-center gap-2 text-xs font-semibold bg-sky-100 text-sky-700 px-3 py-1.5 rounded-full mb-3">&#127959; Organisasi</div>

      <div class="mx-auto mb-4 inline-flex flex-wrap items-center justify-center gap-2 rounded-full border border-sky-200 bg-white/80 px-4 py-2 shadow-sm">
        <span class="text-xs font-bold uppercase tracking-[0.12em] text-sky-700">{{ setting('profil.rw_label', 'RW 09') }}</span>
        <span class="text-slate-300">/</span>
        <span class="text-xs font-medium text-slate-600">{{ setting('profil.lokasi_label', 'Kelurahan Rancabolang Kecamatan Gedebage Kota Bandung') }}</span>
        <span class="text-slate-300">/</span>
        <span class="text-xs font-semibold text-emerald-700">{{ setting('profil.periode_label', 'Periode 2026–2031') }}</span>
      </div>

      <h2 class="text-2xl md:text-3xl font-extrabold text-slate-800">Struktur Organisasi</h2>
    </div>

    <div class="relative flex flex-col items-center gap-8">
      {{-- Level 1: Ketua RW (struktur tetap) --}}
      @if ($ketua)
      <div class="w-full flex justify-center">
        <article class="group relative w-full max-w-[320px] bg-white/95 backdrop-blur rounded-2xl border border-sky-100 p-6 flex flex-col items-center text-center shadow-md hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
          <span class="absolute -top-3 px-3 py-1 text-[11px] font-semibold rounded-full bg-sky-100 text-sky-700 border border-sky-200">Pimpinan RW</span>
          <img src="{{ $ketua->photo_url }}" alt="{{ $ketua->name }}" class="w-24 h-24 rounded-full object-cover ring-4 ring-sky-50 border border-sky-100 shadow-sm mt-2">
          <h3 class="mt-4 text-xl font-bold text-slate-800 leading-tight">{{ $ketua->name }}</h3>
          <p class="text-sm text-sky-700 font-semibold mt-1">{{ $ketua->position }}</p>
          @if ($ketua->period)
            <p class="text-xs text-slate-400 mt-1">Periode {{ $ketua->period }}</p>
          @endif
        </article>
      </div>
      @endif

      {{-- Connector level 1 to 2 --}}
      <div class="hidden md:block absolute top-[178px] left-1/2 -translate-x-1/2 w-px h-14 bg-sky-200"></div>

      {{-- Level 2: RT (struktur tetap) --}}
      <div class="relative w-full flex flex-wrap justify-center gap-4 md:gap-5 pt-2">
        <div class="hidden md:block absolute top-0 left-[70px] right-[70px] h-px bg-sky-200"></div>
        @foreach($rts as $rt)
          <div class="flex flex-col items-center">
            <div class="hidden md:block w-px h-8 bg-sky-200"></div>
            <article class="group relative w-[130px] bg-white rounded-xl border border-emerald-100 px-3 py-4 flex flex-col items-center text-center shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
              <img src="{{ $rt->photo_url }}" alt="{{ $rt->name }}" class="w-14 h-14 rounded-full object-cover ring-2 ring-emerald-50 border border-emerald-100 shadow-sm">
              <h3 class="mt-2 text-[13px] font-bold text-slate-800 leading-tight">{{ $rt->name }}</h3>
              <p class="text-[11px] text-emerald-700 font-semibold mt-0.5">RT {{ str_pad($rt->rt_number, 2, '0', STR_PAD_LEFT) }}</p>
            </article>
          </div>
        @endforeach
      </div>

      {{-- Connector level 2 to 3 --}}
      <div class="hidden md:block w-px h-8 bg-sky-200"></div>

      {{-- Level 3 --}}
      <div class="w-full mt-2">
        <h3 class="text-center text-xl font-bold text-slate-700 mb-5">Tim Divisi RW</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
          @forelse($divisi as $d)
            <article class="group bg-white/95 rounded-2xl border border-slate-200 p-5 flex flex-col items-center text-center shadow-sm hover:shadow-lg hover:border-sky-200 hover:-translate-y-1 transition-all duration-300">
              <img src="{{ $d->photo_url }}" alt="{{ $d->name }}" class="w-16 h-16 rounded-full object-cover border-2 border-white ring-2 ring-slate-100 shadow-sm">
              <h4 class="mt-3 text-base font-bold text-slate-800 leading-tight">{{ $d->name }}</h4>
              <p class="text-sm text-slate-500 mt-1">{{ $d->position }}</p>
            </article>
          @empty
            <div class="sm:col-span-2 lg:col-span-4 rounded-2xl border border-dashed border-slate-300 bg-white/70 p-6 text-center text-sm text-slate-500">
              Data tim belum tersedia. Tambahkan anggota dari panel admin untuk menampilkan struktur organisasi.
            </div>
          @endforelse
        </div>
      </div>
    </div>
  </div>
</section>

{{-- SEJARAH & WILAYAH --}}
<section class="max-w-6xl mx-auto px-6 mt-16 grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
  <div class="reveal-left">
    <div class="inline-block text-xs font-semibold text-blue-600 bg-blue-50 px-3 py-1.5 rounded-full mb-4">&#128205; {{ setting('profil.sejarah_badge','Sejarah &amp; Wilayah') }}</div>
    <h2 class="text-2xl font-extrabold mb-4 text-slate-800">{{ setting('profil.sejarah_title','Tentang Cluster Palem') }}</h2>
    <p class="text-sm text-slate-500 leading-relaxed mb-6">{{ setting('profil.sejarah','Cluster Palem diresmikan pada tahun 2015.') }}</p>
    <p class="text-sm text-slate-500 leading-relaxed mb-8">{{ setting('profil.sejarah_2','Secara administratif, Cluster Palem meliputi 6 RT.') }}</p>
    <div class="grid grid-cols-3 gap-4">
      <div class="bg-blue-50 rounded-2xl p-4 text-center">
        <div class="text-2xl font-extrabold text-blue-600">{{ setting('stats.rt','6') }}</div>
        <div class="text-xs text-slate-500 mt-1">Rukun Tetangga</div>
      </div>
      <div class="bg-emerald-50 rounded-2xl p-4 text-center">
        <div class="text-2xl font-extrabold text-emerald-600">{{ setting('stats.kk','250') }}+</div>
        <div class="text-xs text-slate-500 mt-1">Kepala Keluarga</div>
      </div>
      <div class="bg-violet-50 rounded-2xl p-4 text-center">
        <div class="text-2xl font-extrabold text-violet-600">{{ setting('stats.tahun','2015') }}</div>
        <div class="text-xs text-slate-500 mt-1">Tahun Berdiri</div>
      </div>
    </div>
  </div>
  <div class="relative reveal-right">
    <img src="{{ setting('profil.sejarah_img','https://images.unsplash.com/photo-1500382017468-9049fed747ef?w=700&q=80') }}"
         class="rounded-3xl w-full h-80 object-cover shadow-xl" alt="Wilayah RW">
    <div class="absolute -bottom-4 -left-4 bg-white rounded-2xl shadow-lg p-4 border border-slate-100">
      <div class="text-xs font-bold text-slate-700">&#127968; {{ setting('profil.sejarah_location','Gedebage, Bandung') }}</div>
    </div>
  </div>
</section>

<div class="h-20"></div>
@endsection

