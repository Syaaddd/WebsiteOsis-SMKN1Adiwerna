<?php $pageTitle = 'Beranda'; ?>

<!-- HERO -->
<section class="hero">
  <div class="container">
    <div class="hero-inner">
      <div class="hero-content">
        <p class="hero-subtitle">Organisasi Siswa Intra Sekolah</p>
        <h1>Selamat Datang di<br><span>OSSAKA STM ADB</span></h1>
        <p>Berkarya, Berprestasi, dan Berinovasi bersama OSIS SMK Negeri 1 Adiwerna Kabupaten Tegal.</p>
        <div class="hero-btns">
          <a href="<?= BASE_URL ?>/kegiatan" class="btn btn-merah"><i class="fas fa-calendar-alt"></i> Kegiatan Kami</a>
          <a href="<?= BASE_URL ?>/tentang" class="btn btn-outline">Tentang OSSAKA →</a>
        </div>
      </div>
      <div class="hero-stats">
        <?php foreach ($heroStats as $stat): ?>
        <div class="hero-stat">
          <span class="hero-stat-num"><?= htmlspecialchars($stat['num']) ?></span>
          <span class="hero-stat-label"><?= htmlspecialchars($stat['label']) ?></span>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
  <div class="hero-stripe"><span></span><span></span><span></span></div>
</section>

<!-- BERITA & PENGUMUMAN -->
<section class="section">
  <div class="container">
    <div class="section-header">
      <h2>Berita & Pengumuman Terbaru</h2>
      <p>Informasi terkini dari OSSAKA SMK Negeri 1 Adiwerna</p>
      <div class="underline"></div>
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
          <p class="meta"><i class="fas fa-calendar" style="margin-right:4px"></i><?= date('d M Y', strtotime($b['created_at'])) ?></p>
          <a href="<?= BASE_URL ?>/berita/<?= $b['slug'] ?>" class="read-more">Baca Selengkapnya →</a>
        </div>
      </div>
      <?php endforeach; else: ?>
      <div style="grid-column:1/-1;text-align:center;padding:40px;color:var(--gray)">
        <i class="fas fa-newspaper" style="font-size:3rem;margin-bottom:12px;opacity:.3"></i>
        <p>Belum ada berita. Tambahkan melalui panel admin.</p>
      </div>
      <?php endif; ?>
    </div>
    <div style="text-align:center;margin-top:32px">
      <a href="<?= BASE_URL ?>/berita" class="btn btn-primary">Lihat Semua Berita</a>
    </div>
  </div>
</section>

<!-- BIDANG OSIS -->
<section class="section section-alt">
  <div class="container">
    <div class="section-header">
      <h2>Bidang OSIS</h2>
      <p><?= count($bidangList) ?> Seksi Bidang OSSAKA yang aktif berkontribusi</p>
      <div class="underline"></div>
    </div>
    <?php if (!empty($bidangList)): ?>
    <div class="grid-4" style="grid-template-columns:repeat(<?= min(5, count($bidangList)) ?>,1fr)">
      <?php foreach ($bidangList as $b): ?>
      <div class="bidang-card">
        <div class="bidang-icon"><?= htmlspecialchars($b['icon'] ?? '📋') ?></div>
        <h4><?= htmlspecialchars($b['nama']) ?></h4>
      </div>
      <?php endforeach; ?>
    </div>
    <?php else: ?>
    <p style="text-align:center;color:var(--gray);padding:40px 0">Belum ada bidang. Tambahkan melalui <a href="<?= BASE_URL ?>/admin/bidang">panel admin</a>.</p>
    <?php endif; ?>
  </div>
</section>

<!-- GALERI & PENGURUS -->
<section class="section">
  <div class="container">
    <div class="grid-2">
      <!-- Galeri -->
      <div>
        <div class="section-header" style="text-align:left;margin-bottom:24px">
          <h2>Galeri Kegiatan</h2>
          <div class="underline" style="margin:10px 0 0"></div>
        </div>
        <div class="galeri-grid">
          <?php if (!empty($fotoGaleri)): foreach (array_slice($fotoGaleri,0,6) as $g): ?>
          <div class="galeri-item">
            <img src="<?= BASE_URL ?>/uploads/<?= htmlspecialchars($g['file_path']) ?>" alt="<?= htmlspecialchars($g['judul']) ?>">
            <div class="overlay"><i class="fas fa-search-plus"></i></div>
          </div>
          <?php endforeach; else: ?>
          <?php for ($i=0;$i<6;$i++): ?>
          <div class="galeri-item" style="background:var(--bg-blue);display:flex;align-items:center;justify-content:center;color:var(--accent)">
            <i class="fas fa-image" style="font-size:1.5rem"></i>
          </div>
          <?php endfor; endif; ?>
        </div>
        <a href="<?= BASE_URL ?>/galeri" class="btn btn-primary btn-sm" style="margin-top:16px;display:inline-block">Lihat Semua →</a>
      </div>
      <!-- Pengurus Inti -->
      <div>
        <div class="section-header" style="text-align:left;margin-bottom:24px">
          <h2>Pengurus Inti</h2>
          <div class="underline" style="margin:10px 0 0"></div>
        </div>
        <div style="display:flex;flex-direction:column;gap:12px">
          <?php if (!empty($pengurusInti)): foreach (array_slice($pengurusInti,0,4) as $p): ?>
          <div class="pgr-mini">
            <div class="pgr-mini-avatar">
              <?php if ($p['foto']): ?>
                <img src="<?= BASE_URL ?>/uploads/<?= htmlspecialchars($p['foto']) ?>" alt="">
              <?php else: ?>
                <i class="fas fa-user"></i>
              <?php endif; ?>
            </div>
            <div>
              <strong><?= htmlspecialchars($p['nama']) ?></strong>
              <span><?= htmlspecialchars($p['jabatan']) ?></span>
            </div>
          </div>
          <?php endforeach; else: ?>
          <?php $jabatan = ['Ketua OSIS','Wakil Ketua','Sekretaris','Bendahara']; foreach ($jabatan as $j): ?>
          <div class="pgr-mini">
            <div class="pgr-mini-avatar"><i class="fas fa-user"></i></div>
            <div><strong><?= $j ?></strong><span>Tambahkan via Admin</span></div>
          </div>
          <?php endforeach; endif; ?>
        </div>
        <a href="<?= BASE_URL ?>/pengurus" class="btn btn-primary btn-sm" style="margin-top:16px;display:inline-block">Lihat Semua →</a>
      </div>
    </div>
  </div>
</section>

<!-- CTA ASPIRASI -->
<section class="cta-section">
  <div class="container">
    <h2>Punya Aspirasi atau Masukan?</h2>
    <p>Kirimkan aspirasi kamu secara anonim kepada OSIS SMKN 1 Adiwerna</p>
    <a href="<?= BASE_URL ?>/kontak" class="btn btn-merah">Kirim Aspirasi <i class="fas fa-paper-plane" style="margin-left:4px"></i></a>
  </div>
</section>
