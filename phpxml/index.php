<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>LER XML</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
</head>
<body>
<div class="container">
    <h1 class="page-header text-center">LER XML</h1>
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <table class="table table-bordered table-hover text-center" style="margin-top:5%;">
                <thead>
                    <th class="text-center">ID</th>
                    <th class="text-center">Nome</th>
                    <th class="text-center">Sobrenome</th>
                    <th class="text-center">Endereco</th>
                </thead>
                <tbody>
                    <?php
                    //load xml file
                    $dados = simplexml_load_file('files/dados.xml');
                    foreach($dados->user as $linha)
                    {
                        ?>
                        <tr>
                            <td><?php echo $linha->id; ?></td>
                            <td><?php echo $linha->firstname; ?></td>
                            <td><?php echo $linha->lastname; ?></td>
                            <td><?php echo $linha->address; ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="files/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
