<?php

require_once __DIR__ . '/../Models/Usuario.php';

if (!session_start()) {
    header('Content-Type: application/json');
    echo json_encode(['sucesso' => false, 'mensagem' => 'Erro ao iniciar sessão']);
    exit;
}

// Verifica se o diretório de uploads existe, se não, cria
$diretorio_uploads = __DIR__ . '/../../../../public/uploads/';
if (!file_exists($diretorio_uploads)) {
    mkdir($diretorio_uploads, 0777, true);
}

// Verifica se é uma requisição de upload de foto
if (isset($_GET['acao']) && $_GET['acao'] === 'upload_foto') {
    if (!isset($_FILES['foto_perfil'])) {
        $_SESSION['erro'] = 'Nenhuma foto foi enviada.';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

    $arquivo = $_FILES['foto_perfil'];
    $extensao = strtolower(pathinfo($arquivo['name'], PATHINFO_EXTENSION));
    $extensoes_permitidas = ['jpg', 'jpeg', 'png', 'gif', 'jfif'];

    if (!in_array($extensao, $extensoes_permitidas)) {
        $_SESSION['erro'] = 'Tipo de arquivo não permitido.';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

    if ($arquivo['size'] > 5 * 1024 * 1024) { // 5MB
        $_SESSION['erro'] = 'Arquivo muito grande. Máximo: 5MB.';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

    $nome_arquivo = 'perfil_' . $_SESSION['usuario']['id'] . '_' . time() . '.' . $extensao;
    $caminho_destino = __DIR__ . '/../../../../public/uploads/' . $nome_arquivo;

    if (move_uploaded_file($arquivo['tmp_name'], $caminho_destino)) {
        $usuario = new Usuario();
        $usuario->id = $_SESSION['usuario']['id'];
        $usuario->foto_perfil = $nome_arquivo;
        
        if ($usuario->atualizarFoto()) {
            $_SESSION['usuario']['foto_perfil'] = $nome_arquivo;
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }
    }

    $_SESSION['erro'] = 'Erro ao fazer upload da foto.';
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}

// Verifica se é uma requisição de edição de perfil
if (isset($_GET['acao']) && $_GET['acao'] === 'editar') {
    $nome = trim($_POST['nome'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $telefone = trim($_POST['telefone'] ?? '');
    $cep = trim($_POST['cep'] ?? '');
    $rua = trim($_POST['rua'] ?? '');
    $bairro = trim($_POST['bairro'] ?? '');
    $cidade = trim($_POST['cidade'] ?? '');
    $estado = trim($_POST['estado'] ?? '');

    if (empty($nome) || empty($email)) {
        $_SESSION['erro'] = 'Nome e email são obrigatórios.';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

    $usuario = new Usuario();
    $usuario->id = $_SESSION['usuario']['id'];
    $usuario->nome = $nome;
    $usuario->email = $email;
    $usuario->telefone = $telefone;
    $usuario->cep = $cep;
    $usuario->rua = $rua;
    $usuario->bairro = $bairro;
    $usuario->cidade = $cidade;
    $usuario->estado = $estado;

    if ($usuario->atualizar()) {
        $_SESSION['usuario']['nome'] = $nome;
        $_SESSION['usuario']['email'] = $email;
        $_SESSION['usuario']['telefone'] = $telefone;
        $_SESSION['usuario']['cep'] = $cep;
        $_SESSION['usuario']['rua'] = $rua;
        $_SESSION['usuario']['bairro'] = $bairro;
        $_SESSION['usuario']['cidade'] = $cidade;
        $_SESSION['usuario']['estado'] = $estado;
        
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

    $_SESSION['erro'] = 'Erro ao atualizar perfil.';
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}

// Para requisições POST normais (cadastro)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json');
    $dados = json_decode(file_get_contents('php://input'), true);

    $nome = trim($dados['nome'] ?? '');
    $email = trim($dados['email'] ?? '');
    $cpf = trim($dados['cpf'] ?? '');
    $senha = $dados['senha'] ?? '';
    $confirmacao = $dados['confirmar_senha'] ?? '';

    if (empty($nome) || empty($cpf) || empty($email) || empty($senha) || empty($confirmacao)) {
        echo json_encode(['sucesso' => false, 'mensagem' => 'Preencha todos os campos']);
        exit;
    }
   
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['sucesso' => false, 'mensagem' => 'Email inválido']);
        exit;
    }
 
    if ($senha !== $confirmacao) {
        echo json_encode(['sucesso' => false, 'mensagem' => 'Senhas não conferem']);
        exit;
    }
 
    $usuario = new Usuario();
    $usuarioExistente = $usuario->buscarPorEmail($email);
    if ($usuarioExistente) {
        echo json_encode(['sucesso' => false, 'mensagem' => 'Email já cadastrado']);
        exit;
    }
   
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    $usuario->nome = $nome;
    $usuario->email = $email;
    $usuario->cpf = $cpf;
    $usuario->senha = $senhaHash;
    $usuario->tipo = 'cliente';

    $id = $usuario->inserir();

    if ($id) {
        echo json_encode(['sucesso' => true, 'mensagem' => 'Usuário cadastrado com sucesso!']);
    } else {
        echo json_encode(['sucesso' => false, 'mensagem' => 'Erro ao cadastrar.']);
    }
    exit;
}
