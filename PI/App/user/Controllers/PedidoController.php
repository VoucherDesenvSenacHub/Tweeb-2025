<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

require_once __DIR__ . '/../Models/Pedido.php';
require_once __DIR__ . '/../Models/Carrinho.php';
require_once __DIR__ . '/../Models/Endereco.php';

header('Content-Type: application/json');

if (!isset($_SESSION['usuario']['id'])) {
    echo json_encode(['success' => false, 'message' => 'Usuário não autenticado']);
    exit();
}

$action = $_POST['action'] ?? $_GET['action'] ?? '';

switch ($action) {
    case 'salvar_envio':
        salvarDadosEnvio();
        break;
        
    case 'criar_pedido':
        criarPedido();
        break;
        
    case 'finalizar_compra':
        finalizarCompra();
        break;
        
    case 'obter_pedidos':
        obterPedidosUsuario();
        break;
        
    case 'obter_pedido':
        obterPedido();
        break;
        
    case 'cancelar_pedido':
        cancelarPedido();
        break;
        
    case 'atualizar_status':
        atualizarStatusPedido();
        break;
        
    default:
        echo json_encode(['success' => false, 'message' => 'Ação não reconhecida']);
        break;
}

function salvarDadosEnvio() {
    $metodo = $_POST['metodo'] ?? '';
    $valor = floatval($_POST['valor'] ?? 0);
    $data_agendada = $_POST['data_agendada'] ?? '';
    
    if (empty($metodo)) {
        echo json_encode(['success' => false, 'message' => 'Método de envio não informado']);
        return;
    }
    
    // Salvar dados na sessão
    $_SESSION['dados_envio'] = [
        'metodo' => $metodo,
        'valor' => $valor,
        'data_agendada' => $data_agendada
    ];
    
    echo json_encode(['success' => true, 'message' => 'Dados de envio salvos']);
}

function criarPedido() {
    $id_usuario = $_SESSION['usuario']['id'];
    
    // Verificar se há dados de envio
    if (!isset($_SESSION['dados_envio'])) {
        echo json_encode(['success' => false, 'message' => 'Dados de envio não encontrados']);
        return;
    }
    
    // Verificar se há endereço selecionado
    if (!isset($_SESSION['endereco_selecionado'])) {
        echo json_encode(['success' => false, 'message' => 'Endereço não selecionado']);
        return;
    }
    
    $dados_envio = $_SESSION['dados_envio'];
    $endereco = $_SESSION['endereco_selecionado'];
    
    // Verificar se há itens no carrinho
    $itens_carrinho = Carrinho::obterCarrinho($id_usuario);
    if (empty($itens_carrinho)) {
        echo json_encode(['success' => false, 'message' => 'Carrinho vazio']);
        return;
    }
    
    try {
        $resultado = Pedido::criarPedido(
            $id_usuario,
            $endereco['id_endereco'],
            $dados_envio['metodo'],
            'PIX', // Método de pagamento padrão
            $dados_envio['valor']
        );
        
        if ($resultado['success']) {
            // Salvar ID do pedido na sessão
            $_SESSION['pedido_atual'] = $resultado['id_pedido'];
            
            // Limpar dados temporários
            unset($_SESSION['dados_envio']);
            unset($_SESSION['endereco_selecionado']);
            
            echo json_encode([
                'success' => true, 
                'id_pedido' => $resultado['id_pedido'],
                'message' => 'Pedido criado com sucesso'
            ]);
        } else {
            echo json_encode($resultado);
        }
        
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => 'Erro ao criar pedido: ' . $e->getMessage()]);
    }
}

function finalizarCompra() {
    $id_pedido = $_SESSION['pedido_atual'] ?? null;
    
    if (!$id_pedido) {
        echo json_encode(['success' => false, 'message' => 'Pedido não encontrado']);
        return;
    }
    
    try {
        // Atualizar status do pagamento
        $resultado = Pedido::atualizarStatusPagamento($id_pedido, 'aprovado');
        
        if ($resultado) {
            // Atualizar status do pedido
            Pedido::atualizarStatusPedido($id_pedido, 'pago', 'Pagamento aprovado via PIX');
            
            // Limpar pedido atual da sessão
            unset($_SESSION['pedido_atual']);
            
            echo json_encode([
                'success' => true, 
                'message' => 'Compra finalizada com sucesso',
                'id_pedido' => $id_pedido
            ]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Erro ao finalizar compra']);
        }
        
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => 'Erro ao finalizar compra: ' . $e->getMessage()]);
    }
}

function obterPedidosUsuario() {
    $id_usuario = $_SESSION['usuario']['id'];
    
    try {
        $pedidos = Pedido::obterPedidosUsuario($id_usuario);
        echo json_encode(['success' => true, 'pedidos' => $pedidos]);
        
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => 'Erro ao obter pedidos: ' . $e->getMessage()]);
    }
}

function obterPedido() {
    $id_pedido = $_GET['id_pedido'] ?? null;
    
    if (!$id_pedido) {
        echo json_encode(['success' => false, 'message' => 'ID do pedido não informado']);
        return;
    }
    
    try {
        $pedido = Pedido::obterPedido($id_pedido);
        $itens = Pedido::obterItensPedido($id_pedido);
        $historico = Pedido::obterHistoricoPedido($id_pedido);
        
        if ($pedido) {
            echo json_encode([
                'success' => true, 
                'pedido' => $pedido,
                'itens' => $itens,
                'historico' => $historico
            ]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Pedido não encontrado']);
        }
        
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => 'Erro ao obter pedido: ' . $e->getMessage()]);
    }
}

function cancelarPedido() {
    $id_pedido = $_POST['id_pedido'] ?? null;
    $motivo = $_POST['motivo'] ?? '';
    
    if (!$id_pedido) {
        echo json_encode(['success' => false, 'message' => 'ID do pedido não informado']);
        return;
    }
    
    try {
        $resultado = Pedido::cancelarPedido($id_pedido, $motivo);
        echo json_encode($resultado);
        
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => 'Erro ao cancelar pedido: ' . $e->getMessage()]);
    }
}

function atualizarStatusPedido() {
    $id_pedido = $_POST['id_pedido'] ?? null;
    $novo_status = $_POST['status'] ?? '';
    $observacao = $_POST['observacao'] ?? '';
    
    if (!$id_pedido || !$novo_status) {
        echo json_encode(['success' => false, 'message' => 'Dados incompletos']);
        return;
    }
    
    try {
        $resultado = Pedido::atualizarStatusPedido($id_pedido, $novo_status, $observacao);
        
        if ($resultado) {
            echo json_encode(['success' => true, 'message' => 'Status atualizado com sucesso']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Erro ao atualizar status']);
        }
        
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => 'Erro ao atualizar status: ' . $e->getMessage()]);
    }
}
?> 