<?php require dirname(__DIR__) . '/partials/header.php'; ?>

<div class="admin-header">
  <h1>Kelola Bidang OSIS / Sekbid</h1>
  <a href="<?= BASE_URL ?>/admin/bidang/create" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Bidang</a>
</div>

<div class="table-card">
  <table>
    <thead>
      <tr>
        <th style="width:50px">#</th>
        <th style="width:60px">Icon</th>
        <th>Nama Bidang</th>
        <th>Slug / Kode</th>
        <th style="width:80px">Urutan</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($list as $i => $b): ?>
      <tr>
        <td><?= $i + 1 ?></td>
        <td style="text-align:center;font-size:1.5rem"><?= htmlspecialchars($b['icon'] ?? '📋') ?></td>
        <td><strong><?= htmlspecialchars($b['nama']) ?></strong></td>
        <td><code style="background:var(--bg-blue);padding:2px 8px;border-radius:6px;font-size:.8rem"><?= htmlspecialchars($b['slug']) ?></code></td>
        <td style="text-align:center"><?= (int)$b['urutan'] ?></td>
        <td>
          <a href="<?= BASE_URL ?>/admin/bidang/edit/<?= $b['id'] ?>" class="btn btn-secondary btn-sm">Edit</a>
          <a href="<?= BASE_URL ?>/admin/bidang/delete/<?= $b['id'] ?>" class="btn btn-danger btn-sm"
             onclick="return confirm('Hapus bidang &quot;<?= htmlspecialchars($b['nama'], ENT_QUOTES) ?>&quot;?\nData pengurus di bidang ini akan kehilangan referensi bidang.')">Hapus</a>
        </td>
      </tr>
      <?php endforeach; ?>
      <?php if (empty($list)): ?>
      <tr><td colspan="6" style="text-align:center;padding:40px;color:var(--gray)">Belum ada data bidang</td></tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>

<div style="margin-top:16px;padding:14px 18px;background:var(--bg-blue);border-radius:10px;font-size:.85rem;color:var(--gray)">
  <i class="fas fa-info-circle" style="color:var(--accent)"></i>
  <strong>Slug</strong> adalah kode internal yang dipakai untuk mengelompokkan pengurus. Ubah nama bebas, slug otomatis menyesuaikan.
</div>

<?php require dirname(__DIR__) . '/partials/footer.php'; ?>
