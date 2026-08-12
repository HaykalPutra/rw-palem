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
  <div class="bg-gradient-to-br from-slate-50 to-blue-50/40 rounded-3xl py-14 px-6 border border-slate-100 reveal">

    <div class="text-center mb-12">
      <div class="inline-flex items-center gap-2 text-xs font-semibold bg-blue-100 text-blue-600 px-3 py-1.5 rounded-full mb-3">&#127959; Organisasi</div>
      <h2 class="text-2xl font-bold text-slate-800">Struktur Organisasi</h2>
      <p class="text-sm text-slate-400 mt-1">Pejabat dan staf Cluster Palem RW 10</p>
    </div>

    <div class="overflow-x-auto">
      <div class="flex flex-col items-center min-w-[720px] mx-auto pb-8">

        {{-- Level 1: Ketua RW --}}
        @if ($ketua)
        <div class="group relative cursor-pointer">
          <div class="flex flex-col items-center gap-3 bg-white rounded-2xl px-10 py-6 shadow-lg border-2 border-blue-100 group-hover:border-blue-400 group-hover:shadow-xl group-hover:shadow-blue-100/60 transition-all duration-300 group-hover:-translate-y-1">
            <img src="{{ $ketua->photo_url }}"
                 class="w-20 h-20 rounded-full ring-4 ring-blue-50 shadow-md transition-transform duration-300 group-hover:scale-105" alt="{{ $ketua->name }}">
            <div class="text-center">
              <div class="text-[10px] font-bold text-blue-600 uppercase tracking-widest mb-1">{{ $ketua->position }}</div>
              <div class="font-extrabold text-slate-800 text-base leading-tight">{{ $ketua->name }}</div>
              @if ($ketua->period)<div class="text-xs text-slate-400 mt-0.5">Periode {{ $ketua->period }}</div>@endif
            </div>
          </div>
          <div class="pointer-events-none absolute left-1/2 -translate-x-1/2 top-full mt-3 w-56 bg-slate-900 text-white text-xs rounded-2xl p-4 opacity-0 group-hover:opacity-100 translate-y-2 group-hover:translate-y-0 transition-all duration-200 z-50 shadow-2xl">
            <div class="absolute -top-1.5 left-1/2 -translate-x-1/2 w-3 h-3 bg-slate-900 rotate-45 rounded-sm"></div>
            <div class="font-bold text-sm mb-2">{{ $ketua->name }}</div>
            @if ($ketua->phone)<div class="text-slate-300 mb-1">&#128222; {{ $ketua->phone }}</div>@endif
            @if ($ketua->description)<div class="text-slate-400 text-[10px] mt-2 pt-2 border-t border-slate-700">{{ $ketua->description }}</div>@endif
          </div>
        </div>
        @endif

        <div class="w-px h-8 bg-slate-200"></div>

        {{-- Level 2: RT Row --}}
        <div class="relative flex gap-5 justify-center">
          <div class="absolute top-0 left-[50px] right-[50px] h-px bg-slate-200"></div>
          @foreach($rts as $rt)
          <div class="flex flex-col items-center">
            <div class="w-px h-8 bg-slate-200 relative z-10"></div>
            <div class="group relative cursor-pointer">
              <div class="flex flex-col items-center gap-2 bg-white rounded-xl px-3 py-4 shadow-md border border-emerald-100 group-hover:border-emerald-400 group-hover:shadow-lg group-hover:shadow-emerald-100/50 transition-all duration-300 group-hover:-translate-y-1 w-[100px]">
                <img src="{{ $rt->photo_url }}"
                     class="w-12 h-12 rounded-full ring-2 ring-emerald-50 shadow-sm transition-transform duration-300 group-hover:scale-105" alt="{{ $rt->name }}">
                <div class="text-center">
                  <div class="text-[9px] font-bold text-emerald-600 uppercase tracking-wide">RT {{ str_pad($rt->rt_number, 2, '0', STR_PAD_LEFT) }}</div>
                  <div class="font-semibold text-slate-700 text-[11px] leading-tight mt-0.5">{{ $rt->name }}</div>
                </div>
              </div>
              <div class="pointer-events-none absolute left-1/2 -translate-x-1/2 top-full mt-2 w-44 bg-slate-900 text-white text-xs rounded-xl p-3 opacity-0 group-hover:opacity-100 translate-y-2 group-hover:translate-y-0 transition-all duration-200 z-50 shadow-xl">
                <div class="absolute -top-1.5 left-1/2 -translate-x-1/2 w-3 h-3 bg-slate-900 rotate-45 rounded-sm"></div>
                <div class="font-bold mb-1.5">{{ $rt->name }}</div>
                <div class="text-slate-300 mb-0.5">&#127968; Ketua RT {{ str_pad($rt->rt_number, 2, '0', STR_PAD_LEFT) }}</div>
                @if ($rt->phone)<div class="text-slate-300">&#128222; {{ $rt->phone }}</div>@endif
              </div>
            </div>
          </div>
          @endforeach
        </div>

        <div class="w-px h-8 bg-slate-200"></div>

        {{-- Level 3: Divisi (dari database) --}}
        <div class="relative flex gap-10 justify-center">
          <div class="absolute top-0 left-[55px] right-[55px] h-px bg-slate-200"></div>
          @foreach($divisi as $d)
          <div class="flex flex-col items-center">
            <div class="w-px h-8 bg-slate-200 relative z-10"></div>
            <div class="group relative cursor-pointer">
              <div class="flex flex-col items-center gap-2 bg-white rounded-xl px-4 py-4 shadow-md border border-slate-100 group-hover:border-blue-300 group-hover:shadow-lg group-hover:shadow-blue-100/50 transition-all duration-300 group-hover:-translate-y-1 w-[110px]">
                <img src="{{ $d->photo_url }}"
                     class="w-12 h-12 rounded-full ring-2 ring-slate-100 shadow-sm transition-transform duration-300 group-hover:scale-105" alt="{{ $d->name }}">
                <div class="text-center">
                  <div class="text-[9px] font-bold text-blue-600 uppercase tracking-wide leading-tight">{{ $d->position }}</div>
                  <div class="font-semibold text-slate-700 text-[11px] leading-tight mt-0.5">{{ $d->name }}</div>
                </div>
              </div>
              <div class="pointer-events-none absolute left-1/2 -translate-x-1/2 top-full mt-2 w-48 bg-slate-900 text-white text-xs rounded-xl p-3 opacity-0 group-hover:opacity-100 translate-y-2 group-hover:translate-y-0 transition-all duration-200 z-50 shadow-xl">
                <div class="absolute -top-1.5 left-1/2 -translate-x-1/2 w-3 h-3 bg-slate-900 rotate-45 rounded-sm"></div>
                <div class="font-bold mb-1.5">{{ $d->name }}</div>
                <div class="text-slate-300 mb-0.5">{{ $d->position }}</div>
                @if ($d->phone)<div class="text-slate-300 mb-0.5">&#128222; {{ $d->phone }}</div>@endif
                @if ($d->description)<div class="text-slate-400 text-[10px] mt-1.5 pt-1.5 border-t border-slate-700">{{ $d->description }}</div>@endif
              </div>
            </div>
          </div>
          @endforeach
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

