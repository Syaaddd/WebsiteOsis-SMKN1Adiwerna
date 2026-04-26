<?php
class Pengaturan {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function getAll() {
        $rows = $this->db->fetchAll("SELECT `key`, `value` FROM pengaturan");
        $result = [];
        foreach ($rows as $row) {
            $result[$row['key']] = $row['value'];
        }
        return $result;
    }

    public function get($key, $default = '') {
        $row = $this->db->fetchOne("SELECT `value` FROM pengaturan WHERE `key`=?", [$key], 's');
        return $row ? $row['value'] : $default;
    }

    public function set($key, $value) {
        $this->db->query(
            "INSERT INTO pengaturan (`key`, `value`) VALUES (?,?) ON DUPLICATE KEY UPDATE `value`=VALUES(`value`)",
            [$key, $value],
            'ss'
        );
    }

    public function setMany(array $data) {
        foreach ($data as $key => $value) {
            $this->set($key, $value);
        }
    }
}
