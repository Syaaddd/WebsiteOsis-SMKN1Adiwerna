<?php require __DIR__ . '/partials/header.php'; ?>

<div class="admin-header">
  <h1>Dashboard</h1>
  <span style="font-size:.9rem;color:var(--gray)">Selamat datang, <strong><?= htmlspecialchars($_SESSION['admin_nama'] ?? 'Admin') ?></strong></span>
</div>

<!-- STAT CARDS -->
<div class="stat-grid">
  <div class="stat-card">
    <div class="stat-icon blue"><i class="fas fa-newspaper" style="color:#1565C0"></i></div>
    <div class="stat-info"><h3><?= $stats['berita'] ?></h3><p>Total Berita</p></div>
  </div>
  <div class="stat-card">
    <div class="stat-icon green"><i class="fas fa-users" style="color:#388E3C"></i></div>
    <div class="stat-info"><h3><?= $stats['pengurus'] ?></h3><p>Pengurus</p></div>
  </div>
  <div class="stat-card">
    <div class="stat-icon amber"><i class="fas fa-images" style="color:#F57F17"></i></div>
    <div class="stat-info"><h3><?= $stats['galeri'] ?></h3><p>Foto Galeri</p></div>
  </div>
  <div class="stat-card">
    <div class="stat-icon red"><i class="fas fa-envelope" style="color:#C62828"></i></div>
    <div class="stat-info"><h3><?= $stats['aspirasi'] ?></h3><p>Aspirasi Baru</p></div>
  </div>
</div>

<!-- RECENT POSTS -->
<div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:16px">
  <h2 style="color:var(--text-dark);font-size:1.1rem">Berita Terbaru</h2>
  <a href="<?= BASE_URL ?>/admin/posts/create" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Berita</a>
</div>
<div class="table-card">
  <table>
    <thead><tr><th>Judul</th><th>Kategori</th><th>Status</th><th>Tanggal</th><th>Aksi</th></tr></thead>
    <tbody>
      <?php foreach (array_slice($beritaTerbaru,0,8) as $b): ?>
      <tr>
        <td><?= htmlspecialchars($b['judul']) ?></td>
        <td><span style="background:var(--bg-blue);color:var(--primary);padding:2px 10px;border-radius:12px;font-size:.78rem"><?= $b['kategori'] ?></span></td>
        <td><?= $b['status']==='published' ? '<span style="color:#388E3C"><i class="fas fa-check-circle"></i> Publik</span>' : '<span style="color:var(--gray)">Draft</span>' ?></td>
        <td style="font-size:.83rem;color:var(--gray)"><?= date('d M Y', strtotime($b['created_at'])) ?></td>
        <td>
          <a href="<?= BASE_URL ?>/admin/posts/edit/<?= $b['id'] ?>" class="btn btn-secondary btn-sm">Edit</a>
          <a href="<?= BASE_URL ?>/admin/posts/delete/<?= $b['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus berita ini?')">Hapus</a>
        </td>
      </tr>
      <?php endforeach; ?>
      <?php if (empty($beritaTerbaru)): ?>
      <tr><td colspan="5" style="text-align:center;padding:30px;color:var(--gray)">Belum ada berita</td></tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>

<?php require __DIR__ . '/partials/footer.php'; ?>
