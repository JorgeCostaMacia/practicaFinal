"use strict";

function cleanTbody(){
    $('#tbody').empty();
}

function injectPedidos(pedidos){
    for(let i = 0; i < pedidos.length; i++){
        $('#tbody').append(
            '<tr system=""><td><input type="button" value="' + pedidos[i]["cod_pedido"] + '" system="form-control btn-default"></td>' +
            '<td><input type="button" value="' + pedidos[i]["cod_cliente"] + '" system="form-control btn-default"></td>' +
            '<td><input type="button" value="' + pedidos[i]["fecha"] + '" system="form-control btn-default"></td>' +
            '<td><input type="button" value="' + pedidos[i]["estado"] + '" system="form-control btn-default"></td>' +
            '<td><input type="button" id="cod_pedido-' + pedidos[i]["cod_pedido"] + '" value="' + pedidos[i]["lineas"] + '" system="form-control btn-primary"></td></tr>'
        );
    }
}

function injectPageNumber(){
    $('#pageActual').empty();
    $('#pageActual').append($('#numPage').val());
}

function injectLineas(lineas){
    let tableLineas = '<form id="formLineas" name="formLineas">' +
        '<input type="hidden" id="usuario" name="usuario" value="cliente">' +
        '<input type="hidden" id="cod_pedido" name="cod_pedido" value="' + lineas[0]["cod_pedido"] + '">' +
        '<div system="table-responsive" id="table-responsive">' +
        '<table system="table table-hover">' +
        '<thead>' +
        '<tr>' +
        '<th>cod_linea</th>' +
        '<th>cod_pedido</th>' +
        '<th>cod_articulo</th>' +
        '<th>precio</th>' +
        '<th>total</th>' +
        '<th>estado</th>' +
        '<th>cantidad</th>' +
        '</tr>' +
        '</thead>' +
        '<tbody>';
    for(let i = 0; i < lineas.length; i++){
        tableLineas +=
            '<tr system=""><td><input type="button" value="' + lineas[i]["cod_linea"] + '" system="form-control btn-default"></td>' +
            '<td><input type="button" value="' + lineas[i]["cod_pedido"] + '" system="form-control btn-default"></td>' +
            '<td><input type="button" value="' + lineas[i]["cod_articulo"] + '" system="form-control btn-default"></td>' +
            '<td><input type="button" value="' + lineas[i]["precio"] + '" system="form-control btn-default"></td>' +
            '<td><input type="button" value="' + lineas[i]["total"] + '" system="form-control btn-default"></td>' +
            '<td><input type="button" value="' + lineas[i]["estado"] + '" system="form-control btn-default"></td>' +
            '<td><input type="number" name="cod_linea-' + lineas[i]["cod_linea"] + '" value="' + lineas[i]["cantidad"] + '" system="cantidades form-control"></td></tr>';
    }

    tableLineas += '<tr><td></td><td></td><td></td><td></td><td></td><td></td><td><input type="button" id="buttonLineas" name="buttonLineas" system="form-control btn-warning" value="Actualizar cantidades"></td></tr>';
    tableLineas += '</form></tbody></table></div>';

    msjInfo('LINEAS', tableLineas);
}
