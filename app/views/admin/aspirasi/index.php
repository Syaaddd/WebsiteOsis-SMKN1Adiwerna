<?php require dirname(__DIR__) . '/partials/header.php'; ?>

<div class="admin-header">
  <h1>Aspirasi Siswa</h1>
</div>

<div class="table-card">
  <table>
    <thead><tr><th>Pengirim</th><th>Aspirasi</th><th>Status</th><th>Tanggal</th><th>Aksi</th></tr></thead>
    <tbody>
      <?php foreach ($list as $a): ?>
      <tr>
        <td>
          <strong><?= htmlspecialchars($a['nama'] ?: 'Anonim') ?></strong>
          <?php if ($a['pengirim']): ?><br><small style="color:var(--gray)"><?= htmlspecialchars($a['pengirim']) ?></small><?php endif; ?>
        </td>
        <td style="max-width:400px;line-height:1.6"><?= nl2br(htmlspecialchars($a['isi'])) ?></td>
        <td>
          <?php if ($a['status']==='baru'): ?>
            <span style="background:#FFF3E0;color:#E65100;padding:3px 10px;border-radius:12px;font-size:.78rem;font-weight:600">● Baru</span>
          <?php else: ?>
            <span style="background:#E8F5E9;color:#2E7D32;padding:3px 10px;border-radius:12px;font-size:.78rem">✓ Dibaca</span>
          <?php endif; ?>
        </td>
        <td style="font-size:.83rem;color:var(--gray)"><?= date('d M Y H:i', strtotime($a['created_at'])) ?></td>
        <td>
          <a href="<?= BASE_URL ?>/admin/aspirasi/delete/<?= $a['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus aspirasi ini?')">Hapus</a>
        </td>
      </tr>
      <?php endforeach; ?>
      <?php if (empty($list)): ?>
      <tr><td colspan="5" style="text-align:center;padding:40px;color:var(--gray)">Belum ada aspirasi masuk</td></tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>

<?php require dirname(__DIR__) . '/partials/footer.php'; ?>
