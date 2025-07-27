const containerOrcamento = document.getElementById("orcamentos-dinamicos");

document.addEventListener('DOMContentLoaded', async () => {
    const request = await fetch('../../../../public/api/buscar_orcamentos.php?status="aceitos"').then(r => r.json());
    // Dor de fazer isso mas não vai ter jeito kkk
    const request2 = await fetch('../../../../public/api/buscar_orcamentos.php').then(r => r.json());

    const totalAceitos = request.length;
    const totalOrcamentos = totalAceitos + request2.length;

    console.log(totalOrcamentos);

    const qntAceitos = document.getElementById("quantidadeAceitos");
    qntAceitos.innerText = totalAceitos;

    const qntTotal = document.getElementById("quantidadeTotal");
    qntTotal.innerText = totalOrcamentos;

    request.forEach(orcamento => {
        containerOrcamento.innerHTML += `
        <div class='orcamento-recebido-container'>
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
                    <button class='foto-orcamento-jpeg' type='button'> 
                        <a href="../../../../public/${orcamento.imagem}" download> <i class='fa-regular fa-circle-down'></i> </a>
                    </button>
                </div>
                <textarea readonly>${orcamento.descricao}</textarea>
                <div class='orcamento-recebido-buttons'>
                    <button type='button' class='orcamento-recebido-negacao' onclick="negarOrcamento(${orcamento.id_orcamento})">Negar</button>
                    <button type='button' class='orcamento-recebido-responder open-modal-resposta' onclick="responderOrcamento(${orcamento.id_orcamento}, '${orcamento.email}')">Responder</button>
                </div>
            </form>
        </div>
        `;
    });
});
