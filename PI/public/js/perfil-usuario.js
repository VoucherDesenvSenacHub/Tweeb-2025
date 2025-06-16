let perfil_form = document.querySelector('.perfil-tweeb-form');
console.log(perfil_form)
let inputs = perfil_form.querySelectorAll('input:not([disabled])');
let originalValues = {};

// Salva os valores originais dos campos
inputs.forEach(input => {
    originalValues[input.name] = input.value;
});

console.log(originalValues);

// Função para ativar/desativar modo de edição
function toggleEditMode() {
    perfil_form.classList.toggle('editing');
    inputs.forEach(input => {
        input.readOnly = !input.readOnly;
    });
}

// Função para cancelar a edição
function cancelEdit() {
    perfil_form.classList.remove("editing");
    perfil_form.querySelectorAll("input").forEach(input => {
        input.setAttribute("readonly", true);
    });
    let camposParaLimpar = ["sobrenome", "telefone"];
    camposParaLimpar.forEach(id => {
        let input = document.getElementById(id);
        if (input) input.value = "";
    });
}


function deletaUsuario() {
    let confirma = confirm("Tem certeza que deseja excluir sua conta?");
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
            let result = JSON.parse(data);
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

    perfil_form.addEventListener('submit', async function(event) {
        event.preventDefault();

    let formData = {
        nome: this.nome.value,
        sobrenome: this.sobrenome.value,
        email: this.email.value,
        telefone: this.telefone.value,
    };

    let response = await fetch('/Tweeb-2025/PI/app/user/Controllers/UserEditController.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(formData)
    });

    let result = await response.json();

    if (result.sucesso) {
        alert(result.mensagem);
        location.reload();
    } else {
        alert('Erro: ' + result.mensagem);
    }
});


function editarUsuario() {
    let formData = {
        nome: perfil_form.nome.value,
        sobrenome: perfil_form.sobrenome.value,
        email: perfil_form.email.value,
        telefone: perfil_form.telefone.value,
    };

    async function editar(form){ 

    let dados_php = await fetch('/Tweeb-2025/PI/app/user/Controllers/UserEditController.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(form)
    });

    let response = await dados_php.json();

    console.log(response);

    }

    editar(formData);


    // .then(response => response.json())
    // .then(result => {
    //     alert(result.mensagem);
    //     if (result.sucesso) {
    //         location.reload();
    //     }
    // })
    // .catch(error => {
    //     console.error('Erro ao atualizar:', error);
    //     alert('Erro ao atualizar. Tente novamente.');
    // });
}