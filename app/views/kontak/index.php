<?php $pageTitle = 'Kontak & Aspirasi'; ?>

<div style="background:linear-gradient(135deg,var(--dark-blue),var(--primary));padding:60px 0;color:#fff;text-align:center">
  <div class="container">
    <h1 style="font-size:2.2rem;font-weight:800">Kontak & Aspirasi</h1>
    <p style="opacity:.85;margin-top:8px">Sampaikan aspirasi kamu kepada OSSAKA</p>
  </div>
</div>

<section class="section">
  <div class="container">
    <?php if ($sukses): ?>
    <div class="alert alert-success"><i class="fas fa-check-circle"></i> Aspirasi berhasil terkirim! Terima kasih atas masukan kamu.</div>
    <?php endif; ?>

    <div class="kontak-wrap">
      <!-- Info Kontak -->
      <div class="kontak-info">
        <h3>Hubungi Kami</h3>
        <p>OSSAKA terbuka menerima aspirasi, saran, dan masukan dari seluruh warga SMKN 1 Adiwerna.</p>

        <div class="info-item">
          <div class="info-icon"><i class="fas fa-map-marker-alt"></i></div>
          <div><strong>Alamat</strong><br><small>Jl. Raya 2 PO.BOX.24 KM 7, Kec. Adiwerna, Kab. Tegal, Jawa Tengah</small></div>
        </div>
        <div class="info-item">
          <div class="info-icon"><i class="fab fa-instagram"></i></div>
          <div><strong>Instagram</strong><br><small><a href="https://instagram.com/ossaka_osis.adb" target="_blank" style="color:var(--primary)">@ossaka_osis.adb</a></small></div>
        </div>
        <div class="info-item">
          <div class="info-icon"><i class="fab fa-youtube"></i></div>
          <div><strong>YouTube</strong><br><small><a href="https://www.youtube.com/@OssakaTV" target="_blank" style="color:var(--primary)">OSSAKA TV</a></small></div>
        </div>

        <!-- Map Embed -->
        <div style="margin-top:24px;border-radius:var(--radius);overflow:hidden;box-shadow:var(--card-shadow)">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.8!2d109.15!3d-6.95!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwNTcnMDAuMCJTIDEwOcKwMDknMDAuMCJF!5e0!3m2!1sid!2sid!4v1234567890"
            width="100%" height="200" style="border:0" allowfullscreen="" loading="lazy">
          </iframe>
        </div>
      </div>

      <!-- Form Aspirasi -->
      <div class="form-card">
        <h3 style="color:var(--text-dark);margin-bottom:20px"><i class="fas fa-paper-plane" style="color:var(--accent);margin-right:8px"></i>Kirim Aspirasi</h3>
        <form method="POST" action="<?= BASE_URL ?>/kontak">
          <div class="form-group">
            <label>Nama (opsional)</label>
            <input type="text" name="nama" placeholder="Nama kamu atau kosongkan untuk anonim">
          </div>
          <div class="form-group">
            <label>Email (opsional)</label>
            <input type="email" name="email" placeholder="email@contoh.com">
          </div>
          <div class="form-group">
            <label>Aspirasi / Pesan <span style="color:red">*</span></label>
            <textarea name="isi" placeholder="Tuliskan aspirasi, saran, atau masukan kamu untuk OSIS..." required></textarea>
          </div>
          <button type="submit" class="btn btn-primary" style="width:100%">
            <i class="fas fa-paper-plane"></i> Kirim Aspirasi
          </button>
          <p style="font-size:.78rem;color:var(--gray);margin-top:12px;text-align:center">
            <i class="fas fa-shield-alt"></i> Aspirasi bersifat rahasia dan hanya dibaca pengurus OSIS.
          </p>
        </form>
      </div>
    </div>
  </div>
</section>
