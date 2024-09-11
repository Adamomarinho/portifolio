<?php
require_once 'db.php';

class UserLevel {
    private $conn;
    public $id;
    public $name;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function create($name) {
        $sql = "INSERT INTO user_levels (name) VALUES (:name)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':name' => $name]);
    }

    public function read($id) {
        $sql = "SELECT * FROM user_levels WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $name) {
        $sql = "UPDATE user_levels SET name = :name WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':id' => $id,
            ':name' => $name
        ]);
    }

    public function delete($id) {
        $sql = "DELETE FROM user_levels WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);
    }

    public function getAll() {
        $stmt = $this->conn->query("SELECT * FROM user_levels");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
?>