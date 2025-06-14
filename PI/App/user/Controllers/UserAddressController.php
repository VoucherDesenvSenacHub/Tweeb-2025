<?php
require_once __DIR__ . '/../Models/Endereco.php';

session_start();
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['sucesso' => false, 'mensagem' => 'Método de requisição inválido. Use POST.']);
    exit;
}

$dados = json_decode(file_get_contents('php://input'), true);

error_log('UserAddressController - Dados recebidos do JSON: ' . print_r($dados, true));

if (!$dados) {
    echo json_encode(['sucesso' => false, 'mensagem' => 'Nenhum dado recebido ou formato JSON inválido.']);
    exit;
}

$idCliente = $_SESSION['usuario']['id'] ?? null;

if (!$idCliente) {
    echo json_encode(['sucesso' => false, 'mensagem' => 'Usuário não autenticado. Faça login para continuar.']);
    exit;
}

try {
    $endereco = new Endereco();

    $endereco->id_cliente = $idCliente;
    $endereco->nome_endereco = trim($dados['nome_endereco'] ?? 'Principal');
    $endereco->cep = trim($dados['cep'] ?? '');
    $endereco->rua = trim($dados['rua'] ?? '');
    $endereco->numero = trim($dados['numero'] ?? '');
    $endereco->bairro = trim($dados['bairro'] ?? '');
    $endereco->cidade = trim($dados['cidade'] ?? '');
    $endereco->estado = trim($dados['estado'] ?? '');

    if (!empty($dados['id_endereco'])) {
        // EDIÇÃO
        $endereco->id_endereco = (int) $dados['id_endereco'];
        $sucesso = $endereco->atualizar();

        if ($sucesso) {
            echo json_encode(['sucesso' => true, 'mensagem' => 'Endereço atualizado com sucesso!']);
        } else {
            echo json_encode(['sucesso' => false, 'mensagem' => 'Erro ao atualizar endereço.']);
        }
    } else {
        // NOVO CADASTRO
        $idNovoEndereco = $endereco->inserir();

        if ($idNovoEndereco) {
            echo json_encode(['sucesso' => true, 'mensagem' => 'Endereço cadastrado com sucesso!']);
        } else {
            echo json_encode(['sucesso' => false, 'mensagem' => 'Erro ao cadastrar endereço.']);
        }
    }

} catch (Exception $e) {
    error_log('Erro no UserAddressController: ' . $e->getMessage());
    echo json_encode(['sucesso' => false, 'mensagem' => 'Ocorreu um erro inesperado no servidor.']);
}

exit;
