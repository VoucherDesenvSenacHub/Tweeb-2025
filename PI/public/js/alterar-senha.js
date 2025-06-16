// alterar-senha.js
document.getElementById("btnSalvarSenha").addEventListener("click", async () => {
    const senhaAtual = document.getElementById("senha-atual").value.trim();
    const novaSenha = document.getElementById("nova-senha").value.trim();
    const confirmarSenha = document.getElementById("confirmar-senha").value.trim();

    const resposta = await fetch("/Tweeb-2025/PI/App/user/Controllers/AlterarSenhaController.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ senha_atual: senhaAtual, nova_senha: novaSenha, confirmar_senha: confirmarSenha })
    });

    let resultado;
    try {
    resultado = await resposta.json();
    } catch (e) {
    const erroTexto = await resposta.text();
    console.error("Resposta inválida:", erroTexto);
    alert("Erro do servidor: veja console.");
    return;
    }


    const modal = document.getElementById("modalAlterarSenha");
    const mensagem = document.getElementById("ModalAltSenhaMensagem");
    mensagem.textContent = resultado.mensagem;
    modal.style.display = "flex";

    if (resultado.status === "sucesso") {
        document.getElementById("form-alterar-senha").reset();
    }
});

document.getElementById("ModalAltSenha-button").addEventListener("click", () => {
    document.getElementById("modalAlterarSenha").style.display = "none";
});
