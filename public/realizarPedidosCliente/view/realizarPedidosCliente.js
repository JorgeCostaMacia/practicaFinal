"use strict";

function injectArcitulos(articulos){
    $('#formPedido').empty();

    for(let i = 0; i < articulos.length; i++){
        $('#formPedido').append('' +
            '<tr>' +
            '<td>' + articulos[i]['cod_articulo']+ '</td>' +
            '<td>' + articulos[i]['nombre']+ '</td>' +
            '<td>' + articulos[i]['descripcion']+ '</td>' +
            '<td>' + articulos[i]['precio']+ '</td>' +
            '<td>' + articulos[i]['descuento']+ '</td>' +
            '<td>' + articulos[i]['iva']+ '</td>' +
            '<td><input type="number" name="cod_articulo-' + articulos[i]['cod_articulo'] + '" min="0" step="1" value="0"></td>' +
            '</tr>'
        );

    }
}