<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CarouselItem;
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
        return view('admin.carousel.form', ['item' => new CarouselItem(), 'mode' => 'create']);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        CarouselItem::create($data);
        return redirect()->route('admin.carousel.index')->with('success', 'Slide berhasil ditambahkan.');
    }

    public function edit(CarouselItem $carousel)
    {
        return view('admin.carousel.form', ['item' => $carousel, 'mode' => 'edit']);
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
            'title'       => 'required|string|max:255',
            'subtitle'    => 'nullable|string|max:500',
            'image_url'   => 'required|url',
            'button_text' => 'nullable|string|max:100',
            'button_url'  => 'nullable|string|max:255',
            'sort_order'  => 'nullable|integer|min:0',
        ]);
        $data['is_active']  = $request->boolean('is_active');
        $data['sort_order'] = $data['sort_order'] ?? 0;
        return $data;
    }
}
