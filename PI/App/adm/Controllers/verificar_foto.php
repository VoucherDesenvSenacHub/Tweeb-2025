<?php
require_once __DIR__ . '/../../DB/Database.php';

header('Content-Type: application/json');

// Verificar se a imagem padrão existe
$imagem_padrao_path = __DIR__ . '/../../../public/uploads/imagem_padrao.png';
$imagem_padrao_existe = file_exists($imagem_padrao_path);

// Buscar funcionários no banco
$db = new Database('usuarios');
$funcionarios = $db->select("tipo = 'funcionario'")->fetchAll(PDO::FETCH_ASSOC);

$resultado = [
    'imagem_padrao_existe' => $imagem_padrao_existe,
    'caminho_imagem_padrao' => $imagem_padrao_path,
    'funcionarios' => []
];

foreach ($funcionarios as $funcionario) {
    $foto_path = __DIR__ . '/../../../public/uploads/' . $funcionario['foto_perfil'];
    $foto_existe = file_exists($foto_path);
    
    $resultado['funcionarios'][] = [
        'id' => $funcionario['id'],
        'nome' => $funcionario['nome'],
        'email' => $funcionario['email'],
        'foto_perfil' => $funcionario['foto_perfil'],
        'foto_existe' => $foto_existe,
        'caminho_foto' => $foto_path
    ];
}

echo json_encode($resultado, JSON_PRETTY_PRINT);
?> 