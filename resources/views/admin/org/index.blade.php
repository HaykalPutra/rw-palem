@extends('layouts.admin')
@section('title', 'Kelola Organisasi – Admin Palem')
@section('content')

<div class="flex items-center justify-between mb-6">
  <div>
    <h1 class="text-2xl font-bold">Struktur Organisasi</h1>
    <p class="text-sm text-slate-500">Kelola anggota dan jabatan RW 10 yang tampil di halaman Profil.</p>
  </div>
  <a href="{{ route('admin.org.create') }}" class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold px-4 py-2 rounded-lg">+ Tambah Anggota</a>
</div>

<div class="bg-white border border-slate-200 rounded-xl overflow-hidden">
  <table class="w-full text-sm">
    <thead class="bg-slate-50 text-slate-500 text-xs uppercase tracking-wide">
      <tr>
        <th class="text-left px-4 py-3">Anggota</th>
        <th class="text-left px-4 py-3">Jabatan</th>
        <th class="text-left px-4 py-3">Tipe</th>
        <th class="text-left px-4 py-3">Urutan</th>
        <th class="text-right px-4 py-3">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($members as $member)
      <tr class="border-t border-slate-100 hover:bg-slate-50 transition">
        <td class="px-4 py-3">
          <div class="flex items-center gap-3">
            <img src="{{ $member->photo_url }}" class="w-10 h-10 rounded-full object-cover" alt="">
            <div>
              <div class="font-semibold text-slate-800">{{ $member->name }}</div>
              @if ($member->phone)
                <div class="text-xs text-slate-400">{{ $member->phone }}</div>
              @endif
            </div>
          </div>
        </td>
        <td class="px-4 py-3 text-slate-600">{{ $member->position }}</td>
        <td class="px-4 py-3">
          @php $badges = ['ketua_rw'=>['Ketua RW','blue'],'rt'=>['RT '.$member->rt_number,'emerald'],'divisi'=>['Divisi','violet']] @endphp
          <span class="text-xs bg-{{ $badges[$member->role_type][1] }}-100 text-{{ $badges[$member->role_type][1] }}-700 px-2 py-1 rounded-full">{{ $badges[$member->role_type][0] }}</span>
        </td>
        <td class="px-4 py-3 text-slate-500">{{ $member->sort_order }}</td>
        <td class="px-4 py-3">
          <div class="flex items-center justify-end gap-2">
            <a href="{{ route('admin.org.edit', $member) }}" class="text-xs px-3 py-1.5 rounded-md bg-slate-100 hover:bg-slate-200 text-slate-700 transition">Edit</a>
            <form action="{{ route('admin.org.destroy', $member) }}" method="POST"
                  @submit.prevent="window.dispatchEvent(new CustomEvent('palem-confirm',{detail:{title:'Hapus Anggota',message:'Anggota \"'+{{ json_encode($member->name) }}+'\" akan dihapus dari struktur organisasi.',label:'Ya, Hapus',danger:true,form:$el}}))">
              @csrf @method('DELETE')
              <button class="text-xs px-3 py-1.5 rounded-md bg-red-100 hover:bg-red-200 text-red-700 transition" type="submit">Hapus</button>
            </form>
          </div>
        </td>
      </tr>
      @empty
      <tr>
        <td colspan="5" class="px-4 py-10 text-center text-slate-400">Belum ada anggota. <a href="{{ route('admin.org.create') }}" class="text-blue-600">Tambah sekarang</a></td>
      </tr>
      @endforelse
    </tbody>
  </table>
</div>

@endsection
