function abriModal() {
    document.getElementById('modal').style.display = 'flex';
}
function fecharModal(){
    document.getElementById('modal').style.display = 'none';
}

function deletaUsuario() {

    fetch("http://localhost/tweeb-2025/PI/public/api/deletar_usuario.php", {
        method: "DELETE",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: `id=${encodeURIComponent(usuarioID)}`
    })
    .then(res => res.text())
    .then(data => {
        try {
            const result = JSON.parse(data);
            alert(result.mensagem || "Operação realizada com sucesso!");
            if (result.mensagem) {
                console.log("Redirecionando...");
                window.location.href = "/Tweeb-2025/PI/app/user/view/pages/login.php";
            }
        } catch (e) {
            alert(data); 
        }
    })
    .catch(err => console.error("Erro:", err));
}

document.addEventListener("DOMContentLoaded", () => {
    document.getElementById("cep").addEventListener("blur", async function () {
        const cep = this.value.replace(/\D/g, "");

        if (cep.length === 8) {
            const response = await fetch(`https://viacep.com.br/ws/${cep}/json/`);
            const data = await response.json();

            if (!data.erro) {
                document.getElementById("rua").value = 
                    `${data.logradouro}`;
                document.getElementById("bairro").value = 
                    `${data.bairro}`;
                document.getElementById("cidade").value = 
                    `${data.localidade}`;
                document.getElementById("estado").value = 
                    `${data.estado}`;
            } else {
                alert("CEP não encontrado. Preencha o endereço manualmente.");
            }
        }
    });
});


