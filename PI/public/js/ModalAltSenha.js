document.addEventListener("DOMContentLoaded", function () {
    const botaoFechar = document.getElementById("ModalAltSenha-button");

    if (botaoFechar) {
        botaoFechar.addEventListener("click", fecharModal);
    }
});

function abrirModal(mensagem) {
    const modal = document.getElementById("modalAlterarSenha");
    const mensagemElem = document.getElementById("ModalAltSenhaMensagem");

    if (modal && mensagemElem) {
        mensagemElem.textContent = mensagem;
        modal.style.display = "flex";
        document.body.classList.add("modal-ativo");
    }
}

function fecharModal() {
    const modal = document.getElementById("modalAlterarSenha");

    if (modal) {
        modal.style.display = "none";
        document.body.classList.remove("modal-ativo");
    }
}
