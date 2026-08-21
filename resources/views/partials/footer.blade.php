<footer class="bg-slate-900 text-slate-300 mt-24">
  <div class="h-1 bg-gradient-to-r from-blue-600 via-indigo-500 to-blue-600"></div>
  <div class="max-w-6xl mx-auto px-6 pt-14 pb-10 grid grid-cols-1 md:grid-cols-4 gap-10 text-sm">

    <div>
      <div class="flex items-center gap-2.5 mb-4">
        <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-blue-600 to-indigo-700 flex items-center justify-center shrink-0">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 text-white">
            <path d="M11.584 2.376a.75.75 0 0 1 .832 0l9 6a.75.75 0 1 1-.832 1.248L12 3.901 3.416 9.624a.75.75 0 0 1-.832-1.248l9-6Z"/>
            <path fill-rule="evenodd" d="M20.25 10.332v9.918H21a.75.75 0 0 1 0 1.5H3a.75.75 0 0 1 0-1.5h.75v-9.918a.75.75 0 0 1 .634-.74A49.109 49.109 0 0 1 12 9c2.59 0 5.134.202 7.616.592a.75.75 0 0 1 .634.74Zm-7.5 2.418a.75.75 0 0 0-1.5 0v6.75a.75.75 0 0 0 1.5 0v-6.75Zm3-.75a.75.75 0 0 1 .75.75v6.75a.75.75 0 0 1-1.5 0v-6.75a.75.75 0 0 1 .75-.75ZM9 12.75a.75.75 0 0 0-1.5 0v6.75a.75.75 0 0 0 1.5 0v-6.75Z" clip-rule="evenodd"/>
          </svg>
        </div>
        <span class="text-base font-extrabold text-white tracking-wide">{{ setting('site.name', 'PALEM') }}</span>
      </div>
      <p class="text-slate-400 text-xs leading-relaxed mb-3">{!! nl2br(e(setting('contact.address', 'Jl. Palem X, Kel. Rancabolang, Kec. Gedebage, Kota Bandung'))) !!}</p>
      <a href="mailto:{{ setting('contact.email', 'info@clusterpalem.com') }}" class="text-xs text-blue-400 hover:text-blue-300 transition">{{ setting('contact.email', 'info@clusterpalem.com') }}</a>
    </div>

    <div>
      <div class="font-semibold text-white mb-4">Navigasi</div>
      <ul class="space-y-2.5 text-slate-400 text-xs">
        <li><a href="{{ route('home') }}" class="hover:text-white transition flex items-center gap-1.5"><span class="text-blue-500 font-bold">›</span> Home</a></li>
        <li><a href="{{ route('profil') }}" class="hover:text-white transition flex items-center gap-1.5"><span class="text-blue-500 font-bold">›</span> Profil RW</a></li>
        <li><a href="{{ route('layanan') }}" class="hover:text-white transition flex items-center gap-1.5"><span class="text-blue-500 font-bold">›</span> Pusat Pelayanan</a></li>
        <li><a href="{{ route('informasi') }}" class="hover:text-white transition flex items-center gap-1.5"><span class="text-blue-500 font-bold">›</span> Informasi</a></li>
        <li><a href="{{ route('berita') }}" class="hover:text-white transition flex items-center gap-1.5"><span class="text-blue-500 font-bold">›</span> Berita</a></li>
      </ul>
    </div>

    <div>
      <div class="font-semibold text-white mb-4">Jam Pelayanan</div>
      <div class="text-slate-400 text-xs space-y-2">
        <p>{{ setting('contact.hours', 'Senin – Sabtu: 08.00 – 18.00') }}</p>
      </div>
      <div class="mt-4 pt-4 border-t border-slate-800">
        <div class="text-slate-400 text-xs mb-1">Telepon</div>
        <div class="text-white text-sm font-semibold">{{ setting('contact.phone', '+62 812-2157-353') }}</div>
      </div>
      <a href="https://wa.me/{{ setting('contact.wa', '+62 812-2157-353') }}" target="_blank" rel="noopener noreferrer" class="mt-4 inline-flex items-center gap-2 bg-green-600 hover:bg-green-500 transition text-white text-xs font-semibold px-3 py-2 rounded-lg">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-3.5 h-3.5">
          <path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91c0 1.75.46 3.46 1.32 4.96L2 22l5.29-1.39a9.9 9.9 0 0 0 4.75 1.21h.01c5.46 0 9.9-4.45 9.9-9.91C21.96 6.45 17.5 2 12.04 2Zm5.8 14.15c-.24.68-1.4 1.32-1.93 1.4-.5.08-1.13.11-1.82-.12-.42-.13-.96-.31-1.65-.61-2.91-1.26-4.8-4.2-4.95-4.4-.15-.19-1.18-1.57-1.18-3 0-1.42.75-2.12 1.02-2.41.27-.29.58-.36.78-.36h.56c.18 0 .42-.07.65.5.24.58.81 2 .88 2.15.07.15.12.32.02.51-.09.19-.14.31-.28.48-.14.17-.29.37-.42.5-.14.14-.28.29-.12.57.16.28.71 1.17 1.53 1.9 1.05.94 1.94 1.23 2.22 1.37.28.14.44.12.6-.07.16-.19.68-.79.87-1.06.18-.27.36-.22.6-.13.24.09 1.53.72 1.79.85.26.13.43.19.5.3.06.11.06.65-.18 1.33Z"/>
        </svg>
        Chat WhatsApp
      </a>
    </div>

    <div>
      <div class="font-semibold text-white mb-4">Berita Terbaru</div>
      <div class="bg-slate-800 rounded-xl p-4">
        <div class="text-xs text-slate-300 leading-relaxed">{{ setting('footer.news', 'Pengurus RW 10 Berikan Kembali Kartu Iuran Warga...') }}</div>
        <div class="text-[10px] text-slate-500 mt-2">{{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</div>
      </div>
      <div class="mt-3">
        <a href="{{ route('berita') }}" class="text-xs text-blue-400 hover:text-blue-300 transition">Lihat semua berita →</a>
      </div>
    </div>

  </div>
  <div class="border-t border-slate-800">
    <div class="max-w-6xl mx-auto px-6 py-5 flex flex-col sm:flex-row items-center justify-between gap-3">
      <div class="text-xs text-slate-500">&copy; {{ date('Y') }} {{ setting('site.copyright', 'RW 09 Cluster Adipura Palem · Bumi Adipura, Bandung') }}</div>
      <div></div>
    </div>
  </div>
</footer>
