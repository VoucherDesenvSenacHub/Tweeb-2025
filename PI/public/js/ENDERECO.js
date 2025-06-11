    // Função para mostrar/ocultar o formulário de adicionar endereço
    document.getElementById("add-new-endereco-btn").addEventListener("click", function() {
        const form = document.getElementById("new-endereco-form");
        form.style.display = form.style.display === "none" ? "flex" : "none";
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
                <input type="radio" id="endereco" name="endereco" value="casa">
                <label class="endereco-label" for="endereco">${nome}</label>
                <div class="endereco-details">
                    <p>${detalhes}</p>
                    <p>${telefone}</p>
                </div>
            </label>
            <div class="endereco-actions">
                <button class="edit"><i class="fa fa-pencil"></i></button>
                <button class="delete"><i class="fa-solid fa-xmark"></i></button>
            </div>
        `;

        // Adicionar o novo endereço à lista
        document.getElementById("enderecos-list").appendChild(enderecoCard);

        // Limpar o formulário e escondê-lo
        document.getElementById("form-novo-endereco").reset();
        document.getElementById("new-endereco-form").style.display = "none";

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

// Lógica do CEP
document.addEventListener("DOMContentLoaded", function () {
    const cepInput = document.getElementById("cep_endereco");

    cepInput.addEventListener("blur", async function () {
        const cep = cepInput.value.replace(/\D/g, '');

        if (cep.length !== 8) return;

        try {
            const response = await fetch(`https://viacep.com.br/ws/${cep}/json/`);
            const data = await response.json();

            if (data.erro) {
                alert("CEP não encontrado.");
                return;
            }

            document.getElementById("rua_endereco").value = data.logradouro || '';
            document.getElementById("bairro_endereco").value = data.bairro || '';
            document.getElementById("cidade_endereco").value = data.localidade || '';
            document.getElementById("estado_endereco").value = data.uf || '';
        } catch (error) {
            console.error("Erro ao buscar CEP:", error);
            alert("Erro ao buscar o CEP. Tente novamente.");
        }
    });
});

document.getElementById('form-novo-endereco').addEventListener('submit', async function(event) {
    event.preventDefault();

    const formData = {
        nome: this.nome_endereco.value,
        cep: this.cep_endereco.value,
        rua: this.rua_endereco.value,
        numero: this.numero_endereco.value,
        bairro: this.bairro_endereco.value,
        cidade: this.cidade_endereco.value,
        estado: this.estado_endereco.value,
    };

    const response = await fetch('/Tweeb-2025/PI/app/user/Controllers/UserAddressController.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(formData)
    });

    const result = await response.json();

    if (result.sucesso) {
        alert(result.mensagem);
        location.reload();
    } else {
        alert('Erro: ' + result.mensagem);
    }
});






