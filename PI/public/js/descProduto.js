
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