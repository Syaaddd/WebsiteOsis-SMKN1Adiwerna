<?php
class Bidang {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function getAll() {
        return $this->db->fetchAll("SELECT * FROM bidang ORDER BY urutan ASC, id ASC");
    }

    public function getById($id) {
        return $this->db->fetchOne("SELECT * FROM bidang WHERE id=?", [$id], 'i');
    }

    public function getSlugs() {
        $rows = $this->db->fetchAll("SELECT slug FROM bidang ORDER BY urutan ASC, id ASC");
        return array_column($rows, 'slug');
    }

    public function create($data) {
        $this->db->query(
            "INSERT INTO bidang (nama, icon, slug, urutan) VALUES (?,?,?,?)",
            [$data['nama'], $data['icon'] ?? '📋', $data['slug'], $data['urutan'] ?? 0],
            'sssi'
        );
    }

    public function update($id, $data) {
        $this->db->query(
            "UPDATE bidang SET nama=?, icon=?, slug=?, urutan=? WHERE id=?",
            [$data['nama'], $data['icon'] ?? '📋', $data['slug'], $data['urutan'] ?? 0, $id],
            'sssii'
        );
    }

    public function delete($id) {
        $this->db->query("DELETE FROM bidang WHERE id=?", [$id], 'i');
    }

    public function slugExists($slug, $excludeId = null) {
        if ($excludeId) {
            $r = $this->db->fetchOne("SELECT id FROM bidang WHERE slug=? AND id!=?", [$slug, $excludeId], 'si');
        } else {
            $r = $this->db->fetchOne("SELECT id FROM bidang WHERE slug=?", [$slug], 's');
        }
        return (bool) $r;
    }
}
