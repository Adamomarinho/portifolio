<?php

require 'classe.php';
require 'email.php';
class Login
{
    function logar($usuario,$senha)
    {
		if(isset($usuario) && isset($senha))
        {
            $conecta = new Sistema();
            $busca = $conecta->conectado();
			$stmt = $busca->prepare("SELECT u.idusuario, u.nomeuser, u.emailuser, u.senha, s.nomesit, n.nomenivel from usuario as u
            left join situacao as s on u.situacaouser = s.idsit
            left join nivel as n on u.idnivel = n.idnivel WHERE u.emailuser = :usuario");
			$stmt->execute([':usuario' => $usuario]);
			$total = $stmt->rowCount();
			if($total > 0)
            {
				$dados = $stmt->fetch(PDO::FETCH_ASSOC);
				if(password_verify($senha, $dados['senha']))
                {
                    $_SESSION['id'] =  $dados['idusuario'];
                    $_SESSION['nome'] =  $dados['nomeuser'];
					$_SESSION['email'] = $dados['emailuser'];
                    $_SESSION['nivel'] =  $dados['nomenivel'];
                    $_SESSION['situacao'] =  $dados['nomesit'];
                    if ($_SESSION['nivel'] == 'Admin' and $_SESSION['situacao'] == 'Ativo') 
                    {
                        redireciona(3, '../admin/dashboard.php');
                        exit();
                    }
                    else
                    {
                        if($_SESSION['Situacao' != 'Ativo'])
                        {
                            unset($_SESSION['id'], $_SESSION['nome'],$_SESSION['email'],$_SESSION['nivel'],$_SESSION['situacao']);
                            redireciona(3, '../blog.php');
                        }
                    }
                    if ($_SESSION['nivel'] == 'Escritor' and $_SESSION['situacao'] == 'Ativo') 
                    {
                        redireciona(3, '../admin/escritor.php');
                        exit();
                    }
                    else
                    {
                        if($_SESSION['Situacao' != 'Ativo'])
                        {
                            unset($_SESSION['id'], $_SESSION['nome'],$_SESSION['email'],$_SESSION['nivel'],$_SESSION['situacao']);
                            redireciona(3, '../blog.php');
                        }
                    }
				}
                else
                {
					msg("danger", "Usuário ou senha inválidos");
				}
			}
            else
            {
                $_SESSION['msg'] = msg("danger", "Usuário ou senha inválidos");
            }
		}
        else
        {
            $_SESSION['msg'] = msg("danger", "Usuário ou senha inválidos");
        }
        if(isset($_SESSION['msg']))
        {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
	}

    function VerificaUsuario()
    {
        session_start();
        ob_start();
        if($_SESSION['nivel'] == 'Admin' and $_SESSION['situacao'] == 'Ativo')
        {
            redireciona(3, 'dashboard.php');
        }
        if($_SESSION['nivel'] == 'Escritor' and $_SESSION['situacao'] == 'Ativo')
        {
            redireciona(3, 'escritor.php');
        }
    }

    function SemSessao($destino)
    {
        session_start();
        ob_start();
        if((!isset($_SESSION['id'])) AND (!isset($_SESSION['nome'])) and (!isset($_SESSION['email'])) and (!isset($_SESSION['nivel'])) AND (!isset($_SESSION['situacao'])))
        {
            unset($_SESSION['id'], $_SESSION['nome'],$_SESSION['email'],$_SESSION['nivel'],$_SESSION['situacao']);
            $_SESSION['msg'] = msg('danger','Deslogado com sucesso do Sistema');
            redireciona(3, $destino);
        }
    }
    function Deslogar($destino)
    {
        session_start();
        ob_start();
        unset($_SESSION['id'], $_SESSION['nome'],$_SESSION['email'],$_SESSION['nivel'],$_SESSION['situacao']);
        $_SESSION['msg'] = msg('danger','Deslogado com sucesso do Sistema');
        redireciona(3, $destino);
    }

    function PegaDadosSessao($campo)
    {
            $conecta = new Sistema();
            $busca = $conecta->conectado();
			$stmt = $busca->prepare("SELECT * from usuario WHERE emailuser = :usuario");
			$stmt->execute([':usuario' => $_SESSION['email']]);
			$dados = $stmt->fetch(PDO::FETCH_ASSOC);
			return $dados[$campo];
	}

    function RecuperaSenha($email)
    {
        if (!empty($email)) 
        {
            //var_dump($dados);
            $conecta = new Sistema();
            $busca = $conecta->conectado();
            $query_usuario = "SELECT id, nomeuser, emailuser FROM usuario WHERE emailuser = :usuario LIMIT 1";
            $result_usuario = $busca->prepare($query_usuario);
            $result_usuario->bindParam(':usuario', $email, PDO::PARAM_STR);
            $result_usuario->execute();
    
            if (($result_usuario) and ($result_usuario->rowCount() != 0)) 
            {
                $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
                $chave_recuperar_senha = password_hash($row_usuario['idusuario'], PASSWORD_DEFAULT);
                //echo "Chave $chave_recuperar_senha <br>";
    
                $query_up_usuario = "UPDATE usuario SET recuperasenha = :recuperar_senha WHERE idusuario = :id LIMIT 1";
                $result_up_usuario = $busca->prepare($query_up_usuario);
                $result_up_usuario->bindParam(':recuperar_senha', $chave_recuperar_senha, PDO::PARAM_STR);
                $result_up_usuario->bindParam(':id', $row_usuario['idusuario'], PDO::PARAM_INT);
    
                if ($result_up_usuario->execute()) 
                {
                    
                    $link = "http://localhost/phpapi/atualiza_senha.php?chave=$chave_recuperar_senha";
                    $remetente = '';
                    $destinatario = '';
                    $titulo = '';
                    $corpo = '';
                    $iduser = $row_usuario['idusuario'];
                    $emailuser = $row_usuario['emailuser'];
                    $usuario = $row_usuario['nomeuser'];

                    $enviar = new Email();
                    $enviar->RecuperaSenha($remetente,$destinatario,$titulo,$corpo,$iduser,$link,$emailuser,$usuario);
                    /*
                    try 
                    {
                        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
                        $mail->CharSet = 'UTF-8';
                        $mail->isSMTP();
                        $mail->Host       = 'sandbox.smtp.mailtrap.io';
                        $mail->SMTPAuth   = true;
                        $mail->Username   = '05b0b5196f0658';
                        $mail->Password   = 'c5d7f139de71ea';
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                        $mail->Port       = 2525;
                        $mail->setFrom('contato@site.com.br', 'Atendimento');
                        $mail->addAddress($row_usuario['emailuser'], $row_usuario['nomeuser']);
                        $mail->isHTML(true);                                  //Set email format to HTML
                        $mail->Subject = 'Recuperar senha';
                        $mail->Body    = 'Prezado(a) ' . $row_usuario['nome'] .".<br><br>Você solicitou alteração de senha.<br><br>Para continuar o processo de recuperação de sua senha, clique no link abaixo ou cole o endereço no seu navegador: <br><br><a href='" . $link . "'>" . $link . "</a><br><br>Se você não solicitou essa alteração, nenhuma ação é necessária. Sua senha permanecerá a mesma até que você ative este código.<br><br>";
                        $mail->AltBody = 'Prezado(a) ' . $row_usuario['nome'] ."\n\nVocê solicitou alteração de senha.\n\nPara continuar o processo de recuperação de sua senha, clique no link abaixo ou cole o endereço no seu navegador: \n\n" . $link . "\n\nSe você não solicitou essa alteração, nenhuma ação é necessária. Sua senha permanecerá a mesma até que você ative este código.\n\n";
                        $mail->send();
    
                        $_SESSION['msg'] = "<p style='color: green'>Enviado e-mail com instruções para recuperar a senha. Acesse a sua caixa de e-mail para recuperar a senha!</p>";
                        header("Location: index.php");
                    } 
                    catch (Exception $e) 
                    {
                        echo "Erro: E-mail não enviado sucesso. Mailer Error: {$mail->ErrorInfo}";
                    }
                    */
                } 
                else 
                {
                    echo  "<p style='color: #ff0000'>Erro: Tente novamente!</p>";
                }
            } 
            else 
            {
                echo "<p style='color: #ff0000'>Erro: Usuário não encontrado!</p>";
            }
        }
    }

    function AtualizaSenha($chave)
    {
        $chave = filter_input(INPUT_GET, 'chave', FILTER_DEFAULT);
        if (!empty($chave)) 
        {
            //var_dump($chave);
            $conecta = new Sistema();
            $busca = $conecta->conectado();
            $query_usuario = "SELECT idusuario FROM usuario WHERE recuperasenha = :recuperar_senha LIMIT 1";
            $result_usuario = $busca->prepare($query_usuario);
            $result_usuario->bindParam(':recuperar_senha', $chave, PDO::PARAM_STR);
            $result_usuario->execute();

            if (($result_usuario) and ($result_usuario->rowCount() != 0)) 
            {
                $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
                $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                //var_dump($dados);
                if (empty($dados['SendNovaSenha'])) 
                {
                    $senha = password_hash($dados['senha'], PASSWORD_DEFAULT);
                    $recuperar_senha = 'NULL';

                    $query_up_usuario = "UPDATE usuario SET senha = :senha, recuperasenha = :recuperar_senha WHERE idusuario =:id LIMIT 1";
                    $result_up_usuario = $busca->prepare($query_up_usuario);
                    $result_up_usuario->bindParam(':senha', $senha, PDO::PARAM_STR);
                    $result_up_usuario->bindParam(':recuperar_senha', $recuperar_senha);
                    $result_up_usuario->bindParam(':id', $row_usuario['idusuario'], PDO::PARAM_INT);

                    if ($result_up_usuario->execute()) 
                    {
                        $_SESSION['msg'] = "<p style='color: green'>Senha atualizada com sucesso!</p>";
                        header("Location: index.php");
                    } 
                    else 
                    {
                        echo "<p style='color: #ff0000'>Erro: Tente novamente!</p>";
                    }
                }
            } 
            else 
            {
                $_SESSION['msg_rec'] = "<p style='color: #ff0000'>Erro: Link inválido, solicite novo link para atualizar a senha!</p>";
                header("Location: recuperar_senha.php");
            }
        } 
        else 
        {
            $_SESSION['msg_rec'] = "<p style='color: #ff0000'>Erro: Link inválido, solicite novo link para atualizar a senha!</p>";
            header("Location: recuperar_senha.php");
        }
    }

}

?>