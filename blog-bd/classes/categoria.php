<?php

require_once 'classe.php';

class CategoriaCrud
{
	function SalvarCategoria($nome)
	{
		try
		{
            $conecta = new Sistema();
            $link = $conecta->conectado();
			$sql = $link->prepare("INSERT INTO categoria (nomecat) VALUES (:nome)");
			$sql->bindparam(":nome",$nome);
			$sql->execute();
            return true;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
            return false;
		}

	}

    function PegaDadosCategoria($id, $campo)
	{
        $conecta = new Sistema();
        $link = $conecta->conectado();

        $sql = $link->prepare("SELECT * FROM categoria WHERE idcat=:id");
		$sql->execute([':id' => $id]);
		$dados=$sql->fetch(PDO::FETCH_ASSOC);
		return $dados[$campo];
	}

	function AlteraCategoria($id, $nome)
	{
		try
		{
            $conecta = new Sistema();
            $link = $conecta->conectado();
			$sql = $link->prepare("UPDATE categoria SET nomecat=:nome WHERE idcat=:id");
			$sql->bindparam(":nome",$nome);
			$sql->bindparam(":id",$id);
			$sql->execute();
            if($sql->rowCount() > 0)
            {
              msg('success','Categoria alterada com sucesso!');
              redireciona(3, 'gerenciar.php');
            }
            else
            {
              msg('danger','Falha ao atualizar Categoria!');
              redireciona(3, 'gerenciar.php');
            }
            //return true;
		}
		catch(PDOException $e)
		{
            msg('danger','Falha ao atualizar Categoria!'.$e->getMessage());
            redireciona(3, 'gerenciar.php');
            //echo $e->getMessage();
            //return false;
		}
	}

	function RemoverCategoria($id, $destino)
	{
        $conecta = new Sistema();
        $link = $conecta->conectado();
        $sql = $link->prepare("DELETE FROM categoria WHERE idcat=:id");
		$sql->bindparam(":id",$id);
		$sql->execute();
        if ($sql->rowCount())
        {
            msg('success', 'Categoria excluido com sucesso!');
            redireciona(3, $destino);
        }
        else
        {
            msg('danger', 'Não foi possivel remover o Categoria');
            redireciona(3, $destino);
        }
		//return true;
	}

}
