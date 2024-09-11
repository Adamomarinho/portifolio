<?php
require 'db.php';
require 'Task.php';
require 'Team.php';
require 'User.php';

$db = new Database();
$task = new Task($db->conn);
$team = new Team($db->conn);
$user = new User($db->conn);

$tasks = $db->conn->query("SELECT * FROM tasks")->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Listagem de Tarefas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  </head>
<body>
<div class="container text-center" style="margin-top: 2%;">
  <div class="row text-center">
        <a href="create_task.php" class="btn btn-primary">+ Novo</a>           
  </div>
  <br>
  <div class="row">
        <table id="tabela" class="table table-hover" style="width:100%">
            <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Titulo</th>
                    <th class="text-center">Descrição</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Equipe</th>
                    <th class="text-center">Responável</th>
                    <th class="text-center">Açoes</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($tasks as $task): ?>
                <tr class="text-center">
                    <td class="text-center"><?= htmlspecialchars($task['id']) ?></td>
                    <td class="text-center">
                        <?php 
                            $titulo = htmlspecialchars($task['title']);
                            echo substr($titulo, 0, 25); 
                        ?>
                    </td>
                    <td class="text-center">
                        <?php
                            $desc = htmlspecialchars($task['description']); 
                            echo substr($desc, 0, 25);
                        ?>
                    </td>
                    <td class="text-center"><?= htmlspecialchars($task['status']) ?></td>
                    <td class="text-center">                            
                            <?php 
                                $idteam = $task['team_id'];
                                $teams = $team->read($idteam);
                                echo htmlspecialchars($teams['name']); 
                            ?>
                    </td>
                    <td class="text-center">
                            <?php 
                                $iduser = htmlspecialchars($task['assignee_id']);
                                $users = $user->read($iduser);
                                echo $users['username'];
                            ?>
                    </td>
                        <td class="text-center">
                            <a href="edit_task.php?id=<?= htmlspecialchars($task['id']) ?>" class="btn btn-warning" role="button"><i class="fa fa-fw fa-edit"></i>&nbsp;&nbsp;Editar</a>
                            <a href="delete_task.php?id=<?= htmlspecialchars($task['id']) ?>" class="btn btn-danger" role="button"><i class="fa fa-fw fa-trash"></i>&nbsp;&nbsp;Excluir</a>
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