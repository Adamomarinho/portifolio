<?php

require '../vendor/autoload.php';
require_once '../classes/dados.php';

use Dompdf\Options;
use Dompdf\Dompdf;

class GerarPdf
{

    public function GerarPdfUsuario($id)
    {
        //INICIALIZAR A CLASSE DO DOMPDF
        $urladmin = 'blogapi/admin/';
        $funcao = 'usuario/';
        $link = $urladmin.$funcao;
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $pdf = new DOMPDF($options);
        //DEFINE ALGUMAS VARIAVEIS PARA APOIAR A GERAÇÃO DAS INFORMAÇÕES DA NOTIFICACAO
        $tipo = 'usuario-';
        $extensao = '.pdf';
        $arquivo = $tipo.$id.$extensao;
        //ALIMENTAR OS DADOS DO PDF
        $html = utf8_encode(file_get_contents($link."relatoriouser.php?id=".$id));
        //Definir o tamanho do papel e orientação da página
        $pdf->set_paper('A4', 'portrait');
        //CARREGAR O CONTEÚDO HTML
        $pdf->load_html(utf8_decode($html));
        //RENDERIZAR O PDF
        $pdf->render();
        //NOMEAR O PDF GERADO
        $pdf->stream($arquivo, array("Attachment" => true));
    }

    public function GerarPdfPost($id)
    {
        //INICIALIZAR A CLASSE DO DOMPDF
        $urladmin = 'blogapi/admin/';
        $funcao = 'posts/';
        $link = $urladmin.$funcao;
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $pdf = new DOMPDF($options);
        //DEFINE ALGUMAS VARIAVEIS PARA APOIAR A GERAÇÃO DAS INFORMAÇÕES DA NOTIFICACAO
        $tipo = 'post-';
        $extensao = '.pdf';
        $arquivo = $tipo.$id.$extensao;
        //ALIMENTAR OS DADOS DO PDF
        $html = utf8_encode(file_get_contents($link."relatorioposts.php?id=".$id));
        //Definir o tamanho do papel e orientação da página
        $pdf->set_paper('A4', 'portrait');
        //CARREGAR O CONTEÚDO HTML
        $pdf->load_html(utf8_decode($html));
        //RENDERIZAR O PDF
        $pdf->render();
        //NOMEAR O PDF GERADO
        $pdf->stream($arquivo, array("Attachment" => true));
    }

    public function GerarPdfPermissao($id)
    {
        //INICIALIZAR A CLASSE DO DOMPDF
        $urladmin = 'blogapi/admin/';
        $funcao = 'permissao/';
        $link = $urladmin.$funcao;
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $pdf = new DOMPDF($options);
        //DEFINE ALGUMAS VARIAVEIS PARA APOIAR A GERAÇÃO DAS INFORMAÇÕES DA NOTIFICACAO
        $tipo = 'permissao-';
        $extensao = '.pdf';
        $arquivo = $tipo.$id.$extensao;
        //ALIMENTAR OS DADOS DO PDF
        $html = utf8_encode(file_get_contents($link."relatoriopermissao.php?id=".$id));
        //Definir o tamanho do papel e orientação da página
        $pdf->set_paper('A4', 'portrait');
        //CARREGAR O CONTEÚDO HTML
        $pdf->load_html(utf8_decode($html));
        //RENDERIZAR O PDF
        $pdf->render();
        //NOMEAR O PDF GERADO
        $pdf->stream($arquivo, array("Attachment" => true));
    }

    public function GerarPdfSituacao($id)
    {
        //INICIALIZAR A CLASSE DO DOMPDF
        $urladmin = 'blogapi/admin/';
        $funcao = 'situacao/';
        $link = $urladmin.$funcao;
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $pdf = new DOMPDF($options);
        //DEFINE ALGUMAS VARIAVEIS PARA APOIAR A GERAÇÃO DAS INFORMAÇÕES DA NOTIFICACAO
        $tipo = 'situacao-';
        $extensao = '.pdf';
        $arquivo = $tipo.$id.$extensao;
        //ALIMENTAR OS DADOS DO PDF
        $html = utf8_encode(file_get_contents($link."relatoriosituacao.php?id=".$id));
        //Definir o tamanho do papel e orientação da página
        $pdf->set_paper('A4', 'portrait');
        //CARREGAR O CONTEÚDO HTML
        $pdf->load_html(utf8_decode($html));
        //RENDERIZAR O PDF
        $pdf->render();
        //NOMEAR O PDF GERADO
        $pdf->stream($arquivo, array("Attachment" => true));
    }

    public function GerarPdfNivel($id)
    {
        //INICIALIZAR A CLASSE DO DOMPDF
        $urladmin = 'blogapi/admin/';
        $funcao = 'nivel/';
        $link = $urladmin.$funcao;
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $pdf = new DOMPDF($options);
        //DEFINE ALGUMAS VARIAVEIS PARA APOIAR A GERAÇÃO DAS INFORMAÇÕES DA NOTIFICACAO
        $tipo = 'nivel-';
        $extensao = '.pdf';
        $arquivo = $tipo.$id.$extensao;
        //ALIMENTAR OS DADOS DO PDF
        $html = utf8_encode(file_get_contents($link."relatorionivel.php?id=".$id));
        //Definir o tamanho do papel e orientação da página
        $pdf->set_paper('A4', 'portrait');
        //CARREGAR O CONTEÚDO HTML
        $pdf->load_html(utf8_decode($html));
        //RENDERIZAR O PDF
        $pdf->render();
        //NOMEAR O PDF GERADO
        $pdf->stream($arquivo, array("Attachment" => true));
    }

    public function GerarPdfLog($id)
    {
        //INICIALIZAR A CLASSE DO DOMPDF
        $urladmin = 'blogapi/admin/';
        $funcao = 'logs/';
        $link = $urladmin.$funcao;
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $pdf = new DOMPDF($options);
        //DEFINE ALGUMAS VARIAVEIS PARA APOIAR A GERAÇÃO DAS INFORMAÇÕES DA NOTIFICACAO
        $tipo = 'log-';
        $extensao = '.pdf';
        $arquivo = $tipo.$id.$extensao;
        //ALIMENTAR OS DADOS DO PDF
        $html = utf8_encode(file_get_contents($link."relatoriouser.php?id=".$id));
        //Definir o tamanho do papel e orientação da página
        $pdf->set_paper('A4', 'portrait');
        //CARREGAR O CONTEÚDO HTML
        $pdf->load_html(utf8_decode($html));
        //RENDERIZAR O PDF
        $pdf->render();
        //NOMEAR O PDF GERADO
        $pdf->stream($arquivo, array("Attachment" => true));
    }

    public function GerarPdfCategoria($id)
    {
        //INICIALIZAR A CLASSE DO DOMPDF
        $urladmin = 'blogapi/admin/';
        $funcao = 'categoria/';
        $link = $urladmin.$funcao;
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $pdf = new DOMPDF($options);
        //DEFINE ALGUMAS VARIAVEIS PARA APOIAR A GERAÇÃO DAS INFORMAÇÕES DA NOTIFICACAO
        $tipo = 'categoria-';
        $extensao = '.pdf';
        $arquivo = $tipo.$id.$extensao;
        //ALIMENTAR OS DADOS DO PDF
        $html = utf8_encode(file_get_contents($link."relatoriocategoria.php?id=".$id));
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