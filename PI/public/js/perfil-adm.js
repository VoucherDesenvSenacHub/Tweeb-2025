let perfil_form = document.querySelector('.perfil-tweeb-form');
let inputs = perfil_form.querySelectorAll('input:not([disabled])');
let originalValues = {};

// Salva os valores originais dos campos
inputs.forEach(input => {
    if (input.name !== 'matricula' && input.name !== 'cargo') {
        originalValues[input.name] = input.value;
    }
});

document.addEventListener("DOMContentLoaded", () => {
    const botaoEditar = document.querySelector(".perfil-tweeb-editar-foto");
    const camposEditaveis = document.querySelectorAll(".perfil-tweeb-form input:not([disabled])");
    const botaoSalvar = document.querySelector(".perfil-tweeb-salvar-end");
    const botaoExcluir = document.querySelector(".perfil-tweeb-excluir-end");
    const botaoCancelar = document.querySelector(".perfil-tweeb-cancelar-end");

    // Começa com os campos readonly
    camposEditaveis.forEach(input => input.setAttribute("readonly", "true"));

    // Botões inicialmente escondidos (igual ao perfil-usuario)
    botaoSalvar.style.display = "none";
    botaoCancelar.style.display = "none";
    botaoExcluir.style.display = "none";

    botaoEditar.addEventListener("click", () => {
        // Remove readonly dos campos editáveis (exceto matrícula e cargo)
        camposEditaveis.forEach(input => {
            if (input.name !== 'matricula' && input.name !== 'cargo') {
                input.removeAttribute("readonly");
            }
        });
        
        // Mostra todos os botões (igual ao perfil-usuario)
        botaoSalvar.style.display = "inline-block";
        botaoCancelar.style.display = "inline-block";
        botaoExcluir.style.display = "inline-block";
    });

    botaoCancelar.addEventListener("click", () => {
        cancelEdit();
    });
});

// Função para cancelar a edição
function cancelEdit() {
    // Restaura valores originais dos campos
    const camposEditaveis = document.querySelectorAll(".perfil-tweeb-form input:not([disabled])");
    camposEditaveis.forEach(input => {
        if (input.name !== 'matricula' && input.name !== 'cargo') {
            // Restaura o valor original se existir
            if (originalValues.hasOwnProperty(input.name)) {
                input.value = originalValues[input.name];
            }
            // Volta para readonly
            input.setAttribute("readonly", true);
        }
    });
    
    // Esconde todos os botões (igual ao perfil-usuario)
    document.querySelector(".perfil-tweeb-salvar-end").style.display = "none";
    document.querySelector(".perfil-tweeb-cancelar-end").style.display = "none";
    document.querySelector(".perfil-tweeb-excluir-end").style.display = "none";
}


function deletaUsuario() {
    let confirma = confirm("Tem certeza que deseja excluir sua conta?");
    if (!confirma) return;

    // Pegar o ID do usuário da sessão (admin ou funcionário)
    const usuarioID = perfil_form.querySelector('input[name="id"]').value;

    fetch("/Tweeb-2025/PI/public/api/deletar_usuario.php", {
        method: "DELETE",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: `id=${encodeURIComponent(usuarioID)}`
    })
    .then(res => res.text())
    .then(data => {
        try {
            let result = JSON.parse(data);
            alert(result.mensagem || "Operação realizada com sucesso!");
            if (result.sucesso) {
                console.log("Redirecionando...");
                window.location.href = "/Tweeb-2025/PI/App/adm/Views/pages/login-funcionario.php";
            }
        } catch (e) {
            alert(data); 
        }
    })
    .catch(err => console.error("Erro:", err));
}

    perfil_form.addEventListener('submit', async function(event) {
        event.preventDefault();

    let formData = {
        nome: this.nome.value,
        sobrenome: this.sobrenome.value,
        email: this.email.value,
        telefone: this.telefone.value,
        matricula: this.matricula.value,
        cargo: this.cargo.value
    };

    let response = await fetch('/Tweeb-2025/PI/App/adm/Controllers/AdmEditController.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(formData)
    });

    let result = await response.json();

    if (result.sucesso) {
        alert(result.mensagem);
        location.reload();
    } else {
        alert('Erro: ' + result.mensagem);
    }
});


async function editarUsuario() {
    // Validar campos obrigatórios
    if (!perfil_form.nome.value.trim()) {
        alert('Nome é obrigatório');
        return;
    }
    
    if (!perfil_form.email.value.trim()) {
        alert('Email é obrigatório');
        return;
    }

    let formData = {
        nome: perfil_form.nome.value.trim(),
        sobrenome: perfil_form.sobrenome.value.trim(),
        email: perfil_form.email.value.trim(),
        telefone: perfil_form.telefone.value.trim()
    };

    try {
        // Mostrar loading
        const btnSalvar = document.querySelector('.perfil-tweeb-salvar-end');
        const originalText = btnSalvar.innerHTML;
        btnSalvar.innerHTML = 'Salvando...';
        btnSalvar.disabled = true;

        let response = await fetch('/Tweeb-2025/PI/App/adm/Controllers/AdmEditController.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(formData)
        });

        let result = await response.json();

        if (result.sucesso) {
            alert(result.mensagem);
            // Atualizar valores originais com os novos valores salvos
            Object.keys(formData).forEach(key => {
                originalValues[key] = formData[key];
            });
            // Voltar ao modo de visualização
            cancelEdit();
        } else {
            alert('Erro: ' + result.mensagem);
        }
    } catch (error) {
        console.error('Erro:', error);
        alert('Erro ao atualizar. Tente novamente.');
    } finally {
        // Restaurar botão
        const btnSalvar = document.querySelector('.perfil-tweeb-salvar-end');
        btnSalvar.innerHTML = 'Salvar alteração';
        btnSalvar.disabled = false;
    }
}