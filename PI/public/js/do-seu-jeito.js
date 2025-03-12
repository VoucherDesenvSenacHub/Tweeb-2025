// Seleciona todas as divisões de departamento
// const departamentos = document.querySelectorAll('.departamentos');

const listItems = document.querySelectorAll('.do-seu-jeito-ul-components li');


listItems.forEach(item => {
    item.addEventListener('click', function(event) {
        event.preventDefault(); // Impede o comportamento padrão do link
        
        // Remover a classe 'active' de todos os itens
        listItems.forEach(i => i.classList.remove('active'));
        
        // Adicionar a classe 'active' ao item clicado
        item.classList.add('active');
        
    });
});

// Função para aumentar ou diminuir a quantidade
function updateAmount(action, element) {
    // Encontra o elemento de quantidade dentro do produto
    const amountElement = element.closest('.do-seu-jeito-product').querySelector('.do-seu-jeito-amount');
    let currentAmount = amountElement.textContent.trim();

    // Se for "-", considera como 0
    if (currentAmount === '-') {
        currentAmount = 0;
    } else {
        currentAmount = parseInt(currentAmount);
    }

    // Atualiza a quantidade
    if (action === 'increase') {
        currentAmount += 1;
    } else if (action === 'decrease' && currentAmount > 0) {
        currentAmount -= 1;
    }

    // Atualiza o valor de quantidade
    amountElement.textContent = currentAmount > 0 ? currentAmount : '-';
}

// Adiciona eventos de clique para as setas
document.querySelectorAll('.do-seu-jeito-left-arrow').forEach(arrow => {
    arrow.addEventListener('click', (e) => {
        // console.log("clicou");
        updateAmount('decrease', e.target);
    });
});

document.querySelectorAll('.do-seu-jeito-right-arrow').forEach(arrow => {
    arrow.addEventListener('click', (e) => {
        // console.log("clicou");
        updateAmount('increase', e.target);
    });
});


// document.querySelectorAll('.do-seu-jeito-sub-bottom').forEach(botao => {
//     botao.addEventListener('click', (e) => {
//         ativarDiv();
//     });
// });
// // do-seu-jeito-sub-button

// document.querySelectorAll('.do-seu-jeito-sub-button').forEach(botao => {
//     botao.addEventListener('click', (e) => {
//         desativarDiv();
//     });
// });

// const verMais = document.getElementById('produto-ver-mais');

// function ativarDiv() {
//     verMais.classList.add('div-ativo');
//     verMais.classList.remove('div-desativado');
// }

// function desativarDiv() {
//     verMais.classList.add('div-desativado');
//     verMais.classList.remove('div-ativo');
// }

document.querySelectorAll('.do-seu-jeito-sub-bottom').forEach((botao, index) => {
    botao.addEventListener('click', () => {
        ativarDiv(index);
    });
});

document.querySelectorAll('.do-seu-jeito-sub-button').forEach((botao, index) => {
    botao.addEventListener('click', () => {
        desativarDiv(index);
    });
});

function ativarDiv(index) {
    // Seleciona o menu de detalhes do produto específico usando o índice
    const verMais = document.querySelectorAll('.produto-ver-mais')[index];
    verMais.classList.add('div-ativo');
    verMais.classList.remove('div-desativado');
}

function desativarDiv(index) {
    // Seleciona o menu de detalhes do produto específico usando o índice
    const verMais = document.querySelectorAll('.produto-ver-mais')[index];
    verMais.classList.add('div-desativado');
    verMais.classList.remove('div-ativo');
}
