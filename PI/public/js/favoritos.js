// window.addEventListener('load', function () {
//     const container = document.querySelector('.container-favoritos-5'); // Container onde os cards estão
//     const produtosCards = container.querySelectorAll('.produtos-card');  // Seleciona todas as divs com a classe produtos-card

//     // Função para aplicar o estilo no responsivo
//     function aplicarEstilosResponsivos() {
//         // Verifica se a largura da tela é menor que 768px (pode ajustar conforme necessário)
//         if (window.innerWidth <= 768) {
//             // Aplica display flex e flex-direction column no container
//             container.style.display = 'flex';
//             container.style.flexDirection = 'column';
//             container.style.alignItems = 'center';  // Centraliza os itens dentro do container

//             // Aplica os estilos necessários para os produtos-card
//             produtosCards.forEach(card => {
//                 card.style.width = '300px';  // Limita a largura dos cards para 300px
//                 card.style.marginBottom = '20px';  // Define o espaçamento entre os cards
//                 card.style.boxSizing = 'border-box';  // Para que padding e border não aumentem a largura
//             });
//         } else {
//             // Se a tela for maior que 768px, usa o layout original
//             container.style.display = '';  // Remove o display flex se for maior que 768px
//             container.style.flexDirection = '';  // Restaura a direção original
//             container.style.alignItems = '';  // Restaura o alinhamento original

//             // Restaura as propriedades dos produtos-card para o estado original
//             produtosCards.forEach(card => {
//                 card.style.width = '';  // Limpa a largura personalizada
//                 card.style.marginBottom = '';  // Limpa o espaçamento entre os cards
//                 card.style.boxSizing = '';  // Restaura o box-sizing
//             });
//         }
//     }

//     // Aplica o estilo ao carregar a página
//     aplicarEstilosResponsivos();

//     // Aplica novamente sempre que a janela for redimensionada
//     window.addEventListener('resize', aplicarEstilosResponsivos);
// });


window.addEventListener('load', function () {
    // Seleciona todos os containers com a classe .container-favoritos-5
    const containers = document.querySelectorAll('.container-favoritos-5');

    // Função para aplicar o estilo no responsivo
    function aplicarEstilosResponsivos() {
        containers.forEach(container => {
            // Seleciona todos os .produtos-card dentro do container
            const produtosCards = container.querySelectorAll('.produtos-card');

            // Verifica se a largura da tela é menor que 768px (pode ajustar conforme necessário)
            if (window.innerWidth <= 768) {
                // Aplica display flex e flex-direction column no container
                container.style.display = 'flex';
                container.style.flexDirection = 'column';
                container.style.alignItems = 'center';  // Centraliza os itens dentro do container

                // Aplica os estilos necessários para os produtos-card
                produtosCards.forEach(card => {
                    card.style.width = '300px';  // Limita a largura dos cards para 300px
                    card.style.marginBottom = '20px';  // Define o espaçamento entre os cards
                    card.style.boxSizing = 'border-box';  // Para que padding e border não aumentem a largura
                });
            } else {
                // Se a tela for maior que 768px, usa o layout original
                container.style.display = '';  // Remove o display flex se for maior que 768px
                container.style.flexDirection = '';  // Restaura a direção original
                container.style.alignItems = '';  // Restaura o alinhamento original

                // Restaura as propriedades dos produtos-card para o estado original
                produtosCards.forEach(card => {
                    card.style.width = '';  // Limpa a largura personalizada
                    card.style.marginBottom = '';  // Limpa o espaçamento entre os cards
                    card.style.boxSizing = '';  // Restaura o box-sizing
                });
            }
        });
    }

    // Aplica o estilo ao carregar a página
    aplicarEstilosResponsivos();

    // Aplica novamente sempre que a janela for redimensionada
    window.addEventListener('resize', aplicarEstilosResponsivos);
});
