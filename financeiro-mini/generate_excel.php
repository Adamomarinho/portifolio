<?php

//require_once 'db.php';
require_once 'movimento.php';
require_once 'categoria.php';
require_once 'class_relatorio.php';

$database = new Database();
$db = $database->getConnection();

$relatorio = new Relatorio($db);

$start_date = isset($_GET['start_date']) ? $_GET['start_date'] : date('Y-m-01');
$end_date = isset($_GET['end_date']) ? $_GET['end_date'] : date('Y-m-t');

$relatorio->gerarExcel($start_date, $end_date);
?>

