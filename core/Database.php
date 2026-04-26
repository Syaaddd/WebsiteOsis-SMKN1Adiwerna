<?php
class Database {
    private static $instance = null;
    private $conn;

    private function __construct() {
        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ($this->conn->connect_error) {
            die('Koneksi gagal: ' . $this->conn->connect_error);
        }
        $this->conn->set_charset('utf8mb4');
    }

    public static function getInstance() {
        if (!self::$instance) self::$instance = new self();
        return self::$instance;
    }

    public function query($sql, $params = [], $types = '') {
        $stmt = $this->conn->prepare($sql);
        if ($params) $stmt->bind_param($types ?: str_repeat('s', count($params)), ...$params);
        $stmt->execute();
        return $stmt;
    }

    public function fetchAll($sql, $params = [], $types = '') {
        $stmt = $this->query($sql, $params, $types);
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function fetchOne($sql, $params = [], $types = '') {
        $stmt = $this->query($sql, $params, $types);
        return $stmt->get_result()->fetch_assoc();
    }

    public function lastInsertId() {
        return $this->conn->insert_id;
    }
}
