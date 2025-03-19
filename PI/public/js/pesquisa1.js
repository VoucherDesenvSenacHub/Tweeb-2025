document.addEventListener('click', function (event) {
    document.querySelectorAll('.pesquisa1-cadastro-card1, .pesquisa1-cadastro-card2').forEach(card => {
        if (card.contains(event.target)) {
            card.classList.add('ativo'); // Se clicou no card, mantém expandido
        } else {
            card.classList.remove('ativo'); // Se clicou fora, volta ao tamanho normal
        }
    });
});
