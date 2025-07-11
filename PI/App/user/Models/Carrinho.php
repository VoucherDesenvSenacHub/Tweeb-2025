<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
if (!isset($_SESSION['usuario']['id'])) {
    header('Location: login.php');
    exit();
}

require_once __DIR__ . '/../../DB/Database.php';

class Carrinho {
    
    public static function adicionarProduto($id_usuario, $id_produto, $quantidade = 1) {
        try {
            $db = new Database('carrinho_items');
            
            // Verificar se o produto já existe no carrinho
            $stmt = $db->select("id_usuario = $id_usuario AND id_produto = $id_produto");
            $item_existente = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($item_existente) {
                // Atualizar quantidade
                $nova_quantidade = $item_existente['quantidade'] + $quantidade;
                return $db->update([
                    'quantidade' => $nova_quantidade
                ], "id_usuario = $id_usuario AND id_produto = $id_produto");
            } else {
                // Buscar informações do produto
                $produto_db = new Database('produtos');
                $stmt = $produto_db->select("id_produto = $id_produto");
                $produto = $stmt->fetch(PDO::FETCH_ASSOC);
                
                if (!$produto) {
                    return ['success' => false, 'message' => 'Produto não encontrado'];
                }
                
                // Adicionar novo item
                return $db->insert([
                    'id_usuario' => $id_usuario,
                    'id_produto' => $id_produto,
                    'quantidade' => $quantidade,
                    'preco_unitario' => $produto['preco_unid']
                ]);
            }
        } catch (Exception $e) {
            return ['success' => false, 'message' => 'Erro ao adicionar produto: ' . $e->getMessage()];
        }
    }
    
    public static function removerProduto($id_usuario, $id_produto) {
        try {
            $db = new Database('carrinho_items');
            return $db->delete("id_usuario = $id_usuario AND id_produto = $id_produto");
        } catch (Exception $e) {
            return ['success' => false, 'message' => 'Erro ao remover produto: ' . $e->getMessage()];
        }
    }
    
    public static function atualizarQuantidade($id_usuario, $id_produto, $quantidade) {
        try {
            if ($quantidade <= 0) {
                return self::removerProduto($id_usuario, $id_produto);
            }
            
            $db = new Database('carrinho_items');
            return $db->update([
                'quantidade' => $quantidade
            ], "id_usuario = $id_usuario AND id_produto = $id_produto");
        } catch (Exception $e) {
            return ['success' => false, 'message' => 'Erro ao atualizar quantidade: ' . $e->getMessage()];
        }
    }
    
    public static function obterCarrinho($id_usuario) {
        try {
            $db = new Database('carrinho_items');
            $sql = "SELECT ci.*, p.nome_produto, p.marca_modelo, p.imagem_produto, p.preco_unid, p.quantidade_produto as estoque_disponivel
                    FROM carrinho_items ci
                    INNER JOIN produtos p ON ci.id_produto = p.id_produto
                    WHERE ci.id_usuario = ?";
            
            $stmt = $db->execute($sql, [$id_usuario]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return [];
        }
    }
    
    public static function limparCarrinho($id_usuario) {
        try {
            $db = new Database('carrinho_items');
            return $db->delete("id_usuario = $id_usuario");
        } catch (Exception $e) {
            return ['success' => false, 'message' => 'Erro ao limpar carrinho: ' . $e->getMessage()];
        }
    }
    
    public static function calcularTotal($id_usuario) {
        try {
            $itens = self::obterCarrinho($id_usuario);
            $total = 0;
            
            foreach ($itens as $item) {
                $total += $item['preco_unitario'] * $item['quantidade'];
            }
            
            return $total;
        } catch (Exception $e) {
            return 0;
        }
    }
    
    // public static function contarItens($id_usuario) {
    //     try {
    //         $db = new Database('carrinho_items');
    //         return $db->count("id_usuario = $id_usuario");
    //     } catch (Exception $e) {
    //         return 0;
    //     }
    // }
}
?> 