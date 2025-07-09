function abriModal() {
    document.getElementById('modalHome').style.display = 'flex';
}
function fecharModalAviso(){
    document.getElementById('modalHome').style.display = 'none';
}

function irParaLogin() {
    window.location.href = 'App/user/View/pages/login.php';
}


window.addEventListener('DOMContentLoaded', function() {
    var modal = document.getElementById('modalHome');
    if (modal) {
        modal.style.display = 'flex';
    }
});