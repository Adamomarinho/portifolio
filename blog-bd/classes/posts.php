<?php

require_once 'classe.php';

class PostsCrud
{
	function SalvarPost($titulo, $conteudo, $situacao, $categoria, $usuario)
	{
		try
		{
            $conecta = new Sistema();
            $link = $conecta->conectado();
			$sql = $link->prepare("INSERT INTO Posts (titulo, conteudo, categoria, situacao, usuario) VALUES (:titulo, :conteudo, :categoria, :situacao, :usuario)");
			$sql->bindparam(":titulo",$titulo);
            $sql->bindparam(":conteudo",$conteudo);
            $sql->bindparam(":categoria",$categoria);
            $sql->bindparam(":situacao",$situacao);
            $sql->bindparam(":usuario",$usuario);
			$sql->execute();
            return true;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
            return false;
		}

	}

    function PegaDadosPost($id, $campo)
	{
        $conecta = new Sistema();
        $link = $conecta->conectado();

        $sql = $link->prepare("SELECT * FROM Posts WHERE id=:id");
		$sql->execute([':id' => $id]);
		$dados=$sql->fetch(PDO::FETCH_ASSOC);
		return $dados[$campo];
	}

	function AlteraPost($id, $titulo, $conteudo, $situacao, $categoria, $usuario)
	{
		try
		{
            $conecta = new Sistema();
            $link = $conecta->conectado();
			$sql = $link->prepare("UPDATE Posts SET titulo=:titulo, conteudo=:conteudo, categoria=:categoria, situacao=:situacao, usuario=:usuario WHERE id=:id");
			$sql->bindparam(":titulo",$titulo);
            $sql->bindparam(":conteudo",$conteudo);
            $sql->bindparam(":categoria",$categoria);
            $sql->bindparam(":situacao",$situacao);
            $sql->bindparam(":usuario",$usuario);
			$sql->bindparam(":id",$id);
			$sql->execute();
            if($sql->rowCount() > 0)
            {
              msg('success','Post alterado com sucesso!');
              redireciona(3, 'gerenciar.php');
            }
            else
            {
              msg('danger','Falha ao atualizar Post!');
              redireciona(3, 'gerenciar.php');
            }
            //return true;
		}
		catch(PDOException $e)
		{
            msg('danger','Falha ao atualizar Post!'.$e->getMessage());
            redireciona(3, 'gerenciar.php');
            //echo $e->getMessage();
            //return false;
		}
	}

	function RemoverPost($id, $destino)
	{
        $conecta = new Sistema();
        $link = $conecta->conectado();
        $sql = $link->prepare("DELETE FROM Posts WHERE id=:id");
		$sql->bindparam(":id",$id);
		$sql->execute();
        if ($sql->rowCount())
        {
            msg('success', 'Post excluido com sucesso!');
            redireciona(3, $destino);
        }
        else
        {
            msg('danger', 'Não foi possivel remover o Post');
            redireciona(3, $destino);
        }
		//return true;
	}

}
