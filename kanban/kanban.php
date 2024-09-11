<?php
require 'db.php';
require 'Task.php';
require 'Team.php';
require 'User.php';

$db = new Database();
$task = new Task($db->conn);
$team = new Team($db->conn);
$user = new User($db->conn);

$tasks = $task->getAll(); // Use o método para obter todas as tarefas
//$teams = $team->getAll();
//$users = $user->getAll();


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Kanban</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <style>
        .kanban-board {
            display: flex;
            justify-content: space-between;
            margin-top: 2%;
            margin-left: 1%;
        }
        .kanban-column {
            width: 30%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: #f9f9f9;
            min-height: 40rem;
        }
        .kanban-task {
            padding: 10px;
            margin-bottom: 10px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 4px;
            position: relative;
            cursor: move;
        }
        .kanban-task:hover .task-controls {
            display: block;
        }
        .task-controls {
            display: none;
            position: absolute;
            top: 5px;
            right: 5px;
        }
        .task-controls button {
            margin: 0 2px;
        }
    </style>
</head>
<body>
    <div class="kanban-board">
        <div class="kanban-column" id="todo" style="background-color: dodgerblue;">
            <h3 class="text-center" style="color: #fff;">A Fazer</h3>
            <?php foreach ($tasks as $task): ?>
                <?php if ($task['status'] === 'todo'): ?>
                    <div class="kanban-task" data-id="<?= $task['id'] ?>">
                        <h4><?= htmlspecialchars($task['title']) ?></h4>
                        <p><?= htmlspecialchars($task['description']) ?></p>
                        <p>Equipe: 
                            <?php
                                $idteam = $task['team_id'];
                                $teams = $team->read($idteam);
                                echo htmlspecialchars($teams['name']); 
                            ?>
                        </p>
                        <p>Responsável: 
                            <?php 
                                $iduser = htmlspecialchars($task['assignee_id']);
                                $users = $user->read($iduser);
                                echo $users['username'];
                            ?>
                        </p>
                        <div class="task-controls">
                            <button class="move-to btn btn-success" data-status="in_progress">Avançar</button>
                            <button class="move-to btn btn-danger" data-status="done">Concluir</button>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <div class="kanban-column" id="in_progress" style="background-color: bisque;">
            <h3 class="text-center">Em Progresso</h3>
            <?php foreach ($tasks as $task): ?>
                <?php if ($task['status'] === 'in_progress'): ?>
                    <div class="kanban-task" data-id="<?= $task['id'] ?>">
                        <h4><?= htmlspecialchars($task['title']) ?></h4>
                        <p><?= htmlspecialchars($task['description']) ?></p>
                        <p>Equipe: 
                            <?php
                                $idteam = $task['team_id'];
                                $teams = $team->read($idteam);
                                echo htmlspecialchars($teams['name']); 
                            ?>
                        </p>
                        <p>Responsável: 
                            <?php 
                                $iduser = htmlspecialchars($task['assignee_id']);
                                $users = $user->read($iduser);
                                echo $users['username'];
                            ?>
                        </p>
                        <div class="task-controls">
                            <button class="move-to btn btn-success" data-status="todo">Regredir</button>
                            <button class="move-to btn btn-danger" data-status="done">Concluir</button>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <div class="kanban-column" id="done" style="background-color: aquamarine;margin-right: 1%;">
            <h3 class="text-center" style="color: #fff;">Concluído</h3>
            <?php foreach ($tasks as $task): ?>
                <?php if ($task['status'] === 'done'): ?>
                    <div class="kanban-task" data-id="<?= $task['id'] ?>">
                        <h4><?= htmlspecialchars($task['title']) ?></h4>
                        <p><?= htmlspecialchars($task['description']) ?></p>
                        <p>Equipe: 
                            <?php
                                $idteam = $task['team_id'];
                                $teams = $team->read($idteam);
                                echo htmlspecialchars($teams['name']); 
                            ?>
                        </p>
                        <p>Responsável: 
                            <?php 
                                $iduser = htmlspecialchars($task['assignee_id']);
                                $users = $user->read($iduser);
                                echo $users['username'];
                            ?>
                        </p>
                        <div class="task-controls">
                            <button class="move-to btn btn-success" data-status="todo">Regredir</button>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(function() {
            $(".kanban-column").sortable({
                connectWith: ".kanban-column",
                placeholder: "ui-state-highlight",
                stop: function(event, ui) {
                    var taskId = ui.item.data('id');
                    var newStatus = $(ui.item).closest('.kanban-column').attr('id');
                    $.ajax({
                        url: 'update_task_status.php',
                        type: 'POST',
                        data: { id: taskId, status: newStatus },
                        success: function(response) {
                            console.log('Tarefa atualizada com sucesso!');
                            location.reload(); // Recarregar para atualizar o estado das tarefas
                        },
                        error: function(xhr, status, error) {
                            console.error('Erro: ' + error);
                        }
                    });
                }
            }).disableSelection();

            $(".move-to").click(function() {
                var taskId = $(this).closest('.kanban-task').data('id');
                var newStatus = $(this).data('status');
                $.ajax({
                    url: 'update_task_status.php',
                    type: 'POST',
                    data: { id: taskId, status: newStatus },
                    success: function(response) {
                        console.log('Tarefa atualizada com sucesso!');
                        location.reload(); // Recarregar para atualizar o estado das tarefas
                    },
                    error: function(xhr, status, error) {
                        console.error('Erro: ' + error);
                    }
                });
            });
        });
    </script>
</body>
</html>
