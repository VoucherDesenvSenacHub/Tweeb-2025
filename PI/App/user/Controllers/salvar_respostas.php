<?php

require __DIR__.'/../../DB/Database.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    die("Usuário não está logado. Sessão não iniciada corretamente.");
}

$user_id = $_SESSION['user_id'];

$resposta1 = $_POST['resposta1'] ?? '';
$resposta2 = $_POST['resposta2'] ?? '';
$resposta3 = $_POST['resposta3'] ?? '';

if (empty($resposta1) || empty($resposta2) || empty($resposta3)) {
    die("Alguma resposta está vazia. Verifique os dados enviados.");
}

try {
    $db = new Database('respostas_preferencias'); 
    $db->insert([
        'user_id'    => $user_id,
        'resposta1'  => $resposta1,
        'resposta2'  => $resposta2,
        'resposta3'  => $resposta3
    ]);

    header("Location: /Tweeb-2025/PI/home.php");
    exit();

} catch (PDOException $e) {
    die("Erro ao salvar respostas: " . $e->getMessage());
}
