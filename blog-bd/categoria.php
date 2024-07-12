<?php
    require 'classes/posts.php';
    require 'classes/categoria.php';
    $cat = new CategoriaCrud();
    $posts = new PostsCrud();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Blog</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

<meta name="theme-color" content="#7952b3">


    <style>
      .bd-placeholder-img 
      {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      #topo2
      {
        position: fixed;
        bottom: 20px;
        right: 20px;
        display: none;
        background-color: darkcyan;
        color:white;
      }

      @media (min-width: 768px) 
      {
        .bd-placeholder-img-lg 
        {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="assets/css/blog.css" rel="stylesheet">
    <link href="assets/css/carousel.css" rel="stylesheet">
  </head>
  <body>
    
<div class="container">
<header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">BlogApi</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="blog.php">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="categoria.php">Categorias</a>
          </li>
        </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Procurar aqui" aria-label="Search">
          <button class="btn btn-outline-primary" type="submit">Buscar</button>
        </form>
      </div>
    </div>
  </nav>
</header>

</div>

<br>

<main class="container-fluid">

<?php    

$conecta = new Sistema();
$sql = "SELECT id, titulo, conteudo from posts where usuario = 3 and situacao = 1";
$busca = $conecta->conectado();
$resultado = $busca->prepare($sql);
$resultado->execute();
?>

<div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
            <?php
                $controle = 0;
                while($controle < $resultado->rowCount())
                {
                    $ativo = "";
                    if($controle == 0)
                    {
                        $ativo = "active";
                    }
                    echo "<button type='button' data-bs-target='#myCarousel' data-bs-slide-to='$controle' class='$ativo'
                    aria-current='true' aria-label='Slide $controle'></button>";
                    $controle++;
                }
            ?>
    </div>
    <div class="carousel-inner">
            <?php
                $controle = 0;
                while($row_slide = $resultado->fetch(PDO::FETCH_ASSOC))
                {
                    //var_dump($row_slide);
                    extract($row_slide);
                    $ativo = "";
                    if($controle == 0)
                    {
                        $ativo = "active";
                    }
                    echo "<div class='carousel-item $ativo'>";
                    echo "<svg class='bd-placeholder-img' width='100%' height='100%' xmlns='http://www.w3.org/2000/svg' aria-hidden='true' preserveAspectRatio='xMidYMid slice' focusable='false'><rect width='100%' height='100%' fill='#777'/></svg>";
                    echo "<div class='container'>
                              <div class='carousel-caption text-center'>
                                    <h1> $titulo </h1>
                                    <p> $conteudo </p>
                                    <p><a class='btn btn-lg btn-primary' href='ver.php?id=$id'  ><i class='fa fa-eye'></i>&nbsp;&nbsp;Leia Mais</a></p>
                              </div>
                          </div>";
                    echo "</div>";
                    $controle++;
                }
            ?>  
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <?php

    $nomecat1 = $cat->PegaDadosCategoria(1, 'nomecat');
    $posts->ListaDadosPostCategoria(1, $nomecat1);
    $nomecat2 = $cat->PegaDadosCategoria(2, 'nomecat');
    $posts->ListaDadosPostCategoria(2, $nomecat2);
    $nomecat3 = $cat->PegaDadosCategoria(3, 'nomecat');
    $posts->ListaDadosPostCategoria(3, $nomecat3);
    $nomecat4 = $cat->PegaDadosCategoria(4, 'nomecat');
    $posts->ListaDadosPostCategoria(4, $nomecat4);

  ?>

<br><br>

</main>

<footer class="blog-footer">
      <p class="text-center">
          Todos os Direitos reservados @Teusiteonline.com.br
          <button type="button" class="text-end btn btn-primary" id="topo" style="width: 2%;border-radius: 50%;color: white;float:right;">
              <i class="fa fa-arrow-up" style="margin-left: -15%;"></i>
          </button>
      </p>

</footer>
<script src="https://getbootstrap.com/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script type="text/javascript">
    //Get the button
let mybutton = document.getElementById("topo");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function () {
  scrollFunction();
};

function scrollFunction() {
  if (
    document.body.scrollTop > 20 ||
    document.documentElement.scrollTop > 20
  ) {
    mybutton.style.display = "block";
    mybutton.style.width = "2%";
  } else {
    mybutton.style.display = "none";
  }
}
// When the user clicks on the button, scroll to the top of the document
mybutton.addEventListener("click", backToTop);

function backToTop() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>
</body>
</html>
