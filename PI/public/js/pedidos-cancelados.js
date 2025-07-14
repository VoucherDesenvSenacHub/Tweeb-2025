// public/js/pedidos-cancelados.js

document.addEventListener('DOMContentLoaded', function() {
    // Função para alternar a visibilidade dos detalhes de um pedido
    window.toggleDetalhes = function(buttonElement) {
        const pedidoContainer = buttonElement.closest('.container-rastreio');
        
        // Seleciona as seções que você quer ocultar/mostrar
        const statusDiv = pedidoContainer.querySelector('.rastreio-status');
        const itemDivs = pedidoContainer.querySelectorAll('.rastreio-item');
        const pagamentoEntregaDiv = pedidoContainer.querySelector('.rastreio-pagamento-entrega');
        const resumoDiv = pedidoContainer.querySelector('.rastreio-resumo');

        // Cria um array com todas as seções
        const sectionsToToggle = [statusDiv, pagamentoEntregaDiv, resumoDiv];
        itemDivs.forEach(item => sectionsToToggle.push(item)); // Adiciona todos os itens também

        // Verifica se o botão atualmente mostra "Ver Menos" (detalhes abertos)
        const isShowing = buttonElement.querySelector('i').classList.contains('fa-chevron-up');

        sectionsToToggle.forEach(section => {
            if (section) { // Garante que o elemento existe
                if (isShowing) {
                    section.classList.remove('active'); // Oculta
                } else {
                    section.classList.add('active'); // Mostra
                }
            }
        });

        // Altera o ícone e o texto do botão
        const icon = buttonElement.querySelector('i');
        if (icon) {
            if (isShowing) {
                icon.classList.remove('fa-chevron-up');
                icon.classList.add('fa-chevron-down');
                // Se o texto precisar mudar também:
                // buttonElement.childNodes[0].nodeValue = 'Ver Detalhes '; // Ou outra forma de mudar o texto
            } else {
                icon.classList.remove('fa-chevron-down');
                icon.classList.add('fa-chevron-up');
                // Se o texto precisar mudar também:
                // buttonElement.childNodes[0].nodeValue = 'Ver Menos ';
            }
        }
    };
});