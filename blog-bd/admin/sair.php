<?php
session_start();
ob_start();

include_once '../classes/classe.php';

unset($_SESSION['id'], $_SESSION['nome']);
$destino = '../blog.php';
redireciona(3, $destino);

//header("Location: ../index.php");

?>