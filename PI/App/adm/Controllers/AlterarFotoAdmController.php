<?php
ob_start(); // Garante que nenhum output anterior atrapalhe os headers
require_once __DIR__ . '/../Models/Funcionario.php';
require_once __DIR__ . '/../../DB/Database.php';

session_start();

header('Content-Type: application/json');

// Verifica se o usuário está logado como admin ou funcionário
if (!isset($_SESSION['adm']) && !isset($_SESSION['funcionario'])) {
    http_response_code(401);
    echo json_encode(['erro' => 'Usuário não autenticado']);
    exit;
}

// Define qual sessão usar
$usuario = isset($_SESSION['adm']) ? $_SESSION['adm'] : $_SESSION['funcionario'];
$tipo_sessao = isset($_SESSION['adm']) ? 'adm' : 'funcionario';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['foto_perfil'])) {
    $usuarioId = $usuario['id'];
    $foto = $_FILES['foto_perfil'];

    $extensao = strtolower(pathinfo($foto['name'], PATHINFO_EXTENSION));
    $permitidas = ['jpg', 'jpeg', 'png', 'gif', 'jfif'];

    if (!in_array($extensao, $permitidas)) {
        http_response_code(400);
        echo json_encode(['erro' => 'Extensão não permitida']);
        exit;
    }

    if ($foto['size'] > 2 * 1024 * 1024) {
        http_response_code(400);
        echo json_encode(['erro' => 'Arquivo muito grande']);
        exit;
    }

    $novoNome = 'foto_' . $usuarioId . '_' . time() . '.' . $extensao;
    $destino = __DIR__ . '/../../../public/uploads/' . $novoNome;

    if (move_uploaded_file($foto['tmp_name'], $destino)) {
        $db = new Database('usuarios');
        $db->update(['foto_perfil' => $novoNome], "id = $usuarioId");

        // Atualiza a sessão
        $_SESSION[$tipo_sessao]['foto_perfil'] = $novoNome;

        echo json_encode(['sucesso' => true, 'nova_foto' => $novoNome]);
        exit;
    } else {
        http_response_code(500);
        echo json_encode(['erro' => 'Erro ao salvar a imagem']);
        exit;
    }
} else {
    http_response_code(405);
    echo json_encode(['erro' => 'Método não permitido']);
    exit;
} 