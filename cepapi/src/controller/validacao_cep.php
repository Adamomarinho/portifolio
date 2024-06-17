<?php 
    function verifica_cep()
    {
        $cep = $_POST["cep"];
        if(strlen($cep) < 8)
        {
            echo "<div class='alert alert-danger' role='alert'>O CEP digitado não caracteriza um CEP válido.</div>";
        }
        else
        {
            header("location:src/view/resultado.php?cep=$cep");
        }
    }

?>
