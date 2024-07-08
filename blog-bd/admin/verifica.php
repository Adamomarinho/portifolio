<?php

require '../classes/login.php';

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

$login = new Login();
$login->logar($usuario,$senha);

?>