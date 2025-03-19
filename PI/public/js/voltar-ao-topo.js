
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