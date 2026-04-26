<?php $pageTitle = htmlspecialchars($artikel['judul']); ?>

<div style="background:linear-gradient(135deg,var(--dark-blue),var(--primary));padding:50px 0;color:#fff;text-align:center">
  <div class="container">
    <span style="background:var(--accent);padding:4px 14px;border-radius:20px;font-size:.8rem;font-weight:600"><?= ucfirst($artikel['kategori']) ?></span>
    <h1 style="font-size:clamp(1.4rem,3vw,2rem);margin-top:14px;max-width:700px;margin-inline:auto"><?= htmlspecialchars($artikel['judul']) ?></h1>
    <p style="opacity:.8;margin-top:10px;font-size:.9rem">
      <i class="fas fa-calendar"></i> <?= date('d F Y', strtotime($artikel['created_at'])) ?>
      <?php if ($artikel['penulis']): ?> &nbsp;·&nbsp; <i class="fas fa-user"></i> <?= htmlspecialchars($artikel['penulis']) ?><?php endif; ?>
    </p>
  </div>
</div>

<section class="section">
  <div class="container" style="max-width:860px">
    <?php if ($artikel['thumbnail']): ?>
    <img src="<?= BASE_URL ?>/uploads/<?= htmlspecialchars($artikel['thumbnail']) ?>" alt="<?= htmlspecialchars($artikel['judul']) ?>" style="width:100%;border-radius:var(--radius);margin-bottom:36px;max-height:420px;object-fit:cover">
    <?php endif; ?>

    <div style="background:#fff;border-radius:var(--radius);padding:40px;box-shadow:var(--card-shadow);line-height:1.9;font-size:.97rem;color:var(--text-body)">
      <?= nl2br(htmlspecialchars($artikel['konten'])) ?>
    </div>

    <div style="margin-top:32px">
      <a href="<?= BASE_URL ?>/berita" style="color:var(--primary);font-weight:600"><i class="fas fa-arrow-left"></i> Kembali ke Berita</a>
    </div>

    <?php if (!empty($terkait)): ?>
    <h3 style="margin-top:48px;margin-bottom:24px;color:var(--text-dark)">Berita Terkait</h3>
    <div class="grid-3">
      <?php foreach (array_slice($terkait,0,3) as $t): if ($t['slug']===$artikel['slug']) continue; ?>
      <div class="berita-card">
        <?php if ($t['thumbnail']): ?>
          <img src="<?= BASE_URL ?>/uploads/<?= htmlspecialchars($t['thumbnail']) ?>" alt="">
        <?php else: ?>
          <div class="card-img-placeholder"><i class="fas fa-newspaper"></i></div>
        <?php endif; ?>
        <div class="card-body">
          <h3><?= htmlspecialchars($t['judul']) ?></h3>
          <a href="<?= BASE_URL ?>/berita/<?= $t['slug'] ?>" class="read-more">Baca →</a>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>
  </div>
</section>
