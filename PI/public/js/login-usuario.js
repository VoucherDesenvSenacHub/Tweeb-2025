document.addEventListener('DOMContentLoaded', () => {
    const formLogin = document.getElementById('login-form');

<<<<<<< Updated upstream
    if (formLogin) {
        formLogin.addEventListener('submit', async function(event) {
            event.preventDefault();
=======
    const response = await fetch('/Tweeb-2025/PI/app/user/Controllers/LoginController.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(formData)
    });
>>>>>>> Stashed changes

            const formData = {
                email: this.email.value,
                senha: this.senha.value
            };

<<<<<<< Updated upstream
            const response = await fetch('/Tweeb-2025/PI/app/user/Controllers/LoginController.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(formData)
            });

            const result = await response.json();

            if (result.sucesso) {
                alert(result.mensagem);
                window.location.href = '/Tweeb-2025/PI/home.php';
            } else {
                alert('Erro: ' + result.mensagem);
            }
        });
=======
    if (result.sucesso) {
        alert(result.mensagem);
        window.location.href = '/Tweeb-2025/PI/home.php';
    } else {
        alert('Erro: ' + result.mensagem);
>>>>>>> Stashed changes
    }
});
