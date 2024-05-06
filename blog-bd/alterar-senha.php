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
                    height: 10rem;
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
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item text-center">
                                    <a class="nav-link active btl" id="pills-senha-tab" data-toggle="pill" href="#pills-senha" role="tab" aria-controls="pills-senha" aria-selected="false">Alterar Senha</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-senha" role="tabpanel" aria-labelledby="pills-senha-tab">
                                    <div class="form px-4">
                                        <input type="text" name="" class="form-control" placeholder="Digite sua nova senha aqui">
                                        <button class="btn btn-dark btn-block">Alterar Senha</button>
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
