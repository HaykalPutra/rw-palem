@extends('layouts.app')

@section('title', 'Informasi - Palem')

@section('content')

{{-- PAGE HEADER --}}
<section class="bg-gradient-to-br from-slate-50 to-blue-50/40 border-b border-slate-100">
  <div class="max-w-3xl mx-auto px-6 pt-14 pb-12 text-center reveal">
    <div class="inline-flex items-center gap-2 bg-blue-100 text-blue-600 text-xs font-semibold px-3 py-1.5 rounded-full mb-4">&#128276; Informasi</div>
    <h1 class="text-3xl font-extrabold text-slate-800 mb-3">Pusat Informasi Warga</h1>
    <p class="text-sm text-slate-500 leading-relaxed">Temukan pengumuman penting, jadwal kegiatan, dan informasi terbaru untuk warga Cluster Palem.</p>
  </div>
</section>

<section class="max-w-6xl mx-auto px-6 py-12 pb-20">
  <div class="flex items-center gap-2.5 mb-7 reveal">
    <div class="w-1 h-5 rounded-full bg-blue-600"></div>
    <span class="font-bold text-slate-800">Pengumuman Terbaru</span>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    @forelse ($informasi as $item)
      <div class="group border border-slate-100 rounded-2xl overflow-hidden hover:shadow-lg hover:-translate-y-0.5 transition-all duration-200 bg-white reveal-scale">
        @if ($item->image_url)
          <img src="{{ $item->image_url }}" class="w-full h-44 object-cover group-hover:scale-105 transition-transform duration-500" alt="{{ $item->title }}">
        @endif
        <div class="p-6">
          <div class="flex items-center gap-2 mb-3">
            @if ($item->is_featured)
              <span class="text-[10px] font-bold bg-red-100 text-red-600 px-2.5 py-1 rounded-full tracking-wide">&#x26A0; PENTING</span>
            @else
              <span class="text-[10px] font-bold bg-blue-100 text-blue-600 px-2.5 py-1 rounded-full tracking-wide">INFO</span>
            @endif
            <span class="text-[11px] text-slate-400">{{ optional($item->published_at)->format('d M Y, H:i') ?? '-' }}</span>
          </div>
          <h3 class="font-bold text-slate-800 mb-2 leading-snug">{{ $item->title }}</h3>
          <p class="text-xs text-slate-500 leading-relaxed">{{ $item->excerpt ?: \Illuminate\Support\Str::limit(strip_tags($item->content), 140) }}</p>
        </div>
      </div>
    @empty
      <div class="md:col-span-2 border border-dashed border-slate-200 rounded-2xl p-12 text-center">
        <div class="text-3xl mb-3">&#128276;</div>
        <div class="text-sm font-semibold text-slate-600 mb-1">Belum ada informasi</div>
        <p class="text-xs text-slate-400">Tambahkan pengumuman dari halaman admin.</p>
      </div>
    @endforelse
  </div>

  <div class="mt-10">{{ $informasi->links() }}</div>
</section>
@endsection
