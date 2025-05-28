<?php
// endpoint para alterar a senha do usuario e possibilitar chamar o modal la na ResetarSenha
require_once '../../App/DB/Database.php';

switch($_SERVER['REQUEST_METHOD']){
    case 'POST':
        $db = new Database('usuarios');
        $token = $_POST['token'];
        $senha = $_POST['senha'];
        $confirmar_senha = $_POST['confirmar_senha'];


        $checkToken = $db->select("token_recuperacao = '$token'");
        if ($checkToken->rowCount() == 0) {
            echo json_encode(['status' => 0, 'msg' => 'Token inválido ou expirado']);
            exit;
        }


        // validar senha no javascript também depois.

        if ($senha != $confirmar_senha){
            echo json_encode(['status' => 0, 'msg' => 'Senha invalida']);
            exit;
        }

        $senha = password_hash($senha, PASSWORD_DEFAULT);

        $result = $db->update(
            ["senha" => $senha,
            "token_recuperacao" => null
        ],
            "token_recuperacao = '$token'" 
        );

        if ($result){
            echo json_encode(['status' => 200, 'msg' => "Senha alterada com sucesso"]);
            exit;
        }
        else {
            echo json_encode(['status' => 0, 'msg' => "Não foi possivel alterar a senha"]);
            exit;            
        }

        
}