<?php
session_start();

require __DIR__ . '/../Models/Usuario.php';
require __DIR__ . '/../Models/Endereco.php';
require __DIR__ . '/../Models/Cep.php';

if (!isset($_SESSION['usuario']['id'])) {
    header('Location: /Tweeb-2025/PI/app/user/view/pages/login.php');
    exit();
}

$usuarioID = $_SESSION['usuario']['id'];

$usuarioModel = new Usuario();
$enderecoModel = new Endereco();
$cepModel = new Cep();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Atualizar dados do usuário
    $dadosUsuario = [
        'nome' => $_POST['nome'] ?? '',
        'sobrenome' => $_POST['sobrenome'] ?? '',
        'email' => $_POST['email'] ?? '',
        'telefone' => $_POST['telefone'] ?? ''
    ];
    $okUsuario = $usuarioModel->atualizar($usuarioID, $dadosUsuario);

    // Inserir novo endereço
    $dadosEndereco = [
        'id_cliente' => $usuarioID,
        'nome_endereco' => 'endereço principal',
        'rua' => $_POST['rua'] ?? '',
        'bairro' => $_POST['bairro'] ?? '',
        'cidade' => $_POST['cidade'] ?? '',
        'estado' => $_POST['estado'] ?? ''
    ];
    $novoEnderecoID = $enderecoModel->inserirParaUsuario($usuarioID, $dadosEndereco);
    $okEndereco = $novoEnderecoID > 0;
    
    // Inserir CEP se fornecido
    $okCep = false;
    $cepCodigo = $_POST['cep'] ?? '';
    if (!empty($cepCodigo) && $okEndereco) {
    $dadosCep = [
        'codigo' => $cepCodigo,
        'endereco_id' => $novoEnderecoID  
    ];
        $okCep = $cepModel->inserirParaUsuario($novoEnderecoID, $dadosCep);
    }


    // Atualizar sessão
    $_SESSION['usuario']['nome'] = $dadosUsuario['nome'];
    $_SESSION['usuario']['sobrenome'] = $dadosUsuario['sobrenome'];
    $_SESSION['usuario']['email'] = $dadosUsuario['email'];
    $_SESSION['usuario']['telefone'] = $dadosUsuario['telefone'];
    $_SESSION['usuario']['cep'] = $cepCodigo;
    $_SESSION['usuario']['rua'] = $dadosEndereco['rua'];
    $_SESSION['usuario']['bairro'] = $dadosEndereco['bairro'];
    $_SESSION['usuario']['cidade'] = $dadosEndereco['cidade'];
    $_SESSION['usuario']['estado'] = $dadosEndereco['estado'];

    if ($okUsuario || $okEndereco || $okCep) {
        $_SESSION['mensagem_sucesso'] = "Dados atualizados com sucesso!";
    } else {
        $_SESSION['mensagem_erro'] = "Nenhuma alteração foi feita.";
    }

    header('Location: /Tweeb-2025/PI/app/user/view/pages/perfil-usuario.php');
    exit();
}
