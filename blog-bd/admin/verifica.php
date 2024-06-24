<?php

        include '../classes/classe.php';

        //$info = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        $user = $_POST['usuario'];
        $senha = $_POST['senha'];
        $formulario = $_POST['login'];

        //var_dump($_POST);

        if (empty($_POST['Login'])) 
        {
            //var_dump($_POST);
            $link = new Sistema();
            $linka = $link->conectado();
            $linka->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT idusuario, nomeuser, emailuser, senha FROM usuario WHERE emailuser =:usuario LIMIT 1";
            $sql = $linka->prepare($sql);
            $sql->bindParam(':usuario', $user, PDO::PARAM_STR);
            $sql->execute();
    
            if(($sql) AND ($sql->rowCount() != 0))
            {
                $usuario = $sql->fetch(PDO::FETCH_ASSOC);
                //var_dump($usuario,$sql);
                if(password_verify($senha, $usuario['senha']))
                {
                    $_SESSION['id'] = $usuario['idusuario'];
                    $_SESSION['nome'] = $usuario['nomeuser'];
                    //var_dump($_SESSION);
                    header("Location: dashboard.php");
                }
                else
                {
                    $_SESSION['msg'] = msg('danger','Erro: Usuário ou senha inválida!');
                }
            }
            else
            {
                $_SESSION['msg'] = msg('danger','Erro: Usuário ou senha inválida!');
            }
    
            
        }
        if(isset($_SESSION['msg']))
        {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }

?>