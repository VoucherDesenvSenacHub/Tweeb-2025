console.log('passou aqui');

function showPage(pageNumber) {
    const pages = document.querySelectorAll(".product-page");
    pages.forEach(page => page.style.display = "none");
    document.getElementById("page-" + pageNumber).style.display = "table-row-group";
}

document.getElementById('ativar-aceitas').addEventListener('click', function(){
    const manutencoes = document.getElementById('manutencoes-aceitas');
    // console.log("clicou");

    if (manutencoes.style.display === 'none' || manutencoes.style.display === ''){
        manutencoes.style.display = 'block';
    }
    else{
        manutencoes.style.display = 'none';
    }
})