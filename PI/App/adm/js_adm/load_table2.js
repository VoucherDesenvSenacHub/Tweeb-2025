

let dados_tabela = document.getElementById('rows_products')
let html = "";

 
 async function load_table(){

    console.log("AQuiiiiiii 2.0")


    let dados_php = await fetch('../../../../actions/listar_produtos.php');
    let response = await dados_php.json();

    let html = '';

    console.log(response);

    for(let i=0; i< response.length; i++){

        html += `<tr class="tr-tr-listarP">`;
        html += `<td class="td-listarP"><img src="${response[i].imagem_produto}" id="userAdm_avatar" alt="Avatar" class="listarP-produto-img"></td>`;
        html += `<td class="td-listarP">  ${response[i].nome_produto}  </td>`;
        html += `<td class="td-listarP">  ${response[i].preco_unid}  </td>`;
        html += `<td class="td-listarP">  ${response[i].quantidade_produto}  `;
        html += `<td class="td-listarP">  ${response[i].id_departamento}  `;
        html += `<td class="td-listarP"> <div class="td_botao">`;
        // html += ` <form action="" method="get" class="form-listarP_editar">`;
        // html += ` <input type="hidden" name="id_usuario" value="${response.id_produto}" class="input-listarP">`;
        // html += ` <button type="submit" class="listarP-edit-btn"> `;
        // html += ` <img src="../../../../public/assets/img/edit-3.png" alt="Editar" class="listarP-edit-icon">`;
        // html += ` </button>  </form>`;
        html += `<a href="editar_produtos.php?id_produto=${response[i].id_produto}">
        <button type="submit" class="form-listarP_editar">
            <img src="../../../../public/assets/img/edit-3.png" alt="Editar" class="listarP-edit-icon">
        </button>
    </a>`;
        // html += ` <form action="" method="post" class="form-excluir"> `;
        // html += `<input type="hidden" name="id_usuario" value="${response.id_produto}" class="input-hidden">`;
        // html +=  ` <button type="submit" class="listarP-delete-btn"></button> `;
        // html += `<img src="../../../../public/assets/img/trash-2.png" alt="Excluir" class="listarP-delete-icon">`;
        html += `<a href="excluir_produtos.php?id_produto=${response[i].id_produto}">
        <button type="submit" class="listarP-delete-btn">
            <img src="../../../../public/assets/img/trash-2.png" alt="Excluir" class="listarP-delete-icon">
        </button>
    </a>`;
        html +=  ` </button> </form>  </div> </tr> `;
 

        console.log(response[i].nome_produto);
    }

     dados_tabela.innerHTML = html;
}
