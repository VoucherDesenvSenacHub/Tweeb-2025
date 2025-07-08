function toggleDetalhes(botao) {
    let pedidoContainer = botao.closest('.container-rastreio');
    let detalhes = pedidoContainer.querySelectorAll('.rastreio-status, .rastreio-item, .rastreio-pagamento-entrega, .rastreio-resumo');

    // Verifica se o "rastreio-status" está visível
    let estaAberto = getComputedStyle(detalhes[0]).display !== "none"; // Verifica se está visível

    detalhes.forEach(elemento => {
        if (elemento.classList.contains('rastreio-status')) {
            // Para .rastreio-status, usamos inline-flex quando estiver visível
            elemento.style.display = estaAberto ? "none" : "inline-flex";
            
            // Adiciona o estilo flex-direction: column se a tela for pequena
            if (window.innerWidth <= 768) {  // Responsividade: 768px ou menos
                elemento.style.flexDirection = "column"; // Aplica o layout vertical
            } else {
                elemento.style.flexDirection = "";  // Reseta para o valor padrão (geralmente row)
            }
        } else {
            // Para os outros elementos, usamos block ou none
            elemento.style.display = estaAberto ? "none" : "block";
        }
    });

    // Atualiza o texto do botão
    let icone = botao.querySelector("i");
    if (!icone) {
        icone = document.createElement("i");
        icone.className = "fa-solid fa-location-dot";
        icone.style.marginLeft = "8px"; // Garante espaçamento
        botao.appendChild(icone);
    }

    botao.firstChild.textContent = estaAberto ? "Acompanhar Pedido" : "Ocultar Detalhes";
}