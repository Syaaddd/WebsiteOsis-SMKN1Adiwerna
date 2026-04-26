<?php require APP_PATH . '/views/admin/partials/header.php'; ?>

<div class="admin-header">
  <h1><i class="fas fa-cog" style="margin-right:10px;color:var(--merah)"></i>Pengaturan Website</h1>
</div>

<?php if ($success): ?>
<div class="alert alert-success"><i class="fas fa-check-circle" style="margin-right:6px"></i><?= htmlspecialchars($success) ?></div>
<?php endif; ?>

<form method="POST" action="<?= BASE_URL ?>/admin/pengaturan/update">

  <!-- STATISTIK HERO -->
  <div class="form-card" style="margin-bottom:24px">
    <div style="display:flex;align-items:center;gap:10px;margin-bottom:24px;padding-bottom:16px;border-bottom:2px solid var(--biru-muda)">
      <div style="width:36px;height:36px;background:var(--biru-muda);border-radius:8px;display:flex;align-items:center;justify-content:center;color:var(--biru-gelap)">
        <i class="fas fa-chart-bar"></i>
      </div>
      <div>
        <h3 style="font-family:'Oswald',sans-serif;color:var(--teks);font-size:1.05rem;letter-spacing:.3px">Statistik Hero</h3>
        <p style="font-size:.8rem;color:var(--teks-hint);margin-top:2px">Angka dan label yang ditampilkan di bagian hero halaman utama</p>
      </div>
    </div>

    <!-- Preview -->
    <div style="display:flex;gap:12px;margin-bottom:28px;padding:20px;background:linear-gradient(135deg,var(--biru-gelap),var(--biru-utama));border-radius:10px">
      <?php
      $statPreviews = [
        ['num' => $settings['stat_1_num'] ?? '38+', 'label' => $settings['stat_1_label'] ?? 'Anggota Aktif'],
        ['num' => $settings['stat_2_num'] ?? '12',  'label' => $settings['stat_2_label'] ?? 'Kegiatan / Tahun'],
        ['num' => $settings['stat_3_num'] ?? '50+', 'label' => $settings['stat_3_label'] ?? 'Prestasi'],
      ];
      foreach ($statPreviews as $sp): ?>
      <div style="flex:1;background:rgba(255,255,255,.12);border:1px solid rgba(255,255,255,.18);border-radius:8px;padding:16px;text-align:center">
        <div style="font-family:'Oswald',sans-serif;font-size:1.8rem;font-weight:700;color:#fff;line-height:1"><?= htmlspecialchars($sp['num']) ?></div>
        <div style="font-size:.72rem;color:rgba(255,255,255,.70);margin-top:5px"><?= htmlspecialchars($sp['label']) ?></div>
      </div>
      <?php endforeach; ?>
    </div>
    <p style="font-size:.78rem;color:var(--teks-hint);margin-bottom:20px;text-align:center">
      <i class="fas fa-eye" style="margin-right:4px"></i>Preview — tampilan nyata di halaman utama
    </p>

    <div class="grid-3">
      <?php for ($i = 1; $i <= 3; $i++): ?>
      <div style="background:var(--abu);border-radius:10px;padding:18px;border:1px solid var(--border)">
        <p style="font-size:.78rem;font-weight:700;color:var(--biru-gelap);text-transform:uppercase;letter-spacing:.5px;margin-bottom:14px">
          Statistik <?= $i ?>
        </p>
        <div class="form-group" style="margin-bottom:12px">
          <label>Angka / Nilai</label>
          <input type="text" name="stat_<?= $i ?>_num"
                 value="<?= htmlspecialchars($settings["stat_{$i}_num"] ?? '') ?>"
                 placeholder="Contoh: 38+" maxlength="10">
        </div>
        <div class="form-group" style="margin-bottom:0">
          <label>Label</label>
          <input type="text" name="stat_<?= $i ?>_label"
                 value="<?= htmlspecialchars($settings["stat_{$i}_label"] ?? '') ?>"
                 placeholder="Contoh: Anggota Aktif" maxlength="40">
        </div>
      </div>
      <?php endfor; ?>
    </div>
  </div>

  <!-- INFO WEBSITE -->
  <div class="form-card" style="margin-bottom:24px">
    <div style="display:flex;align-items:center;gap:10px;margin-bottom:24px;padding-bottom:16px;border-bottom:2px solid var(--biru-muda)">
      <div style="width:36px;height:36px;background:var(--biru-muda);border-radius:8px;display:flex;align-items:center;justify-content:center;color:var(--biru-gelap)">
        <i class="fas fa-globe"></i>
      </div>
      <div>
        <h3 style="font-family:'Oswald',sans-serif;color:var(--teks);font-size:1.05rem;letter-spacing:.3px">Informasi Website</h3>
        <p style="font-size:.8rem;color:var(--teks-hint);margin-top:2px">Nama dan deskripsi yang muncul di tab browser dan footer</p>
      </div>
    </div>
    <div class="grid-2">
      <div class="form-group">
        <label>Nama Website</label>
        <input type="text" name="nama_site"
               value="<?= htmlspecialchars($settings['nama_site'] ?? 'OSSAKA – SMKN 1 Adiwerna') ?>"
               placeholder="OSSAKA – SMKN 1 Adiwerna">
      </div>
      <div class="form-group">
        <label>Deskripsi Singkat</label>
        <input type="text" name="deskripsi"
               value="<?= htmlspecialchars($settings['deskripsi'] ?? '') ?>"
               placeholder="Organisasi Siswa Intra Sekolah...">
      </div>
    </div>
  </div>

  <!-- MEDIA SOSIAL -->
  <div class="form-card" style="margin-bottom:28px">
    <div style="display:flex;align-items:center;gap:10px;margin-bottom:24px;padding-bottom:16px;border-bottom:2px solid var(--biru-muda)">
      <div style="width:36px;height:36px;background:var(--biru-muda);border-radius:8px;display:flex;align-items:center;justify-content:center;color:var(--biru-gelap)">
        <i class="fas fa-share-alt"></i>
      </div>
      <div>
        <h3 style="font-family:'Oswald',sans-serif;color:var(--teks);font-size:1.05rem;letter-spacing:.3px">Media Sosial</h3>
        <p style="font-size:.8rem;color:var(--teks-hint);margin-top:2px">URL akun media sosial OSSAKA yang tampil di footer</p>
      </div>
    </div>
    <div class="grid-2">
      <div class="form-group">
        <label><i class="fab fa-instagram" style="color:#E1306C;margin-right:6px"></i>Instagram</label>
        <input type="url" name="instagram"
               value="<?= htmlspecialchars($settings['instagram'] ?? '') ?>"
               placeholder="https://instagram.com/...">
      </div>
      <div class="form-group">
        <label><i class="fab fa-youtube" style="color:#FF0000;margin-right:6px"></i>YouTube</label>
        <input type="url" name="youtube"
               value="<?= htmlspecialchars($settings['youtube'] ?? '') ?>"
               placeholder="https://youtube.com/...">
      </div>
      <div class="form-group">
        <label><i class="fab fa-facebook-f" style="color:#1877F2;margin-right:6px"></i>Facebook</label>
        <input type="url" name="facebook"
               value="<?= htmlspecialchars($settings['facebook'] ?? '') ?>"
               placeholder="https://facebook.com/...">
      </div>
      <div class="form-group">
        <label><i class="fab fa-tiktok" style="margin-right:6px"></i>TikTok</label>
        <input type="url" name="tiktok"
               value="<?= htmlspecialchars($settings['tiktok'] ?? '') ?>"
               placeholder="https://tiktok.com/@...">
      </div>
    </div>
  </div>

  <div style="display:flex;gap:12px;align-items:center">
    <button type="submit" class="btn btn-merah">
      <i class="fas fa-save"></i> Simpan Pengaturan
    </button>
    <a href="<?= BASE_URL ?>/admin/dashboard" class="btn btn-secondary btn-sm">Batal</a>
  </div>

</form>

<?php require APP_PATH . '/views/admin/partials/footer.php'; ?>
