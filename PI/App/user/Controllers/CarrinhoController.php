<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
header('Content-Type: application/json');

require_once __DIR__ . '/../Models/Carrinho.php';

// Verificar se o usuário está logado
if (!isset($_SESSION['usuario']['id'])) {
    echo json_encode(['success' => false, 'message' => 'Usuário não logado. Faça login para adicionar produtos ao carrinho.']);
    exit();
}

$id_usuario = $_SESSION['usuario']['id'];
$action = $_POST['action'] ?? $_GET['action'] ?? '';

switch ($action) {
    case 'adicionar':
        $id_produto = (int)($_POST['id_produto'] ?? 0);
        $quantidade = (int)($_POST['quantidade'] ?? 1);
        
        if ($id_produto <= 0) {
            echo json_encode(['success' => false, 'message' => 'ID do produto inválido']);
            exit();
        }
        
        $resultado = Carrinho::adicionarProduto($id_usuario, $id_produto, $quantidade);
        if ($resultado === true || $resultado > 0 || (is_array($resultado) && isset($resultado['success']) && $resultado['success'])) {
            echo json_encode(['success' => true, 'message' => 'Produto adicionado ao carrinho']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Erro ao adicionar produto ao carrinho']);
        }
        break;
        
    case 'remover':
        $id_produto = (int)($_POST['id_produto'] ?? 0);
        
        if ($id_produto <= 0) {
            echo json_encode(['success' => false, 'message' => 'ID do produto inválido']);
            exit();
        }
        
        $resultado = Carrinho::removerProduto($id_usuario, $id_produto);
        if ($resultado === true || (is_array($resultado) && isset($resultado['success']) && $resultado['success'])) {
            echo json_encode(['success' => true, 'message' => 'Produto removido do carrinho']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Erro ao remover produto do carrinho']);
        }
        break;
        
    case 'atualizar_quantidade':
        $id_produto = (int)($_POST['id_produto'] ?? 0);
        $quantidade = (int)($_POST['quantidade'] ?? 0);
        
        if ($id_produto <= 0) {
            echo json_encode(['success' => false, 'message' => 'ID do produto inválido']);
            exit();
        }
        
        $resultado = Carrinho::atualizarQuantidade($id_usuario, $id_produto, $quantidade);
        if ($resultado === true || (is_array($resultado) && isset($resultado['success']) && $resultado['success'])) {
            echo json_encode(['success' => true, 'message' => 'Quantidade atualizada']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Erro ao atualizar quantidade']);
        }
        break;
        
    case 'obter_carrinho':
        $itens = Carrinho::obterCarrinho($id_usuario);
        $total = Carrinho::calcularTotal($id_usuario);
        $contagem = Carrinho::contarItens($id_usuario);
        
        echo json_encode([
            'success' => true,
            'itens' => $itens,
            'total' => $total,
            'contagem' => $contagem
        ]);
        break;
        
    case 'limpar':
        $resultado = Carrinho::limparCarrinho($id_usuario);
        if ($resultado === true || (is_array($resultado) && isset($resultado['success']) && $resultado['success'])) {
            echo json_encode(['success' => true, 'message' => 'Carrinho limpo']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Erro ao limpar carrinho']);
        }
        break;
        
    case 'contar_itens':
        $contagem = Carrinho::contarItens($id_usuario);
        echo json_encode(['success' => true, 'contagem' => $contagem]);
        break;
        
    default:
        echo json_encode(['success' => false, 'message' => 'Ação não reconhecida']);
        break;
}
?> 