<?php
require_once __DIR__ . '/../../DB/Database.php';

class OrdemServico {
    public int $id_os;
    public string $tipo_equipamento;
    public string $nome_cliente;
    public string $email_cliente;
    public string $marca_modelo;
    public string $telefone;
    public string $endereco;
    public string $cep;
    public string $numero_serie;
    public string $acessorios_entregues;
    public string $relato_cliente;
    public ?int $tecnico_responsavel = null;
    public string $servicos_solicitados;
    public float $estimativa_custo;
    public string $aprovacao_cliente;
    public string $servicos_realizados;
    public string $pecas_substituidas;
    public string $testes_realizados;
    public string $data_conclusao;
    public string $observacoes;

    public function cadastrar() {
        $db = new Database('ordem_servico');
        $result = $db->insert(
            [
            'tipo_equipamento' => $this->tipo_equipamento,
            'nome_cliente' => $this->nome_cliente,
            'email_cliente' => $this->email_cliente,
            'marca_modelo' => $this->marca_modelo,
            'telefone' => $this->telefone,
            'endereco' => $this->endereco,
            'cep' => $this->cep,
            'numero_serie' => $this->numero_serie,
            'acessorios_entregues' => $this->acessorios_entregues,
            'relato_cliente' => $this->relato_cliente,
            'tecnico_responsavel' => $this->tecnico_responsavel,
            'servicos_solicitados' => $this->servicos_solicitados,
            'estimativa_custo' => $this->estimativa_custo,
            'aprovacao_cliente' => $this->aprovacao_cliente ?? 'aceito',
            'servicos_realizados' => $this->servicos_realizados,
            'pecas_substituidas' => $this->pecas_substituidas,
            'testes_realizados' => $this->testes_realizados,
            'data_conclusao' => $this->data_conclusao,
            'observacoes' => $this->observacoes,
            ]
        );
        
        if($result) {
            return true;
        }
        else{
            return false;
        }
    }

    public function atualizar() {
        return (new Database('ordem_servico'))->update([
            'tipo_equipamento' => $this->tipo_equipamento,
            'nome_cliente' => $this->nome_cliente,
            'email_cliente' => $this->email_cliente,
            'marca_modelo' => $this->marca_modelo,
            'telefone' => $this->telefone,
            'endereco' => $this->endereco,
            'cep' => $this->cep,
            'numero_serie' => $this->numero_serie,
            'acessorios_entregues' => $this->acessorios_entregues,
            'relato_cliente' => $this->relato_cliente,
            'tecnico_responsavel' => $this->tecnico_responsavel,
            'servicos_solicitados' => $this->servicos_solicitados,
            'estimativa_custo' => $this->estimativa_custo,
            'aprovacao_cliente' => $this->aprovacao_cliente,
            'servicos_realizados' => $this->servicos_realizados,
            'pecas_substituidas' => $this->pecas_substituidas,
            'testes_realizados' => $this->testes_realizados,
            'data_conclusao' => $this->data_conclusao,
            'observacoes' => $this->observacoes,
        ], 'id_os = ' . $this->id_os);
    }

    public static function buscar() {
        return (new Database('ordem_servico'))->select()->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function buscar_by_id($id_os) {
        return (new Database('ordem_servico'))->select('id_os = ' . $id_os)->fetchObject(self::class);
    }

    public static function excluir($id_os) {
        return (new Database('ordem_servico'))->delete('id_os = ' . (int)$id_os);
    }
    

    //adm-manutencao.php e adm-manutencao-enviados.php
    public static function contarTodosStatus() {
    $db = new Database('ordem_servico');

    $sql = "
        SELECT
    (SELECT COUNT(*) FROM ordem_servico) AS total,
    (SELECT COUNT(*) FROM ordem_servico WHERE status = 'Em andamento') AS em_andamento,
    (SELECT COUNT(*) FROM ordem_servico WHERE status = 'Finalizada') AS finalizadas,
    (SELECT COUNT(*) FROM ordem_servico WHERE status = 'Atrasada') AS atrasadas

    ";

    $stmt = $db->execute($sql);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}


    //adm-manutencao.php e adm-manutencao-enviados.php
    public static function atualizarStatusAutomaticamente() {
        $db = new Database('ordem_servico');
        $conn = $db->execute("SELECT id_os, data_abertura, data_conclusao FROM ordem_servico");
        $ordens = $conn->fetchAll(PDO::FETCH_ASSOC);

        foreach ($ordens as $ordem) {
            $id = $ordem['id_os'];
            $abertura = $ordem['data_abertura'];
            $conclusao = $ordem['data_conclusao'];

            if (!empty($conclusao)) {
                // Convertendo para timestamps
                $ts_abertura = strtotime($abertura);
                $ts_conclusao = strtotime($conclusao);
                $ts_hoje = strtotime(date('Y-m-d'));

                if ($ts_conclusao < $ts_abertura) {
                    $status = 'Atrasada';
                } elseif (date('Y-m-d', $ts_conclusao) == date('Y-m-d', $ts_abertura)) {
                    $status = 'Finalizada';
                } elseif ($ts_hoje < $ts_conclusao) {
                    $status = 'Em andamento';
                } else {
                    $status = 'Finalizada';
                }
                // Atualiza o status da ordem
                (new Database('ordem_servico'))->update(['status' => $status], 'id_os = ' . (int)$id);
            }
        }
    }

    //adm-manutencao-enviados.php
    public static function buscarPorStatus($status) {
        return (new Database('ordem_servico'))->select("status = '$status'")->fetchAll(PDO::FETCH_ASSOC);
    }

    //OrdemdeServico.php
    public static function listarTecnicos() {
        $db = new Database();
        $sql = "
            SELECT usuarios.id, usuarios.nome, usuarios.sobrenome
            FROM usuarios
            INNER JOIN funcionarios ON usuarios.id = funcionarios.id_usuario
            WHERE usuarios.tipo = 'funcionario' AND funcionarios.cargo = 'Técnico'
        ";
        $stmt = $db->execute($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //adm-manutencao.php
    public static function buscarNomeTecnico($id_tecnico) {
        if (!$id_tecnico) return '';

        $db = new Database('usuarios');
        $stmt = $db->select("id = $id_tecnico", 'nome, sobrenome');
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$resultado) return '';

        $nome = $resultado['nome'] ?? '';
        $sobrenome = $resultado['sobrenome'] ?? '';

        return trim($nome . ' ' . $sobrenome);
    }

    //painel-adm.php
    public static function buscarComTecnico() {
        $db = new Database(); 

        $sql = "
            SELECT 
                ordem_servico.*,
                usuarios.nome AS nome_tecnico, 
                usuarios.sobrenome AS sobrenome_tecnico,
                usuarios.foto_perfil
            FROM ordem_servico
            LEFT JOIN usuarios 
                ON ordem_servico.tecnico_responsavel = usuarios.id";

        $stmt = $db->execute($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}