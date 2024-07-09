<?php    

require '../../classes/classe.php';
require '../sessao.php';

$verifica = new VerificaUser();
$verifica->SessaoUsuario('../../blog.php');
$usuario = $_SESSION['nome'];

$conecta = new Sistema();
$link = $conecta->conectado();

// Definimos o nome do arquivo que será exportado
$arquivo = 'Relatorio-usuarios-' . $usuario . '.xls';
// Criamos uma tabela HTML com o formato da planilha
$html = '';
$html .= '<table border="1">';
$html .= '<tr>';
$html .= '<td colspan="2" style="text-align:center;background-color: blue;color:white;"><b>Relatorio de Niveis do Usuario - ' . $usuario .'</b></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="text-align:center;background-color: #44749F;color: #fff;"><b>ID</b></td>';
$html .= '<td style="text-align:center;background-color: #44749F;color: #fff;"><b>USUARIO</b></td>';
$html .= '<td style="text-align:center;background-color: #44749F;color: #fff;"><b>EMAIL</b></td>';
$html .= '<td style="text-align:center;background-color: #44749F;color: #fff;"><b>SITUACAO</b></td>';
$html .= '<td style="text-align:center;background-color: #44749F;color: #fff;"><b>NIVEL</b></td>';
$html .= '</tr>';

//Selecionar todos os itens da tabela 

$query_user = "SELECT u.idusuario as iduser, u.nomeuser, u.emailuser, s.nomesit as situacao, n.nomenivel as nivel from usuario as u
left join situacao as s on u.situacaouser = s.idsit
left join nivel as n on u.idnivel = n.idnivel 
order by u.idusuario asc"; 
$result_user = $link->query($query_user);
while($user = $result_user->fetch(PDO::FETCH_ASSOC))
{
    $html .= '<tr>';
    $html .= '<td>'.$user['iduser'].'</td>';
    $html .= '<td>'.$user['nomeuser'].'</td>';
    $html .= '<td>'.$user['emailuser'].'</td>';
    $html .= '<td>'.$user['situacao'].'</td>';
    $html .= '<td>'.$user['nivel'].'</td>';
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