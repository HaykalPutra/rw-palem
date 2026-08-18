<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $values = [
            'home.app_badge' => 'Layanan Warga RW 09',
            'home.app_title' => 'Pusat Informasi Warga',
            'home.app_subtitle' => 'Dapatkan informasi kegiatan, pengumuman, layanan administrasi, dan komunikasi resmi warga RW 09 secara mudah dan terarah.',
            'home.app_card1_title' => 'Informasi Kegiatan',
            'home.app_card1_desc' => 'Berita, pengumuman, dan agenda kegiatan warga tersedia dalam satu portal resmi.',
            'home.app_card2_title' => 'Layanan Administrasi',
            'home.app_card2_desc' => 'Sampaikan kebutuhan administrasi atau pertanyaan kepada pengurus RW.',
        ];

        foreach ($values as $key => $value) {
            DB::table('site_settings')->where('key', $key)->update([
                'value' => $value,
                'updated_at' => now(),
            ]);
        }
    }

    public function down(): void
    {
    }
};