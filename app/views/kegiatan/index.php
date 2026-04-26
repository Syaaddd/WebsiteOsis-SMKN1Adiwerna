<?php $pageTitle = 'Kegiatan & Program Kerja'; ?>

<div style="background:linear-gradient(135deg,var(--dark-blue),var(--primary));padding:60px 0;color:#fff;text-align:center">
  <div class="container">
    <h1 style="font-size:2.2rem;font-weight:800">Kegiatan & Program Kerja</h1>
    <p style="opacity:.85;margin-top:8px">Program unggulan OSSAKA SMK Negeri 1 Adiwerna</p>
  </div>
</div>

<section class="section">
  <div class="container">
    <!-- Program Kerja Tetap -->
    <div class="section-header">
      <h2>Program Kerja OSSAKA</h2>
      <p>Kegiatan rutin yang diselenggarakan setiap tahun</p>
      <div class="underline"></div>
    </div>

    <?php
    $proker = [
      ['icon'=>'🎭','nama'=>'PENSI (Pentas Seni)','desc'=>'Ajang ekspresi seni dan kreativitas siswa SMKN 1 Adiwerna','waktu'=>'Semester Genap'],
      ['icon'=>'🏅','nama'=>'Class Meeting','desc'=>'Lomba antar kelas: voli, futsal, badminton, dan kreativitas','waktu'=>'Akhir Semester'],
      ['icon'=>'🎗','nama'=>'Hari Olahraga Nasional','desc'=>'Peringatan Haornas dengan senam bersama dan lomba olahraga','waktu'=>'September'],
      ['icon'=>'🌱','nama'=>'Bakti Lingkungan','desc'=>'Kegiatan penghijauan dan kebersihan lingkungan sekolah','waktu'=>'Kondisional'],
      ['icon'=>'🧑‍🎓','nama'=>'MPLS','desc'=>'Masa Pengenalan Lingkungan Sekolah untuk siswa baru','waktu'=>'Awal Tahun Ajaran'],
      ['icon'=>'📚','nama'=>'Seminar & Workshop','desc'=>'Pengembangan diri, kepemimpinan, dan keterampilan siswa','waktu'=>'Kondisional'],
    ];
    ?>
    <div class="grid-3" style="margin-bottom:60px">
      <?php foreach ($proker as $p): ?>
      <div class="berita-card" style="cursor:default">
        <div class="card-img-placeholder" style="height:120px;font-size:3rem"><?= $p['icon'] ?></div>
        <div class="card-body">
          <span class="badge"><?= $p['waktu'] ?></span>
          <h3><?= $p['nama'] ?></h3>
          <p style="font-size:.85rem;color:var(--gray);margin-top:6px"><?= $p['desc'] ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>

    <!-- Berita Kegiatan -->
    <?php if (!empty($kegiatan)): ?>
    <div class="section-header">
      <h2>Laporan Kegiatan</h2>
      <div class="underline"></div>
    </div>
    <div class="grid-3">
      <?php foreach ($kegiatan as $k): ?>
      <div class="berita-card">
        <?php if ($k['thumbnail']): ?>
          <img src="<?= BASE_URL ?>/uploads/<?= htmlspecialchars($k['thumbnail']) ?>" alt="<?= htmlspecialchars($k['judul']) ?>">
        <?php else: ?>
          <div class="card-img-placeholder"><i class="fas fa-calendar-check"></i></div>
        <?php endif; ?>
        <div class="card-body">
          <span class="badge">Kegiatan</span>
          <h3><?= htmlspecialchars($k['judul']) ?></h3>
          <p class="meta"><?= date('d M Y', strtotime($k['created_at'])) ?></p>
          <a href="<?= BASE_URL ?>/berita/<?= $k['slug'] ?>" class="read-more">Baca Selengkapnya →</a>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>
  </div>
</section>
