<?php require dirname(__DIR__) . '/partials/header.php'; ?>

<div class="admin-header">
  <h1>Kelola Galeri</h1>
</div>

<!-- Upload Form -->
<div class="form-card" style="margin-bottom:28px">
  <h3 style="color:var(--text-dark);margin-bottom:16px"><i class="fas fa-upload" style="color:var(--accent);margin-right:8px"></i>Upload Foto Baru</h3>
  <form method="POST" action="<?= BASE_URL ?>/admin/galeri/upload" enctype="multipart/form-data">
    <div class="grid-2">
      <div class="form-group">
        <label>Keterangan Foto</label>
        <input type="text" name="judul" placeholder="Judul atau keterangan foto...">
      </div>
      <div class="form-group">
        <label>Pilih File Foto</label>
        <input type="file" name="foto" accept="image/*" required>
      </div>
    </div>
    <button type="submit" class="btn btn-primary"><i class="fas fa-upload"></i> Upload</button>
  </form>
</div>

<!-- Foto Grid -->
<div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(200px,1fr));gap:16px">
  <?php foreach ($foto as $f): ?>
  <div style="background:#fff;border-radius:var(--radius);overflow:hidden;box-shadow:var(--card-shadow)">
    <img src="<?= BASE_URL ?>/uploads/<?= htmlspecialchars($f['file_path']) ?>" style="width:100%;height:150px;object-fit:cover" alt="">
    <div style="padding:10px">
      <p style="font-size:.82rem;color:var(--gray);margin-bottom:8px"><?= htmlspecialchars($f['judul']) ?></p>
      <a href="<?= BASE_URL ?>/admin/galeri/delete/<?= $f['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus foto ini?')"><i class="fas fa-trash"></i> Hapus</a>
    </div>
  </div>
  <?php endforeach; ?>
  <?php if (empty($foto)): ?>
  <div style="grid-column:1/-1;text-align:center;padding:60px;color:var(--gray)">
    <i class="fas fa-images" style="font-size:3rem;opacity:.2;display:block;margin-bottom:16px"></i>
    Belum ada foto di galeri
  </div>
  <?php endif; ?>
</div>

<?php require dirname(__DIR__) . '/partials/footer.php'; ?>
