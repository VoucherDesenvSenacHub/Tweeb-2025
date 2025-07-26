<?php
require_once __DIR__. '/../../App/DB/Database.php';

header('Content-Type: application/json');

// Verificar se o usuário está logado
session_start();
if (!isset($_SESSION['usuario']['id'])) {
    http_response_code(401);
    echo json_encode(["erro" => "Usuário não autenticado"]);
    exit;
}

$id_usuario = $_SESSION['usuario']['id'];

// Pegar o ID do corpo da requisição
$input = file_get_contents("php://input");
parse_str($input, $data);
$id_para_excluir = $data['id'] ?? null;

if (!$id_para_excluir) {
    http_response_code(400);
    echo json_encode(["erro" => "ID é obrigatório"]);
    exit;
}

// Verificar se o usuário está tentando excluir sua própria conta
if ($id_para_excluir != $id_usuario) {
    http_response_code(403);
    echo json_encode(["erro" => "Você só pode excluir sua própria conta"]);
    exit;
}

try {
    $db = new Database();
    
    // 1. Excluir itens do carrinho
    $db->execute("DELETE FROM carrinho_items WHERE id_usuario = ?", [$id_usuario]);
    
    // 2. Excluir favoritos
    $db->execute("DELETE FROM favoritos WHERE id_usuario = ?", [$id_usuario]);
    
    // 3. Excluir endereços (usando id_cliente que referencia id_usuario)
    $db->execute("DELETE FROM enderecos WHERE id_cliente = ?", [$id_usuario]);
    
    // 4. Excluir pedidos e relacionados
    $pedidos = $db->execute("SELECT id_pedido FROM pedidos WHERE id_usuario = ?", [$id_usuario])->fetchAll();
    foreach ($pedidos as $pedido) {
        $db->execute("DELETE FROM pedido_itens WHERE id_pedido = ?", [$pedido['id_pedido']]);
        $db->execute("DELETE FROM pedido_status_historico WHERE id_pedido = ?", [$pedido['id_pedido']]);
    }
    $db->execute("DELETE FROM pedidos WHERE id_usuario = ?", [$id_usuario]);
    
    // 5. Excluir dados do cliente
    $db->execute("DELETE FROM clientes WHERE id_usuario = ?", [$id_usuario]);
    
    // 6. Excluir o usuário
    $resultado = $db->execute("DELETE FROM usuarios WHERE id = ?", [$id_usuario]);
    
    if ($resultado->rowCount() > 0) {
        session_destroy();
        echo json_encode(["mensagem" => "Conta excluída com sucesso"]);
    } else {
        echo json_encode(["erro" => "Não foi possível excluir a conta"]);
    }
    
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(["erro" => "Erro interno: " . $e->getMessage()]);
}
?> 