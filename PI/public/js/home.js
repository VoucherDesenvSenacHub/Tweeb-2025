function AtivarCoracao(coracao) {
    if (coracao.src.includes('public/assets/img/heart_disabled.png')) {
        coracao.src = 'public/assets/img/heart_enabled.png';
    } else {
        coracao.src = 'public/assets/img/heart_disabled.png';
    }
}

// fazer o primeiro carrossel trocar de imagem automaticamente, tem que melhorar isso depois.

let radio = document.querySelector('.manual-btn');
let cont = 1;
document.getElementById('radio1').checked = true;

setInterval(() => {
    proximaImagem()
}, 5000)

function proximaImagem(){
    cont++
    if(cont>3){
        cont = 1
    }

    document.getElementById('radio'+cont).checked = true
}

/* configuração do Swiper para o segundo carrossel. */

// let swiper = new Swiper('.swiper-container', {
//     slidesPerView: 3,
//     spaceBetween: -30,
//     loop: true,
//     grabCursor: true,
//     navigation: {
//         nextEl: '.swiper-button-next',
//         prevEl: '.swiper-button-prev',
//       },
//       breakpoints: {
//         1300: {
//           slidesPerView: 3,
//         },
//         // arrumar na responsividade
//         600: {
//             slidesPerView: 2,
//             spaceBetween: 20,
//             autoHeight: true,
//             // direction: 'vertical'
//           },
//       }
//   });

/* botão de voltar */

// Obtem o botão
const botaoVoltarAoTopo = document.getElementById("voltarAoTopo");

// Mostrar o botão ao rolar a página
window.onscroll = function() {
    if (document.body.scrollTop > 1000 || document.documentElement.scrollTop > 1000) {
        botaoVoltarAoTopo.style.display = "block";
    } else {
        botaoVoltarAoTopo.style.display = "none";
    }
};

// Voltar ao topo ao clicar no botão
botaoVoltarAoTopo.onclick = function() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
};

// ========== ADICIONAR AO CARRINHO (HOME) ==========

document.addEventListener('DOMContentLoaded', function() {
    // Função para atualizar contador do carrinho na navbar
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

    atualizarContadorCarrinho(); // Atualiza ao carregar a página

    // Evento de clique para todos os botões de adicionar ao carrinho
    document.querySelectorAll('.add-carrinho-btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const idProduto = this.getAttribute('data-id');
            
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
                alert('Erro ao adicionar ao carrinho. Verifique sua conexão.');
            });
        });
    });
});

