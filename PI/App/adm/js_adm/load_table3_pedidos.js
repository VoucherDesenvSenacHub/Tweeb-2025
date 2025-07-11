
let dados_tabela = document.getElementById('rows_products')
let html = "";

 
 async function load_table3_pedidos(){

   

let dados_tabela = document.getElementById('rows_products');
let html = "";

async function load_table3_pedidos() {
    console.log("AQuiiiiiii 2.0");

    let dados_php = await fetch('../../../../actions/listar_pedidos.php');
    let response = await dados_php.json();

    let html = '';

    console.log(response);

    for (let i = 0; i < response.length; i++) {
        html += `<tr class="tr-tr-listarP">`;
        html += `<td class="td-listarP">${response[i].id_pedido}</td>`;              // ID do Pedido
        html += `<td class="td-listarP">${response[i].id_usuario}</td>`;            // ID do Cliente
        html += `<td class="td-listarP">R$ ${parseFloat(response[i].valor_total).toFixed(2)}</td>`; // Valor Total
        html += `<td class="td-listarP">R$ ${parseFloat(response[i].valor_frete).toFixed(2)}</td>`;       // Frete
        html += `<td class="td-listarP">${response[i].id_endereco}</td>`;      // Endereço
         html += `<td class="td-listarP">${response[i].metodo_envio}</td>`;     // Método de Envio
        html += `<td class="td-listarP">${response[i].data_pedido}</td>`;           // Data do Pedido
        html += `<td class="td-listarP">${response[i].data_entrega_estimada ?? 'Pendente'}</td>`; // Data de Entrega
        html += `<td class="td-listarP">${response[i].status_pedido}</td>`;         // Status
        html += `</tr>`;
    }

    dados_tabela.innerHTML = html;
}

}
