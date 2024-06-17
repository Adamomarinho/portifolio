<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    include_once '../config/bd.php';
    include_once '../class/usuarios.php';

    $bd = new Bd();
    $db = $bd->Conecta();

    $items = new Usuario($db);

    $stmt = $items->VerUsuarios();
    $itemCount = $stmt->rowCount();


    echo json_encode($itemCount);

    if($itemCount > 0)
    {
        
        $employeeArr = array();
        $employeeArr["body"] = array();
        $employeeArr["itemCount"] = $itemCount;

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);
            $e = array(
                "id" => $id,
                "nome" => $nome,
                "email" => $email,
                "idade" => $idade,
                "funcao" => $funcao,
                "criado" => $criado
            );

            array_push($employeeArr["body"], $e);
        }
        echo json_encode($employeeArr);
    }
    else
    {
        http_response_code(404);
        echo json_encode(
            array("message" => "Nenhum registro encontrado.")
        );
    }
?>
