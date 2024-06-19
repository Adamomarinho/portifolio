<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login com Json Web Token</title>
    <meta name="viewport"ncontent="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="https://getbootstrap.com/docs/5.0/examples/sign-in/signin.css" rel="stylesheet">
    <style>
      .bd-placeholder-img
      {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px)
      {
        .bd-placeholder-img-lg
        {
          font-size: 3.5rem;
        }
      }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Login Jwt</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Inicio</a>
        </li>
    </div>
  </div>
</nav>

<?php

session_start();

ob_start();

include_once 'token.php';

if(!validarToken()){

    $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Necessário realizar o login para acessar a página!</p>";

    header("Location: index.php");

    exit();
}

echo "<main class='container-fluid text-center'>
        <div class='bg-light p-5 rounded'>
            <h1>Bem Vindo: " . recuperarNomeToken() . "</h1><br>
            <p class='lead'>Cadastrado com o Email: " . recuperarEmailToken() . "</p><br>
            <p class='lead'><a href='sair.php' class='btn btn-primary text-center'>Sair</a><br></p>
        </div>
      </main>";

?>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
