<?php

require '../vendor/autoload.php';

use Dompdf\Options;
use Dompdf\Dompdf;

class Pdf
{
    function GerarPdf($nomepdf,$fonte_dados)
    {
        //INICIALIZAR A CLASSE DO DOMPDF
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $pdf = new DOMPDF($options);
        //DEFINE ALGUMAS VARIAVEIS PARA APOIAR A GERAÇÃO DAS INFORMAÇÕES DA NOTIFICACAO
        //ALIMENTAR OS DADOS DO PDF
        $html = utf8_encode(file_get_contents($fonte_dados));
        //Definir o tamanho do papel e orientação da página
        $pdf->set_paper('A4', 'portrait');
        //CARREGAR O CONTEÚDO HTML
        $pdf->load_html(utf8_decode($html));
        //RENDERIZAR O PDF
        $pdf->render();
        //NOMEAR O PDF GERADO
        $pdf->stream($nomepdf, array("Attachment" => false));
    }
    
}

?>
