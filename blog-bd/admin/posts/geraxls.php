<?php    

require '../../classes/classe.php';
require '../sessao.php';

$verifica = new VerificaUser();
$verifica->SessaoUsuario('../../blog.php');
$usuario = $_SESSION['nome'];

$conecta = new Sistema();
$link = $conecta->conectado();

// Definimos o nome do arquivo que será exportado
$arquivo = 'Relatorio-posts-' . $usuario . '.xls';
// Criamos uma tabela HTML com o formato da planilha
$html = '';
$html .= '<table border="1">';
$html .= '<tr>';
$html .= '<td colspan="6" style="text-align:center;background-color: blue;color:white;"><b>Relatorio de post para o Usuario - ' . $usuario .'</b></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="text-align:center;background-color: #44749F;color: #fff;"><b>ID</b></td>';
$html .= '<td style="text-align:center;background-color: #44749F;color: #fff;"><b>TITULO</b></td>';
$html .= '<td style="text-align:center;background-color: #44749F;color: #fff;"><b>CONTEUDO</b></td>';
$html .= '<td style="text-align:center;background-color: #44749F;color: #fff;"><b>CATEGORIA</b></td>';
$html .= '<td style="text-align:center;background-color: #44749F;color: #fff;"><b>USUARIO</b></td>';
$html .= '<td style="text-align:center;background-color: #44749F;color: #fff;"><b>SITUACAO</b></td>';
$html .= '</tr>';

//Selecionar todos os itens da tabela 

$query_post = "SELECT p.id, p.titulo, p.conteudo, u.nomeuser as usuario, c.nomecat as categoria, s.nomesit as situacao from posts as p
left join situacao as s on p.situacao = s.idsit
left join usuario as u on p.usuario = u.idusuario
left join categoria as c on p.categoria = c.idcat"; 
$result_post = $link->query($query_post);
while($post = $result_post->fetch(PDO::FETCH_ASSOC))
{
    $html .= '<tr>';
    $html .= '<td>'.$post['id'].'</td>';
    $html .= '<td>'.$post['titulo'].'</td>';
    $html .= '<td>'.$post['conteudo'].'</td>';
    $html .= '<td>'.$post['categoria'].'</td>';
    $html .= '<td>'.$post['usuario'].'</td>';
    $html .= '<td>'.$post['situacao'].'</td>';
    $html .= '</tr>';
}

// Configurações header para forçar o download
header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
header ("Content-type: application/x-msexcel");
header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
header ("Content-Description: PHP Generated Data" );
// Envia o conteúdo do arquivo
echo $html;
exit;

?>