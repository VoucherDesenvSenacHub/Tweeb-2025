const containerOrcamento = document.getElementById("orcamentos-dinamicos");

document.addEventListener('DOMContentLoaded', async () => {

    const request = await fetch('../../../../public/api/buscar_orcamentos.php').then(r => r.json());
    const request2 = await fetch('../../../../public/api/buscar_orcamentos.php?status="aceitos"').then(r => r.json());

    // Dor de fazer isso mas não vai ter jeito kkk ;-;

    const totalAceitos = request2.length;
    const totalOrcamentos = totalAceitos + request.length;

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

async function responderOrcamento(id, email){
    // Abrir modal
    const modalOrcamento = document.getElementById("modal-responder-orcamento");
    modalOrcamento.style.display = "flex";

    // Fechar modal
    document.querySelectorAll('.close-modal').forEach(btn => {
        btn.addEventListener('click', () => {
            document.getElementById('modal-responder-orcamento').style.display = 'none';
        });
    });

    const emailOrcamento = document.querySelector('.responder-orcamento input[type="email"]');
    emailOrcamento.value = email;

    const btnEnviarOrcamento = document.querySelector('.botao-modal-enviar');

    btnEnviarOrcamento.addEventListener('click', async () => {
        const titulo = document.querySelector('.responder-orcamento-title input').value;
        const enviadoPor = document.querySelector('.responder-orcamento-enviado_por input').value;
        const data = document.querySelector('.responder-orcamento-data input').value;
        const resposta = document.querySelector('.responder-orcamento-resposta textarea').value;
        
        const formData = new FormData();
        formData.append('id', id);
        formData.append('titulo', titulo);
        formData.append('email', email);
        formData.append('enviadoPor', enviadoPor);
        formData.append('data', data);
        formData.append('resposta', resposta);

        const response = await fetch(`../../../../public/api/responder_orcamento.php`, {
            method: 'POST',
            body: formData
        });

        const result = response.json();

        if (result){
            alert("Email enviado");
            
        }

    })

}

async function negarOrcamento(id){
    const response = await fetch(`../../../../public/api/deletar_orcamento.php?delete=${id}`).then(r => r.json());

    if (response){
        location.reload();
        alert("Orçamento excluido com sucesso");
    }
}