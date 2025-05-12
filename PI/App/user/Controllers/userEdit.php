<?php
session_start();
if (!isset($_SESSION['usuario']['id'])) {
    header('Location: /Tweeb-2025/PI/app/user/view/pages/login.php');
    exit();
}

require_once __DIR__ . '/../Models/Usuario.php';

$usuarioModel = new Usuario();
$id = $_SESSION['usuario']['id'];
$msg = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dados = [
        'nome'     => $_POST['primeiro-nome'] ?? '',
        'email'    => $_POST['email'] ?? '',
        'telefone' => $_POST['telefone'] ?? '',
        'endereco' => $_POST['endereco'] ?? '',
        'bairro'   => $_POST['bairro'] ?? '',
        'cep'      => $_POST['cep'] ?? '',
        'estado'   => $_POST['estado'] ?? '',
    ];

    if ($usuarioModel->atualizar($id, $dados)) {
        $_SESSION['usuario']['nome'] = $dados['nome'];
        $_SESSION['usuario']['email'] = $dados['email'];
        $msg = "Dados atualizados com sucesso!";
    } else {
        $msg = "Nada foi alterado.";
    }
}

$usuario = $usuarioModel->buscarPorId($id);
include __DIR__ . '/../view/user/perfil.php';
