<?php
session_start();
require_once __DIR__ . '/../../Models/OrdemServico.php';
OrdemServico::atualizarStatusAutomaticamente();

$ordens = OrdemServico::buscarPorStatus('Finalizada');
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

<!-- Modal de Edição de OS -->
<div id="editar-os-modal" class="editar-os-modal" style="display: none;">
  <div class="editar-os-modal-content">
    <span class="editar-os-modal-close" onclick="closeModal()">&times;</span>
    <form id="editar-os-form" action="../../Controllers/OrdemServicoController.php?action=update" method="POST">
      <input type="hidden" name="id_os" id="modal_id_os">
      <h2 class="editar-os-modal-title">Editar Ordem de Serviço</h2><br><br>

      <div class="Ordem_Servico">
        <label for="Numero_da_Os">Número da OS</label>
        <input type="text" name="numero_os" id="modal_Numero_da_Os" placeholder="">
      </div>
      <!-- <div class="Ordem_Servico">
        <label for="Data_de_Abertura">Data de Abertura</label>
        <input type="text" name="data_de_abertura" id="modal_Data_de_Abertura" placeholder="">
      </div> -->
      <div class="Ordem_Servico">
        <label for="Tipo_de_equipamento">Tipo de Equipamento</label>
        <input type="text" name="tipo_equipamento" id="modal_Tipo_de_equipamento" placeholder="">
      </div>
      <div class="Ordem_Servico">
        <label for="Nome_do_Cliente">Nome do Cliente</label>
        <input type="text" name="nome_cliente" id="modal_Nome_do_Cliente" placeholder="">
      </div>
      <div class="Ordem_Servico">
        <label for="Email">Email</label>
        <input type="email" name="email_cliente" id="modal_Email" placeholder="">
      </div>
      <div class="Ordem_Servico">
        <label for="Marca_e_modelo">Marca e Modelo</label>
        <input type="text" name="marca_modelo" id="modal_Marca_e_modelo" placeholder="">
      </div>
      <div class="Ordem_Servico">
        <label for="Telefone">Telefone</label>
        <input type="tel" name="telefone" id="modal_Telefone" placeholder="">
      </div>
      <div class="Ordem_Servico">
        <label for="Endereco">Endereço</label>
        <input type="text" name="endereco" id="modal_Endereco" placeholder="">
      </div>
      <div class="Ordem_Servico">
        <label for="CEP">CEP</label>
        <input type="number" name="cep" id="modal_CEP" placeholder="">
      </div>
      <div class="Ordem_Servico">
        <label for="Numero_de_série">Número de Série</label>
        <input type="text" name="numero_serie" id="modal_Numero_de_serie" placeholder="">
      </div>
      <div class="Ordem_Servico">
        <label for="Acessorios_entregues">Acessórios Entregues</label>
        <input type="text" name="acessorios_entregues" id="modal_Acessorios_entregues" placeholder="">
      </div>
      <div class="Ordem_Servico">
        <label for="Relato_do_cliente">Relato do Cliente</label>
        <input type="text" name="relato_cliente" id="modal_Relato_do_cliente" placeholder="">
      </div>
      <div class="Ordem_Servico">
        <label for="Parecer_Tecnico">Técnico Responsável</label>
        <input type="text" name="tecnico_responsavel" id="modal_Parecer_Tecnico" placeholder="">
      </div>
      <div class="Ordem_Servico">
        <label for="Servicos_solicitados">Serviços Solicitados</label>
        <input type="text" name="servicos_solicitados" id="modal_Servicos_solicitados" placeholder="">
      </div>
      <div class="Ordem_Servico">
        <label for="Estimativa_de_custo">Estimativa de Custo</label>
        <input type="number" name="estimativa_custo" id="modal_Estimativa_de_custo" placeholder="">
      </div>
      <div class="Ordem_Servico">
        <label for="Aprovacao_do_Cliente">Aprovação do Cliente</label>
        <input type="text" name="aprovacao_cliente" id="modal_Aprovacao_do_Cliente" placeholder="">
      </div>
      <div class="Ordem_Servico">
        <label for="Servicos_realizados">Serviços Realizados</label>
        <input type="text" name="servicos_realizados" id="modal_Servicos_realizados" placeholder="">
      </div>
      <div class="Ordem_Servico">
        <label for="Pecas_substituidas">Peças Substituídas</label>
        <input type="text" name="pecas_substituidas" id="modal_Pecas_substituidas" placeholder="">
      </div>
      <div class="Ordem_Servico">
        <label for="Testes_realizados">Testes Realizados</label>
        <input type="text" name="testes_realizados" id="modal_Testes_realizados" placeholder="">
      </div>
      <div class="Ordem_Servico">
        <label for="Data_de_conclusao">Data de Conclusão</label>
        <input type="date" name="data_conclusao" id="modal_Data_de_conclusao" placeholder="">
      </div>
      <div class="Ordem_Servico">
        <label for="Observacoes">Observações</label>
        <input type="text" name="observacoes" id="modal_Observacoes" placeholder="">
      </div>

      <div class="editar-os-modal-buttons">
        <button type="button" class="btn_cancelar" onclick="cancelAndGoBack()">Cancelar</button>
        <button type="submit" class="btn_salvar">Salvar Alterações</button>
      </div>
    </form>
  </div>
</div>





<body class="manutencao-body">
<?php include __DIR__.'/../../../../includes/head-adm.php'; ?>
<?php include __DIR__.'/../../../../includes/sidebar-Adm.php'; ?>
        <div class="manutencao-container">
          
            <section class="manutencao-section">
                <h1>Manutenções</h1>

              <div class="manutencoes-cards">
                <div class="manutencao-card">
                  <p class="manutencoes-total">Total</p>
                  <p><?= $totais['total'] ?></p>
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
              </div>

                
            </section>
        
            
            <nav class="manutencao-tabs">
                <a href="adm-manutencao.php" class="">Ordem de serviço</a>
                <a href="adm-manutencao-enviados.php" class="active">Finalizadas</a>
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
    
            <!-- <div class="pagination">
                <button onclick="showPage(1)">1</button>
                <button onclick="showPage(2)">2</button>
            </div> -->
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


</html>