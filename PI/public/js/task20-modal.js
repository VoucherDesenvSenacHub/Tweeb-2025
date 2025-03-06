//FUNCIONANDO
// document.addEventListener("DOMContentLoaded", function() {
//     // Seleciona todas as divs "config-box"
//     const configButtons = document.querySelectorAll(".config-box");
//     const modal = document.querySelector(".info-modal-container");

//     configButtons.forEach(button => {
//         button.addEventListener("click", function() {
//             // Encontra o elemento pai do produto (a div "kitsetup-products_box")
//             const productBox = this.closest(".kitsetup-products_box");

//             if (productBox) {
//                 productBox.style.display = "none"; // Esconde o produto
//             }

//             // Exibe o modal
//             if (modal) {
//                 modal.style.display = "flex"; // Mostra o modal
//             }
//         });
//     });
// });

//FUNCIONANDO
// document.addEventListener("DOMContentLoaded", function() {
//     const configButtons = document.querySelectorAll(".config-box");
//     const modal = document.querySelector(".info-modal-container");

//     configButtons.forEach(button => {
//         button.addEventListener("click", function() {
//             const productBox = this.closest(".kitsetup-products_box");

//             if (productBox) {
//                 // Obtém a posição e tamanho do produto antes de escondê-lo
//                 const rect = productBox.getBoundingClientRect();
                
//                 // Define as mesmas dimensões e posição para o modal
//                 modal.style.position = "absolute";
//                 modal.style.top = `${rect.top + window.scrollY}px`;
//                 modal.style.left = `${rect.left + window.scrollX}px`;
//                 modal.style.width = `${rect.width}px`;
//                 modal.style.height = `${rect.height}px`;

//                 // Esconde o produto
//                 productBox.style.display = "none";

//                 // Mostra o modal
//                 modal.style.display = "flex";
//             }
//         });
//     });
// });


//FUNCIONANDO
// document.addEventListener("DOMContentLoaded", function() {
//     const configButtons = document.querySelectorAll(".config-box");
//     const modal = document.querySelector(".info-modal-container");

//     configButtons.forEach(button => {
//         button.addEventListener("click", function() {
//             const productBox = this.closest(".kitsetup-products_box");

//             if (productBox) {
//                 // Obtém a posição e tamanho do produto antes de escondê-lo
//                 const rect = productBox.getBoundingClientRect();

//                 // Define as mesmas dimensões e posição para o modal
//                 modal.style.position = "absolute";
//                 modal.style.top = `${rect.top + window.scrollY}px`;
//                 modal.style.left = `${rect.left + window.scrollX}px`;
//                 modal.style.width = `${rect.width}px`;
//                 modal.style.height = `${rect.height}px`;

//                 // Mantém o espaço do produto, mas o torna invisível
//                 productBox.style.visibility = "hidden";

//                 // Mostra o modal
//                 modal.style.display = "flex";
//             }
//         });
//     });
// });

document.addEventListener("DOMContentLoaded", function() {
    const configButtons = document.querySelectorAll(".kitsetup-config-box");
    const modal = document.querySelector(".kitsetup-info-modal-container");

    let currentProductBox = null; // Armazena o produto que foi escondido

    configButtons.forEach(button => {
        button.addEventListener("click", function(event) {
            event.stopPropagation(); // Impede que o clique propague para o `document`

            // Se houver um modal aberto, fecha antes de abrir outro
            closeModal();

            currentProductBox = this.closest(".kitsetup-products_box");

            if (currentProductBox) {
                // Obtém a posição e tamanho do produto antes de escondê-lo
                const rect = currentProductBox.getBoundingClientRect();

                // Define as mesmas dimensões e posição para o modal
                modal.style.position = "absolute";
                modal.style.top = `${rect.top + window.scrollY}px`;
                modal.style.left = `${rect.left + window.scrollX}px`;
                modal.style.width = `${rect.width}px`;
                modal.style.height = `${rect.height}px`;

                // Mantém o espaço do produto, mas o torna invisível
                currentProductBox.style.visibility = "hidden";

                // Mostra o modal
                modal.style.display = "flex";
            }
        });
    });

    // Fecha o modal ao clicar fora dele
    document.addEventListener("click", function() {
        closeModal();
    });

    // Impede o fechamento ao clicar dentro do modal
    modal.addEventListener("click", function(event) {
        event.stopPropagation();
    });

    function closeModal() {
        if (currentProductBox) {
            currentProductBox.style.visibility = "visible"; // Restaura o produto
            currentProductBox = null;
        }
        modal.style.display = "none"; // Esconde o modal
    }
});



// CORAÇÃO

// Selecione todos os ícones de like
const heartIcons = document.querySelectorAll('.kitsetup-heart-icon-box img');

// Para cada ícone, adicione um ouvinte de evento para o clique
heartIcons.forEach(heartIcon => {
    heartIcon.addEventListener('click', () => {
        // Verifique a imagem atual e altere para o outro ícone
        if (heartIcon.src.includes('heart_disabled')) {
            heartIcon.src = '../../../../public/assets/img/heart_enabled.png';
        } else {
            heartIcon.src = '../../../../public/assets/img/heart_disabled.png';
        }
    });
});

