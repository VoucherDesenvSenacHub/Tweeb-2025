document.addEventListener('DOMContentLoaded', () => {
    const formCadastro = document.getElementById('form-cadastro');
    
    if (formCadastro) {
        formCadastro.addEventListener('submit', async function(event) {
            event.preventDefault();

            const formData = {
                nome: this.nome.value,
                email: this.email.value,
                senha: this.senha.value,
                confirmar_senha: this.confirmar_senha.value,
                cpf: this.cpf.value
            };

            const response = await fetch('/Tweeb-2025/PI/app/user/Controllers/UserController.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(formData)
            });

            const result = await response.json();

            if (result.sucesso) {
                alert(result.mensagem);
                window.location.href = 'login.php';
            } else {
                alert('Erro: ' + result.mensagem);
            }
        });
    }
});
