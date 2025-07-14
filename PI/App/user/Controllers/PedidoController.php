<?php
// Controllers/PedidoController.php
// Este arquivo contém a lógica para buscar e preparar os dados dos pedidos.

// Bloqueia apenas acessos diretos via GET, mas permite POST (AJAX)
if ($_SERVER['REQUEST_METHOD'] === 'GET' && basename($_SERVER['PHP_SELF']) == 'PedidoController.php') {
    die('Acesso direto negado.');
}

// O LOG DE DEPURAÇÃO PARA CANCELAMENTO foi movido para o novo arquivo de endpoint AJAX.
// include __DIR__ . '/../../DB/Database.php'; // Já está no construtor da classe Database

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
        // Inclui a classe Database aqui para garantir que esteja disponível
        include_once __DIR__ . '/../../DB/Database.php';
        $this->database = new Database(); // Instancia a sua classe Database
        $this->usuario_id = $usuario_id;
    }

    /**
     * Função interna auxiliar para buscar itens e histórico de status.
     * Evita duplicação de código.
     * @param array $pedidos_db Array de pedidos brutos do banco de dados.
     * @return array Array de pedidos processados com itens e histórico.
     */
    private function processarPedidosData(array $pedidos_db): array {
        $pedidos_processados = [];
        foreach ($pedidos_db as $pedido) {
            $pedido_id = $pedido['id_pedido'];

            // 2. Buscar itens para cada pedido
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
            $historico_status = $stmt_status_historico->fetchAll(PDO::FETCH_ASSOC);

            // --- Ajuste de datas conforme regra do usuário (simulação se não houver no histórico) ---
            $data_pedido = $pedido['data_pedido'];
            $status_simulados = [
                'pago' => $data_pedido,
                'preparando' => $data_pedido,
                'enviado' => date('Y-m-d H:i:s', strtotime($data_pedido . ' +1 day')),
                'entregue' => date('Y-m-d H:i:s', strtotime($data_pedido . ' +1 day +12 hours'))
            ];
            
            $historico_final = [];
            // Adiciona os status reais do histórico primeiro
            foreach ($historico_status as $h) {
                $historico_final[] = $h;
            }

            // Adiciona status simulados APENAS SE AINDA NÃO EXISTIREM NO HISTÓRICO REAL E O PEDIDO NÃO ESTIVER CANCELADO
            if (strtolower(trim($pedido['status_pedido'])) !== 'cancelado') {
                foreach ($status_simulados as $status => $data) {
                    $encontrado = false;
                    foreach ($historico_final as $h) {
                        if (strtolower(trim($h['status_novo'])) === $status) {
                            $encontrado = true;
                            break;
                        }
                    }
                    if (!$encontrado) {
                        $historico_final[] = [
                            'status_novo' => $status,
                            'data_mudanca' => $data
                        ];
                    }
                }
            }
            // Garante que o histórico esteja ordenado por data para exibição
            usort($historico_final, function($a, $b) {
                return strtotime($a['data_mudanca']) - strtotime($b['data_mudanca']);
            });
            
            $pedido['historico_status'] = $historico_final;
            $pedidos_processados[] = $pedido;
        }
        return $pedidos_processados;
    }

    /**
     * Busca TODOS os pedidos de um usuário, independentemente do status.
     * Usado para a tela de Pedidos Cancelados, onde o filtro é feito no front-end.
     * @return array Um array de pedidos, cada um contendo seus itens e histórico de status.
     */
    public function getTodosPedidosDoUsuario(): array {
        try {
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
            $stmt_pedidos = $this->database->execute($query_pedidos, [$this->usuario_id]);
            $pedidos_db = $stmt_pedidos->fetchAll(PDO::FETCH_ASSOC);

            return $this->processarPedidosData($pedidos_db);

        } catch (PDOException $e) {
            error_log("Erro ao carregar todos os pedidos: " . $e->getMessage());
            throw new Exception("Não foi possível carregar todos os pedidos no momento. Tente novamente mais tarde.");
        } catch (Exception $e) {
            error_log("Ocorreu um erro inesperado: " . $e->getMessage());
            throw new Exception("Ocorreu um erro inesperado ao processar os pedidos.");
        }
    }

    /**
     * Busca apenas os pedidos ATIVOS (não cancelados) de um usuário.
     * Usado para a tela de Rastreio de Pedidos (pedidos ativos).
     * @return array Um array de pedidos ativos, cada um contendo seus itens e histórico de status.
     */
    public function getPedidosAtivosDoUsuario(): array {
        try {
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
                    AND p.status_pedido != 'cancelado' -- Filtra para NÃO trazer cancelados
                ORDER BY
                    p.data_pedido DESC
            ";
            $stmt_pedidos = $this->database->execute($query_pedidos, [$this->usuario_id]);
            $pedidos_db = $stmt_pedidos->fetchAll(PDO::FETCH_ASSOC);

            return $this->processarPedidosData($pedidos_db);

        } catch (PDOException $e) {
            error_log("Erro ao carregar pedidos ativos: " . $e->getMessage());
            throw new Exception("Não foi possível carregar os pedidos ativos no momento.");
        } catch (Exception $e) {
            error_log("Ocorreu um erro inesperado: " . $e->getMessage());
            throw new Exception("Ocorreu um erro inesperado ao processar os pedidos ativos.");
        }
    }
}
?>