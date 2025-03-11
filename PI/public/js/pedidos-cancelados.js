document.querySelectorAll(".toggle-pcancelados").forEach(button => {
    button.addEventListener("click", function () {
        let pedido = this.closest(".pedido-pcancelados");
        let detalhes = pedido.querySelector(".detalhes-pcancelados");

        if (!detalhes) {
            detalhes = document.createElement("div");
            detalhes.classList.add("detalhes-pcancelados");
            detalhes.innerHTML = `
                <p>Imposto estimado: <strong>R$50</strong></p>
                <p>Frete: <strong>Grátis</strong></p>
                <p>Cupons: <strong>R$0,00</strong></p>
                <p class="total-pcancelados">Total: <strong>R$XXX,XX</strong></p>
            `;
            pedido.insertBefore(detalhes, this);
        }

        if (detalhes.style.display === "block") {
            detalhes.style.display = "none";
            this.innerHTML = '<img src="../../../../public/assets/img/vermais-pcancelados.png" alt="Ver mais">';
        } else {
            detalhes.style.display = "block";
            this.innerHTML = '<img src="../../../../public/assets/img/vermenos-pcancelados.png" alt="Ver menos">';
        }
    });
});
