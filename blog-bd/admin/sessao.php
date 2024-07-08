<?php

class VerificaUser
{

    function SessaoUsuario($destino)
    {
        session_start();
        ob_start();
        if((!isset($_SESSION['id'])) AND (!isset($_SESSION['nome'])))
        {
            unset($_SESSION['id'], $_SESSION['nome']);
            $_SESSION['msg'] = msg('danger','Erro: Necessário realizar o login para acessar a página!');
            $destino = '../blog.php';
            redireciona(3, $destino);
        }
    }

    function VerificaUsuario()
    {
        session_start();
        ob_start();
        if((isset($_SESSION['id'])) AND (isset($_SESSION['nome'])))
        {
            $usuario = $_SESSION['nome'];
            if($usuario == 'Admin')
            {
                redireciona(3, 'dashboard.php');
            }
            if($usuario == 'Escritor')
            {
                redireciona(3, 'escritor.php');
            }
        }
    }


}

?>
