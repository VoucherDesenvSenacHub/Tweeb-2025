<?php
require_once __DIR__ . '/../../DB/Database.php';

class Favorito {
    public int $id_favorito;
    public int $id_usuario;
    public int $id_produto;
    public string $data_adicionado;

    public function __construct($dados = []) {
        if (!empty($dados)) {
            $this->id_favorito = $dados['id_favorito'] ?? 0;
            $this->id_usuario = $dados['id_usuario'] ?? 0;
            $this->id_produto = $dados['id_produto'] ?? 0;
            $this->data_adicionado = $dados['data_adicionado'] ?? '';
        }
    }

    /**
     * Adiciona um produto aos favoritos do usuário
     */
    public function adicionarFavorito($id_usuario, $id_produto) {
        $db = new Database('favoritos');
        
        try {
            $id = $db->insert([
                'id_usuario' => $id_usuario,
                'id_produto' => $id_produto
            ]);
            return $id ? true : false;
        } catch (Exception $e) {
            // Se já existe, retorna true (produto já está nos favoritos)
            if (strpos($e->getMessage(), 'Duplicate entry') !== false) {
                return true;
            }
            return false;
        }
    }

    /**
     * Remove um produto dos favoritos do usuário
     */
    public function removerFavorito($id_usuario, $id_produto) {
        $db = new Database('favoritos');
        return $db->delete("id_usuario = $id_usuario AND id_produto = $id_produto");
    }

    /**
     * Verifica se um produto está nos favoritos do usuário
     */
    public static function verificarFavorito($id_usuario, $id_produto) {
        $db = new Database('favoritos');
        $result = $db->select("id_usuario = $id_usuario AND id_produto = $id_produto");
        return $result->rowCount() > 0;
    }

    /**
     * Busca todos os favoritos de um usuário com dados do produto
     */
    public static function buscarFavoritosUsuario($id_usuario) {
        $db = new Database();
        $query = "
            SELECT f.id_favorito, f.id_produto, f.data_adicionado,
                   p.nome_produto, p.marca_modelo, p.preco_unid, 
                   p.imagem_produto, p.descricao_produto, p.quantidade_produto,
                   p.em_estoque, p.entrega_gratis, p.garantia
            FROM favoritos f
            INNER JOIN produtos p ON f.id_produto = p.id_produto
            WHERE f.id_usuario = ?
            ORDER BY f.data_adicionado DESC
        ";
        $stmt = $db->execute($query, [$id_usuario]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Conta quantos favoritos um usuário tem
     */
    public static function contarFavoritosUsuario($id_usuario) {
        $db = new Database('favoritos');
        return $db->count("id_usuario = $id_usuario");
    }

    /**
     * Remove todos os favoritos de um usuário
     */
    public static function removerTodosFavoritos($id_usuario) {
        $db = new Database('favoritos');
        return $db->delete("id_usuario = $id_usuario");
    }

    /**
     * Busca produtos favoritados com paginação
     */
    public static function buscarFavoritosPaginados($id_usuario, $limit = 12, $offset = 0) {
        $db = new Database();
        $query = "
            SELECT f.id_favorito, f.id_produto, f.data_adicionado,
                   p.nome_produto, p.marca_modelo, p.preco_unid, 
                   p.imagem_produto, p.descricao_produto, p.quantidade_produto,
                   p.em_estoque, p.entrega_gratis, p.garantia
            FROM favoritos f
            INNER JOIN produtos p ON f.id_produto = p.id_produto
            WHERE f.id_usuario = ?
            ORDER BY f.data_adicionado DESC
            LIMIT ? OFFSET ?
        ";
        $stmt = $db->execute($query, [$id_usuario, $limit, $offset]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?> 