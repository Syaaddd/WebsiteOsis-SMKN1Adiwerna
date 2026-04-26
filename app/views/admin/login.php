<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login – OSSAKA</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500;700&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    *{margin:0;padding:0;box-sizing:border-box}
    body{font-family:'DM Sans',sans-serif;background:linear-gradient(135deg,#1338A8 0%,#1A56DB 100%);min-height:100vh;display:flex;align-items:center;justify-content:center}
    .login-card{background:#fff;border-radius:14px;padding:44px 38px;width:100%;max-width:400px;box-shadow:0 24px 64px rgba(19,56,168,.35)}
    .login-card .top-stripe{height:4px;background:linear-gradient(90deg,#DC2626 33%,#fff 33%,#fff 66%,#1338A8 66%);border-radius:2px;margin-bottom:32px}
    .logo{text-align:center;margin-bottom:28px}
    .logo img{width:76px;height:76px;border-radius:50%;object-fit:cover;margin:0 auto 12px;display:block;border:3px solid #1338A8;box-shadow:0 4px 16px rgba(19,56,168,.25)}
    .logo h2{color:#1338A8;font-size:1.25rem;font-family:'Oswald',sans-serif;letter-spacing:.3px}
    .logo p{color:#475569;font-size:.84rem;margin-top:4px}
    .form-group{margin-bottom:16px}
    .form-group label{display:block;font-size:.84rem;font-weight:600;color:#1E293B;margin-bottom:6px}
    .form-group input{width:100%;padding:10px 13px;border:1.5px solid #E2E8F0;border-radius:7px;font-family:inherit;font-size:.9rem;transition:.2s;background:#F8FAFC}
    .form-group input:focus{outline:none;border-color:#1A56DB;box-shadow:0 0 0 3px rgba(26,86,219,.12);background:#fff}
    .btn-login{width:100%;background:#DC2626;color:#fff;padding:12px;border:none;border-radius:7px;font-family:inherit;font-size:.95rem;font-weight:600;cursor:pointer;transition:.2s;margin-top:4px}
    .btn-login:hover{background:#991B1B;transform:translateY(-1px)}
    .alert{padding:12px 15px;background:#FEE2E2;color:#991B1B;border-radius:7px;margin-bottom:18px;font-size:.86rem;border-left:3px solid #DC2626}
    .back{text-align:center;margin-top:18px;font-size:.84rem;color:#475569}
    .back a{color:#1A56DB;font-weight:600}
  </style>
</head>
<body>
  <div class="login-card">
    <div class="top-stripe"></div>
    <div class="logo">
      <img src="<?= ROOT_URL ?>/img/logo.png" alt="Logo OSSAKA">
      <h2>Admin OSSAKA</h2>
      <p>Panel Pengelolaan Website OSSAKA</p>
    </div>

    <?php if ($error): ?>
    <div class="alert"><i class="fas fa-exclamation-circle"></i> <?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="POST" action="<?= BASE_URL ?>/admin/login">
      <div class="form-group">
        <label><i class="fas fa-user" style="margin-right:6px;color:#1565C0"></i>Username</label>
        <input type="text" name="username" required autocomplete="username" placeholder="Masukkan username">
      </div>
      <div class="form-group">
        <label><i class="fas fa-lock" style="margin-right:6px;color:#1565C0"></i>Password</label>
        <input type="password" name="password" required autocomplete="current-password" placeholder="Masukkan password">
      </div>
      <button type="submit" class="btn-login"><i class="fas fa-sign-in-alt"></i> Masuk</button>
    </form>
    <div class="back"><a href="<?= BASE_URL ?>"><i class="fas fa-arrow-left"></i> Kembali ke Website</a></div>
  </div>
</body>
</html>
