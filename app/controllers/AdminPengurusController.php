<?php
require_once APP_PATH . '/models/Pengurus.php';
require_once APP_PATH . '/models/Bidang.php';

class AdminPengurusController extends Controller {
    private Pengurus $model;
    private Bidang $bidangModel;

    public function __construct() {
        $this->model       = new Pengurus();
        $this->bidangModel = new Bidang();
    }

    public function index() {
        $this->requireAdmin();
        $list = $this->model->getAll();
        $this->viewPlain('admin/pengurus/index', compact('list'));
    }

    public function create() {
        $this->requireAdmin();
        $bidangList = $this->bidangModel->getAll();
        $this->viewPlain('admin/pengurus/form', ['pengurus' => null, 'bidangList' => $bidangList]);
    }

    public function store() {
        $this->requireAdmin();
        $foto = null;
        if (!empty($_FILES['foto']['name'])) $foto = $this->uploadImage($_FILES['foto']);
        $this->model->create([
            'nama'    => $_POST['nama'],
            'jabatan' => $_POST['jabatan'],
            'bidang'  => $_POST['bidang'],
            'kelas'   => $_POST['kelas'],
            'foto'    => $foto,
            'periode' => $_POST['periode'],
        ]);
        $this->redirect('admin/pengurus');
    }

    public function edit($id) {
        $this->requireAdmin();
        $pengurus   = $this->model->getById($id);
        $bidangList = $this->bidangModel->getAll();
        $this->viewPlain('admin/pengurus/form', compact('pengurus', 'bidangList'));
    }

    public function update($id) {
        $this->requireAdmin();
        $existing = $this->model->getById($id);
        $foto = $existing['foto'];
        if (!empty($_FILES['foto']['name'])) $foto = $this->uploadImage($_FILES['foto']);
        $this->model->update($id, [
            'nama'    => $_POST['nama'],
            'jabatan' => $_POST['jabatan'],
            'bidang'  => $_POST['bidang'],
            'kelas'   => $_POST['kelas'],
            'foto'    => $foto,
            'periode' => $_POST['periode'],
        ]);
        $this->redirect('admin/pengurus');
    }

    public function delete($id) {
        $this->requireAdmin();
        $this->model->delete($id);
        $this->redirect('admin/pengurus');
    }

    private function uploadImage($file) {
        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        if (!in_array($ext, ['jpg','jpeg','png','webp'])) return null;
        $name = uniqid('pgr_') . '.' . $ext;
        move_uploaded_file($file['tmp_name'], UPLOAD_PATH . '/' . $name);
        return $name;
    }
}
