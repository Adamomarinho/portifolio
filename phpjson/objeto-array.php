<?php
$object = new StdClass();
$object->id = 1;
$object->nome = "William";
$object->departamento = "IMOB";
$object->cargo = "Engenheiro";

print"<pre>";
print_r( (array) $object );
?>
