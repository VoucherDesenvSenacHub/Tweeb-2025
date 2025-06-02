

let dados_tabela = document.getElementById('rows_products')
let html = "";

 
 async function load_table(){

    let dados_php = await fetch('../../../../actions/listar_produtos.php');
    let response = await dados_php.json();

    for(let i=0; i< response.length; i++){
        console.log(response[i]);
    }

//     <tr class="tr-tr-listarP">
//     <td class="td-listarP"><img src="../../../../public/assets/img/notebook-gamer-dell-g15-i1300-a45p-intel-core-i5-16gb-nvidia-rtx-4050-ssd-512gb-15-6-fhd-windows-11-preto-210-bkyg_1707334557_gg 1.png" id="userAdm_avatar" alt="Avatar" class="listarP-produto-img"></td>
//     <td class="td-listarP"></td>
//     <td class="td-listarP"></td>
//     <td class="td-listarP">
//     <div class="td_botao">
//         <form action="" method="get" class="form-listarP_editar">
//             <input type="hidden" name="id_usuario" value="' . $usuario['id_usuario'] . '" class="input-listarP">
//             <button type="submit" class="listarP-edit-btn">
//                 <img src="../../../../public/assets/img/edit-3.png" alt="Editar" class="listarP-edit-icon">
//             </button>
//         </form>

//         <form action="" method="post" class="form-excluir">
//             <input type="hidden" name="id_usuario" value="' . $usuario['id_usuario'] . '" class="input-hidden">
//             <button type="submit" class="listarP-delete-btn">
//                 <img src="../../../../public/assets/img/trash-2.png" alt="Excluir" class="listarP-delete-icon">
//             </button>
//         </form>
//     <td class="td-listarP"></td>
//     </div>
// </tr>

    // for(var i = 0; i < response.length; i++){
    //     html += '<tr>';
    //     html += '<td>';
    //     html += response[i].ID;
    //     html += '<td>';
    //     html += response[i].Valor;
    //     html += '<td>';
    //     html += response[i].Tipo;
    //     html += '<td>';
    //     html += response[i].UF;
    //     html += '<td>';
    //     if (response[i].Tipo === "disponivel"){
    //         html += '<div class="container_item_list_ações">';
    //         html += `<a href="pedido_disponivel_adm.php?id=${response[i].ID}"><i class="fa-solid fa-eye"></i></a>`;
    //     }
    //     if (response[i].Tipo === "personalizado"){
    //         html += '<div class="container_item_list_ações">';
    //         html += `<a href="pedido_personalizado_adm.php?id=${response[i].ID}"><i class="fa-solid fa-eye"></i></a>`;
    //     }
    // }
    // dados_tabela.innerHTML = html;
}
