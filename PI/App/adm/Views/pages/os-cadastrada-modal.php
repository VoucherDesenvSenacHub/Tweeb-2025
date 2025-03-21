<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ordem de Serviço</title>
    <style>
        /* Estilo da Tabela */
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }

    /* Importando a fonte Montserrat */
body {
    font-family: 'Montserrat', sans-serif;
}

/* Estilo do Modal */
.modal {
    display: none; /* Inicialmente oculto */
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.7); /* Fundo transparente */
    justify-content: center;
    align-items: center;
    z-index: 9999;
}

.modal-content {
    background-color: white;
    padding: 20px;
    border-radius: 10px;
    width: 90%; /* Menor largura */
    max-width: 600px; /* Limita a largura máxima */
    max-height: 80%;
    overflow-y: auto;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.modal-header {
    font-size: 1.5em;
    margin-bottom: 20px;
    text-align: center;
}

/* Fechar o modal */
.close {
    float: right;
    font-size: 1.5em;
    cursor: pointer;
}

.close:hover {
    color: red;
}

/* Estilo dos Inputs */
.modal-content p {
    margin: 10px 0;
    font-size: 1.1em;
}

.modal-content span {
    display: inline-block;
    width: 100%;
    padding-bottom: 5px;
    border-bottom: 1px solid #ddd;
}

/* Botões de Editar e Excluir */
.modal-actions {
    display: flex;
    justify-content: space-between;
    margin-top: 20px;
}

.btn {
    padding: 10px 15px;
    font-size: 1em;
    cursor: pointer;
    border: none;
    border-radius: 5px;
}

.btn-edit {
    background-color: #4CAF50;
    color: white;
}

.btn-delete {
    background-color: #f44336;
    color: white;
}

/* Ícones de Editar e Excluir */
.btn i {
    margin-right: 5px;
}

/* Responsividade para o modal */
@media (max-width: 768px) {
    .modal-content {
        width: 95%;
        padding: 15px;
    }

    .modal-header {
        font-size: 1.3em;
    }
}

@media (max-width: 480px) {
    .modal-content {
        width: 100%;
        padding: 10px;
    }

    .modal-header {
        font-size: 1.2em;
    }
}

    </style>
</head>
<body>

    <div class="servicos-table">
        <h1>Ordem de Serviço</h1>
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

    <!-- Modal -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="modal-header">
                <h2>Detalhes da Ordem de Serviço</h2>
            </div>
            <div id="modal-body">
            <p><strong>Número da OS:</strong> <span id="osNumber">12345</span></p>
            <p><strong>Data de Abertura:</strong> <span id="openDate">20/03/2025</span></p>
            <p><strong>Tipo de Equipamento:</strong> <span id="equipmentType">Impressora a Laser</span></p>
            <p><strong>Nome do Cliente:</strong> <span id="customerName">João Silva</span></p>
            <p><strong>Email:</strong> <span id="customerEmail">joao.silva@email.com</span></p>
            <p><strong>Marca e Modelo:</strong> <span id="brandModel">HP LaserJet Pro MFP M428fdw</span></p>
            <p><strong>Telefone:</strong> <span id="customerPhone">(11) 98765-4321</span></p>
            <p><strong>Endereço:</strong> <span id="customerAddress">Rua das Flores, 123 - São Paulo, SP</span></p>
            <p><strong>CEP:</strong> <span id="customerCEP">12345-678</span></p>
            <p><strong>Número de Série:</strong> <span id="serialNumber">SN987654321</span></p>
            <p><strong>Acessórios Entregues:</strong> <span id="accessoriesDelivered">Cabo de alimentação, Toner</span></p>
            <p><strong>Relato do Cliente:</strong> <span id="customerReport">A impressora não está ligando, suspeito de defeito na fonte.</span></p>
            <p><strong>Parecer Técnico:</strong> <span id="technicalOpinion">Fonte de alimentação danificada, necessitando de troca.</span></p>
            <p><strong>Serviços Solicitados:</strong> <span id="requestedServices">Troca da fonte de alimentação e revisão geral.</span></p>
            <p><strong>Estimativa de Custo:</strong> <span id="costEstimate">R$ 350,00</span></p>
            <p><strong>Aprovação do Cliente:</strong> <span id="customerApproval">Aprovado</span></p>
            <p><strong>Serviços Realizados:</strong> <span id="servicesPerformed">Troca da fonte de alimentação e limpeza interna.</span></p>
            <p><strong>Peças Substituídas:</strong> <span id="partsReplaced">Fonte de alimentação</span></p>
            <p><strong>Testes Realizados:</strong> <span id="testsPerformed">Teste de impressão e funcionalidade completa.</span></p>
            <p><strong>Data de Conclusão:</strong> <span id="completionDate">21/03/2025</span></p>
            <p><strong>Observações:</strong> <span id="observations">Garantia de 90 dias para a peça substituída.</span></p>

            </div>
        </div>
    </div>

    <script>
        // Espera o documento ser carregado
        document.addEventListener('DOMContentLoaded', function () {
            const tableRows = document.querySelectorAll('.servicos-table table tbody tr');
            const modal = document.getElementById('myModal');
            const spanClose = document.querySelector('.close');

            // Adiciona o evento de duplo clique nas linhas da tabela
            tableRows.forEach(function(row) {
                row.addEventListener('dblclick', function() {
                    // Obtém os dados da linha clicada
                    const osNumber = row.cells[0].textContent;
                    const openDate = row.cells[1].textContent;
                    const equipmentType = row.cells[2].textContent;
                    const customerName = row.cells[3].textContent;
                    const customerEmail = row.cells[4].textContent;
                    const brandModel = row.cells[5].textContent;

                    // Preenche o conteúdo do modal com os dados da linha
                    document.getElementById('osNumber').textContent = osNumber;
                    document.getElementById('openDate').textContent = openDate;
                    document.getElementById('equipmentType').textContent = equipmentType;
                    document.getElementById('customerName').textContent = customerName;
                    document.getElementById('customerEmail').textContent = customerEmail;
                    document.getElementById('brandModel').textContent = brandModel;

                    // Exibe o modal
                    modal.style.display = 'flex';
                });
            });

            // Quando o usuário clicar no botão de fechar, fecha o modal
            spanClose.addEventListener('click', function() {
                modal.style.display = 'none';
            });

            // Quando o usuário clicar fora do conteúdo do modal, fecha o modal
            window.addEventListener('click', function(event) {
                if (event.target === modal) {
                    modal.style.display = 'none';
                }
            });
        });
    </script>

</body>
</html>
