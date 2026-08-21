<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title', 'RW 09 Cluster Palem')</title>
<link rel="manifest" href="{{ asset('manifest.json') }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400&display=swap" rel="stylesheet">
@vite(['resources/css/app.css', 'resources/js/app.js'])

<!-- Tag Meta PWA -->
<meta name="theme-color" content="#2563eb">
<link rel="apple-touch-icon" href="{{ asset('pwa-192x192.png') }}">
</head>
<body class="bg-white text-slate-800 antialiased page-enter">

<div id="page-bar"></div>

@include('partials.header')

@yield('content')

@include('partials.footer')

@include('partials.whatsapp-bubble')

<script>
(function(){
  /* ── Progress bar ── */
  var bar = document.getElementById('page-bar');
  requestAnimationFrame(function(){ bar.style.width = '78%'; });
  window.addEventListener('load', function(){
    bar.style.width = '100%';
    setTimeout(function(){ bar.style.opacity = '0'; }, 350);
  });

  /* ── Scroll-triggered reveal ── */
  var io = new IntersectionObserver(function(entries){
    entries.forEach(function(e){
      if (e.isIntersecting){ e.target.classList.add('in'); io.unobserve(e.target); }
    });
  }, { threshold: 0.1 });
  document.querySelectorAll('.reveal,.reveal-left,.reveal-right,.reveal-scale,.reveal-fade')
    .forEach(function(el){ io.observe(el); });

  /* ── Animated number counter ── */
  document.querySelectorAll('[data-count]').forEach(function(el){
    var target   = parseInt(el.dataset.count, 10);
    var suffix   = el.dataset.suffix || '';
    var duration = 1400;
    var io2 = new IntersectionObserver(function(entries){
      if (!entries[0].isIntersecting) return;
      io2.unobserve(el);
      var start = null;
      requestAnimationFrame(function tick(ts){
        if (!start) start = ts;
        var p    = Math.min((ts - start) / duration, 1);
        var ease = 1 - Math.pow(1 - p, 3);
        el.textContent = Math.floor(ease * target) + suffix;
        if (p < 1) requestAnimationFrame(tick);
        else el.textContent = target + suffix;
      });
    }, { threshold: 0.5 });
    io2.observe(el);
  });

  /* ── Smooth page-exit for same-origin navigation ── */
  document.querySelectorAll('a[href]').forEach(function(a){
    try {
      var url = new URL(a.href, location.href);
      if (url.hostname !== location.hostname || a.target === '_blank') return;
      a.addEventListener('click', function(e){
        if (e.ctrlKey || e.metaKey || e.shiftKey || e.altKey) return;
        e.preventDefault();
        document.body.style.animation = 'none';
        document.body.style.transition = 'opacity .22s ease';
        requestAnimationFrame(function(){ document.body.style.opacity = '0'; });
        setTimeout(function(){ location.href = url.href; }, 240);
      });
    } catch(err){}
  });
})();
</script>

<!-- ========================================== -->
<!-- ALERT PWA INSTALL (MINI POPUP POSYANDU STYLE) -->
<!-- ========================================== -->
<div id="pwa-install-alert" style="display: none; transform: translateY(150%); transition: transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);" class="fixed bottom-6 left-6 sm:bottom-8 sm:left-8 z-[99] w-[320px] bg-white rounded-2xl shadow-[0_10px_40px_-10px_rgba(0,0,0,0.2)] border border-slate-100 p-4">
    <div class="flex items-start gap-3">
        <img src="{{ asset('pwa-192x192.png') }}" alt="Logo PWA" class="w-11 h-11 rounded-xl shadow-sm border border-slate-100 mt-0.5 object-cover">
        <div class="flex-1">
            <h4 class="text-slate-800 font-extrabold text-sm mb-0.5">App RW Palem</h4>
            <p class="text-slate-500 text-xs mb-3 leading-relaxed">Install aplikasi untuk akses layanan yang lebih cepat.</p>
            <div class="flex items-center gap-2">
                <button onclick="closePwaAlert()" class="flex-1 bg-slate-100 hover:bg-slate-200 text-slate-600 py-2 rounded-lg text-xs font-bold transition-colors">Batal</button>
                <button onclick="window.triggerPwaInstall()" class="flex-1 bg-blue-600 hover:bg-blue-500 text-white py-2 rounded-lg text-xs font-bold shadow-md shadow-blue-500/30 transition-colors">Install</button>
            </div>
        </div>
    </div>
</div>

<script>
    // 1. Registrasi Service Worker
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('/sw.js');
    }

    // 2. Logika Popup Mini & Menampilkan Kembali Tombol Beranda
    let deferredPrompt = null;
    const pwaAlert = document.getElementById('pwa-install-alert');

    window.addEventListener('beforeinstallprompt', (e) => {
        e.preventDefault();
        deferredPrompt = e;

        // Memunculkan kembali semua tombol install manual di beranda/halaman lain
        document.querySelectorAll('.btn-install-pwa').forEach(btn => {
            btn.style.display = 'inline-flex';
        });

        // Tampilkan popup mini di kiri bawah
        pwaAlert.style.display = 'block';
        setTimeout(() => {
            pwaAlert.style.transform = 'translateY(0)';
        }, 100);
    });

    window.triggerPwaInstall = async () => {
        if (deferredPrompt) {
            deferredPrompt.prompt();
            const { outcome } = await deferredPrompt.userChoice;
            if (outcome === 'accepted') {
                console.log('App RW Palem diinstal');
                closePwaAlert();
                // Sembunyikan tombol di beranda jika sudah diinstall
                document.querySelectorAll('.btn-install-pwa').forEach(btn => btn.style.display = 'none');
            }
            deferredPrompt = null;
        } else {
            alert('Aplikasi sudah terinstal atau browser tidak mendukung.');
        }
    };

    window.closePwaAlert = () => {
        pwaAlert.style.transform = 'translateY(150%)';
        setTimeout(() => {
            pwaAlert.style.display = 'none';
        }, 400);
    };

    window.addEventListener('appinstalled', () => {
        closePwaAlert();
        document.querySelectorAll('.btn-install-pwa').forEach(btn => btn.style.display = 'none');
        deferredPrompt = null;
    });
</script>
<!-- ========================================== -->
</body>
</html>