@extends('layouts.admin')
@section('title', 'Akun Saya – Admin Palem')
@section('content')

<div class="mb-6">
  <h1 class="text-2xl font-bold">Akun Saya</h1>
  <p class="text-sm text-slate-500">Ganti password admin secara berkala untuk menjaga keamanan website.</p>
</div>

<div class="bg-white border border-slate-200 rounded-2xl overflow-hidden max-w-xl">
  <div class="flex items-center gap-3 bg-gradient-to-r from-slate-50 to-white border-b border-slate-100 px-5 py-4">
    <span class="text-xl">🔐</span>
    <div>
      <div class="font-bold text-slate-800">Ganti Password</div>
      <div class="text-xs text-slate-400">Masuk sebagai {{ Auth::user()?->email }}</div>
    </div>
  </div>

  <form method="POST" action="{{ route('admin.account.password') }}" class="p-5 space-y-4"
        @submit.prevent="window.dispatchEvent(new CustomEvent('palem-confirm',{detail:{title:'Ganti Password',message:'Password akun admin akan diperbarui. Pastikan Anda mengingat password barunya.',label:'Ya, Simpan',form:$el}}))">
    @csrf
    <div>
      <label class="block text-sm font-semibold text-slate-700 mb-1">Password Lama</label>
      <input type="password" name="current_password" required
             class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
    </div>
    <div>
      <label class="block text-sm font-semibold text-slate-700 mb-1">Password Baru</label>
      <input type="password" name="password" required
             class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
      <p class="text-xs text-slate-400 mt-1">Minimal 8 karakter.</p>
    </div>
    <div>
      <label class="block text-sm font-semibold text-slate-700 mb-1">Ulangi Password Baru</label>
      <input type="password" name="password_confirmation" required
             class="w-full border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
    </div>
    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold px-5 py-2.5 rounded-xl transition">
      Simpan Password
    </button>
  </form>
</div>
@endsection
