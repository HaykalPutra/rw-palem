@extends('layouts.app')

@section('title', 'Layanan - Palem')

@section('content')

{{-- HERO --}}
<section class="bg-gradient-to-br from-blue-950 via-blue-900 to-indigo-900 text-white">
  <div class="max-w-6xl mx-auto px-6 py-16 grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
    <div class="reveal-left">
      <div class="inline-flex items-center gap-2 bg-white/15 border border-white/20 text-white/90 text-xs font-semibold px-3 py-1.5 rounded-full mb-5">
        &#127959; Pusat Layanan
      </div>
      <h1 class="text-4xl font-extrabold mb-4 leading-tight">{{ setting('layanan.hero_title','Pusat Layanan Warga Palem') }}</h1>
      <p class="text-white/70 text-sm mb-8 leading-relaxed max-w-md">{{ setting('layanan.hero_subtitle','Layanan komunitas yang efisien, transparan, dan mudah diakses.') }}</p>
      <div class="flex gap-3 flex-wrap">
        <a href="#" class="bg-blue-500 hover:bg-blue-400 transition-colors text-white text-sm font-semibold px-5 py-2.5 rounded-xl shadow-lg shadow-blue-900/50">Lihat Status Layanan</a>
        <a href="#" class="bg-white/15 hover:bg-white/25 border border-white/25 transition-colors text-white text-sm font-semibold px-5 py-2.5 rounded-xl">Panduan Pengguna</a>
      </div>
    </div>
    <div class="rounded-2xl overflow-hidden shadow-2xl shadow-blue-900/60 reveal-right">
      <img src="{{ setting('layanan.hero_img','https://images.unsplash.com/photo-1451187580459-43490279c0fa?w=600&q=80') }}" class="w-full h-60 object-cover" alt="Layanan RW">
    </div>
  </div>
</section>

{{-- SERVICE CARDS --}}
<section class="max-w-6xl mx-auto px-6 py-16">
  <div class="flex items-center gap-2.5 mb-8 reveal">
    <div class="w-1 h-5 rounded-full bg-blue-600"></div>
    <h2 class="text-lg font-bold text-slate-800">Kategori Layanan</h2>
  </div>
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-5">

    <div class="group border border-slate-100 rounded-2xl p-6 hover:shadow-lg hover:border-blue-100 hover:-translate-y-0.5 transition-all duration-200 bg-white reveal-scale d1">
      <div class="w-11 h-11 rounded-xl bg-blue-50 group-hover:bg-blue-100 text-blue-600 flex items-center justify-center mb-5 transition-colors">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
          <path fill-rule="evenodd" d="M5.625 1.5c-1.036 0-1.875.84-1.875 1.875v17.25c0 1.035.84 1.875 1.875 1.875h12.75c1.035 0 1.875-.84 1.875-1.875V12.75A3.75 3.75 0 0 0 16.5 9h-1.875a1.875 1.875 0 0 1-1.875-1.875V5.25A3.75 3.75 0 0 0 9 1.5H5.625ZM7.5 15a.75.75 0 0 1 .75-.75h7.5a.75.75 0 0 1 0 1.5h-7.5A.75.75 0 0 1 7.5 15Zm.75-6.75a.75.75 0 0 0 0 1.5H12a.75.75 0 0 0 0-1.5H8.25Z" clip-rule="evenodd" />
          <path d="M12.971 1.816A5.23 5.23 0 0 1 14.25 5.25v1.875c0 .207.168.375.375.375H16.5a5.23 5.23 0 0 1 3.434 1.279 9.768 9.768 0 0 0-6.963-6.963Z" />
        </svg>
      </div>
      <h3 class="font-bold text-slate-800 mb-2">{{ setting('layanan.card_1_title','Persuratan & Administrasi') }}</h3>
      <p class="text-xs text-slate-500 leading-relaxed">{{ setting('layanan.card_1_desc','Pengajuan surat pengantar, keterangan domisili, dan administrasi kependudukan lainnya.') }}</p>
    </div>

    <div class="group border border-slate-100 rounded-2xl p-6 hover:shadow-lg hover:border-emerald-100 hover:-translate-y-0.5 transition-all duration-200 bg-white reveal-scale d2">
      <div class="w-11 h-11 rounded-xl bg-emerald-50 group-hover:bg-emerald-100 text-emerald-600 flex items-center justify-center mb-5 transition-colors">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
          <path d="M4.5 3.75a3 3 0 0 0-3 3v.75h21v-.75a3 3 0 0 0-3-3h-15Z" />
          <path fill-rule="evenodd" d="M22.5 9.75h-21v7.5a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3v-7.5Zm-18 3.75a.75.75 0 0 1 .75-.75h6a.75.75 0 0 1 0 1.5h-6a.75.75 0 0 1-.75-.75Zm.75 2.25a.75.75 0 0 0 0 1.5h3a.75.75 0 0 0 0-1.5h-3Z" clip-rule="evenodd" />
        </svg>
      </div>
      <h3 class="font-bold text-slate-800 mb-2">{{ setting('layanan.card_2_title','Pembayaran Iuran') }}</h3>
      <p class="text-xs text-slate-500 leading-relaxed">{{ setting('layanan.card_2_desc','Portal pembayaran IPL bulanan secara digital, cepat, dan terverifikasi otomatis.') }}</p>
    </div>

    <div class="group border border-slate-100 rounded-2xl p-6 hover:shadow-lg hover:border-orange-100 hover:-translate-y-0.5 transition-all duration-200 bg-white reveal-scale d3">
      <div class="w-11 h-11 rounded-xl bg-orange-50 group-hover:bg-orange-100 text-orange-500 flex items-center justify-center mb-5 transition-colors">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
          <path d="M11.584 2.376a.75.75 0 0 1 .832 0l9 6a.75.75 0 1 1-.832 1.248L12 3.901 3.416 9.624a.75.75 0 0 1-.832-1.248l9-6Z"/>
          <path fill-rule="evenodd" d="M20.25 10.332v9.918H21a.75.75 0 0 1 0 1.5H3a.75.75 0 0 1 0-1.5h.75v-9.918a.75.75 0 0 1 .634-.74A49.109 49.109 0 0 1 12 9c2.59 0 5.134.202 7.616.592a.75.75 0 0 1 .634.74Zm-7.5 2.418a.75.75 0 0 0-1.5 0v6.75a.75.75 0 0 0 1.5 0v-6.75Zm3-.75a.75.75 0 0 1 .75.75v6.75a.75.75 0 0 1-1.5 0v-6.75a.75.75 0 0 1 .75-.75ZM9 12.75a.75.75 0 0 0-1.5 0v6.75a.75.75 0 0 0 1.5 0v-6.75Z" clip-rule="evenodd"/>
        </svg>
      </div>
      <h3 class="font-bold text-slate-800 mb-2">{{ setting('layanan.card_3_title','Fasilitas Umum') }}</h3>
      <p class="text-xs text-slate-500 leading-relaxed">{{ setting('layanan.card_3_desc','Reservasi clubhouse, lapangan olahraga, dan area publik cluster.') }}</p>
    </div>

    <div class="group border border-slate-100 rounded-2xl p-6 hover:shadow-lg hover:border-violet-100 hover:-translate-y-0.5 transition-all duration-200 bg-white reveal-scale d4">
      <div class="w-11 h-11 rounded-xl bg-violet-50 group-hover:bg-violet-100 text-violet-600 flex items-center justify-center mb-5 transition-colors">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
          <path fill-rule="evenodd" d="M4.848 2.771A49.144 49.144 0 0 1 12 2.25c2.43 0 4.817.178 7.152.52 1.978.292 3.348 2.024 3.348 3.97v6.02c0 1.946-1.37 3.678-3.348 3.97a48.901 48.901 0 0 1-3.476.383.39.39 0 0 0-.297.17l-2.755 4.133a.75.75 0 0 1-1.248 0l-2.755-4.133a.39.39 0 0 0-.297-.17 48.9 48.9 0 0 1-3.476-.384c-1.978-.29-3.348-2.024-3.348-3.97V6.741c0-1.946 1.37-3.68 3.348-3.97Z" clip-rule="evenodd" />
        </svg>
      </div>
      <h3 class="font-bold text-slate-800 mb-2">{{ setting('layanan.card_4_title','Pengaduan Warga') }}</h3>
      <p class="text-xs text-slate-500 leading-relaxed">{{ setting('layanan.card_4_desc','Laporan masalah keamanan, kebersihan, atau fasilitas cluster secara cepat.') }}</p>
    </div>

    <div class="group border border-red-100 bg-red-50/30 rounded-2xl p-6 hover:shadow-lg hover:-translate-y-0.5 transition-all duration-200 reveal-scale d5">
      <div class="w-11 h-11 rounded-xl bg-red-100 group-hover:bg-red-200 text-red-600 flex items-center justify-center mb-5 transition-colors">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
          <path fill-rule="evenodd" d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003ZM12 8.25a.75.75 0 0 1 .75.75v3.75a.75.75 0 0 1-1.5 0V9a.75.75 0 0 1 .75-.75Zm0 8.25a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" clip-rule="evenodd" />
        </svg>
      </div>
      <h3 class="font-bold text-slate-800 mb-2">{{ setting('layanan.card_5_title','Keamanan & Darurat') }}</h3>
      <p class="text-xs text-slate-500 leading-relaxed">{{ setting('layanan.card_5_desc','Kontak darurat dan kontrol patroli keamanan terintegrasi.') }}</p>
    </div>

    <div class="group border border-slate-100 rounded-2xl p-6 hover:shadow-lg hover:border-blue-100 hover:-translate-y-0.5 transition-all duration-200 bg-white flex flex-col justify-between reveal-scale d6">
      <div>
        <div class="w-11 h-11 rounded-xl bg-blue-50 group-hover:bg-blue-100 text-blue-600 flex items-center justify-center mb-5 transition-colors">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
            <path d="M10.5 18.75a.75.75 0 0 0 0 1.5h3a.75.75 0 0 0 0-1.5h-3Z" />
            <path fill-rule="evenodd" d="M8.625.75A3.375 3.375 0 0 0 5.25 4.125v15.75a3.375 3.375 0 0 0 3.375 3.375h6.75a3.375 3.375 0 0 0 3.375-3.375V4.125A3.375 3.375 0 0 0 15.375.75h-6.75ZM7.5 4.125C7.5 3.504 8.004 3 8.625 3H9.75v.375c0 .621.504 1.125 1.125 1.125h2.25c.621 0 1.125-.504 1.125-1.125V3h1.125c.621 0 1.125.504 1.125 1.125v15.75c0 .621-.504 1.125-1.125 1.125h-6.75A1.125 1.125 0 0 1 7.5 19.875V4.125Z" clip-rule="evenodd" />
          </svg>
        </div>
        <h3 class="font-bold text-slate-800 mb-2">{{ setting('layanan.card_6_title','Aplikasi Android') }}</h3>
        <p class="text-xs text-slate-500 leading-relaxed mb-4">{{ setting('layanan.card_6_desc','Unduh aplikasi Palem untuk akses layanan langsung dari smartphone.') }}</p>
      </div>
      <a href="#" class="inline-flex items-center gap-1.5 text-xs font-semibold text-blue-600 hover:text-blue-800 transition-colors">
        Download APK <span>&rarr;</span>
      </a>
    </div>

  </div>
</section>

{{-- CTA KONTAK --}}
<section class="max-w-6xl mx-auto px-6 pb-20">
  <div class="bg-gradient-to-r from-blue-600 to-indigo-700 rounded-3xl p-10 flex flex-col md:flex-row items-center justify-between gap-6 text-white reveal">
    <div>
      <h3 class="text-xl font-extrabold mb-2">{{ setting('layanan.cta_title','Butuh Bantuan?') }}</h3>
      <p class="text-white/75 text-sm max-w-md">{{ setting('layanan.cta_subtitle','Hubungi pengurus RW melalui WhatsApp atau datang langsung ke kantor sekretariat.') }}</p>
    </div>
    <a href="https://wa.me/{{ setting('contact.wa','02287506667') }}" target="_blank" rel="noopener noreferrer" class="shrink-0 flex items-center gap-2 bg-white text-blue-700 hover:bg-blue-50 transition-colors font-semibold text-sm px-6 py-3 rounded-xl shadow-md">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-green-600">
        <path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91c0 1.75.46 3.46 1.32 4.96L2 22l5.29-1.39a9.9 9.9 0 0 0 4.75 1.21h.01c5.46 0 9.9-4.45 9.9-9.91C21.96 6.45 17.5 2 12.04 2Zm5.8 14.15c-.24.68-1.4 1.32-1.93 1.4-.5.08-1.13.11-1.82-.12-.42-.13-.96-.31-1.65-.61-2.91-1.26-4.8-4.2-4.95-4.4-.15-.19-1.18-1.57-1.18-3 0-1.42.75-2.12 1.02-2.41.27-.29.58-.36.78-.36h.56c.18 0 .42-.07.65.5.24.58.81 2 .88 2.15.07.15.12.32.02.51-.09.19-.14.31-.28.48-.14.17-.29.37-.42.5-.14.14-.28.29-.12.57.16.28.71 1.17 1.53 1.9 1.05.94 1.94 1.23 2.22 1.37.28.14.44.12.6-.07.16-.19.68-.79.87-1.06.18-.27.36-.22.6-.13.24.09 1.53.72 1.79.85.26.13.43.19.5.3.06.11.06.65-.18 1.33Z"/>
      </svg>
      Hubungi via WhatsApp
    </a>
  </div>
</section>

@endsection

