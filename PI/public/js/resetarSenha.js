const form_resetar_senha = document.getElementById("form-resetar-senha");
const modal = document.getElementById("modal_esqueceu");
const botao_voltar = document.getElementById("esqueceu-button");

function chamaModal(){
    modal.classList.remove('modal-hide');
    modal.classList.add('modal-show');
}

function fecharModal(){
    modal.classList.remove('modal-show');
    modal.classList.add('modal-hide');
}

function voltarLogin(){
    window.location.href='./login.php'
}

form_resetar_senha.addEventListener('submit',async function(event){
    event.preventDefault();

    let formData = new FormData(form_resetar_senha);

    let request = await fetch('../../../../public/api/esqueceu_senha.php',{
        method: "post",
        body: formData
    })

    let response = await request.json();
    console.log(response);

    // trocar pra 200 depois de pronto, bocó

    if (response.status == 200){
        chamaModal();
    }
})

function mostraSenha(inputId, btnId) {
    var inputPass = document.getElementById(inputId);
    var btnShowPass = document.getElementById(btnId);

    if (inputPass.type === 'password') {
        inputPass.setAttribute('type', 'text');
        btnShowPass.classList.replace('bi-eye-fill', 'bi-eye-slash-fill');
    } else {
        inputPass.setAttribute('type', 'password');
        btnShowPass.classList.replace('bi-eye-slash-fill', 'bi-eye-fill');
    }
}