const containerOrcamento = document.getElementById("container_orcamentos");

document.addEventListener('DOMContentLoaded', async () => {

    const request = await fetch('../../../../public/api/buscar_orcamentos.php').then(r => r.json());
    console.log(request)

    request.forEach(orcamento => {
        containerOrcamento.innerHTML += `
                
            <div class='orcamento-recebido-header'>
            <span>Solicitação (${orcamento.id_orcamento})</span>
            <span>${orcamento.prazo_estimado}</span>
        </div>
        <form class='orcamento-recebido-form'>
            <div class='orcamento-recebido-row'>
                <input type='text' value='${orcamento.nome}' readonly>
                <input type='email' value='${orcamento.email}' readonly>
                <input type='tel' value='${orcamento.telefone}' readonly>
            </div>
            <div class='orcamento-recebido-row'>
                <input type='text' value='${orcamento.tipo_solicitacao}' readonly>
                <input type='text' value='Até ${orcamento.prazo_estimado}' readonly>
                <button class='foto-orcamento-jpeg' type='button' readonly> <i class='fa-regular fa-circle-down'></i></button>
            
                
            </div>
            <textarea readonly>${orcamento.descricao}</textarea>
            <div class='orcamento-recebido-buttons'>
                <button type='button' class='orcamento-recebido-negacao'>Negar</button>
                <button type='button' class='orcamento-recebido-responder open-modal-resposta'>Responder</button>

            </div>
        </form>
        
                                        `;
    });

})
