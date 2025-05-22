
document.addEventListener("DOMContentLoaded", () => {
    const botaoEditarFoto = document.querySelector(".perfil-tweeb-editar-foto");  // Ícone de editar
    const camposInput = document.querySelectorAll(".perfil-tweeb-form input:not(#cpf)");
    const botaoSalvar = document.querySelector(".perfil-tweeb-salvar");
    const botaoCancelar = document.querySelector(".perfil-tweeb-cancelar");
    const botaoExcluir = document.querySelector(".perfil-tweeb-excluir")
    const header = document.querySelector(".perfil-tweeb-header");  // Seleciona o cabeçalho

    // Inicia desativando os campos
    camposInput.forEach(input => input.setAttribute("disabled", "true"));

    // Oculta botões "Salvar" e "Cancelar" no início
    botaoSalvar.style.display = "none";
    botaoCancelar.style.display = "none";
    botaoExcluir.style.display  = "none";

   

    // Torna os campos editáveis ao clicar no ícone de editar
    botaoEditarFoto.addEventListener("click", () => {
        camposInput.forEach(input => input.removeAttribute("disabled"));
        
        // Exibe botões de ação
        botaoSalvar.style.display = "inline-block";
        botaoCancelar.style.display = "inline-block";
        botaoExcluir.style.display  = "inline-block";

        // Adiciona a classe para aumentar o margin-top
        header.classList.add("margin-top-aumentado");
    });

    // // Simula o envio do formulário ao clicar em "Salvar alteração"
    // botaoSalvar.addEventListener("click", (event) => {
    //     event.preventDefault();
    //     alert("Alterações salvas com sucesso!");
    //     camposInput.forEach(input => input.setAttribute("disabled", "true"));
        
    //     // Esconde os botões novamente
    //     botaoSalvar.style.display = "none";
    //     botaoCancelar.style.display = "none";

    //     // Remove a classe para voltar o margin-top ao normal
    //     header.classList.remove("margin-top-aumentado");
    // });
    
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

        // Remove a classe para voltar o margin-top ao normal
        header.classList.remove("margin-top-aumentado");
    });
});

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

document.addEventListener("DOMContentLoaded", () => {
    document.getElementById("cep").addEventListener("blur", async function () {
        const cep = this.value.replace(/\D/g, "");

        if (cep.length === 8) {
            const response = await fetch(`https://viacep.com.br/ws/${cep}/json/`);
            const data = await response.json();

            if (!data.erro) {
                document.getElementById("rua").value = 
                    `${data.logradouro}`;
                document.getElementById("bairro").value = 
                    `${data.bairro}`;
                document.getElementById("cidade").value = 
                    `${data.localidade}`;
                document.getElementById("estado").value = 
                    `${data.estado}`;
            } else {
                alert("CEP não encontrado. Preencha o endereço manualmente.");
            }
        }
    });
});


