document.addEventListener('DOMContentLoaded', function () {
    // Seleciona todas as linhas da tabela
    const tableRows = document.querySelectorAll('.servicos-table table tbody tr');
    
    // Adiciona o evento de duplo clique a cada linha da tabela
    tableRows.forEach(function(row) {
        row.addEventListener('dblclick', function() {
            // Cria o modal dinamicamente
            const modal = document.createElement('div');
            modal.classList.add('modal');
            
            const modalContent = document.createElement('div');
            modalContent.classList.add('modal-content');
            
            // Criação do botão de fechar
            const closeBtn = document.createElement('span');
            closeBtn.classList.add('close');
            closeBtn.innerHTML = '&times;';
            closeBtn.addEventListener('click', function() {
                modal.style.display = 'none'; // Fecha o modal
            });
            
            modalContent.appendChild(closeBtn);
            
            // Preencher o conteúdo do modal com os dados da linha selecionada
            const cells = row.querySelectorAll('td');
            const data = {
                numeroOS: cells[0].textContent, // Número da OS
                dataAbertura: cells[1].textContent, // Data de Abertura
                tipoEquipamento: cells[2].textContent, // Tipo de Equipamento
                nomeCliente: cells[3].textContent, // Nome do Cliente
                email: cells[4].textContent, // Email
                marcaModelo: cells[5].textContent, // Marca e Modelo
                // Aqui você pode adicionar mais dados conforme necessário
            };
            
            // Criar os dados no modal
            const modalBody = document.createElement('div');
            modalBody.classList.add('modal-body');
            modalBody.innerHTML = `
                <p><strong>Número da OS:</strong> ${data.numeroOS}</p>
                <p><strong>Data de Abertura:</strong> ${data.dataAbertura}</p>
                <p><strong>Tipo de Equipamento:</strong> ${data.tipoEquipamento}</p>
                <p><strong>Nome do Cliente:</strong> ${data.nomeCliente}</p>
                <p><strong>Email:</strong> ${data.email}</p>
                <p><strong>Marca e Modelo:</strong> ${data.marcaModelo}</p>
                <p><strong>Telefone:</strong> (Exemplo: (11) 98765-4321)</p>
                <p><strong>Endereço:</strong> (Exemplo: Rua das Flores, 123 - São Paulo, SP)</p>
                <p><strong>CEP:</strong> (Exemplo: 12345-678)</p>
                <p><strong>Número de Série:</strong> (Exemplo: SN987654321)</p>
                <p><strong>Acessórios Entregues:</strong> (Exemplo: Cabo de alimentação, Toner)</p>
                <p><strong>Relato do Cliente:</strong> (Exemplo: A impressora não está ligando, suspeito de defeito na fonte)</p>
                <p><strong>Parecer Técnico:</strong> (Exemplo: Fonte de alimentação danificada, necessitando de troca)</p>
                <p><strong>Serviços Solicitados:</strong> (Exemplo: Troca da fonte de alimentação e revisão geral)</p>
                <p><strong>Estimativa de Custo:</strong> (Exemplo: R$ 350,00)</p>
                <p><strong>Aprovação do Cliente:</strong> (Exemplo: Aprovado)</p>
                <p><strong>Serviços Realizados:</strong> (Exemplo: Troca da fonte de alimentação e limpeza interna)</p>
                <p><strong>Peças Substituídas:</strong> (Exemplo: Fonte de alimentação)</p>
                <p><strong>Testes Realizados:</strong> (Exemplo: Teste de impressão e funcionalidade completa)</p>
                <p><strong>Data de Conclusão:</strong> (Exemplo: 21/03/2025)</p>
                <p><strong>Observações:</strong> (Exemplo: Garantia de 90 dias para a peça substituída)</p>
            `;
            
            modalContent.appendChild(modalBody);
            
            // Botões de Ação (Editar e Excluir)
            const modalActions = document.createElement('div');
            modalActions.classList.add('modal-actions');
            
            const editButton = document.createElement('button');
            editButton.classList.add('btn', 'btn-edit');
            editButton.innerHTML = '<i class="fas fa-edit"></i> Editar';
            
            const deleteButton = document.createElement('button');
            deleteButton.classList.add('btn', 'btn-delete');
            deleteButton.innerHTML = '<i class="fas fa-trash-alt"></i> Excluir';
            
            modalActions.appendChild(editButton);
            modalActions.appendChild(deleteButton);
            
            modalContent.appendChild(modalActions);
            
            // Adiciona o conteúdo do modal no corpo da página
            modal.appendChild(modalContent);
            document.body.appendChild(modal);
            
            // Exibe o modal
            modal.style.display = 'flex';
            
            // Fecha o modal se clicar fora da área de conteúdo
            window.addEventListener('click', function(event) {
                if (event.target === modal) {
                    modal.style.display = 'none';
                }
            });
        });
    });
});
