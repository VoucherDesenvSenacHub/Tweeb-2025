document.addEventListener('DOMContentLoaded', function() {
    // 1. Seleciona todos os botões "Configuração" da página
    const configButtons = document.querySelectorAll('.kitsetup-config-box');

    // 2. Adiciona um "escutador" de clique para cada um deles
    configButtons.forEach(button => {
        button.addEventListener('click', function() {
            
            // 3. Encontra o card "pai" do botão que foi clicado
            const card = this.closest('.kitsetup-products_box');

            // 4. Verifica se o painel deste card já está visível
            const isAlreadyVisible = card.classList.contains('config-visible');

            // 5. ANTES de fazer qualquer coisa, fecha TODOS os painéis que estiverem abertos
            document.querySelectorAll('.kitsetup-products_box.config-visible').forEach(otherCard => {
                otherCard.classList.remove('config-visible');
            });

            // 6. Se o painel que clicamos NÃO estava visível, nós o abrimos.
            // (Se ele já estava visível, o passo 5 acima já o fechou, criando o efeito de "clicar de novo para fechar")
            if (!isAlreadyVisible) {
                card.classList.add('config-visible');
            }
        });
    });
});