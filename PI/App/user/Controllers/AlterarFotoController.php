<?php
require_once __DIR__ . '/../models/Usuario.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['foto'])) {
    $usuarioId = $_SESSION['usuario_id'] ?? null;

    if (!$usuarioId) {
        echo json_encode(['erro' => 'Usuário não autenticado']);
        exit;
    }

    $foto = $_FILES['foto'];

    $extensao = strtolower(pathinfo($foto['name'], PATHINFO_EXTENSION));
    $permit
}