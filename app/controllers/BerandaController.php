<?php
require_once APP_PATH . '/models/Post.php';
require_once APP_PATH . '/models/Pengurus.php';
require_once APP_PATH . '/models/Galeri.php';
require_once APP_PATH . '/models/Bidang.php';
require_once APP_PATH . '/models/Pengaturan.php';

class BerandaController extends Controller {
    public function index() {
        $post       = new Post();
        $pengurus   = new Pengurus();
        $galeri     = new Galeri();
        $bidang     = new Bidang();
        $pengaturan = new Pengaturan();

        $berita       = $post->getAll(3);
        $pengumuman   = $post->getAll(3, 'pengumuman');
        $pengurusInti = $pengurus->getInti();
        $fotoGaleri   = $galeri->getAll(6);
        $bidangList   = $bidang->getAll();

        $settings = $pengaturan->getAll();
        $heroStats = [
            ['num' => $settings['stat_1_num']   ?? '38+', 'label' => $settings['stat_1_label'] ?? 'Anggota Aktif'],
            ['num' => $settings['stat_2_num']   ?? '12',  'label' => $settings['stat_2_label'] ?? 'Kegiatan / Tahun'],
            ['num' => $settings['stat_3_num']   ?? '50+', 'label' => $settings['stat_3_label'] ?? 'Prestasi'],
        ];

        $this->view('beranda/index', compact('berita', 'pengumuman', 'pengurusInti', 'fotoGaleri', 'bidangList', 'heroStats'));
    }
}
