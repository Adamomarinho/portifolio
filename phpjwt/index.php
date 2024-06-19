<?php

session_start();

ob_start();

include_once 'conexao.php';

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login JWT</title>
    <meta name="viewport"ncontent="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="https://getbootstrap.com/docs/5.0/examples/sign-in/signin.css" rel="stylesheet">
    <style>
      .bd-placeholder-img
      {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px)
      {
        .bd-placeholder-img-lg
        {
          font-size: 3.5rem;
        }
      }
    </style>
</head>
<body>
    <?php

    // Senha neste echo password_hash('123456', PASSWORD_DEFAULT);
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4 text-center" style="margin-top: 5%;">

    <h1>Login</h1>

    <?php

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (!empty($dados['LoginJwt']))
{

    $query_usuario = "SELECT id, nome, usuario, email, senha FROM usuarios WHERE usuario =:usuario LIMIT 1";

    $result_usuario = $conn->prepare($query_usuario);

    $result_usuario->bindParam(':usuario', $dados['usuario']);

    $result_usuario->execute();

    if (($result_usuario) and ($result_usuario->rowCount() != 0))
    {

        $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);

        if (password_verify($dados['senha'], $row_usuario['senha']))
        {

            $header = [
                'alg' => 'HS256',
                'typ' => 'JWT'
                ];

            $header = json_encode($header);

            $header = base64_encode($header);

            $duracao = time() + (7 * 24 * 60 * 60);

            $payload = [
                'exp' => $duracao,
                'id' => $row_usuario['id'],
                'nome' => $row_usuario['nome'],
                'email' => $row_usuario['email']
            ];


            $payload = json_encode($payload);

            $payload = base64_encode($payload);

            $chave = "DGBU85S46H9M5W4X6OD7";

            $signature = hash_hmac('sha256', "$header.$payload", $chave, true);

            $signature = base64_encode($signature);

            setcookie('token', "$header.$payload.$signature", (time() + (7 * 24 * 60 * 60)));

            header("Location: dashboard.php");

        }
        else
        {
            $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Usuário ou senha inválida!</p>";
        }
    }
    else
    {
        $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Usuário ou senha inválida!</p>";
    }
}

if (isset($_SESSION['msg']))
{
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}
?>

    <form method="POST" action="" style="background-color: #ffffff;"><br>
        <?php
            $usuario = "";
if (isset($dados['usuario']))
{
    $usuario = $dados['usuario'];
}
?>
        <label>Usuário: </label>
        <input type="text" name="usuario" placeholder="Digite o usuário" value="<?php echo $usuario; ?>"><br><br>

        <?php
    $senha = "";
if (isset($dados['senha']))
{
    $senha = $dados['senha'];
}
?>        
        <label>Senha: &nbsp;</label>
        <input type="password" name="senha" placeholder="Digite a senha" value="<?php echo $senha; ?>"><br><br>
        <input type="submit" name="LoginJwt" value="Acessar" class="btn btn-lg btn-primary"><br><br>

    </form>
<br>
    Usuário: admin@admin.com.br<br>
    Senha: 123456

        </div>
        <div class="col-md-4"></div>
    </div>
</div>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
