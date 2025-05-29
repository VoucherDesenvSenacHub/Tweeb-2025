const form = document.querySelector('.perfil-tweeb-form');
const inputs = form.querySelectorAll('input:not([disabled])');
let originalValues = {};

// Salva os valores originais dos campos
inputs.forEach(input => {
    originalValues[input.name] = input.value;
});

// Função para ativar/desativar modo de edição
function toggleEditMode() {
    form.classList.toggle('editing');
    inputs.forEach(input => {
        input.readOnly = !input.readOnly;
    });
}

// Função para cancelar a edição
function cancelEdit() {
    form.classList.remove('editing');
    inputs.forEach(input => {
        input.readOnly = true;
        input.value = originalValues[input.name] || '';
    });
}

function deletaUsuario() {
    const confirma = confirm("Tem certeza que deseja excluir sua conta?");
    if (!confirma) return;

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

// Script para upload automático da foto
document.getElementById('inputFotoPerfil').addEventListener('change', function() {
    if (this.files && this.files[0]) {
        // Mostra um preview da imagem antes do upload
        const reader = new FileReader();
        reader.onload = function(e) {
            document.querySelector('.foto-perfil').src = e.target.result;
        }
        reader.readAsDataURL(this.files[0]);
        
        // Envia o formulário automaticamente
        document.getElementById('formFotoPerfil').submit();
    }
});

// Resto do código existente para edição do perfil
document.addEventListener("DOMContentLoaded", () => {
    const botaoEditarFoto = document.querySelector(".perfil-tweeb-editar-foto");
    const camposInput = document.querySelectorAll(".perfil-tweeb-form input:not(#cpf)");
    const botaoSalvar = document.querySelector(".perfil-tweeb-salvar");
    const botaoCancelar = document.querySelector(".perfil-tweeb-cancelar");
    const botaoExcluir = document.querySelector(".perfil-tweeb-excluir")
    const header = document.querySelector(".perfil-tweeb-header");

    // Inicia desativando os campos
    camposInput.forEach(input => input.setAttribute("disabled", "true"));

    // Oculta botões "Salvar" e "Cancelar" no início
    botaoSalvar.style.display = "none";
    botaoCancelar.style.display = "none";
    botaoExcluir.style.display = "none";

    // Torna os campos editáveis ao clicar no ícone de editar
    botaoEditarFoto.addEventListener("click", () => {
        camposInput.forEach(input => input.removeAttribute("disabled"));
        
        // Exibe botões de ação
        botaoSalvar.style.display = "inline-block";
        botaoCancelar.style.display = "inline-block";
        botaoExcluir.style.display = "inline-block";

        // Adiciona a classe para aumentar o margin-top
        header.classList.add("margin-top-aumentado");
    });
    
    // Cancela edição e restaura os valores originais ao clicar em "Cancelar"
    botaoCancelar.addEventListener("click", (event) => {
        event.preventDefault();
        camposInput.forEach(input => {
            input.value = input.defaultValue; // Restaura valor original
            input.setAttribute("disabled", "true");
        });

        // Esconde os botões novamente
        botaoSalvar.style.display = "none";
        botaoCancelar.style.display = "none";
        botaoExcluir.style.display = "none";

        // Remove a classe para voltar o margin-top ao normal
        header.classList.remove("margin-top-aumentado");
    });
}); 