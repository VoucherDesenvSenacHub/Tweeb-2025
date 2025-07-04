document.addEventListener("DOMContentLoaded", function() {
    const servicos = [
        { nome: "Formatação", numero: 34, prioridade: "Média", tecnico: "../../../../public/assets/img/tecnico-1.png" },
        { nome: "Troca de Tela (Thinkpad)", numero: 42, prioridade: "Média", tecnico: "../../../../public/assets/img/tecnico-2.png" },
        { nome: "Troca de bateria", numero: 53, prioridade: "Média", tecnico: "../../../../public/assets/img/tecnico-3.png" },
        { nome: "Restaurar entrada de carregamento", numero: 23, prioridade: "Alta", tecnico: "../../../../public/assets/img/tecnico-4.png" },
        { nome: "Limpeza Geral", numero: 11, prioridade: "Alta", tecnico: "../../../../public/assets/img/tecnico-2.png" }
    ];

    const corpoTabela = document.getElementById("painel-corpo-tabela");
    corpoTabela.innerHTML = "";
    servicos.forEach(servico => {
        let linha = document.createElement("tr");
        linha.innerHTML = `
            <td>${servico.nome}</td>
            <td>${servico.numero}</td>
            <td><span class="painel-prioridade-${servico.prioridade.toLowerCase()}">${servico.prioridade}</span></td>
            <td><img src="${servico.tecnico}" alt="Foto Técnico" class="painel-tecnico-img"></td>
        `;
        corpoTabela.appendChild(linha);
    });
});
