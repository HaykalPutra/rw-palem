<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        $now = Carbon::now();

        // upsert: insert new keys, keep existing values untouched
        DB::table('site_settings')->upsert(
            collect([
                // home page
                ['key'=>'home.pelindung_title',  'value'=>'PELINDUNG',                                                   'type'=>'text',     'label'=>'Nama Program CCTV',              'group'=>'home', 'sort_order'=>1],
                ['key'=>'home.pelindung_desc',   'value'=>'Pemantauan Lingkungan Kota Bandung',                           'type'=>'text',     'label'=>'Sub-judul PELINDUNG',            'group'=>'home', 'sort_order'=>2],
                ['key'=>'home.pelindung_text',   'value'=>'CCTV pemantauan lingkungan di Kota Bandung untuk menjaga keamanan, kebersihan, dan kenyamanan warga.', 'type'=>'textarea','label'=>'Keterangan PELINDUNG',   'group'=>'home', 'sort_order'=>3],
                ['key'=>'home.app_badge',        'value'=>'Selamat datang di Palem',                                     'type'=>'text',     'label'=>'Badge Seksi Aplikasi',           'group'=>'home', 'sort_order'=>4],
                ['key'=>'home.app_title',        'value'=>'Satu Klik, Dekatkan Warga!',                                  'type'=>'text',     'label'=>'Judul Seksi Aplikasi',           'group'=>'home', 'sort_order'=>5],
                ['key'=>'home.app_subtitle',     'value'=>'Kini semua informasi, layanan, dan kegiatan warga RW 10 bisa diakses lewat website dan aplikasi Android, membuat warga semakin dekat dan terhubung.', 'type'=>'textarea','label'=>'Sub-judul Seksi Aplikasi', 'group'=>'home', 'sort_order'=>6],
                ['key'=>'home.app_card1_title',  'value'=>'Palem App',                                                   'type'=>'text',     'label'=>'Kartu Aplikasi 1 – Judul',       'group'=>'home', 'sort_order'=>7],
                ['key'=>'home.app_card1_desc',   'value'=>'Kemudahan layanan warga RW 10 dalam genggaman.',              'type'=>'text',     'label'=>'Kartu Aplikasi 1 – Deskripsi',   'group'=>'home', 'sort_order'=>8],
                ['key'=>'home.app_card2_title',  'value'=>'Scan QR Code',                                                'type'=>'text',     'label'=>'Kartu Aplikasi 2 – Judul',       'group'=>'home', 'sort_order'=>9],
                ['key'=>'home.app_card2_desc',   'value'=>'Scan untuk mengunduh aplikasi Android.',                      'type'=>'text',     'label'=>'Kartu Aplikasi 2 – Deskripsi',   'group'=>'home', 'sort_order'=>10],
                // profil page (misi items)
                ['key'=>'profil.hero_badge',     'value'=>'RW 10 Cluster Palem',                                         'type'=>'text',     'label'=>'Badge Hero Profil',              'group'=>'profil', 'sort_order'=>0],
                ['key'=>'profil.hero_title',     'value'=>'Profil RW Cluster Palem',                                     'type'=>'text',     'label'=>'Judul Hero Profil',              'group'=>'profil', 'sort_order'=>0],
                ['key'=>'profil.hero_subtitle',  'value'=>'Mewujudkan lingkungan yang aman, nyaman, dan harmonis menuju tata kelola warga yang transparan dan partisipatif.', 'type'=>'textarea','label'=>'Sub-judul Hero Profil','group'=>'profil','sort_order'=>0],
                ['key'=>'profil.misi_1',         'value'=>'Meningkatkan keamanan dan ketertiban lingkungan secara swadaya dan terpadu.',              'type'=>'text', 'label'=>'Misi 1', 'group'=>'profil', 'sort_order'=>4],
                ['key'=>'profil.misi_2',         'value'=>'Mengoptimalkan kebersihan, penghijauan, dan kesehatan lingkungan cluster.',                'type'=>'text', 'label'=>'Misi 2', 'group'=>'profil', 'sort_order'=>5],
                ['key'=>'profil.misi_3',         'value'=>'Membangun kerukunan antar warga melalui kegiatan sosial dan kemasyarakatan.',              'type'=>'text', 'label'=>'Misi 3', 'group'=>'profil', 'sort_order'=>6],
                ['key'=>'profil.misi_4',         'value'=>'Mewujudkan transparansi pengelolaan dana kas RW yang akuntabel.',                         'type'=>'text', 'label'=>'Misi 4', 'group'=>'profil', 'sort_order'=>7],
                // layanan page
                ['key'=>'layanan.hero_title',    'value'=>'Pusat Layanan Warga Palem',                                   'type'=>'text',     'label'=>'Judul Hero Layanan',             'group'=>'layanan', 'sort_order'=>1],
                ['key'=>'layanan.hero_subtitle', 'value'=>'Layanan komunitas yang efisien, transparan, dan mudah diakses untuk seluruh warga Cluster Palem Bumi Adipura.', 'type'=>'textarea','label'=>'Sub-judul Hero Layanan','group'=>'layanan','sort_order'=>2],
                ['key'=>'layanan.hero_img',      'value'=>'https://images.unsplash.com/photo-1451187580459-43490279c0fa?w=600&q=80',               'type'=>'image',    'label'=>'Foto Hero Layanan',              'group'=>'layanan', 'sort_order'=>3],
                ['key'=>'layanan.cta_title',     'value'=>'Butuh Bantuan?',                                              'type'=>'text',     'label'=>'Judul CTA Bawah',                'group'=>'layanan', 'sort_order'=>4],
                ['key'=>'layanan.cta_subtitle',  'value'=>'Hubungi pengurus RW melalui WhatsApp atau datang langsung ke kantor sekretariat.',        'type'=>'textarea','label'=>'Sub-judul CTA Bawah',           'group'=>'layanan', 'sort_order'=>5],
                ['key'=>'layanan.card_1_title',  'value'=>'Persuratan & Administrasi',                                   'type'=>'text',     'label'=>'Layanan 1 – Judul',              'group'=>'layanan', 'sort_order'=>10],
                ['key'=>'layanan.card_1_desc',   'value'=>'Pengajuan surat pengantar, keterangan domisili, dan administrasi kependudukan lainnya.',  'type'=>'textarea','label'=>'Layanan 1 – Deskripsi',         'group'=>'layanan', 'sort_order'=>11],
                ['key'=>'layanan.card_2_title',  'value'=>'Pembayaran Iuran',                                            'type'=>'text',     'label'=>'Layanan 2 – Judul',              'group'=>'layanan', 'sort_order'=>12],
                ['key'=>'layanan.card_2_desc',   'value'=>'Portal pembayaran IPL bulanan secara digital, cepat, dan terverifikasi otomatis.',        'type'=>'textarea','label'=>'Layanan 2 – Deskripsi',         'group'=>'layanan', 'sort_order'=>13],
                ['key'=>'layanan.card_3_title',  'value'=>'Fasilitas Umum',                                              'type'=>'text',     'label'=>'Layanan 3 – Judul',              'group'=>'layanan', 'sort_order'=>14],
                ['key'=>'layanan.card_3_desc',   'value'=>'Reservasi clubhouse, lapangan olahraga, dan area publik cluster.',                        'type'=>'textarea','label'=>'Layanan 3 – Deskripsi',         'group'=>'layanan', 'sort_order'=>15],
                ['key'=>'layanan.card_4_title',  'value'=>'Pengaduan Warga',                                             'type'=>'text',     'label'=>'Layanan 4 – Judul',              'group'=>'layanan', 'sort_order'=>16],
                ['key'=>'layanan.card_4_desc',   'value'=>'Laporan masalah keamanan, kebersihan, atau fasilitas cluster secara cepat.',              'type'=>'textarea','label'=>'Layanan 4 – Deskripsi',         'group'=>'layanan', 'sort_order'=>17],
                ['key'=>'layanan.card_5_title',  'value'=>'Keamanan & Darurat',                                          'type'=>'text',     'label'=>'Layanan 5 – Judul',              'group'=>'layanan', 'sort_order'=>18],
                ['key'=>'layanan.card_5_desc',   'value'=>'Kontak darurat dan kontrol patroli keamanan terintegrasi.',                              'type'=>'textarea','label'=>'Layanan 5 – Deskripsi',         'group'=>'layanan', 'sort_order'=>19],
                ['key'=>'layanan.card_6_title',  'value'=>'Aplikasi Android',                                            'type'=>'text',     'label'=>'Layanan 6 – Judul',              'group'=>'layanan', 'sort_order'=>20],
                ['key'=>'layanan.card_6_desc',   'value'=>'Unduh aplikasi Palem untuk akses layanan langsung dari smartphone.',                      'type'=>'textarea','label'=>'Layanan 6 – Deskripsi',         'group'=>'layanan', 'sort_order'=>21],
            ])->map(fn ($s) => array_merge($s, ['created_at' => $now, 'updated_at' => $now]))->all(),
            ['key'],
            ['type', 'label', 'group', 'sort_order', 'updated_at']
            // Note: we do NOT update 'value' so existing admin edits are preserved
        );
    }

    public function down(): void {}
};
