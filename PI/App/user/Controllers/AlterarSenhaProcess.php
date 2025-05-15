<?php
require_once __DIR__ . '/../../DB/Database.php';

class AlterarSenhaController {

    public static function processarFormulario() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return;
        }
    
        $id_usuario = $_SESSION['usuario']['id'] ?? null;
        $senha_atual = $_POST['senha_atual'] ?? '';
        $nova_senha = $_POST['nova_senha'] ?? '';
        $confirmar_senha = $_POST['confirmar_senha'] ?? '';
    
        $mensagem = '';
    
        if (!$id_usuario) {
            $mensagem = "Usuário não autenticado.";
        } elseif (empty($senha_atual) || empty($nova_senha) || empty($confirmar_senha)) {
            $mensagem = "Preencha todos os campos.";
        } elseif ($nova_senha !== $confirmar_senha) {
            $mensagem = "Nova senha e confirmação não coincidem.";
        } else {
            $db = new \Database('usuarios');
            $resultado = $db->select("id = $id_usuario", null, null, 'senha');
            $dados = $resultado->fetch(\PDO::FETCH_ASSOC);
    
            if (!$dados || !password_verify($senha_atual, $dados['senha'])) {
                $mensagem = "Senha atual incorreta.";
            } else {
                $novaSenhaHash = password_hash($nova_senha, PASSWORD_DEFAULT);
                $sucesso = $db->update(['senha' => $novaSenhaHash], "id = $id_usuario");
    
                $mensagem = $sucesso ? "Senha alterada com sucesso!" : "Erro ao tentar alterar a senha.";
            }
        }
    
        // Redireciona com status via GET
        header("Location: alterar-senha.php?status=" . urlencode($mensagem));
        exit;
    }
    
}
