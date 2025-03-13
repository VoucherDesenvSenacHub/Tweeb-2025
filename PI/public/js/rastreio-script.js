function toggleDetalhes(botao) {
    let pedidoContainer = botao.closest('.container-rastreio');
    let detalhes = pedidoContainer.querySelectorAll('.rastreio-status, .rastreio-item, .rastreio-pagamento-entrega, .rastreio-resumo');

    detalhes.forEach(elemento => {
        if (elemento.style.display === "none" || elemento.style.display === "") {
            elemento.style.display = "block";
            botao.textContent = "Ocultar Detalhes";
        } else {
            elemento.style.display = "none";
            botao.textContent = "Acompanhar Pedido";
        }
    });
}
