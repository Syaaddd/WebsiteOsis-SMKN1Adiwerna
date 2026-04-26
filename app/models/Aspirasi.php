<?php
class Aspirasi {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function create($data) {
        $this->db->query(
            "INSERT INTO aspirasi (nama,pengirim,isi,status) VALUES (?,?,?,'baru')",
            [$data['nama'] ?? 'Anonim', $data['pengirim'] ?? null, $data['isi']],
            'sss'
        );
    }

    public function getAll() {
        return $this->db->fetchAll("SELECT * FROM aspirasi ORDER BY created_at DESC");
    }

    public function markRead($id) {
        $this->db->query("UPDATE aspirasi SET status='dibaca' WHERE id=?", [$id], 'i');
    }

    public function delete($id) {
        $this->db->query("DELETE FROM aspirasi WHERE id=?", [$id], 'i');
    }

    public function countNew() {
        $r = $this->db->fetchOne("SELECT COUNT(*) as n FROM aspirasi WHERE status='baru'");
        return $r['n'];
    }
}
