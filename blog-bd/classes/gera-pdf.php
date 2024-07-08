<?php

require '../vendor/autoload.php';

use Dompdf\Options;
use Dompdf\Dompdf;

class Pdf
{

    public function GerarPdfNiveis()
    {
        //INICIALIZAR A CLASSE DO DOMPDF
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $pdf = new DOMPDF($options);
        //DEFINE ALGUMAS VARIAVEIS PARA APOIAR A GERAÇÃO DAS INFORMAÇÕES DA NOTIFICACAO
        $tipo = 'Pdf-Niveis';
        $extensao = '.pdf';
        $arquivo = $tipo.$extensao;
        $urladminivel = 'gerenciar.php';
        //ALIMENTAR OS DADOS DO PDF
        $html = utf8_encode(file_get_contents($urladminivel));
        //Definir o tamanho do papel e orientação da página
        $pdf->set_paper('A4', 'portrait');
        //CARREGAR O CONTEÚDO HTML
        $pdf->load_html(utf8_decode($html));
        //RENDERIZAR O PDF
        $pdf->render();
        //NOMEAR O PDF GERADO
        $pdf->stream($arquivo, array("Attachment" => true));
    }

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
        $pdf->stream($nome_arquivo, array("Attachment" => false));
    }

    public function GerarAdvertenciaArea($id)
    {
        //INICIALIZAR A CLASSE DO DOMPDF
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $pdf = new DOMPDF($options);
        //DEFINE ALGUMAS VARIAVEIS PARA APOIAR A GERAÇÃO DAS INFORMAÇÕES DA NOTIFICACAO
        $tipo = 'Advertencia-';
        $extensao = '.pdf';
        $arquivo = $tipo.$id.$extensao;
        //ALIMENTAR OS DADOS DO PDF
        $html = utf8_encode(file_get_contents(urlarea."adverte.php?idans=".$id));
        //Definir o tamanho do papel e orientação da página
        $pdf->set_paper('A4', 'portrait');
        //CARREGAR O CONTEÚDO HTML
        $pdf->load_html(utf8_decode($html));
        //RENDERIZAR O PDF
        $pdf->render();
        //NOMEAR O PDF GERADO
        $pdf->stream($arquivo, array("Attachment" => true));
    }

    public function GerarMultaArea($id)
    {
        //INICIALIZAR A CLASSE DO DOMPDF
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $pdf = new DOMPDF($options);
        //DEFINE ALGUMAS VARIAVEIS PARA APOIAR A GERAÇÃO DAS INFORMAÇÕES DA NOTIFICACAO
        $tipo = 'Multa-';
        $extensao = '.pdf';
        $arquivo = $tipo.$id.$extensao;
        //ALIMENTAR OS DADOS DO PDF
        $html = utf8_encode(file_get_contents(urlarea."monta-multa.php?idans=".$id));
        //Definir o tamanho do papel e orientação da página
        $pdf->set_paper('A4', 'portrait');
        //CARREGAR O CONTEÚDO HTML
        $pdf->load_html(utf8_decode($html));
        //RENDERIZAR O PDF
        $pdf->render();
        //NOMEAR O PDF GERADO
        $pdf->stream($arquivo, array("Attachment" => true));
    }

    public function GerarNotificacaoAdmin($id)
    {
        //INICIALIZAR A CLASSE DO DOMPDF
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $pdf = new DOMPDF($options);
        //DEFINE ALGUMAS VARIAVEIS PARA APOIAR A GERAÇÃO DAS INFORMAÇÕES DA NOTIFICACAO
        $tipo = 'Notificacao-';
        $extensao = '.pdf';
        $arquivo = $tipo.$id.$extensao;
        //ALIMENTAR OS DADOS DO PDF
        $html = utf8_encode(file_get_contents(urladmin."notificacao.php?id=".$id));
        //Definir o tamanho do papel e orientação da página
        $pdf->set_paper('A4', 'portrait');
        //CARREGAR O CONTEÚDO HTML
        $pdf->load_html(utf8_decode($html));
        //RENDERIZAR O PDF
        $pdf->render();
        //NOMEAR O PDF GERADO
        $pdf->stream($arquivo, array("Attachment" => true));
    }

    public function GerarAdvertenciaAdmin($id)
    {
        //INICIALIZAR A CLASSE DO DOMPDF
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $pdf = new DOMPDF($options);
        //DEFINE ALGUMAS VARIAVEIS PARA APOIAR A GERAÇÃO DAS INFORMAÇÕES DA NOTIFICACAO
        $tipo = 'Advertencia-';
        $extensao = '.pdf';
        $arquivo = $tipo.$id.$extensao;
        //ALIMENTAR OS DADOS DO PDF
        $html = utf8_encode(file_get_contents(urladmin."adverte.php?idans=".$id));
        //Definir o tamanho do papel e orientação da página
        $pdf->set_paper('A4', 'portrait');
        //CARREGAR O CONTEÚDO HTML
        $pdf->load_html(utf8_decode($html));
        //RENDERIZAR O PDF
        $pdf->render();
        //NOMEAR O PDF GERADO
        $pdf->stream($arquivo, array("Attachment" => true));
    }

    public function GerarMultaAdmin($id)
    {
        //INICIALIZAR A CLASSE DO DOMPDF
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $pdf = new DOMPDF($options);
        //DEFINE ALGUMAS VARIAVEIS PARA APOIAR A GERAÇÃO DAS INFORMAÇÕES DA NOTIFICACAO
        $tipo = 'Multa-';
        $extensao = '.pdf';
        $arquivo = $tipo.$id.$extensao;
        //ALIMENTAR OS DADOS DO PDF
        $html = utf8_encode(file_get_contents(urladmin."monta-multa.php?idans=".$id));
        //Definir o tamanho do papel e orientação da página
        $pdf->set_paper('A4', 'portrait');
        //CARREGAR O CONTEÚDO HTML
        $pdf->load_html(utf8_decode($html));
        //RENDERIZAR O PDF
        $pdf->render();
        //NOMEAR O PDF GERADO
        $pdf->stream($arquivo, array("Attachment" => true));
    }

}

?>
