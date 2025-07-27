document.getElementById("add-new-endereco-btn").addEventListener("click", function () {
    const form = document.getElementById("new-endereco-form");
    form.style.display = form.style.display === "none" ? "block" : "none";
    document.getElementById("form-novo-endereco").reset();
    document.getElementById("id_endereco").value = ''; // limpa id
    
    // Limpar seleção ao abrir formulário de novo endereço
    localStorage.removeItem('enderecoSelecionado');
});

document.addEventListener("DOMContentLoaded", function () {
    const cepInput = document.getElementById("cep_endereco");
    cepInput.addEventListener("blur", async function () {
        const cep = cepInput.value.replace(/\D/g, '');
        if (cep.length !== 8) return;

        try {
            const response = await fetch(`https://viacep.com.br/ws/${cep}/json/`);
            const data = await response.json();

            if (data.erro) return alert("CEP não encontrado.");
            document.getElementById("rua_endereco").value = data.logradouro || '';
            document.getElementById("bairro_endereco").value = data.bairro || '';
            document.getElementById("cidade_endereco").value = data.localidade || '';
            document.getElementById("estado_endereco").value = data.uf || '';
        } catch (error) {
            console.error("Erro ao buscar CEP:", error);
            alert("Erro ao buscar o CEP. Tente novamente.");
        }
    });

    // SUBMIT form - Adicionar OU Editar endereço
    document.getElementById('form-novo-endereco').addEventListener('submit', async function (event) {
        event.preventDefault();

        const formData = {
            id_endereco: document.getElementById('id_endereco').value || null,
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
            // Limpar seleção ao adicionar/editar endereço
            localStorage.removeItem('enderecoSelecionado');
            location.reload();
        } else {
            alert('Erro: ' + result.mensagem);
        }
    });

    // Carregar endereços
    const listaEnderecos = document.getElementById("enderecos-list");
    fetch("/Tweeb-2025/PI/app/user/Controllers/UserGetAddressController.php")
        .then(response => response.json())
        .then(data => {
            const enderecos = data.enderecos;
            listaEnderecos.innerHTML = "";

            if (!enderecos || enderecos.length === 0) {
                listaEnderecos.innerHTML = "<p style='text-align:center; font-weight:bold;'>Sem Endereços cadastrados.</p>";
                return;
            }

            // Recuperar endereço selecionado do localStorage
            const enderecoSelecionado = localStorage.getItem('enderecoSelecionado');
            
            // Verificar se o endereço selecionado ainda existe
            const enderecoExiste = enderecos.some(endereco => endereco.id_endereco == enderecoSelecionado);
            if (enderecoSelecionado && !enderecoExiste) {
                localStorage.removeItem('enderecoSelecionado');
            }
            
            enderecos.forEach(endereco => {
                const card = document.createElement("div");
                card.classList.add("endereco-card");
                card.dataset.id = endereco.id_endereco;

                card.innerHTML = `
                    <label>
                        <input type="radio" name="endereco" value="${endereco.nome_endereco ?? ''}" data-endereco-id="${endereco.id_endereco}">
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

                // Evento editar
                card.querySelector(".edit").addEventListener("click", () => {
                    document.getElementById("id_endereco").value = endereco.id_endereco;
                    document.getElementById("nome_endereco").value = endereco.nome_endereco;
                    document.getElementById("cep_endereco").value = endereco.cep;
                    document.getElementById("rua_endereco").value = endereco.rua;
                    document.getElementById("numero_endereco").value = endereco.numero;
                    document.getElementById("bairro_endereco").value = endereco.bairro;
                    document.getElementById("cidade_endereco").value = endereco.cidade;
                    document.getElementById("estado_endereco").value = endereco.estado;

                    document.getElementById("new-endereco-form").style.display = "block";
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                });

                // Evento de seleção do radio button
                const radioButton = card.querySelector('input[type="radio"]');
                
                // Verificar se este endereço estava selecionado anteriormente
                if (enderecoSelecionado && enderecoSelecionado == endereco.id_endereco) {
                    radioButton.checked = true;
                }
                
                radioButton.addEventListener('change', function() {
                    if (this.checked) {
                        // Salvar a seleção no localStorage
                        localStorage.setItem('enderecoSelecionado', endereco.id_endereco);
                        console.log('Endereço selecionado:', endereco.id_endereco);
                    }
                });

                // Evento deletar
                card.querySelector(".delete").addEventListener("click", () => {
                    if (confirm("Tem certeza que deseja deletar este endereço?")) {
                        fetch(`/Tweeb-2025/PI/app/user/Controllers/UserDeleteAddressController.php?id=${endereco.id_endereco}`, {
                            method: "DELETE"
                        })
                            .then(res => res.json())
                            .then(res => {
                                if (res.sucesso) {
                                    // Se o endereço deletado era o selecionado, limpar a seleção
                                    if (localStorage.getItem('enderecoSelecionado') == endereco.id_endereco) {
                                        localStorage.removeItem('enderecoSelecionado');
                                    }
                                    card.remove();
                                    alert("Endereço deletado com sucesso!");
                                } else {
                                    alert("Erro ao deletar endereço.");
                                }
                            })
                            .catch(() => alert("Erro ao conectar com o servidor."));
                    }
                });

                listaEnderecos.appendChild(card);
            });
        })
        .catch(error => {
            console.error("Erro ao carregar endereços:", error);
            listaEnderecos.innerHTML = "<p style='text-align:center; font-weight:bold;'>Erro ao carregar endereços.</p>";
        });
});
