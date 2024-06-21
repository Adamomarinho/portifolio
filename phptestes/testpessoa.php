<?php

require 'pessoa.php';

use PHPUnit\Framework\TestCase;

class PessoaTest extends TestCase
{

    public function testePegaNomeInteiro()
    {

            $this->expectOutputString('Adamo Marinho');
            $pessoa = new Pessoa();
            $pessoa->setNome('Adamo');
            $pessoa->setSobrenome('Marinho');
            return $pessoa->getNomeInteiro();

    }

}

?>
