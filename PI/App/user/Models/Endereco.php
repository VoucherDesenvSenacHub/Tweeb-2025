<?php

require_once __DIR__ . '/../../DB/Database.php';

class Endereco {
    public int $id_endereco;
    public int $id_cliente; 
    public ?string $nome_endereco = null;
    public string $rua;
    public string $numero;
    public string $cep;
    public string $bairro;
    public string $cidade;
    public string $estado;
    public ?string $created_at = null; 
    public ?string $updated_at = null; 

    public function __construct($dados = []) {
        if (!empty($dados)) {
            $this->id_endereco = $dados['id_endereco'] ?? 0;
            $this->id_cliente = $dados['id_cliente'] ?? 0;
            $this->nome_endereco = $dados['nome_endereco'] ?? null;
            $this->rua = $dados['rua'] ?? '';
            $this->numero = $dados['numero'] ?? '';
            $this->cep = $dados['cep'] ?? '';
            $this->bairro = $dados['bairro'] ?? '';
            $this->cidade = $dados['cidade'] ?? '';
            $this->estado = $dados['estado'] ?? '';
            $this->created_at = $dados['created_at'] ?? null;
            $this->updated_at = $dados['updated_at'] ?? null;
        }
    }

    
    public function inserir() {
        $db = new Database('enderecos');
        
        $this->id_endereco = $db->insert([
            'id_cliente'    => $this->id_cliente,
            'nome_endereco' => $this->nome_endereco,
            'rua'           => $this->rua,
            'numero'        => $this->numero,
            'cep'           => $this->cep,
            'bairro'        => $this->bairro,
            'cidade'        => $this->cidade,
            'estado'        => $this->estado
        ]);

        return $this->id_endereco;
    }

   
    public function atualizar() {
        $db = new Database('enderecos');
        return $db->update([
            'id_cliente'    => $this->id_cliente,
            'nome_endereco' => $this->nome_endereco,
            'rua'           => $this->rua,
            'numero'        => $this->numero,
            'cep'           => $this->cep,
            'bairro'        => $this->bairro,
            'cidade'        => $this->cidade,
            'estado'        => $this->estado
        ], "id_endereco = {$this->id_endereco}");
    }

    
    public static function buscarTodos() {
        $db = new Database('enderecos');
        return $db->select()->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    
    public static function buscarPorId($id) {
        $db = new Database('enderecos');
        return $db->select("id_endereco = $id")->fetchObject(self::class);
    }

    
    public static function buscarPorClienteId($id_cliente) {
        $db = new Database('enderecos');
        return $db->select("id_cliente = $id_cliente")->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    
    public static function excluir($id) {
        $db = new Database('enderecos');
        return $db->delete("id_endereco = $id");
    }
}
