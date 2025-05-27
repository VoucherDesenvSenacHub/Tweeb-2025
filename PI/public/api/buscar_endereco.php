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

$enderecos = $enderecoModel->buscarPorUsuario($usuario_id);

$dadosEnderecosComCep = [];

if ($enderecos) {
    foreach ($enderecos as $endereco) {
        $cep = $cepModel->buscarPorEndereco($endereco['id_endereco']);
        if ($cep === false || $cep === null) {
            $cep = [];
        }
        $dadosEnderecosComCep[] = array_merge($endereco, $cep);
    }
}

?>
