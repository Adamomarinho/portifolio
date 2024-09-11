<?php
require_once 'db.php';
require_once 'Task.php';

$db = new Database();
$task = new Task($db->conn);

$id = $_GET['id'];
$task->delete($id);
header('Location: list_tasks.php');
?>