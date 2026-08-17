<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title', 'RW 10 Cluster Palem')</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400&display=swap" rel="stylesheet">
@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white text-slate-800 antialiased page-enter">

<div id="page-bar"></div>

@include('partials.header')

@yield('content')

@include('partials.footer')

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
</body>
</html>
