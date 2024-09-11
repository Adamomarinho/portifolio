<?php
//require_once 'db.php';
require_once 'movimento.php';
require_once 'categoria.php';
require_once 'class_relatorio.php'; 

// Criar uma instância da conexão com o banco de dados
$database = new Database();
$db = $database->getConnection();

// Criar uma instância da classe Relatorio
$relatorio = new Relatorio($db);

// Obter as datas da query string (GET)
$start_date = isset($_GET['start_date']) ? $_GET['start_date'] : date('Y-m-01');
$end_date = isset($_GET['end_date']) ? $_GET['end_date'] : date('Y-m-t');

// Gerar o PDF
$relatorio->gerarPDF($start_date, $end_date);
?>