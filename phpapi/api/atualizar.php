<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    include_once '../config/bd.php';
    include_once '../class/usuarios.php';
    
    $bd = new Bd();
    $db = $bd->Conecta();
    
    $item = new Usuario($db);
    
    $data = json_decode(file_get_contents("php://input"));
    
    $item->id = $data->id;
    
    // employee values
    $item->nome = $data->nome;
    $item->email = $data->email;
    $item->idade = $data->idade;
    $item->funcao = $data->funcao;
    $item->criado = date('Y-m-d H:i:s');
    
    if($item->AtualizarUsuario())
    {
        echo json_encode("Dados de Usuario alterados com sucesso.");
    } 
    else
    {
        echo json_encode("Usuario não pode ser atualiado.");
    }
?>