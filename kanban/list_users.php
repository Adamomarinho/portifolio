<?php
require_once 'db.php';
require_once 'User.php';
require_once 'UserLevel.php';

$db = new Database();
$user = new User($db->conn);
$levels = new UserLevel($db->conn);

$users = $db->conn->query("SELECT * FROM users")->fetchAll(PDO::FETCH_ASSOC);
$level = $levels->getAll();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Listagem de Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  </head>
<body>

<div class="container text-center" style="margin-top: 2%;">
  <div class="row text-center">
        <a href="create_user.php" class="btn btn-primary">+ Novo</a>           
  </div>
  <br>
  <div class="row">
        <table id="tabela" class="table table-hover" style="width:100%">
            <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Usuario</th>
                    <th class="text-center">Nivel</th>
                    <th class="text-center">Açoes</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($users as $user): ?>
                <tr class="text-center">
                    <td class="text-center"><?= htmlspecialchars($user['id']) ?></td>
                    <td class="text-center"><?= htmlspecialchars($user['username']) ?></td>
                    <td class="text-center">                            
                            <?php 
                                $idlevel = htmlspecialchars($user['level_id']);
                                $level = $levels->read($idlevel);
                                echo htmlspecialchars($level['name']); 
                            ?>
                    </td>
                        <td class="text-center">
                            <a href="edit_user.php?id=<?= htmlspecialchars($user['id']) ?>" class="btn btn-warning" role="button"><i class="fa fa-fw fa-edit"></i>&nbsp;&nbsp;Editar</a>
                            <a href="delete_user.php?id=<?= htmlspecialchars($user['id']) ?>" class="btn btn-danger" role="button"><i class="fa fa-fw fa-trash"></i>&nbsp;&nbsp;Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
  </div>
  <br>
  <div class="row text-center">
        <a href="index.php" class="btn btn-success">Voltar</a>           
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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