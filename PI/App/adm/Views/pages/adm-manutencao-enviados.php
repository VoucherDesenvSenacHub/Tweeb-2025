<?php
session_start();
require_once __DIR__ . '/../../Models/OrdemServico.php';
OrdemServico::atualizarStatusAutomaticamente();

$ordens = OrdemServico::buscarPorStatus('Finalizada', true);
$totais = OrdemServico::contarTodosStatus();
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
<?php include __DIR__.'/../../../../includes/headernavb.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manutenções</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>







<body class="manutencao-body">
<?php include __DIR__.'/../../../../includes/head-adm.php'; ?>
<?php include __DIR__.'/../../../../includes/sidebar-Adm.php'; ?>
        <div class="manutencao-container">
          
            <section class="manutencao-section">
                <h1>Manutenções</h1>

              <div class="manutencoes-cards">
                <div class="manutencao-card card-total" 
                    data-total="<?= $totais['total'] ?>" 
                    data-ativas="<?= $totais['total'] - $totais['inativos'] ?>">
                  <p class="manutencoes-total titulo">Total</p>
                  <p class="valor-total"><?= $totais['total'] ?></p>
                </div>

                <div class="manutencao-card">
                  <p class="manutencoes-andamento">Em andamento</p>
                  <p><?= $totais['em_andamento'] ?></p>
                </div>

                <div class="manutencao-card">
                  <p class="manutencoes-finalizadas">Finalizadas</p>
                  <p><?= $totais['finalizadas'] ?></p>
                </div>

                <div class="manutencao-card">
                  <p class="manutencoes-atrasadas">Atrasadas</p>
                  <p><?= $totais['atrasadas'] ?></p>
                </div>
                
                <div class="manutencao-card">
                  <p class="manutencoes-inativos">Inativos</p>
                  <p><?= $totais['inativos'] ?></p>
                </div>
              </div>

                
            </section>
        
            
            <nav class="manutencao-tabs">
                <a href="adm-manutencao.php" class="">Ordem de serviço</a>
                <a href="adm-manutencao-enviados.php" class="active">Finalizadas</a>
                <a href="adm-manutencao-inativos.php">Inativos</a>
            </nav>
          
            
            <div class="search-os">
              <input type="text" id="filtroOS" placeholder="Buscar O.S. , Equipamento" />
            </div>

            <div class="manutencao-actions">
            <!-- <a href="#" class="pedidos-adicionar-envio" onclick="openModal(); return false;">
                <img src="../../../../public/assets/img/plus-circle.svg" alt="Adicionar OS">
                <p>Editar OS</p>
            </a> -->


                <!-- <div class="pedidos-adicionar-envio">
                    <img src="../../../../public/assets/img/plus-circle.svg" alt="">
                    <p>Editar OS</p>
                </div> -->

                <div class="pedidos-adicionar-envio" onclick="window.location.href='OrdemdeServico.php';">
                        <img src="../../../../public/assets/img/plus-circle.svg" alt="">
                        <p>Adicionar OS</p>
                </div>
  
            </div>
            <h1 class="servicos-title">Ordem de serviço</h1>
        <div class="servicos-table">
            <!-- <h1>Ordem de serviço</h1> -->
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
                    <?php if (!empty($ordens)): ?>
                      <?php foreach ($ordens as $ordem): ?>
                        <tr 
                            data-id="<?= $ordem['id_os'] ?>"
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
                            data-tecnico_responsavel="<?= htmlspecialchars($ordem['tecnico_responsavel']) ?>"
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
                            ?>
                            <td class="<?= $classe ?>"><?= $status ?></td>


                        </tr>
                      <?php endforeach; ?>
                    <?php else: ?>
                      <tr>
                        <td colspan="6" style="text-align:center;">Nenhuma ordem de serviço encontrada.</td>
                      </tr>
                    <?php endif; ?>
                  </tbody>

            </table>
        </div>
    
          <div class="pagination">
              <button onclick="showPage()"></button>
          </div>
    
    </div>



    <!-- <div class="manutencoes-aceitas">
        <p>Manutenções Aceitas</p>

        <div class="botao-out" id="ativar-aceitas">

            <div class="botao-inner">
                <img src="../../../../public/assets/img/Arrow - Right 3.png" alt="">
            </div>

        </div>

    </div> -->
    
    <!-- <div class="aceitas-table" id="manutencoes-aceitas" style="display: none;">
        <h1>Manutenções Aceitas</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Prazo determinado</th>
                <th>Solicitação</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Rafaela Costa</td>
                <td>costa25@gmail.com</td>
                <td class="green-text">2 dias</td>
                <td>Formatação</td>
            </tr>
            <tr class="highlight-adm">
                <td>2</td>
                <td>Laura Borges</td>
                <td>blaura2021@gmail.com</td>
                <td>Não</td>
                <td>Troca de tela</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Wesley Pablo</td>
                <td>wes_pablo@live.com</td>
                <td class="green-text">3 dias</td>
                <td>Troca de tela</td>
            </tr>
            <tr class="highlight-adm">
                <td>4</td>
                <td>Gabriel José</td>
                <td>gabriel_joca@live.com</td>
                <td>Não</td>
                <td>Notebook não liga</td>
            </tr>
        </table>
        <div class="pagination">
            <button class="active">1</button>
            <button>2</button>
        </div>
        
    </div> -->
  

    <div id="modal-simplificado" class="modal-simplificado" style="display: none;">
      <div class="modal-simplificado-content">
        <p>Visualizar detalhes desta O.S.?</p>
        <div class="modal-simplificado-buttons">
          <button id="btn-ver-detalhes">Ver Detalhes</button>
        </div>
      </div>
    </div>    
    
</body>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
  </script>


  <script>


    function openModal() {
      document.getElementById('editar-os-modal').style.display = 'flex'; // IMPORTANTE: display flex!
    }
    function closeModal() {
      document.getElementById('editar-os-modal').style.display = 'none';
    }
    function cancelAndGoBack() {
      closeModal();
      window.history.back();
    }


    function saveChanges() {
      alert("Alterações salvas com sucesso!");
      closeModal();
    }


    function abrirModal() {
      document.getElementById('modalContainer').style.display = 'flex';
    }
    function fecharModal() {
      document.getElementById('modalContainer').style.display = 'none';
    }

  </script>

    <script>
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