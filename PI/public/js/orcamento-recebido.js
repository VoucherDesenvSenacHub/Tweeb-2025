document.addEventListener("DOMContentLoaded", function () {
    // Tornar inputs e textareas readonly
    const inputs = document.querySelectorAll('.orcamento-recebido-form input, .orcamento-recebido-form textarea');
    const buttons = document.querySelectorAll('.orcamento-recebido-form button');

    inputs.forEach(input => {
        input.setAttribute('readonly', 'readonly');
    });

    buttons.forEach(button => {
        button.setAttribute('disabled', 'disabled');
    });

    // Abrir modal
    document.querySelectorAll('.open-modal-resposta').forEach(btn => {
        btn.addEventListener('click', () => {
            document.getElementById('modal-responder-orcamento').style.display = 'flex';
        });
    });

    // Fechar modal
    document.querySelectorAll('.close-modal').forEach(btn => {
        btn.addEventListener('click', () => {
            document.getElementById('modal-responder-orcamento').style.display = 'none';
        });
    });

    console.log("JS carregado");
});
