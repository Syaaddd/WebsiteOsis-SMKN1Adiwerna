<?php
class Pengurus {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function getInti() {
        return $this->db->fetchAll("SELECT * FROM pengurus WHERE bidang='inti' ORDER BY id ASC");
    }

    public function getByBidang($bidang) {
        return $this->db->fetchAll("SELECT * FROM pengurus WHERE bidang=? ORDER BY id ASC", [$bidang], 's');
    }

    public function getAll() {
        return $this->db->fetchAll("SELECT * FROM pengurus ORDER BY bidang, id ASC");
    }

    public function getById($id) {
        return $this->db->fetchOne("SELECT * FROM pengurus WHERE id=?", [$id], 'i');
    }

    public function create($data) {
        $this->db->query(
            "INSERT INTO pengurus (nama,jabatan,bidang,kelas,foto,periode) VALUES (?,?,?,?,?,?)",
            [$data['nama'], $data['jabatan'], $data['bidang'], $data['kelas'] ?? null, $data['foto'] ?? null, $data['periode'] ?? date('Y')],
            'ssssss'
        );
    }

    public function update($id, $data) {
        $this->db->query(
            "UPDATE pengurus SET nama=?,jabatan=?,bidang=?,kelas=?,foto=?,periode=? WHERE id=?",
            [$data['nama'], $data['jabatan'], $data['bidang'], $data['kelas'] ?? null, $data['foto'] ?? null, $data['periode'] ?? date('Y'), $id],
            'ssssssi'
        );
    }

    public function delete($id) {
        $this->db->query("DELETE FROM pengurus WHERE id=?", [$id], 'i');
    }

    public function count() {
        $r = $this->db->fetchOne("SELECT COUNT(*) as n FROM pengurus");
        return $r['n'];
    }
}
