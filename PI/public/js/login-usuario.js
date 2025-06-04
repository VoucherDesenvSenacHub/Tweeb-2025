document.addEventListener('DOMContentLoaded', () => {
    const formLogin = document.getElementById('login-form');

    if (formLogin) {
        formLogin.addEventListener('submit', async function(event) {
            event.preventDefault();

            try {
                const formData = {
                    email: this.email.value.trim(),
                    senha: this.senha.value
                };

                const response = await fetch('/Tweeb-2025/PI/app/user/Controllers/LoginController.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(formData)
                });

                const result = await response.json();

                if (result.sucesso) {
                    window.location.href = '/Tweeb-2025/PI/home.php';
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
