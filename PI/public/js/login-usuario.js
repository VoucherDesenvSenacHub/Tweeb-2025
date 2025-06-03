document.getElementById("login-form").addEventListener('submit', async function(event){
    event.preventDefault();
    const formData = {
        email: this.email.value,
        senha: this.senha.value
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
        window.location.href = 'home.php';
    } else {
        alert('Erro: ' + result.mensagem);
    }
})