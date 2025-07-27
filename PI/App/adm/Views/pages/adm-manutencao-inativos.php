<?php

require_once __DIR__ . '/../../Models/Funcionario.php';
require_once __DIR__ . '/../../../DB/Database.php';
require_once __DIR__ . '/../../Models/OrdemServico.php';

$ordensInativas = OrdemServico::buscarInativas();
$totais = OrdemServico::contarTodosStatus();
$tecnicos = OrdemServico::listarTecnicos();

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<?php include __DIR__.'/../../../../includes/headernavb.php'; ?>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Ordens Inativas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
</head>

<body class="manutencao-body">
<?php include __DIR__.'/../../../../includes/head-adm.php'; ?>
<?php include __DIR__.'/../../../../includes/sidebar-Adm.php'; ?>

<div class="manutencao-container">
    <section class="manutencao-section">
        <h1>Ordens Inativas</h1>

        <div class="manutencoes-cards">
            <div class="manutencao-card card-total" 
                    data-total="<?= $totais['total'] ?>" 
                    data-ativas="<?= $totais['total'] - $totais['inativos'] ?>">
                <p class="manutencoes-total titulo">Total</p>
                <p class="valor-total"><?= $totais['total'] ?></p>
            </div>
            <div class="manutencao-card">
                <p class="manutencoes-inativos">Inativos</p>
                <p><?= $totais['inativos'] ?></p>
            </div>
        </div>
    </section>

    <nav class="manutencao-tabs">
        <a href="adm-manutencao.php">Ativos</a>
        <a href="" class="active">Inativos</a>
    </nav>

    <div class="search-os">
        <input type="text" id="filtroOS" placeholder="Buscar O.S. , Equipamento" />
    </div>

    <h1 class="servicos-title-inativos">Ordens Inativas</h1>
    <div class="servicos-table">
        <table>
            <thead class="thead-os">
                <tr>
                    <th>Order ID</th>
                    <th>Produto</th>
                    <th>Valor R$</th>
                    <th>Entrada</th>
                    <th>Saída</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($ordensInativas)): ?>
                    <?php foreach ($ordensInativas as $ordem): ?>
                        <?php $nome_tecnico_completo = OrdemServico::buscarNomeTecnico($ordem['tecnico_responsavel']); ?>
                        <tr 
                            data-id="<?= $ordem['id_os'] ?>"
                            data-status="<?= $ordem['ativo'] == 0 ? 'inativo' : strtolower($ordem['status']) ?>"
                            data-tipo_equipamento="<?= htmlspecialchars($ordem['tipo_equipamento']) ?>"
                            data-nome_cliente="<?= htmlspecialchars($ordem['nome_cliente']) ?>"
                            data-email_cliente="<?= htmlspecialchars($ordem['email_cliente']) ?>"
                            data-marca_modelo="<?= htmlspecialchars($ordem['marca_modelo']) ?>"
                            data-telefone="<?= htmlspecialchars($ordem['telefone']) ?>"
                            data-endereco="<?= htmlspecialchars($ordem['endereco']) ?>"
                            data-cep="<?= htmlspecialchars($ordem['cep']) ?>"
                            data-numero_serie="<?= htmlspecialchars($ordem['numero_serie']) ?>"
                            data-acessorios_entregues="<?= htmlspecialchars($ordem['acessorios_entregues']) ?>"
                            data-relato_cliente="<?= htmlspecialchars($ordem['relato_cliente']) ?>"
                            data-tecnico_responsavel="<?= $ordem['tecnico_responsavel'] ?>"
                            data-nome_tecnico="<?= htmlspecialchars($nome_tecnico_completo) ?>"
                            data-servicos_solicitados="<?= htmlspecialchars($ordem['servicos_solicitados']) ?>"
                            data-estimativa_custo="<?= htmlspecialchars($ordem['estimativa_custo']) ?>"
                            data-aprovacao_cliente="<?= htmlspecialchars($ordem['aprovacao_cliente']) ?>"
                            data-servicos_realizados="<?= htmlspecialchars($ordem['servicos_realizados']) ?>"
                            data-pecas_substituidas="<?= htmlspecialchars($ordem['pecas_substituidas']) ?>"
                            data-testes_realizados="<?= htmlspecialchars($ordem['testes_realizados']) ?>"
                            data-data_conclusao="<?= htmlspecialchars($ordem['data_conclusao']) ?>"
                            data-observacoes="<?= htmlspecialchars($ordem['observacoes']) ?>"
                        >
                            <td><?= $ordem['id_os'] ?></td>
                            <td><?= $ordem['tipo_equipamento'] ?></td>
                            <td><?= $ordem['estimativa_custo'] ?></td>
                            <td><?= !empty($ordem['data_abertura']) ? date('d/m/Y H:i', strtotime($ordem['data_abertura'])) : '-' ?></td>
                            <td><?= !empty($ordem['data_conclusao']) ? date('d/m/Y', strtotime($ordem['data_conclusao'])) : '-' ?></td>
                            <?php
                            if ($ordem['ativo'] == 0) {
                                $classe = 'inativo';
                                $statusTexto = 'Inativo';
                            } else {
                                $status = $ordem['status'];
                                switch ($status) {
                                    case 'Finalizada':
                                        $classe = 'finalizada';
                                        break;
                                    case 'Atrasada':
                                        $classe = 'atrasada';
                                        break;
                                    default:
                                        $classe = 'andamento';
                                        break;
                                }
                                $statusTexto = $status;
                            }
                            ?>
                            <td class="<?= $classe ?>"><?= $statusTexto ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" style="text-align:center;">Nenhuma ordem inativa encontrada.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="pagination"></div>
</div>


    <div id="modal-simplificado" class="modal-simplificado" style="display: none;">
      <div class="modal-simplificado-content">
        <p>Visualizar detalhes desta O.S.?</p>
        <div class="modal-simplificado-buttons">
          <button id="btn-ver-detalhes">Ver Detalhes</button>
        </div>
      </div>
    </div>

</body>

<script>
  document.getElementById('filtroOS').addEventListener('keyup', function () {
      const filtro = this.value.toLowerCase();
      const linhas = document.querySelectorAll('.servicos-table tbody tr');

      linhas.forEach(function (linha) {
          const idOS = linha.cells[0]?.textContent.toLowerCase() || '';
          const tipoEquip = linha.cells[1]?.textContent.toLowerCase() || '';

          if (idOS.includes(filtro) || tipoEquip.includes(filtro)) {
              linha.style.display = '';
          } else {
              linha.style.display = 'none';
          }
      });
  });

  document.addEventListener('DOMContentLoaded', function () {
    const rowsPerPage = 5;
    const rows = document.querySelectorAll('.servicos-table tbody tr');
    const pagination = document.querySelector('.pagination');

    function showPage(page) {
      const totalPages = Math.ceil(rows.length / rowsPerPage);
      const start = (page - 1) * rowsPerPage;
      const end = start + rowsPerPage;

      rows.forEach((row, index) => {
        row.style.display = (index >= start && index < end) ? '' : 'none';
      });

      pagination.innerHTML = '';
      for (let i = 1; i <= totalPages; i++) {
        const button = document.createElement('button');
        button.textContent = i;
        button.className = (i === page) ? 'active' : '';
        button.onclick = () => showPage(i);
        pagination.appendChild(button);
      }
    }

    if (rows.length > 0) {
      showPage(1);
    }
  });
</script>

    <script>
      const card = document.querySelector('.card-total');
      const valor = card.querySelector('.valor-total');
      const titulo = card.querySelector('.titulo');

      const total = card.getAttribute('data-total');
      const ativas = card.getAttribute('data-ativas');

    
      card.addEventListener('click', () => {
        if (window.innerWidth <= 768) {
          if (valor.textContent == total) {
            valor.textContent = ativas;
            titulo.textContent = 'Ativos';
          } else {
            valor.textContent = total;
            titulo.textContent = 'Total';
          }
        }
      });

      
      card.addEventListener('mouseenter', () => {
        if (window.innerWidth > 768) {
          valor.textContent = ativas;
          titulo.textContent = 'Ativos';
        }
      });

      card.addEventListener('mouseleave', () => {
        if (window.innerWidth > 768) {
          valor.textContent = total;
          titulo.textContent = 'Total';
        }
      });
    </script>
    
</html>
