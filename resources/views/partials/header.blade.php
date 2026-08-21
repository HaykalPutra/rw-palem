<header class="sticky top-0 z-50 bg-white/95 backdrop-blur-md border-b border-slate-100 shadow-sm" x-data="{ open: false }" @keydown.escape.window="open = false">
  <div class="max-w-6xl mx-auto px-6 h-16 grid grid-cols-[auto_1fr_auto] items-center gap-4">

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

    {{-- Desktop nav: kolom tengah grid, jadi selalu di tengah beneran, gak peduli lebar logo/kanan --}}
    <nav class="hidden md:flex items-center justify-center gap-0.5 text-sm font-medium">
      <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'text-blue-600 bg-blue-50 font-semibold' : 'text-slate-500 hover:text-slate-800 hover:bg-slate-50' }} px-3.5 py-2 rounded-lg transition-all duration-150">Home</a>
      <a href="{{ route('profil') }}" class="{{ request()->routeIs('profil') ? 'text-blue-600 bg-blue-50 font-semibold' : 'text-slate-500 hover:text-slate-800 hover:bg-slate-50' }} px-3.5 py-2 rounded-lg transition-all duration-150">Profil</a>
      <a href="{{ route('layanan') }}" class="{{ request()->routeIs('layanan') ? 'text-blue-600 bg-blue-50 font-semibold' : 'text-slate-500 hover:text-slate-800 hover:bg-slate-50' }} px-3.5 py-2 rounded-lg transition-all duration-150">Layanan</a>
      <a href="{{ route('informasi') }}" class="{{ request()->routeIs('informasi') ? 'text-blue-600 bg-blue-50 font-semibold' : 'text-slate-500 hover:text-slate-800 hover:bg-slate-50' }} px-3.5 py-2 rounded-lg transition-all duration-150">Informasi</a>
      <a href="{{ route('berita') }}" class="{{ request()->routeIs('berita') ? 'text-blue-600 bg-blue-50 font-semibold' : 'text-slate-500 hover:text-slate-800 hover:bg-slate-50' }} px-3.5 py-2 rounded-lg transition-all duration-150">Berita</a>
    </nav>

    {{-- Kolom kanan: Login (desktop) + hamburger (mobile) --}}
    <div class="flex items-center justify-end gap-2">
      <a href="{{ route('admin.login') }}" class="hidden md:inline-flex text-slate-400 hover:text-slate-700 px-3.5 py-2 rounded-lg transition-all duration-150 border border-slate-200 hover:border-slate-300 text-sm font-medium">Login</a>

      <button type="button" @click="open = !open" class="md:hidden shrink-0 w-10 h-10 flex items-center justify-center rounded-lg text-slate-600 hover:bg-slate-50 transition" :aria-expanded="open" aria-label="Buka menu">
        <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5M3.75 17.25h16.5" />
        </svg>
        <svg x-show="open" x-cloak xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
        </svg>
      </button>
    </div>
  </div>

  {{-- Mobile nav panel --}}
  <div x-show="open" x-cloak
       x-transition:enter="transition ease-out duration-150"
       x-transition:enter-start="opacity-0 -translate-y-2"
       x-transition:enter-end="opacity-100 translate-y-0"
       x-transition:leave="transition ease-in duration-100"
       x-transition:leave-start="opacity-100 translate-y-0"
       x-transition:leave-end="opacity-0 -translate-y-2"
       @click.outside="open = false"
       class="md:hidden border-t border-slate-100 bg-white shadow-lg">
    <nav class="max-w-6xl mx-auto px-6 py-3 flex flex-col text-sm font-medium">
      <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'text-blue-600 bg-blue-50 font-semibold' : 'text-slate-600' }} px-3 py-3 rounded-lg">Home</a>
      <a href="{{ route('profil') }}" class="{{ request()->routeIs('profil') ? 'text-blue-600 bg-blue-50 font-semibold' : 'text-slate-600' }} px-3 py-3 rounded-lg">Profil</a>
      <a href="{{ route('layanan') }}" class="{{ request()->routeIs('layanan') ? 'text-blue-600 bg-blue-50 font-semibold' : 'text-slate-600' }} px-3 py-3 rounded-lg">Layanan</a>
      <a href="{{ route('informasi') }}" class="{{ request()->routeIs('informasi') ? 'text-blue-600 bg-blue-50 font-semibold' : 'text-slate-600' }} px-3 py-3 rounded-lg">Informasi</a>
      <a href="{{ route('berita') }}" class="{{ request()->routeIs('berita') ? 'text-blue-600 bg-blue-50 font-semibold' : 'text-slate-600' }} px-3 py-3 rounded-lg">Berita</a>
      <a href="{{ route('admin.login') }}" class="text-slate-400 px-3 py-3 rounded-lg border-t border-slate-100 mt-1">Login</a>
    </nav>
  </div>
</header>