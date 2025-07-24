<?php
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['usuario']['id'])) {
    echo json_encode(['success' => false, 'message' => 'Usuário não autenticado']);
    exit();
}

require_once __DIR__ . '/../../DB/Database.php';

$id_usuario = $_SESSION['usuario']['id'];
$action = $_POST['action'] ?? $_GET['action'] ?? '';
$id_produto = $_POST['id_produto'] ?? $_GET['id_produto'] ?? 0;

$db = new Database();

switch ($action) {
    case 'toggle':
        // Verifica se já está favoritado
        $check = $db->execute("SELECT * FROM favoritos WHERE id_usuario = ? AND id_produto = ?", [$id_usuario, $id_produto]);
        if ($check->rowCount() > 0) {
            // Remove
            $db->execute("DELETE FROM favoritos WHERE id_usuario = ? AND id_produto = ?", [$id_usuario, $id_produto]);
            echo json_encode(['success' => true, 'favoritado' => false, 'message' => 'Removido dos favoritos']);
        } else {
            // Adiciona
            $db->execute("INSERT INTO favoritos (id_usuario, id_produto) VALUES (?, ?)", [$id_usuario, $id_produto]);
            echo json_encode(['success' => true, 'favoritado' => true, 'message' => 'Adicionado aos favoritos']);
        }
        break;

    case 'listar':
        $result = $db->execute("SELECT p.* FROM favoritos f INNER JOIN produtos p ON f.id_produto = p.id_produto WHERE f.id_usuario = ?", [$id_usuario]);
        $favoritos = $result->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode(['success' => true, 'favoritos' => $favoritos]);
        break;

    case 'verificar':
        $check = $db->execute("SELECT * FROM favoritos WHERE id_usuario = ? AND id_produto = ?", [$id_usuario, $id_produto]);
        echo json_encode(['success' => true, 'favoritado' => $check->rowCount() > 0]);
        break;

    default:
        echo json_encode(['success' => false, 'message' => 'Ação inválida']);
} 