// Função para selecionar o card
function selectCard(card) {
    // Remover a classe 'selected' de todos os cards
    const allCards = document.querySelectorAll('.card_corporativo');
    allCards.forEach(card => card.classList.remove('selected'));

    // Adicionar a classe 'selected' ao card clicado
    card.classList.add('selected');
}

// Atribuindo o evento de clique aos botões "Começar"
document.querySelectorAll('.btn_corporativo').forEach(button => {
    button.addEventListener('click', function(event) {
        // Prevenir o comportamento padrão do link (não rolar para o topo)
        event.preventDefault();

        // Selecionar o card pai do botão clicado
        const card = button.closest('.card_corporativo');

        // Selecionar o card
        selectCard(card);
    });
});
