<?php
// PedidoController.php
// Este arquivo contém a lógica para buscar e preparar os dados dos pedidos.

// Garante que este arquivo não seja acessado diretamente.
if (basename($_SERVER['PHP_SELF']) == 'PedidoController.php') {
    die('Acesso direto negado.');
}


include __DIR__ . '/../../DB/Database.php'; 

/**
 * Classe PedidoController
 * Responsável por gerenciar a recuperação de dados de pedidos.
 */
class PedidoController {
    private $database;
    private $usuario_id;

    /**
     * Construtor da classe PedidoController.
     * @param int $usuario_id O ID do usuário logado.
     */
    public function __construct(int $usuario_id) {
        $this->database = new Database(); // Instancia a sua classe Database
        $this->usuario_id = $usuario_id;
    }

    /**
     * Busca todos os pedidos de um usuário, incluindo itens e histórico de status.
     * @return array Um array de pedidos, cada um contendo seus itens e histórico de status.
     */
    public function getPedidosDoUsuario(): array {
        $pedidos = [];

        try {
            // 1. Buscar todos os pedidos do usuário logado
            // Realiza um JOIN com a tabela 'enderecos' para obter os detalhes do endereço de entrega
            $query_pedidos = "
                SELECT 
                    p.id_pedido, 
                    p.data_pedido, 
                    p.data_entrega_estimada, 
                    p.status_pedido,
                    p.metodo_pagamento,
                    p.valor_total,
                    p.valor_frete,
                    e.rua,
                    e.numero,
                    e.bairro,
                    e.cidade,
                    e.estado,
                    e.cep
                FROM 
                    pedidos p
                JOIN 
                    enderecos e ON p.id_endereco = e.id_endereco
                WHERE 
                    p.id_usuario = ?
                ORDER BY 
                    p.data_pedido DESC
            ";
            // Usa o método execute da sua classe Database
            $stmt_pedidos = $this->database->execute($query_pedidos, [$this->usuario_id]);
            $pedidos_db = $stmt_pedidos->fetchAll(PDO::FETCH_ASSOC);

            // Itera sobre cada pedido encontrado para buscar seus itens e histórico de status
            foreach ($pedidos_db as $pedido) {
                $pedido_id = $pedido['id_pedido'];

                // 2. Buscar itens para cada pedido
                // Realiza um JOIN com a tabela 'produtos' para obter os detalhes do produto
                $query_itens = "
                    SELECT 
                        pi.quantidade, 
                        pi.preco_unitario,
                        pr.nome_produto, 
                        pr.detalhes_produto, 
                        pr.imagem_produto
                    FROM 
                        pedido_itens pi
                    JOIN 
                        produtos pr ON pi.id_produto = pr.id_produto
                    WHERE 
                        pi.id_pedido = ?
                ";
                $stmt_itens = $this->database->execute($query_itens, [$pedido_id]);
                $itens_do_pedido = $stmt_itens->fetchAll(PDO::FETCH_ASSOC);
                $pedido['itens'] = $itens_do_pedido;

                // Calcula o subtotal do pedido somando os subtotais de cada item
                $subtotal_calculado = 0;
                foreach ($itens_do_pedido as $item) {
                    $subtotal_calculado += ($item['quantidade'] * $item['preco_unitario']);
                }
                $pedido['subtotal_calculado'] = $subtotal_calculado;

                // 3. Buscar o histórico de status para cada pedido
                $query_status_historico = "
                    SELECT 
                        psh.status_novo, 
                        psh.data_mudanca
                    FROM 
                        pedido_status_historico psh
                    WHERE 
                        psh.id_pedido = ?
                    ORDER BY 
                        psh.data_mudanca ASC
                ";
                $stmt_status_historico = $this->database->execute($query_status_historico, [$pedido_id]);
                $pedido['historico_status'] = $stmt_status_historico->fetchAll(PDO::FETCH_ASSOC);

                // Adiciona o pedido completo (com itens e histórico) ao array de pedidos
                $pedidos[] = $pedido;
            }

        } catch (PDOException $e) {
            // Em caso de erro no banco de dados, você pode logar o erro e/ou relançar uma exceção mais genérica.
            // Para depuração, um die() pode ser útil, mas em produção, evite expor detalhes do erro.
            error_log("Erro ao carregar pedidos: " . $e->getMessage()); // Loga o erro
            throw new Exception("Não foi possível carregar os pedidos no momento. Tente novamente mais tarde.");
        } catch (Exception $e) {
            error_log("Ocorreu um erro inesperado: " . $e->getMessage());
            throw new Exception("Ocorreu um erro inesperado ao processar os pedidos.");
        }

        return $pedidos;
    }
}