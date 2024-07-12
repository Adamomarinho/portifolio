<?php

require_once 'classe.php';

class Logs
{
	function SalvarLogs($usuario, $ip, $acao )
	{
		try
		{
            $conecta = new Sistema();
            $link = $conecta->conectado();
			$sql = $link->prepare("INSERT INTO logs (usuario, ip, acao, data_acao) VALUES (:usuario, :ip, :acao, NOW())");
			$sql->bindparam(":usuario",$usuario);
            $sql->bindparam(":ip",$ip);
            $sql->bindparam(":acao",$acao);
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

        $sql = $link->prepare("SELECT * FROM logs WHERE id=:id");
		$sql->execute([':id' => $id]);
		$dados=$sql->fetch(PDO::FETCH_ASSOC);
		return $dados[$campo];
	}

	function PegaIp() {
		$ipaddress = '';
		if (isset($_SERVER['HTTP_CLIENT_IP']))
			$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
		else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
			$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
		else if(isset($_SERVER['HTTP_X_FORWARDED']))
			$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
		else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
			$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
		else if(isset($_SERVER['HTTP_FORWARDED']))
			$ipaddress = $_SERVER['HTTP_FORWARDED'];
		else if(isset($_SERVER['REMOTE_ADDR']))
			$ipaddress = $_SERVER['REMOTE_ADDR'];
		else
			$ipaddress = 'UNKNOWN';
		return $ipaddress;
	}

}
