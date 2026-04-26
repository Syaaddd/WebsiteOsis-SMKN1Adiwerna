<?php
require_once APP_PATH . '/models/Aspirasi.php';

class AdminAspirasiController extends Controller {
    public function index() {
        $this->requireAdmin();
        $m = new Aspirasi();
        $list = $m->getAll();
        $this->viewPlain('admin/aspirasi/index', compact('list'));
    }

    public function delete($id) {
        $this->requireAdmin();
        $m = new Aspirasi();
        $m->delete($id);
        $this->redirect('admin/aspirasi');
    }
}
