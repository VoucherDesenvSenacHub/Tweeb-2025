<?php
require_once __DIR__ . '/../../DB/Database.php';

class AlterarSenhaController {

    public static function processarFormulario() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return '';
        }

        $id_usuario = $_SESSION['usuario']['id'] ?? null;
        $senha_atual = $_POST['senha_atual'] ?? '';
        $nova_senha = $_POST['nova_senha'] ?? '';
        $confirmar_senha = $_POST['confirmar_senha'] ?? '';

        if (!$id_usuario) {
            return "Usuário não autenticado.";
        }

        if (empty($senha_atual) || empty($nova_senha) || empty($confirmar_senha)) {
            return "Preencha todos os campos.";
        }

        if ($nova_senha !== $confirmar_senha) {
            return "Nova senha e confirmação não coincidem.";
        }

        $db = new Database('usuarios');
        $resultado = $db->select("id = $id_usuario", null, null, 'senha');
        $dados = $resultado->fetch(PDO::FETCH_ASSOC);

        if (!$dados || !password_verify($senha_atual, $dados['senha'])) {
            return "Senha atual incorreta.";
        }

        $novaSenhaHash = password_hash($nova_senha, PASSWORD_DEFAULT);
        $sucesso = $db->update(['senha' => $novaSenhaHash], "id = $id_usuario");

        $mensagem = $sucesso ? "Senha alterada com sucesso!" : "Erro ao tentar alterar a senha.";
        header("Location: ../../views/usuario/alterar-senha.php?status=" . urlencode($mensagem));
        exit;
    }
}
