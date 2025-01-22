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

let swiper = new Swiper('.swiper-container', {
    slidesPerView: 3,
    spaceBetween: 30,
    loop: true,
    grabCursor: true,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
  });

/* botão de voltar */

// Obtem o botão
const botaoVoltarAoTopo = document.getElementById("voltarAoTopo");

// Mostrar o botão ao rolar a página
window.onscroll = function() {
    if (document.body.scrollTop > 3500 || document.documentElement.scrollTop > 3500) {
        botaoVoltarAoTopo.style.display = "block";
    } else {
        botaoVoltarAoTopo.style.display = "none";
    }
};

// Voltar ao topo ao clicar no botão
botaoVoltarAoTopo.onclick = function() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
};