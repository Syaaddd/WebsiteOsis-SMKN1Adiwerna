<?php
require_once APP_PATH . '/models/Post.php';

class BeritaController extends Controller {
    public function index() {
        $post = new Post();
        $kategori = $_GET['kategori'] ?? null;
        $berita = $post->getAll(null, $kategori);
        $this->view('berita/index', compact('berita', 'kategori'));
    }

    public function detail($slug) {
        $post = new Post();
        $artikel = $post->getBySlug($slug);
        if (!$artikel) { http_response_code(404); echo '404'; return; }
        $terkait = $post->getAll(3, $artikel['kategori']);
        $this->view('berita/detail', compact('artikel', 'terkait'));
    }
}
