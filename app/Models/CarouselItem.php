<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarouselItem extends Model
{
    protected $fillable = [
        'post_id', 'title', 'subtitle', 'image_url', 'button_text', 'button_url', 'sort_order', 'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('sort_order');
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    /** Kalau slide ini disambungkan ke Post, judul selalu ikut judul Post terbaru. */
    public function getTitleAttribute($value)
    {
        return $this->post_id && $this->post ? $this->post->title : $value;
    }

    /** Kalau slide ini disambungkan ke Post, gambar selalu ikut gambar Post terbaru. */
    public function getImageUrlAttribute($value)
    {
        return $this->post_id && $this->post ? $this->post->image_url : $value;
    }

    /** Subtitle otomatis dari excerpt Post kalau belum diisi manual. */
    public function getSubtitleAttribute($value)
    {
        if ($value) {
            return $value;
        }
        return $this->post_id && $this->post ? $this->post->excerpt : $value;
    }
}