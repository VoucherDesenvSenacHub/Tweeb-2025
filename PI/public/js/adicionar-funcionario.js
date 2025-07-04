document.addEventListener("DOMContentLoaded", function () {
    let form = document.querySelector(".funcionario-form");

    document.querySelector('.funcionario-form-cancelar').addEventListener('click', function () {
        let formreset = document.getElementById('form-funcionario');
        formreset.reset();

    });

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
            const response = await fetch('/Tweeb-2025/PI/app/adm/Controllers/CadastrarFuncionario.php', {
                method: 'POST',
                body: formData 
            });

            const texto = await response.text();
            console.log("Resposta bruta:", texto);

            try {
                const resultado = JSON.parse(texto);
                console.log("Resultado como JSON:", resultado);

                alert(resultado.mensagem);

                if (resultado.sucesso) {
                    window.location.href = "/Tweeb-2025/PI/app/adm/views/pages/addfuncionario.php";
                }
            } catch (e) {
                console.error("Erro ao converter para JSON:", e);
                alert("A resposta não está em formato JSON válido.");
            }

        } catch (erro) {
            console.error("Erro ao salvar funcionário:", erro);
            alert("Erro ao salvar funcionário. Tente novamente.");
        }
    });
});
