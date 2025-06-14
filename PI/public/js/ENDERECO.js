    // Função para mostrar/ocultar o formulário de adicionar endereço
    document.getElementById("add-new-endereco-btn").addEventListener("click", function() {
        const form = document.getElementById("new-endereco-form");
        form.style.display = form.style.display === "none" ? "flex" : "none";
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

// API DO CEP
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

// Adicionando endereco
document.getElementById('form-novo-endereco').addEventListener('submit', async function(event) {
    event.preventDefault();

    const formData = {
        nome_endereco: document.getElementById('nome_endereco').value,
        cep: document.getElementById('cep_endereco').value,
        rua: document.getElementById('rua_endereco').value,
        numero: document.getElementById('numero_endereco').value,
        bairro: document.getElementById('bairro_endereco').value,
        cidade: document.getElementById('cidade_endereco').value,
        estado: document.getElementById('estado_endereco').value,
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


  document.addEventListener("DOMContentLoaded", () => {
        const listaEnderecos = document.getElementById("enderecos-list");

        fetch("/Tweeb-2025/PI/app/user/Controllers/UserGetAddressController.php")
            .then(response => response.json())
            .then(resposta => {
                listaEnderecos.innerHTML = ""; // limpa antes de preencher

                // Verifica se deu certo e se há endereços
                if (!resposta.sucesso || !Array.isArray(resposta.enderecos) || resposta.enderecos.length === 0) {
                    listaEnderecos.innerHTML = "<p style='text-align:center; font-weight:bold;'>Sem Endereços cadastrados.</p>";
                    return;
                }

                resposta.enderecos.forEach(endereco => {
                    const card = document.createElement("div");
                    card.classList.add("endereco-card");

                    card.innerHTML = `
                        <label>
                            <input type="radio" name="endereco" value="${endereco.nome_endereco ?? ''}">
                            <label class="endereco-label">${endereco.nome_endereco ?? 'Endereço'}</label>
                            <div class="endereco-details">
                                <p>${endereco.rua}, ${endereco.numero}, ${endereco.bairro}</p>
                                <p>${endereco.cidade} - ${endereco.estado} - ${endereco.cep}</p>
                            </div>
                        </label>
                        <div class="endereco-actions">
                            <button class="edit"><i class="fa fa-pencil"></i></button>
                            <button class="delete"><i class="fa-solid fa-xmark"></i></button>
                        </div>
                    `;

                    listaEnderecos.appendChild(card);
                });
            })
            .catch(error => {
                console.error("Erro ao carregar endereços:", error);
                listaEnderecos.innerHTML = "<p style='text-align:center; font-weight:bold;'>Erro ao carregar endereços.</p>";
            });
    });



