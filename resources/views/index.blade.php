@extends('layouts.app')

@section('title', 'Home - Palem')

@section('content')

{{-- HERO CAROUSEL --}}
<section class="relative h-[520px] overflow-hidden" x-data="carousel({{ $carousel->count() }})">
  {{-- Slides --}}
  @forelse ($carousel as $i => $slide)
  <div class="absolute inset-0 transition-opacity duration-700"
       :class="current === {{ $i }} ? 'opacity-100 z-10' : 'opacity-0 z-0'">
    <img src="{{ $slide->image_url }}" class="w-full h-full object-cover scale-105" alt="{{ $slide->title }}">
    <div class="absolute inset-0 bg-gradient-to-r from-blue-950/90 via-blue-900/65 to-blue-700/20"></div>
    <div class="absolute inset-0 flex items-center">
      <div class="max-w-6xl mx-auto px-6 w-full">
        <div class="max-w-xl text-white">
          <div class="inline-flex items-center gap-2 bg-white/15 backdrop-blur-sm border border-white/25 text-white/90 text-xs font-semibold px-3.5 py-1.5 rounded-full mb-6">
            <span class="w-1.5 h-1.5 rounded-full bg-green-400 inline-block animate-pulse"></span>
            RW 09 &middot; Cluster Palem &middot; Bandung
          </div>
          <h1 class="text-4xl md:text-5xl font-extrabold leading-tight mb-5">{{ $slide->title }}</h1>
          @if ($slide->subtitle)
          <p class="text-white/75 text-base mb-8 leading-relaxed max-w-md">{{ $slide->subtitle }}</p>
          @endif
          @if ($slide->button_text)
          <a href="{{ $slide->button_url }}" class="inline-block bg-blue-500 hover:bg-blue-400 transition-colors text-white font-semibold px-6 py-3 rounded-xl text-sm shadow-lg shadow-blue-900/40">
            {{ $slide->button_text }}
          </a>
          @endif
        </div>
      </div>
    </div>
  </div>
  @empty
  {{-- Fallback if no carousel items yet --}}
  <div class="absolute inset-0">
    <img src="https://images.unsplash.com/photo-1543269865-cbf427effbad?w=1400&q=80" class="w-full h-full object-cover" alt="">
    <div class="absolute inset-0 bg-gradient-to-r from-blue-950/90 via-blue-900/65 to-blue-700/20 flex items-center">
      <div class="max-w-6xl mx-auto px-6">
        <h1 class="text-4xl font-extrabold text-white">Selamat Datang di Cluster Palem</h1>
      </div>
    </div>
  </div>
  @endforelse

  {{-- Dots navigation --}}
  @if ($carousel->count() > 1)
  <div class="absolute bottom-5 left-1/2 -translate-x-1/2 z-20 flex gap-2">
    @foreach ($carousel as $i => $slide)
    <button @click="goTo({{ $i }})"
            :class="current === {{ $i }} ? 'bg-white w-6' : 'bg-white/40 w-2'"
            class="h-2 rounded-full transition-all duration-300"></button>
    @endforeach
  </div>
  {{-- Prev / Next arrows --}}
  <button @click="prev()" class="absolute left-4 top-1/2 -translate-y-1/2 z-20 w-10 h-10 rounded-full bg-white/20 hover:bg-white/40 transition text-white flex items-center justify-center">&#8592;</button>
  <button @click="next()" class="absolute right-4 top-1/2 -translate-y-1/2 z-20 w-10 h-10 rounded-full bg-white/20 hover:bg-white/40 transition text-white flex items-center justify-center">&#8594;</button>
  @endif
</section>

<script>
function carousel(total) {
  return {
    current: 0,
    timer: null,
    init() { if (total > 1) this.timer = setInterval(() => this.next(), 5000); },
    next() { this.current = (this.current + 1) % total; },
    prev() { this.current = (this.current - 1 + total) % total; },
    goTo(i) { this.current = i; clearInterval(this.timer); this.timer = setInterval(() => this.next(), 5000); },
  };
}
</script>

{{-- STATS STRIP --}}
<section class="bg-white border-b border-slate-100 shadow-sm">
  <div class="max-w-6xl mx-auto px-6 grid grid-cols-2 md:grid-cols-4 divide-x divide-slate-100">
    <div class="flex flex-col items-center py-5 gap-0.5 reveal d1">
      <div class="text-2xl font-extrabold text-blue-600" data-count="{{ setting('stats.kk','250') }}" data-suffix="+">0+</div>
      <div class="text-xs text-slate-500 font-medium">Kepala Keluarga</div>
    </div>
    <div class="flex flex-col items-center py-5 gap-0.5 reveal d2">
      <div class="text-2xl font-extrabold text-emerald-600" data-count="{{ setting('stats.rt','6') }}" data-suffix="">0</div>
      <div class="text-xs text-slate-500 font-medium">Rukun Tetangga</div>
    </div>
    <div class="flex flex-col items-center py-5 gap-0.5 reveal d3">
      <div class="text-2xl font-extrabold text-violet-600" data-count="{{ setting('stats.tahun','2015') }}" data-suffix="">0</div>
      <div class="text-xs text-slate-500 font-medium">Tahun Berdiri</div>
    </div>
    <div class="flex flex-col items-center py-5 gap-0.5 reveal d4">
      <div class="text-2xl font-extrabold text-orange-500">24/7</div>
      <div class="text-xs text-slate-500 font-medium">Keamanan</div>
    </div>
  </div>
</section>

{{-- QUICK ACCESS --}}
<section class="max-w-6xl mx-auto px-6 pt-14 pb-2">
  <div class="text-center mb-8 reveal">
    <h2 class="text-xl font-bold text-slate-800">Akses Cepat</h2>
    <p class="text-sm text-slate-400 mt-1">Semua yang kamu butuhkan, dalam satu tempat</p>
  </div>
  <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-4">
    <a href="{{ route('profil') }}" class="group flex flex-col items-center justify-center gap-3 py-7 rounded-2xl bg-white hover:bg-blue-50 border border-slate-100 hover:border-blue-200 shadow-sm hover:shadow-lg transition-all duration-200 reveal-scale d1">
      <div class="w-12 h-12 rounded-2xl bg-blue-50 group-hover:bg-blue-100 flex items-center justify-center text-2xl transition-colors">&#127968;</div>
      <span class="text-xs font-semibold text-slate-700">Profil RW</span>
    </a>
    <a href="{{ route('layanan') }}" class="group flex flex-col items-center justify-center gap-3 py-7 rounded-2xl bg-white hover:bg-emerald-50 border border-slate-100 hover:border-emerald-200 shadow-sm hover:shadow-lg transition-all duration-200 reveal-scale d2">
      <div class="w-12 h-12 rounded-2xl bg-emerald-50 group-hover:bg-emerald-100 flex items-center justify-center text-2xl transition-colors">&#128179;</div>
      <span class="text-xs font-semibold text-slate-700">Bayar Iuran</span>
    </a>
    <a href="{{ route('informasi') }}" class="group flex flex-col items-center justify-center gap-3 py-7 rounded-2xl bg-white hover:bg-violet-50 border border-slate-100 hover:border-violet-200 shadow-sm hover:shadow-lg transition-all duration-200 reveal-scale d3">
      <div class="w-12 h-12 rounded-2xl bg-violet-50 group-hover:bg-violet-100 flex items-center justify-center text-2xl transition-colors">&#128197;</div>
      <span class="text-xs font-semibold text-slate-700">Event</span>
    </a>
    <a href="#" class="group flex flex-col items-center justify-center gap-3 py-7 rounded-2xl bg-white hover:bg-orange-50 border border-slate-100 hover:border-orange-200 shadow-sm hover:shadow-lg transition-all duration-200 reveal-scale d4">
      <div class="w-12 h-12 rounded-2xl bg-orange-50 group-hover:bg-orange-100 flex items-center justify-center text-2xl transition-colors">&#127978;</div>
      <span class="text-xs font-semibold text-slate-700">UMKM</span>
    </a>
    <a href="{{ route('layanan') }}" class="col-span-2 sm:col-span-1 group flex flex-col items-center justify-center gap-3 py-7 rounded-2xl bg-gradient-to-br from-blue-600 to-indigo-700 hover:from-blue-500 hover:to-indigo-600 border border-blue-700 shadow-md hover:shadow-xl hover:shadow-blue-200 transition-all duration-200 text-white reveal-scale d5">
      <div class="w-12 h-12 rounded-2xl bg-white/20 group-hover:bg-white/30 flex items-center justify-center text-2xl transition-colors">&#127919;</div>
      <span class="text-xs font-semibold">Pusat Pelayanan</span>
    </a>
  </div>
</section>

{{-- PELINDUNG BANNER --}}
<section class="max-w-6xl mx-auto px-6 mt-10">
  <div class="relative bg-gradient-to-r from-slate-900 via-slate-800 to-slate-900 rounded-2xl p-6 flex flex-col md:flex-row items-center justify-between gap-4 text-white overflow-hidden reveal">
    <div class="absolute top-0 right-0 w-72 h-72 bg-blue-600/10 rounded-full -translate-y-1/3 translate-x-1/4 pointer-events-none"></div>
    <div class="flex items-center gap-4 relative">
      <div class="w-12 h-12 rounded-xl bg-blue-600/30 border border-blue-500/30 flex items-center justify-center text-xl shrink-0">&#128247;</div>
      <p class="text-sm text-slate-300 leading-relaxed max-w-xl">
        <span class="font-bold text-white">{{ setting('home.pelindung_title','PELINDUNG') }}</span> &mdash; {{ setting('home.pelindung_text','CCTV pemantauan lingkungan di Kota Bandung.') }}</p>
    </div>
    <div class="text-right shrink-0 relative">
      <div class="text-sm font-bold text-white">{{ setting('home.pelindung_title','PELINDUNG') }}</div>
      <div class="text-xs text-slate-400 mt-0.5">{{ setting('home.pelindung_desc','Pemantauan Lingkungan Kota Bandung') }}</div>
    </div>
  </div>
</section>

{{-- EVENT + PROMO --}}
<section class="max-w-6xl mx-auto px-6 mt-14 grid grid-cols-1 md:grid-cols-2 gap-8">
  <div class="reveal-left">
    <div class="flex items-center gap-2.5 mb-5">
      <div class="w-1 h-5 rounded-full bg-blue-600"></div>
      <h2 class="text-sm font-bold text-slate-800 uppercase tracking-widest">Event Mendatang</h2>
    </div>
    <div class="bg-slate-50 border border-slate-100 rounded-2xl p-5">
      <div class="flex items-center gap-3 bg-white border border-slate-100 rounded-xl px-4 py-4 text-sm text-slate-400 shadow-sm">
        <span class="text-lg">&#128197;</span>
        <span>Tidak ada acara mendatang.</span>
      </div>
    </div>
  </div>
  <div class="relative rounded-2xl overflow-hidden group shadow-md reveal-right">
    <img src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?w=800&q=80" class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-500" alt="Pelatihan UMKM">
    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent flex flex-col justify-end p-6">
      <div class="text-[10px] font-bold bg-yellow-400 text-slate-900 px-2.5 py-1 rounded-full w-fit mb-2 tracking-wide">PROMO</div>
      <h3 class="text-white font-bold text-lg mb-3 leading-snug">Pelatihan UMKM Landing Page</h3>
      <a href="#" class="text-xs font-semibold bg-blue-600 hover:bg-blue-500 transition text-white w-fit px-4 py-2 rounded-lg">Pelajari lebih lanjut &rarr;</a>
    </div>
  </div>
</section>

{{-- APP PROMO --}}
<section class="max-w-6xl mx-auto px-6 mt-20 grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
  <div class="relative reveal-left">
    <img src="{{ setting('home.app_img','https://images.unsplash.com/photo-1551836022-d5d88e9218df?w=700&q=80') }}"
         class="rounded-3xl w-full h-72 object-cover shadow-xl" alt="Portal Palem">
  </div>
  <div class="reveal-right">
    <div class="inline-block text-xs font-semibold text-blue-600 bg-blue-50 px-3 py-1.5 rounded-full mb-4">{{ setting('home.app_badge','Tentang Portal Kami') }}</div>
    <h2 class="text-3xl font-extrabold mb-4 leading-tight">{{ setting('home.app_title','Portal Resmi Warga Palem') }}</h2>
    <p class="text-slate-500 text-sm mb-7 leading-relaxed">{{ setting('home.app_subtitle','Semua informasi, layanan, dan kegiatan warga tersedia dalam satu portal.') }}</p>
    <div class="grid grid-cols-2 gap-4">
      <div class="border border-slate-100 rounded-2xl p-5 hover:shadow-md transition-shadow bg-white">
        <div class="text-blue-600 text-xl mb-2">&#127760;</div>
        <div class="font-semibold text-sm mb-1">{{ setting('home.app_card1_title','Website Resmi') }}</div>
        <div class="text-xs text-slate-400 leading-relaxed">{{ setting('home.app_card1_desc','Akses layanan dan informasi warga kapan saja.') }}</div>
      </div>
      <div class="border border-slate-100 rounded-2xl p-5 hover:shadow-md transition-shadow bg-white">
        <div class="text-green-500 text-xl mb-2">&#128242;</div>
        <div class="font-semibold text-sm mb-1">{{ setting('home.app_card2_title','WhatsApp Pengurus') }}</div>
        <div class="text-xs text-slate-400 leading-relaxed">{{ setting('home.app_card2_desc','Konsultasi dan pengaduan langsung ke pengurus RW.') }}</div>
      </div>
    </div>
  </div>
</section>

<div class="h-20"></div>
@endsection

