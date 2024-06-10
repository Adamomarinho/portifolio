<?php

require '../vendor/autoload.php';
require_once '../classes/dados.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Email
{
    public function NovoUsuario($remetente, $destinatario, $titulo, $corpo, $iduser)
    {
        $mail = new PHPMailer();
        try 
        {
            // Server settings
            $mail->CharSet = 'UTF-8';
            $mail->isSMTP();                                      // Define o mail para usar o SMTP
            $mail->Host = 'site.com.br';                  // Define o host do e-mail
            $mail->SMTPAuth = true;                               // Permite autenticação SMTP 
            $mail->Username = 'email@site.com.br';          // Conta de e-mail que enviará o e-mail
            $mail->Password = '123456';                         // Senha da conta de e-mail
            $mail->SMTPSecure = 'ssl';                            // Permite encriptação TLS
            $mail->Port = 465;                                    // Porta TCP que irá se conectar
            // Quem ira receber
            $mail->setFrom($remetente); // Define o remetente
            $mail->addAddress($destinatario);             // Define o destinário
            // Conteudo
            $mail->isHTML(true);            // Define o formato do e-mail para HTML
            $mail->Subject = $titulo;      // Titulo da mensagem
            $mail->Body = $corpo;
            if (!$mail->send()) 
            {
                msg('danger','Mensagem de erro: ' . $mail->ErrorInfo);
                return true;
            } 
            else 
            {
               msg('success','Notificação enviada com sucesso');
               redireciona(5, 'viewuser.php?id=' . $iduser);
               return false;
            } 
        } 
        catch (Exception $e)  // Se capturar exceção retorna false
        {
            return false;
        }
    }

    public function RecuperaSenha($remetente, $destinatario, $titulo, $corpo, $iduser)
    {
        $mail = new PHPMailer();
        try 
        {
            // Server settings
            $mail->CharSet = 'UTF-8';
            $mail->isSMTP();                                      // Define o mail para usar o SMTP
            $mail->Host = 'site.com.br';                         // Define o host do e-mail
            $mail->SMTPAuth = true;                               // Permite autenticação SMTP 
            $mail->Username = 'email@site.com.br';                  // Conta de e-mail que enviará o e-mail
            $mail->Password = '123456';                           // Senha da conta de e-mail
            $mail->SMTPSecure = 'ssl';                            // Permite encriptação TLS
            $mail->Port = 465;                                    // Porta TCP que irá se conectar
            // Quem ira receber
            $mail->setFrom($remetente); // Define o remetente
            $mail->addAddress($destinatario);             // Define o destinário
            // Conteudo
            $mail->isHTML(true); // Define o formato do e-mail para HTML
            $mail->Subject = $titulo;      // Titulo da mensagem
            $mail->Body = $corpo;
            if (!$mail->send()) 
            {
                msg('danger','Mensagem de erro: ' . $mail->ErrorInfo);
                return true;
            } 
            else 
            {
               msg('success','Justificativa enviada com sucesso');
               redireciona(5, 'recupera.php?id=' . $iduser);
               return false;
            } 
        } 
        catch (Exception $e)  // Se capturar exceção retorna false
        {
            return false;
        }
    }

}

?>