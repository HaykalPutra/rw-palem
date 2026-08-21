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
                ['name' => 'Aem Misbah', 'position' => 'Ketua RW 09', 'role_type' => 'ketua_rw', 'rt_number' => null, 'phone' => null, 'period' => '2026 - 2031', 'description' => null, 'bg_color' => '2563eb', 'sort_order' => 0],
                ['name' => 'Aang Hadian', 'position' => 'Ketua RT 01', 'role_type' => 'rt', 'rt_number' => 1, 'phone' => null, 'period' => null, 'description' => null, 'bg_color' => '059669', 'sort_order' => 1],
                ['name' => 'Erni Kustianti', 'position' => 'Sekretaris RT 01', 'role_type' => 'rt', 'rt_number' => 1, 'phone' => null, 'period' => null, 'description' => null, 'bg_color' => '0ea5e9', 'sort_order' => 2],
                ['name' => 'Nurlela', 'position' => 'Bendahara RT 01', 'role_type' => 'rt', 'rt_number' => 1, 'phone' => null, 'period' => null, 'description' => null, 'bg_color' => '14b8a6', 'sort_order' => 3],
                ['name' => 'A. Opik Taufik', 'position' => 'Ketua RT 02', 'role_type' => 'rt', 'rt_number' => 2, 'phone' => null, 'period' => null, 'description' => null, 'bg_color' => '059669', 'sort_order' => 4],
                ['name' => 'Ferdy Sanosa', 'position' => 'Sekretaris RT 02', 'role_type' => 'rt', 'rt_number' => 2, 'phone' => null, 'period' => null, 'description' => null, 'bg_color' => '0ea5e9', 'sort_order' => 5],
                ['name' => 'Aria Muhammadsyah', 'position' => 'Bendahara RT 02', 'role_type' => 'rt', 'rt_number' => 2, 'phone' => null, 'period' => null, 'description' => null, 'bg_color' => '14b8a6', 'sort_order' => 6],
                ['name' => 'Dang Heppy', 'position' => 'Ketua RT 03', 'role_type' => 'rt', 'rt_number' => 3, 'phone' => null, 'period' => null, 'description' => null, 'bg_color' => '059669', 'sort_order' => 7],
                ['name' => 'Nasiruddin Ubaidillah', 'position' => 'Sekretaris RT 03', 'role_type' => 'rt', 'rt_number' => 3, 'phone' => null, 'period' => null, 'description' => null, 'bg_color' => '0ea5e9', 'sort_order' => 8],
                ['name' => 'Esha Permana', 'position' => 'Bendahara RT 03', 'role_type' => 'rt', 'rt_number' => 3, 'phone' => null, 'period' => null, 'description' => null, 'bg_color' => '14b8a6', 'sort_order' => 9],
                ['name' => 'Lucky Kwartaman', 'position' => 'Ketua RT 04', 'role_type' => 'rt', 'rt_number' => 4, 'phone' => null, 'period' => null, 'description' => null, 'bg_color' => '059669', 'sort_order' => 10],
                ['name' => 'Fani Supriyanto', 'position' => 'Sekretaris RT 04', 'role_type' => 'rt', 'rt_number' => 4, 'phone' => null, 'period' => null, 'description' => null, 'bg_color' => '0ea5e9', 'sort_order' => 11],
                ['name' => 'Henny Subaryani', 'position' => 'Bendahara RT 04', 'role_type' => 'rt', 'rt_number' => 4, 'phone' => null, 'period' => null, 'description' => null, 'bg_color' => '14b8a6', 'sort_order' => 12],
                ['name' => 'Atang Siliadji', 'position' => 'Ketua RT 05', 'role_type' => 'rt', 'rt_number' => 5, 'phone' => null, 'period' => null, 'description' => null, 'bg_color' => '059669', 'sort_order' => 13],
                ['name' => 'Farid Ramdhani', 'position' => 'Sekretaris RT 05', 'role_type' => 'rt', 'rt_number' => 5, 'phone' => null, 'period' => null, 'description' => null, 'bg_color' => '0ea5e9', 'sort_order' => 14],
                ['name' => 'Yusmar Rochman', 'position' => 'Bendahara RT 05', 'role_type' => 'rt', 'rt_number' => 5, 'phone' => null, 'period' => null, 'description' => null, 'bg_color' => '14b8a6', 'sort_order' => 15],
                ['name' => 'Arif Aryoso', 'position' => 'Ketua RT 06', 'role_type' => 'rt', 'rt_number' => 6, 'phone' => null, 'period' => null, 'description' => null, 'bg_color' => '059669', 'sort_order' => 16],
                ['name' => 'Henny Kristianti', 'position' => 'Sekretaris RT 06', 'role_type' => 'rt', 'rt_number' => 6, 'phone' => null, 'period' => null, 'description' => null, 'bg_color' => '0ea5e9', 'sort_order' => 17],
                ['name' => 'Dina Angraeni', 'position' => 'Bendahara RT 06', 'role_type' => 'rt', 'rt_number' => 6, 'phone' => null, 'period' => null, 'description' => null, 'bg_color' => '14b8a6', 'sort_order' => 18],
                ['name' => 'Heri Kuswoyo', 'position' => 'Sekretaris', 'role_type' => 'divisi', 'rt_number' => null, 'phone' => null, 'period' => null, 'description' => null, 'bg_color' => '0ea5e9', 'sort_order' => 19],
                ['name' => 'Wildan Pribadi', 'position' => 'Bendahara', 'role_type' => 'divisi', 'rt_number' => null, 'phone' => null, 'period' => null, 'description' => null, 'bg_color' => '14b8a6', 'sort_order' => 20],
                ['name' => 'Dicky Hendrawan', 'position' => 'Seksi Keagamaan', 'role_type' => 'divisi', 'rt_number' => null, 'phone' => null, 'period' => null, 'description' => null, 'bg_color' => 'f59e0b', 'sort_order' => 21],
                ['name' => 'Gunaedi Abdia Away', 'position' => 'Seksi Keagamaan', 'role_type' => 'divisi', 'rt_number' => null, 'phone' => null, 'period' => null, 'description' => null, 'bg_color' => 'f59e0b', 'sort_order' => 22],
                ['name' => 'Achmad Riyadi', 'position' => 'Seksi Keamanan', 'role_type' => 'divisi', 'rt_number' => null, 'phone' => null, 'period' => null, 'description' => null, 'bg_color' => 'ef4444', 'sort_order' => 23],
                ['name' => 'A Rahman', 'position' => 'Seksi Keamanan', 'role_type' => 'divisi', 'rt_number' => null, 'phone' => null, 'period' => null, 'description' => null, 'bg_color' => 'ef4444', 'sort_order' => 24],
                ['name' => 'Edi Kusnadi', 'position' => 'Seksi Kebersihan dan Lingkungan Hidup', 'role_type' => 'divisi', 'rt_number' => null, 'phone' => null, 'period' => null, 'description' => null, 'bg_color' => '22c55e', 'sort_order' => 25],
                ['name' => 'Sartiman Kistianto', 'position' => 'Seksi Kebersihan dan Lingkungan Hidup', 'role_type' => 'divisi', 'rt_number' => null, 'phone' => null, 'period' => null, 'description' => null, 'bg_color' => '22c55e', 'sort_order' => 26],
                ['name' => 'Ririk Eko Budiono', 'position' => 'Seksi Kebersihan dan Lingkungan Hidup', 'role_type' => 'divisi', 'rt_number' => null, 'phone' => null, 'period' => null, 'description' => null, 'bg_color' => '22c55e', 'sort_order' => 27],
                ['name' => 'Chairi Ramanova', 'position' => 'Seksi Pembangunan', 'role_type' => 'divisi', 'rt_number' => null, 'phone' => null, 'period' => null, 'description' => null, 'bg_color' => '8b5cf6', 'sort_order' => 28],
                ['name' => 'Bambang Budiono', 'position' => 'Seksi Pembangunan', 'role_type' => 'divisi', 'rt_number' => null, 'phone' => null, 'period' => null, 'description' => null, 'bg_color' => '8b5cf6', 'sort_order' => 29],
                ['name' => 'Turasman', 'position' => 'Seksi Pembangunan', 'role_type' => 'divisi', 'rt_number' => null, 'phone' => null, 'period' => null, 'description' => null, 'bg_color' => '8b5cf6', 'sort_order' => 30],
                ['name' => 'Bàjoe Saptadji HS', 'position' => 'Seksi Pembangunan', 'role_type' => 'divisi', 'rt_number' => null, 'phone' => null, 'period' => null, 'description' => null, 'bg_color' => '8b5cf6', 'sort_order' => 31],
                ['name' => 'Asep Sugianto', 'position' => 'Seksi Pemuda dan Olah Raga', 'role_type' => 'divisi', 'rt_number' => null, 'phone' => null, 'period' => null, 'description' => null, 'bg_color' => 'f97316', 'sort_order' => 32],
                ['name' => 'Rennaldi', 'position' => 'Seksi Pemuda dan Olah Raga', 'role_type' => 'divisi', 'rt_number' => null, 'phone' => null, 'period' => null, 'description' => null, 'bg_color' => 'f97316', 'sort_order' => 33],
                ['name' => 'Iwan Ridwana', 'position' => 'Seksi Pemuda dan Olah Raga', 'role_type' => 'divisi', 'rt_number' => null, 'phone' => null, 'period' => null, 'description' => null, 'bg_color' => 'f97316', 'sort_order' => 34],
                ['name' => 'Heddy Setiawan', 'position' => 'Seksi Pendidikan dan Hubungan Masyarakat', 'role_type' => 'divisi', 'rt_number' => null, 'phone' => null, 'period' => null, 'description' => null, 'bg_color' => '6366f1', 'sort_order' => 35],
                ['name' => 'Momo Suratma', 'position' => 'Seksi Pendidikan dan Hubungan Masyarakat', 'role_type' => 'divisi', 'rt_number' => null, 'phone' => null, 'period' => null, 'description' => null, 'bg_color' => '6366f1', 'sort_order' => 36],
                ['name' => 'Heti Lasmanawati', 'position' => 'Seksi Pendidikan dan Hubungan Masyarakat', 'role_type' => 'divisi', 'rt_number' => null, 'phone' => null, 'period' => null, 'description' => null, 'bg_color' => '6366f1', 'sort_order' => 37],
                ['name' => 'Dina Angraeni', 'position' => 'Seksi Pendidikan dan Hubungan Masyarakat', 'role_type' => 'divisi', 'rt_number' => null, 'phone' => null, 'period' => null, 'description' => null, 'bg_color' => '6366f1', 'sort_order' => 38],
                ['name' => 'Imas Setiawati', 'position' => 'Seksi PKK dan Posyandu', 'role_type' => 'divisi', 'rt_number' => null, 'phone' => null, 'period' => null, 'description' => null, 'bg_color' => 'ec4899', 'sort_order' => 39],
                ['name' => 'Eva Nurlaela Sari', 'position' => 'Seksi PKK dan Posyandu', 'role_type' => 'divisi', 'rt_number' => null, 'phone' => null, 'period' => null, 'description' => null, 'bg_color' => 'ec4899', 'sort_order' => 40],
                ['name' => 'Sri Gozali', 'position' => 'Seksi Tanggap Bencana', 'role_type' => 'divisi', 'rt_number' => null, 'phone' => null, 'period' => null, 'description' => null, 'bg_color' => '06b6d4', 'sort_order' => 41],
                ['name' => 'Akbar Asdema', 'position' => 'Seksi Tanggap Bencana', 'role_type' => 'divisi', 'rt_number' => null, 'phone' => null, 'period' => null, 'description' => null, 'bg_color' => '06b6d4', 'sort_order' => 42],
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
                ['key' => 'profil.rw_label',      'value' => 'RW 09', 'type' => 'text', 'label' => 'Label RW', 'group' => 'profil', 'sort_order' => 1],
                ['key' => 'profil.lokasi_label',  'value' => 'Kelurahan Rancabolang Kecamatan Gedebage Kota Bandung', 'type' => 'text', 'label' => 'Label Lokasi', 'group' => 'profil', 'sort_order' => 2],
                ['key' => 'profil.periode_label', 'value' => 'Periode 2026 - 2031', 'type' => 'text', 'label' => 'Label Periode', 'group' => 'profil', 'sort_order' => 3],
                ['key' => 'profil.visi',     'value' => 'Menjadi rukun warga yang mandiri, sejahtera, dan berbudaya lingkungan, berlandaskan semangat gotong royong dan toleransi di Cluster Palem.',                                                                                                                          'type' => 'textarea', 'label' => 'Teks Visi',            'group' => 'profil', 'sort_order' => 4],
                ['key' => 'profil.sejarah',  'value' => 'Cluster Palem diresmikan pada tahun 2015 sebagai bagian dari pengembangan tahap kedua perumahan Bumi Adipura. Sejak awal, cluster ini dirancang dengan konsep hunian modern yang menyatu dengan alam, mengedepankan ruang terbuka hijau dan sistem keamanan terpadu satu pintu (One Gate System).', 'type' => 'textarea', 'label' => 'Teks Sejarah (paragraf 1)', 'group' => 'profil', 'sort_order' => 5],
                ['key' => 'profil.sejarah_2','value' => 'Secara administratif, Cluster Palem meliputi 6 Rukun Tetangga (RT) dengan total sekitar 250 Kepala Keluarga. Wilayah kami dilengkapi dengan berbagai fasilitas umum seperti taman bermain anak, lapangan multifungsi, dan balai warga.',                            'type' => 'textarea', 'label' => 'Teks Sejarah (paragraf 2)', 'group' => 'profil', 'sort_order' => 6],
                // footer
                ['key' => 'footer.news', 'value' => 'Pengurus RW 10 Berikan Kembali Kartu Iuran Warga sebagai Syarat...', 'type' => 'text', 'label' => 'Cuplikan Berita di Footer', 'group' => 'footer', 'sort_order' => 1],
            ];
            foreach ($settings as $s) {
                SiteSetting::create($s);
            }
        }
    }
}