@extends('layouts.auth')

@section('title', 'Reset Password – Palem RW')
@section('heading', 'Buat Password Baru')
@section('subheading', 'Minimal 8 karakter')

@section('form')
<form method="POST" action="{{ route('admin.password.update') }}">
  @csrf
  <input type="hidden" name="token" value="{{ $token }}">

  <div class="mb-4">
    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Email</label>
    <input type="email" name="email" value="{{ old('email', $email) }}" required
           class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
  </div>
  <div class="mb-4">
    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Password Baru</label>
    <input type="password" name="password" required
           class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
           placeholder="••••••••">
  </div>
  <div class="mb-6">
    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Ulangi Password Baru</label>
    <input type="password" name="password_confirmation" required
           class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
           placeholder="••••••••">
  </div>
  <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 transition-colors text-white font-bold py-3 rounded-xl text-sm">
    Simpan Password Baru
  </button>
</form>
@endsection
