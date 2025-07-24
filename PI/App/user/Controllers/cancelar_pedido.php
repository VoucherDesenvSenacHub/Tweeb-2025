<?php
// App/user/Controllers/cancelar_pedido.php
// Este arquivo é o endpoint AJAX para processar o cancelamento de pedidos.

// Ativar exibição de erros para depuração (REMOVER EM PRODUÇÃO)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Iniciar buffering de saída para evitar que algo seja enviado antes do JSON
ob_start();

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *'); // Cuidado em produção: restrinja isso a domínios específicos
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

// Inclui a classe Database
// Corrigido: De App/user/Controllers/ para PI/app/DB/
include __DIR__ . '/../../../app/DB/Database.php'; // <--- CAMINHO CORRIGIDO NOVAMENTE AQUI!

// LOG DE DEPURAÇÃO PARA CANCELAMENTO (manter para depurar o POST)
file_put_contents(__DIR__ . '/log_cancelamento.txt', date('Y-m-d H:i:s') . "\n" . print_r($_POST, true) . "\n\n", FILE_APPEND);

session_start();
$usuario_id = $_SESSION['usuario']['id'] ?? 0;
$id_pedido = $_POST['id_pedido'] ?? null;

// Limpa qualquer saída que tenha sido armazenada no buffer antes de tentar enviar JSON
ob_clean();

if (!$usuario_id || !$id_pedido) {
    echo json_encode(['success' => false, 'message' => 'Dados insuficientes.']);
    exit;
}

try {
    $db = new Database();

    // 1. Verifica se o pedido existe e pertence ao usuário, e pega o status atual
    $stmt = $db->execute("SELECT id_pedido, status_pedido FROM pedidos WHERE id_pedido = ? AND id_usuario = ?", [$id_pedido, $usuario_id]);
    $pedido = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$pedido) {
        echo json_encode(['success' => false, 'message' => 'Pedido não encontrado ou não pertence ao usuário.']);
        exit;
    }

    // 2. Validações de cancelamento
    if (strtolower(trim($pedido['status_pedido'])) === 'cancelado') {
        echo json_encode(['success' => false, 'message' => 'Pedido já foi cancelado.']);
        exit;
    }

    if (strtolower(trim($pedido['status_pedido'])) === 'entregue') {
        echo json_encode(['success' => false, 'message' => 'Não é possível cancelar um pedido já entregue.']);
        exit;
    }

    // Inicia transação para garantir atomicidade
    $db->conn->beginTransaction();

    // 3. Atualiza status do pedido
    $db->execute("UPDATE pedidos SET status_pedido = 'cancelado' WHERE id_pedido = ? AND id_usuario = ?", [$id_pedido, $usuario_id]);

    // 4. Insere no histórico (agora com status_anterior)
    $status_anterior_log = $pedido['status_pedido']; // Pega o status antes da atualização
    $db->execute("INSERT INTO pedido_status_historico (id_pedido, status_anterior, status_novo, data_mudanca) VALUES (?, ?, 'cancelado', NOW())", [$id_pedido, $status_anterior_log]);

    $db->conn->commit(); // Confirma a transação

    echo json_encode(['success' => true, 'message' => 'Pedido cancelado com sucesso.']);
} catch (Exception $e) {
    if ($db->conn && $db->conn->inTransaction()) {
        $db->conn->rollBack(); // Reverte em caso de erro
    }
    error_log("Erro ao cancelar pedido: " . $e->getMessage());
    echo json_encode(['success' => false, 'message' => 'Erro interno ao cancelar pedido: ' . $e->getMessage()]); // Inclui a mensagem de erro para depuração
}
exit;
?>