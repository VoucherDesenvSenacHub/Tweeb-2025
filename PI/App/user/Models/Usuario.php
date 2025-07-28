<?php
require_once __DIR__ . '../../../DB/Database.php';

class Usuario {
    public int $id;
    public string $nome;
    public ?string $sobrenome = null;
    public string $email;
    public string $senha;
    public string $cpf;
    public string $tipo;
    public ?string $telefone = null;
    public string $foto_perfil = 'imagem_padrao.png';

    public function __construct($dados = []) {
        if (!empty($dados)) {
            $this->id           = $dados['id'] ?? 0;
            $this->nome         = $dados['nome'] ?? '';
            $this->sobrenome    = $dados['sobrenome'] ?? null; // ✅ agora incluso corretamente
            $this->email        = $dados['email'] ?? '';
            $this->senha        = $dados['senha'] ?? '';
            $this->cpf          = $dados['cpf'] ?? '';
            $this->tipo         = $dados['tipo'] ?? 'cliente';
            $this->telefone     = $dados['telefone'] ?? null;
            $this->foto_perfil  = $dados['foto_perfil'] ?? 'imagem_padrao.png';
        }
    }

    public function inserir() {
        $db = new Database('usuarios');
        $idUsuario = $db->insert([
            'nome'         => $this->nome,
            'sobrenome'    => $this->sobrenome,
            'email'        => $this->email,
            'senha'        => $this->senha,
            'tipo'         => $this->tipo,
            'foto_perfil'  => $this->foto_perfil
        ]);

        if ($idUsuario) {
            $dbClientes = new Database('clientes');
            $dbClientes->insert([
                'id_usuario' => $idUsuario,
                'cpf'        => $this->cpf
            ]);
        }

        return $idUsuario;
    }

    public function atualizar() {
        $db = new Database('usuarios');
        return $db->update([
            'nome'         => $this->nome,
            'sobrenome'    => $this->sobrenome,
            'telefone'     => $this->telefone,
            'email'        => $this->email,
            'foto_perfil'  => $this->foto_perfil
        ], "id = {$this->id}");
    }

    public function atualizarFoto($novoNome) {
        $db = new Database('usuarios');
        return $db->update(['foto_perfil' => $novoNome], "id = {$this->id}");
    }

    public static function buscarTodos() {
        $db = new Database('usuarios');
        return $db->select()->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function buscarPorId($id) {
        $db = new Database('usuarios');
        return $db->select("id = $id")->fetchObject(self::class);
    }

    public static function buscarPorEmail($email) {
        $db2 = new Database(); 
        $dados = $db2->buscarUsuarioComCpfPorEmail($email);
        return $dados;
    }

    public static function buscarPorCpf($cpf) {
        $db2 = new Database(); 
        $dados = $db2->buscarUsuarioPorCpf($cpf);
        return $dados;
    }

    public function excluir($id) {
        try {
            $db = new Database();
            
            // Primeiro, verificar o tipo de usuário
            $usuario = $db->execute("SELECT tipo FROM usuarios WHERE id = ?", [$id])->fetch(PDO::FETCH_ASSOC);
            
            if (!$usuario) {
                return false; // Usuário não encontrado
            }
            
            $tipo = $usuario['tipo'];
            
            // Excluir dados relacionados primeiro (devido a foreign keys)
            
            // 1. Excluir itens do carrinho (apenas para clientes)
            if ($tipo === 'cliente') {
                $db->execute("DELETE FROM carrinho_items WHERE id_usuario = ?", [$id]);
                
                // 2. Excluir favoritos (apenas para clientes)
                $db->execute("DELETE FROM favoritos WHERE id_usuario = ?", [$id]);
                
                // 3. Excluir endereços (apenas para clientes)
                $db->execute("DELETE FROM enderecos WHERE id_usuario = ?", [$id]);
                
                // 4. Excluir histórico de pedidos
                $db->execute("DELETE FROM pedido_status_historico WHERE id_pedido IN (SELECT id_pedido FROM pedidos WHERE id_usuario = ?)", [$id]);
                
                // 5. Excluir itens de pedidos
                $db->execute("DELETE FROM pedido_itens WHERE id_pedido IN (SELECT id_pedido FROM pedidos WHERE id_usuario = ?)", [$id]);
                
                // 6. Excluir pedidos
                $db->execute("DELETE FROM pedidos WHERE id_usuario = ?", [$id]);
                
                // 7. Excluir dados do cliente
                $db->execute("DELETE FROM clientes WHERE id_usuario = ?", [$id]);
            }
            
            // Para administradores e funcionários
            if ($tipo === 'administrador') {
                $db->execute("DELETE FROM administrador WHERE id_usuario = ?", [$id]);
            } elseif ($tipo === 'funcionario') {
                $db->execute("DELETE FROM funcionarios WHERE id_usuario = ?", [$id]);
            }
            
            // 8. Finalmente, excluir o usuário
            $resultado = $db->execute("DELETE FROM usuarios WHERE id = ?", [$id]);
            
            return $resultado && $resultado->rowCount() > 0;
            
        } catch (Exception $e) {
            error_log("Erro ao excluir usuário: " . $e->getMessage());
            return false;
        }
    }

    public function atualizarSenha() {
        $db = new Database('usuarios');
        return $db->update(['senha' => $this->senha], "id = {$this->id}");
    }
    
    
}