<?php
require __DIR__. '/../../App/DB/Database.php';
require __DIR__. '/../../App/user/Models/Usuario.php';

parse_str(file_get_contents("php://input"), $_DELETE);
$id = $_DELETE["id"] ?? null;

if (!$id) {
    http_response_code(400);
    echo json_encode(["erro" => "ID é obrigatório."]);
    exit;  
}

$db = new Database();
$usuario = new  Usuario($db);

if($usuario->delete->excluir($id)) {
    echo json_encode(["mensagem" => "Usuário excluído com sucesso."]);
}else {
    http_response_code(500);
    echo json_encode(["erro" => "Erro ao excluir usuário"]);
}
?>