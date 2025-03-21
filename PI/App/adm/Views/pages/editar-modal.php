<!DOCTYPE html>
<html lang="pt-br">
<head>
  <?php include __DIR__.'/../../../../includes/headernavb.php'; ?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar OS</title>

 <script>
  function openModal() {
    document.getElementById('editar-os-modal').style.display = 'block';
  }
  function closeModal() {
    document.getElementById('editar-os-modal').style.display = 'none';
  }
  function cancelAndGoBack() {
    closeModal(); // Fecha o modal
    window.history.back(); // Volta para a página anterior
  }

  // Função para atualizar o valor do progresso
  function updateProgresso(value) {
    document.getElementById('progresso-valor').textContent = value + '%';
  }

  // Função para salvar as alterações
  function saveChanges() {
    alert("Alterações salvas com sucesso!");
    closeModal(); // Fecha o modal
  }

  // Abre o modal automaticamente ao carregar a página
  window.onload = function() {
    openModal();
  };
</script>


  </script>
</head>
<body class="OrdemSevico">

  <!-- Modal de Edição -->
  <div id="editar-os-modal" class="editar-os-modal" style="display: none;"> <!-- Adicionei style="display: none;" para esconder inicialmente -->
    <div class="editar-os-modal-content">
      <span class="editar-os-modal-close" onclick="closeModal()">&times;</span>
      <h2 class="editar-os-modal-title">Editar Ordem de Serviço</h2>
      <form id="editar-os-form">
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
          <label for="Parecer_Tecnico">Parecer Técnico</label>
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

        <!-- Progresso -->
        <div class="editar-os-modal-progresso">
          <label for="progresso">Progresso da OS:</label>
          <input type="range" id="progresso" name="progresso" min="0" max="100" value="0" oninput="updateProgresso(this.value)">
          <span id="progresso-valor">0%</span>
        </div>
        
        <!-- Descrição do Progresso -->
        <div class="editar-os-modal-descricao">
          <label for="descricao_progresso">Descrição do Progresso:</label>
          <textarea id="descricao_progresso" name="descricao_progresso" placeholder="Digite o status do progresso" required></textarea>
        </div>
        
        <!-- Botões de Salvar e Cancelar -->
        <div class="editar-os-modal-buttons">
  <!-- Botão de Cancelar que fecha o modal e volta para a página anterior -->
  <button type="button" class="btn_cancelar" onclick="cancelAndGoBack()">Cancelar</button>
  
  <!-- Botão de Salvar -->
  <button type="button" class="btn_salvar" onclick="saveChanges()">Salvar Alterações</button>
</div>

      </form>
    </div>
  </div>

</body>
</html>
