<?php $pageTitle = 'Berita & Pengumuman'; ?>

<div style="background:linear-gradient(135deg,var(--dark-blue),var(--primary));padding:60px 0;color:#fff;text-align:center">
  <div class="container">
    <h1 style="font-size:2.2rem;font-weight:800">Berita & Pengumuman</h1>
    <p style="opacity:.85;margin-top:8px">Informasi terkini kegiatan OSSAKA</p>
  </div>
</div>

<section class="section">
  <div class="container">
    <!-- Filter Kategori -->
    <div style="display:flex;gap:10px;margin-bottom:36px;flex-wrap:wrap">
      <?php $cats = [''=>'Semua','berita'=>'Berita','pengumuman'=>'Pengumuman','prestasi'=>'Prestasi','akademik'=>'Akademik']; ?>
      <?php foreach ($cats as $k=>$v): ?>
      <a href="<?= BASE_URL ?>/berita<?= $k ? '?kategori='.$k : '' ?>"
         style="padding:8px 20px;border-radius:20px;font-size:.85rem;font-weight:600;
                background:<?= ($kategori===$k||($k===''&&!$kategori)) ? 'var(--primary)' : 'var(--bg-blue)' ?>;
                color:<?= ($kategori===$k||($k===''&&!$kategori)) ? '#fff' : 'var(--primary)' ?>">
        <?= $v ?>
      </a>
      <?php endforeach; ?>
    </div>

    <div class="grid-3">
      <?php if (!empty($berita)): foreach ($berita as $b): ?>
      <div class="berita-card">
        <?php if ($b['thumbnail']): ?>
          <img src="<?= BASE_URL ?>/uploads/<?= htmlspecialchars($b['thumbnail']) ?>" alt="<?= htmlspecialchars($b['judul']) ?>">
        <?php else: ?>
          <div class="card-img-placeholder"><i class="fas fa-newspaper"></i></div>
        <?php endif; ?>
        <div class="card-body">
          <span class="badge"><?= ucfirst($b['kategori'] ?? 'berita') ?></span>
          <h3><?= htmlspecialchars($b['judul']) ?></h3>
          <p class="meta"><?= date('d M Y', strtotime($b['created_at'])) ?>
            <?php if ($b['penulis']): ?> &nbsp;·&nbsp; <?= htmlspecialchars($b['penulis']) ?><?php endif; ?></p>
          <a href="<?= BASE_URL ?>/berita/<?= $b['slug'] ?>" class="read-more">Baca Selengkapnya →</a>
        </div>
      </div>
      <?php endforeach; else: ?>
      <div style="grid-column:1/-1;text-align:center;padding:60px;color:var(--gray)">
        <i class="fas fa-newspaper" style="font-size:4rem;opacity:.2;display:block;margin-bottom:16px"></i>
        Belum ada berita untuk kategori ini.
      </div>
      <?php endif; ?>
    </div>
  </div>
</section>
