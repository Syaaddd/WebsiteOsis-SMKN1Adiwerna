<?php
class Post {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function getAll($limit = null, $kategori = null) {
        $sql = "SELECT p.*, u.nama_lengkap as penulis FROM posts p LEFT JOIN users u ON p.user_id = u.id WHERE p.status='published'";
        $params = []; $types = '';
        if ($kategori) { $sql .= " AND p.kategori=?"; $params[] = $kategori; $types .= 's'; }
        $sql .= " ORDER BY p.created_at DESC";
        if ($limit) { $sql .= " LIMIT ?"; $params[] = $limit; $types .= 'i'; }
        return $this->db->fetchAll($sql, $params, $types);
    }

    public function getBySlug($slug) {
        return $this->db->fetchOne("SELECT p.*, u.nama_lengkap as penulis FROM posts p LEFT JOIN users u ON p.user_id = u.id WHERE p.slug=? AND p.status='published'", [$slug], 's');
    }

    public function getAllAdmin() {
        return $this->db->fetchAll("SELECT p.*, u.nama_lengkap as penulis FROM posts p LEFT JOIN users u ON p.user_id = u.id ORDER BY p.created_at DESC");
    }

    public function getById($id) {
        return $this->db->fetchOne("SELECT * FROM posts WHERE id=?", [$id], 'i');
    }

    public function create($data) {
        $slug = $this->makeSlug($data['judul']);
        $slug = $this->uniqueSlug($slug);
        $this->db->query(
            "INSERT INTO posts (judul,slug,konten,kategori,thumbnail,user_id,status) VALUES (?,?,?,?,?,?,?)",
            [$data['judul'], $slug, $data['konten'], $data['kategori'], $data['thumbnail'] ?? null, $data['user_id'], $data['status'] ?? 'published'],
            'sssssss'
        );
        return $this->db->lastInsertId();
    }

    public function update($id, $data) {
        $this->db->query(
            "UPDATE posts SET judul=?,konten=?,kategori=?,thumbnail=?,status=? WHERE id=?",
            [$data['judul'], $data['konten'], $data['kategori'], $data['thumbnail'] ?? null, $data['status'] ?? 'published', $id],
            'sssssi'
        );
    }

    public function delete($id) {
        $this->db->query("DELETE FROM posts WHERE id=?", [$id], 'i');
    }

    public function count() {
        $r = $this->db->fetchOne("SELECT COUNT(*) as n FROM posts WHERE status='published'");
        return $r['n'];
    }

    private function makeSlug($str) {
        $str = strtolower(trim($str));
        $str = preg_replace('/[^a-z0-9\s-]/', '', $str);
        return preg_replace('/[\s-]+/', '-', $str);
    }

    private function uniqueSlug($slug) {
        $base = $slug; $i = 1;
        while ($this->db->fetchOne("SELECT id FROM posts WHERE slug=?", [$slug], 's')) {
            $slug = $base . '-' . $i++;
        }
        return $slug;
    }
}
