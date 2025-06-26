document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector(".funcionario-form");

    form.addEventListener("submit", async function (e) {
        e.preventDefault();

        const formData = new FormData(form);
        const senha = formData.get("senha-funcionario");
        const confirmarSenha = formData.get("confirmar-senha");

        if (senha !== confirmarSenha) {
            alert("As senhas não coincidem.");
            return;
        }

        try {
            const response = await fetch("TWEEB-2025/PI/App/adm/Controllers/CadastrarFuncionario.php", {
                method: "POST",
                body: formData
            });

            const resultado = await response.json();

            alert(resultado.mensagem);

            if (resultado.sucesso) {
                window.location.href = "/PI/home.php";
            }
        } catch (erro) {
            console.error("Erro ao salvar funcionário:", erro);
            alert("Erro ao salvar funcionário. Tente novamente.");
        }
    });
});
