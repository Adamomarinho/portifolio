
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
				   <br><big><b>RELATÓRIO DE CATEGORIAS EM PDF</b></big> 
				</div>				
			</div>
            <br>
        <hr>

		<br><br>

		<table class="table table-striped">
            <thead>
                <tr bgcolor="#f9f9f9">
                    <td class="text-center" style="font-size:12px;color:black;"> <b>ID</b> </td>
                    <td class="text-center" style="font-size:12px;color:black;"> <b>CATEGORIA</b> </td>
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
                    $sql = "SELECT * from categoria order by idcat asc";
                    $busca = $conecta->conectado();
                    $resultado = $busca->query($sql);
                    while($mostra = $resultado->fetch(PDO::FETCH_ASSOC))
                        {
                            $idcat = $mostra["idcat"];
                            $nomecat = $mostra["nomecat"];
                ?>

                <tr>
				<td class="text-center" style="font-size:12px;color:black;"> <?php echo $idcat; ?> </td>
				<td class="text-center" style="font-size:12px;color:black;"> <?php echo $nomecat; ?> </td>
				</tr>

                <?php 
                   }  
                ?>
            </tbody>
		</table>
    </div>
</body>
</html>


