<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header('Content-Type: application/json; charset=utf-8');

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

require_once __DIR__ . '/../Models/Endereco.php';
require_once __DIR__ . '/../../DB/Database.php';

// Verificar se o usuário está logado
if (!isset($_SESSION['usuario']['id'])) {
    echo json_encode(['success' => false, 'message' => 'Usuário não logado']);
    exit();
}

$id_usuario = $_SESSION['usuario']['id'];

// Buscar o ID do cliente baseado no ID do usuário
$db = Database::getInstance();
$stmt = $db->prepare("SELECT id_cliente FROM clientes WHERE id_usuario = ?");
$stmt->execute([$id_usuario]);
$id_cliente = $stmt->fetchColumn();

if (!$id_cliente) {
    echo json_encode(['success' => false, 'message' => 'Cliente não encontrado']);
    exit();
}

$action = $_POST['action'] ?? $_GET['action'] ?? '';

// Debug temporário
error_log("Action recebida: '$action'");
error_log("POST: " . print_r($_POST, true));

switch ($action) {
    case 'listar':
        $enderecos = Endereco::buscarPorClienteId($id_cliente);
        $enderecos_array = [];
        
        foreach ($enderecos as $endereco) {
            $enderecos_array[] = [
                'id_endereco' => $endereco->id_endereco,
                'nome_endereco' => $endereco->nome_endereco,
                'endereco_completo' => "{$endereco->rua}, {$endereco->numero}, {$endereco->bairro}, {$endereco->cidade} - {$endereco->estado}, {$endereco->cep}"
            ];
        }
        
        echo json_encode(['success' => true, 'enderecos' => $enderecos_array]);
        break;
        
    case 'adicionar':
        $dados = $_POST;
        $endereco = new Endereco([
            'id_cliente' => $id_cliente,
            'nome_endereco' => $dados['nome_endereco'] ?? '',
            'rua' => $dados['rua'] ?? '',
            'numero' => $dados['numero'] ?? '',
            'cep' => $dados['cep'] ?? '',
            'bairro' => $dados['bairro'] ?? '',
            'cidade' => $dados['cidade'] ?? '',
            'estado' => $dados['estado'] ?? ''
        ]);
        if (in_array('', [$endereco->rua, $endereco->numero, $endereco->cep, $endereco->bairro, $endereco->cidade, $endereco->estado])) {
            echo json_encode(['success' => false, 'message' => 'Todos os campos são obrigatórios']);
            exit();
        }
        $id = $endereco->inserir();
        echo json_encode(['success' => true, 'message' => 'Endereço adicionado', 'id_endereco' => $id]);
        break;
        
    case 'editar':
        $dados = $_POST;
        $id_endereco = (int)($dados['id_endereco'] ?? 0);
        $endereco = Endereco::buscarPorId($id_endereco);
        if (!$endereco || $endereco->id_cliente != $id_cliente) {
            echo json_encode(['success' => false, 'message' => 'Endereço não encontrado']);
            exit();
        }
        foreach (['nome_endereco', 'rua', 'numero', 'cep', 'bairro', 'cidade', 'estado'] as $campo) {
            if (isset($dados[$campo])) $endereco->$campo = $dados[$campo];
        }
        $endereco->atualizar();
        echo json_encode(['success' => true, 'message' => 'Endereço atualizado']);
        break;
        
    case 'excluir':
        $id_endereco = (int)($_POST['id_endereco'] ?? 0);
        
        if ($id_endereco <= 0) {
            echo json_encode(['success' => false, 'message' => 'ID do endereço inválido']);
            exit();
        }
        
        // Verificar se o endereço pertence ao usuário
        $endereco_existente = Endereco::buscarPorId($id_endereco);
        if (!$endereco_existente || $endereco_existente->id_cliente != $id_cliente) {
            echo json_encode(['success' => false, 'message' => 'Endereço não encontrado']);
            exit();
        }
        
        try {
            Endereco::excluir($id_endereco, $id_cliente);
            echo json_encode(['success' => true, 'message' => 'Endereço removido com sucesso']);
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => 'Erro ao remover endereço: ' . $e->getMessage()]);
        }
        break;
        
    case 'buscar_cep':
        $cep = preg_replace('/[^0-9]/', '', $_GET['cep'] ?? '');
        
        if (strlen($cep) !== 8) {
            echo json_encode(['success' => false, 'message' => 'CEP inválido']);
            exit();
        }
        
        // Buscar CEP na API do ViaCEP
        $url = "https://viacep.com.br/ws/{$cep}/json/";
        $response = file_get_contents($url);
        
        if ($response === false) {
            echo json_encode(['success' => false, 'message' => 'Erro ao consultar CEP']);
            exit();
        }
        
        $data = json_decode($response, true);
        
        if (isset($data['erro']) && $data['erro'] === true) {
            echo json_encode(['success' => false, 'message' => 'CEP não encontrado']);
            exit();
        }
        
        echo json_encode([
            'success' => true,
            'endereco' => [
                'cep' => $data['cep'],
                'rua' => $data['logradouro'],
                'bairro' => $data['bairro'],
                'cidade' => $data['localidade'],
                'estado' => $data['uf']
            ]
        ]);
        break;
        
    case 'selecionar':
        $id_endereco = (int)($_POST['id_endereco'] ?? 0);
        
        if ($id_endereco <= 0) {
            echo json_encode(['success' => false, 'message' => 'ID do endereço inválido']);
            exit();
        }
        
        // Verificar se o endereço pertence ao usuário
        $endereco_existente = Endereco::buscarPorId($id_endereco);
        if (!$endereco_existente || $endereco_existente->id_cliente != $id_cliente) {
            echo json_encode(['success' => false, 'message' => 'Endereço não encontrado']);
            exit();
        }
        
        // Salvar o endereço selecionado na sessão
        $_SESSION['endereco_selecionado'] = [
            'id_endereco' => $endereco_existente->id_endereco,
            'nome_endereco' => $endereco_existente->nome_endereco,
            'endereco_completo' => "{$endereco_existente->rua}, {$endereco_existente->numero}, {$endereco_existente->bairro}, {$endereco_existente->cidade} - {$endereco_existente->estado}, {$endereco_existente->cep}"
        ];
        
        echo json_encode(['success' => true, 'message' => 'Endereço selecionado com sucesso']);
        break;
        
    default:
        echo json_encode(['success' => false, 'message' => 'Ação não reconhecida']);
        break;
}
?>

