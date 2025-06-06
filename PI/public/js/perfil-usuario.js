const form = document.querySelector('.perfil-tweeb-form');
const inputs = form.querySelectorAll('input:not([disabled])');
let originalValues = {};

// Salva os valores originais dos campos
inputs.forEach(input => {
    originalValues[input.name] = input.value;
});

// Função para ativar/desativar modo de edição
function toggleEditMode() {
    form.classList.toggle('editing');
    inputs.forEach(input => {
        input.readOnly = !input.readOnly;
    });
}

// Função para cancelar a edição
function cancelEdit() {
    const form = document.querySelector(".perfil-tweeb-form");
    form.classList.remove("editing");
    form.querySelectorAll("input").forEach(input => {
        input.setAttribute("readonly", true);
    });
    const camposParaLimpar = ["sobrenome", "telefone", "cep", "rua", "bairro", "cidade", "estado"];
    camposParaLimpar.forEach(id => {
        const input = document.getElementById(id);
        if (input) input.value = "";
    });
}


function deletaUsuario() {
    const confirma = confirm("Tem certeza que deseja excluir sua conta?");
    if (!confirma) return;

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

document.getElementById('perfil-tweeb-form').addEventListener('submit', async function(event) {
    event.preventDefault();

    const formData = {
        nome: this.nome.value,
        sobrenome: this.sobrenome.value,
        email: this.email.value,
        telefone: this.telefone.value,
        cep: this.cep.value,
        rua: this.rua.value,
        bairro: this.bairro.value,
        cidade: this.cidade.value,
        estado: this.estado.value
    };

    const response = await fetch('/Tweeb-2025/PI/app/user/Controllers/UserEditController.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(formData)
    });

    const result = await response.json();

    if (result.sucesso) {
        alert(result.mensagem);
        location.reload();
    } else {
        alert('Erro: ' + result.mensagem);
    }
});


//cep
document.addEventListener("DOMContentLoaded", function () {
    const cepInput = document.getElementById("cep");

    cepInput.addEventListener("blur", async function () {
        const cep = cepInput.value.replace(/\D/g, '');

        if (cep.length !== 8) return;

        try {
            const response = await fetch(`https://viacep.com.br/ws/${cep}/json/`);
            const data = await response.json();

            if (data.erro) {
                alert("CEP não encontrado.");
                return;
            }

            document.getElementById("rua").value = data.logradouro || '';
            document.getElementById("bairro").value = data.bairro || '';
            document.getElementById("cidade").value = data.localidade || '';
            document.getElementById("estado").value = data.uf || '';
        } catch (error) {
            console.error("Erro ao buscar CEP:", error);
            alert("Erro ao buscar o CEP. Tente novamente.");
        }
    });
});
