<?php

$inputArray = array
(
    'nome' => 'William',
    'email' => 'William@gmail.com',
    'fone' => '12345678',
    'REG1'
);

$estudante = (object) array
(
    'nome' => 'William',
    'email' => 'William@gmail.com',
    'fone' => '12345678',
    'REG1'
);

echo '<pre>' . print_r($estudante, true) . '</pre>';
echo '<br />' . $estudante->nome;
echo '<br />' . $estudante->email;
echo '<br />' . $estudante->fone;
echo '<br />' . $estudante->{0};

?>
