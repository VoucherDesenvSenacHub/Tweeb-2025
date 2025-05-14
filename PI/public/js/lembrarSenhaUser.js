document.addEventListener("DOMContentLoaded", () => {
    const emailInput = document.getElementById('email');
    const senhaInput = document.getElementById('senha');
    const lembrarSenha = document.getElementById('lembrarSenha');

    // Preenche os campos se já há dados salvos
    const emailSalvo = localStorage.getItem('email');
    const senhaSalva = localStorage.getItem('senha');
    if (emailSalvo && senhaSalva) {
        emailInput.value = emailSalvo;
        senhaInput.value = senhaSalva;
        lembrarSenha.checked = true;
    }

    // Salva ou limpa ao submeter o formulário
    document.querySelector('form').addEventListener('submit', () => {
        if (lembrarSenha.checked) {
            localStorage.setItem('email', emailInput.value);
            localStorage.setItem('senha', senhaInput.value);
        } else {
            localStorage.removeItem('email');
            localStorage.removeItem('senha');
        }
    });
});
