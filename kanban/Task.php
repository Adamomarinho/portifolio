<?php
require_once 'db.php';

class Task {
    private $conn;
    public $id;
    public $title;
    public $description;
    public $status;
    public $team_id;
    public $assignee_id;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function create($title, $description, $status, $team_id, $assignee_id) {
        $sql = "INSERT INTO tasks (title, description, status, team_id, assignee_id) VALUES (:title, :description, :status, :team_id, :assignee_id)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':title' => $title,
            ':description' => $description,
            ':status' => $status,
            ':team_id' => $team_id,
            ':assignee_id' => $assignee_id
        ]);
    }

    public function read($id) {
        $sql = "SELECT * FROM tasks WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $title, $description, $status, $team_id, $assignee_id) {
        $sql = "UPDATE tasks SET title = :title, description = :description, status = :status, team_id = :team_id, assignee_id = :assignee_id WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':id' => $id,
            ':title' => $title,
            ':description' => $description,
            ':status' => $status,
            ':team_id' => $team_id,
            ':assignee_id' => $assignee_id
        ]);
    }

    public function updateStatus($id, $status) {
        $stmt = $this->conn->prepare("UPDATE tasks SET status = ? WHERE id = ?");
        $stmt->execute([$status, $id]);
    }

    public function delete($id) {
        $sql = "DELETE FROM tasks WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);
    }

    public function getAll() {
        $stmt = $this->conn->query("SELECT * FROM tasks");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
?>