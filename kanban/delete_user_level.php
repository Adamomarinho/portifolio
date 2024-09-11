<?php
require_once 'db.php';
require_once 'UserLevel.php';

$db = new Database();
$userLevel = new UserLevel($db->conn);

$id = $_GET['id'];
$userLevel->delete($id);
header('Location: list_user_levels.php');
?>