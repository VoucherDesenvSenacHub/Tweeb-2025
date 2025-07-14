// rastreio.js
// Este arquivo contém a lógica JavaScript para a tela de rastreio de pedidos.

/**
 * Função para alternar a visibilidade dos detalhes de um pedido.
 * @param {HTMLElement} button O botão "Acompanhar Pedido" clicado.
 */
function toggleDetalhes(button) {
    console.log('Função toggleDetalhes chamada!');
    
    // Encontra o container do pedido pai do botão clicado
    const container = button.closest('.container-rastreio');
    
    if (!container) {
        console.error('Container não encontrado!');
        return;
    }
    
    console.log('Container encontrado:', container);
    
    // Seleciona os elementos que devem ser ocultados/exibidos
    const rastreioStatus = container.querySelector('.rastreio-status');
    const rastreioItems = container.querySelectorAll('.rastreio-item');
    const rastreioPagamentoEntrega = container.querySelector('.rastreio-pagamento-entrega');
    const rastreioResumo = container.querySelector('.rastreio-resumo');

    console.log('Elementos encontrados:', {
        rastreioStatus: rastreioStatus,
        rastreioItems: rastreioItems.length,
        rastreioPagamentoEntrega: rastreioPagamentoEntrega,
        rastreioResumo: rastreioResumo
    });

    // Verifica se os elementos existem
    if (!rastreioStatus || !rastreioPagamentoEntrega || !rastreioResumo) {
        console.error('Alguns elementos não foram encontrados!');
        return;
    }

    // Alterna a classe 'active' para cada seção, controlando a visibilidade via CSS
    rastreioStatus.classList.toggle('active');
    rastreioPagamentoEntrega.classList.toggle('active');
    rastreioResumo.classList.toggle('active');
    rastreioItems.forEach(item => item.classList.toggle('active'));

    console.log('Classes alternadas. Status atual:', {
        rastreioStatus: rastreioStatus.classList.contains('active'),
        rastreioPagamentoEntrega: rastreioPagamentoEntrega.classList.contains('active'),
        rastreioResumo: rastreioResumo.classList.contains('active')
    });

    // Atualiza o texto e o ícone do botão com base no estado de visibilidade
    const isCancelados = document.body.classList.contains('pedidos-cancelados');
    if (rastreioStatus.classList.contains('active')) {
        button.innerHTML = (isCancelados ? 'Ocultar Detalhes <i class="fa-solid fa-chevron-up"></i>' : 'Ocultar Detalhes <i class="fa-solid fa-chevron-up"></i>');
        setTimeout(() => updateProgressBar(rastreioStatus), 100);
    } else {
        if (isCancelados) {
            button.innerHTML = 'Ver Detalhes <i class="fa-solid fa-chevron-down"></i>';
        } else {
            button.innerHTML = 'Acompanhar Pedido <i class="fa-solid fa-location-dot"></i>';
        }
    }
}

/**
 * Atualiza a largura da linha de progresso com base nos passos ativos.
 * @param {HTMLElement} rastreioStatusElement O elemento .rastreio-status.
 */
function updateProgressBar(rastreioStatusElement) {
    console.log('Atualizando barra de progresso...');
    
    const activeSteps = rastreioStatusElement.querySelectorAll('.rastreio-etapa.ativo').length;
    const totalSteps = rastreioStatusElement.querySelectorAll('.rastreio-etapa').length;
    
    console.log('Passos ativos:', activeSteps, 'Total de passos:', totalSteps);
    
    if (totalSteps === 0) return;

    // Calcula a largura da linha de progresso
    // A linha deve ir até o centro do último passo ativo
    let progressWidth = 0;
    if (activeSteps > 0) {
        // Largura de cada etapa (ex: 100% / 4 etapas = 25%)
        const stepWidthPercentage = 100 / totalSteps;
        // A linha vai até o início do último passo ativo + metade da largura desse passo
        progressWidth = (activeSteps - 1) * stepWidthPercentage + (stepWidthPercentage / 2);
    }
    
    console.log('Largura da progresso calculada:', progressWidth + '%');
    
    // Define a variável CSS customizada para a largura da linha de progresso
    rastreioStatusElement.style.setProperty('--progress-width', progressWidth + '%');
}

// Função para testar se tudo está funcionando
function testarFuncionalidade() {
    console.log('=== TESTE DE FUNCIONALIDADE ===');
    
    const containers = document.querySelectorAll('.container-rastreio');
    console.log('Containers encontrados:', containers.length);
    
    containers.forEach((container, index) => {
        console.log(`Container ${index + 1}:`);
        
        const status = container.querySelector('.rastreio-status');
        const items = container.querySelectorAll('.rastreio-item');
        const pagamento = container.querySelector('.rastreio-pagamento-entrega');
        const resumo = container.querySelector('.rastreio-resumo');
        const botao = container.querySelector('.rastreio-botao');
        
        console.log('   - Status:', status ? 'Encontrado' : 'NÃO ENCONTRADO');
        console.log('   - Items:', items.length);
        console.log('   - Pagamento:', pagamento ? 'Encontrado' : 'NÃO ENCONTRADO');
        console.log('   - Resumo:', resumo ? 'Encontrado' : 'NÃO ENCONTRADO');
        console.log('   - Botão:', botao ? 'Encontrado' : 'NÃO ENCONTRADO');
        
        if (status) {
            console.log('   - Status classes:', status.className);
        }
    });
}

document.addEventListener('DOMContentLoaded', () => {
    console.log('DOM carregado - inicializando rastreio.js');
    
    // Cria um elemento style e o anexa ao head do documento
    // Isso garante que a variável CSS '--progress-width' seja reconhecida
    const style = document.createElement('style');
    style.innerHTML = `
        .rastreio-status::after {
            width: var(--progress-width, 0%);
        }
    `;
    document.head.appendChild(style);

    // Testa a funcionalidade
    testarFuncionalidade();

    // Inicializa a barra de progresso para todos os pedidos ao carregar a página
    const statusDivs = document.querySelectorAll('.rastreio-status');
    console.log('Encontrados', statusDivs.length, 'elementos de status para inicializar');
    
    statusDivs.forEach((statusDiv, index) => {
        console.log('Inicializando barra de progresso', index + 1);
        updateProgressBar(statusDiv);
    });
    
    // Adiciona event listeners para todos os botões de toggle
    const toggleButtons = document.querySelectorAll('.rastreio-botao');
    console.log('Encontrados', toggleButtons.length, 'botões de toggle');
    
    toggleButtons.forEach((button, index) => {
        console.log('Botão', index + 1, 'já tem onclick:', button.onclick !== null);
        // O `onclick="toggleDetalhes(this)"` no HTML já lida com isso.
        // Não adicione outro event listener aqui para evitar duplicação de chamadas.
    });
    
    console.log('Inicialização de toggles concluída!');


    // --- Lógica do Modal de Cancelamento ---
    let pedidoParaCancelar = null;
    const modalCancelamento = document.getElementById('modal-cancelamento');
    const btnConfirmarCancelamento = document.getElementById('confirmar-cancelamento');
    const btnFecharModalCancelamento = document.getElementById('fechar-modal-cancelamento');

    console.log('--- Verificando elementos do Modal de Cancelamento ---');
    console.log('Modal:', modalCancelamento);
    console.log('Botão Confirmar:', btnConfirmarCancelamento);
    console.log('Botão Fechar:', btnFecharModalCancelamento);

    // Verifica se os elementos do modal existem antes de adicionar os event listeners
    if (modalCancelamento && btnConfirmarCancelamento && btnFecharModalCancelamento) {
        console.log('Elementos do modal encontrados. Adicionando event listeners...');
        
        // Adiciona event listeners aos botões de cancelar
        document.querySelectorAll('.rastreio-cancelar-botao').forEach(function(btn) {
            console.log('Adicionando listener ao botão de cancelar pedido:', btn);
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                pedidoParaCancelar = this.getAttribute('data-id-pedido');
                console.log('Botão "Cancelar Pedido" clicado. ID do pedido:', pedidoParaCancelar);
                
                // Mostra o modal
                modalCancelamento.classList.add('show');
                modalCancelamento.style.display = 'flex';
                modalCancelamento.style.opacity = '1';
                modalCancelamento.style.visibility = 'visible';
                console.log('Modal aberto');
            });
        });

        // Event listener para o botão de fechar
        btnFecharModalCancelamento.addEventListener('click', function() {
            console.log('Botão "Não" clicado. Fechando modal.');
            fecharModal();
        });

        // Event listener para o botão de confirmar
        btnConfirmarCancelamento.addEventListener('click', function() {
            console.log('Botão "Sim, cancelar" clicado. Tentando cancelar pedido:', pedidoParaCancelar);
            if (!pedidoParaCancelar) {
                console.warn('Nenhum pedido selecionado para cancelar.');
                alert('Erro: Nenhum pedido selecionado para cancelar.');
                return;
            }
            
            // Desabilita o botão para evitar cliques duplos
            btnConfirmarCancelamento.disabled = true;
            btnConfirmarCancelamento.textContent = 'Cancelando...';
            
            fetch('../../Controllers/PedidoController.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: 'action=cancelar_pedido&id_pedido=' + encodeURIComponent(pedidoParaCancelar)
            })
            .then(response => {
                console.log('Resposta da requisição:', response);
                if (!response.ok) {
                    return response.text().then(text => { 
                        throw new Error(`HTTP error! status: ${response.status}, message: ${text}`); 
                    });
                }
                return response.json();
            })
            .then(data => {
                console.log('Dados recebidos:', data);
                if (data.success) {
                    alert('Pedido cancelado com sucesso! Você será redirecionado.');
                    window.location.href = 'Pedidos-cancelados.php';
                } else {
                    alert('Erro ao cancelar pedido: ' + (data.message || 'Erro desconhecido'));
                }
            })
            .catch(error => {
                console.error('Erro na requisição:', error);
                alert('Erro ao cancelar pedido. Por favor, tente novamente mais tarde.');
            })
            .finally(() => {
                // Reabilita o botão
                btnConfirmarCancelamento.disabled = false;
                btnConfirmarCancelamento.textContent = 'Sim, cancelar';
                fecharModal();
            });
        });
        
        // Fechar modal ao clicar fora dele
        modalCancelamento.addEventListener('click', function(event) {
            if (event.target === modalCancelamento) {
                console.log('Clicado fora do modal. Fechando modal.');
                fecharModal();
            }
        });

        // Função para fechar o modal
        function fecharModal() {
            modalCancelamento.classList.remove('show');
            modalCancelamento.style.display = 'none';
            modalCancelamento.style.opacity = '0';
            modalCancelamento.style.visibility = 'hidden';
            pedidoParaCancelar = null;
        }

    } else {
        console.error("ERRO: Elementos do modal de cancelamento NÃO encontrados. Verifique o arquivo 'ModalCancelarPedido.php' e certifique-se de que os IDs 'modal-cancelamento', 'confirmar-cancelamento', 'fechar-modal-cancelamento' existem e estão corretos.");
    }
    // --- Fim da Lógica do Modal de Cancelamento ---
});