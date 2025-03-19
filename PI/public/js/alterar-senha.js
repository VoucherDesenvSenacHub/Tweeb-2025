document.addEventListener("DOMContentLoaded", () => {
    const botaoSalvarSenha = document.querySelector(".alterar-senha-salvar");
    const botaoCancelarSenha = document.querySelector(".alterar-senha-cancelar");
    const senhaAtual = document.querySelector("#senha-atual");
    const novaSenha = document.querySelector("#nova-senha");
    const confirmarSenha = document.querySelector("#confirmar-senha");

    // Função para codificar a senha com ***
    function esconderSenha(input) {
        input.value = '***';
    }

    // Função para validar as senhas
    function validarSenhas() {
        if (novaSenha.value !== confirmarSenha.value) {
            alert("As senhas não coincidem!");
            return false;
        }
        return true;
    }

    // Ao clicar no botão "Salvar alteração", valida e altera a senha
    botaoSalvarSenha.addEventListener("click", (event) => {
        event.preventDefault(); // Evita o envio do formulário

        // Valida as senhas
        if (!validarSenhas()) return;

        // Codifica a senha temporariamente com ***
        esconderSenha(senhaAtual);
        esconderSenha(novaSenha);
        esconderSenha(confirmarSenha);

        // Exibe uma mensagem de sucesso
        alert("Senha alterada com sucesso!");
    });

    // Ao clicar no botão "Cancelar", limpa os campos de senha
    botaoCancelarSenha.addEventListener("click", (event) => {
        event.preventDefault(); // Evita o envio do formulário
        senhaAtual.value = '';
        novaSenha.value = '';
        confirmarSenha.value = '';
    });
});
