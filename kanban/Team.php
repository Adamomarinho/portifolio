<?php
require_once 'db.php';

class Team {
    private $conn;
    public $id;
    public $name;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function create($name) {
        $sql = "INSERT INTO teams (name) VALUES (:name)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':name' => $name]);
    }

    public function read($id) {
        $sql = "SELECT * FROM teams WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $name) {
        $sql = "UPDATE teams SET name = :name WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':id' => $id,
            ':name' => $name
        ]);
    }

    public function delete($id) {
        $sql = "DELETE FROM teams WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);
    }

    public function addUser($team_id, $user_id) {
        $sql = "INSERT INTO team_members (team_id, user_id) VALUES (:team_id, :user_id)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':team_id' => $team_id,
            ':user_id' => $user_id
        ]);
    }

    public function removeUser($team_id, $user_id) {
        $sql = "DELETE FROM team_members WHERE team_id = :team_id AND user_id = :user_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':team_id' => $team_id,
            ':user_id' => $user_id
        ]);
    }

    public function getAll() {
        $stmt = $this->conn->query("SELECT * FROM teams");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
?>