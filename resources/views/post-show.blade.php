@extends('layouts.app')

@section('title', $post->title . ' - Palem')

@section('content')
@php
  $isBerita = $post->type === 'berita';
  $indexRoute = $isBerita ? route('berita') : route('informasi');
  $indexLabel = $isBerita ? 'Berita' : 'Informasi';
@endphp

<section class="bg-gradient-to-br from-slate-50 to-blue-50/40 border-b border-slate-100">
  <div class="max-w-3xl mx-auto px-6 pt-12 pb-10 reveal">
    <nav class="text-xs text-slate-400 mb-5 flex items-center gap-2 flex-wrap">
      <a href="{{ route('home') }}" class="hover:text-blue-600 transition">Beranda</a>
      <span>/</span>
      <a href="{{ $indexRoute }}" class="hover:text-blue-600 transition">{{ $indexLabel }}</a>
    </nav>

    <div class="flex items-center gap-2 mb-4 flex-wrap">
      @if ($post->is_featured)
        <span class="text-[10px] font-bold bg-yellow-400 text-slate-900 px-2.5 py-1 rounded-full tracking-wide">⭐ Unggulan</span>
      @endif
      <span class="text-[10px] font-bold bg-blue-100 text-blue-600 px-2.5 py-1 rounded-full tracking-wide uppercase">{{ $indexLabel }}</span>
      <span class="text-xs text-slate-400">{{ optional($post->published_at)->translatedFormat('d F Y, H:i') ?? '-' }}</span>
    </div>

    <h1 class="text-3xl font-extrabold text-slate-800 leading-tight mb-4">{{ $post->title }}</h1>

    @if ($post->excerpt)
      <p class="text-sm text-slate-500 leading-relaxed">{{ $post->excerpt }}</p>
    @endif
  </div>
</section>

<article class="max-w-3xl mx-auto px-6 py-12">
  @if ($post->image_url)
    <img src="{{ $post->image_url }}" alt="{{ $post->title }}"
         class="w-full h-80 object-cover rounded-2xl shadow-md mb-10 reveal-scale">
  @endif

  <div class="text-[15px] text-slate-600 leading-[1.9] reveal">
    @if (filled($post->content))
      {!! nl2br(e($post->content)) !!}
    @else
      <p class="text-slate-400 italic">Isi lengkap belum tersedia.</p>
    @endif
  </div>

  <div class="mt-12 pt-8 border-t border-slate-100 flex items-center justify-between gap-4 flex-wrap">
    <a href="{{ $indexRoute }}"
       class="inline-flex items-center gap-2 text-sm font-semibold text-blue-600 hover:text-blue-800 transition">
      ← Kembali ke {{ $indexLabel }}
    </a>
    <a href="https://wa.me/{{ setting('contact.wa','02287506667') }}" target="_blank" rel="noopener noreferrer"
       class="inline-flex items-center gap-2 text-sm font-semibold bg-emerald-50 hover:bg-emerald-100 text-emerald-700 px-4 py-2 rounded-xl transition">
      Tanya Pengurus RW
    </a>
  </div>
</article>

@if ($related->isNotEmpty())
<section class="max-w-5xl mx-auto px-6 pb-20">
  <div class="flex items-center gap-2.5 mb-6 reveal">
    <div class="w-1 h-5 rounded-full bg-blue-600"></div>
    <h2 class="font-bold text-slate-800">{{ $indexLabel }} Lainnya</h2>
  </div>

  <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
    @foreach ($related as $item)
      <a href="{{ $isBerita ? route('berita.show', $item) : route('informasi.show', $item) }}"
         class="group border border-slate-100 rounded-2xl overflow-hidden bg-white hover:shadow-lg hover:-translate-y-0.5 transition-all duration-200 reveal-scale">
        @if ($item->image_url)
          <img src="{{ $item->image_url }}" alt="{{ $item->title }}"
               class="w-full h-32 object-cover group-hover:scale-105 transition-transform duration-500">
        @endif
        <div class="p-4">
          <div class="text-[10px] text-slate-400 mb-1.5 font-medium">{{ optional($item->published_at)->format('d M Y') ?? '-' }}</div>
          <h3 class="text-sm font-bold text-slate-800 leading-snug group-hover:text-blue-600 transition-colors">{{ $item->title }}</h3>
        </div>
      </a>
    @endforeach
  </div>
</section>
@endif
@endsection
