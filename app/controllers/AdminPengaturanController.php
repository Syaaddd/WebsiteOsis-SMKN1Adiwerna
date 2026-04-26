<?php
require_once APP_PATH . '/models/Pengaturan.php';

class AdminPengaturanController extends Controller {
    private Pengaturan $model;

    public function __construct() {
        $this->model = new Pengaturan();
    }

    public function index() {
        $this->requireAdmin();
        $settings = $this->model->getAll();
        $success  = $_SESSION['pengaturan_success'] ?? null;
        unset($_SESSION['pengaturan_success']);
        $this->viewPlain('admin/pengaturan/index', compact('settings', 'success'));
    }

    public function update() {
        $this->requireAdmin();

        $allowed = [
            'stat_1_num', 'stat_1_label',
            'stat_2_num', 'stat_2_label',
            'stat_3_num', 'stat_3_label',
            'nama_site', 'deskripsi',
            'instagram', 'youtube', 'facebook', 'tiktok',
        ];

        $data = [];
        foreach ($allowed as $key) {
            if (isset($_POST[$key])) {
                $data[$key] = trim($_POST[$key]);
            }
        }

        $this->model->setMany($data);
        $_SESSION['pengaturan_success'] = 'Pengaturan berhasil disimpan.';
        $this->redirect('admin/pengaturan');
    }
}
