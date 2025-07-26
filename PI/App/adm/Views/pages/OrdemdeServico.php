<?php
require_once __DIR__ . '/../../Models/OrdemServico.php';
require_once __DIR__ . '/../../Models/Funcionario.php';
require_once __DIR__ . '/../../../DB/Database.php';

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

// Verifica se o usuário está logado como admin ou funcionário
if (!isset($_SESSION['adm']) && !isset($_SESSION['funcionario'])) {
    header('Location: login-funcionario.php');
    exit();
}

// Define qual sessão usar (admin tem prioridade)
$funcionario = isset($_SESSION['adm']) ? $_SESSION['adm'] : $_SESSION['funcionario'];

// Busca dados completos do banco para garantir que temos todos os campos
$db = new Database();
$dadosCompletos = $db->buscarDadosCompletosPorId($funcionario['id'], $funcionario['tipo']);

// Se encontrou dados completos, atualiza a sessão e usa eles
if ($dadosCompletos) {
    $tipo_sessao = isset($_SESSION['adm']) ? 'adm' : 'funcionario';
    $_SESSION[$tipo_sessao] = array_merge($_SESSION[$tipo_sessao], $dadosCompletos);
    $funcionario = $dadosCompletos;
}
$tecnicos = OrdemServico::listarTecnicos();
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
<?php include __DIR__.'/../../../../includes/headernavb.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Ordem de Serviço</title>
</head>

<body class="OrdemSevico21">
<?php include __DIR__.'/../../../../includes/head-adm.php'; ?>
<?php include __DIR__.'/../../../../includes/sidebar-Adm.php'; ?>

<!-- <button type="button" onclick="history.back()" class="btn_voltar">Voltar</button> -->

<div class="container-ordem-de-servico21">
<button type="button" onclick="history.back()" class="btn_voltar_adicionar_os">Voltar</button>
<h1 class="ordem-de-servico-h121">Ordem de Serviço</h1>
    <form class="Servico21" action="../../Controllers/OrdemServicoController.php?action=create" method="POST">
        <!-- <div class="Ordem_Servico21">
            <label for="numero_os">Número da OS</label>
            <input type="text" name="numero_os" id="numero_os" placeholder="">
        </div> -->
        <!-- <div class="Ordem_Servico21">
            <label for="data_abertura">Data de Abertura</label>
            <input type="date" name="data_abertura" id="data_abertura" placeholder="">
        </div> -->
        <div class="Ordem_Servico21">
            <label for="tipo_equipamento">Tipo de equipamento</label>
            <input type="text" name="tipo_equipamento" id="tipo_equipamento" placeholder="" required>
        </div>
        <div class="Ordem_Servico21">
            <label for="nome_cliente">Nome do Cliente</label>
            <input type="text" name="nome_cliente" id="nome_cliente" placeholder="" required>
        </div>
        <div class="Ordem_Servico21">
            <label for="email_cliente">Email</label>
            <input type="email" name="email_cliente" id="email_cliente" placeholder="">
        </div>
        <div class="Ordem_Servico21">
            <label for="marca_modelo">Marca e modelo</label>
            <input type="text" name="marca_modelo" id="marca_modelo" placeholder="">
        </div>
        <div class="Ordem_Servico21">
            <label for="telefone">Telefone</label>
            <input type="tel" name="telefone" id="telefone" maxlength="15" pattern="\(\d{2}\) \d{5}-\d{4}" placeholder="Digite os 9 dígitos" required>
        </div>
        <div class="Ordem_Servico21">
            <label for="endereco">Endereço</label>
            <input type="text" name="endereco" id="endereco" placeholder="">
        </div>
        <div class="Ordem_Servico21">
            <label for="cep">CEP</label>
            <input type="text" name="cep" id="cep" maxlength="9" placeholder=" 99999-999 " pattern="\d{5}-?\d{3}">
        </div>
        <div class="Ordem_Servico21">
            <label for="numero_serie">Número de série</label>
            <input type="text" name="numero_serie" id="numero_serie" placeholder="">
        </div>
        <div class="Ordem_Servico21">
            <label for="acessorios_entregues">Acessórios entregues</label>
            <input type="text" name="acessorios_entregues" id="acessorios_entregues" placeholder="">
        </div>
        <div class="Ordem_Servico21">
            <label for="relato_cliente">Relato do cliente</label>
            <input type="text" name="relato_cliente" id="relato_cliente" placeholder="">
        </div>
        <div class="Ordem_Servico21">
            <label for="id_tecnico">Técnico Responsável</label>
                <select name="id_tecnico" id="id_tecnico" required>
                    <option value="">Selecione o técnico</option>
                        <?php foreach ($tecnicos as $tecnico): ?>
                            <option value="<?= $tecnico['id'] ?>">
                                <?= htmlspecialchars($tecnico['nome_completo'] ?? ($tecnico['nome'] . ' ' . $tecnico['sobrenome'])) ?>
                            </option>
                        <?php endforeach; ?>
                </select>
        </div>
        <div class="Ordem_Servico21">
            <label for="servicos_solicitados">Serviços solicitados</label>
                <select name="servicos_solicitados" id="servicos_solicitados" required>
                    <option value="">Selecione um serviço</option>
                    <option value="atualização de firmware">Atualização de Firmware</option>
                    <option value="backup e recuperação">Backup e Recuperação</option>
                    <option value="configuração de sistema">Configuração de Sistema</option>
                    <option value="formatação">Formatação</option>
                    <option value="limpeza e manutenção preventiva">Limpeza e Manutenção Preventiva</option>
                    <option value="serviços de software: instalação, configuração e atualização">
                    Serviços de Software: Instalação, Configuração e Atualização
                    </option>
                    <option value="substituição peças">Substituição de Peças</option>
                </select>
        </div>
        <div class="Ordem_Servico21">
            <label for="estimativa_custo">Estimativa de custo</label>
            <input type="text" name="estimativa_custo" id="estimativa_custo" placeholder="Ex: 100.00" inputmode="decimal" required>
        </div>
        <div class="Ordem_Servico21">
            <label for="aprovacao_cliente">Aprovação do Cliente</label>
            <input type="text" name="aprovacao_cliente" id="aprovacao_cliente" value="aceito" placeholder="aceito" readonly>
        </div>
        <div class="Ordem_Servico21">
            <label for="servicos_realizados">Serviços realizados</label>
            <input type="text" name="servicos_realizados" id="servicos_realizados" placeholder="">
        </div>
        <div class="Ordem_Servico21">
            <label for="pecas_substituidas">Peças substituídas</label>
            <input type="text" name="pecas_substituidas" id="pecas_substituidas" placeholder="">
        </div>
        <div class="Ordem_Servico21">
            <label for="testes_realizados">Testes realizados</label>
            <input type="text" name="testes_realizados" id="testes_realizados" placeholder="">
        </div>
        <div class="Ordem_Servico21">
            <label for="data_conclusao">Data de conclusão</label>
            <input type="date" name="data_conclusao" id="data_conclusao" placeholder="">
        </div>
        <div class="Ordem_Servico21">
            <label for="observacoes">Observações</label>
            <input type="text" name="observacoes" id="observacoes" placeholder="">
        </div>

        <button type="submit" class="btn_ordemServico21">Salvar</button>
    </form>
</div>

<?php include __DIR__.'/../../../../includes/footer-adm.php'; ?> 

</body>


<script>
    document.getElementById('telefone').addEventListener('input', function (e) {
    let value = e.target.value.replace(/\D/g, '');

    if (value.length > 15) value = value.slice(0, 11);

    let formatted = value;

    if (value.length > 0) {
        formatted = `(${value.substring(0, 2)}`;
    }
    if (value.length >= 3) {
        formatted += `) ${value.substring(2, 7)}`;
    }
    if (value.length >= 8) {
        formatted += `-${value.substring(7, 11)}`;
    }

    e.target.value = formatted;
    });

    document.getElementById('cep').addEventListener('input', function (e) {
    let value = e.target.value.replace(/\D/g, ''); 

    if (value.length > 8) value = value.slice(0, 8);

    if (value.length > 5) {
        e.target.value = value.slice(0, 5) + '-' + value.slice(5);
    } else {
        e.target.value = value;
    }
    });
</script>

<!-- <script>
  const estimativaInput = document.getElementById('estimativa_custo');

  estimativaInput.addEventListener('input', function () {
    let value = this.value.replace(/\D/g, '');

    if (value.length === 0) {
      this.value = '';
      return;
    }

    const numericValue = parseFloat(value) / 100;

    this.value = numericValue.toLocaleString('pt-BR', {
      minimumFractionDigits: 2,
      maximumFractionDigits: 2
    });
  });

  estimativaInput.addEventListener('blur', function () {
    let value = this.value.replace(/\D/g, '');
    const numericValue = parseFloat(value) / 100;

    if (!isNaN(numericValue)) {
      this.value = numericValue.toLocaleString('pt-BR', {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
      });
    } else {
      this.value = '';
    }
  });

</script> -->

</html>
