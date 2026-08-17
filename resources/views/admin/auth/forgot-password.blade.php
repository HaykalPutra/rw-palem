@extends('layouts.auth')

@section('title', 'Lupa Password – Palem RW')
@section('heading', 'Lupa Password')
@section('subheading', 'Masukkan email admin terdaftar')

@section('form')
<form method="POST" action="{{ route('admin.password.email') }}">
  @csrf
  <div class="mb-6">
    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Email Admin</label>
    <input type="email" name="email" value="{{ old('email') }}" required autofocus
           class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
           placeholder="admin@email.com">
    <p class="text-xs text-slate-400 mt-2">Kami akan mengirim link untuk membuat password baru.</p>
  </div>
  <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 transition-colors text-white font-bold py-3 rounded-xl text-sm">
    Kirim Link Reset
  </button>
</form>

<p class="text-center text-sm text-slate-500 mt-5">
  <a href="{{ route('admin.login') }}" class="text-blue-600 hover:text-blue-800 font-semibold">Kembali ke halaman masuk</a>
</p>
@endsection
