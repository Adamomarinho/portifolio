		<?php

class Relatorios 
{

    public function RelatorioPosts($nome_usuario) 
    {

        require_once 'classes.php';

        $conecta = new Sistema();
        $link = $conecta->conectado();

		// Definimos o nome do arquivo que será exportado
        $arquivo = 'Relatorio-posts-' . $nome_usuario . '.xls';
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="1">';
		$html .= '<tr>';
		$html .= '<td colspan="7" style="text-align:center;"><b>Relatorio de Equipes do Usuario - ' . $nome_usuario . '</b></td>';
		$html .= '</tr>';
		
		$html .= '<tr>';
		$html .= '<td style="text-align:center;background-color: #44749F;color: #fff;"><b>ID</b></td>';
        $html .= '<td style="text-align:center;background-color: #44749F;color: #fff;"><b>CATEGORIA</b></td>';
		$html .= '<td style="text-align:center;background-color: #44749F;color: #fff;"><b>TITULO</b></td>';
		$html .= '<td style="text-align:center;background-color: #44749F;color: #fff;"><b>CONTEUDO</b></td>';
        $html .= '<td style="text-align:center;background-color: #44749F;color: #fff;"><b>SITUACAO</b></td>';
        $html .= '<td style="text-align:center;background-color: #44749F;color: #fff;"><b>USUARIO</b></td>';
		$html .= '<td style="text-align:center;background-color: #44749F;color: #fff;"><b>CRIADO</b></td>';

		$html .= '</tr>';
		
		//Selecionar todos os itens da tabela 

        $query_post = "SELECT * from posts"; 

        $result_post = $link->query($query_post);
		
		while($posts = $result_post->fetch(PDO::FETCH_ASSOC)){
			$html .= '<tr>';
			$html .= '<td>'.$posts['id'].'</td>';
            $html .= '<td>'.$posts['categoria'].'</td>';
			$html .= '<td>'.$posts['titulo'].'</td>';
			$html .= '<td>'.$posts['conteudo'].'</td>';
            $html .= '<td>'.$posts['situacao'].'</td>';
			$html .= '<td>'.$posts['usuario'].'</td>';
			$html .= '<td>'.$posts['criado'].'</td>';
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

    }

    public function RelatorioUsuarios($nome_usuario) 
    {

        require_once 'classes.php';

        $conecta = new Sistema();
        $link = $conecta->conectado();

		// Definimos o nome do arquivo que será exportado
        $arquivo = 'Relatorio-usuarios-' . $nome_usuario . '.xls';
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="1">';
		$html .= '<tr>';
		$html .= '<td colspan="6" style="text-align:center;"><b>Relatorio de Usuarios - ' . $nome_usuario . '</b></td>';
		$html .= '</tr>';
		
		$html .= '<tr>';
		$html .= '<td style="text-align:center;background-color: #44749F;color: #fff;"><b>ID</b></td>';
        $html .= '<td style="text-align:center;background-color: #44749F;color: #fff;"><b>NOME</b></td>';
		$html .= '<td style="text-align:center;background-color: #44749F;color: #fff;"><b>EMAIL</b></td>';
		$html .= '<td style="text-align:center;background-color: #44749F;color: #fff;"><b>SENHA</b></td>';
        $html .= '<td style="text-align:center;background-color: #44749F;color: #fff;"><b>SITUACAO</b></td>';
        $html .= '<td style="text-align:center;background-color: #44749F;color: #fff;"><b>NIVEL</b></td>';

		$html .= '</tr>';
		
		//Selecionar todos os itens da tabela 

        $query_user = "SELECT * from usuario"; 

        $result_user = $link->query($query_user);
		
		while($user = $result_user->fetch(PDO::FETCH_ASSOC)){
			$html .= '<tr>';
			$html .= '<td>'.$user['idusuario'].'</td>';
            $html .= '<td>'.$user['nomeuser'].'</td>';
			$html .= '<td>'.$user['emailuser'].'</td>';
			$html .= '<td>'.$user['senha'].'</td>';
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

    }

    public function RelatorioPermissoes($nome_usuario) 
    {

        require_once 'classes.php';

        $conecta = new Sistema();
        $link = $conecta->conectado();

		// Definimos o nome do arquivo que será exportado
        $arquivo = 'Relatorio-permissoes-' . $nome_usuario . '.xls';
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="1">';
		$html .= '<tr>';
		$html .= '<td colspan="5" style="text-align:center;"><b>Relatorio de Permissoes para o Usuario - ' . $nome_usuario . '</b></td>';
		$html .= '</tr>';
		
		$html .= '<tr>';
		$html .= '<td style="text-align:center;background-color: #44749F;color: #fff;"><b>ID</b></td>';
        $html .= '<td style="text-align:center;background-color: #44749F;color: #fff;"><b>ID USUARIO</b></td>';
		$html .= '<td style="text-align:center;background-color: #44749F;color: #fff;"><b>ID SITUACAO</b></td>';
		$html .= '<td style="text-align:center;background-color: #44749F;color: #fff;"><b>ID CATEGORIA</b></td>';
        $html .= '<td style="text-align:center;background-color: #44749F;color: #fff;"><b>ID NIVEL</b></td>';

		$html .= '</tr>';
		
		//Selecionar todos os itens da tabela 

        $query_perm = "SELECT * from permissao"; 

        $result_perm = $link->query($query_perm);
		
		while($perm = $result_perm->fetch(PDO::FETCH_ASSOC)){
			$html .= '<tr>';
			$html .= '<td>'.$perm['id'].'</td>';
            $html .= '<td>'.$perm['iduser'].'</td>';
			$html .= '<td>'.$perm['idsituacao'].'</td>';
			$html .= '<td>'.$perm['idcat'].'</td>';
            $html .= '<td>'.$perm['idnivel'].'</td>';
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

    }

    public function RelatorioLogs($nome_usuario) 
    {

        require_once 'classes.php';

        $conecta = new Sistema();
        $link = $conecta->conectado();

		// Definimos o nome do arquivo que será exportado
        $arquivo = 'Relatorio-logs-' . $nome_usuario . '.xls';
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="1">';
		$html .= '<tr>';
		$html .= '<td colspan="5" style="text-align:center;"><b>Relatorio de logs para o Usuario - ' . $nome_usuario . '</b></td>';
		$html .= '</tr>';
		
		$html .= '<tr>';
		$html .= '<td style="text-align:center;background-color: #44749F;color: #fff;"><b>ID</b></td>';
        $html .= '<td style="text-align:center;background-color: #44749F;color: #fff;"><b>USUARIO</b></td>';
		$html .= '<td style="text-align:center;background-color: #44749F;color: #fff;"><b>IP</b></td>';
		$html .= '<td style="text-align:center;background-color: #44749F;color: #fff;"><b>ACAO</b></td>';
        $html .= '<td style="text-align:center;background-color: #44749F;color: #fff;"><b>DATA</b></td>';

		$html .= '</tr>';
		
		//Selecionar todos os itens da tabela 

        $query_log = "SELECT * from logs"; 

        $result_log = $link->query($query_log);
		
		while($logs = $result_log->fetch(PDO::FETCH_ASSOC)){
			$html .= '<tr>';
			$html .= '<td>'.$logs['id'].'</td>';
            $html .= '<td>'.$logs['usuario'].'</td>';
			$html .= '<td>'.$logs['ip'].'</td>';
			$html .= '<td>'.$logs['acao'].'</td>';
            $html .= '<td>'.$logs['data_acao'].'</td>';
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

    }

    public function RelatorioNiveis()
    {

        require_once 'classes.php';

        $conecta = new Sistema();
        $link = $conecta->conectado();

		// Definimos o nome do arquivo que será exportado
        $arquivo = 'Relatorio-niveis.xls';
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="1">';
		$html .= '<tr>';
		$html .= '<td colspan="2" style="text-align:center;"><b>Relatorio de Equipes</b></td>';
		$html .= '</tr>';
		
		$html .= '<tr>';
		$html .= '<td style="text-align:center;background-color: #44749F;color: #fff;"><b>ID</b></td>';
        $html .= '<td style="text-align:center;background-color: #44749F;color: #fff;"><b>NIVEL</b></td>';

		$html .= '</tr>';
		
		//Selecionar todos os itens da tabela 

        $query_nvl = "SELECT * from nivel"; 

        $result_nvl = $link->query($query_nvl);
		
		while($nvl = $result_nvl->fetch(PDO::FETCH_ASSOC))
		{
			$html .= '<tr>';
			$html .= '<td>'.$nvl['idnivel'].'</td>';
            $html .= '<td>'.$nvl['nomenivel'].'</td>';
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

    }

    public function RelatorioSituacao($nome_usuario) 
    {

        require_once 'classes.php';

        $conecta = new Sistema();
        $link = $conecta->conectado();

		// Definimos o nome do arquivo que será exportado
        $arquivo = 'Relatorio-situacoes-' . $nome_usuario . '.xls';
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="1">';
		$html .= '<tr>';
		$html .= '<td colspan="2" style="text-align:center;"><b>Relatorio de Situacoes para o Usuario - ' . $nome_usuario . '</b></td>';
		$html .= '</tr>';
		
		$html .= '<tr>';
		$html .= '<td style="text-align:center;background-color: #44749F;color: #fff;"><b>ID</b></td>';
        $html .= '<td style="text-align:center;background-color: #44749F;color: #fff;"><b>SITUACAO</b></td>';

		$html .= '</tr>';
		
		//Selecionar todos os itens da tabela 

        $query_sit = "SELECT * from situacao"; 

        $result_sit = $link->query($query_sit);
		
		while($sit = $result_sit->fetch(PDO::FETCH_ASSOC)){
			$html .= '<tr>';
			$html .= '<td>'.$sit['idsit'].'</td>';
            $html .= '<td>'.$sit['nomesit'].'</td>';
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

    }

    public function RelatorioCategorias($nome_usuario) 
    {

        require_once 'classes.php';

        $conecta = new Sistema();
        $link = $conecta->conectado();

		// Definimos o nome do arquivo que será exportado
        $arquivo = 'Relatorio-categorias-' . $nome_usuario . '.xls';
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="1">';
		$html .= '<tr>';
		$html .= '<td colspan="2" style="text-align:center;"><b>Relatorio de Categorias para o Usuario - ' . $nome_usuario . '</b></td>';
		$html .= '</tr>';
		
		$html .= '<tr>';
		$html .= '<td style="text-align:center;background-color: #44749F;color: #fff;"><b>ID</b></td>';
        $html .= '<td style="text-align:center;background-color: #44749F;color: #fff;"><b>CATEGORIA</b></td>';

		$html .= '</tr>';
		
		//Selecionar todos os itens da tabela 

        $query_cat = "SELECT * from categoria"; 

        $result_cat = $link->query($query_cat);
		
		while($cat = $result_cat->fetch(PDO::FETCH_ASSOC)){
			$html .= '<tr>';
			$html .= '<td>'.$cat['idcat'].'</td>';
            $html .= '<td>'.$cat['nomecat'].'</td>';
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

    }


}	

 ?>
