<?php
require_once APP_PATH . '/models/Post.php';

class AdminPostController extends Controller {
    private Post $model;

    public function __construct() {
        $this->model = new Post();
    }

    public function index() {
        $this->requireAdmin();
        $posts = $this->model->getAllAdmin();
        $this->viewPlain('admin/posts/index', compact('posts'));
    }

    public function create() {
        $this->requireAdmin();
        $this->viewPlain('admin/posts/form', ['post' => null]);
    }

    public function store() {
        $this->requireAdmin();
        $thumbnail = null;
        if (!empty($_FILES['thumbnail']['name'])) {
            $thumbnail = $this->uploadImage($_FILES['thumbnail']);
        }
        $this->model->create([
            'judul'     => $_POST['judul'],
            'konten'    => $_POST['konten'],
            'kategori'  => $_POST['kategori'],
            'status'    => $_POST['status'],
            'thumbnail' => $thumbnail,
            'user_id'   => $_SESSION['admin_id'],
        ]);
        $this->redirect('admin/posts');
    }

    public function edit($id) {
        $this->requireAdmin();
        $post = $this->model->getById($id);
        $this->viewPlain('admin/posts/form', compact('post'));
    }

    public function update($id) {
        $this->requireAdmin();
        $existing = $this->model->getById($id);
        $thumbnail = $existing['thumbnail'];
        if (!empty($_FILES['thumbnail']['name'])) {
            $thumbnail = $this->uploadImage($_FILES['thumbnail']);
        }
        $this->model->update($id, [
            'judul'     => $_POST['judul'],
            'konten'    => $_POST['konten'],
            'kategori'  => $_POST['kategori'],
            'status'    => $_POST['status'],
            'thumbnail' => $thumbnail,
        ]);
        $this->redirect('admin/posts');
    }

    public function delete($id) {
        $this->requireAdmin();
        $this->model->delete($id);
        $this->redirect('admin/posts');
    }

    private function uploadImage($file) {
        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $allowed = ['jpg','jpeg','png','webp'];
        if (!in_array($ext, $allowed)) return null;
        $name = uniqid('img_') . '.' . $ext;
        move_uploaded_file($file['tmp_name'], UPLOAD_PATH . '/' . $name);
        return $name;
    }
}
