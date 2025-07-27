
document.addEventListener("DOMContentLoaded", function () {
    // Função para trocar imagem
    function handleFileChange(event, imgElement) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            // console.log(reader, imgElement)
            
            reader.onload = function (e) {
                imgElement.src = e.target.result; // Substitui o src da imagem
            };

            reader.readAsDataURL(file);
        }
    }

    // Configuração dos botões e arquivos de cada banner
    const bannerItems = document.querySelectorAll('.banner-item, .banner-item-promocional, .banner-item-promo');


    bannerItems.forEach(item => {
        const button = item.querySelector('.trocar-imagem-btn');
        const input = item.querySelector('.file-upload');
        const img = item.querySelector('.preview-image');

        // Quando o botão é clicado, abre o seletor de arquivos
        button.addEventListener('click', (event) => {
            event.preventDefault();
            console.log(event)
            input.click();
        });

        //  Quando um arquivo é selecionado, troca a imagem
        input.addEventListener('change', (event) => {
            handleFileChange(event, img);
        });
    });
});

// document.addEventListener("DOMContentLoaded", function () {
//     document.querySelectorAll(".btn_salvar_adm").forEach(function (botao) {
//         botao.addEventListener("click", function () {
//             alert("Banners salvo com Sucesso!");
//         });
//     });
// });



