<?php    

session_start();
ob_start();

require '../../classes/classe.php';
require '../sessao.php';

$verifica = new VerificaUser();
$verifica->SessaoUsuario('../../blog.php');

?>
<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gerenciar Categorias de Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <meta name="theme-color" content="#7952b3">
  </head>
  <style>
    .corpo
    {
        width: 83%;
        position: relative;
    }

    .nav-item .nav-link 
    {
        color: #ffffff;
    }

    .nav-item .nav-link :hover
    {
        color: #0a58ca;
    }

  </style>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 text-center" href="#">BlogBD</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="../sair.php">Deslogar-se</a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="../dashboard.php">
            <i class="fa fa-fw fa-star"></i>&nbsp;&nbsp;
              Inicio
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../usuarios/gerenciar.php">
            <i class="fa fa-fw fa-user"></i>&nbsp;&nbsp;
              Usuarios
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../situacoes/gerenciar.php">
            <i class="fa fa-fw fa-handshake"></i>&nbsp;&nbsp;
              Situação dos Usuários
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../niveis/gerenciar.php">
            <i class="fa fa-fw fa-list"></i>&nbsp;&nbsp;
              Niveis
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../posts/gerenciar.php">
            <i class="fa fa-fw fa-comments"></i>&nbsp;&nbsp;
              Postagens
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logs/gerenciar.php">
            <i class="fa fa-fw fa-bars"></i>&nbsp;&nbsp;
                Logs
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main class="corpo">
        <br><br>
            <div class="text-center">
                <a href="novo.php" class="btn btn-primary" role="button" style="text-decoration: none;"><i class="fa fa-plus fa fa-fw"></i>&nbsp;&nbsp;Adicionar</a>
                <a href="geraxls.php" class="btn btn-success" role="button" style="text-decoration: none;"><i class="fa fa-newspaper fa fa-fw"></i>&nbsp;&nbsp;Relatorio Excel</a>
                <a href="gerapdf.php" class="btn btn-danger" role="button" style="text-decoration: none;"><i class="fa fa-file-pdf fa fa-fw"></i>&nbsp;&nbsp;Relatorio PDF</a>
            </div>
                <br>
                    <table id="tabela" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Categoria</th>
                                <th class="text-center">Açoes</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php    

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
                                <td class="text-center"><?php echo $idcat; ?></td>
                                <td class="text-center"><?php echo $nomecat; ?></td>
                                <td class="text-center">
                                    <a href="ver.php?id=<?php echo $idcat; ?>" class="btn btn-info" role="button"><i class="fa fa-eye"></i>&nbsp;&nbsp;Ver</a>
                                    <a href="editar.php?id=<?php echo $idcat; ?>" class="btn btn-warning" role="button"><i class="fa fa-fw fa-edit"></i>&nbsp;&nbsp;Editar</a>
                                    <a href="excluir.php?id=<?php echo $idcat; ?>" class="btn btn-danger" role="button"><i class="fa fa-fw fa-trash"></i>&nbsp;&nbsp;Excluir</a>
                                </td>
                            </tr>
                        <?php 
                            }           
                        ?>    
                        </tbody>
                    </table>
                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </main>
  </div>
</div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="../../assets/btst/js/bootstrap.bundle.js"></script>
    <script src="../../assets/btst/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready
        (
            function() 
                {
                    $('#tabela').DataTable
                    ( 
                        {
                        language: {
                        url:"https://cdn.datatables.net/plug-ins/1.11.3/i18n/pt_br.json" },
                        dom: 'Bfrtip'
                        } 
                    );
                } 
        );
    </script>
  </body>
</html>
