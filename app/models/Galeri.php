<?php
class Galeri {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function getAll($limit = null) {
        $sql = "SELECT * FROM galeri ORDER BY id DESC";
        if ($limit) $sql .= " LIMIT " . (int)$limit;
        return $this->db->fetchAll($sql);
    }

    public function getById($id) {
        return $this->db->fetchOne("SELECT * FROM galeri WHERE id=?", [$id], 'i');
    }

    public function create($data) {
        $this->db->query(
            "INSERT INTO galeri (judul,file_path,kegiatan_id) VALUES (?,?,?)",
            [$data['judul'], $data['file_path'], $data['kegiatan_id'] ?? null],
            'sss'
        );
    }

    public function delete($id) {
        return $this->db->fetchOne("SELECT file_path FROM galeri WHERE id=?", [$id], 'i');
    }

    public function deleteById($id) {
        $this->db->query("DELETE FROM galeri WHERE id=?", [$id], 'i');
    }

    public function count() {
        $r = $this->db->fetchOne("SELECT COUNT(*) as n FROM galeri");
        return $r['n'];
    }
}
