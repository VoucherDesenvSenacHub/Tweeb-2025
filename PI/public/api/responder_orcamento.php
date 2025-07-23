<?php
require '../../vendor/autoload.php';
include_once '../../App/user/Models/Orcamento.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

switch($_SERVER['REQUEST_METHOD']){
    case 'POST':
        $data = $_POST['data'];
        $email = $_POST['email'];
        $enviadoPor = $_POST['enviadoPor'];
        $id = $_POST['id'];
        $resposta = $_POST['resposta'];
        $titulo = $_POST['titulo'];

        $orcamento = new Orcamento();
        $orcamento->aceitar_orcamento($id);
        
        try {
            $mail = new PHPMailer(true);
            $mail->CharSet = 'UTF-8';
            $mail->Encoding = 'base64';


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
            $mail->Subject = $titulo;

            // Corpo do e-mail com os dados da resposta
            $mail->Body = "
                <h2>Resposta ao Orçamento</h2>
                <p><strong>Data:</strong> {$data}</p>
                <p><strong>Enviado por:</strong> {$enviadoPor}</p>
                <p><strong>Resposta:</strong></p>
                <p>{$resposta}</p>
                <br>
                <p>Atenciosamente,<br>{$enviadoPor}</p>
            ";

            $mail->send();
            echo json_encode("foi");
        } catch (Exception $e) {
            echo json_encode("Erro ao enviar o e-mail: {$mail->ErrorInfo}");
        }

        break;

}