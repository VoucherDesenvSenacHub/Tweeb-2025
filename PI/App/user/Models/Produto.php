<?php

require_once __DIR__ . '../../../DB/Database.php';

class Produto {

    // --- PROPRIEDADES ---
    public int $id_produto;
    public string $nome_produto;
    public string $marca_modelo;
    public int $quantidade_produto;
    public string $imagem_produto;
    public int $numero_serie;
    public float $custo_produto;
    public string $cor_produto;
    public float $preco_unid;
    public string $descricao_produto;
    public string $detalhes_produto;
    public int $id_departamento;
    public int $entrega_gratis;
    public int $em_estoque;
    public int $garantia;

    
    public static function searchByTerm(string $term): array {
        return (new Database())->searchProductsByTerm($term);
    }
    
    
    public function cadastrar(): bool {
        $db = new Database('produtos');
        
        
        $values = get_object_vars($this);
        
        $lastId = $db->insert($values);
        if ($lastId) {
            $this->id_produto = $lastId;
            return true;
        }
        return false;
    }

   
    public function atualizar(): bool {
        $values = get_object_vars($this);
        return (new Database())->updateProductById($this->id_produto, $values);
    }

    
    public static function buscar_by_id(int $id) {
        return (new Database())->findProductById($id);
    }

    
    public static function excluir(int $id_produto): bool {
        return (new Database())->deleteProductById($id_produto);
    }

    public static function searchAndCount(string $term): int {
        return (new Database())->countSearchResults($term);
    }

    public static function searchPaginated(string $term, int $limit, int $offset): array {
        return (new Database())->searchProductsPaginated($term, $limit, $offset);
    }
}