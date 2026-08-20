@extends('layouts.auth')

@section('title', 'Login Admin – Palem RW')
@section('heading', 'Panel Admin')
@section('subheading', 'Palem RW 09 Cluster')

@section('form')
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
          <a href="{{ route('admin.password.request') }}" class="text-sm text-blue-600 hover:text-blue-800 font-semibold">Lupa password?</a>
        </div>
        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 transition-colors text-white font-bold py-3 rounded-xl text-sm">
          Masuk ke Panel Admin
        </button>
      </form>
@endsection
