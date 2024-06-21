<?php

class Pessoa
{
    private $nome;
    private $sobrenome;

    public function setNome($n)
    {
        $this->nome = $n;
    }

    public function setSobrenome($s)
    {
        $this->sobrenome = $s;
    }

    public function getNomeInteiro()
    {
        return $this->nome. ' '.$this->sobrenome;
    }

}

?>
