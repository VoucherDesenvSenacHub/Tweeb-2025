    // Função para mostrar/ocultar o formulário de adicionar endereço
    document.getElementById("add-new-endereco-btn").addEventListener("click", function() {
        const form = document.getElementById("new-endereco-form");
        form.style.display = form.style.display === "none" ? "block" : "none";
    });

    // Função para adicionar novo endereço
    document.getElementById("form-novo-endereco").addEventListener("submit", function(event) {
        event.preventDefault();

        // Coletar os dados do formulário
        const nome = document.getElementById("nome-endereco").value;
        const detalhes = document.getElementById("endereco-detalhes").value;
        const telefone = document.getElementById("telefone-endereco").value;

        // Criar novo endereço
        const enderecoCard = document.createElement("div");
        enderecoCard.classList.add("endereco-card");

        enderecoCard.innerHTML = `
            <label>
                <input type="radio" name="endereco">
                <div class="endereco-details">
                    <p><strong>${nome}</strong></p>
                    <p>${detalhes}</p>
                    <p>${telefone}</p>
                </div>
            </label>
            <div class="endereco-actions">
                <button class="edit"><i class="fa fa-pencil"></i></button>
                <button class="delete"><i class="fa fa-trash"></i></button>
            </div>
        `;

        // Adicionar o novo endereço à lista
        document.getElementById("enderecos-list").appendChild(enderecoCard);

        // Limpar o formulário e escondê-lo
        document.getElementById("form-novo-endereco").reset();
        document.getElementById("new-endereco-form").style.display = "none";

        // Adicionar eventos para os botões de edição e exclusão
        addEnderecoEventListeners(enderecoCard);
    });

    // Função para adicionar eventos de edição e exclusão
    function addEnderecoEventListeners(card) {
        // Botão de editar
        card.querySelector(".edit").addEventListener("click", function() {
            const nome = card.querySelector(".endereco-details p:nth-child(1) strong").innerText;
            const detalhes = card.querySelector(".endereco-details p:nth-child(2)").innerText;
            const telefone = card.querySelector(".endereco-details p:nth-child(3)").innerText;

            // Preencher o formulário com os dados existentes
            document.getElementById("nome-endereco").value = nome;
            document.getElementById("endereco-detalhes").value = detalhes;
            document.getElementById("telefone-endereco").value = telefone;

            // Mostrar o formulário
            document.getElementById("new-endereco-form").style.display = "block";

            // Remover o endereço antigo
            card.remove();
        });

        // Botão de excluir
        card.querySelector(".delete").addEventListener("click", function() {
            card.remove();
        });
    }

    // Adicionar os eventos iniciais para os endereços existentes
    document.querySelectorAll(".endereco-card").forEach(addEnderecoEventListeners);
