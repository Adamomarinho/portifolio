<?php    

session_start();
ob_start();

//include '../classes/classe.php';
include '../classes/login.php';

$sair = '../blog.php';
$logado = new Login();
$logado->VerificaUsuario();

?>