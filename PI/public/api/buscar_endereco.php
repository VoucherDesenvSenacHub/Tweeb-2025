<?php
require __DIR__. '/../../App/user/Models/Endereco.php';
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

var_dump($_SESSION['usuario']['id']);

$usuario_id = $_SESSION['usuario']['id'];
$enderecoModel = new Endereco();

$dadosEndereco = $enderecoModel->buscarPorUsuario($usuario_id);

// Se for uma chamada API direta, retorna JSON
if (!defined('INCLUDE_PATH')) {
    header('Content-Type: application/json');
    echo json_encode($dadosEndereco);
    exit;
}
?>