<?php
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['funcionario'])) {
    echo json_encode(['sucesso' => false, 'mensagem' => 'Usuário não autenticado']);
    exit;
}

if (!isset($_FILES['foto_perfil'])) {
    echo json_encode(['sucesso' => false, 'mensagem' => 'Nenhum arquivo enviado']);
    exit;
}

$foto = $_FILES['foto_perfil'];

// Verifica erro no upload
if ($foto['error'] !== UPLOAD_ERR_OK) {
    echo json_encode(['sucesso' => false, 'mensagem' => 'Erro ao enviar a imagem']);
    exit;
}

// Verifica tipo de arquivo permitido
$extensao = strtolower(pathinfo($foto['name'], PATHINFO_EXTENSION));
$permitidas = ['jpg', 'jpeg', 'png', 'webp'];
if (!in_array($extensao, $permitidas)) {
    echo json_encode(['sucesso' => false, 'mensagem' => 'Formato de imagem não permitido']);
    exit;
}

// Gera nome único e caminho de destino
$nomeUnico = uniqid('perfil_') . '.' . $extensao;
$caminhoFinal = '../../../public/uploads/' . $nomeUnico;

// Move a imagem para a pasta
if (!move_uploaded_file($foto['tmp_name'], $caminhoFinal)) {
    echo json_encode(['sucesso' => false, 'mensagem' => 'Falha ao salvar a imagem']);
    exit;
}

// Atualiza no banco de dados
require_once '../../DB/Database.php';
$db = new Database();
$db->execute("UPDATE usuarios SET foto_perfil = ? WHERE id = ?", [$nomeUnico, $_SESSION['funcionario']['id']]);

// Atualiza a sessão
$_SESSION['funcionario']['foto_perfil'] = $nomeUnico;

// Retorna sucesso
echo json_encode([
    'sucesso' => true,
    'foto' => $nomeUnico
]);
