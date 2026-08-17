<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>@yield('title', 'Admin Palem')</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 text-slate-800">

<div class="flex h-screen overflow-hidden">

  {{-- Sidebar --}}
  <aside class="w-56 bg-slate-900 text-slate-300 flex flex-col shrink-0">
    <div class="px-5 py-5 border-b border-slate-800">
      <div class="text-xs text-slate-500 uppercase tracking-widest mb-1">Panel Admin</div>
      <div class="font-extrabold text-white text-base">Palem RW 10</div>
    </div>
    <nav class="flex-1 px-3 py-4 space-y-0.5 text-sm overflow-y-auto">
      @php
        $pg = request('page', 'home');
        $nav = [
          ['label'=>'📰 Berita',           'url'=>route('admin.posts.index',['type'=>'berita']),     'active'=>request()->routeIs('admin.posts.*') && request('type','berita')==='berita'],
          ['label'=>'📢 Informasi',         'url'=>route('admin.posts.index',['type'=>'informasi']),  'active'=>request()->routeIs('admin.posts.*') && request('type')==='informasi'],
          ['label'=>'──────────',           'url'=>'#', 'active'=>false, 'divider'=>true],
          ['label'=>'🏠 Halaman Home',      'url'=>route('admin.settings.index').'?page=home',    'active'=>request()->routeIs('admin.settings.*') && $pg==='home'],
          ['label'=>'👤 Halaman Profil',    'url'=>route('admin.settings.index').'?page=profil',  'active'=>request()->routeIs('admin.settings.*') && $pg==='profil'],
          ['label'=>'🔧 Halaman Layanan',   'url'=>route('admin.settings.index').'?page=layanan', 'active'=>request()->routeIs('admin.settings.*') && $pg==='layanan'],
          ['label'=>'📰 Berita &amp; Info', 'url'=>route('admin.settings.index').'?page=berita',  'active'=>request()->routeIs('admin.settings.*') && $pg==='berita'],
          ['label'=>'⚙️ Umum &amp; Kontak', 'url'=>route('admin.settings.index').'?page=umum',   'active'=>request()->routeIs('admin.settings.*') && $pg==='umum'],
        ];
      @endphp
      @foreach ($nav as $item)
        @if(!empty($item['divider']))
          <div class="px-3 pt-4 pb-1 text-[10px] font-bold text-slate-600 tracking-widest">KELOLA HALAMAN</div>
        @else
          <a href="{{ $item['url'] }}" class="flex items-center gap-2 px-3 py-2 rounded-lg transition text-sm {{ $item['active'] ? 'bg-blue-600 text-white font-semibold' : 'hover:bg-slate-800 hover:text-white' }}">
            {!! $item['label'] !!}
          </a>
        @endif
      @endforeach
    </nav>
    <div class="px-3 py-4 border-t border-slate-800 space-y-1">
      <a href="{{ route('admin.account.edit') }}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm transition {{ request()->routeIs('admin.account.*') ? 'bg-blue-600 text-white font-semibold' : 'hover:bg-slate-800 hover:text-white' }}">
        &#128273; Akun &amp; Password
      </a>
      <a href="{{ route('home') }}" target="_blank" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm hover:bg-slate-800 hover:text-white transition">
        &#128279; Lihat Website
      </a>
      <form method="POST" action="{{ route('admin.logout') }}">
        @csrf
        <button type="submit" class="w-full text-left flex items-center gap-2 px-3 py-2 rounded-lg text-sm text-red-400 hover:bg-red-900/30 hover:text-red-300 transition">
          &#128682; Keluar
        </button>
      </form>
    </div>
  </aside>

  {{-- Main content --}}
  <div class="flex-1 overflow-y-auto">
    <header class="bg-white border-b border-slate-200 px-8 h-14 flex items-center justify-between sticky top-0 z-30">
      <div class="text-sm font-semibold text-slate-700">@yield('title', 'Admin Palem')</div>
      <div class="text-xs text-slate-400">{{ Auth::user()?->name }}</div>
    </header>

    <main class="px-8 py-7 max-w-5xl">
      @yield('content')
    </main>
  </div>

</div>

{{-- ── Toast Notifications ── --}}
<div class="fixed top-4 right-4 z-[80] space-y-2 w-80 pointer-events-none" id="toast-area">
  @foreach(['success'=>['emerald','✓','Berhasil!'],'error'=>['red','✕','Terjadi Kesalahan']] as $type=>[$col,$ico,$head])
  @php $msg = $type === 'error' ? (session('error') ?: ($errors->any() ? $errors->first() : null)) : session($type); @endphp
  @if($msg)
  <div x-data="{v:true}" x-show="v" x-cloak
       x-init="setTimeout(()=>v=false, 5000)"
       x-transition:enter="transition duration-300 ease-out"
       x-transition:enter-start="opacity-0 translate-x-8 scale-95"
       x-transition:enter-end="opacity-100 translate-x-0 scale-100"
       x-transition:leave="transition duration-200 ease-in"
       x-transition:leave-start="opacity-100 translate-x-0 scale-100"
       x-transition:leave-end="opacity-0 translate-x-8 scale-95"
       class="pointer-events-auto bg-white border border-{{ $col }}-200 rounded-2xl shadow-2xl overflow-hidden">
    <div class="flex items-start gap-3 px-4 py-3.5">
      <div class="w-8 h-8 rounded-full bg-{{ $col }}-100 text-{{ $col }}-600 flex items-center justify-center font-bold text-sm shrink-0">{{ $ico }}</div>
      <div class="flex-1 min-w-0">
        <div class="font-bold text-slate-800 text-sm">{{ $head }}</div>
        <div class="text-xs text-slate-500 mt-0.5 leading-snug">{{ $msg }}</div>
      </div>
      <button @click="v=false" class="text-slate-300 hover:text-slate-600 text-xl leading-none shrink-0 ml-1">&times;</button>
    </div>
    <div x-data="{w:100}" x-init="requestAnimationFrame(()=>w=0)"
         :style="'width:'+w+'%'"
         class="h-1 bg-{{ $col }}-400 transition-all ease-linear"
         style="transition-duration:5000ms"></div>
  </div>
  @endif
  @endforeach
</div>

{{-- ── Global Confirm Modal ── --}}
<div x-data="{
  open:false, title:'', msg:'', label:'Ya, Lanjutkan', danger:true, _form:null,
  init() {
    window.addEventListener('palem-confirm', e => {
      const d = e.detail;
      this.title  = d.title   || 'Konfirmasi';
      this.msg    = d.message || 'Yakin ingin melanjutkan?';
      this.label  = d.label   || 'Ya, Lanjutkan';
      this.danger = d.danger !== false;
      this._form  = d.form    || null;
      this.open   = true;
    });
  },
  proceed() { this.open=false; if(this._form) this._form.submit(); },
  cancel()  { this.open=false; this._form=null; }
}" x-cloak>
  <div x-show="open"
       x-transition:enter="transition duration-200"
       x-transition:enter-start="opacity-0"
       x-transition:enter-end="opacity-100"
       x-transition:leave="transition duration-150"
       x-transition:leave-start="opacity-100"
       x-transition:leave-end="opacity-0"
       class="fixed inset-0 bg-black/50 backdrop-blur-sm z-[90] flex items-center justify-center p-4">
    <div x-show="open"
         x-transition:enter="transition duration-200"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition duration-150"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-95"
         @click.outside="cancel()"
         class="bg-white rounded-2xl shadow-2xl max-w-sm w-full p-6">
      <div class="flex items-center gap-3 mb-3">
        <div :class="danger ? 'bg-red-100 text-red-600' : 'bg-blue-100 text-blue-600'" class="w-10 h-10 rounded-full flex items-center justify-center text-lg shrink-0">⚠️</div>
        <h3 class="font-extrabold text-slate-800 text-lg" x-text="title"></h3>
      </div>
      <p class="text-slate-500 text-sm mb-6 leading-relaxed" x-text="msg"></p>
      <div class="flex gap-3 justify-end">
        <button @click="cancel()" class="px-5 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold text-sm transition">Batal</button>
        <button @click="proceed()" :class="danger ? 'bg-red-600 hover:bg-red-700 shadow-red-200' : 'bg-blue-600 hover:bg-blue-700 shadow-blue-200'" class="px-5 py-2.5 rounded-xl text-white font-semibold text-sm transition shadow-md" x-text="label"></button>
      </div>
    </div>
  </div>
</div>

<script>
/* Alpine component for image upload (used in carousel, org, settings forms) */
function imgUpload(initial) {
  return {
    url: initial || '',
    loading: false,
    err: '',
    async pick(e) {
      const file = e.target.files[0];
      if (!file) return;
      this.loading = true; this.err = '';
      const fd = new FormData();
      fd.append('file', file);
      fd.append('_token', document.querySelector('meta[name=csrf-token]').content);
      try {
        const res  = await fetch('{{ route("admin.upload") }}', { method: 'POST', body: fd });
        const data = await res.json();
        if (data.url) this.url = data.url;
        else this.err = data.message || 'Upload gagal.';
      } catch { this.err = 'Upload gagal, coba lagi.'; }
      this.loading = false;
      e.target.value = '';          // reset file input
    },
  };
}
</script>
