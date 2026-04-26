<?php $pageTitle = 'Struktur Pengurus'; ?>

<div style="background:linear-gradient(135deg,var(--dark-blue),var(--primary));padding:60px 0;color:#fff;text-align:center">
  <div class="container">
    <h1 style="font-size:2.2rem;font-weight:800">Struktur Pengurus OSSAKA</h1>
    <p style="opacity:.85;margin-top:8px">Periode <?= date('Y') ?>/<?= date('Y')+1 ?></p>
  </div>
</div>

<section class="section">
  <div class="container">
    <?php
    $labelBidang = [
      'inti'     => 'Pengurus Inti',
      'akademik' => 'Bidang Akademik',
      'olahraga' => 'Bidang Olahraga',
      'seni'     => 'Bidang Seni & Budaya',
      'lingkungan'=>'Bidang Lingkungan',
      'teknologi'=>'Bidang Teknologi',
    ];
    if (!empty($grouped)):
      foreach ($grouped as $bidang => $members):
        $label = $labelBidang[$bidang] ?? ucfirst($bidang);
    ?>
    <div style="margin-bottom:50px">
      <h2 style="color:var(--primary);margin-bottom:24px;padding-bottom:12px;border-bottom:2px solid var(--bg-blue)"><?= $label ?></h2>
      <div class="grid-3" style="grid-template-columns:repeat(auto-fill,minmax(220px,1fr))">
        <?php foreach ($members as $p): ?>
        <div class="pengurus-card">
          <?php if ($p['foto']): ?>
            <img src="<?= BASE_URL ?>/uploads/<?= htmlspecialchars($p['foto']) ?>" alt="<?= htmlspecialchars($p['nama']) ?>">
          <?php else: ?>
            <div class="pgr-img-placeholder"><i class="fas fa-user-circle"></i></div>
          <?php endif; ?>
          <div class="pgr-body">
            <h3><?= htmlspecialchars($p['nama']) ?></h3>
            <span><?= htmlspecialchars($p['jabatan']) ?></span>
            <?php if ($p['kelas']): ?><br><span style="font-size:.78rem;color:var(--accent)"><?= htmlspecialchars($p['kelas']) ?></span><?php endif; ?>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
    <?php endforeach; else: ?>
    <div style="text-align:center;padding:80px;color:var(--gray)">
      <i class="fas fa-users" style="font-size:4rem;opacity:.2;display:block;margin-bottom:20px"></i>
      <p>Data pengurus belum ditambahkan. Login ke <a href="<?= BASE_URL ?>/admin" style="color:var(--primary)">panel admin</a> untuk menambahkan.</p>
    </div>
    <?php endif; ?>
  </div>
</section>
