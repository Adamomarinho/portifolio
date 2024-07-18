<?php

require_once 'classe.php';

class UsuarioCrud
{
	function SalvarUsuario($nome, $email, $senha, $situacao, $nivel)
	{
		try
		{
            $conecta = new Sistema();
            $link = $conecta->conectado();
			$sql = $link->prepare("INSERT INTO usuario (nomeuser, emailuser, senha, situacaouser, idnivel) VALUES (:nome, :email, :senha, :situacao, :nivel)");
			$sql->bindparam(":nome",$nome);
            $sql->bindparam(":email",$email);
            $sql->bindparam(":senha",$senha);
            $sql->bindparam(":situacao",$situacao);
            $sql->bindparam(":nivel",$nivel);
			$sql->execute();
            return true;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
            return false;
		}

	}

    function SalvarUsuarioExterno($nome, $email, $senha, $situacao, $nivel)
	{
		try
		{
            $conecta = new Sistema();
            $link = $conecta->conectado();
			$sql = $link->prepare("INSERT INTO usuario (nomeuser, emailuser, senha, situacaouser, idnivel) VALUES (:nome, :email, :senha, :situacao, :nivel)");
			$sql->bindparam(":nome",$nome);
            $sql->bindparam(":email",$email);
            $sql->bindparam(":senha",$senha);
            $sql->bindparam(":situacao",$situacao);
            $sql->bindparam(":nivel",$nivel);
			$sql->execute();
            return true;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
            return false;
		}

	}

    function PegaDadosUsuario($id, $campo)
	{
        $conecta = new Sistema();
        $link = $conecta->conectado();

        $sql = $link->prepare("SELECT * FROM usuario WHERE idusuario=:id");
		$sql->execute([':id' => $id]);
		$dados=$sql->fetch(PDO::FETCH_ASSOC);
		return $dados[$campo];
	}

	function AlteraUsuario($id, $nome, $email, $senha, $situacao, $nivel)
	{
		try
		{
            $conecta = new Sistema();
            $link = $conecta->conectado();
			$sql = $link->prepare("UPDATE usuario SET nomeuser=:nome, emailuser=:email, senha=:senha, situacaouser=:situacao, idnivel=:nivel WHERE idusuario=:id");
			$sql->bindparam(":nome",$nome);
            $sql->bindparam(":email",$email);
            $sql->bindparam(":senha",$senha);
            $sql->bindparam(":situacao",$situacao);
            $sql->bindparam(":nivel",$nivel);
			$sql->bindparam(":id",$id);
			$sql->execute();
            if($sql->rowCount() > 0)
            {
              msg('success','Usuario alterado com sucesso!');
              redireciona(3, 'gerenciar.php');
            }
            else
            {
              msg('danger','Falha ao atualizar Usuario!');
              redireciona(3, 'gerenciar.php');
            }
            //return true;
		}
		catch(PDOException $e)
		{
            msg('danger','Falha ao atualizar Usuario!'.$e->getMessage());
            redireciona(3, 'gerenciar.php');
            //echo $e->getMessage();
            //return false;
		}
	}

	function RemoverUsuario($id, $destino)
	{
        $conecta = new Sistema();
        $link = $conecta->conectado();
        $sql = $link->prepare("DELETE FROM usuario WHERE idusuario=:id");
		$sql->bindparam(":id",$id);
		$sql->execute();
        if ($sql->rowCount())
        {
            msg('success', 'Usuario excluido com sucesso!');
            redireciona(3, $destino);
        }
        else
        {
            msg('danger', 'Não foi possivel remover o Usuario');
            redireciona(3, $destino);
        }
		//return true;
	}

}
