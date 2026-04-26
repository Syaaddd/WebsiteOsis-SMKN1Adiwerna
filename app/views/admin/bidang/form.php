<?php require dirname(__DIR__) . '/partials/header.php'; ?>

<div class="admin-header">
  <h1><?= $bidang ? 'Edit Bidang' : 'Tambah Bidang Baru' ?></h1>
  <a href="<?= BASE_URL ?>/admin/bidang" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
</div>

<?php if ($error): ?>
<div style="background:#fee2e2;color:#b91c1c;padding:12px 18px;border-radius:10px;margin-bottom:16px">
  <i class="fas fa-exclamation-circle"></i> <?= htmlspecialchars($error) ?>
</div>
<?php endif; ?>

<div class="form-card">
  <form method="POST"
        action="<?= BASE_URL ?>/admin/bidang/<?= $bidang ? 'edit/'.$bidang['id'] : 'create' ?>">
    <div class="grid-2">
      <div class="form-group">
        <label>Nama Bidang <span style="color:red">*</span></label>
        <input type="text" name="nama" id="nama" required
               value="<?= htmlspecialchars($bidang['nama'] ?? '') ?>"
               placeholder="cth: Bidang Akademik, Sekbid Olahraga…"
               oninput="previewSlug(this.value)">
        <small style="color:var(--gray);font-size:.78rem">Nama tampil di halaman pengurus dan beranda.</small>
      </div>
      <div class="form-group">
        <label>Slug / Kode (otomatis)</label>
        <input type="text" id="slug-preview"
               value="<?= htmlspecialchars($bidang['slug'] ?? '') ?>"
               disabled
               style="background:var(--bg-blue);color:var(--gray);cursor:not-allowed">
        <small style="color:var(--gray);font-size:.78rem">Kode internal, dibuat otomatis dari nama.</small>
      </div>
    </div>
    <div class="grid-2">
      <div class="form-group">
        <label>Icon / Emoji</label>
        <div style="display:flex;gap:10px;align-items:center">
          <span id="icon-preview" style="font-size:2rem;line-height:1"><?= htmlspecialchars($bidang['icon'] ?? '📋') ?></span>
          <input type="text" name="icon" id="icon-input" maxlength="10"
                 value="<?= htmlspecialchars($bidang['icon'] ?? '📋') ?>"
                 placeholder="Emoji…" style="max-width:120px"
                 oninput="document.getElementById('icon-preview').textContent=this.value||'📋'">
        </div>
        <small style="color:var(--gray);font-size:.78rem">Emoji yang tampil di kartu bidang di beranda. Copy-paste emoji dari keyboard atau
          <a href="https://emojipedia.org" target="_blank">emojipedia.org</a>.
        </small>
      </div>
      <div class="form-group" style="align-self:flex-start">
        <label>Urutan Tampil</label>
        <input type="number" name="urutan" min="0" max="99"
               value="<?= (int)($bidang['urutan'] ?? 0) ?>"
               placeholder="0" style="max-width:120px">
        <small style="color:var(--gray);font-size:.78rem">Angka lebih kecil tampil lebih dulu.</small>
      </div>
    </div>
    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
  </form>
</div>

<script>
function previewSlug(val) {
  var slug = val.toLowerCase().trim()
    .replace(/\s+/g, '-')
    .replace(/[^a-z0-9\-]/g, '');
  document.getElementById('slug-preview').value = slug;
}
</script>

<?php require dirname(__DIR__) . '/partials/footer.php'; ?>
