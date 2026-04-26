<?php
require_once APP_PATH . '/models/Bidang.php';

class AdminBidangController extends Controller {
    private Bidang $model;

    public function __construct() {
        $this->model = new Bidang();
    }

    public function index() {
        $this->requireAdmin();
        $list = $this->model->getAll();
        $this->viewPlain('admin/bidang/index', compact('list'));
    }

    public function create() {
        $this->requireAdmin();
        $this->viewPlain('admin/bidang/form', ['bidang' => null, 'error' => null]);
    }

    public function store() {
        $this->requireAdmin();
        $nama   = trim($_POST['nama'] ?? '');
        $icon   = trim($_POST['icon'] ?? '📋');
        $slug   = $this->makeSlug($nama);
        $urutan = (int)($_POST['urutan'] ?? 0);

        if ($nama === '') {
            $this->viewPlain('admin/bidang/form', ['bidang' => null, 'error' => 'Nama bidang wajib diisi.']);
            return;
        }
        if ($this->model->slugExists($slug)) {
            $this->viewPlain('admin/bidang/form', ['bidang' => compact('nama', 'icon', 'slug', 'urutan'), 'error' => 'Bidang dengan nama tersebut sudah ada.']);
            return;
        }
        $this->model->create(compact('nama', 'icon', 'slug', 'urutan'));
        $this->redirect('admin/bidang');
    }

    public function edit($id) {
        $this->requireAdmin();
        $bidang = $this->model->getById($id);
        if (!$bidang) { $this->redirect('admin/bidang'); return; }
        $this->viewPlain('admin/bidang/form', ['bidang' => $bidang, 'error' => null]);
    }

    public function update($id) {
        $this->requireAdmin();
        $nama   = trim($_POST['nama'] ?? '');
        $icon   = trim($_POST['icon'] ?? '📋');
        $slug   = $this->makeSlug($nama);
        $urutan = (int)($_POST['urutan'] ?? 0);

        if ($nama === '') {
            $bidang = $this->model->getById($id);
            $this->viewPlain('admin/bidang/form', ['bidang' => $bidang, 'error' => 'Nama bidang wajib diisi.']);
            return;
        }
        if ($this->model->slugExists($slug, $id)) {
            $bidang = $this->model->getById($id);
            $this->viewPlain('admin/bidang/form', ['bidang' => $bidang, 'error' => 'Bidang dengan nama tersebut sudah ada.']);
            return;
        }
        $this->model->update($id, compact('nama', 'icon', 'slug', 'urutan'));
        $this->redirect('admin/bidang');
    }

    public function delete($id) {
        $this->requireAdmin();
        $this->model->delete($id);
        $this->redirect('admin/bidang');
    }

    private function makeSlug($text) {
        $text = strtolower(trim($text));
        $text = preg_replace('/\s+/', '-', $text);
        $text = preg_replace('/[^a-z0-9\-]/', '', $text);
        return $text;
    }
}
