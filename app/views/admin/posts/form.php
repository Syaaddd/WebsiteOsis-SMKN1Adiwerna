<?php require dirname(__DIR__) . '/partials/header.php'; ?>

<div class="admin-header">
  <h1><?= $post ? 'Edit Berita' : 'Tambah Berita Baru' ?></h1>
  <a href="<?= BASE_URL ?>/admin/posts" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
</div>

<div class="form-card">
  <form method="POST" action="<?= BASE_URL ?>/admin/posts/<?= $post ? 'edit/'.$post['id'] : 'create' ?>" enctype="multipart/form-data">
    <div class="form-group">
      <label>Judul Berita <span style="color:red">*</span></label>
      <input type="text" name="judul" required value="<?= htmlspecialchars($post['judul'] ?? '') ?>" placeholder="Judul berita...">
    </div>
    <div class="grid-2">
      <div class="form-group">
        <label>Kategori</label>
        <select name="kategori">
          <?php foreach (['berita','pengumuman','prestasi','akademik','kegiatan'] as $k): ?>
          <option value="<?= $k ?>" <?= ($post['kategori']??'')===$k?'selected':'' ?>><?= ucfirst($k) ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="form-group">
        <label>Status</label>
        <select name="status">
          <option value="published" <?= ($post['status']??'')==='published'?'selected':'' ?>>Publik</option>
          <option value="draft" <?= ($post['status']??'')==='draft'?'selected':'' ?>>Draft</option>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label>Thumbnail</label>
      <?php if (!empty($post['thumbnail'])): ?>
        <img src="<?= BASE_URL ?>/uploads/<?= htmlspecialchars($post['thumbnail']) ?>" style="height:100px;border-radius:6px;margin-bottom:8px;display:block" alt="">
      <?php endif; ?>
      <input type="file" name="thumbnail" accept="image/*">
    </div>
    <div class="form-group">
      <label>Konten <span style="color:red">*</span></label>
      <textarea name="konten" required placeholder="Tulis isi berita di sini..."><?= htmlspecialchars($post['konten'] ?? '') ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> <?= $post ? 'Simpan Perubahan' : 'Publikasikan Berita' ?></button>
  </form>
</div>

<?php require dirname(__DIR__) . '/partials/footer.php'; ?>
