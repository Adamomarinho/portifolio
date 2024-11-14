<?php
require_once 'db.php';
require_once 'User.php';
require_once 'UserLevel.php';

$db = new Database();
$user = new User($db->conn);
$userLevel = new UserLevel($db->conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level_id = $_POST['level_id'];

    $user->create($username, $password, $level_id);
    echo 'Usuário criado com sucesso!';
}

$levels = $userLevel->getAll();
//$levels = $userLevel->conn->query("SELECT * FROM user_levels")->fetchAll(PDO::FETCH_ASSOC);

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
    <div class="row">
        <form method="post">
            <label for="username">Nome de Usuário:</label>
            <input type="text" id="username" name="username" required>
            <br><br>
            <label for="password">Senha:</label>
            <input type="password" id="password" name="password" required>
            <br><br>
            <label for="level_id">Nível:</label>
            <select id="level_id" name="level_id">
                <?php foreach ($levels as $level): ?>
                    <option value="<?= $level['id'] ?>"><?= htmlspecialchars($level['name']) ?></option>
                <?php endforeach; ?>
            </select>
            <br><br>
            <input type="submit" class="btn btn-primary" value="Criar Usuário">&nbsp;
            <a href="list_users.php" class="btn btn-success">Voltar</a>
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </body>
</html>