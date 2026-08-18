@extends('layouts.admin')

@section('title', 'Admin Konten - Palem')

@section('content')
<div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3 mb-6">
  <div>
    <h1 class="text-2xl font-bold">Kelola {{ $type === 'informasi' ? 'Informasi' : ($type === 'event' ? 'Event Mendatang' : 'Berita') }}</h1>
    <p class="text-sm text-slate-500">Tambah, edit, dan hapus konten untuk halaman publik.</p>
  </div>
  <a href="{{ route('admin.posts.create', ['type' => $type]) }}" class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold px-4 py-2 rounded-lg">+ Tambah Konten</a>
</div>

<div class="bg-white border border-slate-200 rounded-xl overflow-hidden">
  <table class="w-full text-sm">
    <thead class="bg-slate-100 text-slate-600">
      <tr>
        <th class="text-left px-4 py-3">Judul</th>
        <th class="text-left px-4 py-3">Tanggal Publikasi</th>
        <th class="text-left px-4 py-3">Unggulan</th>
        <th class="text-right px-4 py-3">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($posts as $post)
        <tr class="border-t border-slate-100">
          <td class="px-4 py-3">
            <div class="font-medium">{{ $post->title }}</div>
            <div class="text-xs text-slate-500 mt-1">{{ \Illuminate\Support\Str::limit($post->excerpt, 90) }}</div>
          </td>
          <td class="px-4 py-3 text-slate-600">
            <div>{{ optional($post->published_at)->format('d M Y H:i') ?? '-' }}</div>
            @if ($type === 'event')
              <div class="text-xs text-blue-600 mt-1">{{ ucfirst($post->type) }} · Event: {{ optional($post->event_date)->format('d M Y H:i') ?? 'Belum diisi' }}</div>
            @endif
            @if (! $post->published_at)
              <span class="inline-block mt-1 text-[10px] bg-slate-100 text-slate-600 px-2 py-0.5 rounded-full">Draft — belum tampil</span>
            @elseif ($post->published_at > now())
              <span class="inline-block mt-1 text-[10px] bg-amber-100 text-amber-700 px-2 py-0.5 rounded-full">Terjadwal — belum tampil</span>
            @else
              <span class="inline-block mt-1 text-[10px] bg-emerald-100 text-emerald-700 px-2 py-0.5 rounded-full">Tampil di website</span>
            @endif
          </td>
          <td class="px-4 py-3">
            @if ($post->is_featured)
              <span class="text-xs bg-yellow-100 text-yellow-700 px-2 py-1 rounded-full">Ya</span>
            @else
              <span class="text-xs bg-slate-100 text-slate-600 px-2 py-1 rounded-full">Tidak</span>
            @endif
          </td>
          <td class="px-4 py-3">
            <div class="flex items-center justify-end gap-2">
              <a href="{{ $type === 'event' ? route('admin.posts.edit', ['post' => $post, 'type' => 'event']) : route('admin.posts.edit', $post) }}" class="text-xs px-3 py-1.5 rounded-md bg-slate-100 text-slate-700">Edit</a>
              <form action="{{ route('admin.posts.destroy', $post) }}" method="POST"
                    @submit.prevent="window.dispatchEvent(new CustomEvent('palem-confirm',{detail:{title:'Hapus Konten',message:'Konten ini akan dihapus permanen dan tidak bisa dikembalikan.',label:'Ya, Hapus',danger:true,form:$el}}))">
                @csrf
                @method('DELETE')
                <button class="text-xs px-3 py-1.5 rounded-md bg-red-100 text-red-700" type="submit">Hapus</button>
              </form>
            </div>
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="4" class="px-4 py-8 text-center text-slate-500">Belum ada konten.</td>
        </tr>
      @endforelse
    </tbody>
  </table>
</div>

<div class="mt-5">{{ $posts->links() }}</div>
@endsection
