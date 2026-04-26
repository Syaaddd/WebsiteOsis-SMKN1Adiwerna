<?php
require_once APP_PATH . '/models/Galeri.php';

class GaleriController extends Controller {
    public function index() {
        $m = new Galeri();
        $foto = $m->getAll();
        $this->view('galeri/index', compact('foto'));
    }
}
