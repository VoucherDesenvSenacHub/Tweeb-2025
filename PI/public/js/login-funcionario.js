document.addEventListener('DOMContentLoaded', () => {
    const formLogin = document.getElementById('login-funcionario');

    if (formLogin) {
        formLogin.addEventListener('submit', async function(event) {
            event.preventDefault();

            // Captura o botão clicado
            const botaoClicado = event.submitter?.value;

            // Verifica qual foi o botão clicado
            let urlLogin = '';
            if (botaoClicado === 'adm') {
                urlLogin = '/Tweeb-2025/PI/app/adm/Controllers/LoginADM.php';
            } else if (botaoClicado === 'funcionario') {
                urlLogin = '/Tweeb-2025/PI/app/adm/Controllers/LoginFuncionario.php';
            } else {
                alert('Botão de login inválido.');
                return;
            }

            try {
                const formData = {
                    email: document.getElementById('email-funcionario').value.trim(),
                    senha: document.getElementById('senha-funcionario').value
                };

                const response = await fetch(urlLogin, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ email, senha })
                });

                // Captura como texto para tratar HTML inesperado
                const text = await response.text();

                try {
                    const result = JSON.parse(text);

                    if (result.sucesso) {
                        window.location.href = '/Tweeb-2025/PI/app/adm/views/pages/painel-adm.php';
                    } else {
                        alert('Erro: ' + result.mensagem);
                    }
                } catch (jsonError) {
                    console.error('Resposta não é JSON válido:', text);
                    alert('Erro inesperado no servidor (JSON inválido). Veja o console para detalhes.');
                }

            } catch (error) {
                console.error('Erro na requisição:', error);
                alert('Erro ao fazer login. Por favor, tente novamente.');
            }
        });
    }
});
