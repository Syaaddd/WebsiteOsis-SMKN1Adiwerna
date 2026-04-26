<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= isset($pageTitle) ? htmlspecialchars($pageTitle) . ' – ' : '' ?><?= SITE_NAME ?></title>
  <meta name="description" content="Website resmi OSSAKA – Organisasi Siswa Intra Sekolah SMK Negeri 1 Adiwerna, Kabupaten Tegal.">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;1,9..40,400&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>/css/style.css?v=<?= filemtime($_SERVER['DOCUMENT_ROOT'] . '/OsisADB/public/css/style.css') ?>">
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar">
  <a href="<?= BASE_URL ?>" class="navbar-brand">
    <img src="<?= ROOT_URL ?>/img/logo.png" alt="Logo OSSAKA" class="navbar-logo">
    OSSAKA
  </a>
  <button class="nav-toggle" aria-label="Menu"><i class="fas fa-bars"></i></button>
  <ul class="nav-links">
    <li><a href="<?= BASE_URL ?>">Beranda</a></li>
    <li><a href="<?= BASE_URL ?>/berita">Berita</a></li>
    <li><a href="<?= BASE_URL ?>/kegiatan">Kegiatan</a></li>
    <li><a href="<?= BASE_URL ?>/pengurus">Pengurus</a></li>
    <li><a href="<?= BASE_URL ?>/galeri">Galeri</a></li>
    <li><a href="<?= BASE_URL ?>/tentang">Tentang</a></li>
    <li><a href="<?= BASE_URL ?>/kontak">Kontak</a></li>
  </ul>
  <a href="<?= BASE_URL ?>/admin" class="navbar-admin"><i class="fas fa-lock" style="margin-right:6px;font-size:.8rem"></i>Admin</a>
</nav>

<!-- PAGE CONTENT -->
<?= $content ?>

<!-- FOOTER -->
<footer>
  <div class="footer-top-stripe"></div>
  <div class="container">
    <div class="footer-grid">
      <div>
        <h3><i class="fas fa-circle" style="color:var(--accent);font-size:.6rem;margin-right:6px"></i> OSSAKA</h3>
        <p>Organisasi Siswa Intra Sekolah<br>SMK Negeri 1 Adiwerna<br>Berkarya, Berprestasi, dan Berinovasi.</p>
        <div class="social-links">
          <a href="https://instagram.com/ossaka_osis.adb" target="_blank"><i class="fab fa-instagram"></i></a>
          <a href="https://www.youtube.com/@OssakaTV" target="_blank"><i class="fab fa-youtube"></i></a>
          <a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
          <a href="#" target="_blank"><i class="fab fa-tiktok"></i></a>
        </div>
      </div>
      <div>
        <h3>Navigasi</h3>
        <ul>
          <li><a href="<?= BASE_URL ?>">Beranda</a></li>
          <li><a href="<?= BASE_URL ?>/berita">Berita & Pengumuman</a></li>
          <li><a href="<?= BASE_URL ?>/kegiatan">Kegiatan</a></li>
          <li><a href="<?= BASE_URL ?>/pengurus">Struktur Pengurus</a></li>
          <li><a href="<?= BASE_URL ?>/galeri">Galeri</a></li>
          <li><a href="<?= BASE_URL ?>/kontak">Kontak & Aspirasi</a></li>
        </ul>
      </div>
      <div>
        <h3>Kontak</h3>
        <ul>
          <li><i class="fas fa-map-marker-alt" style="color:var(--accent);margin-right:8px"></i> Jl. Raya 2 PO.BOX.24 KM 7, Adiwerna, Kab. Tegal</li>
          <li style="margin-top:8px"><i class="fab fa-instagram" style="color:var(--accent);margin-right:8px"></i> @ossaka_osis.adb</li>
          <li style="margin-top:8px"><i class="fab fa-youtube" style="color:var(--accent);margin-right:8px"></i> OSSAKA TV</li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom">
      &copy; <?= date('Y') ?> OSSAKA – SMK Negeri 1 Adiwerna. All rights reserved.
      &nbsp;|&nbsp; <a href="<?= BASE_URL ?>/admin" style="color:var(--accent)">Admin Panel</a>
    </div>
  </div>
</footer>

<!-- LIGHTBOX -->
<div class="lightbox" id="lightbox">
  <span class="lightbox-close"><i class="fas fa-times"></i></span>
  <img src="" alt="Foto Kegiatan">
</div>

<script src="<?= BASE_URL ?>/js/main.js"></script>
</body>
</html>
