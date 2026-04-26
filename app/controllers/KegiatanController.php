<?php
require_once APP_PATH . '/models/Post.php';

class KegiatanController extends Controller {
    public function index() {
        $post = new Post();
        $kegiatan = $post->getAll(null, 'kegiatan');
        $this->view('kegiatan/index', compact('kegiatan'));
    }
}
