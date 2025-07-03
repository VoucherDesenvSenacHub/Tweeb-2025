document.addEventListener('DOMContentLoaded', function () {
    const tableRows = document.querySelectorAll('.servicos-table table tbody tr');

    tableRows.forEach(function (row) {
        row.addEventListener('dblclick', function () {
            // Coleta os dados da linha
            const cells = row.querySelectorAll('td');
            const data = {
                numeroOS: cells[0]?.textContent || '',
                tipoEquipamento: cells[1]?.textContent || '',
                valor: cells[2]?.textContent || '',
                dataEntrada: cells[3]?.textContent || '',
                dataSaida: cells[4]?.textContent || '',
                status: cells[5]?.textContent || '',
                nomeCliente: 'Josivaldo Arantes',
                email: 'josivaldo@gmail.com',
                marcaModelo: 'Indefinido',
                telefone: '(11) 98765-4321',
                endereco: 'Rua das Flores, 123 - São Paulo, SP',
                cep: '12345-678',
                numeroSerie: 'SN987654321',
                acessorios: 'Cabo de alimentação, Toner',
                relatoCliente: 'A impressora não está ligando',
                parecerTecnico: 'Fonte de alimentação danificada',
                servicosSolicitados: 'Troca da fonte e revisão geral',
                estimativaCusto: 'R$ 350,00',
                aprovacaoCliente: 'Aprovado',
                servicosRealizados: 'Troca da fonte, limpeza interna',
                pecasSubstituidas: 'Fonte de alimentação',
                testesRealizados: 'Teste de impressão',
                dataConclusao: cells[4]?.textContent || '',
                observacoes: 'Garantia de 90 dias para a peça substituída'
            };

            // Cria o primeiro modal (resumo e botões)
            const modal = document.createElement('div');
            modal.classList.add('modal');
            modal.style.display = 'flex';

            const modalContent = document.createElement('div');
            modalContent.classList.add('modal-content');

            const closeBtn = document.createElement('span');
            closeBtn.classList.add('close');
            closeBtn.innerHTML = '&times;';
            closeBtn.addEventListener('click', () => modal.remove());

            const modalBody = document.createElement('div');
            modalBody.classList.add('modal-body');
            modalBody.innerHTML = `
                <p><strong>Número da OS:</strong> ${data.numeroOS}</p>
                <p><strong>Data de Abertura:</strong> ${data.dataEntrada}</p>
                <p><strong>Tipo de Equipamento:</strong> ${data.tipoEquipamento}</p> 
                <p><strong>Nome do Cliente:</strong> ${data.nomeCliente}</p>
                <p><strong>Email:</strong> ${data.email}</p>
                <p><strong>Marca e Modelo:</strong> ${data.marcaModelo}</p>
                <p><strong>Telefone:</strong> ${data.telefone}</p>
                <p><strong>Endereço:</strong> ${data.endereco}</p>
                <p><strong>CEP:</strong> ${data.cep}</p>
                <p><strong>Número de Série:</strong> ${data.numeroSerie}</p>
                <p><strong>Acessórios Entregues:</strong> ${data.acessorios}</p>
                <p><strong>Relato do Cliente:</strong> ${data.relatoCliente}</p>
                <p><strong>Técnico Responsável:</strong> ${data.parecerTecnico}</p>
                <p><strong>Serviços Solicitados:</strong> ${data.servicosSolicitados}</p>
                <p><strong>Estimativa de Custo:</strong> ${data.estimativaCusto}</p>
                <p><strong>Aprovação do Cliente:</strong> ${data.aprovacaoCliente}</p>
                <p><strong>Serviços Realizados:</strong> ${data.servicosRealizados}</p>
                <p><strong>Peças Substituídas:</strong> ${data.pecasSubstituidas}</p>
                <p><strong>Testes Realizados:</strong> ${data.testesRealizados}</p>
                <p><strong>Data de Conclusão:</strong> ${data.dataConclusao}</p>
                <p><strong>Observações:</strong> ${data.observacoes}</p>
            `;

            // Botões de ação
            const modalActions = document.createElement('div');
            modalActions.classList.add('modal-actions');

            const editLink = document.createElement('a');
            editLink.classList.add('btn', 'btn-edit');
            editLink.innerHTML = '<i class="fas fa-edit"></i> Editar';
            editLink.href = '#';
            Object.assign(editLink.style, {
                display: 'flex',
                alignItems: 'center',
                justifyContent: 'center',
                gap: '6px',
                padding: '8px 12px',
                textDecoration: 'none',
                color: 'inherit'
            });

            editLink.onclick = function (e) {
                e.preventDefault();
                modal.remove(); // fecha o primeiro modal

                // Preenche o modal de edição
                document.getElementById('modal_Numero_da_Os').value = data.numeroOS;
                document.getElementById('modal_Data_de_Abertura').value = data.dataEntrada;
                document.getElementById('modal_Tipo_de_equipamento').value = data.tipoEquipamento;
                document.getElementById('modal_Nome_do_Cliente').value = data.nomeCliente;
                document.getElementById('modal_Email').value = data.email;
                document.getElementById('modal_Marca_e_modelo').value = data.marcaModelo;
                document.getElementById('modal_Telefone').value = data.telefone;
                document.getElementById('modal_Endereco').value = data.endereco;
                document.getElementById('modal_CEP').value = data.cep;
                document.getElementById('modal_Numero_de_série').value = data.numeroSerie;
                document.getElementById('modal_Acessorios_entregues').value = data.acessorios;
                document.getElementById('modal_Relato_do_cliente').value = data.relatoCliente;
                document.getElementById('modal_Parecer_Tecnico').value = data.parecerTecnico;
                document.getElementById('modal_Serviços_solicitados').value = data.servicosSolicitados;
                document.getElementById('modal_Estimativa_de_custo').value = data.estimativaCusto;
                document.getElementById('modal_Aprovação_do_Cliente').value = data.aprovacaoCliente;
                document.getElementById('modal_Serviços_realizados').value = data.servicosRealizados;
                document.getElementById('modal_Peças_substituidas').value = data.pecasSubstituidas;
                document.getElementById('modal_Testes_realizados').value = data.testesRealizados;
                document.getElementById('modal_Data_de_conclusao').value = data.dataConclusao;
                document.getElementById('modal_Observacoes').value = data.observacoes;

                openModal(); // chama modal principal
            };

            // Botão excluir (aqui só fecha por enquanto)
            const deleteButton = document.createElement('button');
            deleteButton.classList.add('btn', 'btn-delete');
            deleteButton.innerHTML = '<i class="fas fa-trash-alt"></i> Excluir';
            deleteButton.onclick = function () {
                const confirmDelete = confirm('Tem certeza que deseja excluir esta O.S.?');
                if (confirmDelete) {
                    row.remove(); // Remove a linha da tabela
                    modal.remove(); // Fecha o modal
                    // Aqui você pode adicionar um fetch/AJAX se quiser excluir do banco
                    // Exemplo:
                    // fetch('excluir-os.php', {
                    //     method: 'POST',
                    //     body: JSON.stringify({ os: data.numeroOS }),
                    //     headers: { 'Content-Type': 'application/json' }
                    // }).then(res => res.json()).then(response => {
                    //     console.log(response);
                    // });
                }
            };
            
            modalActions.appendChild(editLink);
            modalActions.appendChild(deleteButton);

            modalContent.appendChild(closeBtn);
            modalContent.appendChild(modalBody);
            modalContent.appendChild(modalActions);

            modal.appendChild(modalContent);
            document.body.appendChild(modal);

            // Fecha se clicar fora
            window.addEventListener('click', function (event) {
                if (event.target === modal) {
                    modal.remove();
                }
            });
        });
    });
});
