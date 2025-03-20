document.addEventListener("DOMContentLoaded", function() {
    const servicos = [
        { nome: "Formatação", numero: 34, prioridade: "Média", tecnico: "../../../../public/assets/img/tecnico-1.png", progresso: 15, cor: "#ff5733" },
        { nome: "Troca de Tela (Thinkpad)", numero: 42, prioridade: "Média", tecnico: "../../../../public/assets/img/tecnico-2.png", progresso: 25, cor: "#33ff57" },
        { nome: "Troca de bateria", numero: 53, prioridade: "Média", tecnico: "../../../../public/assets/img/tecnico-3.png", progresso: 15, cor: "#3357ff" },
        { nome: "Restaurar entrada de carregamento", numero: 23, prioridade: "Alta", tecnico: "../../../../public/assets/img/tecnico-4.png", progresso: 15, cor: "#ff33a1" },
        { nome: "Limpeza Geral", numero: 11, prioridade: "Alta", tecnico: "../../../../public/assets/img/tecnico-2.png", progresso: 15, cor: "#ffb833" }
    ];
    
    const corpoTabela = document.getElementById("painel-corpo-tabela");
    corpoTabela.innerHTML = "";
    servicos.forEach(servico => {
        let linha = document.createElement("tr");
        linha.innerHTML = `
            <td><input type="checkbox"></td>
            <td>${servico.nome}</td>
            <td>${servico.numero}</td>
            <td><span class="painel-prioridade-${servico.prioridade.toLowerCase()}">${servico.prioridade}</span></td>
            <td><img src="${servico.tecnico}" alt="Foto Técnico" class="painel-tecnico-img"></td>
            <td>
                <div class="painel-progresso-barra">
                    <div class="painel-progresso-preenchimento" style="width: ${servico.progresso}%; background-color: ${servico.cor};"></div>
                </div>
            </td>
        `;
        corpoTabela.appendChild(linha);
    });
});

function atualizarProgresso() {
    document.querySelectorAll(".painel-progresso-preenchimento").forEach(barra => {
        let novoProgresso = Math.min(100, parseInt(barra.style.width) + 10);
        barra.style.width = novoProgresso + "%";
    });
}

