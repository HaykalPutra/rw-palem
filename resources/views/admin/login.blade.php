<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Admin – Palem RW</title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>body{font-family:'Plus Jakarta Sans',sans-serif;}</style>
</head>
<body class="min-h-screen bg-gradient-to-br from-slate-900 via-blue-950 to-slate-900 flex items-center justify-center px-4">

  <div class="w-full max-w-sm">
    <div class="text-center mb-8">
      <div class="inline-flex w-14 h-14 rounded-2xl bg-gradient-to-br from-blue-600 to-indigo-700 items-center justify-center shadow-xl shadow-blue-900/50 mb-4">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-7 h-7 text-white">
          <path d="M11.584 2.376a.75.75 0 0 1 .832 0l9 6a.75.75 0 1 1-.832 1.248L12 3.901 3.416 9.624a.75.75 0 0 1-.832-1.248l9-6Z"/>
          <path fill-rule="evenodd" d="M20.25 10.332v9.918H21a.75.75 0 0 1 0 1.5H3a.75.75 0 0 1 0-1.5h.75v-9.918a.75.75 0 0 1 .634-.74A49.109 49.109 0 0 1 12 9c2.59 0 5.134.202 7.616.592a.75.75 0 0 1 .634.74Zm-7.5 2.418a.75.75 0 0 0-1.5 0v6.75a.75.75 0 0 0 1.5 0v-6.75Zm3-.75a.75.75 0 0 1 .75.75v6.75a.75.75 0 0 1-1.5 0v-6.75a.75.75 0 0 1 .75-.75ZM9 12.75a.75.75 0 0 0-1.5 0v6.75a.75.75 0 0 0 1.5 0v-6.75Z" clip-rule="evenodd"/>
        </svg>
      </div>
      <h1 class="text-xl font-extrabold text-white">Panel Admin</h1>
      <p class="text-sm text-slate-400 mt-1">Palem RW 10 Cluster</p>
    </div>

    <div class="bg-white rounded-2xl shadow-2xl p-8">
      @if ($errors->any())
        <div class="mb-5 bg-red-50 border border-red-200 text-red-700 text-sm rounded-xl px-4 py-3">
          {{ $errors->first() }}
        </div>
      @endif

      <form method="POST" action="{{ route('admin.login.post') }}">
        @csrf
        <div class="mb-4">
          <label class="block text-sm font-semibold text-slate-700 mb-1.5">Email</label>
          <input type="email" name="email" value="{{ old('email') }}" required autofocus
                 class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                 placeholder="admin@email.com">
        </div>
        <div class="mb-6">
          <label class="block text-sm font-semibold text-slate-700 mb-1.5">Password</label>
          <input type="password" name="password" required
                 class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                 placeholder="••••••••">
        </div>
        <div class="flex items-center justify-between mb-6">
          <label class="flex items-center gap-2 text-sm text-slate-600 cursor-pointer">
            <input type="checkbox" name="remember" class="rounded">
            Ingat saya
          </label>
        </div>
        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 transition-colors text-white font-bold py-3 rounded-xl text-sm">
          Masuk ke Panel Admin
        </button>
      </form>
    </div>

    <p class="text-center text-xs text-slate-600 mt-6">
      <a href="{{ route('home') }}" class="hover:text-white transition">← Kembali ke Website</a>
    </p>
  </div>

</body>
</html>
