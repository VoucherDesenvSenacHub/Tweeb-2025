<?php
session_start();

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
    <h2 class="editar-os-modal-title">Editar Ordem de Serviço</h2>
    <form id="editar-os-form">

    <h2 class="editar-os-modal-title">Editar Ordem de Serviço</h2><br><br>
   

        <div class="Ordem_Servico">
          <label for="Numero_da_Os">Número da OS</label>
          <input type="text" name="Numero_da_Os" id="modal_Numero_da_Os" placeholder="">
        </div>
        <div class="Ordem_Servico">
          <label for="Data_de_Abertura">Data de Abertura</label>
          <input type="text" name="Data_de_Abertura" id="modal_Data_de_Abertura" placeholder="">
        </div>
        <div class="Ordem_Servico">
          <label for="Tipo_de_equipamento">Tipo de Equipamento</label>
          <input type="text" name="Tipo_de_equipamento" id="modal_Tipo_de_equipamento" placeholder="">
        </div>
        <div class="Ordem_Servico">
          <label for="Nome_do_Cliente">Nome do Cliente</label>
          <input type="text" name="Nome_do_Cliente" id="modal_Nome_do_Cliente" placeholder="">
        </div>
        <div class="Ordem_Servico">
          <label for="Email">Email</label>
          <input type="text" name="Email" id="modal_Email" placeholder="">
        </div>
        <div class="Ordem_Servico">
          <label for="Marca_e_modelo">Marca e Modelo</label>
          <input type="text" name="Marca_e_modelo" id="modal_Marca_e_modelo" placeholder="">
        </div>
        <div class="Ordem_Servico">
          <label for="Telefone">Telefone</label>
          <input type="text" name="Telefone" id="modal_Telefone" placeholder="">
        </div>
        <div class="Ordem_Servico">
          <label for="Endereco">Endereço</label>
          <input type="text" name="Endereco" id="modal_Endereco" placeholder="">
        </div>
        <div class="Ordem_Servico">
          <label for="CEP">CEP</label>
          <input type="text" name="CEP" id="modal_CEP" placeholder="">
        </div>
        <div class="Ordem_Servico">
          <label for="Numero_de_série">Número de Série</label>
          <input type="text" name="Numero_de_série" id="modal_Numero_de_série" placeholder="">
        </div>
        <div class="Ordem_Servico">
          <label for="Acessorios_entregues">Acessórios Entregues</label>
          <input type="text" name="Acessorios_entregues" id="modal_Acessorios_entregues" placeholder="">
        </div>
        <div class="Ordem_Servico">
          <label for="Relato_do_cliente">Relato do Cliente</label>
          <input type="text" name="Relato_do_cliente" id="modal_Relato_do_cliente" placeholder="">
        </div>
        <div class="Ordem_Servico">
          <label for="Parecer_Tecnico">Técnico Responsável</label>
          <input type="text" name="Parecer_Tecnico" id="modal_Parecer_Tecnico" placeholder="">
        </div>
        <div class="Ordem_Servico">
          <label for="Serviços_solicitados">Serviços Solicitados</label>
          <input type="text" name="Serviços_solicitados" id="modal_Serviços_solicitados" placeholder="">
        </div>
        <div class="Ordem_Servico">
          <label for="Estimativa_de_custo">Estimativa de Custo</label>
          <input type="text" name="Estimativa_de_custo" id="modal_Estimativa_de_custo" placeholder="">
        </div>
        <div class="Ordem_Servico">
          <label for="Aprovação_do_Cliente">Aprovação do Cliente</label>
          <input type="text" name="Aprovação_do_Cliente" id="modal_Aprovação_do_Cliente" placeholder="">
        </div>
        <div class="Ordem_Servico">
          <label for="Serviços_realizados">Serviços Realizados</label>
          <input type="text" name="Serviços_realizados" id="modal_Serviços_realizados" placeholder="">
        </div>
        <div class="Ordem_Servico">
          <label for="Peças_substituidas">Peças Substituídas</label>
          <input type="text" name="Peças_substituidas" id="modal_Peças_substituidas" placeholder="">
        </div>
        <div class="Ordem_Servico">
          <label for="Testes_realizados">Testes Realizados</label>
          <input type="text" name="Testes_realizados" id="modal_Testes_realizados" placeholder="">
        </div>
        <div class="Ordem_Servico">
          <label for="Data_de_conclusao">Data de Conclusão</label>
          <input type="text" name="Data_de_conclusao" id="modal_Data_de_conclusao" placeholder="">
        </div>
        <div class="Ordem_Servico">
          <label for="Observacoes">Observações</label>
          <input type="text" name="Observacoes" id="modal_Observacoes" placeholder="">
        </div>
      
    
      <div class="editar-os-modal-buttons">
        <button type="button" class="btn_cancelar" onclick="cancelAndGoBack()">Cancelar</button>
        <button type="button" class="btn_salvar" onclick="saveChanges()">Salvar Alterações</button>
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
                        <p>37</p>
                    </div>
    
                    <div class="manutencao-card">
                        <p class="manutencoes-andamento">Em andamento</p>
                        <p>32</p>
                    </div>
    
                    <div class="manutencao-card">
                        <p class="manutencoes-finalizadas">Finalizadas</p>
                        <p>5</p>
                    </div>
                </div>

                
            </section>
        
            
            <nav class="manutencao-tabs">
                <a href="" class="active">Ordem de serviço</a>
                <a href="adm-manutencao-enviados.php">Finalizadas</a>
            </nav>
            
            <div class="manutencao-actions">
            <a href="#" class="pedidos-adicionar-envio" onclick="openModal(); return false;">
                <img src="../../../../public/assets/img/plus-circle.svg" alt="Adicionar OS">
                <p>Editar OS</p>
            </a>


                <!-- <div class="pedidos-adicionar-envio">
                    <img src="../../../../public/assets/img/plus-circle.svg" alt="">
                    <p>Editar OS</p>
                </div> -->

                <div class="pedidos-adicionar-envio" onclick="window.location.href='OrdemdeServico.php';">
                        <img src="../../../../public/assets/img/plus-circle.svg" alt="">
                        <p>Adicionar OS</p>
                </div>
  
            </div>
        <div class="servicos-table">
            <h1>Ordem de serviço</h1>
            <table>
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Produto</th>
                        <th>Valor</th>
                        <th>Entrada</th>
                        <th>Saída</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody id="page-1" class="product-page">
                    <tr>
                        <td>5724</td>
                        <td>Monitor</td>
                        <td>R$ 2557</td>
                        <td>20/08/24</td>
                        <td>21/08/24</td>
                        <td class="entregue">Entregue</td>
                    </tr>
                    <tr>
                        <td>2775</td>
                        <td>Computador Gamer</td>
                        <td>R$ 4075</td>
                        <td>03/07/24</td>
                        <td>05/07/24</td>
                        <td class="garantia">Retorno Garantia</td>
                    </tr>
                    <tr>
                        <td>2275</td>
                        <td>Mouse Gamer</td>
                        <td>R$ 5052</td>
                        <td>06/03/24</td>
                        <td>08/03/24</td>
                        <td class="andamento">Em andamento</td>
                    </tr>

                    <tr>
                        <td>2275</td>
                        <td>Mouse Gamer</td>
                        <td>R$ 5052</td>
                        <td>07/03/24</td>
                        <td>08/03/24</td>
                        <td class="andamento">Em andamento</td>
                    </tr>

                    <tr>
                        <td>2275</td>
                        <td>Mouse Gamer</td>
                        <td>R$ 5052</td>
                        <td>06/03/24</td>
                        <td>08/03/24</td>
                        <td class="atrasado">Atrasado</td>
                    </tr>
                    <tr>
                        <td>7535</td>
                        <td>Notebook Dell</td>
                        <td>R$ 4306</td>
                        <td>09/08/24</td>
                        <td>11/08/24</td>
                        <td class="atrasado">Atrasado</td>
                    </tr>
                    <tr>
                        <td>5724</td>
                        <td>Monitor</td>
                        <td>R$ 2557</td>
                        <td>18/08/24</td>
                        <td>21/08/24</td>
                        <td class="entregue">Entregue</td>
                    </tr>
                    <tr>
                        <td>2775</td>
                        <td>Computador Gamer</td>
                        <td>R$ 4075</td>
                        <td>04/06/24</td>
                        <td>05/07/24</td>
                        <td class="garantia">Retorno Garantia</td>
                    </tr>
                    <tr>
                        <td>2275</td>
                        <td>Mouse Gamer</td>
                        <td>R$ 5052</td>
                        <td>06/03/24</td>
                        <td>08/03/24</td>
                        <td class="andamento">Em andamento</td>
                    </tr>

                    <tr>
                        <td>2275</td>
                        <td>Mouse Gamer</td>
                        <td>R$ 5052</td>
                        <td>05/03/24</td>
                        <td>08/03/24</td>
                        <td class="andamento">Em andamento</td>
                    </tr>

                    <tr>
                        <td>2275</td>
                        <td>Mouse Gamer</td>
                        <td>R$ 5052</td>
                        <td>06/03/24</td>
                        <td>8/03/24</td>
                        <td class="atrasado">Atrasado</td>
                    </tr>

                   
                </tbody>
                <tbody id="page-2" class="product-page" style="display: none;">
                    <tr>
                        <td>Teclado Mecânico</td>
                        <td>R$ 329</td>
                        <td>50 Unidades</td>
                        <td>8923</td>
                        <td>12/09/24</td>
                        <td class="entregue">Entregue</td>
                    </tr>
                    <tr>
                        <td>Headset Gamer</td>
                        <td>R$ 499</td>
                        <td>30 Unidades</td>
                        <td>7123</td>
                        <td>15/09/24</td>
                        <td class="andamento">Em andamento</td>
                    </tr>
                    <tr>
                        <td>Placa de Vídeo RTX</td>
                        <td>R$ 3599</td>
                        <td>20 Unidades</td>
                        <td>6201</td>
                        <td>20/09/24</td>
                        <td class="garantia">Retorno Garantia</td>
                    </tr>
                    <tr>
                        <td>SSD NVMe 1TB</td>
                        <td>R$ 850</td>
                        <td>40 Unidades</td>
                        <td>4902</td>
                        <td>25/09/24</td>
                        <td class="atrasado">Atrasado</td>
                    </tr>
                </tbody>
            </table>
        </div>
    
            <div class="pagination">
                <button onclick="showPage(1)">1</button>
                <button onclick="showPage(2)">2</button>
            </div>
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

            
    
</body>

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
function updateProgresso(value) {
  document.getElementById('progresso-valor').textContent = value + '%';
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



</script>
</html>