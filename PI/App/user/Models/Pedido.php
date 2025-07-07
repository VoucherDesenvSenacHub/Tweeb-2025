<?php

require_once __DIR__ . '/../../DB/Database.php';

class Pedido {
    
    public static function criarPedido($id_usuario, $id_endereco, $metodo_envio, $metodo_pagamento, $valor_frete = 0.00) {
        try {
            $db = new Database('pedidos');
            
            // Calcular valor total do carrinho
            $valor_total = Carrinho::calcularTotal($id_usuario) + $valor_frete;
            
            // Obter data de entrega estimada baseada no método de envio
            $data_entrega = self::calcularDataEntrega($metodo_envio);
            
            // Criar o pedido
            $id_pedido = $db->insert([
                'id_usuario' => $id_usuario,
                'id_endereco' => $id_endereco,
                'valor_total' => $valor_total,
                'valor_frete' => $valor_frete,
                'metodo_envio' => $metodo_envio,
                'data_entrega_estimada' => $data_entrega,
                'metodo_pagamento' => $metodo_pagamento,
                'status_pedido' => 'pendente',
                'status_pagamento' => 'pendente'
            ]);
            
            if ($id_pedido) {
                // Adicionar itens do carrinho ao pedido
                $itens_carrinho = Carrinho::obterCarrinho($id_usuario);
                foreach ($itens_carrinho as $item) {
                    self::adicionarItemPedido($id_pedido, $item);
                }
                
                // Limpar carrinho após criar pedido
                Carrinho::limparCarrinho($id_usuario);
                
                // Registrar histórico
                self::registrarHistorico($id_pedido, null, 'pendente', 'Pedido criado');
                
                return ['success' => true, 'id_pedido' => $id_pedido];
            }
            
            return ['success' => false, 'message' => 'Erro ao criar pedido'];
            
        } catch (Exception $e) {
            return ['success' => false, 'message' => 'Erro ao criar pedido: ' . $e->getMessage()];
        }
    }
    
    public static function adicionarItemPedido($id_pedido, $item_carrinho) {
        try {
            $db = new Database('pedido_itens');
            
            $subtotal = $item_carrinho['preco_unitario'] * $item_carrinho['quantidade'];
            
            return $db->insert([
                'id_pedido' => $id_pedido,
                'id_produto' => $item_carrinho['id_produto'],
                'quantidade' => $item_carrinho['quantidade'],
                'preco_unitario' => $item_carrinho['preco_unitario'],
                'subtotal' => $subtotal
            ]);
            
        } catch (Exception $e) {
            return false;
        }
    }
    
    public static function obterPedido($id_pedido) {
        try {
            $db = new Database('pedidos');
            $sql = "SELECT p.*, e.*, u.nome as nome_usuario, u.email as email_usuario
                    FROM pedidos p
                    INNER JOIN enderecos e ON p.id_endereco = e.id_endereco
                    INNER JOIN usuarios u ON p.id_usuario = u.id
                    WHERE p.id_pedido = ?";
            
            $stmt = $db->execute($sql, [$id_pedido]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
            
        } catch (Exception $e) {
            return null;
        }
    }
    
    public static function obterItensPedido($id_pedido) {
        try {
            $db = new Database('pedido_itens');
            $sql = "SELECT pi.*, p.nome_produto, p.marca_modelo, p.imagem_produto
                    FROM pedido_itens pi
                    INNER JOIN produtos p ON pi.id_produto = p.id_produto
                    WHERE pi.id_pedido = ?";
            
            $stmt = $db->execute($sql, [$id_pedido]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (Exception $e) {
            return [];
        }
    }
    
    public static function obterPedidosUsuario($id_usuario) {
        try {
            $db = new Database('pedidos');
            $sql = "SELECT p.*, e.nome_endereco, e.cidade, e.estado
                    FROM pedidos p
                    INNER JOIN enderecos e ON p.id_endereco = e.id_endereco
                    WHERE p.id_usuario = ?
                    ORDER BY p.data_pedido DESC";
            
            $stmt = $db->execute($sql, [$id_usuario]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (Exception $e) {
            return [];
        }
    }
    
    public static function atualizarStatusPedido($id_pedido, $novo_status, $observacao = '') {
        try {
            $db = new Database('pedidos');
            
            // Obter status atual
            $pedido = self::obterPedido($id_pedido);
            $status_anterior = $pedido['status_pedido'];
            
            // Atualizar status
            $resultado = $db->update([
                'status_pedido' => $novo_status
            ], "id_pedido = $id_pedido");
            
            if ($resultado) {
                // Registrar histórico
                self::registrarHistorico($id_pedido, $status_anterior, $novo_status, $observacao);
                return true;
            }
            
            return false;
            
        } catch (Exception $e) {
            return false;
        }
    }
    
    public static function atualizarStatusPagamento($id_pedido, $novo_status) {
        try {
            $db = new Database('pedidos');
            return $db->update([
                'status_pagamento' => $novo_status
            ], "id_pedido = $id_pedido");
            
        } catch (Exception $e) {
            return false;
        }
    }
    
    public static function registrarHistorico($id_pedido, $status_anterior, $status_novo, $observacao = '') {
        try {
            $db = new Database('pedido_status_historico');
            return $db->insert([
                'id_pedido' => $id_pedido,
                'status_anterior' => $status_anterior,
                'status_novo' => $status_novo,
                'observacao' => $observacao
            ]);
            
        } catch (Exception $e) {
            return false;
        }
    }
    
    public static function obterHistoricoPedido($id_pedido) {
        try {
            $db = new Database('pedido_status_historico');
            $sql = "SELECT * FROM pedido_status_historico 
                    WHERE id_pedido = ? 
                    ORDER BY data_mudanca DESC";
            
            $stmt = $db->execute($sql, [$id_pedido]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (Exception $e) {
            return [];
        }
    }
    
    public static function calcularDataEntrega($metodo_envio) {
        $hoje = new DateTime();
        
        switch ($metodo_envio) {
            case 'Envio Comum':
                $hoje->add(new DateInterval('P7D')); // 7 dias
                break;
            case 'Envio Expresso':
                $hoje->add(new DateInterval('P3D')); // 3 dias
                break;
            case 'Envio Agendado':
                $hoje->add(new DateInterval('P10D')); // 10 dias
                break;
            default:
                $hoje->add(new DateInterval('P7D')); // padrão 7 dias
        }
        
        return $hoje->format('Y-m-d');
    }
    
    public static function obterConfiguracoesFrete() {
        try {
            $db = new Database('config_frete');
            $sql = "SELECT * FROM config_frete WHERE ativo = 1 ORDER BY valor_frete ASC";
            $stmt = $db->execute($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (Exception $e) {
            return [];
        }
    }
    
    public static function cancelarPedido($id_pedido, $motivo = '') {
        try {
            $resultado = self::atualizarStatusPedido($id_pedido, 'cancelado', $motivo);
            
            if ($resultado) {
                // Aqui você pode implementar a lógica de reembolso se necessário
                return ['success' => true, 'message' => 'Pedido cancelado com sucesso'];
            }
            
            return ['success' => false, 'message' => 'Erro ao cancelar pedido'];
            
        } catch (Exception $e) {
            return ['success' => false, 'message' => 'Erro ao cancelar pedido: ' . $e->getMessage()];
        }
    }
    
    // Método para verificar se o usuário tem permissão para acessar o pedido
    public static function verificarPermissaoPedido($id_pedido, $id_usuario) {
        try {
            $db = new Database('pedidos');
            $sql = "SELECT COUNT(*) FROM pedidos WHERE id_pedido = ? AND id_usuario = ?";
            $stmt = $db->execute($sql, [$id_pedido, $id_usuario]);
            return $stmt->fetchColumn() > 0;
            
        } catch (Exception $e) {
            return false;
        }
    }
    
    // Método para obter estatísticas de pedidos do usuário
    public static function obterEstatisticasUsuario($id_usuario) {
        try {
            $db = new Database('pedidos');
            $sql = "SELECT 
                        COUNT(*) as total_pedidos,
                        SUM(CASE WHEN status_pedido = 'pendente' THEN 1 ELSE 0 END) as pedidos_pendentes,
                        SUM(CASE WHEN status_pedido = 'pago' THEN 1 ELSE 0 END) as pedidos_pagos,
                        SUM(CASE WHEN status_pedido = 'enviado' THEN 1 ELSE 0 END) as pedidos_enviados,
                        SUM(CASE WHEN status_pedido = 'entregue' THEN 1 ELSE 0 END) as pedidos_entregues,
                        SUM(valor_total) as valor_total_gasto
                    FROM pedidos 
                    WHERE id_usuario = ?";
            
            $stmt = $db->execute($sql, [$id_usuario]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
            
        } catch (Exception $e) {
            return [
                'total_pedidos' => 0,
                'pedidos_pendentes' => 0,
                'pedidos_pagos' => 0,
                'pedidos_enviados' => 0,
                'pedidos_entregues' => 0,
                'valor_total_gasto' => 0
            ];
        }
    }
}
?> 