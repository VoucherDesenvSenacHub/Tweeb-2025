<?php
// PagamentoPixController.php
// Controller para gerenciar a lógica da página de pagamento PIX.

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

// Inclui os modelos necessários
include_once __DIR__ . '/../Models/Carrinho.php';
include_once __DIR__ . '/../Models/Pedido.php';

class PagamentoPixController {

    private $usuario_id;

    public function __construct(int $usuario_id) {
        $this->usuario_id = $usuario_id;
    }

    /**
     * Prepara os dados necessários para a página de pagamento PIX.
     * @return array Um array associativo com os dados (itens_carrinho, dados_envio, endereco_selecionado, valor_subtotal, valor_frete, valor_total, numero_pedido).
     */
    public function prepararDadosPagina(): array {
        // Verificar se há dados de envio na sessão
        if (!isset($_SESSION['dados_envio'])) {
            header('Location: metodo-envio.php'); // Redireciona se não houver dados de envio
            exit();
        }

        $itens_carrinho = Carrinho::obterCarrinho($this->usuario_id);

        // Verifica se há itens no carrinho
        if (empty($itens_carrinho)) {
            header('Location: /Tweeb-2025/PI/App/user/Controllers/ControllerProd/Departamento_Games.php');
            exit();
        }

        $dados_envio = $_SESSION['dados_envio'];
        $endereco_selecionado = $_SESSION['endereco_selecionado'] ?? null;

        $valor_subtotal = Carrinho::calcularTotal($this->usuario_id);
        $valor_frete = $dados_envio['valor'];
        $valor_total = $valor_subtotal + $valor_frete;

        // Gerar número do pedido (pode ser mais robusto em um sistema real)
        // Este número é gerado apenas para exibição, o ID real do pedido vem do banco
        $numero_pedido = 'PED' . date('Ymd') . rand(1000, 9999);
        // Não zera $_SESSION['current_pedido_id'] aqui, pois ele será definido após a criação bem-sucedida do pedido.

        return [
            'itens_carrinho' => $itens_carrinho,
            'dados_envio' => $dados_envio,
            'endereco_selecionado' => $endereco_selecionado,
            'valor_subtotal' => $valor_subtotal,
            'valor_frete' => $valor_frete,
            'valor_total' => $valor_total,
            'numero_pedido' => $numero_pedido
        ];
    }

    /**
     * Cria um novo pedido no banco de dados e salva o ID na sessão.
     * @return array Resultado da operação (success, message, id_pedido).
     */
    public function criarPedido(): array {
        if (!isset($_SESSION['usuario']['id'], $_SESSION['endereco_selecionado'], $_SESSION['dados_envio'])) {
            return ['success' => false, 'message' => 'Dados de sessão incompletos para criar o pedido.'];
        }

        $id_usuario = $_SESSION['usuario']['id'];
        $endereco_id = $_SESSION['endereco_selecionado']['id_endereco'] ?? null; 
        $dados_envio = $_SESSION['dados_envio'];
        
        if ($endereco_id === null) {
             return ['success' => false, 'message' => 'ID do endereço não encontrado na sessão.'];
        }

        $itens_carrinho = Carrinho::obterCarrinho($id_usuario);

        if (empty($itens_carrinho)) {
            return ['success' => false, 'message' => 'Carrinho vazio. Não é possível criar um pedido.'];
        }

        $valor_subtotal = Carrinho::calcularTotal($id_usuario);
        $valor_frete = $dados_envio['valor'];
        $valor_total = $valor_subtotal + $valor_frete;

        try {
            // Chama o método criarPedido do Modelo Pedido
            $result = Pedido::criarPedido(
                $id_usuario,
                $endereco_id,
                $dados_envio['metodo'],
                'PIX', // Método de pagamento fixo para esta página
                $valor_frete,
                $dados_envio['data_agendada'] ?? null // Passa a data agendada para o modelo
            );

            if ($result['success']) {
                $_SESSION['current_pedido_id'] = $result['id_pedido']; // Salva o ID do pedido na sessão
                return ['success' => true, 'message' => 'Pedido criado com sucesso!', 'id_pedido' => $result['id_pedido']];
            } else {
                return ['success' => false, 'message' => $result['message']];
            }
        } catch (Exception $e) {
            error_log("Erro em PagamentoPixController::criarPedido: " . $e->getMessage());
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    /**
     * Finaliza a compra, atualizando o status do pedido para 'pago' e 'preparando'.
     * Este método é chamado APÓS o pagamento ter sido "simulado" como aprovado no frontend.
     * @return array Resultado da operação (success, message, id_pedido).
     */
    public function finalizarCompra(): array {
        if (!isset($_SESSION['current_pedido_id'])) {
            return ['success' => false, 'message' => 'Nenhum pedido para finalizar.'];
        }

        $id_pedido = $_SESSION['current_pedido_id'];

        try {
            // Atualiza o status de pagamento do pedido para 'aprovado'
            $updated_pagamento = Pedido::atualizarStatusPagamento($id_pedido, 'aprovado');
            if (!$updated_pagamento) {
                throw new Exception("Falha ao atualizar status de pagamento.");
            }

            // Atualiza o status do pedido para 'pago' e registra no histórico
            $updated_pedido_pago = Pedido::atualizarStatusPedido($id_pedido, 'pago', 'Pagamento PIX aprovado automaticamente.');
            if (!$updated_pedido_pago) {
                throw new Exception("Falha ao atualizar status do pedido para pago.");
            }
            
            // Atualiza o status do pedido para 'preparando'
            $updated_preparando = Pedido::atualizarStatusPedido($id_pedido, 'preparando', 'Pedido em preparação.');
            if (!$updated_preparando) {
                throw new Exception("Falha ao atualizar status do pedido para preparando.");
            }

            // Limpa os dados de sessão relacionados ao pedido e envio
            unset($_SESSION['dados_envio']);
            unset($_SESSION['endereco_selecionado']);
            unset($_SESSION['current_pedido_id']);

            return ['success' => true, 'message' => 'Compra finalizada com sucesso!', 'id_pedido' => $id_pedido];
        } catch (Exception $e) {
            error_log("Erro em PagamentoPixController::finalizarCompra: " . $e->getMessage());
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    /**
     * Cancela um pedido, atualizando seu status.
     * @return array Resultado da operação (success, message).
     */
    public function cancelarPedido(): array {
        if (!isset($_SESSION['current_pedido_id'])) {
            return ['success' => false, 'message' => 'Nenhum pedido para cancelar.'];
        }

        $id_pedido = $_SESSION['current_pedido_id'];

        try {
            $result = Pedido::cancelarPedido($id_pedido, 'Cancelado pelo usuário na tela de pagamento.');
            if ($result['success']) {
                // Limpa os dados de sessão relacionados ao pedido e envio
                unset($_SESSION['dados_envio']);
                unset($_SESSION['endereco_selecionado']);
                unset($_SESSION['current_pedido_id']); 
                return ['success' => true, 'message' => 'Pedido cancelado com sucesso.'];
            } else {
                return ['success' => false, 'message' => $result['message']];
            }
        } catch (Exception $e) {
            error_log("Erro em PagamentoPixController::cancelarPedido: " . $e->getMessage());
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }
}

// Lógica para lidar com requisições AJAX (POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $usuario_id_ajax = $_SESSION['usuario']['id'] ?? 0;
    $controller = new PagamentoPixController($usuario_id_ajax);

    $response = [];

    switch ($_POST['action']) {
        case 'criar_pedido':
            $response = $controller->criarPedido();
            break;
        // As ações de confirmação manual/automática foram removidas daqui,
        // pois a lógica de status 'pago' e 'preparando' agora está na finalizarCompra.
        case 'finalizar_compra':
            $response = $controller->finalizarCompra();
            break;
        case 'cancelar_pedido':
            $response = $controller->cancelarPedido();
            break;
        default:
            $response = ['success' => false, 'message' => 'Ação inválida.'];
            break;
    }

    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}
