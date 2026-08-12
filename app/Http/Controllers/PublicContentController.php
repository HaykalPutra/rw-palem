<?php

namespace App\Http\Controllers;

use App\Models\CarouselItem;
use App\Models\OrgMember;
use App\Models\Post;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class PublicContentController extends Controller
{
    public function home()
    {
        $carousel = CarouselItem::active()->get();
        return view('index', compact('carousel'));
    }

    public function profil()
    {
        $ketua  = OrgMember::where('role_type', 'ketua_rw')->orderBy('sort_order')->first();
        $rts    = OrgMember::where('role_type', 'rt')->orderBy('rt_number')->get();
        $divisi = OrgMember::where('role_type', 'divisi')->orderBy('sort_order')->get();
        return view('profil', compact('ketua', 'rts', 'divisi'));
    }

    public function berita(Request $request)
    {
        $berita = Post::query()
            ->ofType('berita')
            ->published()
            ->orderByDesc('is_featured')
            ->orderByDesc('published_at')
            ->orderByDesc('id')
            ->paginate(7)
            ->withQueryString();

        $headline = $berita->first();

        return view('berita', [
            'headline' => $headline,
            'berita' => $berita,
        ]);
    }

    public function informasi(Request $request)
    {
        $informasi = Post::query()
            ->ofType('informasi')
            ->published()
            ->orderByDesc('is_featured')
            ->orderByDesc('published_at')
            ->orderByDesc('id')
            ->paginate(6)
            ->withQueryString();

        return view('informasi', [
            'informasi' => $informasi,
        ]);
    }
}
