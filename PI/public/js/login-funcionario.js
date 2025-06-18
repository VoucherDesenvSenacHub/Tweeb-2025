document.addEventListener('DOMContentLoaded', () => {
    const formLogin = document.getElementById('login-funcionario');

    if (formLogin) {
        formLogin.addEventListener('submit', async function(event) {
            event.preventDefault();

            try {
                const formData = {
                    email: document.getElementById('email-funcionario').value.trim(),
                    senha: document.getElementById('senha-funcionario').value
                };

                const response = await fetch('/Tweeb-2025/PI/app/adm/Controllers/FuncionarioController.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(formData)
                });

                const result = await response.json();

                if (result.sucesso) {
                    window.location.href = '/Tweeb-2025/PI/app/adm/views/pages/painel-adm.php';
                } else {
                    alert('Erro: ' + result.mensagem);
                }
            } catch (error) {
                console.error('Erro:', error);
                alert('Erro ao fazer login. Por favor, tente novamente.');
            }
        });
    }
});
