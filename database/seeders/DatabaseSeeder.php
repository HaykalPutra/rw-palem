<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(CmsSeeder::class);

        // Sample posts (skip if already exist)
        if (\App\Models\Post::count() === 0) {
            \App\Models\Post::insert([
            [
                'type' => 'berita',
                'title' => 'Kerja Bakti Massal dan Penghijauan Taman Utama Cluster Palem',
                'excerpt' => 'Warga RW 10 bergotong royong membersihkan saluran air dan menanam bibit pohon untuk menyambut musim penghujan.',
                'content' => 'Kegiatan kerja bakti massal melibatkan seluruh RT di lingkungan Palem. Fokus utama pada kebersihan drainase, penghijauan area publik, dan edukasi pemilahan sampah rumah tangga.',
                'image_url' => 'https://images.unsplash.com/photo-1529156069898-49953e39b3ac?w=900',
                'published_at' => now()->subDays(2),
                'is_featured' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'berita',
                'title' => 'Pembaruan Sistem Akses Gerbang Menggunakan RFID',
                'excerpt' => 'Sistem akses gerbang utama akan ditingkatkan untuk keamanan dan kelancaran mobilitas warga.',
                'content' => 'Distribusi kartu RFID dilakukan bertahap per RT di pos keamanan. Warga diminta membawa identitas saat pengambilan kartu.',
                'image_url' => 'https://images.unsplash.com/photo-1595079676601-f1adf5be5dee?w=600',
                'published_at' => now()->subDays(4),
                'is_featured' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'informasi',
                'title' => 'Pemeliharaan Jaringan Listrik Cluster',
                'excerpt' => 'Akan dilakukan pemeliharaan rutin jaringan listrik pada akhir pekan ini.',
                'content' => 'Pemadaman sementara dijadwalkan per blok untuk meminimalkan gangguan. Detail jadwal dapat dilihat pada papan pengumuman balai warga.',
                'image_url' => 'https://images.unsplash.com/photo-1517511620798-cec17d428bc0?w=600',
                'published_at' => now()->subDays(1),
                'is_featured' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'informasi',
                'title' => 'Pemberlakuan Jam Operasional Lapangan Multifungsi',
                'excerpt' => 'Lapangan multifungsi kini memiliki jadwal operasional baru untuk meningkatkan kenyamanan bersama.',
                'content' => 'Penggunaan lapangan dibagi dalam sesi pagi, sore, dan malam. Reservasi tetap dilakukan melalui pengurus fasilitas.',
                'image_url' => null,
                'published_at' => now()->subDays(3),
                'is_featured' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        }
    }
}
