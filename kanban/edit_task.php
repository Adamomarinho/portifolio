<?php
require_once 'db.php';
require_once 'Task.php';
require_once 'Team.php';
require_once 'User.php';

$db = new Database();
$task = new Task($db->conn);
$team = new Team($db->conn);
$user = new User($db->conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $status = $_POST['status'];
    $team_id = $_POST['team_id'];
    $assignee_id = $_POST['assignee_id'];

    $task->update($id, $title, $description, $status, $team_id, $assignee_id);
    echo 'Tarefa atualizada com sucesso!';
} else {
    $id = $_GET['id'];
    $taskData = $task->read($id);
    //$teams = $team->conn->query("SELECT * FROM teams")->fetchAll(PDO::FETCH_ASSOC);
    //$users = $user->conn->query("SELECT * FROM users")->fetchAll(PDO::FETCH_ASSOC);
    $teams = $team->getAll();
    $users = $user->getAll();

}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Listagem de Tarefas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  </head>
<body>
<div class="container text-center" style="margin-top: 2%;">
    <div class="row text-center">
        <form method="post">
            <input type="hidden" name="id" value="<?= htmlspecialchars($taskData['id']) ?>">
            <label for="title">Título:</label>
            <input type="text" id="title" name="title" value="<?= htmlspecialchars($taskData['title']) ?>" required>
            <br><br>
            <label for="description">Descrição:</label>
            <textarea id="description" name="description"><?= htmlspecialchars($taskData['description']) ?></textarea>
            <br><br>
            <label for="status">Status:</label>
            <select id="status" name="status">
                <option value="todo" <?= $taskData['status'] === 'todo' ? 'selected' : '' ?>>A Fazer</option>
                <option value="in_progress" <?= $taskData['status'] === 'in_progress' ? 'selected' : '' ?>>Em Progresso</option>
                <option value="done" <?= $taskData['status'] === 'done' ? 'selected' : '' ?>>Concluído</option>
            </select>
            <br><br>
            <label for="team_id">Equipe:</label>
            <select id="team_id" name="team_id">
                <?php foreach ($teams as $team): ?>
                    <option value="<?= $team['id'] ?>" <?= $taskData['team_id'] == $team['id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($team['name']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <br><br>
            <label for="assignee_id">Responsável:</label>
            <select id="assignee_id" name="assignee_id">
                <?php foreach ($users as $user): ?>
                    <option value="<?= $user['id'] ?>" <?= $taskData['assignee_id'] == $user['id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($user['username']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <br><br>
            <input type="submit" class="btn btn-primary" value="Atualizar Tarefa">&nbsp;
            <a href="list_tasks.php" class="btn btn-success">Voltar</a>
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </body>
</html>