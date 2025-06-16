document.addEventListener('DOMContentLoaded', function () {
    const botao = document.getElementById('btnSalvarSenha');
    botao.addEventListener('click', async function() {
        const senhaAtual = document.getElementById('senha-atual').value.trim();
        const novaSenha = document.getElementById('nova-senha').value.trim();
        const confirmarSenha = document.getElementById('confirmar-senha').value.trim();

        if (!senhaAtual || !novaSenha || !confirmarSenha) {
            alert("Preencha todos os campos.");
            return;
        }

        if (novaSenha !== confirmarSenha) {
            alert("As senhas não coincidem.");
            return;
        }

        const dados = {
            senha_atual: senhaAtual,
            nova_senha: novaSenha,
            confirmar_senha: confirmarSenha
        };

        try {
            const response = await fetch('../../Controllers/AlterarSenhaController.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(dados)
            });

            const resultado = await response.json();

            const modal = document.getElementById('modalAlterarSenha');
            const mensagem = document.getElementById('ModalAltSenhaMensagem');
            const botaoModal = document.getElementById('ModalAltSenha-button');

            mensagem.textContent = resultado.mensagem || "Erro desconhecido.";
            modal.style.display = 'flex';

            botaoModal.onclick = () => {
                modal.style.display = 'none';
                if (resultado.sucesso) {
                    window.location.reload();
                }
            };
        } catch (error) {
            alert("Erro de rede ou servidor. Tente novamente.");
        }
    });
});