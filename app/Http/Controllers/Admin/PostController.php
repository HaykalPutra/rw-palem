<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $type = $request->query('type', 'berita');

        $posts = Post::query()
            ->when(in_array($type, ['berita', 'informasi'], true), function ($query) use ($type) {
                $query->ofType($type);
            })
            ->orderByDesc('published_at')
            ->orderByDesc('id')
            ->paginate(10)
            ->withQueryString();

        return view('admin.posts.index', [
            'posts' => $posts,
            'type' => $type,
        ]);
    }

    public function create(Request $request)
    {
        $type = $request->query('type', 'berita');

        return view('admin.posts.create', [
            'post' => new Post(['type' => in_array($type, ['berita', 'informasi'], true) ? $type : 'berita']),
            'type' => $type,
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $post = Post::create($data);

        return redirect()
            ->route('admin.posts.index', ['type' => $post->type])
            ->with('success', 'Konten berhasil ditambahkan.');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', [
            'post' => $post,
            'type' => $post->type,
        ]);
    }

    public function update(Request $request, Post $post)
    {
        $data = $this->validated($request);
        $post->update($data);

        return redirect()
            ->route('admin.posts.index', ['type' => $post->type])
            ->with('success', 'Konten berhasil diperbarui.');
    }

    public function destroy(Post $post)
    {
        $type = $post->type;
        $post->delete();

        return redirect()
            ->route('admin.posts.index', ['type' => $type])
            ->with('success', 'Konten berhasil dihapus.');
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'type' => ['required', Rule::in(['berita', 'informasi'])],
            'title' => ['required', 'string', 'max:160'],
            'excerpt' => ['nullable', 'string', 'max:500'],
            'content' => ['nullable', 'string'],
            'image_url' => ['nullable', 'url', 'max:2048'],
            'published_at' => ['nullable', 'date'],
            'is_featured' => ['nullable', 'boolean'],
        ]);

        $data['is_featured'] = $request->boolean('is_featured');

        return $data;
    }
}
