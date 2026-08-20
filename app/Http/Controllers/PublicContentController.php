<?php

namespace App\Http\Controllers;

use App\Models\CarouselItem;
use App\Models\OrgMember;
use App\Models\Post;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class PublicContentController extends Controller
{
    public function home()
    {
        $carousel = CarouselItem::active()->get();
        $upcomingEvents = Post::query()
            ->where('is_event', true)
            ->published()
            ->where(function ($query) {
                $query->whereNull('event_date')->orWhere('event_date', '>=', now());
            })
            ->orderByRaw('event_date IS NULL, event_date')
            ->limit(3)
            ->get();
        $featuredPromo = Post::query()
            ->whereIn('type', ['berita', 'informasi'])
            ->published()
            ->featured()
            ->orderByDesc('published_at')
            ->first();

        return view('index', compact('carousel', 'upcomingEvents', 'featuredPromo'));
    }

    public function profil()
    {
        if (! Schema::hasTable('org_members')) {
            return view('profil', [
                'ketua' => null,
                'sekretaris' => null,
                'bendahara' => null,
                'rts' => [],
                'bidangGroups' => collect(),
                'pkk' => collect(),
            ]);
        }

        $ketua = OrgMember::where('role_type', 'ketua_rw')->orderBy('sort_order')->first();
        $rts   = OrgMember::where('role_type', 'rt')->orderBy('rt_number')->get();

        $divisi = OrgMember::where('role_type', 'divisi')->orderBy('sort_order')->get();

        // Sekretaris & Bendahara tampil sendiri di baris kedua struktur.
        $sekretaris = $divisi->firstWhere('position', 'Sekretaris');
        $bendahara  = $divisi->firstWhere('position', 'Bendahara');

        $sisaDivisi = $divisi->reject(
            fn ($m) => in_array($m->position, ['Sekretaris', 'Bendahara'])
        );

        // Seksi PKK & Posyandu dipisah ke kartu "Tim Penggerak PKK" sendiri.
        $pkk = $sisaDivisi
            ->filter(fn ($m) => str_contains(strtolower($m->position), 'pkk'))
            ->values()
            ->map(fn ($m, $i) => [
                'model'   => $m,
                'jabatan' => ['Ketua', 'Sekretaris'][$i] ?? 'Anggota',
            ]);

        $sisaDivisi = $sisaDivisi->reject(
            fn ($m) => str_contains(strtolower($m->position), 'pkk')
        );

        // Sisanya dikelompokkan per bidang (berdasarkan kolom `position`),
        // anggota pertama pada tiap bidang otomatis diberi label "Ketua".
        $bidangGroups = $sisaDivisi
            ->groupBy('position')
            ->map(fn ($members, $bidang) => [
                'nama'    => $bidang,
                'anggota' => $members->values()->map(fn ($m, $i) => [
                    'model'   => $m,
                    'jabatan' => $i === 0 ? 'Ketua' : 'Anggota',
                ]),
            ])
            ->values();

        return view('profil', compact('ketua', 'sekretaris', 'bendahara', 'rts', 'bidangGroups', 'pkk'));
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