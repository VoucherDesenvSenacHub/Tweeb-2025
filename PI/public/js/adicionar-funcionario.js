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


        const dados_php = await fetch("/Tweeb-2025/PI/App/adm/Controllers/CadastrarFuncionario.php", {
            method: "POST",
            body: formData
        });

        
        const response = await dados_php.json();

        console.log(response);

        if (!response.sucesso) {
            throw new Error("Erro na requisição: " + response.mensagem);
        }

        alert(response.mensagem);

        if (response.sucesso) {
            form.reset();
        }
    });
});
