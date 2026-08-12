@extends('layouts.app')

@section('title', 'Berita - Palem')

@section('content')

{{-- PAGE HEADER --}}
<section class="bg-gradient-to-br from-slate-50 to-blue-50/40 border-b border-slate-100">
  <div class="max-w-3xl mx-auto px-6 pt-14 pb-12 text-center reveal">
    <div class="inline-flex items-center gap-2 bg-blue-100 text-blue-600 text-xs font-semibold px-3 py-1.5 rounded-full mb-4">&#128240; Portal Informasi</div>
    <h1 class="text-3xl font-extrabold text-slate-800 mt-1 mb-3">Berita &amp; Kegiatan Cluster</h1>
    <p class="text-sm text-slate-500 leading-relaxed">Tetap terhubung dengan perkembangan terbaru, pengumuman penting, dan aktivitas komunitas di Cluster Palem.</p>
  </div>
</section>

<section class="max-w-6xl mx-auto px-6 py-12 pb-20 grid grid-cols-1 md:grid-cols-3 gap-10">
  <div class="md:col-span-2">
    @if ($headline)
      <div class="rounded-2xl overflow-hidden mb-5 relative group shadow-md reveal-scale">
        <img src="{{ $headline->image_url ?: 'https://images.unsplash.com/photo-1529156069898-49953e39b3ac?w=900&q=80' }}" class="w-full h-72 object-cover group-hover:scale-105 transition-transform duration-500" alt="{{ $headline->title }}">
        @if ($headline->is_featured)
          <span class="absolute top-4 left-4 text-[10px] font-bold bg-yellow-400 text-slate-900 px-2.5 py-1 rounded-full tracking-wide">&#11088; Unggulan</span>
        @endif
        <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
      </div>
      <div class="text-xs text-slate-400 mb-2">{{ optional($headline->published_at)->format('d F Y') ?? '-' }} &middot; Berita Warga</div>
      <h2 class="text-xl font-extrabold text-slate-800 mb-2 leading-snug">{{ $headline->title }}</h2>
      <p class="text-sm text-slate-500 mb-3 leading-relaxed">{{ $headline->excerpt ?: \Illuminate\Support\Str::limit(strip_tags($headline->content), 180) }}</p>
    @endif

    <div class="flex items-center gap-2.5 mt-10 mb-5 reveal">
      <div class="w-1 h-5 rounded-full bg-blue-600"></div>
      <h3 class="font-bold text-slate-800">Berita Terbaru</h3>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
      @php($items = $berita->getCollection()->values())
      @foreach ($items->slice($headline ? 1 : 0) as $item)
          <div class="group border border-slate-100 rounded-2xl overflow-hidden hover:shadow-lg hover:-translate-y-0.5 transition-all duration-200 bg-white reveal-scale">
          <img src="{{ $item->image_url ?: 'https://images.unsplash.com/photo-1595079676601-f1adf5be5dee?w=600&q=80' }}" class="w-full h-40 object-cover group-hover:scale-105 transition-transform duration-500" alt="{{ $item->title }}">
          <div class="p-4">
            <div class="text-[10px] text-slate-400 mb-2 font-medium">{{ optional($item->published_at)->format('d M Y') ?? '-' }}</div>
            <h4 class="text-sm font-bold text-slate-800 mb-1.5 leading-snug">{{ $item->title }}</h4>
            <p class="text-xs text-slate-500 leading-relaxed">{{ $item->excerpt ?: \Illuminate\Support\Str::limit(strip_tags($item->content), 100) }}</p>
          </div>
        </div>
      @endforeach

      @if ($berita->isEmpty())
        <div class="sm:col-span-2 border border-dashed border-slate-200 rounded-2xl p-12 text-center">
          <div class="text-3xl mb-3">&#128240;</div>
          <div class="text-sm font-semibold text-slate-600 mb-1">Belum ada berita</div>
          <p class="text-xs text-slate-400">Tambahkan dari halaman admin.</p>
        </div>
      @endif
    </div>

    <div class="mt-8">{{ $berita->links() }}</div>
  </div>

  <div class="space-y-6 reveal-right">
    <div class="bg-blue-50 border border-blue-100 rounded-2xl p-5">
      <div class="text-xs font-bold text-blue-700 mb-2">&#128276; Tetap Terhubung</div>
      <p class="text-xs text-slate-500 leading-relaxed">Ikuti perkembangan RW 10 Cluster Palem melalui portal berita ini.</p>
    </div>
  </div>
</section>
@endsection
