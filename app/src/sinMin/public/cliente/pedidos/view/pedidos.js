"use strict";

function cleanTbody(){
    $('#tbody').empty();
}
function restorePedidos(){
    $('#tableLineas').empty();
    $('#tablePedidos').attr('hidden', false);
}

function cleanLineas(){
    $('#tableLineas').empty();
}

function injectPedidos(pedidos){
    for(let i = 0; i < pedidos.length; i++){
        $('#tbody').append(
            '<tr><td><input type="button" value="' + pedidos[i]["cod_pedido"] + '" class="form-control btn-default"></td>' +
            '<td><input type="button" value="' + pedidos[i]["cod_cliente"] + '" class="form-control btn-default"></td>' +
            '<td><input type="button" value="' + pedidos[i]["fecha"] + '" class="form-control btn-default"></td>' +
            '<td><input type="button" value="' + pedidos[i]["estado"] + '" class="form-control btn-default"></td>' +
            '<td><input type="button" id="cod_pedido-' + pedidos[i]["cod_pedido"] + '" value="' + pedidos[i]["lineas"] + '" class="form-control btn-primary"></td></tr>'
        );
    }
}

function injectPageNumber(){
    $('#pageActual').empty();
    $('#pageActual').append($('#numPage').val());
}

function injectLineas(lineas){
    let tableLineas = '<form id="formLineas" name="formLineas">' +
        '<h2>cod_pedido ' + lineas[0]["cod_pedido"] +'</h2>' +
        '<input type="hidden" id="usuario" name="usuario" value="cliente">' +
        '<input type="hidden" name="cod_cliente" value="' + $('#cod_cliente').val() + '">' +
        '<input type="hidden" id="cod_pedido" name="cod_pedido" value="' + lineas[0]["cod_pedido"] + '">' +
        '<div class="table-responsive">' +
        '<table class="table table-hover">' +
        '<thead>' +
        '<tr>' +
        '<th>cod_linea</th>' +
        '<th>articulo</th>' +
        '<th>precio</th>' +
        '<th>iva</th>' +
        '<th>total</th>' +
        '<th>estado</th>' +
        '<th>cantidad</th>' +
        '</tr>' +
        '</thead>' +
        '<tbody>';
    for(let i = 0; i < lineas.length; i++){
        tableLineas +=
            '<tr><td><input type="button" value="' + lineas[i]["cod_linea"] + '" class="form-control btn-default"></td>' +
            '<td><input type="button" value="' + lineas[i]["nombre_articulo"] + '" class="form-control btn-default"></td>' +
            '<td><input type="button" value="' + lineas[i]["precio"] + '" class="form-control btn-default"></td>' +
            '<td><input type="button" value="' + lineas[i]["iva"] + '" class="form-control btn-default"></td>' +
            '<td><input type="button" value="' + lineas[i]["total"] + '" class="form-control btn-default"></td>' +
            '<td><input type="button" value="' + lineas[i]["estado"] + '" class="form-control btn-default"></td>';

        if(lineas[i]["estado"] === 'pendiente'){
            tableLineas += '<td><input type="number" name="cod_linea-' + lineas[i]["cod_linea"] + '" value="' + lineas[i]["cantidad"] + '" class="cantidades form-control" min="0" step="1"></td></tr>';
        }
        else {
            tableLineas += '<td><input type="number" name="cod_linea-' + lineas[i]["cod_linea"] + '" value="' + lineas[i]["cantidad"] + '" class="cantidades form-control" min="0" step="1" disabled></td></tr>';
        }
    }

    tableLineas += '<tr><td></td><td></td><td></td><td></td><td></td><td></td><td><input type="button" id="buttonLineas" name="buttonLineas" class="form-control btn-warning" value="Actualizar cantidades"></td></tr>';
    tableLineas += '<tr><td></td><td></td><td></td><td></td><td></td><td></td><td><input type="button" id="buttonVolver" name="buttonVolver" class="form-control btn-primary" value="Volver pedidos"></td></tr>';
    tableLineas += '</tbody></table></div></form>';

    $('#tablePedidos').attr('hidden', true);
    $('#tableLineas').append(tableLineas);
}