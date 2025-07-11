let perfil_form = document.querySelector('.perfil-tweeb-form');
console.log(perfil_form)
let inputs = perfil_form.querySelectorAll('input:not([disabled])');
let originalValues = {};

// Salva os valores originais dos campos
inputs.forEach(input => {
    originalValues[input.name] = input.value;
});

document.addEventListener("DOMContentLoaded", () => {
    const botaoEditar = document.querySelector(".perfil-tweeb-editar-foto");
    const camposEditaveis = document.querySelectorAll(".perfil-tweeb-form input:not(#cpf):not([disabled])");
    const botaoSalvar = document.querySelector(".perfil-tweeb-salvar-end");
    const botaoExcluir = document.querySelector(".perfil-tweeb-excluir-end");
    const botaoCancelar = document.querySelector(".perfil-tweeb-cancelar-end");

    // Começa com os campos readonly
    camposEditaveis.forEach(input => input.setAttribute("readonly", "true"));

    // Botões Salvar e Cancelar inicialmente escondidos
    botaoSalvar.style.display = "none";
    botaoCancelar.style.display = "none";
    botaoExcluir.style.display = "none";

    botaoEditar.addEventListener("click", () => {
        camposEditaveis.forEach(input => input.removeAttribute("readonly"));
        botaoSalvar.style.display = "inline-block";
        botaoCancelar.style.display = "inline-block";
        botaoExcluir.style.display = "inline-block";
    });

    botaoCancelar.addEventListener("click", () => {
        cancelEdit(); // Chama a função cancelEdit para reverter e ocultar botões
    });
});

console.log(originalValues);

// Função para ativar/desativar modo de edição
function toggleEditMode() {
    perfil_form.classList.toggle('editing');
    inputs.forEach(input => {
        input.readOnly = !input.readOnly;
    });
}

// Função para cancelar a edição
function cancelEdit() {
    perfil_form.classList.remove("editing");
    perfil_form.querySelectorAll("input").forEach(input => {
        input.setAttribute("readonly", true);
    });
    document.querySelector(".perfil-tweeb-salvar-end").style.display = "none";
    document.querySelector(".perfil-tweeb-cancelar-end").style.display = "none";
    document.querySelector(".perfil-tweeb-excluir-end").style.display = "none";
    let camposParaLimpar = ["sobrenome", "telefone"];
    camposParaLimpar.forEach(id => {
        let input = document.getElementById(id);
        if (input) input.value = "";
    });
}

function abriModal() {
    document.getElementById('modal').style.display = 'flex';
}
function fecharModal(){
    document.getElementById('modal').style.display = 'none';
}

function mostrarModal(mensagem) {
    document.getElementById('modalMensagemTexto').innerText = mensagem;
    document.getElementById('modalMensagem').style.display = 'flex';
}

function mostrarAviso(mensagem) {
    const aviso = document.getElementById('modalAviso');
    const avisoTexto = document.getElementById('modalAvisoTexto');
    avisoTexto.innerText = mensagem;
    aviso.style.display = 'block';
    setTimeout(() => {
        aviso.style.display = 'none';
    }, 2000);
}

function mostrarModalSucessoExclusao(mensagem) {
    document.getElementById('modalSucessoExclusaoTexto').innerText = mensagem || 'Usuário excluído com sucesso!';
    document.getElementById('modalSucessoExclusao').style.display = 'flex';
}

function redirecionarLogin() {
    window.location.href = "/Tweeb-2025/PI/app/user/view/pages/login.php";
}

function deletaUsuario() {
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
            let result = JSON.parse(data);
            if (result.mensagem) {
                mostrarModalSucessoExclusao(result.mensagem);
            } else {
                mostrarAviso("Operação realizada com sucesso!");
            }
        } catch (e) {
            mostrarAviso(data);
        }
    })
    .catch(err => mostrarAviso("Erro inesperado ao excluir usuário."));
}

function abrirModalConfirmarAlteracao() {
    document.getElementById('modalConfirmarAlteracao').style.display = 'flex';
}

function fecharModalConfirmarAlteracao() {
    document.getElementById('modalConfirmarAlteracao').style.display = 'none';
}

function confirmarAlteracao() {
    fecharModalConfirmarAlteracao();
    submitAlteracao();
}

// Refatorar o submit do formulário para exibir o modal de confirmação
perfil_form.addEventListener('submit', function(event) {
    event.preventDefault();
    abrirModalConfirmarAlteracao();
});

// Função que realmente faz a alteração após confirmação
async function submitAlteracao() {
    let formData = {
        nome: perfil_form.nome.value,
        sobrenome: perfil_form.sobrenome.value,
        email: perfil_form.email.value,
        telefone: perfil_form.telefone.value,
    };

    let response = await fetch('/Tweeb-2025/PI/app/user/Controllers/UserEditController.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(formData)
    });

    let result = await response.json();

    if (result.sucesso) {
        document.getElementById('modalSucessoAtualizacao').style.display = 'flex';
    } else {
        alert('Erro: ' + result.mensagem);
    }
}

function fecharModalSucessoAtualizacao() {
    document.getElementById('modalSucessoAtualizacao').style.display = 'none';
}