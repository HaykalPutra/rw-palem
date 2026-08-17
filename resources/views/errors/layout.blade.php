<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('code') – @yield('heading')</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
@vite(['resources/css/app.css'])
</head>
<body class="min-h-screen bg-gradient-to-br from-slate-50 via-white to-blue-50 flex items-center justify-center px-6 py-16 text-slate-800">

  <div class="max-w-md w-full text-center">
    <div class="text-6xl mb-5">@yield('emoji', '⚠️')</div>
    <div class="inline-flex items-center gap-2 bg-blue-100 text-blue-700 text-xs font-bold px-3 py-1.5 rounded-full mb-4">
      Error @yield('code')
    </div>
    <h1 class="text-2xl font-extrabold text-slate-800 mb-3">@yield('heading')</h1>
    <p class="text-sm text-slate-500 leading-relaxed mb-8">@yield('message')</p>

    <div class="flex items-center justify-center gap-3 flex-wrap">
      <a href="{{ url('/') }}"
         class="bg-blue-600 hover:bg-blue-700 transition-colors text-white text-sm font-semibold px-5 py-2.5 rounded-xl shadow-md">
        Kembali ke Beranda
      </a>
      <a href="{{ url('/berita') }}"
         class="bg-white border border-slate-200 hover:border-blue-300 transition-colors text-slate-700 text-sm font-semibold px-5 py-2.5 rounded-xl">
        Lihat Berita
      </a>
    </div>
  </div>

</body>
</html>
