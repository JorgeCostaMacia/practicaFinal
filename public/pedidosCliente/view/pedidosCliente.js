"use strict";

function cleanTbody(){
    $('#tbody').empty();
}

function injectPedidos(pedidos){
    for(let i = 0; i < pedidos.length; i++){
        $('#tbody').append(
            '<tr class=""><td><input type="button" value="' + pedidos[i]["cod_pedido"] + '" class="form-control btn-default"></td>' +
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