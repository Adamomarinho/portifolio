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
	
	function GerenciarNiveis()
	{

        echo "
        <div class='text-center'>
            <a href='novo.php' class='btn btn-primary' role='button' style='text-decoration: none;'><i class='fa fa-plus fa fa-fw'></i>&nbsp;&nbsp;Adicionar</a>
            <a href='geraxls.php' class='btn btn-success' role='button' style='text-decoration: none;'><i class='fa fa-newspaper fa fa-fw'></i>&nbsp;&nbsp;Relatorio Excel</a>
            <a href='gerapdf.php' class='btn btn-danger' role='button' style='text-decoration: none;'><i class='fa fa-file-pdf fa fa-fw'></i>&nbsp;&nbsp;Relatorio PDF</a>
        </div>
        <br>
        <table id='tabela' class='table table-striped' style='width:100%;'>
            <thead>
                <td class='text-center'>ID</td>
                <td class='text-center'>NOME</td>
            </thead>
            <tbody>";

        $conecta = new Sistema();
        $link = $conecta->conectado();
        $query = "SELECT * from nivel";
		$sql = $link->prepare($query);
		$sql->execute();
	
		if($sql->rowCount()>0)
		{
			while($linha=$sql->fetch(PDO::FETCH_ASSOC))
			{
				?>
                <tr>
                <td class="text-center"><?php echo($linha['idnivel']); ?></td>
                <td class="text-center"><?php echo($linha['nome']); ?></td>
                <td align="center">
                <a href="editar.php?id=<?php echo($linha['idnivel']); ?>"><i class="fa fa-fw fa-edit"></i> Editar</a>
                </td>
                <td align="center">
                <a href="deletar.php?id=<?php echo($linha['idnivel']); ?>"><i class="fa fa-fw fa-trash"></i> Deletar</a>
                </td>
                </tr>
                <?php
			}
		}
		else
		{
			?>
            <tr>
            <td>Nenhuma informação ...</td>
            </tr>
            <?php
		}

        echo "</tbody>
        </table>";
		
	}
	
}
