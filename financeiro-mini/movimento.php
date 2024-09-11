<?php
require_once 'db.php';

class Movimento {
    private $conn;
    private $table_name = "movimento";

    public $id;
    public $tipo;
    public $data;
    public $categoria;
    public $descricao;
    public $valor;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET tipo = :tipo, data = :data, categoria = :categoria, descricao = :descricao, valor = :valor";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':tipo', $this->tipo);
        $stmt->bindParam(':data', $this->data);
        $stmt->bindParam(':categoria', $this->categoria);
        $stmt->bindParam(':descricao', $this->descricao);
        $stmt->bindParam(':valor', $this->valor);
        return $stmt->execute();
    }

    public function read($start_date, $end_date) {
        $query = "SELECT m.id, m.tipo, m.data, c.nome as categoria, m.descricao, m.valor 
                  FROM " . $this->table_name . " m
                  LEFT JOIN categoria c ON m.categoria = c.id
                  WHERE m.data BETWEEN :start_date AND :end_date";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':start_date', $start_date);
        $stmt->bindParam(':end_date', $end_date);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function calculateBalance($start_date, $end_date) {
        $query = "SELECT SUM(valor) as saldo FROM " . $this->table_name . " WHERE data BETWEEN :start_date AND :end_date";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':start_date', $start_date);
        $stmt->bindParam(':end_date', $end_date);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['saldo'] ? $row['saldo'] : 0;
    }
}
?>
