// rastreio.js
// Este arquivo contém a lógica JavaScript para a tela de rastreio de pedidos.

/**
 * Função para alternar a visibilidade dos detalhes de um pedido.
 * @param {HTMLElement} button O botão "Acompanhar Pedido" clicado.
 */
function toggleDetalhes(button) {
    // Encontra o container do pedido pai do botão clicado
    const container = button.closest('.container-rastreio');
    
    // Seleciona os elementos que devem ser ocultados/exibidos
    const rastreioStatus = container.querySelector('.rastreio-status');
    const rastreioItems = container.querySelectorAll('.rastreio-item');
    const rastreioPagamentoEntrega = container.querySelector('.rastreio-pagamento-entrega');
    const rastreioResumo = container.querySelector('.rastreio-resumo');

    // Alterna a classe 'active' para cada seção, controlando a visibilidade via CSS
    rastreioStatus.classList.toggle('active');
    rastreioPagamentoEntrega.classList.toggle('active');
    rastreioResumo.classList.toggle('active');
    rastreioItems.forEach(item => item.classList.toggle('active'));

    // Atualiza o texto e o ícone do botão com base no estado de visibilidade
    if (rastreioStatus.classList.contains('active')) {
        button.innerHTML = 'Ocultar Detalhes <i class="fa-solid fa-chevron-up"></i>';
        // Atualiza a linha de progresso quando os detalhes são exibidos
        updateProgressBar(rastreioStatus);
    } else {
        button.innerHTML = 'Acompanhar Pedido <i class="fa-solid fa-location-dot"></i>';
    }
}

/**
 * Atualiza a largura da linha de progresso com base nos passos ativos.
 * @param {HTMLElement} rastreioStatusElement O elemento .rastreio-status.
 */
function updateProgressBar(rastreioStatusElement) {
    const activeSteps = rastreioStatusElement.querySelectorAll('.rastreio-etapa.ativo').length;
    const totalSteps = rastreioStatusElement.querySelectorAll('.rastreio-etapa').length;
    
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
    
    // Define a variável CSS customizada para a largura da linha de progresso
    rastreioStatusElement.style.setProperty('--progress-width', progressWidth + '%');
}

// Adiciona uma propriedade CSS customizada para a largura da linha de progresso
// Isso permite que o JS atualize a largura da linha ::after
document.addEventListener('DOMContentLoaded', () => {
    // Cria um elemento style e o anexa ao head do documento
    // Isso garante que a variável CSS '--progress-width' seja reconhecida
    const style = document.createElement('style');
    style.innerHTML = `
        .rastreio-status::after {
            width: var(--progress-width, 0%);
        }
    `;
    document.head.appendChild(style);

    // Inicializa a barra de progresso para todos os pedidos ao carregar a página
    document.querySelectorAll('.rastreio-status').forEach(statusDiv => {
        updateProgressBar(statusDiv);
    });
});
