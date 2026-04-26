<?php
require_once APP_PATH . '/models/Post.php';
require_once APP_PATH . '/models/Pengurus.php';
require_once APP_PATH . '/models/Galeri.php';
require_once APP_PATH . '/models/Aspirasi.php';

class AdminController extends Controller {
    public function loginForm() {
        if (isset($_SESSION['admin_id'])) { $this->redirect('admin/dashboard'); return; }
        $error = $_SESSION['login_error'] ?? null;
        unset($_SESSION['login_error']);
        $this->viewPlain('admin/login', compact('error'));
    }

    public function login() {
        $db = Database::getInstance();
        $user = $db->fetchOne("SELECT * FROM users WHERE username=? AND rola='admin'", [$_POST['username'] ?? ''], 's');
        if ($user && password_verify($_POST['password'] ?? '', $user['password_hash'])) {
            $_SESSION['admin_id'] = $user['id'];
            $_SESSION['admin_nama'] = $user['nama_lengkap'];
            $this->redirect('admin/dashboard');
        } else {
            $_SESSION['login_error'] = 'Username atau password salah.';
            $this->redirect('admin/login');
        }
    }

    public function logout() {
        session_destroy();
        $this->redirect('admin/login');
    }

    public function dashboard() {
        $this->requireAdmin();
        $postModel = new Post();
        $pengurusModel = new Pengurus();
        $galeriModel = new Galeri();
        $aspirasiModel = new Aspirasi();

        $stats = [
            'berita'   => $postModel->count(),
            'pengurus' => $pengurusModel->count(),
            'galeri'   => $galeriModel->count(),
            'aspirasi' => $aspirasiModel->countNew(),
        ];
        $beritaTerbaru = $postModel->getAllAdmin();
        $this->viewPlain('admin/dashboard', compact('stats', 'beritaTerbaru'));
    }
}
