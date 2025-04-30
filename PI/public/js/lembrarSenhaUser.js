document.addEventListener("DOMContentLoaded", () => {
    const emailInput = document.getElementById('email');
    const senhaInput = document.getElementById('senha');
    const lembrarSenha = document.getElementById('lembrarSenha');

    // Verifica se há dados salvos
    if(localStorage.getItem('email') && localStorage.getItem('senha')) {
        emailInput.value = localStorage.getItem('email');
        senhaInput.value = localStorage.getItem('senha');
        lembrarSenha.checked = true;
    }

    // Salva ou remove dados conforme checkbox
    lembrarSenha.addEventListener('change', () => {
        if(lembrarSenha.checked) {
            localStorage.setItem('email', emailInput.value);
            localStorage.setItem('senha', senhaInput.value);
        } else {
            localStorage.removeItem('email');
            localStorage.removeItem('senha');
        }
    });

    // Atualiza dados no localStorage ao submeter o formulário
    document.querySelector('form').addEventListener('submit', () => {
        if(lembrarSenha.checked) {
            localStorage.setItem('email', emailInput.value);
            localStorage.setItem('senha', senhaInput.value);
        } else {
            localStorage.removeItem('email');
            localStorage.removeItem('senha');
        }
    });
});
