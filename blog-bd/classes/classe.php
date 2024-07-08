<?php

define($host, 'localhost');
define($pasta, '/blogapi/classes/');
session_start();
ob_start();

class Sistema
{
    function conectado()
    {
        
        $host = 'localhost';
        $bd = 'blogapi';
        $usuario = 'root';
        $senha = '123456';
        $carac = 'utf8';

        try 
        {
            $conexao = new PDO("mysql:host=$host;dbname=$bd;charset=$carac;", $usuario, $senha);
            $conexao->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
            return $conexao;
        } 
        catch (PDOException $e) 
        {
            msg('danger','Erro ao conectar com o banco de dados: ' .$e->getMessage());
            die();
        }
    }

}

function msg($tipo, $mensagem)
{
    echo "<div class='alert alert-{$tipo}'>{$mensagem}</div>";
}

function logs($usuario,$acao) 
{
    $link = new Sistema();
    $linka = $link->conectado();
    $linka->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $ip = $_SERVER['REMOTE_ADDR'];
    $sql = "INSERT INTO logs SET usuario = :usuario, ip = :ip, data_acao = NOW(), acao = :acao";
    $sql = $linka->prepare($sql);
    $sql->bindValue(":usuario", $usuario);  
    $sql->bindValue(":ip", $ip);
    $sql->bindValue(":acao", $acao);
    $sql->execute();
}

function pegacaminho()
{
    $url = $_SERVER['REQUEST_URI'];
    $url = explode('?', $url);
    $url = $url[0];
    return $url;
}

function pegaurl()
{
    $url = (isset($_GET['pagina'])) ? $_GET['pagina'] : 'inicio';
    $explode = explode('/', $url);
    $dir = "pags/";
    $ext = ".php";

    if(file_exists($dir.$explode['0'].$ext))
    {
        require_once($dir.$explode['0'].$ext);
    }
    else
    {			
        echo "Página não encontrada";
    }
}
function mostra_dados_tabela($tabela)
{
    $link = new Sistema();
    $linka = $link->conectado();
    $linka->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM " . $tabela;
    $sql = $linka->prepare($sql);
    $sql->execute();
    $dados = $sql->fetchAll(PDO::FETCH_ASSOC);
    return $dados;
}

// Função para converter qualquer data que esteja no formato errado na data brasileira
// Exemplo: echo data($variavel-com-a-data);

function databr($data)
{
return date("d/m/Y", strtotime($data));
}

// Função para converter qualquer data que esteja no formato errado na data brasileira
// Exemplo: echo data($variavel-com-a-data);

function redireciona($tempo, $dir)
{
    echo "<meta http-equiv='refresh' content='{$tempo}; url={$dir}'>";
}

// Função para validar o token
function validarToken()
{
    // Recuperar o token do cookie
    $token = $_COOKIE['token'];
    //var_dump($token);

    // Converter o token em array
    $token_array = explode('.', $token);
    //var_dump($token_array);
    $header = $token_array[0];
    $payload = $token_array[1];
    $signature = $token_array[2];

    // Chave secreta e única
    $chave = "DGBU85S46H9M5W4X6OD7";

    // Usar o header e o payload e codificar com o algoritmo sha256
    $validar_assinatura = hash_hmac('sha256', "$header.$payload", $chave, true);

    // Codificar dados em base64
    $validar_assinatura = base64_encode($validar_assinatura);

    // Comparar a assinatura do token recebido com a assinatura gerada.
    // Acessa o IF quando o token é válido
    if($signature == $validar_assinatura)
    {

        // decodificar dados de base64
        $dados_token = base64_decode($payload);

        // Converter objeto em array
        $dados_token = json_decode($dados_token);
        //var_dump($dados_token);

        // Comparar a data de vencimento do token com a data atual
        // Acessa o IF quando a data do token é maior do que a data atual
        if($dados_token->exp > time())
        {
            // Retorna TRUE indicando que o token é válido
            return true;
        }
        else
        {
            // Acessa o ELSE quando a data do token é menor ou igual a data atual
            // Retorna FALSE indicando que o token é inválido
            return false;
        }        
    }
    else
    { 
        // Acessa o ELSE quando o token é inválido
        // Retorna FALSE indicando que o token é inválido
        return false;
    }    

}

// Recuperar o nome salvo no token
function recuperarNomeToken()
{
    // Recuperar o token do cookie
    $token = $_COOKIE['token'];

    // Converter o token em array
    $token_array = explode('.', $token);
    //var_dump($token_array);
    $payload = $token_array[1];

    // decodificar dados de base64
    $dados_token = base64_decode($payload);

    // Converter objeto em array
    $dados_token = json_decode($dados_token);
    // var_dump($dados_token);

    // Retorna o nome do usuário salvo no token
    return $dados_token->nome;
}

// Recuperar o email salvo no token
function recuperarEmailToken()
{
    // Recuperar o token do cookie
    $token = $_COOKIE['token'];

    // Converter o token em array
    $token_array = explode('.', $token);
    //var_dump($token_array);
    $payload = $token_array[1];

    // decodificar dados de base64
    $dados_token = base64_decode($payload);

    // Converter objeto em array
    $dados_token = json_decode($dados_token);
    // var_dump($dados_token);

    // Retorna o nome do usuário salvo no token
    return $dados_token->email;
}

?>
