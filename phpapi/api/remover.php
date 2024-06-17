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
    
    if($item->RemoverUsuario())
    {
        echo json_encode("Usuario apagado com sucesso.");
    } 
    else
    {
        echo json_encode("Usuario não pode ser removido.");
    }
?>