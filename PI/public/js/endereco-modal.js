// document.addEventListener("DOMContentLoaded", function () {
//     // Seleciona todos os botões de editar
//     const editarButtons = document.querySelectorAll(".editar-endereco");
    
//     // Cria o modal de edição (usando JavaScript)
//     const modal = document.createElement("div");
//     modal.id = "modal-editar-endereco";
//     modal.style.display = "none";  // Inicialmente escondido
//     modal.style.position = "fixed";
//     modal.style.top = "0";
//     modal.style.left = "0";
//     modal.style.width = "100%";
//     modal.style.height = "100%";
//     modal.style.backgroundColor = "rgba(0, 0, 0, 0.5)";
//     modal.style.zIndex = "1000";
//     modal.style.flexDirection = "column";

//     const modalContent = document.createElement("div");
//     modalContent.style.backgroundColor = "#fff";
//     modalContent.style.margin = "20% auto";
//     modalContent.style.padding = "40px";
//     modalContent.style.width = "60%";
//     modalContent.style.maxWidth = "600px";
//     modalContent.style.borderRadius = "8px";
//     modalContent.style.height = "200px";
//     modalContent.style.marginTop = "20%";

//     const closeButton = document.createElement("span");
//     closeButton.innerHTML = "&times;";
//     closeButton.style.fontSize = "20px";
//     closeButton.style.fontWeight = "bold";
//     closeButton.style.cursor = "pointer";
//     closeButton.style.float = "right";
//     closeButton.addEventListener("click", function () {
//         modal.style.display = "none";
//     });

//     // Criação do formulário
//     const form = document.createElement("form");
//     form.id = "form-editar-endereco";

//     const nomeLabel = document.createElement("label");
//     nomeLabel.setAttribute("for", "nome-endereco");
//     nomeLabel.innerText = "Nome (ex: Casa, Trabalho):";
//     const nomeInput = document.createElement("input");
//     nomeInput.type = "text";
//     nomeInput.id = "nome-endereco";
//     nomeInput.required = true;

//     const enderecoLabel = document.createElement("label");
//     enderecoLabel.setAttribute("for", "endereco-detalhes");
//     enderecoLabel.innerText = "Endereço Completo:";
//     const enderecoInput = document.createElement("input");
//     enderecoInput.type = "text";
//     enderecoInput.id = "endereco-detalhes";
//     enderecoInput.required = true;

//     const telefoneLabel = document.createElement("label");
//     telefoneLabel.setAttribute("for", "telefone-endereco");
//     telefoneLabel.innerText = "Telefone:";
//     const telefoneInput = document.createElement("input");
//     telefoneInput.type = "text";
//     telefoneInput.id = "telefone-endereco";
//     telefoneInput.required = true;

//     const padraoLabel = document.createElement("label");
//     padraoLabel.setAttribute("for", "tornar-padrao");
//     padraoLabel.innerText = "Tornar Endereço Padrão:";
//     const padraoSelect = document.createElement("select");
//     padraoSelect.id = "tornar-padrao";
//     const optionSim = document.createElement("option");
//     optionSim.value = "sim";
//     optionSim.innerText = "Sim";
//     const optionNao = document.createElement("option");
//     optionNao.value = "nao";
//     optionNao.innerText = "Não";
//     padraoSelect.appendChild(optionSim);
//     padraoSelect.appendChild(optionNao);

//     const submitButton = document.createElement("button");
//     submitButton.type = "submit";
//     submitButton.classList.add("btoes-endereco");
//     submitButton.innerText = "Salvar Endereço";

//     form.appendChild(nomeLabel);
//     form.appendChild(nomeInput);
//     form.appendChild(enderecoLabel);
//     form.appendChild(enderecoInput);
//     form.appendChild(telefoneLabel);
//     form.appendChild(telefoneInput);
//     form.appendChild(padraoLabel);
//     form.appendChild(padraoSelect);
//     form.appendChild(submitButton);

//     modalContent.appendChild(closeButton);
//     modalContent.appendChild(form);

//     modal.appendChild(modalContent);
//     document.body.appendChild(modal);

//     // Função para preencher os campos do modal com os dados do endereço
//     function preencherModal(card) {
//         const nome = card.querySelector(".endereco-label").innerText;
//         const endereco = card.querySelector(".endereco-details p:first-child").innerText;
//         const telefone = card.querySelector(".endereco-details p:nth-child(2)").innerText;

//         document.getElementById("nome-endereco").value = nome;
//         document.getElementById("endereco-detalhes").value = endereco;
//         document.getElementById("telefone-endereco").value = telefone;
//     }

//     // Evento de clique no botão de editar
//     editarButtons.forEach(function (button) {
//         button.addEventListener("click", function () {
//             const enderecoCard = button.closest(".endereco-card");
//             preencherModal(enderecoCard);
//             modal.style.display = "block"; // Exibe o modal
//         });
//     });

//     // Função para salvar as alterações do formulário
//     form.addEventListener("submit", function (event) {
//         event.preventDefault();

//         const nome = document.getElementById("nome-endereco").value;
//         const endereco = document.getElementById("endereco-detalhes").value;
//         const telefone = document.getElementById("telefone-endereco").value;
//         const padrao = document.getElementById("tornar-padrao").value;

    

//         // Fechar o modal
//         modal.style.display = "none";
//     });
// });


document.addEventListener("DOMContentLoaded", function () {
    // Seleciona todos os botões de editar
    const editarButtons = document.querySelectorAll(".editar-endereco");
    
    // Cria o modal de edição (usando JavaScript)
    const modal = document.createElement("div");
    modal.id = "modal-editar-endereco";
    modal.style.display = "none";  // Inicialmente escondido
    modal.style.position = "fixed";
    modal.style.top = "0";
    modal.style.left = "0";
    modal.style.width = "100%";
    modal.style.height = "100%";
    modal.style.backgroundColor = "rgba(0, 0, 0, 0.5)";
    modal.style.zIndex = "1000";
    modal.style.flexDirection = "column";

    const modalContent = document.createElement("div");
    modalContent.style.backgroundColor = "#fff";
    modalContent.style.margin = "20% auto";
    modalContent.style.padding = "40px";
    modalContent.style.width = "60%";
    modalContent.style.maxWidth = "600px";
    modalContent.style.borderRadius = "8px";
    modalContent.style.height = "auto";  // Ajustando a altura do modal

    const closeButton = document.createElement("span");
    closeButton.innerHTML = "&times;";
    closeButton.style.fontSize = "20px";
    closeButton.style.fontWeight = "bold";
    closeButton.style.cursor = "pointer";
    closeButton.style.float = "right";
    closeButton.addEventListener("click", function () {
        modal.style.display = "none";
    });

    // Criação do formulário
    const form = document.createElement("form");
    form.id = "form-editar-endereco";

    // Estilizando os labels e inputs
    const style = document.createElement('style');
    style.innerHTML = `
        #form-editar-endereco label {
            display: block;
            margin-bottom: 8px;
            font-size: 16px;
        }
        #form-editar-endereco input, #form-editar-endereco select {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        #form-editar-endereco button {
            padding: 12px 20px;
            background-color: #291E40;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
            margin-bottom: 20px;
        }
        #form-editar-endereco button:hover {
            background-color: #BF99FE;
        }
    `;
    document.head.appendChild(style);

    const nomeLabel = document.createElement("label");
    nomeLabel.setAttribute("for", "nome-endereco");
    nomeLabel.innerText = "Nome (ex: Casa, Trabalho):";
    const nomeInput = document.createElement("input");
    nomeInput.type = "text";
    nomeInput.id = "nome-endereco";
    nomeInput.required = true;

    const enderecoLabel = document.createElement("label");
    enderecoLabel.setAttribute("for", "endereco-detalhes");
    enderecoLabel.innerText = "Endereço Completo:";
    const enderecoInput = document.createElement("input");
    enderecoInput.type = "text";
    enderecoInput.id = "endereco-detalhes";
    enderecoInput.required = true;

    const telefoneLabel = document.createElement("label");
    telefoneLabel.setAttribute("for", "telefone-endereco");
    telefoneLabel.innerText = "Telefone:";
    const telefoneInput = document.createElement("input");
    telefoneInput.type = "text";
    telefoneInput.id = "telefone-endereco";
    telefoneInput.required = true;

    const padraoLabel = document.createElement("label");
    padraoLabel.setAttribute("for", "tornar-padrao");
    padraoLabel.innerText = "Tornar Endereço Padrão:";
    const padraoSelect = document.createElement("select");
    padraoSelect.id = "tornar-padrao";
    const optionSim = document.createElement("option");
    optionSim.value = "sim";
    optionSim.innerText = "Sim";
    const optionNao = document.createElement("option");
    optionNao.value = "nao";
    optionNao.innerText = "Não";
    padraoSelect.appendChild(optionSim);
    padraoSelect.appendChild(optionNao);

    const submitButton = document.createElement("button");
    submitButton.type = "submit";
    submitButton.classList.add("btoes-endereco");
    submitButton.innerText = "Salvar Endereço";

    form.appendChild(nomeLabel);
    form.appendChild(nomeInput);
    form.appendChild(enderecoLabel);
    form.appendChild(enderecoInput);
    form.appendChild(telefoneLabel);
    form.appendChild(telefoneInput);
    form.appendChild(padraoLabel);
    form.appendChild(padraoSelect);
    form.appendChild(submitButton);

    modalContent.appendChild(closeButton);
    modalContent.appendChild(form);

    modal.appendChild(modalContent);
    document.body.appendChild(modal);

    // Função para preencher os campos do modal com os dados do endereço
    function preencherModal(card) {
        const nome = card.querySelector(".endereco-label").innerText;
        const endereco = card.querySelector(".endereco-details p:first-child").innerText;
        const telefone = card.querySelector(".endereco-details p:nth-child(2)").innerText;

        document.getElementById("nome-endereco").value = nome;
        document.getElementById("endereco-detalhes").value = endereco;
        document.getElementById("telefone-endereco").value = telefone;
    }

    // Evento de clique no botão de editar
    editarButtons.forEach(function (button) {
        button.addEventListener("click", function () {
            const enderecoCard = button.closest(".endereco-card");
            preencherModal(enderecoCard);
            modal.style.display = "block"; // Exibe o modal
        });
    });

    // Função para salvar as alterações do formulário
    form.addEventListener("submit", function (event) {
        event.preventDefault();

        const nome = document.getElementById("nome-endereco").value;
        const endereco = document.getElementById("endereco-detalhes").value;
        const telefone = document.getElementById("telefone-endereco").value;
        const padrao = document.getElementById("tornar-padrao").value;

        

        // Fechar o modal
        modal.style.display = "none";
    });
});
