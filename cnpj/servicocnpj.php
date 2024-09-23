<?php

class CONSULTACNPJ 
{
    private $apiUrl = "https://www.receitaws.com.br/v1/cnpj/";

    public function getCNPJData($cnpj) 
    {
        $cnpj = preg_replace('/\D/', '', $cnpj); // Remove caracteres não numéricos
        $response = file_get_contents($this->apiUrl . $cnpj);
        return json_decode($response, true);
    }
}

?>