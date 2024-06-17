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

    $item->id = isset($_GET['id']) ? $_GET['id'] : die();
  
    $item->VerUsuario();

    if($item->nome != null)
    {
        // create array
        $emp_arr = array(
            "id" =>  $item->id,
            "nome" => $item->nome,
            "email" => $item->email,
            "idade" => $item->idade,
            "funcao" => $item->funcao,
            "criado" => $item->criado
        );
        http_response_code(200);
        echo json_encode($emp_arr);
    }
    else
    {
        http_response_code(404);
        echo json_encode("Usuario não encontrado.");
    }
?>