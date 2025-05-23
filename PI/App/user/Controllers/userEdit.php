<?php
session_start();
require __DIR__.'/../Models/Usuario.php';
require __DIR__.'/../Models/Endereco.php';
require __DIR__.'/../Models/Cep.php';

if (!isset($_SESSION['usuario']['id'])) {
    header('Location: /Tweeb-2025/PI/app/user/view/pages/login.php');
    exit();
}

$usuarioModel = new Usuario();
$cepModel = new Cep();
$enderecoModel = new Endereco();

$id = $_SESSION['usuario']['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dadosUsuario = [
        'nome' => $_POST['nome'] ?? '',
        'sobrenome' => $_POST['sobrenome'] ?? '',
        'email' => $_POST['email'] ?? '',
        'telefone' => $_POST['telefone'] ?? ''
    ];
    

    $dadosEndereco = [
        'nome_endereco' => 'teste',
        'rua' => $_POST['rua'] ?? '',
        'bairro' => $_POST['bairro'] ?? '',
        'cidade' => $_POST['cidade'] ?? '',
        'estado' => $_POST['estado'] ?? ''
    ];

    $dadosCep = [
        'codigo' => $_POST['cep'] ?? ''
    ];

    $okUsuario = $usuarioModel->atualizar($id, $dadosUsuario);

    $existeEndereco = $enderecoModel->buscarPorUsuario($id);
    if ($existeEndereco) {
        $okEndereco = $enderecoModel->atualizarPorUsuario($id, $dadosEndereco);
    } else {
        $okEndereco = $enderecoModel->inserirParaUsuario($id, $dadosEndereco);
    }

    $existeCep = $cepModel->buscarPorUsuario($id);
    if ($existeCep) {
        $okCep = $cepModel->atualizarPorUsuario($id, $dadosCep);
    } else {
        $okCep = $cepModel->inserirParaUsuario($id, $dadosCep);
    }


    $_SESSION['usuario']['nome'] = $dadosUsuario['nome'];
    $_SESSION['usuario']['email'] = $dadosUsuario['email'];
    $_SESSION['usuario']['telefone'] = $dadosUsuario['telefone'];
    $_SESSION['usuario']['sobrenome'] = $dadosUsuario['sobrenome'];
    $_SESSION['usuario']['cep'] = $dadosCep['codigo'];
    $_SESSION['usuario']['rua'] = $dadosEndereco['rua'];
    $_SESSION['usuario']['cidade'] = $dadosEndereco['cidade'];
    $_SESSION['usuario']['bairro'] = $dadosEndereco['bairro'];
    $_SESSION['usuario']['estado'] = $dadosEndereco['estado'];

    

    if ($okUsuario || $okEndereco || $okCep) {
        $msg = "Dados atualizados com sucesso!";
        header('Location: /Tweeb-2025/PI/app/user/view/pages/perfil-usuario.php');
    } else {
        $msg = "Nada foi alterado.";
    }
}


                                                                                                