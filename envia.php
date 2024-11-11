<?php

require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';
require 'path/to/PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Verificar se o formulário foi enviado via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Coletar os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $mensagem = $_POST['texto'];

    // Criar uma nova instância do PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Configurações do servidor SMTP
        $mail->isSMTP(); // Definir uso do SMTP
        $mail->Host = 'smtp.gmail.com'; // SMTP server para Gmail
        $mail->SMTPAuth = true; // Ativar autenticação SMTP
        $mail->Username = 'rafaella.desenvolvedora@gmail.com'; // E-mail do remetente 
        $mail->Password = 'hkdb dhur kllh dwsn'; // Senha da sua conta de e-mail 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Usar criptografia TLS
        $mail->Port = 587; // Porta para o Gmail (587 para TLS)

        // Remetente e destinatário
        $mail->setFrom('seuemail@gmail.com', 'Seu Nome'); // O e-mail do remetente
        $mail->addAddress('destinatario@dominio.com', 'Nome do Destinatário'); // E-mail do destinatário

        // Definir assunto e corpo do e-mail
        $mail->isHTML(true); // Enviar como HTML
        $mail->Subject = 'Nova mensagem de contato'; // Assunto
        $mail->Body    = "<h2>Nova mensagem de contato</h2>
                          <p><strong>Nome:</strong> $nome</p>
                          <p><strong>E-mail:</strong> $email</p>
                          <p><strong>Telefone:</strong> $telefone</p>
                          <p><strong>Mensagem:</strong></p>
                          <p>$mensagem</p>"; // Corpo da mensagem em HTML
        $mail->AltBody = "Nova mensagem de contato: \nNome: $nome\nE-mail: $email\nTelefone: $telefone\nMensagem: $mensagem"; // Corpo em texto simples (para quando o cliente não suportar HTML)

        // Enviar o e-mail
        $mail->send();
        echo 'Mensagem enviada com sucesso!';
    } catch (Exception $e) {
        echo "Falha ao enviar a mensagem. Erro: {$mail->ErrorInfo}";
    }
}
?>
