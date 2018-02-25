"use strict";

function cleanTbody(){
    $('#tbody').empty();
}
function restoreAlbaranes(){
    $('#tableLineas').empty();
    $('#tableAlbaranes').attr('hidden', false);
}

function cleanLineas(){
    $('#tableLineas').empty();
}

function injectAlbaranes(albaranes){
    for(let i = 0; i < albaranes.length; i++){
        $('#tbody').append(
            '<tr><td>' + albaranes[i]["cod_pedido"] + '</td>' +
            '<td>' + albaranes[i]["cod_cliente"] + ' - ' + albaranes[i]["nombre_cliente"] + '</td>' +
            '<td>' + albaranes[i]["fecha"] + '</td>' +
            '<td>' + albaranes[i]["estado"] + '</td>' +
            '<td><input type="button" id="cod_pedido-' + albaranes[i]["cod_pedido"] + '" value="' + albaranes[i]["lineas"] + '" class="form-control btn-primary"></td></tr>'
        );
    }
}

function injectPageNumber(){
    $('#pageActual').empty();
    $('#pageActual').append($('#numPage').val());
}

function injectLineas(lineas, cod_albaran){
    let tableLineas = '<form id="formLineas" name="formLineas">' +
        '<h2>Albaran ' + lineas[0]["cod_albaran"] +'</h2>' +
        '<input type="hidden" id="cod_albaran" name="cod_albaran" value="' + cod_albaran +'">' +

        '<input type="hidden" id="usuario" name="usuario" value="cliente">' +
        '<input type="hidden" name="cod_cliente" value="' + $('#cod_cliente').val() + '">' +
        '<input type="hidden" id="cod_pedido" name="cod_pedido" value="' + lineas[0]["cod_pedido"] + '">' +
        '<div class="table-responsive">' +
        '<table class="table table-hover">' +
        '<thead>' +
        '<tr>' +
        '<th>Linea</th>' +
        '<th>Articulo</th>' +
        '<th>Precio</th>' +
        '<th>Iva</th>' +
        '<th>Total</th>' +
        '<th>Estao</th>' +
        '<th>Cantidad</th>' +
        '</tr>' +
        '</thead>' +
        '<tbody>';
    for(let i = 0; i < lineas.length; i++){
        tableLineas +=
            '<tr><td>' + lineas[i]["cod_linea"] + '</td>' +
            '<td>' + lineas[i]["cod_articulo"] + ' - ' + lineas[i]["nombre_articulo"] + '</td>' +
            '<td>' + lineas[i]["precio"] + '</td>' +
            '<td>' + lineas[i]["iva"] + '</td>' +
            '<td>' + lineas[i]["total"] + '</td>' +
            '<td>' + lineas[i]["estado"] + '</td>';

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

    $('#tableAlbaranes').attr('hidden', true);
    $('#tableLineas').append(tableLineas);
}