document.addEventListener('DOMContentLoaded', function () {
    const tableRows = document.querySelectorAll('.servicos-table table tbody tr');
    let rowDataTemp = null;

    tableRows.forEach(function (row) {
        row.addEventListener('click', function () {
            if (window.innerWidth <= 768) {
                rowDataTemp = row;
                document.getElementById('modal-simplificado').style.display = 'flex';
            }
        });

        row.addEventListener('dblclick', function () {
            if (window.innerWidth > 768) {
                abrirDetalhesOS(row);
            }
        });
    });

    document.getElementById('btn-ver-detalhes').addEventListener('click', function () {
        fecharModalSimplificado();
        if (rowDataTemp) {
            abrirDetalhesOS(rowDataTemp);
        }
    });

    function fecharModalSimplificado() {
        document.getElementById('modal-simplificado').style.display = 'none';
    }

    const editarForm = document.getElementById('editar-os-form');
    if (editarForm) {
        editarForm.addEventListener('submit', function (event) {
            event.preventDefault();
            const editarModal = document.getElementById('editar-os-modal');
            if (editarModal) editarModal.style.display = 'none';

            Swal.fire({
                title: 'Tem certeza?',
                text: "Deseja salvar as alterações?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Sim, salvar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'Sucesso!',
                        text: 'Modificações salvas com sucesso!',
                        icon: 'success',
                        timer: 2000,
                        showConfirmButton: false
                    });
                    setTimeout(() => editarForm.submit(), 2000);
                } else {
                    editarModal.style.display = 'flex';
                }
            });
        });
    }

    function abrirDetalhesOS(row) {
        const cells = row.querySelectorAll('td');
        const data = {
            numeroOS: row.dataset.id,
            tipoEquipamento: row.dataset.tipo_equipamento,
            valor: row.dataset.estimativa_custo,
            dataEntrada: cells[3]?.textContent || '',
            dataSaida: row.dataset.data_conclusao,
            status: cells[5]?.textContent || '',
            nomeCliente: row.dataset.nome_cliente,
            email: row.dataset.email_cliente,
            marcaModelo: row.dataset.marca_modelo,
            telefone: row.dataset.telefone,
            endereco: row.dataset.endereco,
            cep: row.dataset.cep,
            numeroSerie: row.dataset.numero_serie,
            acessorios: row.dataset.acessorios_entregues,
            relatoCliente: row.dataset.relato_cliente,
            parecerTecnico: row.dataset.nome_tecnico,
            servicosSolicitados: row.dataset.servicos_solicitados,
            estimativaCusto: row.dataset.estimativa_custo,
            aprovacaoCliente: row.dataset.aprovacao_cliente,
            servicosRealizados: row.dataset.servicos_realizados,
            pecasSubstituidas: row.dataset.pecas_substituidas,
            testesRealizados: row.dataset.testes_realizados,
            dataConclusao: row.dataset.data_conclusao,
            observacoes: row.dataset.observacoes
        };

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

        if (data.status === 'Finalizada') {
            editLink.style.pointerEvents = 'none';
            editLink.style.opacity = '0.0';
            editLink.title = 'Ordem finalizada não pode ser editada';
        } else {
            editLink.onclick = function (e) {
                e.preventDefault();
                modal.remove();
                document.getElementById('modal_id_os').value = data.numeroOS;
                document.getElementById('modal_Numero_da_Os').value = data.numeroOS;
                document.getElementById('modal_Tipo_de_equipamento').value = data.tipoEquipamento;
                document.getElementById('modal_Nome_do_Cliente').value = data.nomeCliente;
                document.getElementById('modal_Email').value = data.email;
                document.getElementById('modal_Marca_e_modelo').value = data.marcaModelo;
                document.getElementById('modal_Telefone').value = data.telefone;
                document.getElementById('modal_Endereco').value = data.endereco;
                document.getElementById('modal_CEP').value = data.cep;
                document.getElementById('modal_Numero_de_serie').value = data.numeroSerie;
                document.getElementById('modal_Acessorios_entregues').value = data.acessorios;
                document.getElementById('modal_Relato_do_cliente').value = data.relatoCliente;
                document.getElementById('modal_Parecer_Tecnico').value = data.parecerTecnico;
                document.getElementById('modal_Servicos_solicitados').value = data.servicosSolicitados;
                document.getElementById('modal_Estimativa_de_custo').value = data.estimativaCusto;
                document.getElementById('modal_Aprovacao_do_Cliente').value = data.aprovacaoCliente;
                document.getElementById('modal_Servicos_realizados').value = data.servicosRealizados;
                document.getElementById('modal_Pecas_substituidas').value = data.pecasSubstituidas;
                document.getElementById('modal_Testes_realizados').value = data.testesRealizados;
                document.getElementById('modal_Data_de_conclusao').value = data.dataConclusao;
                document.getElementById('modal_Observacoes').value = data.observacoes;
                document.getElementById('editar-os-modal').style.display = 'flex';
            };
        }

        const deleteButton = document.createElement('a');
        deleteButton.classList.add('btn', 'btn-delete');
        deleteButton.innerHTML = '<i class="fas fa-trash-alt"></i> Excluir';
        deleteButton.href = `adm-manutencao_excluir.php?id_os=${data.numeroOS}`;
        Object.assign(deleteButton.style, {
            display: 'flex',
            alignItems: 'center',
            justifyContent: 'center',
            gap: '6px',
            padding: '8px 12px',
            textDecoration: 'none',
            color: 'inherit'
        });

        deleteButton.onclick = function (e) {
            e.preventDefault();
            Swal.fire({
                title: 'Tem certeza?',
                text: 'Deseja excluir esta O.S.?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sim, excluir!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = `adm-manutencao_excluir.php?id_os=${data.numeroOS}`;
                }
            });
        };

        modalActions.appendChild(editLink);
        modalActions.appendChild(deleteButton);

        modalContent.appendChild(closeBtn);
        modalContent.appendChild(modalBody);
        modalContent.appendChild(modalActions);

        modal.appendChild(modalContent);
        document.body.appendChild(modal);

        window.addEventListener('click', function (event) {
            if (event.target === modal) {
                modal.remove();
            }
        });
    }
});
