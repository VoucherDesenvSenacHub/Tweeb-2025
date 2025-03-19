// Seleciona todos os botões de rádio
const radios = document.querySelectorAll('input[type="radio"][name="envio"]');

// Adiciona um evento de clique a cada rádio
radios.forEach(radio => {
    radio.addEventListener('change', function() {
        // Remove a classe 'metodo-selecionado' de todas as divs
        document.querySelectorAll('.endereco-card').forEach(card => {
            card.classList.remove('metodo-selecionado');
            card.querySelector('label').classList.remove('metodo-selecionado');  // Remove a classe da label também
        });

        // Adiciona a classe 'metodo-selecionado' ao card e à label correspondente
        if (this.checked) {
            this.closest('.endereco-card').classList.add('metodo-selecionado');
            this.closest('.endereco-card').querySelector('label').classList.add('metodo-selecionado'); 
        }
    });
});
