<?php
require_once 'db.php';
require_once 'Task.php';

$db = new Database();
$task = new Task($db->conn);

$id = $_POST['id'];
$status = $_POST['status'];

if (in_array($status, ['todo', 'in_progress', 'done'])) {
    $task->updateStatus($id, $status);
    echo 'Status atualizado com sucesso!';
} else {
    echo 'Status inválido!';
}
?>