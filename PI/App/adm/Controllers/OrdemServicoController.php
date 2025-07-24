<?php
require_once __DIR__ . '/../Models/OrdemServico.php';

class OrdemServicoController {

    
    public function listar() {
        $ordens = OrdemServico::buscar();
        return $ordens;
    }

    
    public function buscarPorId($id_os) {
        return OrdemServico::buscar_by_id($id_os);
    }

    
    public function criar(array $dados) {
        $os = new OrdemServico();

        
        $os->tipo_equipamento = $dados['tipo_equipamento'] ?? '';
        $os->nome_cliente = $dados['nome_cliente'] ?? '';
        $os->email_cliente = $dados['email_cliente'] = filter_var($dados['email_cliente'], FILTER_VALIDATE_EMAIL) ? $dados['email_cliente'] : '';
        $os->marca_modelo = $dados['marca_modelo'] ?? '';
        $os->telefone = $dados['telefone'] ?? '';
        $os->endereco = $dados['endereco'] ?? '';
        $os->cep = $dados['cep'] ?? '';
        $os->numero_serie = $dados['numero_serie'] ?? '';
        $os->acessorios_entregues = $dados['acessorios_entregues'] ?? '';
        $os->relato_cliente = $dados['relato_cliente'] ?? '';
        $os->tecnico_responsavel = isset($dados['id_tecnico']) ? (int)$dados['id_tecnico'] : null;
        $os->servicos_solicitados = $dados['servicos_solicitados'] ?? '';
        $os->estimativa_custo = is_numeric($dados['estimativa_custo']) ? floatval($dados['estimativa_custo']) : 0.00;
        $os->aprovacao_cliente = !empty($dados['aprovacao_cliente']) ? $dados['aprovacao_cliente'] : 'aceito';
        $os->servicos_realizados = $dados['servicos_realizados'] ?? '';
        $os->pecas_substituidas = $dados['pecas_substituidas'] ?? '';
        $os->testes_realizados = $dados['testes_realizados'] ?? '';
        $os->data_conclusao = $dados['data_conclusao'] ?? null;
        $os->observacoes = $dados['observacoes'] ?? '';

        return $os->cadastrar();
    }


    // Atualizar uma ordem de serviço
    public function atualizar(int $id_os, array $dados) {
        $os = OrdemServico::buscar_by_id($id_os);

        if (!$os) {
            return false;
        }

        // Atualizar dados
        $os->tipo_equipamento = $dados['tipo_equipamento'] ?? $os->tipo_equipamento;
        $os->nome_cliente = $dados['nome_cliente'] ?? $os->nome_cliente;
        $os->email_cliente = $dados['email_cliente'] ?? $os->email_cliente;
        $os->marca_modelo = $dados['marca_modelo'] ?? $os->marca_modelo;
        $os->telefone = $dados['telefone'] ?? $os->telefone;
        $os->endereco = $dados['endereco'] ?? $os->endereco;
        $os->cep = $dados['cep'] ?? $os->cep;
        $os->numero_serie = $dados['numero_serie'] ?? $os->numero_serie;
        $os->acessorios_entregues = $dados['acessorios_entregues'] ?? $os->acessorios_entregues;
        $os->relato_cliente = $dados['relato_cliente'] ?? $os->relato_cliente;
        $os->tecnico_responsavel = isset($dados['id_tecnico']) ? (int)$dados['id_tecnico'] : $os->tecnico_responsavel;
        $os->servicos_solicitados = $dados['servicos_solicitados'] ?? $os->servicos_solicitados;
        $os->estimativa_custo = $dados['estimativa_custo'] ?? $os->estimativa_custo;
        $os->aprovacao_cliente = $dados['aprovacao_cliente'] ?? $os->aprovacao_cliente;
        $os->servicos_realizados = $dados['servicos_realizados'] ?? $os->servicos_realizados;
        $os->pecas_substituidas = $dados['pecas_substituidas'] ?? $os->pecas_substituidas;
        $os->testes_realizados = $dados['testes_realizados'] ?? $os->testes_realizados;
        $os->data_conclusao = $dados['data_conclusao'] ?? $os->data_conclusao;
        $os->observacoes = $dados['observacoes'] ?? $os->observacoes;

        return $os->atualizar();
    }

    // Excluir uma ordem de serviço
    public function excluir(int $id_os) {
        $os = new OrdemServico();
        return $os->excluir($id_os);
    }

    //OrdemdeServico.php
    public function formulario() {
        $tecnicos = OrdemServico::listarTecnicos();

        // Monta o nome completo de cada técnico
        foreach ($tecnicos as &$tecnico) {
            $tecnico['nome_completo'] = trim($tecnico['nome'] . ' ' . $tecnico['sobrenome']);
        }
        unset($tecnico);
        include __DIR__ . '/../Views/pages/OrdemServico.php';
    }




    //painel-adm.php
    public function listarComPrioridade() {
        $ordens = OrdemServico::buscarComTecnico();

    function calcularPrioridade($ordem) {
        if ($ordem['status'] === 'Finalizada') {
            return ['Finalizada', 'painel-prioridade-finalizada'];
        }

        if (empty($ordem['data_abertura']) || empty($ordem['data_conclusao'])) {
            return ['Não definida', 'prioridade-desconhecida'];
        }

        $abertura = new DateTime($ordem['data_abertura']);
        $conclusao = new DateTime($ordem['data_conclusao']);
        $dias = $abertura->diff($conclusao)->days;

        if ($dias <= 2) return ['Alta', 'painel-prioridade-alta'];
        if ($dias <= 5) return ['Média', 'painel-prioridade-media'];
        return ['Baixa', 'painel-prioridade-baixa'];
    }

    // Função que transforma o status em número para ordenação
    function prioridadeParaNumero($ordem) {
        if ($ordem['status'] === 'Finalizada') return 4;
        [$prioridadeTexto, $_] = calcularPrioridade($ordem);
        return match($prioridadeTexto) {
            'Alta' => 1,
            'Média' => 2,
            'Baixa' => 3,
            default => 5
        };
    }

    usort($ordens, fn($a, $b) => prioridadeParaNumero($a) <=> prioridadeParaNumero($b));

    // Adiciona os dados de prioridade para exibição futura
    foreach ($ordens as &$ordem) {
        [$ordem['prioridade_texto'], $ordem['classe_prioridade']] = calcularPrioridade($ordem);
    }
    return $ordens;
}
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['action']) && $_GET['action'] === 'create') {
    $controller = new OrdemServicoController();
    $sucesso = $controller->criar($_POST);
    header('Location: ../Views/pages/adm-manutencao.php?created=' . ($sucesso ? '1' : '0'));
    exit;
}



if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['action']) && $_GET['action'] === 'update') {
    $controller = new OrdemServicoController();
    $sucesso = $controller->atualizar((int) $_POST['id_os'], $_POST);
    header('Location: ../Views/pages/adm-manutencao.php?updated=' . ($sucesso ? '1' : '0'));
    exit;
}


