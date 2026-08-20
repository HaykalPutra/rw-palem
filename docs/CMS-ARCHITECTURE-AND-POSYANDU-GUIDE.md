# Panduan Sistem CMS RW Palem dan Pola Pengembangan CMS Posyandu

Dokumen ini menjelaskan cara kerja CMS website RW Palem, hubungan antara halaman publik dan panel admin, serta pola yang dapat digunakan untuk membangun website Posyandu dengan sistem CMS yang serupa.

Dokumen ini ditulis agar developer atau AI lain memahami konteks project sebelum mengubah kode.

---

## 1. Ringkasan Sistem

Website ini adalah portal informasi warga berbasis Laravel.

Teknologi utama:

- Laravel 12
- PHP 8.2 atau lebih baru
- MySQL atau MariaDB
- Blade sebagai template HTML
- Tailwind CSS untuk styling
- Alpine.js untuk interaksi ringan di browser
- Vite untuk build aset frontend

Sistem memiliki dua area utama:

1. **Website publik** yang dapat dilihat warga.
2. **Panel admin/CMS** yang digunakan pengurus untuk mengubah isi website tanpa mengedit kode.

Konsep utamanya adalah:

```text
Admin mengubah data di CMS
        |
        v
Data disimpan di database
        |
        v
Controller mengambil data
        |
        v
Blade menampilkan data di website publik
```

---

## 2. Struktur Folder Penting

```text
rw-palem/
├── app/
│   ├── Http/Controllers/
│   │   ├── PublicContentController.php
│   │   ├── Admin/
│   │   │   ├── PostController.php
│   │   │   ├── SettingsController.php
│   │   │   ├── CarouselController.php
│   │   │   ├── OrgController.php
│   │   │   └── UploadController.php
│   │   └── Auth/
│   ├── Models/
│   │   ├── Post.php
│   │   ├── SiteSetting.php
│   │   ├── CarouselItem.php
│   │   ├── OrgMember.php
│   │   └── User.php
│   └── helpers.php
├── database/
│   ├── migrations/
│   └── seeders/
├── resources/views/
│   ├── index.blade.php
│   ├── berita.blade.php
│   ├── informasi.blade.php
│   ├── profil.blade.php
│   ├── layanan.blade.php
│   ├── post-show.blade.php
│   ├── admin/
│   └── layouts/
├── routes/web.php
├── public/
└── storage/
```

### Aturan lokasi kode

- **URL dan rute** berada di `routes/web.php`.
- **Logika pengambilan data** berada di Controller.
- **Definisi tabel dan validasi bentuk data** berada di Model serta migration.
- **Tampilan publik** berada di `resources/views/`.
- **Tampilan admin** berada di `resources/views/admin/`.
- **Data awal dan setting default** berada di `database/seeders/` atau migration seeding.
- **Upload gambar** ditangani oleh `Admin/UploadController.php`.

---

## 3. Pola MVC yang Digunakan

### Model

Model mewakili tabel database.

Contoh:

- `Post` mewakili berita dan informasi.
- `SiteSetting` mewakili teks website yang dapat diubah admin.
- `CarouselItem` mewakili slide gambar di Home.
- `OrgMember` mewakili anggota struktur organisasi.

Model `Post` memiliki scope untuk membantu query:

```php
Post::query()
    ->ofType('berita')
    ->published()
    ->featured()
    ->get();
```

Scope penting:

- `ofType('berita')`: mengambil tipe konten tertentu.
- `published()`: hanya mengambil konten yang sudah diterbitkan.
- `featured()`: hanya mengambil konten unggulan.
- `search($keyword)`: mencari judul, ringkasan, atau isi.

### Controller

Controller mengambil data dan mengirimkannya ke Blade.

Controller publik utama adalah:

```text
app/Http/Controllers/PublicContentController.php
```

Contoh alur Home:

```php
public function home()
{
    $carousel = CarouselItem::active()->get();
    $upcomingEvents = Post::query()
        ->where('is_event', true)
        ->published()
        ->get();

    return view('index', compact('carousel', 'upcomingEvents'));
}
```

Controller admin memproses form:

```text
app/Http/Controllers/Admin/PostController.php
```

Tugasnya:

- menampilkan daftar konten;
- menampilkan form tambah;
- memvalidasi input;
- menyimpan konten;
- mengedit konten;
- menghapus konten;
- membuat slide carousel jika admin mencentangnya.

### View/Blade

Blade adalah HTML yang dapat membaca data dari Controller.

Contoh:

```blade
<h1>{{ $post->title }}</h1>
<p>{{ $post->excerpt }}</p>
```

Setting dibaca menggunakan helper:

```blade
{{ setting('home.app_title', 'Pusat Informasi Warga') }}
```

Parameter kedua adalah fallback apabila setting belum ada di database.

---

## 4. Database dan Fungsi Setiap Tabel

### `users`

Menyimpan akun admin.

Dipakai untuk:

- login admin;
- middleware `auth`;
- ganti password;
- reset password.

### `posts`

Menyimpan konten utama website.

Kolom penting:

| Kolom | Fungsi |
|---|---|
| `type` | `berita` atau `informasi` |
| `title` | Judul konten |
| `excerpt` | Ringkasan singkat |
| `content` | Isi lengkap |
| `image_url` | URL/path gambar opsional |
| `published_at` | Waktu konten mulai tampil |
| `event_date` | Tanggal kegiatan, opsional |
| `is_event` | Menandai konten agar tampil di Event Mendatang |
| `is_featured` | Menandai konten unggulan |

### Penting: konsep Event

Event bukan tipe konten terpisah.

Event tetap dibuat sebagai Berita atau Informasi, lalu admin mencentang:

```text
Tampilkan sebagai Event Mendatang di Home
```

Secara database:

```text
 type = berita/informasi
 is_event = true
```

Keuntungannya:

- event tetap memiliki halaman detail berita/informasi;
- admin tidak perlu belajar tipe konten tambahan;
- konten dapat tampil sebagai berita sekaligus event;
- tidak ada duplikasi data.

### `site_settings`

Menyimpan teks, angka, URL, dan gambar yang dapat diubah dari menu pengaturan admin.

Contoh key:

```text
home.app_title
home.app_subtitle
home.promo_title
profil.rw_label
profil.periode_label
contact.wa
layanan.hero_title
```

Setiap setting memiliki:

- `key`: nama teknis unik;
- `value`: nilai yang tampil;
- `type`: `text`, `textarea`, atau `image`;
- `label`: nama yang terlihat di CMS;
- `group`: kelompok halaman;
- `sort_order`: urutan tampil di form admin.

Helper yang digunakan di Blade:

```php
setting('contact.wa', '628000000000')
```

`SiteSetting::get()` menggunakan cache agar pembacaan setting tidak selalu query ke database.

### `carousel_items`

Menyimpan slide gambar besar di bagian atas Home.

Carousel dapat bersumber dari:

- input manual;
- berita/informasi yang sudah ada.

### `org_members`

Menyimpan struktur organisasi RW.

Contoh data:

- ketua RW;
- RT;
- divisi/seksi;
- nama pengurus;
- jabatan;
- foto;
- urutan tampilan.

---

## 5. Rute Website Publik

Rute publik berada di `routes/web.php`.

| URL | Fungsi |
|---|---|
| `/` | Home |
| `/profil` | Profil dan struktur organisasi |
| `/layanan` | Layanan warga |
| `/berita` | Daftar berita |
| `/berita/{post}` | Detail berita |
| `/informasi` | Daftar informasi/pengumuman |
| `/informasi/{post}` | Detail informasi |

Event yang ditampilkan di Home menggunakan detail sesuai tipe aslinya:

- Event bertipe Berita membuka `/berita/{post}`.
- Event bertipe Informasi membuka `/informasi/{post}`.

---

## 6. Rute Panel Admin

Semua rute admin berada di bawah prefix `/admin` dan dilindungi middleware `auth`.

| URL/Menu | Fungsi |
|---|---|
| `/admin/login` | Login admin |
| `/admin/posts?type=berita` | Kelola berita |
| `/admin/posts?type=informasi` | Kelola informasi |
| `/admin/posts?type=event` | Daftar khusus Event Mendatang |
| `/admin/settings?page=home` | Pengaturan Home |
| `/admin/settings?page=profil` | Pengaturan Profil |
| `/admin/settings?page=layanan` | Pengaturan Layanan |
| `/admin/settings?page=berita` | Shortcut berita/informasi/event |
| `/admin/settings?page=umum` | Kontak dan identitas website |
| `/admin/carousel` | Kelola slide Home |
| `/admin/org` | Kelola struktur organisasi |
| `/admin/akun` | Ganti password |

### Cara kerja halaman Event admin

Halaman Event adalah filter dari tabel `posts`, bukan tabel baru.

Saat membuka:

```text
/admin/posts?type=event
```

Controller mengambil:

```php
Post::where('is_event', true)
```

Saat menambah melalui halaman Event:

- tipe otomatis disimpan sebagai `informasi`;
- `is_event` otomatis bernilai `true`;
- admin tidak perlu memilih Berita/Informasi;
- foto tetap opsional;
- tanggal event boleh diisi atau dikosongkan.

---

## 7. Alur Admin Menambah Event

1. Login ke `/admin/login`.
2. Buka menu **Event Mendatang**.
3. Klik **Tambah Konten**.
4. Isi judul kegiatan.
5. Isi tanggal event jika tersedia.
6. Isi ringkasan dan isi kegiatan.
7. Upload foto jika ada, tetapi tidak wajib.
8. Simpan.
9. Event muncul di bagian Event Mendatang pada Home selama:
   - konten sudah diterbitkan;
   - `is_event = true`;
   - tanggal event belum lewat, atau tanggal event belum diisi.

Untuk berita/informasi biasa, admin juga dapat mencentang opsi Event pada form normal.

---

## 8. Alur Upload Gambar

Komponen upload reusable berada di:

```text
resources/views/admin/partials/_img_upload.blade.php
```

Alurnya:

```text
Admin memilih gambar
        |
        v
JavaScript mengirim file ke /admin/upload
        |
        v
UploadController memvalidasi dan menyimpan file
        |
        v
URL gambar dikembalikan
        |
        v
URL disimpan ke database
```

Agar gambar dapat tampil, jalankan:

```bash
php artisan storage:link
```

Gambar bersifat opsional untuk berita, informasi, event, dan setting yang tidak membutuhkan ilustrasi.

---

## 9. Cache Setting

`SiteSetting` memakai cache permanen per key.

Saat admin menyimpan setting, method `SiteSetting::set()` melakukan:

1. update database;
2. menghapus cache untuk key tersebut;
3. halaman berikutnya membaca nilai terbaru.

Jika perubahan setting belum terlihat, jalankan:

```bash
php artisan optimize:clear
```

---

## 10. Cara Mengubah Konten Tanpa Mengubah UI

Gunakan database setting jika yang berubah hanya:

- judul;
- subtitle;
- label;
- deskripsi;
- nomor WhatsApp;
- URL;
- foto;
- angka statistik.

Jangan mengubah Blade jika kebutuhan hanya perubahan tulisan.

Ubah Blade hanya jika:

- layout baru dibutuhkan;
- field baru harus ditampilkan;
- alur data berubah;
- ada modul baru.

Prinsip project:

```text
Perubahan isi = CMS/database
Perubahan struktur = Controller/Model/migration/Blade
Perubahan tampilan = Blade/CSS
```

---

# 11. Pola Membuat CMS Posyandu

CMS Posyandu dapat memakai pola yang sama, tetapi isi dan model datanya disesuaikan.

## A. Modul publik Posyandu

Contoh halaman:

| Halaman | Isi |
|---|---|
| Home | informasi utama, jadwal terdekat, pengumuman |
| Profil | profil Posyandu, visi, misi, kader |
| Layanan | jenis layanan kesehatan yang tersedia |
| Jadwal | jadwal Posyandu per bulan |
| Berita | berita dan kegiatan Posyandu |
| Informasi | pengumuman untuk warga |
| Kontak | alamat, WhatsApp, jam pelayanan |

## B. Modul admin Posyandu

Contoh menu admin:

- Kelola Berita
- Kelola Pengumuman
- Kelola Jadwal Posyandu
- Kelola Kader
- Kelola Layanan Kesehatan
- Kelola Data Balita
- Kelola Data Ibu Hamil
- Kelola Data Lansia
- Kelola Home
- Kelola Profil
- Kelola Kontak
- Akun Admin

## C. Mapping dari CMS RW ke CMS Posyandu

| CMS RW Palem | CMS Posyandu |
|---|---|
| `Post` | Berita, pengumuman, edukasi kesehatan |
| `is_event` | Jadwal kegiatan atau pemeriksaan |
| `event_date` | Tanggal pelayanan Posyandu |
| `OrgMember` | Kader Posyandu dan petugas |
| `SiteSetting` | Identitas Posyandu, kontak, teks halaman |
| `CarouselItem` | Banner kegiatan atau kampanye kesehatan |
| `Layanan` | Imunisasi, penimbangan, pemeriksaan, konsultasi |

## D. Modul Jadwal yang disarankan

Untuk jadwal Posyandu, lebih baik menggunakan tabel khusus daripada hanya memakai `posts` jika datanya akan sering dipakai untuk laporan.

Contoh tabel `schedules`:

```text
id
service_id
title
schedule_date
start_time
end_time
location
status
notes
created_at
updated_at
```

Contoh data:

```text
Judul: Penimbangan Balita Bulanan
Tanggal: 2026-09-15
Jam: 08:00 - 11:00
Lokasi: Balai RW 09
Status: aktif
```

Untuk kebutuhan sederhana, jadwal dapat memakai pola `posts + is_event`. Untuk kebutuhan serius, gunakan tabel `schedules` khusus.

## E. Modul data kesehatan

Data kesehatan sebaiknya tidak dicampur dengan tabel berita.

Contoh tabel terpisah:

```text
patients
- id
- name
- birth_date
- gender
- address
- phone
- category

health_records
- id
- patient_id
- record_date
- weight
- height
- blood_pressure
- immunization
- notes
- recorded_by
```

Kategori pasien dapat berupa:

- balita;
- ibu hamil;
- remaja;
- lansia.

### Catatan privasi

Data kesehatan adalah data sensitif. CMS Posyandu harus memiliki:

- login admin yang kuat;
- pembatasan akses berdasarkan peran;
- audit log;
- backup database;
- HTTPS saat dipasang online;
- larangan menampilkan data pasien di halaman publik;
- validasi dan sanitasi input;
- kebijakan penghapusan data.

Halaman publik hanya menampilkan informasi umum, bukan identitas dan rekam kesehatan warga.

---

# 12. Pola Database untuk CMS Posyandu

Gunakan tabel terpisah jika datanya memiliki aturan bisnis berbeda.

```text
site_settings       teks dan konfigurasi website
posts               berita, informasi, edukasi kesehatan
carousel_items      banner Home
staff_members       kader dan petugas
services            jenis layanan Posyandu
schedules           jadwal pelayanan
patients            data warga/pasien
health_records      hasil pemeriksaan
users               akun admin
```

Jangan memasukkan semua jenis data ke `site_settings` atau `posts` hanya karena lebih cepat. `site_settings` cocok untuk teks konfigurasi, sedangkan data operasional membutuhkan tabel dan relasi sendiri.

---

# 13. Pola Implementasi Fitur Baru

Setiap fitur baru sebaiknya dibuat dengan urutan berikut:

1. Tentukan apakah fitur hanya teks atau membutuhkan data terstruktur.
2. Jika hanya teks, tambahkan `SiteSetting`.
3. Jika data terstruktur, buat Model dan migration.
4. Buat Controller admin untuk CRUD.
5. Tambahkan route admin dengan middleware `auth`.
6. Buat form Blade admin.
7. Buat halaman publik atau komponen Home.
8. Tambahkan validasi input.
9. Tambahkan fallback jika data kosong.
10. Jalankan migration dan validasi.

Contoh fitur jadwal:

```text
Migration schedules
        |
        v
Model Schedule
        |
        v
Admin ScheduleController
        |
        v
admin/schedules/index.blade.php
admin/schedules/_form.blade.php
        |
        v
PublicContentController::home()
        |
        v
resources/views/index.blade.php
```

---

# 14. Checklist Sebelum Mengubah Project

Sebelum mengedit, AI atau developer harus memahami:

- file mana yang mengontrol halaman;
- data berasal dari tabel apa;
- apakah UI harus dipertahankan;
- apakah perubahan hanya konten atau juga struktur;
- apakah field baru wajib atau opsional;
- apakah data lama harus dimigrasikan;
- apakah route publik perlu dibuat;
- apakah admin perlu menu baru;
- apakah ada data sensitif.

Untuk permintaan seperti “ubah teks”, jangan langsung mengubah desain.

Untuk permintaan seperti “tambahkan jadwal”, jangan hanya menaruh teks hardcoded di Blade.

---

# 15. Validasi Setelah Perubahan

Perintah validasi utama:

```bash
php artisan migrate
php artisan view:cache
php artisan route:list
php -l app/Http/Controllers/NamaController.php
php artisan test
```

Jika mengubah JavaScript atau CSS:

```bash
npm run build
```

Jika perubahan tidak terlihat:

```bash
php artisan optimize:clear
```

---

# 16. Instruksi Konteks untuk AI di Project Posyandu

Gunakan teks berikut sebagai konteks awal untuk AI:

```text
Project ini adalah CMS website Posyandu berbasis Laravel.

Gunakan pola MVC Laravel yang sudah ada. Website publik membaca data dari Controller dan menampilkannya melalui Blade. Panel admin berada di bawah /admin dan semua rutenya harus dilindungi middleware auth.

Gunakan SiteSetting untuk teks, label, URL, nomor kontak, dan gambar yang dapat diedit admin tanpa coding. Gunakan Model + migration + Controller CRUD untuk data terstruktur seperti jadwal, kader, layanan kesehatan, pasien, dan rekam pemeriksaan.

Pertahankan UI yang sudah ada kecuali saya secara eksplisit meminta perubahan desain. Jika saya meminta mengubah konten, ubah database setting/seeder, bukan layout Blade. Jika menambah field, perbarui migration, Model fillable/casts, validasi Controller, form admin, dan tampilan publik.

Data kesehatan dan identitas pasien bersifat privat. Jangan tampilkan data pasien di halaman publik. Selalu tambahkan validasi, pembatasan akses, dan fallback saat data kosong.

Sebelum mengedit, telusuri route, Controller, Model, migration, view admin, dan view publik yang terkait. Setelah mengedit, jalankan php artisan migrate, php artisan view:cache, php artisan route:list, lint PHP, dan test yang relevan.
```

---

# 17. Ringkasan Prinsip

```text
CMS = data di database + form admin + tampilan publik

Teks sederhana        -> SiteSetting
Artikel/pengumuman    -> Post
Event sederhana       -> Post + is_event
Jadwal terstruktur    -> Schedule
Kader/petugas         -> StaffMember
Pasien                -> Patients
Rekam kesehatan      -> HealthRecords
Gambar/banner         -> Upload + URL/path
Akses admin           -> auth middleware
Data sensitif         -> halaman privat dan role-based access
```

Prinsip paling penting:

> Jangan membuat konten penting secara hardcoded di Blade jika admin perlu mengubahnya. Simpan sebagai data CMS, ambil melalui Controller, lalu tampilkan dengan fallback yang aman.
