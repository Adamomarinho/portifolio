<?php
require_once 'db.php';
require_once 'User.php';

$db = new Database();
$user = new User($db->conn);

$id = $_GET['id'];
$user->delete($id);
header('Location: list_users.php');
?>