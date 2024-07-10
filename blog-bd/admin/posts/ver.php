<?php    

session_start();
ob_start();

require '../sessao.php';
require '../../classes/posts.php';
require '../../classes/situacao.php';
require '../../classes/categoria.php';
require '../../classes/usuario.php';

$verifica = new VerificaUser();
$verifica->SessaoUsuario('../../blog.php');

$post = new PostsCrud();
$cat = new CategoriaCrud();
$sit = new SituacaoCrud();
$user = new UsuarioCrud();

$id = $_GET['id'];
$idpost = $post->PegaDadosPost($id, 'id');
$titulo = $post->PegaDadosPost($id, 'titulo');
$conteudo = $post->PegaDadosPost($id, 'conteudo');
$idcat = $post->PegaDadosPost($id, 'categoria');
$idsit = $post->PegaDadosPost($id, 'situacao');
$iduser = $post->PegaDadosPost($id, 'usuario');
$criado = $post->PegaDadosPost($id, 'criado');
$categoria = $cat->PegaDadosCategoria($idcat, 'nomecat');
$situacao = $sit->PegaDadosSituacao($idsit, 'nomesit');
$usuario = $user->PegaDadosUsuario($iduser, 'nomeuser');

?>
<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Visualiza dados do Post</title>
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
            <a class="nav-link" href="../permissoes/gerenciar.php">
            <i class="fa fa-fw fa-users"></i>&nbsp;&nbsp;
              Permissões de usuários
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../situacoes/gerenciar.php">
            <i class="fa fa-fw fa-handshake"></i>&nbsp;&nbsp;
              Situação dos Usuários
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../categorias/gerenciar.php">
            <i class="fa fa-fw fa-list"></i>&nbsp;&nbsp;
              Categorias
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../posts/gerenciar.php">
            <i class="fa fa-fw fa-comments"></i>&nbsp;&nbsp;
              Postagens
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
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
                <h1 class="card-title text-center"><b>Informações abaixo</b></h1>
            </div>
                <br>
                <div class="card">
                    <div class="card-header text-center">
                        Visualizar dados do Post: <b><?php echo $idpost; ?></b>
                    </div>
                    <div class="card-body">
                        <br>
                        <p class="card-text text-center"><b>ID:</b> <?php echo $idpost; ?></p>
                        <p class="card-text text-center"><b>Titulo:</b> <?php echo substr($titulo,0, 25); ?></p>
                        <p class="card-text text-center"><b>Conteudo:</b> <?php echo substr($conteudo,0, 25); ?></p>
                        <p class="card-text text-center"><b>Categoria:</b> <?php echo $categoria; ?></p>
                        <p class="card-text text-center"><b>Usuario:</b> <?php echo $usuario; ?></p>
                        <p class="card-text text-center"><b>Situacao:</b> <?php echo $situacao; ?></p>
                        <p class="card-text text-center"><b>Criado:</b> <?php echo databr($criado); ?></p>
                        <br>
                    </div>
                    <div class="card-footer text-center">
                        <a href="gerenciar.php" class="btn btn-success" role="button" style="text-decoration: none;"><i class="fa fa-list fa fa-fw"></i>&nbsp;&nbsp;Gerenciar Posts</a>
                        <a href="novo.php" class="btn btn-primary" role="button" style="text-decoration: none;"><i class="fa fa-plus fa fa-fw"></i>&nbsp;&nbsp;Adicionar</a>
                        <a href="editar.php?id=<?php echo $idpost; ?>" class="btn btn-warning" role="button" style="text-decoration: none;"><i class="fa fa-edit fa fa-fw"></i>&nbsp;&nbsp;Editar</a>
                        <a href="excluir.php?id=<?php echo $idpost; ?>" class="btn btn-danger" role="button" style="text-decoration: none;"><i class="fa fa-trash fa fa-fw"></i>&nbsp;&nbsp;Excluir</a>
                    </div>
                </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </main>
  </div>
</div>

  </body>
</html>
