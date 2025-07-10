<?php

require '../../DB/Database.php';
require '../../../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

switch ($_SERVER['REQUEST_METHOD']) {
    case 'POST':
        $email = $_POST['email'];
        $db = new Database('usuarios');

        $user = $db->select(
            where: "email = '$email'",
            fields: 'nome, email'
        )->fetch(PDO::FETCH_ASSOC);

        // var_dump($user);

        if ($user) {
            $token = bin2hex(random_bytes(32)); // gera um token aleatório unico do usuario

            $db->update(
                ['token_recuperacao' => $token],
                "email = '$email'"
            );

            $link = "http://localhost/tweeb-2025/PI/app/user/View/pages/ResetarSenha.php?token=$token";
            // echo($link);

            try {
                $mail = new PHPMailer(true);

                // Configurações do servidor SMTP
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'tweebecommerce@gmail.com';
                $mail->Password   = 'uemc ruwc bfsu lebo'; // Coloque a senha aqui com segurança
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port       = 587;

                // Remetente e destinatário
                $mail->setFrom('tweebecommerce@gmail.com', 'Tweeb');
                $mail->addAddress("$email");

                // Conteúdo do e-mail
                $mail->isHTML(true);
                $mail->Subject = 'Redefinir Senha';

                // configurações do conteudo do email

                
                $body = file_get_contents('../../../public/email_template.html');
                
                $mail->addEmbeddedImage('../../../public/assets/img/logo.png', 'logoCID'); // 'logoCID' é o ID

                $nome = explode(' ', $user['nome']);
                $nome = "$nome[0] $nome[1]";
                $body = str_replace('{{nome}}', $nome, $body);
                $body = str_replace('{{link}}', $link, $body);

                $mail->Body = $body;

                $mail->send();
                echo "<script>alert('Email enviado com sucesso!'); window.location.href='../view/pages/esqueceuSenha.php';</script>";
            } catch (Exception $e) {
                echo "Erro ao enviar o e-mail: {$mail->ErrorInfo}";
            }
        }
        else{
            echo "<script>alert('Email não cadastrado'); window.location.href='../view/pages/esqueceuSenha.php';</script>";
        }
        break;
}