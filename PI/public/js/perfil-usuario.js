document.addEventListener("DOMContentLoaded", () => {
    const botaoEditar = document.querySelector(".perfil-tweeb-editar-foto");
    const camposEditaveis = document.querySelectorAll(".perfil-tweeb-form input:not(#cpf):not([disabled])");
    const botaoSalvar = document.querySelector(".perfil-tweeb-salvar-end");
    const botaoCancelar = document.querySelector(".perfil-tweeb-cancelar-end");

    // Começa com os campos readonly
    camposEditaveis.forEach(input => input.setAttribute("readonly", "true"));

    // Botões Salvar e Cancelar inicialmente escondidos
    botaoSalvar.style.display = "none";
    botaoCancelar.style.display = "none";

    botaoEditar.addEventListener("click", () => {
        camposEditaveis.forEach(input => input.removeAttribute("readonly"));
        botaoSalvar.style.display = "inline-block";
        botaoCancelar.style.display = "inline-block";
    });

    botaoCancelar.addEventListener("click", () => {
        cancelEdit(); // Chama a função cancelEdit para reverter e ocultar botões
    });
});

// Função para cancelar edit (usada tanto pelo botão Cancelar quanto em outras partes do código)
function cancelEdit() {
    const camposEditaveis = document.querySelectorAll(".perfil-tweeb-form input:not(#cpf):not([disabled])");
    camposEditaveis.forEach(input => {
        // Restaura o valor original do campo (se foi modificado antes de editar)
        // Note: Se o valor original não foi salvo, ele vai reverter para o valor do 'value' no HTML
        // Para uma reversão mais robusta, você precisaria salvar os valores em uma variável JS ao carregar a página.
        input.value = input.defaultValue; 
        input.setAttribute("readonly", "true");
    });

    document.querySelector(".perfil-tweeb-salvar-end").style.display = "none";
    document.querySelector(".perfil-tweeb-cancelar-end").style.display = "none";

    // Limpa os campos de endereço ao cancelar, caso o CEP tenha sido preenchido
    const camposParaLimpar = ["rua", "bairro", "cidade", "estado"];
    camposParaLimpar.forEach(id => {
        const input = document.getElementById(id);
        if (input) input.value = "";
    });
}


function deletaUsuario() {
    const confirma = confirm("Tem certeza que deseja excluir sua conta?");
    if (!confirma) return;

    // `usuarioID` é definida no script inline no HTML e é acessível aqui
    fetch("http://localhost/tweeb-2025/PI/public/api/deletar_usuario.php", {
        method: "DELETE",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: `id=${encodeURIComponent(usuarioID)}`
    })
    .then(res => res.text())
    .then(data => {
        try {
            const result = JSON.parse(data);
            alert(result.mensagem || "Operação realizada com sucesso!");
            if (result.mensagem) {
                console.log("Redirecionando...");
                window.location.href = "/Tweeb-2025/PI/app/user/view/pages/login.php";
            }
        } catch (e) {
            alert(data); 
        }
    })
    .catch(err => console.error("Erro:", err));
}

document.getElementById('perfil-tweeb-form').addEventListener('submit', async function(event) {
    event.preventDefault();

    const formData = {
        nome: this.nome.value,
        sobrenome: this.sobrenome.value,
        email: this.email.value,
        telefone: this.telefone.value,
        cep: this.cep.value,
        rua: this.rua.value,
        bairro: this.bairro.value,
        cidade: this.cidade.value,
        estado: this.estado.value
    };

    const response = await fetch('/Tweeb-2025/PI/app/user/Controllers/UserEditController.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(formData)
    });

    const result = await response.json();

    if (result.sucesso) {
        alert(result.mensagem);
        location.reload();
    } else {
        alert('Erro: ' + result.mensagem);
    }
});


