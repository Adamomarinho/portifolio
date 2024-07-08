<?php

session_start();
ob_start();

require '../classes/login.php';
$destino = 'localhost/blogapi/blog.php';
$login = new Login();
$login->Deslogar($destino);

/*
include_once '../classes/classe.php';
unset($_SESSION['id'], $_SESSION['nome']);
$destino = '../blog.php';
redireciona(3, $destino);
*/
?>