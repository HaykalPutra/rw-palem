<header class="sticky top-0 z-50 bg-white/95 backdrop-blur-md border-b border-slate-100 shadow-sm">
  <div class="max-w-6xl mx-auto px-6 h-16 flex items-center justify-between gap-4">

    <a href="{{ route('home') }}" class="flex items-center gap-2.5 shrink-0 group">
      <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-blue-600 to-indigo-700 flex items-center justify-center shadow-md shadow-blue-200 group-hover:scale-105 transition-transform duration-200">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-white">
          <path d="M11.584 2.376a.75.75 0 0 1 .832 0l9 6a.75.75 0 1 1-.832 1.248L12 3.901 3.416 9.624a.75.75 0 0 1-.832-1.248l9-6Z"/>
          <path fill-rule="evenodd" d="M20.25 10.332v9.918H21a.75.75 0 0 1 0 1.5H3a.75.75 0 0 1 0-1.5h.75v-9.918a.75.75 0 0 1 .634-.74A49.109 49.109 0 0 1 12 9c2.59 0 5.134.202 7.616.592a.75.75 0 0 1 .634.74Zm-7.5 2.418a.75.75 0 0 0-1.5 0v6.75a.75.75 0 0 0 1.5 0v-6.75Zm3-.75a.75.75 0 0 1 .75.75v6.75a.75.75 0 0 1-1.5 0v-6.75a.75.75 0 0 1 .75-.75ZM9 12.75a.75.75 0 0 0-1.5 0v6.75a.75.75 0 0 0 1.5 0v-6.75Z" clip-rule="evenodd"/>
        </svg>
      </div>
      <div class="leading-none">
        <div class="text-sm font-extrabold text-slate-800 tracking-wide">{{ setting('site.name', 'PALEM') }}</div>
        <div class="text-[10px] font-medium text-slate-400 tracking-widest uppercase">{{ setting('site.tagline', 'Adipura Cluster RW 09') }}</div>
      </div>
    </a>

    <nav class="hidden md:flex items-center gap-0.5 text-sm font-medium">
      <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'text-blue-600 bg-blue-50 font-semibold' : 'text-slate-500 hover:text-slate-800 hover:bg-slate-50' }} px-3.5 py-2 rounded-lg transition-all duration-150">Home</a>
      <a href="{{ route('profil') }}" class="{{ request()->routeIs('profil') ? 'text-blue-600 bg-blue-50 font-semibold' : 'text-slate-500 hover:text-slate-800 hover:bg-slate-50' }} px-3.5 py-2 rounded-lg transition-all duration-150">Profil</a>
      <a href="{{ route('layanan') }}" class="{{ request()->routeIs('layanan') ? 'text-blue-600 bg-blue-50 font-semibold' : 'text-slate-500 hover:text-slate-800 hover:bg-slate-50' }} px-3.5 py-2 rounded-lg transition-all duration-150">Layanan</a>
      <a href="{{ route('informasi') }}" class="{{ request()->routeIs('informasi') ? 'text-blue-600 bg-blue-50 font-semibold' : 'text-slate-500 hover:text-slate-800 hover:bg-slate-50' }} px-3.5 py-2 rounded-lg transition-all duration-150">Informasi</a>
      <a href="{{ route('berita') }}" class="{{ request()->routeIs('berita') ? 'text-blue-600 bg-blue-50 font-semibold' : 'text-slate-500 hover:text-slate-800 hover:bg-slate-50' }} px-3.5 py-2 rounded-lg transition-all duration-150">Berita</a>
    </nav>

    <a href="https://wa.me/{{ setting('contact.wa', '02287506667') }}" target="_blank" rel="noopener noreferrer" class="flex items-center gap-2 bg-green-500 hover:bg-green-600 transition-colors text-white text-sm font-semibold px-4 py-2 rounded-full shadow-sm shadow-green-100 hover:shadow-md">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 shrink-0">
        <path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91c0 1.75.46 3.46 1.32 4.96L2 22l5.29-1.39a9.9 9.9 0 0 0 4.75 1.21h.01c5.46 0 9.9-4.45 9.9-9.91C21.96 6.45 17.5 2 12.04 2Zm5.8 14.15c-.24.68-1.4 1.32-1.93 1.4-.5.08-1.13.11-1.82-.12-.42-.13-.96-.31-1.65-.61-2.91-1.26-4.8-4.2-4.95-4.4-.15-.19-1.18-1.57-1.18-3 0-1.42.75-2.12 1.02-2.41.27-.29.58-.36.78-.36h.56c.18 0 .42-.07.65.5.24.58.81 2 .88 2.15.07.15.12.32.02.51-.09.19-.14.31-.28.48-.14.17-.29.37-.42.5-.14.14-.28.29-.12.57.16.28.71 1.17 1.53 1.9 1.05.94 1.94 1.23 2.22 1.37.28.14.44.12.6-.07.16-.19.68-.79.87-1.06.18-.27.36-.22.6-.13.24.09 1.53.72 1.79.85.26.13.43.19.5.3.06.11.06.65-.18 1.33Z"/>
      </svg>
      <span class="hidden sm:inline">WhatsApp</span>
    </a>
  </div>
</header>
