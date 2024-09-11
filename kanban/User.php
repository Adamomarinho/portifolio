<?php
require_once 'db.php';

class User {
    private $conn;
    public $id;
    public $username;
    public $password;
    public $level_id;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function create($username, $password, $level_id) {
        $sql = "INSERT INTO users (username, password, level_id) VALUES (:username, :password, :level_id)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':username' => $username,
            ':password' => password_hash($password, PASSWORD_BCRYPT),
            ':level_id' => $level_id
        ]);
    }

    public function read($id) {
        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $username, $password, $level_id) {
        $sql = "UPDATE users SET username = :username, password = :password, level_id = :level_id WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':id' => $id,
            ':username' => $username,
            ':password' => password_hash($password, PASSWORD_BCRYPT),
            ':level_id' => $level_id
        ]);
    }

    public function delete($id) {
        $sql = "DELETE FROM users WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);
    }

    public function getAll() {
        $stmt = $this->conn->query("SELECT * FROM users");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
?>