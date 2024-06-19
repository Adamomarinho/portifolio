<html>
<body>
<?php

class student
{

    public function __construct($id, $nome, $estado, $cidade, $pais)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->estado = $estado;
        $this->cidade = $cidade;
        $this->pais = $pais;
    }
}
$student= new student("1", "William", "Goias", "Trindade", "BR");

print "<pre>";
if (is_object($student)) {
    echo "Objeto: " . '<br>';
    $result = json_encode($student);
    print_r($result);
    $studentArray = json_decode($result, true);
}

if(!empty($studentArray) && is_array($studentArray)) {
    echo "<br><br>Array de saida:" . '<br>';
    print_r($studentArray);
}
?></body>
</html>
