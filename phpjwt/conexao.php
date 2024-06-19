<?php

// Credencias do banco de dados
$host = "localhost";
$user = "root";
$pass = "123456";
$dbname = "jwt";
$port = 3306;

try
{
    $conn = new PDO("mysql:host=$host;dbname=" . $dbname, $user, $pass);
}
catch(PDOException $err)
{
    echo "Erro: Conexão com banco de dados não realizado com sucesso. Erro gerado " . $err->getMessage();
}
