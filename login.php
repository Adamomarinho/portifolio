
<!doctype html>
<html lang="en">
    <head>
        <title>Login</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"/>
        <style>
                
                body
                {
                    background-color: #75e2e9;
                }

                .card
                {
                    width: 30%;
                    border:none;
                }

                .btr
                {
                    border-top-right-radius: 5px !important;
                }

                .btl
                {
                    border-top-left-radius: 5px !important;
                }

                .btn-dark 
                {
                    color: #fff;
                    background-color: #0d6efd;
                    border-color: #0d6efd;
                }

                .btn-dark:hover 
                {
                    color: #fff;
                    background-color: #0d6efd;
                    border-color: #0d6efd;
                }

                .nav-pills
                {
                    display:table !important;
                    width:100%;
                }

                .nav-pills .nav-link 
                {
                    border-radius: 0px;
                    border-bottom: 1px solid #0d6efd40;
                }

                .nav-item
                {
                    display: table-cell;
                    background: #0d6efd2e;
                }

                .form
                {
                    padding: 5%;
                    height: 20rem;
                }

                .form input
                {
                    margin-bottom: 12px;
                    border-radius: 3px;
                }

                .form input:focus
                {
                    box-shadow: none;
                }

                .form button
                {
                    margin-top: 5%;
                }
        </style>
    </head>

    <body>
        <main>

            <div class="container-fluid">
                <div class="row">
                    <div class="d-flex justify-content-center align-items-center" style="margin-top: 10%;">
                        <div class="card">
                            <img src="../img/img1.jpg" class="img-fluid" style="border-radius: 5px;">
                            <div class="card-body">
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item text-center">
                                        <a class="nav-link active btl" id="pills-login-tab" data-toggle="pill" href="#pills-login" role="tab" aria-controls="pills-login" aria-selected="true">Login</a>
                                    </li>
                                    <li class="nav-item text-center">
                                        <a class="nav-link btr" id="pills-registrar-tab" data-toggle="pill" href="#pills-registrar" role="tab" aria-controls="pills-registrar" aria-selected="false">Registre-se</a>
                                    </li>
                                    <li class="nav-item text-center">
                                        <a class="nav-link btr" id="pills-recuperar-tab" data-toggle="pill" href="#pills-recuperar" role="tab" aria-controls="pills-recuperar" aria-selected="false">Recuperar Senha</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="pills-login-tab">
                                        <form method="POST" action="verifica.php">
                                            <div class="form px-4 pt-5"> 
                                                <input type="text" name="usuario" class="form-control" placeholder="email@site.com.br">
                                                <input type="password" name="senha" class="form-control" placeholder="Digite sua senha aqui">
                                                <button type="submit" class="btn btn-dark btn-block" name="Login">Login</button>
                                            </div>
                                        </form>    
                                    </div>
                                    <div class="tab-pane fade" id="pills-registrar" role="tabpanel" aria-labelledby="pills-registrar-tab">
                                        <form method="POST" action="registrar.php">
                                            <div class="form px-4">
                                                <input type="text" name="" class="form-control" placeholder="Digite seu nome completo aqui">
                                                <input type="text" name="" class="form-control" placeholder="email@site.com.br">
                                                <input type="text" name="" class="form-control" placeholder="Digite sua senha aqui">
                                                <button class="btn btn-dark btn-block">Registrar</button>
                                            </div>
                                        </form>    
                                    </div>
                                    <div class="tab-pane fade" id="pills-recuperar" role="tabpanel" aria-labelledby="pills-recuperar-tab">
                                        <form method="POST" action="recuperar.php">
                                            <div class="form px-4 pt-5">
                                                <input type="text" name="" class="form-control" placeholder="email@site.com.br">
                                                <button class="btn btn-dark btn-block">Recuperar Senha</button>
                                            </div>
                                        </form>    
                                    </div>               
                                </div>
                            </div>    
                        </div>
                    </div>
                </div>
            </div>

        </main>
        <!-- Bootstrap JavaScript Libraries -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </body>
</html>
