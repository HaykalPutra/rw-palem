@extends('layouts.admin')
@section('title', 'Tambah Konten – Admin Palem')
@section('content')

<div class="mb-6">
  <a href="{{ route('admin.posts.index', ['type' => request('type','berita')]) }}" class="text-sm text-slate-500 hover:text-slate-800">&larr; Kembali</a>
  <h1 class="text-2xl font-bold mt-1">Tambah Konten Baru</h1>
  <p class="text-sm text-slate-500">Tambahkan berita atau informasi untuk ditampilkan di website.</p>
</div>

<div class="bg-white border border-slate-200 rounded-2xl p-6 max-w-3xl">
  <form action="{{ route('admin.posts.store') }}" method="POST">
    @include('admin.posts._form')
  </form>
</div>
@endsection
