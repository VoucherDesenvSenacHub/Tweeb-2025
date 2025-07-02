document.addEventListener('DOMContentLoaded', () => {
    const formLogin = document.getElementById('login-funcionario');

    if (formLogin) {
        formLogin.addEventListener('submit', async function(event) {
            event.preventDefault();

            const email = document.getElementById('email-funcionario').value.trim();
            const senha = document.getElementById('senha-funcionario').value;

            if (!email || !senha) {
                alert("Preencha todos os campos.");
                return;
            }

            try {
                const response = await fetch('/Tweeb-2025/PI/App/adm/Controllers/LoginADM.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ email, senha })
                });

                const result = await response.json();

                if (result.sucesso) {
                    window.location.href = '/Tweeb-2025/PI/App/adm/Views/pages/painel-adm.php';
                } else {
                    alert('Erro: ' + result.mensagem);
                }
            } catch (error) {
                console.error('Erro ao fazer login:', error);
                alert('Erro interno. Tente novamente.');
            }
        });
    }
});
