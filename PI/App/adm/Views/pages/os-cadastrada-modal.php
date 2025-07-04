<?php include __DIR__.'/../../../../includes/headernavb.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Ordem de Serviço</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="../../../../public/css/ordem-servico.css" />
 
</head>
<body>

<?php include __DIR__.'/../../../../includes/head-adm.php'; ?>
<?php include __DIR__.'/../../../../includes/sidebar-Adm.php'; ?>

<a href="orcamento-aceitos.php" class="btn-voltar">← Voltar</a>
<h1 class="os-title">Ordem de Serviço</h1>

<div class="search-container">
    <input type="text" id="filtroOS" placeholder="Buscar O.S., cliente, equipamento..." />
</div>

<div class="servicos-table">
    <table>
        <thead>
            <tr>
                <th>Número da OS</th>
                <th>Data de Abertura</th>
                <th>Tipo de Equipamento</th>
                <th>Nome do Cliente</th>
                <th>Email</th>
                <th>Marca e Modelo</th>
            </tr>
        </thead>
        <tbody id="page-1" class="product-page">
            <tr>
                <td>1234</td>
                <td>21/08/2024</td>
                <td>Monitor</td>
                <td>João Silva</td>
                <td>joao@email.com</td>
                <td>LG 27UL850</td>
            </tr>
            <tr>
                <td>5678</td>
                <td>05/07/2024</td>
                <td>Computador</td>
                <td>Maria Oliveira</td>
                <td>maria@email.com</td>
                <td>Dell Inspiron 15</td>
            </tr>
            <tr>
                <td>9101</td>
                <td>08/03/2024</td>
                <td>Mouse</td>
                <td>Pedro Costa</td>
                <td>pedro@email.com</td>
                <td>Razer DeathAdder</td>
            </tr>
        </tbody>
    </table>
</div>

<!-- Modal principal -->
<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <h2>Detalhes da Ordem de Serviço</h2>
    <p><strong>Número da OS:</strong> <span id="osNumber"></span></p>
    <p><strong>Data de Abertura:</strong> <span id="openDate"></span></p>
    <p><strong>Tipo de Equipamento:</strong> <span id="equipmentType"></span></p>
    <p><strong>Nome do Cliente:</strong> <span id="customerName"></span></p>
    <p><strong>Email:</strong> <span id="customerEmail"></span></p>
    <p><strong>Marca e Modelo:</strong> <span id="brandModel"></span></p>
    <button id="btnEditarOS" class="btn-editar">Editar</button>
  </div>
</div>

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
      
    
      <div class="editar-os-modal-buttons">
        <button type="button" class="btn_cancelar" onclick="cancelAndGoBack()">Cancelar</button>
        <button type="button" class="btn_salvar" onclick="saveChanges()">Salvar Alterações</button>
      </div>
    </form>
  </div>
</div>


<script>
document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('myModal');
    const editarModal = document.getElementById('editar-os-modal');
    const spanClose = modal.querySelector('.close');
    const spanEditarClose = editarModal.querySelector('.editar-os-modal-close');
    const btnEditarOS = document.getElementById('btnEditarOS');
    const btnCancelarEditar = editarModal.querySelector('.btn_cancelar');
    const formEditar = document.getElementById('editar-os-form');

    const tableRows = document.querySelectorAll('.servicos-table table tbody tr');

    // Abrir modal principal com dados ao dar duplo clique
    tableRows.forEach(function(row) {
        row.addEventListener('dblclick', function() {
            document.querySelectorAll('.modal, .editar-os-modal').forEach(m => m.style.display = 'none');

            document.getElementById('osNumber').textContent = row.cells[0].textContent;
            document.getElementById('openDate').textContent = row.cells[1].textContent;
            document.getElementById('equipmentType').textContent = row.cells[2].textContent;
            document.getElementById('customerName').textContent = row.cells[3].textContent;
            document.getElementById('customerEmail').textContent = row.cells[4].textContent;
            document.getElementById('brandModel').textContent = row.cells[5].textContent;

            modal.style.display = 'flex';
        });
    });

    // Fechar modal principal
    if(spanClose) {
        spanClose.addEventListener('click', () => modal.style.display = 'none');
    }

    // Fechar modal edição
    if(spanEditarClose) {
        spanEditarClose.addEventListener('click', () => editarModal.style.display = 'none');
    }
    if(btnCancelarEditar) {
        btnCancelarEditar.addEventListener('click', () => editarModal.style.display = 'none');
    }

    // Abrir modal edição ao clicar no botão editar
    btnEditarOS.addEventListener('click', () => {
        modal.style.display = 'none';
        editarModal.style.display = 'flex';

        // Preencher campos do formulário com dados do modal principal
        document.getElementById('modal_Numero_da_Os').value = document.getElementById('osNumber').textContent;
        document.getElementById('modal_Data_de_Abertura').value = document.getElementById('openDate').textContent;
        document.getElementById('modal_Tipo_de_equipamento').value = document.getElementById('equipmentType').textContent;
        document.getElementById('modal_Nome_do_Cliente').value = document.getElementById('customerName').textContent;
        document.getElementById('modal_Email').value = document.getElementById('customerEmail').textContent;
        document.getElementById('modal_Marca_e_modelo').value = document.getElementById('brandModel').textContent;
    });

    // Fechar modais clicando fora do conteúdo
    window.addEventListener('click', event => {
        if(event.target === modal) modal.style.display = 'none';
        if(event.target === editarModal) editarModal.style.display = 'none';
    });

    // Filtro de busca
    document.getElementById('filtroOS').addEventListener('keyup', function () {
        const filtro = this.value.toLowerCase();
        tableRows.forEach(function(row) {
            row.style.display = row.textContent.toLowerCase().includes(filtro) ? '' : 'none';
        });
    });

    // Aqui você pode adicionar o handler do submit para salvar alterações se quiser
    formEditar.addEventListener('submit', function(e) {
        e.preventDefault();
        alert('Salvar alterações ainda não implementado.');
        // Fechar modal edição após salvar, se quiser:
        // editarModal.style.display = 'none';
    });
});
</script>

<?php include __DIR__.'/../../../../includes/footer-adm.php'; ?>
</body>
</html>
