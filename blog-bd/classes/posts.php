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

	    function ListaDadosPostUsuario($usuario)
	{
        $conecta = new Sistema();
        $link = $conecta->conectado();
        echo "
        <div class='container-fluid'>
        <div class='row'>
        <div class='col-md-12'>        
        <div class='row mb-2'>";
        $sql = $link->prepare("SELECT p.id, p.titulo, p.conteudo, c.nomecat from posts as p
        left join categoria as c on p.categoria = c.idcat where p.usuario = :user and p.situacao = 1");
		$sql->execute([':user' => $usuario]);
		while($dados=$sql->fetch(PDO::FETCH_ASSOC))
        {
            $idpost = $dados['id'];
            $titulo = $dados['titulo'];
            $conteudo = $dados['conteudo'];
            $nomeuser = $dados['nomeuser'];
            echo"
                          <div class='col-md-3'>
                                <div class='row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative'>
                                <div class='col p-4 d-flex flex-column position-static'>
                                    <h3 class='mb-0'>" . substr($titulo,0,25) . "</h3>
                                    <p class='card-text mb-auto'>" . substr($nomeuser,0,25) . "</p>
                                    <p class='card-text mb-auto'>" . substr($conteudo,0,25) . "</p>
                                    <a href='ver.php?id=" . $idpost . "' class='btn btn-primary text-center' style='border-radius: 10px;width: 80%;'><i class='fa fa-eye'></i>&nbsp;&nbsp;&nbsp;&nbsp;Leia Mais</a>
                                </div>
                                <div class='col-auto d-none d-lg-block'>
                                    <svg class='bd-placeholder-img' width='200' height='250' xmlns='http://www.w3.org/2000/svg' role='img' aria-label='Placeholder: Thumbnail' preserveAspectRatio='xMidYMid slice' focusable='false'><title>Placeholder</title><rect width='100%' height='100%'' fill='#55595c'/><text x='50%' y='50%' fill='#eceeef' dy='.3em'>Thumbnail</text></svg>
                                </div>
                            </div>
                          </div>
            ";
        }
        echo "
            </div>  </div>
                </div>
            </div><br>";

	}

    function ListaDadosPostCategoria($categoria, $nomecategoria)
	{
        $conecta = new Sistema();
        $link = $conecta->conectado();
        echo "
        <div class='container-fluid'>
        <div class='row'>
        <div class='col-md-12'>        
        <div class='card'>
        <div class='card-header text-center'><b>
        " . $nomecategoria . "
        </b></div>
        <div class='card-body'>
        <div class='row mb-2'>";
        $sql = $link->prepare("SELECT p.id, p.titulo, p.conteudo, c.nomecat from posts as p
        left join categoria as c on p.categoria = c.idcat where p.categoria = :cat and p.situacao = 1");
		$sql->execute([':cat' => $categoria]);
		while($dados=$sql->fetch(PDO::FETCH_ASSOC))
        {
            $idpost = $dados['id'];
            $titulo = $dados['titulo'];
            $conteudo = $dados['conteudo'];
            $nomecategoria = $dados['nomecat'];
            echo"
                          <div class='col-md-3'>
                                <div class='row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative'>
                                <div class='col p-4 d-flex flex-column position-static'>
                                    <h3 class='mb-0'>" . substr($titulo,0,25) . "</h3>
                                    <p class='card-text mb-auto'>" . substr($conteudo,0,25) . "</p>
                                    <a href='ver.php?id=" . $idpost . "' class='btn btn-primary text-center' style='border-radius: 10px;width: 80%;'><i class='fa fa-eye'></i>&nbsp;&nbsp;&nbsp;&nbsp;Leia Mais</a>
                                </div>
                                <div class='col-auto d-none d-lg-block'>
                                    <svg class='bd-placeholder-img' width='200' height='250' xmlns='http://www.w3.org/2000/svg' role='img' aria-label='Placeholder: Thumbnail' preserveAspectRatio='xMidYMid slice' focusable='false'><title>Placeholder</title><rect width='100%' height='100%'' fill='#55595c'/><text x='50%' y='50%' fill='#eceeef' dy='.3em'>Thumbnail</text></svg>
                                </div>
                            </div>
                          </div>
            ";
        }
        echo "                    </div>
                </div>
            </div>  </div>
                </div>
            </div><br>";

	}

}
