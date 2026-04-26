-- ============================================================
-- Database: ossaka_db
-- OSSAKA – OSIS SMK Negeri 1 Adiwerna
-- ============================================================

CREATE DATABASE IF NOT EXISTS ossaka_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE ossaka_db;

-- Users (Admin)
CREATE TABLE IF NOT EXISTS users (
  id            INT AUTO_INCREMENT PRIMARY KEY,
  username      VARCHAR(60)  NOT NULL UNIQUE,
  password_hash VARCHAR(255) NOT NULL,
  nama_lengkap  VARCHAR(120) NOT NULL,
  rola          ENUM('admin','editor') DEFAULT 'admin',
  created_at    DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- Posts (Berita & Pengumuman)
CREATE TABLE IF NOT EXISTS posts (
  id         INT AUTO_INCREMENT PRIMARY KEY,
  judul      VARCHAR(255) NOT NULL,
  slug       VARCHAR(255) NOT NULL UNIQUE,
  konten     TEXT         NOT NULL,
  kategori   ENUM('berita','pengumuman','prestasi','akademik','kegiatan') DEFAULT 'berita',
  thumbnail  VARCHAR(255),
  user_id    INT,
  status     ENUM('published','draft') DEFAULT 'published',
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL
) ENGINE=InnoDB;

-- Pengurus
CREATE TABLE IF NOT EXISTS pengurus (
  id       INT AUTO_INCREMENT PRIMARY KEY,
  nama     VARCHAR(120) NOT NULL,
  jabatan  VARCHAR(120) NOT NULL,
  bidang   VARCHAR(60)  DEFAULT 'inti',
  kelas    VARCHAR(40),
  foto     VARCHAR(255),
  periode  YEAR DEFAULT (YEAR(CURDATE()))
) ENGINE=InnoDB;

-- Galeri
CREATE TABLE IF NOT EXISTS galeri (
  id          INT AUTO_INCREMENT PRIMARY KEY,
  judul       VARCHAR(255),
  file_path   VARCHAR(255) NOT NULL,
  kegiatan_id INT,
  created_at  DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- Aspirasi
CREATE TABLE IF NOT EXISTS aspirasi (
  id         INT AUTO_INCREMENT PRIMARY KEY,
  nama       VARCHAR(120) DEFAULT 'Anonim',
  pengirim   VARCHAR(120),
  isi        TEXT NOT NULL,
  status     ENUM('baru','dibaca') DEFAULT 'baru',
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- Bidang OSIS / Sekbid
CREATE TABLE IF NOT EXISTS bidang (
  id     INT AUTO_INCREMENT PRIMARY KEY,
  nama   VARCHAR(100) NOT NULL,
  icon   VARCHAR(20)  DEFAULT '📋',
  slug   VARCHAR(100) NOT NULL UNIQUE,
  urutan INT DEFAULT 0
) ENGINE=InnoDB;

-- Pengaturan
CREATE TABLE IF NOT EXISTS pengaturan (
  `key`   VARCHAR(60)  PRIMARY KEY,
  `value` TEXT
) ENGINE=InnoDB;

-- ============================================================
-- SEED: Admin default  username: admin | password: ossaka2025
-- ============================================================
INSERT INTO users (username, password_hash, nama_lengkap, rola) VALUES
('admin', '$2y$10$uXTL3tcmPOOV3rFOqe7C6O.RcF7DdQV.evDP1PHUikoTNdx0hWKIS', 'Administrator OSSAKA', 'admin');

-- SEED: Pengaturan dasar
INSERT INTO pengaturan (`key`, `value`) VALUES
('nama_site',    'OSSAKA – SMKN 1 Adiwerna'),
('deskripsi',    'Organisasi Siswa Intra Sekolah SMK Negeri 1 Adiwerna'),
('instagram',    'https://instagram.com/ossaka_osis.adb'),
('youtube',      'https://www.youtube.com/@OssakaTV'),
('facebook',     ''),
('tiktok',       ''),
('stat_1_num',   '38+'),
('stat_1_label', 'Anggota Aktif'),
('stat_2_num',   '12'),
('stat_2_label', 'Kegiatan / Tahun'),
('stat_3_num',   '50+'),
('stat_3_label', 'Prestasi');

-- SEED: Contoh berita
INSERT INTO posts (judul, slug, konten, kategori, user_id, status) VALUES
('Selamat Datang di Website Resmi OSSAKA', 'selamat-datang-di-website-ossaka',
'Website resmi OSSAKA SMK Negeri 1 Adiwerna telah resmi diluncurkan! Melalui website ini, seluruh informasi kegiatan, pengumuman, dan program kerja OSIS dapat diakses dengan mudah oleh seluruh warga sekolah.\n\nOSSAKA berkomitmen untuk selalu berinovasi dan memberikan yang terbaik bagi seluruh siswa SMK Negeri 1 Adiwerna.',
'pengumuman', 1, 'published'),
('MPLS 2025 – Masa Pengenalan Lingkungan Sekolah', 'mpls-2025',
'OSSAKA SMK Negeri 1 Adiwerna dengan bangga menyelenggarakan Masa Pengenalan Lingkungan Sekolah (MPLS) 2025. Kegiatan ini bertujuan untuk memperkenalkan lingkungan sekolah, budaya, dan kegiatan OSIS kepada siswa baru.\n\nMPLS 2025 akan berlangsung selama tiga hari dengan berbagai rangkaian kegiatan yang menarik dan edukatif.',
'kegiatan', 1, 'published'),
('Class Meeting Semester Genap 2025', 'class-meeting-semester-genap-2025',
'OSSAKA menyelenggarakan Class Meeting akhir semester genap 2025. Berbagai lomba seru telah disiapkan mulai dari voli, futsal, badminton, hingga lomba kreativitas antar kelas.\n\nYuk ikuti dan tunjukkan semangat juangmu!',
'kegiatan', 1, 'published');

-- SEED: Bidang OSIS default
INSERT INTO bidang (nama, icon, slug, urutan) VALUES
('Pengurus Inti',                    '⭐', 'inti',        0),
('Bidang Akademik',                  '🏆', 'akademik',    1),
('Bidang Olahraga',                  '⚽', 'olahraga',    2),
('Bidang Seni & Budaya',             '🎨', 'seni',        3),
('Bidang Lingkungan Hidup',          '🌿', 'lingkungan',  4),
('Bidang Teknologi & Informasi',     '💻', 'teknologi',   5),
('Bidang Keimanan & Ketaqwaan',      '🕌', 'keimanan',    6),
('Bidang Kebangsaan & Bela Negara',  '🏛', 'kebangsaan',  7),
('Bidang Demokrasi & HAM',           '🗳', 'demokrasi',   8),
('Bidang Publikasi & Dokumentasi',   '📢', 'publikasi',   9);

-- SEED: Contoh pengurus inti
INSERT INTO pengurus (nama, jabatan, bidang, kelas, periode) VALUES
('Ketua OSIS',    'Ketua OSIS',    'inti', 'XII RPL 1', 2025),
('Wakil Ketua 1', 'Wakil Ketua 1', 'inti', 'XII TKJ 2', 2025),
('Sekretaris 1',  'Sekretaris 1',  'inti', 'XI RPL 1',  2025),
('Bendahara 1',   'Bendahara 1',   'inti', 'XI TKJ 1',  2025);
