<?php require dirname(__DIR__) . '/partials/header.php'; ?>

<div class="admin-header">
  <h1><?= $pengurus ? 'Edit Pengurus' : 'Tambah Pengurus' ?></h1>
  <a href="<?= BASE_URL ?>/admin/pengurus" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
</div>

<div class="form-card">
  <form method="POST" action="<?= BASE_URL ?>/admin/pengurus/<?= $pengurus ? 'edit/'.$pengurus['id'] : 'create' ?>" enctype="multipart/form-data">
    <div class="grid-2">
      <div class="form-group">
        <label>Nama Lengkap <span style="color:red">*</span></label>
        <input type="text" name="nama" required value="<?= htmlspecialchars($pengurus['nama'] ?? '') ?>" placeholder="Nama lengkap...">
      </div>
      <div class="form-group">
        <label>Jabatan <span style="color:red">*</span></label>
        <input type="text" name="jabatan" required value="<?= htmlspecialchars($pengurus['jabatan'] ?? '') ?>" placeholder="Ketua OSIS, Wakil Ketua, dll">
      </div>
    </div>
    <div class="grid-2">
      <div class="form-group">
        <label>Bidang</label>
        <select name="bidang">
          <?php if (!empty($bidangList)): ?>
            <?php foreach ($bidangList as $b): ?>
            <option value="<?= htmlspecialchars($b['slug']) ?>" <?= ($pengurus['bidang']??'')===$b['slug']?'selected':'' ?>>
              <?= htmlspecialchars($b['nama']) ?>
            </option>
            <?php endforeach; ?>
          <?php else: ?>
            <option value="<?= htmlspecialchars($pengurus['bidang'] ?? 'inti') ?>" selected>
              <?= htmlspecialchars($pengurus['bidang'] ?? 'inti') ?>
            </option>
          <?php endif; ?>
        </select>
        <small style="color:var(--gray);font-size:.78rem">
          Kelola daftar bidang di <a href="<?= BASE_URL ?>/admin/bidang" target="_blank">Bidang / Sekbid</a>.
        </small>
      </div>
      <div class="form-group">
        <label>Kelas</label>
        <input type="text" name="kelas" value="<?= htmlspecialchars($pengurus['kelas'] ?? '') ?>" placeholder="XII RPL 1">
      </div>
    </div>
    <div class="grid-2">
      <div class="form-group">
        <label>Periode (Tahun)</label>
        <input type="number" name="periode" value="<?= $pengurus['periode'] ?? date('Y') ?>" min="2020" max="2030">
      </div>
      <div class="form-group">
        <label>Foto</label>
        <?php if (!empty($pengurus['foto'])): ?>
          <img src="<?= BASE_URL ?>/uploads/<?= htmlspecialchars($pengurus['foto']) ?>" style="height:80px;border-radius:50%;margin-bottom:8px;display:block" alt="">
        <?php endif; ?>
        <input type="file" name="foto" accept="image/*">
      </div>
    </div>
    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
  </form>
</div>

<?php require dirname(__DIR__) . '/partials/footer.php'; ?>
