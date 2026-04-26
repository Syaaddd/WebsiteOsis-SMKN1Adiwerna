<?php require dirname(__DIR__) . '/partials/header.php'; ?>

<div class="admin-header">
  <h1>Kelola Berita</h1>
  <a href="<?= BASE_URL ?>/admin/posts/create" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Berita</a>
</div>

<div class="table-card">
  <table>
    <thead><tr><th>Thumbnail</th><th>Judul</th><th>Kategori</th><th>Status</th><th>Tanggal</th><th>Aksi</th></tr></thead>
    <tbody>
      <?php foreach ($posts as $p): ?>
      <tr>
        <td>
          <?php if ($p['thumbnail']): ?>
            <img src="<?= BASE_URL ?>/uploads/<?= htmlspecialchars($p['thumbnail']) ?>" style="width:56px;height:42px;object-fit:cover;border-radius:4px" alt="">
          <?php else: ?>
            <div style="width:56px;height:42px;background:var(--bg-blue);border-radius:4px;display:flex;align-items:center;justify-content:center;color:var(--accent)"><i class="fas fa-image"></i></div>
          <?php endif; ?>
        </td>
        <td style="max-width:280px"><?= htmlspecialchars($p['judul']) ?></td>
        <td><span style="background:var(--bg-blue);color:var(--primary);padding:2px 10px;border-radius:12px;font-size:.78rem"><?= $p['kategori'] ?></span></td>
        <td><?= $p['status']==='published' ? '<span style="color:#388E3C"><i class="fas fa-circle" style="font-size:.5rem"></i> Publik</span>' : '<span style="color:var(--gray)"><i class="fas fa-circle" style="font-size:.5rem"></i> Draft</span>' ?></td>
        <td style="font-size:.83rem;color:var(--gray)"><?= date('d M Y', strtotime($p['created_at'])) ?></td>
        <td>
          <a href="<?= BASE_URL ?>/admin/posts/edit/<?= $p['id'] ?>" class="btn btn-secondary btn-sm">Edit</a>
          <a href="<?= BASE_URL ?>/admin/posts/delete/<?= $p['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus berita ini?')">Hapus</a>
        </td>
      </tr>
      <?php endforeach; ?>
      <?php if (empty($posts)): ?>
      <tr><td colspan="6" style="text-align:center;padding:40px;color:var(--gray)">Belum ada berita</td></tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>

<?php require dirname(__DIR__) . '/partials/footer.php'; ?>
