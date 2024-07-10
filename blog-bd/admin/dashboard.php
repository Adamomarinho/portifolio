<?php

session_start();
ob_start();

//include '../classes/classe.php';
include '../classes/login.php';

$sair = '../blog.php';
$logado = new Login();
$logado->VerificaUsuario();
$nomeusuario = $logado->PegaDadosSessao('nomeuser');

/*
if((!isset($_SESSION['id'])) AND (!isset($_SESSION['nome'])))
{
    $_SESSION['msg'] = msg('danger','Erro: Necessário realizar o login para acessar a página!');
    $destino = '../blog.php';
    redireciona(3, $destino);
}
*/

?>

<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <meta name="theme-color" content="#7952b3">
  </head>
  <style>
    .corpo
    {
        width: 83%;
        position: relative;
        display: flex;
        flex-wrap: nowrap;
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
      <a class="nav-link px-3" href="sair.php">Deslogar-se</a>
    </div> 
  </div>
</header>
<body>
<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse" style="min-height: 100vh;height: auto;">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="dashboard.php">
            <i class="fa fa-fw fa-star"></i>&nbsp;&nbsp;
              Inicio
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="usuarios/gerenciar.php">
            <i class="fa fa-fw fa-user"></i>&nbsp;&nbsp;
              Usuarios
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="situacoes/gerenciar.php">
            <i class="fa fa-fw fa-handshake"></i>&nbsp;&nbsp;
              Situação dos Usuários
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="categorias/gerenciar.php">
            <i class="fa fa-fw fa-list"></i>&nbsp;&nbsp;
              Categorias
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="posts/gerenciar.php">
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

    <div class="col-md-9 col-xl-9" style="margin-left: 2%; margin-top: 1%;">
    <div class="container-fluid">
      <div class="card text-center">
        <div class="card-header" style="width: 100%;">
              <b>Bem Vindo Usuario: </b><?php echo $nomeusuario; ?>       </div>
        <div class="card-body">
          <div class="row">
            <br>
              <div class="col-md-12">
              <br>
                  <div class="row g-0 fluid">
                      <div class="col-md-2" style="height: 10%;">
                          <a href="#">
                              <button class="btn btn-primary btn-icon">
                                <i class="fa fa-window-restore fa-3x fa-fw"></i>
                              </button>
                          </a>    
                      </div>
                      <div class="col-md-2" style="margin-left: -8%;">
                          <div class="card-body">
                              <h5 class="card-title text-center" style="margin-top: -10%;">
                                  <b>
                                  <a href="#" style="text-decoration: none;">116</a>                                  </b>
                              </h5>
                              <p class="card-text">
                              <a href="#" style="text-decoration: none;">POSTS</a>
                              </p>
                          </div>
                      </div>
                      <div class="col-md-2" style="height: 10%;margin-left: -3%;">
                          <a href="#">
                              <button class="btn btn-warning btn-icon">
                                <i class="fa fa-archive fa-3x fa-fw"></i>
                              </button>
                          </a>    
                      </div>
                      <div class="col-md-2" style="margin-left: -6%;">
                          <div class="card-body">
                              <h5 class="card-title text-center" style="margin-top: -10%;">
                                  <b>
                                  <a href="#" style="text-decoration: none;">2</a>                                  </b>
                              </h5>
                              <p class="card-text">
                              <a href="#" style="text-decoration: none;">CATEGORIAS</a>
                              </p>
                          </div>
                      </div>
                      <div class="col-md-2" style="height: 10%;margin-left: -3%;">
                          <a href="#">
                              <button class="btn btn-danger btn-icon">
                              <i class="fas fa-cogs fa-3x fa-fw"></i>
                              </button>
                          </a>    
                      </div>
                      <div class="col-md-2" style="margin-left: -6%;">
                          <div class="card-body">
                              <h5 class="card-title text-center" style="margin-top: -10%;">
                                  <b>
                                  <a href="#" style="text-decoration: none;">3</a>                                  </b>
                              </h5>
                              <p class="card-text">
                              <a href="#" style="text-decoration: none;">PERMISSOES</a>
                              </p>
                          </div>
                      </div>
                      <div class="col-md-2" style="height: 10%;margin-left: -2%;">
                          <a href="#">
                              <button class="btn btn-success btn-icon">
                              <i class="fa fa-user fa-3x fa-fw"></i>
                              </button>
                          </a>    
                      </div>
                      <div class="col-md-2" style="margin-left: -7%;">
                          <div class="card-body">
                              <h5 class="card-title text-center" style="margin-top: -10%;">
                                  <b>
                                  <a href="#" style="text-decoration: none;">2</a>                                  </b>
                              </h5>
                              <p class="card-text">
                              <a href="#" style="text-decoration: none;">USUARIOS</a>
                              </p>
                          </div>
                      </div>            
                   </div>    
              </div>
              <br>
              <div class="col-md-12">
              <br>
                  <div class="row g-0 fluid">
                      <div class="col-md-2" style="height: 10%;">
                          <a href="#">
                              <button class="btn btn-info btn-icon text-white">
                                <i class="fa fa-solid fa-users fa-3x fa-fw"></i>
                              </button>
                          </a>    
                      </div>
                      <div class="col-md-2" style="margin-left: -8%;">
                          <div class="card-body">
                              <h5 class="card-title text-center" style="margin-top: -10%;">
                                  <b>
                                  <a href="#" style="text-decoration: none;">3</a>                                  </b>
                              </h5>
                              <p class="card-text">
                              <a href="#" style="text-decoration: none;">NIVEIS</a>
                              </p>
                          </div>
                      </div>
                      <div class="col-md-2" style="height: 10%;margin-left: -3%;">
                          <a href="#">
                              <button class="btn btn-warning btn-icon">
                                <i class="fa fa-address-card fa-3x fa-fw"></i>
                              </button>
                          </a>    
                      </div>
                      <div class="col-md-2" style="margin-left: -6%;">
                          <div class="card-body">
                              <h5 class="card-title text-center" style="margin-top: -10%;">
                                  <b>
                                  <a href="#" style="text-decoration: none;">4</a>                                  </b>
                              </h5>
                              <p class="card-text">
                              <a href="#" style="text-decoration: none;">SITUACAO</a>
                              </p>
                          </div>
                      </div>
                      <div class="col-md-2" style="height: 10%;margin-left: -4%;">
                          <a href="#">
                              <button class="btn btn-secondary btn-icon">
                                <i class="fa fa-tasks fa-3x fa-fw"></i>
                              </button>
                          </a>    
                      </div>
                      <div class="col-md-2" style="margin-left: -6%;">
                          <div class="card-body">
                              <h5 class="card-title text-center" style="margin-top: -10%;">
                                  <b>
                                    <a href="#" style="text-decoration: none;">1</a>
                                  </b>
                              </h5>
                              <p class="card-text">
                              <a href="#" style="text-decoration: none;">LOGS</a>
                              </p>
                          </div>
                      </div>

         
                   </div>      
              </div>
              <br>
        </div>
        </div>  
      </div>
      <br>

    </div> 
</div>

    </main>
  </div>
</div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</body>
</html>
</body>
</html>
