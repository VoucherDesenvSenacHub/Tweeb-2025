<?php
session_start();
if (!isset($_SESSION['usuario']['id'])) {
    header('Location: /Tweeb-2025/PI/app/user/view/pages/login.php');
    exit();
}

require_once __DIR__ . '/../Models/Usuario.php';
require_once __DIR__ . '/../../DB/Database.php';

$db = new Database();         // cria instância
$pdo = $db->conn;             // acessa a conexão criada no construtor

$id_usuario = $_SESSION['usuario']['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Verifica se o arquivo foi enviado sem erro
    if (isset($_FILES['foto_perfil']) && $_FILES['foto_perfil']['error'] === UPLOAD_ERR_OK) {

        $extensao = pathinfo($_FILES['foto_perfil']['name'], PATHINFO_EXTENSION);
        $nomeArquivo = 'perfil_' . $id_usuario . '_' . time() . '.' . $extensao;

        // Caminho da nova pasta
        $pastaDestino = realpath(__DIR__ . '/../../../') . '/public/uploads/';
        $caminhoCompleto = $pastaDestino . $nomeArquivo;

        if (move_uploaded_file($_FILES['foto_perfil']['tmp_name'], $caminhoCompleto)) {
            // Atualiza o banco com o novo nome do arquivo
            $stmt = $pdo->prepare("UPDATE usuarios SET foto_perfil = :foto WHERE id = :id");
            $stmt->execute([
                ':foto' => $nomeArquivo,
                ':id' => $id_usuario
            ]);

            // Recarrega os dados atualizados do usuário e atualiza a sessão
            $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
            $stmt->execute([':id' => $id_usuario]);
            $usuarioAtualizado = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($usuarioAtualizado) {
                $_SESSION['usuario'] = $usuarioAtualizado;
            }
        } else {
            echo "Erro ao mover a imagem para o servidor.";
            exit;
        }
    }

    header('Location: ../View/pages/perfil-usuario.php');
    exit;
}
