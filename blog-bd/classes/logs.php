<?php

require_once 'classe.php';

class Logs
{
	function SalvarLogs($usuario, $ip, $acao, $data_acao )
	{
		try
		{
            $conecta = new Sistema();
            $link = $conecta->conectado();
			$sql = $link->prepare("INSERT INTO permissao (usuario, ip, acao, data_acao) VALUES (:usuario, :ip, :acao, :data_acao)");
			$sql->bindparam(":usuario",$usuario);
            $sql->bindparam(":ip",$ip);
            $sql->bindparam(":acao",$acao);
            $sql->bindparam(":data_acao",$data_acao);
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

}
