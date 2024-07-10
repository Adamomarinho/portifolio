
<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gerar PDF</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"/>
    <style>
    @page 
    {
        margin: 0px;
    }

    body
    {
        font-family:Times, "Times New Roman", Georgia, serif;
    }
</style>
  </head>
  <body>

    <div class="container-fluid">
			<div class="row">
				<div class="col-sm-12 text-center">	
				   <br><big><b>RELATÓRIO DE NIVEIS EM PDF</b></big> 
				</div>				
			</div>
            <br>
        <hr>

		<br><br>

		<table class="table table-striped">
            <thead>
                <tr bgcolor="#f9f9f9">
                    <td class="text-center" style="font-size:12px;color:black;"> <b>ID</b> </td>
                    <td class="text-center" style="font-size:12px;color:black;"> <b>TITULO</b> </td>
                    <td class="text-center" style="font-size:12px;color:black;"> <b>CONTEUDO</b> </td>
                    <td class="text-center" style="font-size:12px;color:black;"> <b>CATEGORIA</b> </td>
                    <td class="text-center" style="font-size:12px;color:black;"> <b>USUARIO</b> </td>
                    <td class="text-center" style="font-size:12px;color:black;"> <b>SITUACAO</b> </td>
                </tr>
            </thead>
            <tbody>    
				<?php 

                    require '../../classes/classe.php';
                    require '../sessao.php';

                    $verifica = new VerificaUser();
                    $verifica->SessaoUsuario('../../blog.php');

                    setlocale(LC_ALL, 'pt_BR');

                    $verifica = new VerificaUser();
                    $verifica->SessaoUsuario('../../blog.php');

                    $conecta = new Sistema();
                    $sql = "SELECT p.id, p.titulo, p.conteudo, u.nomeuser as usuario, c.nomecat as categoria, s.nomesit as situacao from posts as p
left join situacao as s on p.situacao = s.idsit
left join usuario as u on p.usuario = u.idusuario
left join categoria as c on p.categoria = c.idcat";
                    $busca = $conecta->conectado();
                    $resultado = $busca->query($sql);
                    while($mostra = $resultado->fetch(PDO::FETCH_ASSOC))
                        {
                            $idnivel = $mostra["id"];
                            $titulo = $mostra["titulo"];
                            $conteudo = $mostra["conteudo"];
                            $categoria = $mostra["categoria"];
                            $usuario = $mostra["usuario"];
                            $situacao = $mostra["situacao"];
                ?>

                <tr>
                    <td class="text-center" style="font-size:12px;color:black;"> <?php echo $id; ?> </td>
                    <td class="text-center" style="font-size:12px;color:black;"> <?php echo $titulo; ?> </td>
                    <td class="text-center" style="font-size:12px;color:black;"> <?php echo $conteudo; ?> </td>
                    <td class="text-center" style="font-size:12px;color:black;"> <?php echo $categoria; ?> </td>
                    <td class="text-center" style="font-size:12px;color:black;"> <?php echo $usuario; ?> </td>
                    <td class="text-center" style="font-size:12px;color:black;"> <?php echo $situacao; ?> </td>
				</tr>

                <?php 
                   }  
                ?>
            </tbody>
		</table>
    </div>
</body>
</html>


