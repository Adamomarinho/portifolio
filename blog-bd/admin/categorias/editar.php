<?php    

require '../sessao.php';
require '../../classes/categoria.php';

$verifica = new VerificaUser();
$verifica->SessaoUsuario('../../blog.php');

$id = $_GET['id'];
$cat = new CategoriaCrud;
$idcat = $cat->PegaDadosCategoria($id, 'idcat');
$nomecat = $cat->PegaDadosCategoria($id, 'nomecat');

?>
<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Categoria</title>
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
        <main class="corpo">
        <br>
            <div class="card">
                <div class="card-header text-center">
                    Editar Categoria ID: <b><?php echo $idcat; ?></b>
                </div>
                <div class="card-body">
                    <form action="atualiza.php" method="POST">
                        <div class="form-group text-center">
                            <label for="nome">Nome</label>
                            <input type="hidden" class="form-control" name="id" value="<?php echo $idcat; ?>">
                            <input type="text" class="form-control" name="categoria" value="<?php echo $nomecat; ?>">
                        </div>
                        <br>
                        <div class="form-group text-center">
                            <button type="submit" name="Salvar" class="btn btn-primary">Salvar</button> 
                        </div>    
                    </form>
                </div>
                <div class="card-footer text-muted text-center">
                    Digite o nome da Categoria e clique no botão Salvar
                </div>
            </div>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>    
    </main>

    </main>
  </div>
</div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  </body>
</html>
