document.querySelectorAll('.card_produto_personalizado').forEach(card => {
    card.addEventListener('mouseenter', function() {
        let tooltip = document.createElement('div');
        tooltip.classList.add('tooltip_produto_personalizado');
        
        let texto;
        if (this.querySelector('h6').textContent === "+5000 pedidos") {
            texto = "Nosso e-commerce 24h está sempre aberto para você,<br>tenha a liberdade de comprar a qualquer hora, de qualquer lugar!";
        } else if (this.querySelector('h6').textContent === "+2000 personalizados") {
            texto = "Do seu jeito, é a modalidade de compra que escolhemos cada peça do seu PC<br> para garantir que combine as peças com qualidade<br> suprindo suas necessidades de uso.";
        } else if (this.querySelector('h6').textContent === "Pagamento") {
            texto = "Pagamento somente pelo Pix!<br>envio em menos de 24horas";
        } else if (this.querySelector('h6').textContent === "Entrega") {
            texto = "Envio rápido disponível para você";
        }

        tooltip.innerHTML = texto;
        this.appendChild(tooltip);

        tooltip.style.position = 'absolute';
        tooltip.style.bottom = '-40px'; // Ajuste para aparecer abaixo do card
        tooltip.style.left = '50%';
        tooltip.style.transform = 'translateX(-50%)';
        tooltip.style.textAlign = 'center';
        tooltip.style.background = '#008000';
        tooltip.style.color = 'white';
        tooltip.style.padding = '5px 10px';
        tooltip.style.borderRadius = '5px';
        tooltip.style.whiteSpace = 'nowrap';
        tooltip.style.fontSize = '12px';
    });

    card.addEventListener('mouseleave', function() {
        let tooltip = this.querySelector('.tooltip_produto_personalizado');
        if (tooltip) {
            tooltip.remove();
        }
    });
});


