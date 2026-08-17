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

    public function layanan()
    {
        return view('layanan');
    }

    public function berita(Request $request)
    {
        $search = trim((string) $request->query('q', ''));

        $berita = Post::query()
            ->ofType('berita')
            ->published()
            ->search($search)
            ->orderByDesc('is_featured')
            ->orderByDesc('published_at')
            ->orderByDesc('id')
            ->paginate(7)
            ->withQueryString();

        $headline = $berita->first();

        return view('berita', [
            'headline' => $headline,
            'berita' => $berita,
            'search' => $search,
        ]);
    }

    public function informasi(Request $request)
    {
        $search = trim((string) $request->query('q', ''));

        $informasi = Post::query()
            ->ofType('informasi')
            ->published()
            ->search($search)
            ->orderByDesc('is_featured')
            ->orderByDesc('published_at')
            ->orderByDesc('id')
            ->paginate(6)
            ->withQueryString();

        return view('informasi', [
            'informasi' => $informasi,
            'search' => $search,
        ]);
    }

    public function showBerita(Post $post)
    {
        return $this->showPost($post, 'berita');
    }

    public function showInformasi(Post $post)
    {
        return $this->showPost($post, 'informasi');
    }

    private function showPost(Post $post, string $type)
    {
        abort_unless($post->type === $type && $post->published_at && $post->published_at <= now(), 404);

        $related = Post::query()
            ->ofType($type)
            ->published()
            ->whereKeyNot($post->getKey())
            ->orderByDesc('published_at')
            ->limit(3)
            ->get();

        return view('post-show', [
            'post' => $post,
            'related' => $related,
        ]);
    }
}
