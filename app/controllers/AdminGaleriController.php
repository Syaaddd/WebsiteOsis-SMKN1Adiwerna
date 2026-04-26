<?php
require_once APP_PATH . '/models/Galeri.php';

class AdminGaleriController extends Controller {
    private Galeri $model;

    public function __construct() {
        $this->model = new Galeri();
    }

    public function index() {
        $this->requireAdmin();
        $foto = $this->model->getAll();
        $this->viewPlain('admin/galeri/index', compact('foto'));
    }

    public function upload() {
        $this->requireAdmin();
        if (!empty($_FILES['foto']['name'])) {
            $ext = strtolower(pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION));
            if (in_array($ext, ['jpg','jpeg','png','webp','gif'])) {
                $name = uniqid('gal_') . '.' . $ext;
                move_uploaded_file($_FILES['foto']['tmp_name'], UPLOAD_PATH . '/' . $name);
                $this->model->create([
                    'judul'     => htmlspecialchars($_POST['judul'] ?? 'Foto Kegiatan'),
                    'file_path' => $name,
                ]);
            }
        }
        $this->redirect('admin/galeri');
    }

    public function delete($id) {
        $this->requireAdmin();
        $item = $this->model->delete($id);
        if ($item && file_exists(UPLOAD_PATH . '/' . $item['file_path'])) {
            unlink(UPLOAD_PATH . '/' . $item['file_path']);
        }
        $this->model->deleteById($id);
        $this->redirect('admin/galeri');
    }
}
