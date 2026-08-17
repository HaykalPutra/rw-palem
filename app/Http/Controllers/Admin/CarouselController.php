<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CarouselItem;
use App\Models\Post;
use Illuminate\Http\Request;

class CarouselController extends Controller
{
    public function index()
    {
        $items = CarouselItem::orderBy('sort_order')->get();
        return view('admin.carousel.index', compact('items'));
    }

    public function create()
    {
        $posts = Post::published()->orderByDesc('published_at')->get();
        return view('admin.carousel.form', ['item' => new CarouselItem(), 'mode' => 'create', 'posts' => $posts]);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        CarouselItem::create($data);
        return redirect()->route('admin.carousel.index')->with('success', 'Slide berhasil ditambahkan.');
    }

    public function edit(CarouselItem $carousel)
    {
        $posts = Post::published()->orderByDesc('published_at')->get();
        return view('admin.carousel.form', ['item' => $carousel, 'mode' => 'edit', 'posts' => $posts]);
    }

    public function update(Request $request, CarouselItem $carousel)
    {
        $carousel->update($this->validated($request));
        return redirect()->route('admin.carousel.index')->with('success', 'Slide berhasil diperbarui.');
    }

    public function destroy(CarouselItem $carousel)
    {
        $carousel->delete();
        return back()->with('success', 'Slide berhasil dihapus.');
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'post_id'     => 'nullable|exists:posts,id',
            'title'       => 'required_without:post_id|nullable|string|max:255',
            'subtitle'    => 'nullable|string|max:500',
            'image_url'   => 'required_without:post_id|nullable|url',
            'button_text' => 'nullable|string|max:100',
            'button_url'  => 'nullable|string|max:255',
            'sort_order'  => 'nullable|integer|min:0',
        ]);

        // Kalau ambil dari Post, snapshot title & image_url biar kolom DB (NOT NULL) tetap terisi.
        // Tampilan tetap ikut data Post terbaru karena accessor di model.
        if (!empty($data['post_id'])) {
            $post = Post::find($data['post_id']);
            $data['title'] = $post->title;
            $data['image_url'] = $post->image_url ?: 'https://images.unsplash.com/photo-1529156069898-49953e39b3ac?w=900';
        }

        $data['is_active']  = $request->boolean('is_active');
        $data['sort_order'] = $data['sort_order'] ?? 0;
        return $data;
    }
}