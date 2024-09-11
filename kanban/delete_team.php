<?php
require_once 'db.php';
require_once 'Team.php';

$db = new Database();
$team = new Team($db->conn);

$id = $_GET['id'];
$team->delete($id);
header('Location: list_teams.php');
?>