<?php

require_once 'classe.php';

class PermissoesCrud
{
	function SalvarPermissao($usuario, $situacao, $categoria, $nivel )
	{
		try
		{
            $conecta = new Sistema();
            $link = $conecta->conectado();
			$sql = $link->prepare("INSERT INTO permissao (iduser, idsituacao, idcat, idnivel) VALUES (:usuario, :situacao, :categoria, :nivel)");
			$sql->bindparam(":usuario",$usuario);
            $sql->bindparam(":situacao",$situacao);
            $sql->bindparam(":categoria",$categoria);
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

    function PegaDadosPermissao($id, $campo)
	{
        $conecta = new Sistema();
        $link = $conecta->conectado();

        $sql = $link->prepare("SELECT * FROM Permissao WHERE id=:id");
		$sql->execute([':id' => $id]);
		$dados=$sql->fetch(PDO::FETCH_ASSOC);
		return $dados[$campo];
	}

	function AlteraPermissao($id, $usuario, $situacao, $categoria, $nivel)
	{
		try
		{
            $conecta = new Sistema();
            $link = $conecta->conectado();
			$sql = $link->prepare("UPDATE permissao SET iduser=:usuario, idsituacao=:situacao, idcat=:categoria, idnivel=:nivel WHERE id=:id");
			$sql->bindparam(":usuario",$usuario);
            $sql->bindparam(":situacao",$situacao);
            $sql->bindparam(":categoria",$categoria);
            $sql->bindparam(":nivel",$nivel);
			$sql->bindparam(":id",$id);
			$sql->execute();
            if($sql->rowCount() > 0)
            {
              msg('success','Permissao alterada com sucesso!');
              redireciona(3, 'gerenciar.php');
            }
            else
            {
              msg('danger','Falha ao atualizar Permissao!');
              redireciona(3, 'gerenciar.php');
            }
            //return true;
		}
		catch(PDOException $e)
		{
            msg('danger','Falha ao atualizar Permissao!'.$e->getMessage());
            redireciona(3, 'gerenciar.php');
            //echo $e->getMessage();
            //return false;
		}
	}

	function RemoverPermissao($id, $destino)
	{
        $conecta = new Sistema();
        $link = $conecta->conectado();
        $sql = $link->prepare("DELETE FROM permissao WHERE id=:id");
		$sql->bindparam(":id",$id);
		$sql->execute();
        if ($sql->rowCount())
        {
            msg('success', 'Permissao excluida com sucesso!');
            redireciona(3, $destino);
        }
        else
        {
            msg('danger', 'Não foi possivel remover a Permissao');
            redireciona(3, $destino);
        }
		//return true;
	}

}
