<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title', 'RW 10 Cluster Palem')</title>
<script src="https://cdn.tailwindcss.com"></script>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400&display=swap" rel="stylesheet">
<style>
  body { font-family:'Plus Jakarta Sans',sans-serif; animation:pageIn .4s ease both; }

  @keyframes pageIn    { from{opacity:0}                              to{opacity:1} }
  @keyframes slideUp   { from{opacity:0;transform:translateY(32px)}   to{opacity:1;transform:translateY(0)} }
  @keyframes slideLeft { from{opacity:0;transform:translateX(-32px)}  to{opacity:1;transform:translateX(0)} }
  @keyframes slideRight{ from{opacity:0;transform:translateX(32px)}   to{opacity:1;transform:translateX(0)} }
  @keyframes scaleIn   { from{opacity:0;transform:scale(.91)}         to{opacity:1;transform:scale(1)} }

  /* Initial hidden states */
  .reveal       { opacity:0; transform:translateY(32px)  }
  .reveal-left  { opacity:0; transform:translateX(-32px) }
  .reveal-right { opacity:0; transform:translateX(32px)  }
  .reveal-scale { opacity:0; transform:scale(.91)        }
  .reveal-fade  { opacity:0                              }

  /* Triggered — use spring easing for that "alive" feel */
  .reveal.in       { animation:slideUp    .72s cubic-bezier(.22,1,.36,1) both }
  .reveal-left.in  { animation:slideLeft  .72s cubic-bezier(.22,1,.36,1) both }
  .reveal-right.in { animation:slideRight .72s cubic-bezier(.22,1,.36,1) both }
  .reveal-scale.in { animation:scaleIn    .56s cubic-bezier(.22,1,.36,1) both }
  .reveal-fade.in  { animation:pageIn     .6s  ease both }

  /* Stagger delays */
  .d1{animation-delay:.08s!important} .d2{animation-delay:.17s!important}
  .d3{animation-delay:.26s!important} .d4{animation-delay:.35s!important}
  .d5{animation-delay:.44s!important} .d6{animation-delay:.53s!important}

  /* Top progress bar */
  #page-bar {
    position:fixed; top:0; left:0; height:3px; width:0; z-index:9999;
    background:linear-gradient(90deg,#2563eb,#818cf8,#2563eb);
    background-size:200%;
    transition:width .8s ease-out, opacity .5s ease;
    animation:shimmer 1.8s linear infinite;
  }
  @keyframes shimmer { from{background-position:200%} to{background-position:0} }
</style>
</head>
<body class="bg-white text-slate-800 antialiased">

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
