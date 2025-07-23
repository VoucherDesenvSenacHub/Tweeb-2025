// const { EVENT_REFRESH } = require("@splidejs/splide");
function atualizarContador() {
    const textarea = document.getElementById("mensagem");
    const contador = document.getElementById("contador");
    contador.textContent = textarea.value.length;
}

async function handleAvaliacoesSobreNois(event=null){
    let avaliacoes = document.getElementById('carregar-avaliacao')
    // console.log(avaliacoes)   
    try{
        let dados_avaliacoes = await fetch('../../../actions/carregar_avaliacao.php')
        let response = await dados_avaliacoes.json()
        console.log("Aquii" +response)
        response.forEach(e => {
            let estrelasHTML = "";
        
            for (let i = 0; i < e.notas; i++) {
                estrelasHTML += `<i class="fa-solid fa-star"></i>`;
            }
        
            avaliacoes.innerHTML += `
            <div class="comentario swiper-slide">
                <img class="avatar" src="${e.foto_perfil}" alt="Foto de ${e.nome}"/>
                <p class="nome">${e.nome}  ${e.sobrenome}</p>
                <div class="comentario-texto">
                    <p class="justificar-texto">${e.comentario}</p>
                </div>
        
                <div class="content_star_sobre">
                    ${estrelasHTML}
                </div>
            </div>`;
        });
    }
    catch(erro){

    }
}




handleAvaliacoesSobreNois()
form.addEventListener("submit" , e =>{
    e.preventDefault()
    
    if(idCliente){
        const formulario = new FormData(form)

        const [nota, comentario] = formulario.values();

        const bodyRequest ={
            notas: nota ,
            comentario: comentario,
            id_cliente: idCliente
        } 
        const caminho = '../../../actions/carregar_avaliacao.php';
        

        fetch(caminho, {
            method: 'POST',
            headers: {
                'Content-Type' : 'application/json'
                },
                body: JSON.stringify(bodyRequest)
                })
                .then(response => response.json())
                .then(data => {
                    console.log("Sucesso!!!!!!!", data)
                    aparecerModal1()
                })
                .catch((error)  => {
                        console.log('Error', error)
                        aparecerModal3()
                })
    }else{
        aparecerModal2()
    }
})