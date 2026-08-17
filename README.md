# Website RW 10 Cluster Palem

Portal warga RW 10 Cluster Palem (Bumi Adipura, Bandung) berbasis **Laravel 12 + Tailwind CSS 4 + Alpine.js**, lengkap dengan panel admin (CMS) sehingga pengurus RW bisa mengubah teks, foto, berita, pengumuman, dan struktur organisasi **tanpa menyentuh kode**.

---

## 1. Kebutuhan Sistem

| Komponen | Versi minimum |
|---|---|
| PHP | 8.2 |
| Composer | 2.x |
| Node.js | 20 (disarankan 22+) |
| MySQL / MariaDB | 5.7 / 10.4 |

XAMPP sudah mencakup PHP + MySQL.

---

## 2. Instalasi (pertama kali)

```bash
# 1. Masuk ke folder proyek
cd rw-palem

# 2. Dependency PHP
composer install

# 3. Dependency & build front-end
npm install
npm run build

# 4. Siapkan file konfigurasi
copy .env.example .env      # Windows
# cp .env.example .env      # macOS / Linux
php artisan key:generate

# 5. Buat database kosong bernama `rw_palem` di phpMyAdmin,
#    lalu sesuaikan DB_* di file .env

# 6. Buat tabel + data awal
php artisan migrate --seed

# 7. WAJIB: agar foto hasil upload bisa tampil di website
php artisan storage:link

# 8. Jalankan
php artisan serve
```

Buka <http://127.0.0.1:8000>.

> **Catatan:** langkah `php artisan storage:link` wajib dijalankan. Tanpa ini, semua gambar yang di-upload dari panel admin tidak akan muncul di website.

---

## 3. Login Panel Admin

Panel admin **tidak punya tombol login di website publik** (disengaja, demi keamanan). Akses langsung lewat URL:

```
http://127.0.0.1:8000/admin/login
```

Akun bawaan hasil seeder:

| Field | Nilai |
|---|---|
| Email | `admin@palem.id` |
| Password | `palem2025` |

> **Segera ganti password default setelah instalasi.**
> Masuk ke panel admin → menu **Akun & Password** di kiri bawah → isi password lama & password baru (minimal 8 karakter).

Lupa password? Gunakan link **"Lupa password?"** di halaman login. Fitur ini mengirim link reset ke email admin, jadi pastikan konfigurasi `MAIL_*` di `.env` sudah benar (lihat bagian 6).

---

## 4. Yang Bisa Diatur dari Panel Admin

| Menu | Isi yang bisa diubah |
|---|---|
| **Berita** | Tambah/edit/hapus artikel berita, foto, tanggal terbit, tandai unggulan |
| **Informasi** | Pengumuman warga, label "Penting" |
| **Halaman Home** | Carousel/slider, teks hero, angka statistik, seksi portal bawah |
| **Halaman Profil** | Hero, visi, misi, sejarah, foto wilayah, struktur organisasi |
| **Halaman Layanan** | Judul & foto hero, 6 kartu layanan, link download APK, teks CTA |
| **Umum & Kontak** | Nama situs, tagline, alamat, telepon, WhatsApp, email, jam pelayanan, footer |
| **Akun & Password** | Ganti password admin |

Setiap kolom gambar mendukung **upload langsung dari komputer/HP** maupun tempel URL. Setiap aksi simpan/hapus disertai konfirmasi dan notifikasi.

---

## 5. Perintah Harian

```bash
npm run dev                  # mode pengembangan front-end (hot reload)
npm run build                # build aset untuk produksi
php artisan serve            # jalankan server lokal
php artisan optimize:clear   # bersihkan cache config/route/view
```

Setiap kali mengubah file di `resources/css` atau `resources/js`, jalankan ulang `npm run build` (atau biarkan `npm run dev` berjalan).

---

## 6. Deploy ke Server Produksi

Wajib disesuaikan di `.env` server:

```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://domain-anda.com
```

> `APP_DEBUG=false` sangat penting. Bila `true`, setiap error akan menampilkan detail server (path file, query SQL, konfigurasi) ke pengunjung.

Langkah deploy:

```bash
composer install --no-dev --optimize-autoloader
npm ci
npm run build
php artisan migrate --force
php artisan storage:link
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

Konfigurasi email untuk fitur reset password:

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=email-anda@gmail.com
MAIL_PASSWORD=app-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=email-anda@gmail.com
MAIL_FROM_NAME="RW 10 Cluster Palem"
```

Pastikan `DocumentRoot` web server mengarah ke folder `public/`, bukan ke root proyek.

---

## 7. Catatan Keamanan

- Halaman login dibatasi **5 percobaan per menit** per IP untuk mencegah brute force.
- Semua rute admin dilindungi middleware `auth`; tamu diarahkan ke `/admin/login`.
- Upload dibatasi tipe gambar dengan ukuran maksimal 5 MB.
- File `.env` tidak boleh di-commit ke Git (sudah diatur di `.gitignore`).
- Ganti password default dan gunakan password unik minimal 8 karakter.

---

## 8. Struktur Singkat

```
app/Http/Controllers/         Controller publik & admin
app/Models/                   Post, CarouselItem, OrgMember, SiteSetting, User
database/migrations/          Skema tabel + seed pengaturan
database/seeders/CmsSeeder    Data awal (admin, carousel, struktur, settings)
resources/views/              Halaman publik, panel admin, halaman error
resources/css/app.css         Tailwind + animasi kustom
routes/web.php                Rute publik & admin
```
