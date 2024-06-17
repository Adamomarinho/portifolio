<?php 
    include_once "src/controller/validacao_cep.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <title>Consulta Cep</title>
</head>
<body class="bg-primary">
    <main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4"><br><br>
                    <div class="card text-center">
                        <div class="card-header text-white bg-success">
                            <h1>Digite seu cep aqui embaixo: </h1>
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="buscaArea">
                                    <label for="cep">Qual o seu Cep?</label>
                                    <input type="text" name="cep" id="idCep" style="border-radius: 5px;">
                                    <input type="submit" value="Pesquisar" class="btn btn-primary" style="border-radius:10px;">
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-muted">
                            <?php
                                if(!empty($_POST["cep"]))
                                {
                                    verifica_cep();
                                }
                                if(empty($_POST["cep"]))
                                {
                                    echo "";
                                }

                            ?>
                        </div>
                    </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
    </main>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
</html>
