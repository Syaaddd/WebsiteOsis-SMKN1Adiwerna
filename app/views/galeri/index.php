<?php $pageTitle = 'Galeri Kegiatan'; ?>

<div style="background:linear-gradient(135deg,var(--dark-blue),var(--primary));padding:60px 0;color:#fff;text-align:center">
  <div class="container">
    <h1 style="font-size:2.2rem;font-weight:800">Galeri Kegiatan</h1>
    <p style="opacity:.85;margin-top:8px">Dokumentasi kegiatan OSSAKA SMK Negeri 1 Adiwerna</p>
  </div>
</div>

<section class="section">
  <div class="container">
    <?php if (!empty($foto)): ?>
    <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(280px,1fr));gap:16px">
      <?php foreach ($foto as $f): ?>
      <div class="galeri-item" style="aspect-ratio:4/3">
        <img src="<?= BASE_URL ?>/uploads/<?= htmlspecialchars($f['file_path']) ?>" alt="<?= htmlspecialchars($f['judul']) ?>">
        <div class="overlay"><i class="fas fa-search-plus"></i></div>
      </div>
      <?php endforeach; ?>
    </div>
    <?php else: ?>
    <div style="text-align:center;padding:80px;color:var(--gray)">
      <i class="fas fa-images" style="font-size:4rem;opacity:.2;display:block;margin-bottom:20px"></i>
      <p>Belum ada foto di galeri.</p>
    </div>
    <?php endif; ?>

    <!-- OSSAKA TV -->
    <div style="margin-top:60px">
      <div class="section-header">
        <h2>OSSAKA TV</h2>
        <p>Tonton video kegiatan kami di YouTube</p>
        <div class="underline"></div>
      </div>
      <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(300px,1fr));gap:20px;margin-top:30px">
        <div style="border-radius:var(--radius);overflow:hidden;box-shadow:var(--card-shadow)">
          <div style="background:var(--bg-blue);padding:60px;text-align:center;color:var(--primary)">
            <i class="fab fa-youtube" style="font-size:4rem;color:#FF0000"></i>
            <p style="margin-top:12px;font-weight:600">OSSAKA TV</p>
            <a href="https://www.youtube.com/@OssakaTV" target="_blank" class="btn btn-primary btn-sm" style="margin-top:12px;display:inline-block">Kunjungi Channel</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
