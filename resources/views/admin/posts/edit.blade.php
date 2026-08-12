@extends('layouts.admin')
@section('title', 'Edit Konten – Admin Palem')
@section('content')

<div class="mb-6">
  <a href="{{ route('admin.posts.index', ['type' => $post->type]) }}" class="text-sm text-slate-500 hover:text-slate-800">&larr; Kembali</a>
  <h1 class="text-2xl font-bold mt-1">Edit Konten</h1>
  <p class="text-sm text-slate-500">Perbarui berita atau informasi yang sudah ada.</p>
</div>

<div class="bg-white border border-slate-200 rounded-2xl p-6 max-w-3xl">
  <form action="{{ route('admin.posts.update', $post) }}" method="POST">
    @method('PUT')
    @include('admin.posts._form')
  </form>
</div>
@endsection
