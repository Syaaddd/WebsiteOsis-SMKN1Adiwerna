<?php require dirname(__DIR__) . '/partials/header.php'; ?>

<div class="admin-header">
  <h1>Kelola Pengurus</h1>
  <a href="<?= BASE_URL ?>/admin/pengurus/create" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Pengurus</a>
</div>

<div class="table-card">
  <table>
    <thead><tr><th>Foto</th><th>Nama</th><th>Jabatan</th><th>Bidang</th><th>Kelas</th><th>Aksi</th></tr></thead>
    <tbody>
      <?php foreach ($list as $p): ?>
      <tr>
        <td>
          <?php if ($p['foto']): ?>
            <img src="<?= BASE_URL ?>/uploads/<?= htmlspecialchars($p['foto']) ?>" style="width:44px;height:44px;border-radius:50%;object-fit:cover" alt="">
          <?php else: ?>
            <div style="width:44px;height:44px;border-radius:50%;background:var(--bg-blue);display:flex;align-items:center;justify-content:center;color:var(--accent)"><i class="fas fa-user"></i></div>
          <?php endif; ?>
        </td>
        <td><strong><?= htmlspecialchars($p['nama']) ?></strong></td>
        <td><?= htmlspecialchars($p['jabatan']) ?></td>
        <td><span style="background:var(--bg-blue);color:var(--primary);padding:2px 10px;border-radius:12px;font-size:.78rem"><?= ucfirst($p['bidang']) ?></span></td>
        <td><?= htmlspecialchars($p['kelas'] ?? '-') ?></td>
        <td>
          <a href="<?= BASE_URL ?>/admin/pengurus/edit/<?= $p['id'] ?>" class="btn btn-secondary btn-sm">Edit</a>
          <a href="<?= BASE_URL ?>/admin/pengurus/delete/<?= $p['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus pengurus ini?')">Hapus</a>
        </td>
      </tr>
      <?php endforeach; ?>
      <?php if (empty($list)): ?>
      <tr><td colspan="6" style="text-align:center;padding:40px;color:var(--gray)">Belum ada data pengurus</td></tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>

<?php require dirname(__DIR__) . '/partials/footer.php'; ?>
