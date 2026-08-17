<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $now = now();

        foreach ($this->settings() as $sort => $setting) {
            $exists = DB::table('site_settings')->where('key', $setting['key'])->exists();

            if ($exists) {
                continue;
            }

            DB::table('site_settings')->insert($setting + [
                'group' => 'layanan',
                'sort_order' => $sort + 1,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }

    public function down(): void
    {
        DB::table('site_settings')->where('group', 'layanan')->delete();
    }

    private function settings(): array
    {
        return [
            ['key' => 'layanan.hero_title', 'value' => 'Pusat Layanan Warga Palem', 'type' => 'text', 'label' => 'Judul Hero'],
            ['key' => 'layanan.hero_subtitle', 'value' => 'Layanan komunitas yang efisien, transparan, dan mudah diakses.', 'type' => 'textarea', 'label' => 'Sub-judul Hero'],
            ['key' => 'layanan.hero_img', 'value' => 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?w=600&q=80', 'type' => 'image', 'label' => 'Foto Hero'],
            ['key' => 'layanan.card_1_title', 'value' => 'Persuratan & Administrasi', 'type' => 'text', 'label' => 'Kartu 1 – Judul'],
            ['key' => 'layanan.card_1_desc', 'value' => 'Pengajuan surat pengantar, keterangan domisili, dan administrasi kependudukan lainnya.', 'type' => 'textarea', 'label' => 'Kartu 1 – Deskripsi'],
            ['key' => 'layanan.card_2_title', 'value' => 'Pembayaran Iuran', 'type' => 'text', 'label' => 'Kartu 2 – Judul'],
            ['key' => 'layanan.card_2_desc', 'value' => 'Portal pembayaran IPL bulanan secara digital, cepat, dan terverifikasi otomatis.', 'type' => 'textarea', 'label' => 'Kartu 2 – Deskripsi'],
            ['key' => 'layanan.card_3_title', 'value' => 'Fasilitas Umum', 'type' => 'text', 'label' => 'Kartu 3 – Judul'],
            ['key' => 'layanan.card_3_desc', 'value' => 'Reservasi clubhouse, lapangan olahraga, dan area publik cluster.', 'type' => 'textarea', 'label' => 'Kartu 3 – Deskripsi'],
            ['key' => 'layanan.card_4_title', 'value' => 'Pengaduan Warga', 'type' => 'text', 'label' => 'Kartu 4 – Judul'],
            ['key' => 'layanan.card_4_desc', 'value' => 'Laporan masalah keamanan, kebersihan, atau fasilitas cluster secara cepat.', 'type' => 'textarea', 'label' => 'Kartu 4 – Deskripsi'],
            ['key' => 'layanan.card_5_title', 'value' => 'Keamanan & Darurat', 'type' => 'text', 'label' => 'Kartu 5 – Judul'],
            ['key' => 'layanan.card_5_desc', 'value' => 'Kontak darurat dan kontrol patroli keamanan terintegrasi.', 'type' => 'textarea', 'label' => 'Kartu 5 – Deskripsi'],
            ['key' => 'layanan.card_6_title', 'value' => 'Aplikasi Android', 'type' => 'text', 'label' => 'Kartu 6 – Judul'],
            ['key' => 'layanan.card_6_desc', 'value' => 'Unduh aplikasi Palem untuk akses layanan langsung dari smartphone.', 'type' => 'textarea', 'label' => 'Kartu 6 – Deskripsi'],
            ['key' => 'layanan.card_6_url', 'value' => '#', 'type' => 'text', 'label' => 'Kartu 6 – Link Download APK'],
            ['key' => 'layanan.cta_title', 'value' => 'Butuh Bantuan?', 'type' => 'text', 'label' => 'CTA – Judul'],
            ['key' => 'layanan.cta_subtitle', 'value' => 'Hubungi pengurus RW melalui WhatsApp atau datang langsung ke kantor sekretariat.', 'type' => 'textarea', 'label' => 'CTA – Sub-judul'],
        ];
    }
};
