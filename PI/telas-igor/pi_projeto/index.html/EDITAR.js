    document.addEventListener("DOMContentLoaded", function() {
        const form = document.querySelector(".perfil-form");
        const perfilNome = document.querySelector(".perfil-info h2");
        const perfilEmail = document.querySelector(".perfil-info p");
        const perfilPic = document.querySelector(".perfil-pic");
        const inputFile = document.createElement("input");

        // Preencher os campos de exemplo com dados iniciais
        document.getElementById("nome").value = "Igor";
        document.getElementById("sobrenome").value = "Medeiros";
        document.getElementById("email").value = "igormedeiros@gmail.com";
        document.getElementById("telefone").value = "(67) 1234-5678";
        document.getElementById("endereco").value = "Rua das Flores, 123";
        document.getElementById("cep").value = "79000-000";

        // Adicionar evento para troca de imagem ao clicar na foto
        perfilPic.addEventListener("click", function() {
            inputFile.type = "file";
            inputFile.accept = "image/*";
            inputFile.click(); // Simula o clique para abrir o seletor de arquivos

            // Evento para atualizar a foto de perfil
            inputFile.addEventListener("change", function() {
                const file = inputFile.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        perfilPic.src = e.target.result; // Atualiza a foto de perfil com a imagem selecionada
                    };
                    reader.readAsDataURL(file);
                }
            });
        });

        // Evento para salvar alterações
        form.addEventListener("submit", function(event) {
            event.preventDefault();

            // Coletar os novos valores
            const nome = document.getElementById("nome").value;
            const sobrenome = document.getElementById("sobrenome").value;
            const email = document.getElementById("email").value;

            // Atualizar os dados de perfil
            perfilNome.textContent = `${nome} ${sobrenome}`;
            perfilEmail.textContent = email;

            // Exibir mensagem de sucesso
            alert("Alterações salvas com sucesso!");
        });

        // Cancelar as alterações (opcional)
        document.querySelector(".btn-cancel").addEventListener("click", function() {
            if (confirm("Deseja cancelar as alterações? As mudanças não serão salvas.")) {
                form.reset();
            }
        });
    });
