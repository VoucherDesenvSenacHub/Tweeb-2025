
function VerMaisComentarios() {
    const comentarios = document.getElementById("reviews-comentarios");
    let alturaAtual = parseInt(comentarios.style.height, 10);

    // Verifica se alturaAtual é um número válido
    if (isNaN(alturaAtual)) {
        alturaAtual = 0; // Define a altura inicial como 0 se não houver altura definida
    }

    comentarios.style.height = `${alturaAtual + 980}px`;
}

// function AtivarCoracao(coracao) {
//     if (coracao.src.includes('../assets/img/heart_disabled')) {
//         coracao.src = '../../../../public/assets/img/heart_enabled.png';
//     } else {
//         coracao.src = '../../../../public/assets/img/heart_disabled.png';
//     }
// }

function AtivarCoracao(coracao) {
    if (coracao.src.includes('public/assets/img/heart_disabled.png')) {
        coracao.src = '../../../../public/assets/img/heart_enabled.png';
    } else {
        coracao.src = '../../../../public/assets/img/heart_disabled.png';
    }
}

// ========== FUNÇÃO PARA ATUALIZAR CONTADOR DO CARRINHO ==========
function atualizarContadorCarrinho() {
    fetch('/Tweeb-2025/PI/App/user/Controllers/CarrinhoController.php?action=contar_itens')
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            let contador = document.querySelector('.carrinho-contador');
            if (!contador) {
                // Cria o contador se não existir
                const nav = document.querySelector('.bx-cart-alt')?.parentElement;
                if (nav) {
                    contador = document.createElement('span');
                    contador.className = 'carrinho-contador';
                    contador.style.position = 'absolute';
                    contador.style.top = '0';
                    contador.style.right = '0';
                    contador.style.background = 'red';
                    contador.style.color = 'white';
                    contador.style.borderRadius = '50%';
                    contador.style.fontSize = '12px';
                    contador.style.width = '18px';
                    contador.style.height = '18px';
                    contador.style.display = 'flex';
                    contador.style.alignItems = 'center';
                    contador.style.justifyContent = 'center';
                    nav.style.position = 'relative';
                    nav.appendChild(contador);
                }
            }
            if (contador) {
                contador.textContent = data.contagem;
                contador.style.display = data.contagem > 0 ? 'flex' : 'none';
            }
        }
    })
    .catch(error => {
        console.error('Erro ao atualizar contador:', error);
    });
}

// Atualiza o contador ao carregar a página
document.addEventListener('DOMContentLoaded', function() {
    atualizarContadorCarrinho();
});

document.addEventListener('DOMContentLoaded', function() {
    // Captura o botão Comprar Agora
    const btnComprarAgora = document.querySelector('.comprar-agora');
    if (btnComprarAgora) {
        btnComprarAgora.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            const idProduto = window.ID_PRODUTO_DESC;
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
                    atualizarContadorCarrinho();
                    window.location.href = '/Tweeb-2025/PI/App/user/View/pages/telaCarrinho.php';
                } else if (data.message && (data.message.toLowerCase().includes('logado') || data.message.toLowerCase().includes('login'))) {
                    if (confirm('Você precisa estar logado para adicionar produtos ao carrinho. Deseja ir para a página de login?')) {
                        window.location.href = '/Tweeb-2025/PI/app/user/view/pages/login.php';
                    }
                } else {
                    // Mesmo em caso de erro, tenta redirecionar para o carrinho
                    alert('Erro ao adicionar ao carrinho: ' + (data.message || 'Erro desconhecido.'));
                    window.location.href = '/Tweeb-2025/PI/App/user/View/pages/telaCarrinho.php';
                }
            })
            .catch(error => {
                console.error('Erro:', error);
                // Em caso de erro de rede, ainda assim tenta redirecionar para o carrinho
                window.location.href = '/Tweeb-2025/PI/App/user/View/pages/telaCarrinho.php';
            });
        });
    }

    // Captura o botão Adicionar ao Carrinho
    const btnAddCarrinho = document.querySelector('.add-carrinho');
    if (btnAddCarrinho) {
        btnAddCarrinho.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            const idProduto = window.ID_PRODUTO_DESC;
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
                    atualizarContadorCarrinho();
                    alert('Produto adicionado ao carrinho!');
                } else {
                    // Verifica se é erro de usuário não logado
                    if (data.message && (data.message.toLowerCase().includes('logado') || data.message.toLowerCase().includes('login'))) {
                        if (confirm('Você precisa estar logado para adicionar produtos ao carrinho. Deseja ir para a página de login?')) {
                            window.location.href = '/Tweeb-2025/PI/app/user/view/pages/login.php';
                        }
                    } else {
                        alert('Erro ao adicionar ao carrinho: ' + (data.message || 'Erro desconhecido.'));
                    }
                }
            })
            .catch(error => {
                console.error('Erro:', error);
                alert('Erro ao adicionar ao carrinho.');
            });
        });
    }
});