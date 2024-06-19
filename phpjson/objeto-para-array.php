<?php

class estudante
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

$estudante = new estudante("1", "William", "Trindade", "Goias", "BR");
$resultado = json_encode($estudante);
$saida = json_decode($resultado, true);
print "<pre>";
print_r($saida);
?>
