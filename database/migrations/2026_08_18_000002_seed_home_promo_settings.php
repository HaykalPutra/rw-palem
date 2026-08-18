<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $settings = [
            ['home.event_empty', 'Belum ada event mendatang.', 'text', 'Teks saat belum ada event', 11],
            ['home.promo_badge', 'INFORMASI WARGA', 'text', 'Label Promo Home', 12],
            ['home.promo_title', 'Informasi Warga RW 09', 'text', 'Judul Promo Home', 13],
            ['home.promo_image', 'https://images.unsplash.com/photo-1556761175-5973dc0f32e7?w=800&q=80', 'image', 'Gambar Promo Home', 14],
            ['home.promo_url', '#', 'text', 'Tautan Promo Home', 15],
            ['home.promo_button', 'Pelajari lebih lanjut', 'text', 'Teks Tombol Promo Home', 16],
        ];

        foreach ($settings as [$key, $value, $type, $label, $sortOrder]) {
            DB::table('site_settings')->updateOrInsert(
                ['key' => $key],
                ['value' => $value, 'type' => $type, 'label' => $label, 'group' => 'home', 'sort_order' => $sortOrder, 'updated_at' => now(), 'created_at' => now()]
            );
        }
    }

    public function down(): void
    {
        DB::table('site_settings')->whereIn('key', [
            'home.event_empty', 'home.promo_badge', 'home.promo_title', 'home.promo_image', 'home.promo_url', 'home.promo_button',
        ])->delete();
    }
};