<?php 

    include_once "conexao.php";

    function result($c)
    {
        conexao($c);
        $r = $GLOBALS["return"];
        if (isset($r["erro"]))
        {
            echo "<div class='alert alert-danger' role='alert'>Cep digitado incorreto.</div>";
        }
        else
        {
            global $rua, $comp, $bairro, $cidade, $estado;
            $rua = $r["logradouro"];
            $comp = $r["complemento"];
            $bairro = $r["bairro"];
            $cidade = $r["localidade"];
            $estado = $r["uf"];
        }
    }

?>
