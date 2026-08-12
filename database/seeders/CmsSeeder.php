<?php

namespace Database\Seeders;

use App\Models\CarouselItem;
use App\Models\OrgMember;
use App\Models\SiteSetting;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CmsSeeder extends Seeder
{
    public function run(): void
    {
        // ── Admin user ──────────────────────────────────────────
        User::firstOrCreate(
            ['email' => 'admin@palem.id'],
            ['name' => 'Admin Palem', 'password' => Hash::make('palem2025')]
        );

        // ── Carousel ────────────────────────────────────────────
        if (CarouselItem::count() === 0) {
            $slides = [
                ['title' => 'Selamat Datang di Cluster Palem', 'subtitle' => 'Portal resmi warga RW 10 Cluster Palem Bumi Adipura. Nikmati kemudahan akses layanan, informasi, dan kegiatan komunitas.', 'image_url' => 'https://images.unsplash.com/photo-1543269865-cbf427effbad?w=1400&q=80', 'button_text' => 'Akses Layanan', 'button_url' => '/layanan', 'sort_order' => 0, 'is_active' => true],
                ['title' => 'FINAL 17 Agustus Volley Palem', 'subtitle' => 'Ayo warga RW 10, kita berikan dukungan terbaik! Jangan lewatkan babak final voli 17 Agustus.', 'image_url' => 'https://images.unsplash.com/photo-1461896836934-ffe607ba8211?w=1400&q=80', 'button_text' => 'Selengkapnya', 'button_url' => '/berita', 'sort_order' => 1, 'is_active' => true],
                ['title' => 'Gotong Royong Bersama Warga', 'subtitle' => 'Bersama kita jaga kebersihan dan keindahan lingkungan Cluster Palem tercinta.', 'image_url' => 'https://images.unsplash.com/photo-1529156069898-49953e39b3ac?w=1400&q=80', 'button_text' => 'Lihat Informasi', 'button_url' => '/informasi', 'sort_order' => 2, 'is_active' => true],
            ];
            foreach ($slides as $s) {
                CarouselItem::create($s);
            }
        }

        // ── Org Members ─────────────────────────────────────────
        if (OrgMember::count() === 0) {
            $members = [
                ['name' => 'Ahmad Suryana',  'position' => 'Ketua RW 10',     'role_type' => 'ketua_rw', 'rt_number' => null, 'phone' => '0812-3456-7890', 'period' => '2023 – 2026', 'description' => 'Menjabat sejak Januari 2023',     'bg_color' => '2563eb', 'sort_order' => 0],
                ['name' => 'Budi Hartono',   'position' => 'Ketua RT 01',     'role_type' => 'rt',       'rt_number' => 1,    'phone' => '0812-1111-2222', 'period' => null,          'description' => null,                            'bg_color' => '059669', 'sort_order' => 1],
                ['name' => 'Siti Rahayu',    'position' => 'Ketua RT 02',     'role_type' => 'rt',       'rt_number' => 2,    'phone' => '0813-2222-3333', 'period' => null,          'description' => null,                            'bg_color' => '059669', 'sort_order' => 2],
                ['name' => 'Hendra Wijaya',  'position' => 'Ketua RT 03',     'role_type' => 'rt',       'rt_number' => 3,    'phone' => '0814-3333-4444', 'period' => null,          'description' => null,                            'bg_color' => '059669', 'sort_order' => 3],
                ['name' => 'Dewi Susanti',   'position' => 'Ketua RT 04',     'role_type' => 'rt',       'rt_number' => 4,    'phone' => '0815-4444-5555', 'period' => null,          'description' => null,                            'bg_color' => '059669', 'sort_order' => 4],
                ['name' => 'Agus Prasetyo',  'position' => 'Ketua RT 05',     'role_type' => 'rt',       'rt_number' => 5,    'phone' => '0816-5555-6666', 'period' => null,          'description' => null,                            'bg_color' => '059669', 'sort_order' => 5],
                ['name' => 'Rina Kusuma',    'position' => 'Ketua RT 06',     'role_type' => 'rt',       'rt_number' => 6,    'phone' => '0817-6666-7777', 'period' => null,          'description' => null,                            'bg_color' => '059669', 'sort_order' => 6],
                ['name' => 'Sri Mulyani',    'position' => 'Ketua Posyandu',  'role_type' => 'divisi',   'rt_number' => null, 'phone' => '0818-1234-5678', 'period' => null,          'description' => 'Bertanggung jawab atas kesehatan ibu & balita', 'bg_color' => '3b82f6', 'sort_order' => 10],
                ['name' => 'Kartini Dewi',   'position' => 'Ketua PKK',       'role_type' => 'divisi',   'rt_number' => null, 'phone' => '0819-2345-6789', 'period' => null,          'description' => 'Pemberdayaan kesejahteraan keluarga',            'bg_color' => '7c3aed', 'sort_order' => 11],
                ['name' => 'Yusuf Santoso',  'position' => 'Keamanan',        'role_type' => 'divisi',   'rt_number' => null, 'phone' => '0821-3456-7890', 'period' => null,          'description' => 'Koordinator keamanan & patroli lingkungan',      'bg_color' => 'f97316', 'sort_order' => 12],
            ];
            foreach ($members as $m) {
                OrgMember::create($m);
            }
        }

        // ── Site Settings ────────────────────────────────────────
        if (SiteSetting::count() === 0) {
            $settings = [
                // general
                ['key' => 'site.name',      'value' => 'PALEM',           'type' => 'text',     'label' => 'Nama Situs',          'group' => 'general', 'sort_order' => 1],
                ['key' => 'site.tagline',   'value' => 'RW 10 Cluster',   'type' => 'text',     'label' => 'Tagline / Sub-nama',  'group' => 'general', 'sort_order' => 2],
                ['key' => 'site.copyright', 'value' => 'RW 10 Cluster Palem · Bumi Adipura, Bandung', 'type' => 'text', 'label' => 'Teks Copyright Footer', 'group' => 'general', 'sort_order' => 3],
                // contact
                ['key' => 'contact.phone',   'value' => '022 – 8750 6667',         'type' => 'text',     'label' => 'Nomor Telepon',   'group' => 'contact', 'sort_order' => 1],
                ['key' => 'contact.wa',      'value' => '02287506667',             'type' => 'text',     'label' => 'Nomor WhatsApp',  'group' => 'contact', 'sort_order' => 2],
                ['key' => 'contact.email',   'value' => 'info@clusterpalem.com',   'type' => 'text',     'label' => 'Email',           'group' => 'contact', 'sort_order' => 3],
                ['key' => 'contact.address', 'value' => 'Jl. Palem X, Kel. Rancabolang, Kec. Gedebage, Kota Bandung', 'type' => 'textarea', 'label' => 'Alamat Lengkap', 'group' => 'contact', 'sort_order' => 4],
                ['key' => 'contact.hours',   'value' => 'Senin – Sabtu: 08.00 – 18.00', 'type' => 'text', 'label' => 'Jam Pelayanan', 'group' => 'contact', 'sort_order' => 5],
                // hero
                ['key' => 'hero.badge',    'value' => 'RW 10 · Cluster Palem · Bandung', 'type' => 'text',     'label' => 'Badge Teks Hero',    'group' => 'hero', 'sort_order' => 1],
                ['key' => 'hero.title',    'value' => 'Selamat Datang di Cluster Palem', 'type' => 'text',     'label' => 'Judul Utama Hero',   'group' => 'hero', 'sort_order' => 2],
                ['key' => 'hero.subtitle', 'value' => 'Portal resmi warga RW 10 Cluster Palem Bumi Adipura. Nikmati kemudahan akses layanan, informasi, dan kegiatan komunitas.', 'type' => 'textarea', 'label' => 'Sub-judul Hero', 'group' => 'hero', 'sort_order' => 3],
                // stats
                ['key' => 'stats.kk',    'value' => '250', 'type' => 'text', 'label' => 'Jumlah KK',       'group' => 'stats', 'sort_order' => 1],
                ['key' => 'stats.rt',    'value' => '6',   'type' => 'text', 'label' => 'Jumlah RT',       'group' => 'stats', 'sort_order' => 2],
                ['key' => 'stats.tahun', 'value' => '2015','type' => 'text', 'label' => 'Tahun Berdiri',   'group' => 'stats', 'sort_order' => 3],
                // profil
                ['key' => 'profil.visi',     'value' => 'Menjadi rukun warga yang mandiri, sejahtera, dan berbudaya lingkungan, berlandaskan semangat gotong royong dan toleransi di Cluster Palem.',                                                                                                                          'type' => 'textarea', 'label' => 'Teks Visi',            'group' => 'profil', 'sort_order' => 1],
                ['key' => 'profil.sejarah',  'value' => 'Cluster Palem diresmikan pada tahun 2015 sebagai bagian dari pengembangan tahap kedua perumahan Bumi Adipura. Sejak awal, cluster ini dirancang dengan konsep hunian modern yang menyatu dengan alam, mengedepankan ruang terbuka hijau dan sistem keamanan terpadu satu pintu (One Gate System).', 'type' => 'textarea', 'label' => 'Teks Sejarah (paragraf 1)', 'group' => 'profil', 'sort_order' => 2],
                ['key' => 'profil.sejarah_2','value' => 'Secara administratif, Cluster Palem meliputi 6 Rukun Tetangga (RT) dengan total sekitar 250 Kepala Keluarga. Wilayah kami dilengkapi dengan berbagai fasilitas umum seperti taman bermain anak, lapangan multifungsi, dan balai warga.',                            'type' => 'textarea', 'label' => 'Teks Sejarah (paragraf 2)', 'group' => 'profil', 'sort_order' => 3],
                // footer
                ['key' => 'footer.news', 'value' => 'Pengurus RW 10 Berikan Kembali Kartu Iuran Warga sebagai Syarat...', 'type' => 'text', 'label' => 'Cuplikan Berita di Footer', 'group' => 'footer', 'sort_order' => 1],
            ];
            foreach ($settings as $s) {
                SiteSetting::create($s);
            }
        }
    }
}
