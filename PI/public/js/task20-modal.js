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
        if (modal) {
            modal.style.display = "none"; // Esconde o modal
        }
    }
});

document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.g-card-botao, .c-card-botao, .e-card-botao, .p-card-botao, .s-card-botao').forEach(function(btn) {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            // Pega o id do produto do card
            let card = btn.closest('[class$="-produtos-card"]');
            let idProduto = card && card.querySelector('.add-carrinho-btn')?.getAttribute('data-id');
            if (!idProduto) {
                alert('Produto inválido!');
                return;
            }
            fetch('/Tweeb-2025/PI/App/user/Controllers/CarrinhoController.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'action=adicionar&id_produto=' + encodeURIComponent(idProduto) + '&quantidade=1'
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.href = '/Tweeb-2025/PI/App/user/View/pages/telaCarrinho.php';
                } else if (data.message && data.message.toLowerCase().includes('logado')) {
                    window.location.href = '/Tweeb-2025/PI/app/user/view/pages/login.php';
                } else {
                    alert('Erro ao adicionar ao carrinho: ' + (data.message || 'Erro desconhecido.'));
                    window.location.href = '/Tweeb-2025/PI/App/user/View/pages/telaCarrinho.php';
                }
            })
            .catch(error => {
                console.error('Erro:', error);
                window.location.href = '/Tweeb-2025/PI/App/user/View/pages/telaCarrinho.php';
            });
        });
    });
});

document.addEventListener('DOMContentLoaded', function() {
    // Ícone do carrinho: apenas adiciona ao carrinho, sem redirecionar
    document.querySelectorAll('.games-add-carrinho-btn').forEach(function(btn) {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            let idProduto = btn.getAttribute('data-id');
            if (!idProduto) {
                alert('Produto inválido!');
                return;
            }
            fetch('/Tweeb-2025/PI/App/user/Controllers/CarrinhoController.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'action=adicionar&id_produto=' + encodeURIComponent(idProduto) + '&quantidade=1'
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Produto adicionado ao carrinho!');
                } else if (data.message && data.message.toLowerCase().includes('logado')) {
                    window.location.href = '/Tweeb-2025/PI/app/user/view/pages/login.php';
                } else {
                    alert('Erro ao adicionar ao carrinho: ' + (data.message || 'Erro desconhecido.'));
                }
            })
            .catch(error => {
                console.error('Erro:', error);
                alert('Erro ao adicionar ao carrinho.');
            });
        });
    });

    // Botão Comprar Agora: redireciona para a tela de descrição do produto
    document.querySelectorAll('.games-card-botao').forEach(function(btn) {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            let card = btn.closest('.games-produtos-card');
            let idProduto = card && card.querySelector('.games-add-carrinho-btn')?.getAttribute('data-id');
            if (!idProduto) {
                alert('Produto inválido!');
                return;
            }
            window.location.href = '/Tweeb-2025/PI/App/user/View/pages/descproduto.php?id_produto=' + encodeURIComponent(idProduto);
        });
    });
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

