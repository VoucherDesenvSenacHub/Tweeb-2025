<?php
// MetodoEnvioController.php
// Controller para gerenciar a lógica da página de seleção de método de envio.

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

// Inclui os modelos necessários
include_once __DIR__ . '/../Models/Carrinho.php';
include_once __DIR__ . '/../Models/Pedido.php';

class MetodoEnvioController {

    // O ID do usuário não é estritamente necessário no construtor se for passado para métodos estáticos,
    // mas mantive para consistência se outros métodos não estáticos forem adicionados.
    private $usuario_id; 

    public function __construct(int $usuario_id) {
        $this->usuario_id = $usuario_id;
    }

    /**
     * Prepara os dados necessários para a página de seleção de método de envio.
     * @param int $id_usuario O ID do usuário logado.
     * @return array Um array associativo com os dados (itens_carrinho, endereco_selecionado, configuracoes_frete, valor_subtotal).
     */
    public function prepararDadosPagina(int $id_usuario): array {
        try {
            $itens_carrinho = Carrinho::obterCarrinho($id_usuario);

            // Verifica se há itens no carrinho
            if (empty($itens_carrinho)) {
                // Redireciona para a página de produtos se o carrinho estiver vazio
                header('Location: /Tweeb-2025/PI/App/user/Controllers/ControllerProd/Departamento_Games.php');
                exit();
            }

            // Verificar se há endereço selecionado na sessão
            if (!isset($_SESSION['endereco_selecionado'])) {
                header('Location: escolha-endereco.php');
                exit();
            }

            $endereco_selecionado = $_SESSION['endereco_selecionado'];
            $configuracoes_frete = Pedido::obterConfiguracoesFrete();
            $valor_subtotal = Carrinho::calcularTotal($id_usuario);

            return [
                'itens_carrinho' => $itens_carrinho,
                'endereco_selecionado' => $endereco_selecionado,
                'configuracoes_frete' => $configuracoes_frete,
                'valor_subtotal' => $valor_subtotal
            ];
        } catch (Exception $e) {
            error_log("Erro em MetodoEnvioController::prepararDadosPagina: " . $e->getMessage());
            // Em caso de erro, você pode lançar uma exceção ou retornar um array de erro
            throw new Exception("Erro ao preparar dados da página de envio: " . $e->getMessage());
        }
    }

    /**
     * Salva o método de envio selecionado na sessão.
     * @param array $post_data Dados POST da requisição.
     * @return array Resultado da operação (success, message).
     */
    public function salvarEnvio(array $post_data): array {
        if (!isset($post_data['metodo'], $post_data['valor'])) {
            return ['success' => false, 'message' => 'Dados de envio incompletos.'];
        }

        $metodo = htmlspecialchars($post_data['metodo']);
        $valor = floatval($post_data['valor']);
        $data_agendada = isset($post_data['data_agendada']) ? htmlspecialchars($post_data['data_agendada']) : null;

        $_SESSION['dados_envio'] = [
            'metodo' => $metodo,
            'valor' => $valor,
            'data_agendada' => $data_agendada
        ];

        return ['success' => true, 'message' => 'Dados de envio salvos com sucesso.'];
    }
}

// Lógica para lidar com requisições AJAX (POST)
// Este bloco será executado apenas se a requisição for POST e tiver uma 'action' definida.
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    // O ID do usuário é necessário para algumas operações, mesmo que não seja usado diretamente no construtor
    $usuario_id_ajax = $_SESSION['usuario']['id'] ?? 0;
    $controller = new MetodoEnvioController($usuario_id_ajax); 

    $response = [];

    switch ($_POST['action']) {
        case 'salvar_envio':
            $response = $controller->salvarEnvio($_POST);
            break;
        default:
            $response = ['success' => false, 'message' => 'Ação inválida.'];
            break;
    }

    header('Content-Type: application/json');
    echo json_encode($response);
    exit(); // Termina a execução após enviar a resposta JSON
}
