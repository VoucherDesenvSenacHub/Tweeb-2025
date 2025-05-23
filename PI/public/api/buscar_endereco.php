<?php
require __DIR__. '/../../App/user/Models/Endereco.php';
require __DIR__. '/../../App/user/Models/Cep.php';
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

var_dump($_SESSION['usuario']['id']);

$usuario_id = $_SESSION['usuario']['id'];
$enderecoModel = new Endereco();
$cepModel = new Cep();

$endereco = $enderecoModel->buscarPorUsuario($usuario_id);

$dadosEndereco = [];

if ($endereco) {
    $cep = $cepModel->buscarPorUsuario($endereco['id']);
    $dadosEndereco = array_merge($endereco, $cep);
}
?>