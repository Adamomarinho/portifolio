<?php

require_once 'classe.php';

class NivelCrud
{	
	function SalvarNivel($nome)
	{
		try
		{
            $conecta = new Sistema();
            $link = $conecta->conectado();
			$sql = $link->prepare("INSERT INTO nivel (nomenivel) VALUES (:nome)");
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

    function PegaDadosNivel($id, $campo)
	{
        $conecta = new Sistema();
        $link = $conecta->conectado();
        
        $sql = $link->prepare("SELECT * FROM nivel WHERE idnivel=:id");
		$sql->execute([':id' => $id]);
		$dados=$sql->fetch(PDO::FETCH_ASSOC);
		return $dados[$campo];
	}
	
	function AlteraNivel($id, $nome)
	{
		try
		{
            $conecta = new Sistema();
            $link = $conecta->conectado();
			$sql = $link->prepare("UPDATE nivel SET nomenivel=:nome WHERE idnivel=:id");
			$sql->bindparam(":nome",$nome);
			$sql->bindparam(":id",$id);
			$sql->execute();
            if($sql->rowCount() > 0)
            {
              msg('success','Nivel alterado com sucesso!');
              redireciona(3, 'gerenciar.php');
            }
            else
            {
              msg('danger','Falha ao atualizar Nivel!');
              redireciona(3, 'gerenciar.php');
            }
            //return true;
		}
		catch(PDOException $e)
		{
            msg('danger','Falha ao atualizar Nivel!'.$e->getMessage());
            redireciona(3, 'gerenciar.php');
            //echo $e->getMessage();			
            //return false;
		}
	}
	
	function RemoverNivel($id, $destino)
	{
        $conecta = new Sistema();
        $link = $conecta->conectado();
        $sql = $link->prepare("DELETE FROM nivel WHERE idnivel=:id");
		$sql->bindparam(":id",$id);
		$sql->execute();
        if ($sql->rowCount())
        {
            msg('success', 'Nivel excluido com sucesso!');
            redireciona(3, $destino);
        }
        else
        {
            msg('danger', 'Não foi possivel remover o Nivel');
            redireciona(3, $destino);
        }
		//return true;
	}
	
}
