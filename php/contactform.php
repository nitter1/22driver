<?php
include_once("PHPMailer/PHPMailer.php");
include_once("PHPMailer/SMTP.php");
include_once("PHPMailer/Exception.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

$nome       = $_POST['nome'];
$assunto    = $_POST['assunto'];
$email      = $_POST['email'];
$mensagem   = $_POST['mensagem'];

try {
    // Configurações do servidor
    $mail->isSMTP();                                            // Enviar usando SMTP
    $mail->CharSet    = 'UTF-8';                                // Definir conjunto de caracteres da mensagem
    $mail->Host       = 'smtp.gmail.com';                       // Definir o servidor SMTP para envio
    $mail->SMTPAuth   = true;                                   // Habilitar autenticação SMTP
    $mail->Username   = 'radiodivinaldigital@gmail.com';        // Nome de usuário SMTP
    $mail->Password   = 'nbtn vaxk izsl qxpu';                  // Senha SMTP
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Habilitar criptografia TLS implícita
    $mail->Port       = 587;                                    // Porta TCP para conectar; use 587 se você tiver configurado `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    // Destinatários
    $mail->setFrom('radiodivinaldigital@gmail.com', 'Divinal Digital');
    $mail->addAddress('radiodivinaldigital@gmail.com');

    // Conteúdo
    $mail->isHTML(true); // Definir formato de email para HTML
    $mail->Subject = $assunto;
    $mail->Body    = "Nome: $nome<br>Email: $email<br>Mensagem: $mensagem";

    $mail->send();
    echo '<b>Mensagem enviada com sucesso</b>';
} catch (Exception $e) {
    echo 'Não foi possível enviar a mensagem. Erro do Mailer: ' . $mail->ErrorInfo;
}
?>