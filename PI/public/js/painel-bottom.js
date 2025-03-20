document.addEventListener("DOMContentLoaded", function() {
    const ctx = document.getElementById("painel-bottom-graficoEstoque").getContext("2d");
    new Chart(ctx, {
        type: "doughnut",
        data: {
            labels: ["Completo", "Alerta", "Em falta"],
            datasets: [{
                data: [76, 32, 13],
                backgroundColor: ["green", "orange", "red"]
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });

    document.getElementById("painel-bottom-menuBtn").addEventListener("click", function() {
        const menu = document.getElementById("painel-bottom-menuOpcoes");
        menu.style.display = menu.style.display === "block" ? "none" : "block";
    });

    document.addEventListener("click", function(event) {
        const menu = document.getElementById("painel-bottom-menuOpcoes");
        const menuBtn = document.getElementById("painel-bottom-menuBtn");
        if (event.target !== menu && event.target !== menuBtn) {
            menu.style.display = "none";
        }
    });
});