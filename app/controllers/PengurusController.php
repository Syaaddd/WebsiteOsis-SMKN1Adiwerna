<?php
require_once APP_PATH . '/models/Pengurus.php';

class PengurusController extends Controller {
    public function index() {
        $m = new Pengurus();
        $semua = $m->getAll();
        $grouped = [];
        foreach ($semua as $p) $grouped[$p['bidang']][] = $p;
        $this->view('pengurus/index', compact('grouped'));
    }
}
