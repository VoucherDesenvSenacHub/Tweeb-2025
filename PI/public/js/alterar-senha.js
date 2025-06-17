// public/js/alterar-senha.js
document.getElementById("btnSalvarSenha").addEventListener("click", async () => {
    const senhaAtual = document.getElementById("senha-atual").value.trim();
    const novaSenha = document.getElementById("nova-senha").value.trim();
    const confirmarSenha = document.getElementById("confirmar-senha").value.trim();

    try {
        const resposta = await fetch("/Tweeb-2025/PI/App/user/Controllers/AlterarSenhaController.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({
                senha_atual: senhaAtual,
                nova_senha: novaSenha,
                confirmar_senha: confirmarSenha
            })
        });

        const texto = await resposta.text();
        let resultado = {};

        try {
            resultado = texto ? JSON.parse(texto) : { status: 'erro', mensagem: 'Resposta vazia do servidor' };
        } catch (e) {
            resultado = { status: 'erro', mensagem: 'Resposta inválida do servidor' };
        }

        // Modal personalizado
        if (resultado.mostrarModal) {
            const modal = document.getElementById("modalAlterarSenha");
            const mensagem = document.getElementById("ModalAltSenhaMensagem");
            const botao = document.getElementById("ModalAltSenha-button");
            const imagem = document.querySelector(".ModalAltSenha-img");

            mensagem.textContent = resultado.mensagem;
            modal.style.display = "flex";

            if (resultado.status === "sucesso") {
                imagem.src = "/Tweeb-2025/PI/public/assets/img/logo_img.png";
                mensagem.style.color = "green";
            } else {
                imagem.src = "/Tweeb-2025/PI/public/assets/img/logo_img.png";
                mensagem.style.color = "red";
            }

            botao.onclick = () => {
                modal.style.display = "none";
            };

            if (resultado.status === "sucesso") {
                document.getElementById("form-alterar-senha").reset();
            }
        }
    } catch (erro) {
        alert("Erro ao se comunicar com o servidor.");
        console.error("Erro:", erro);
    }
});