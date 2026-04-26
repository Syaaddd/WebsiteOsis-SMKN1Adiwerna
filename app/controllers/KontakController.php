<?php
require_once APP_PATH . '/models/Aspirasi.php';

class KontakController extends Controller {
    public function index() {
        $sukses = $_SESSION['aspirasi_sukses'] ?? false;
        unset($_SESSION['aspirasi_sukses']);
        $this->view('kontak/index', compact('sukses'));
    }

    public function store() {
        $isi = trim($_POST['isi'] ?? '');
        if (strlen($isi) < 10) { $this->redirect('kontak'); return; }

        $m = new Aspirasi();
        $m->create([
            'nama'     => htmlspecialchars($_POST['nama'] ?? 'Anonim'),
            'pengirim' => htmlspecialchars($_POST['email'] ?? ''),
            'isi'      => htmlspecialchars($isi),
        ]);
        $_SESSION['aspirasi_sukses'] = true;
        $this->redirect('kontak');
    }
}
