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
            fields: 'email'
        )->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            $token = bin2hex(random_bytes(32)); // gera um token aleatório unico do usuario

            $db->update(
                ['token_recuperacao' => $token],
                "email = '$email'"
            );

            $link = "http://localhost/tweeb-2025/PI/app/user/View/pages/ResetarSenha.php?token=$token";
            echo($link);

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
                $mail->Body    = 'Clique no link para redefinir sua senha: ' . $link;

                $mail->send();
                echo 'E-mail enviado com sucesso!';
            } catch (Exception $e) {
                echo "Erro ao enviar o e-mail: {$mail->ErrorInfo}";
            }
        }
        else{
            echo "<script>alert('Email não cadastrado'); window.location.href='../view/pages/esqueceuSenha.php';</script>";
        }
        break;
}