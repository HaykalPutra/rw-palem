<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $values = [
            'home.app_badge' => 'Portal Resmi RW 09',
            'home.app_title' => 'Informasi dan Layanan Warga',
            'home.app_subtitle' => 'Akses informasi, layanan administrasi, pengaduan, dan komunikasi warga RW 09 melalui website resmi dan WhatsApp pengurus.',
            'home.app_card1_title' => 'Website Resmi',
            'home.app_card1_desc' => 'Informasi kegiatan, berita, layanan, dan profil RW tersedia dalam satu portal.',
            'home.app_card2_title' => 'WhatsApp Pengurus',
            'home.app_card2_desc' => 'Hubungi pengurus untuk konsultasi, pengaduan, dan kebutuhan administrasi warga.',
        ];

        foreach ($values as $key => $value) {
            DB::table('site_settings')->where('key', $key)->update(['value' => $value, 'updated_at' => now()]);
        }
    }

    public function down(): void
    {
    }
};