<?php

require_once __DIR__ . '/../Models/Funcionario.php';

if (!session_start()) {
    header('Content-Type: application/json');
    echo json_encode(['sucesso' => false, 'mensagem' => 'Erro ao iniciar sessão']);
    exit;
}

// Upload de foto de perfil do funcionário
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
        $funcionario = new Funcionario();
        $funcionario->id = $_SESSION['usuario']['id'];
        $funcionario->avatar = $nome_arquivo;
        
        if ($funcionario->atualizarFoto()) {
            $_SESSION['usuario']['avatar'] = $nome_arquivo;
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }
    }

    $_SESSION['erro'] = 'Erro ao fazer upload da foto.';
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}

// Edição do perfil do funcionário
if (isset($_GET['acao']) && $_GET['acao'] === 'editar') {
    $nome = trim($_POST['nome'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $telefone = trim($_POST['telefone'] ?? '');
    $cep = trim($_POST['cep'] ?? '');
    $endereco = trim($_POST['endereco'] ?? '');
    $perfil = trim($_POST['perfil'] ?? '');

    if (empty($nome) || empty($email)) {
        $_SESSION['erro'] = 'Nome e email são obrigatórios.';
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

    $funcionario = new Funcionario();
    $funcionario->id = $_SESSION['usuario']['id'];
    $funcionario->nome = $nome;
    $funcionario->email = $email;
    $funcionario->telefone = $telefone;
    $funcionario->cep = $cep;
    $funcionario->endereco = $endereco;
    $funcionario->perfil = $perfil;

    if ($funcionario->atualizar()) {
        $_SESSION['funcionario']['nome'] = $nome;
        $_SESSION['funcionario']['email'] = $email;
        $_SESSION['funcionario']['telefone'] = $telefone;
        $_SESSION['funcionario']['cep'] = $cep;
        $_SESSION['funcionario']['endereco'] = $endereco;
        $_SESSION['funcionario']['perfil'] = $perfil;
        
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

    $_SESSION['erro'] = 'Erro ao atualizar perfil.';
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}

// Cadastro de funcionário via POST JSON
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
 
    $funcionario = new Funcionario();
    $funcionarioExistente = $funcionario->buscarPorEmail($email);
    if ($funcionarioExistente) {
        echo json_encode(['sucesso' => false, 'mensagem' => 'Email já cadastrado para funcionário']);
        exit;
    }
   
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    $funcionario->nome = $nome;
    $funcionario->email = $email;
    $funcionario->cpf = $cpf;
    $funcionario->senha = $senhaHash;
    $funcionario->tipo = 'funcionario';

    $id = $funcionario->inserir();

    if ($id) {
        echo json_encode(['sucesso' => true, 'mensagem' => 'Funcionário cadastrado com sucesso!']);
    } else {
        echo json_encode(['sucesso' => false, 'mensagem' => 'Erro ao cadastrar funcionário.']);
    }
    exit;
}
