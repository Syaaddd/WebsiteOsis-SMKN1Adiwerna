# OSSAKA — Website Resmi OSIS SMK Negeri 1 Adiwerna

Website resmi **OSSAKA** (Organisasi Siswa Intra Sekolah SMK Negeri 1 Adiwerna, Kabupaten Tegal). Dibangun menggunakan PHP murni dengan arsitektur MVC custom, tanpa framework eksternal.

---

## Fitur Utama

**Halaman Publik**
- Beranda — hero dinamis dengan statistik yang dapat diubah dari admin
- Berita & Pengumuman — artikel dengan kategori dan thumbnail
- Kegiatan — agenda dan dokumentasi kegiatan OSIS
- Pengurus — profil struktur pengurus OSSAKA
- Galeri — galeri foto kegiatan dengan lightbox
- Tentang — profil organisasi
- Kontak & Aspirasi — formulir aspirasi anonim

**Panel Admin**
- Dashboard — ringkasan statistik konten
- Manajemen Berita — tambah, edit, hapus artikel dengan upload thumbnail
- Manajemen Pengurus — data pengurus dengan foto
- Manajemen Bidang / Sekbid — bidang-bidang OSIS
- Manajemen Galeri — upload dan kelola foto
- Aspirasi — baca dan kelola pesan masuk
- Pengaturan — statistik hero, info website, dan tautan media sosial

---

## Teknologi

| Komponen | Keterangan |
|---|---|
| Backend | PHP 8.x (native, tanpa framework) |
| Database | MySQL 8 via MySQLi |
| Arsitektur | MVC custom |
| Web Server | Apache (XAMPP) |
| CSS | Custom design system — Biru + Merah + Putih |
| Font | [Oswald](https://fonts.google.com/specimen/Oswald) + [DM Sans](https://fonts.google.com/specimen/DM+Sans) |
| Ikon | Font Awesome 6.5.0 |

---

## Instalasi

### Prasyarat
- XAMPP (PHP 8.0+ dan MySQL 8.0+)
- Browser modern

### Langkah

**1. Clone / salin project ke folder XAMPP**
```
C:\xampp\htdocs\OsisADB\
```

**2. Buat database**

Buka phpMyAdmin (`http://localhost/phpmyadmin`), kemudian jalankan file SQL:
```
database/ossaka.sql
```

Atau melalui terminal MySQL:
```bash
mysql -u root -p < database/ossaka.sql
```

**3. Sesuaikan konfigurasi** (jika perlu)

Edit `config/database.php`:
```php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');        // sesuaikan password MySQL Anda
define('DB_NAME', 'ossaka_db');
```

Edit `config/app.php` jika nama folder berbeda:
```php
define('BASE_URL', 'http://localhost/OsisADB/public');
define('ROOT_URL',  'http://localhost/OsisADB');
```

**4. Akses website**
```
http://localhost/OsisADB/public
```

**5. Akses panel admin**
```
http://localhost/OsisADB/public/admin
```

| Field | Value |
|---|---|
| Username | `admin` |
| Password | `ossaka2025` |

---

## Struktur Direktori

```
OsisADB/
├── app/
│   ├── controllers/
│   │   ├── AdminController.php          # Login, logout, dashboard
│   │   ├── AdminPostController.php      # CRUD berita
│   │   ├── AdminPengurusController.php  # CRUD pengurus
│   │   ├── AdminBidangController.php    # CRUD bidang/sekbid
│   │   ├── AdminGaleriController.php    # Upload & hapus galeri
│   │   ├── AdminAspirasiController.php  # Kelola aspirasi
│   │   ├── AdminPengaturanController.php# Pengaturan website
│   │   ├── BerandaController.php
│   │   ├── BeritaController.php
│   │   ├── KegiatanController.php
│   │   ├── PengurusController.php
│   │   ├── GaleriController.php
│   │   ├── KontakController.php
│   │   └── TentangController.php
│   ├── models/
│   │   ├── Post.php
│   │   ├── Pengurus.php
│   │   ├── Galeri.php
│   │   ├── Aspirasi.php
│   │   ├── Bidang.php
│   │   └── Pengaturan.php   # Model key-value untuk pengaturan & hero stats
│   └── views/
│       ├── layouts/
│       │   └── main.php     # Layout utama (navbar + footer)
│       ├── beranda/
│       ├── berita/
│       ├── kegiatan/
│       ├── pengurus/
│       ├── galeri/
│       ├── kontak/
│       ├── tentang/
│       └── admin/
│           ├── partials/    # header.php (sidebar), footer.php
│           ├── posts/
│           ├── pengurus/
│           ├── bidang/
│           ├── galeri/
│           ├── aspirasi/
│           └── pengaturan/  # Halaman pengaturan website
├── core/
│   ├── Controller.php       # Base controller (view, redirect, requireAdmin)
│   ├── Database.php         # Singleton MySQLi wrapper
│   └── Router.php           # Simple regex router
├── config/
│   ├── app.php              # BASE_URL, ROOT_URL, konstanta path
│   └── database.php         # Kredensial database
├── public/
│   ├── index.php            # Front controller + pendaftaran route
│   ├── .htaccess            # URL rewriting
│   ├── css/
│   │   └── style.css        # Design system (variabel CSS + semua komponen)
│   ├── js/
│   │   └── main.js
│   └── uploads/             # Foto yang diupload (thumbnail, galeri, pengurus)
├── img/
│   └── logo.png             # Logo OSSAKA (tampil di navbar & login)
├── database/
│   └── ossaka.sql           # Schema + seed data lengkap
└── README.md
```

---

## Skema Database

| Tabel | Keterangan |
|---|---|
| `users` | Akun admin (username, password_hash, role) |
| `posts` | Artikel berita, pengumuman, kegiatan, prestasi |
| `pengurus` | Data pengurus OSIS beserta foto |
| `bidang` | Bidang / seksi bidang OSIS |
| `galeri` | File foto kegiatan |
| `aspirasi` | Pesan aspirasi dari pengunjung |
| `pengaturan` | Pasangan key-value untuk pengaturan situs |

### Tabel `pengaturan` — Key yang Tersedia

| Key | Keterangan | Default |
|---|---|---|
| `nama_site` | Nama website (tampil di tab browser) | `OSSAKA – SMKN 1 Adiwerna` |
| `deskripsi` | Deskripsi singkat organisasi | — |
| `instagram` | URL akun Instagram | `https://instagram.com/ossaka_osis.adb` |
| `youtube` | URL channel YouTube | `https://www.youtube.com/@OssakaTV` |
| `facebook` | URL halaman Facebook | — |
| `tiktok` | URL akun TikTok | — |
| `stat_1_num` | Angka statistik hero ke-1 | `38+` |
| `stat_1_label` | Label statistik hero ke-1 | `Anggota Aktif` |
| `stat_2_num` | Angka statistik hero ke-2 | `12` |
| `stat_2_label` | Label statistik hero ke-2 | `Kegiatan / Tahun` |
| `stat_3_num` | Angka statistik hero ke-3 | `50+` |
| `stat_3_label` | Label statistik hero ke-3 | `Prestasi` |

---

## Design System

Palet warna mengacu pada bendera Indonesia — **Merah, Putih, Biru**.

```css
/* BIRU — dominan, kesan resmi & profesional */
--biru-gelap:  #1338A8;   /* navbar, header, sidebar admin */
--biru-utama:  #1A56DB;   /* hero background, tombol sekunder */
--biru-terang: #3B82F6;   /* link, aksen */
--biru-muda:   #DBEAFE;   /* badge background, info bg */

/* MERAH — aksen tegas, CTA, energi */
--merah:       #DC2626;   /* tombol utama, badge penting, active state */
--merah-gelap: #991B1B;   /* hover merah */
--merah-muda:  #FEE2E2;   /* background badge merah */

/* NETRAL */
--putih:       #FFFFFF;
--abu:         #F8FAFC;   /* background halaman */
--teks:        #1E293B;
--teks-muted:  #475569;
--teks-hint:   #94A3B8;
```

Font:
- **Oswald** — judul, heading, navbar brand, label section
- **DM Sans** — body text, form, konten artikel

---

## Cara Mengubah Statistik Hero

1. Login ke admin panel: `/admin`
2. Klik **Pengaturan** di sidebar
3. Edit angka dan label pada bagian **Statistik Hero**
4. Klik **Simpan Pengaturan**

Perubahan langsung tampil di halaman utama tanpa perlu mengubah kode.

---

## Mengganti Password Admin

Jalankan query berikut di phpMyAdmin, ganti `PASSWORD_BARU` dengan password yang diinginkan:

```sql
UPDATE users
SET password_hash = '$2y$10$' -- gunakan PHP untuk generate hash
WHERE username = 'admin';
```

Atau buat hash baru dengan PHP:
```php
echo password_hash('PASSWORD_BARU', PASSWORD_BCRYPT);
```

Lalu update langsung:
```sql
UPDATE users SET password_hash = '<hash_result>' WHERE username = 'admin';
```

---

## Lisensi

Dibuat untuk keperluan internal OSSAKA — SMK Negeri 1 Adiwerna, Kabupaten Tegal.  
&copy; 2025 OSSAKA. All rights reserved.
