<?php
$object = new StdClass();
$object->id = 1;
$object->nome = "William";
$object->departamento = "IMOB";
$object->cargo = "Engenheiro";

$result = json_encode($object);
$output = json_decode($result, true);

print "<pre>";
print_r($result);
?>
