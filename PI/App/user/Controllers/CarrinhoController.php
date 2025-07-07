<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
header('Content-Type: application/json');

require_once __DIR__ . '/../Models/Carrinho.php';

// Verificar se o usuário está logado
if (!isset($_SESSION['usuario']['id'])) {
    echo json_encode(['success' => false, 'message' => 'Usuário não logado']);
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
        echo json_encode(['success' => true, 'message' => 'Produto adicionado ao carrinho']);
        break;
        
    case 'remover':
        $id_produto = (int)($_POST['id_produto'] ?? 0);
        
        if ($id_produto <= 0) {
            echo json_encode(['success' => false, 'message' => 'ID do produto inválido']);
            exit();
        }
        
        $resultado = Carrinho::removerProduto($id_usuario, $id_produto);
        echo json_encode(['success' => true, 'message' => 'Produto removido do carrinho']);
        break;
        
    case 'atualizar_quantidade':
        $id_produto = (int)($_POST['id_produto'] ?? 0);
        $quantidade = (int)($_POST['quantidade'] ?? 0);
        
        if ($id_produto <= 0) {
            echo json_encode(['success' => false, 'message' => 'ID do produto inválido']);
            exit();
        }
        
        $resultado = Carrinho::atualizarQuantidade($id_usuario, $id_produto, $quantidade);
        echo json_encode(['success' => true, 'message' => 'Quantidade atualizada']);
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
        echo json_encode(['success' => true, 'message' => 'Carrinho limpo']);
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