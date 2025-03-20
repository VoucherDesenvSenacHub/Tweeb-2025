document.addEventListener("DOMContentLoaded", function() {
    // Selecionar todos os campos de input, textarea e botões dentro de forms
    const inputs = document.querySelectorAll('.orcamento-recebido-form input, .orcamento-recebido-form textarea');
    const buttons = document.querySelectorAll('.orcamento-recebido-form button');

    // Tornar os campos de input e textarea como somente leitura
    inputs.forEach(input => {
        input.setAttribute('readonly', 'readonly');
    });

    // Impedir interação com os botões
    buttons.forEach(button => {
        button.setAttribute('disabled', 'disabled');
    });
});
