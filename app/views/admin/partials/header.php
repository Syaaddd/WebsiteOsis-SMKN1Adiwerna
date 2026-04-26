<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel – OSSAKA</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>/css/style.css">
</head>
<body>
<div class="admin-wrapper">
  <!-- SIDEBAR -->
  <aside class="admin-sidebar">
    <div class="brand" style="display:flex;align-items:center;gap:10px">
      <img src="<?= ROOT_URL ?>/img/logo.png" alt="Logo" style="width:36px;height:36px;border-radius:50%;object-fit:cover;border:2px solid var(--red);flex-shrink:0">
      <span>OSSAKA Admin</span>
    </div>
    <nav>
      <ul>
        <li><a href="<?= BASE_URL ?>/admin/dashboard" <?= strpos($_SERVER['REQUEST_URI'],'dashboard')!==false?'class="active"':'' ?>><i class="fas fa-tachometer-alt" style="width:20px"></i> Dashboard</a></li>
        <li><a href="<?= BASE_URL ?>/admin/posts" <?= strpos($_SERVER['REQUEST_URI'],'posts')!==false?'class="active"':'' ?>><i class="fas fa-newspaper" style="width:20px"></i> Berita</a></li>
        <li><a href="<?= BASE_URL ?>/admin/pengurus" <?= strpos($_SERVER['REQUEST_URI'],'pengurus')!==false?'class="active"':'' ?>><i class="fas fa-users" style="width:20px"></i> Pengurus</a></li>
        <li><a href="<?= BASE_URL ?>/admin/bidang" <?= strpos($_SERVER['REQUEST_URI'],'bidang')!==false?'class="active"':'' ?>><i class="fas fa-layer-group" style="width:20px"></i> Bidang / Sekbid</a></li>
        <li><a href="<?= BASE_URL ?>/admin/galeri" <?= strpos($_SERVER['REQUEST_URI'],'galeri')!==false?'class="active"':'' ?>><i class="fas fa-images" style="width:20px"></i> Galeri</a></li>
        <li><a href="<?= BASE_URL ?>/admin/aspirasi" <?= strpos($_SERVER['REQUEST_URI'],'aspirasi')!==false?'class="active"':'' ?>><i class="fas fa-envelope" style="width:20px"></i> Aspirasi</a></li>
        <li><a href="<?= BASE_URL ?>/admin/pengaturan" <?= strpos($_SERVER['REQUEST_URI'],'pengaturan')!==false?'class="active"':'' ?>><i class="fas fa-cog" style="width:20px"></i> Pengaturan</a></li>
        <li style="margin-top:20px;border-top:1px solid rgba(255,255,255,.1);padding-top:12px">
          <a href="<?= BASE_URL ?>" target="_blank"><i class="fas fa-external-link-alt" style="width:20px"></i> Lihat Website</a>
        </li>
        <li><a href="<?= BASE_URL ?>/admin/logout"><i class="fas fa-sign-out-alt" style="width:20px"></i> Logout</a></li>
      </ul>
    </nav>
  </aside>
  <main class="admin-main">
