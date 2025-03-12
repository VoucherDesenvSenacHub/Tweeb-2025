
// FUNCIONANDO
// document.addEventListener("DOMContentLoaded", function () {
//     const btnEnviar = document.querySelector(".responder-orcamento-submit");
//     const divConteudo = document.querySelector(".responder-orcamento");

//     btnEnviar.addEventListener("click", function () {
//         // Esconde todos os elementos dentro de .responder-orcamento, mas mantém a div visível
//         Array.from(divConteudo.children).forEach(child => {
//             child.style.display = "none";
//         });
//     });
// });













// FUNCIONANDO
// document.addEventListener("DOMContentLoaded", function () {
//     const btnEnviar = document.querySelector(".responder-orcamento-submit");
//     const divConteudo = document.querySelector(".responder-orcamento");

//     const popUp = document.createElement("div");
//     popUp.classList.add("resp-orc-pop_pup-container");
//     popUp.style.display = "none"; 

//     popUp.innerHTML = `
//         <div class="resp-orc-pop_up-box">
//             <div class="close-button">
//                 <img src="../../../../public/assets/img/vector2.png" alt="close-button">
//             </div>
//             <h1 class="resp-orc-pop_up-h1">Você tem certeza?</h1>
//             <p class="resp-orc-pop_up-p">
//                 Ao confirmar, Jorge irá receber uma mensagem automática informando que não realizamos este serviço.
//             </p>
//             <div class="container-buttons-pop_up">
//                 <button class="pop_up-cancel">Não, Cancelar</button>
//                 <button class="pop_up-submit">Sim, Confirmar</button>
//             </div>
//         </div>
//     `;

//     divConteudo.appendChild(popUp);

//     btnEnviar.addEventListener("click", function () {
//         Array.from(divConteudo.children).forEach(child => {
//             if (child !== popUp) child.style.display = "none";
//         });

//         popUp.style.display = "flex";
//         popUp.style.justifyContent = "center";
//         popUp.style.alignItems = "center";
//         popUp.style.position = "absolute";
//         popUp.style.top = "50%";
//         popUp.style.left = "50%";
//         popUp.style.transform = "translate(-50%, -50%)";
//     });
// });








document.addEventListener("DOMContentLoaded", function () {
    const btnEnviar = document.querySelector(".responder-orcamento-submit");
    const divConteudo = document.querySelector(".responder-orcamento");
    
    // Criação do pop-up
    const popUp = document.createElement("div");
    popUp.classList.add("resp-orc-pop_pup-container");
    popUp.style.display = "none"; // Inicialmente oculto

    // Conteúdo do pop-up
    popUp.innerHTML = `
        <div class="resp-orc-pop_up-box">
            <div class="close-button">
                <img src="../../../../public/assets/img/Vector2.png" alt="close-button">
            </div>
            <h1 class="resp-orc-pop_up-h1">Você tem certeza?</h1>
            <p class="resp-orc-pop_up-p">
                Ao confirmar, Jorge irá receber uma mensagem automática informando que não realizamos este serviço.
            </p>
            <div class="container-buttons-pop_up">
                <button class="pop_up-cancel">Não, Cancelar</button>
                <button class="pop_up-submit">Sim, Confirmar</button>
            </div>
        </div>
    `;

    // Adiciona o pop-up ao DOM
    divConteudo.appendChild(popUp);

    // Exibe o pop-up ao clicar no botão "Enviar agora"
    btnEnviar.addEventListener("click", function () {
        // Esconde os elementos dentro da div .responder-orcamento
        Array.from(divConteudo.children).forEach(child => {
            if (child !== popUp) child.style.visibility = "hidden"; // Esconde sem afetar o layout
        });

        // Exibe o pop-up
        popUp.style.display = "flex";
        popUp.style.justifyContent = "center";
        popUp.style.alignItems = "center";
        popUp.style.position = "absolute";
        popUp.style.top = "50%";
        popUp.style.left = "50%";
        popUp.style.transform = "translate(-50%, -50%)";
    });

    // Função para esconder o pop-up e restaurar o conteúdo ao clicar no botão de fechar (X)
    const btnFechar = popUp.querySelector(".close-button"); // Seleciona o botão de fechar corretamente
    btnFechar.addEventListener("click", function() {
        // Esconde o pop-up
        popUp.style.display = "none";

        // Restaura os elementos originais da página principal
        Array.from(divConteudo.children).forEach(child => {
            if (child !== popUp) child.style.visibility = "visible"; // Restaura a visibilidade
        });
    });

    // Função para esconder o pop-up e restaurar o conteúdo ao clicar no botão "Não, Cancelar"
    const btnCancelar = popUp.querySelector(".pop_up-cancel"); // Seleciona o botão "Não, Cancelar"
    btnCancelar.addEventListener("click", function() {
        // Esconde o pop-up
        popUp.style.display = "none";

        // Restaura os elementos originais da página principal
        Array.from(divConteudo.children).forEach(child => {
            if (child !== popUp) child.style.visibility = "visible"; // Restaura a visibilidade
        });
    });
});


