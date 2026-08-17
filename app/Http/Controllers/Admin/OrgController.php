<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrgMember;
use Illuminate\Http\Request;

class OrgController extends Controller
{
    public function index()
    {
        $members = OrgMember::orderBy('sort_order')->get();
        return view('admin.org.index', compact('members'));
    }

    public function create()
    {
        return view('admin.org.form', ['member' => new OrgMember(), 'mode' => 'create']);
    }

    public function store(Request $request)
    {
        OrgMember::create($this->validated($request));
        return redirect()->route('admin.org.index')->with('success', 'Anggota berhasil ditambahkan.');
    }

    public function edit(OrgMember $org)
    {
        return view('admin.org.form', ['member' => $org, 'mode' => 'edit']);
    }

    public function update(Request $request, OrgMember $org)
    {
        $org->update($this->validated($request));
        return redirect()->route('admin.org.index')->with('success', 'Anggota berhasil diperbarui.');
    }

    public function destroy(OrgMember $org)
    {
        $org->delete();
        return back()->with('success', 'Anggota berhasil dihapus.');
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'name'        => 'required|string|max:100',
            'position'    => 'required|string|max:100',
            'role_type'   => 'required|in:ketua_rw,rt,divisi',
            'rt_number'   => 'nullable|integer|min:1|max:20',
            'photo_url'   => 'nullable|url',
            'phone'       => 'nullable|string|max:25',
            'period'      => 'nullable|string|max:50',
            'description' => 'nullable|string|max:255',
            'bg_color'    => 'nullable|string|max:7',
            'sort_order'  => 'nullable|integer|min:0',
        ]);

        $data['bg_color']   = filled($data['bg_color'] ?? null) ? ltrim($data['bg_color'], '#') : '2563eb';
        $data['sort_order'] = filled($data['sort_order'] ?? null) ? (int) $data['sort_order'] : 0;

        return $data;
    }
}
