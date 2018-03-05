"use strict";

function cleanTbody(){$('#tbody').empty(); }
function enableProcesar(){$('#procesar').attr('disabled', false);}
function disableProcesar(){$('#procesar').attr('disabled', true);}

function injectTitleArticulos(){
    $('#title').empty();
    $('#title').append('Articulo');
}

function injectTitleCarrito(){
    $('#title').empty();
    $('#title').append('Carrito');
}

function injectArticulos(articulos){
    for(let i = 0; i < articulos.length; i++){
        $('#tbody').append(
            '<tr>' +
            '<td>' + articulos[i]['cod_articulo']+ '</td>' +
            '<td>' + articulos[i]['nombre']+ '</td>' +
            '<td>' + articulos[i]['descripcion']+ '</td>' +
            '<td>' + ("" + ((1 * articulos[i]['precio']).toFixed(2))).replace(".", ",")+ '</td>' +
            '<td>' + articulos[i]['descuento'].replace(".", ",") + '</td>' +
            '<td>' + articulos[i]['iva'].replace(".", ",") + '</td>' +
            '<td><input type="number"  id="cod_articuloReal-' + articulos[i]['cod_articulo'] + '" name="cod_articuloReal-' + articulos[i]['cod_articulo'] + '" min="0" step="1" value="0"></td>' +
            '</tr>'
        );
    }
    $('#tbody').append('<tr><td></td><td></td><td></td><td></td><td></td><td></td><td><input type="button" id="agregar" name="agregar" class="form-control btn-warning" value="Agregar"></td></tr>');
}

function injectCarrito(articulos){
    for(let i = 0; i < articulos.length; i++){
        $('#tbody').append(
            '<tr>' +
            '<td>' + articulos[i]['cod_articulo']+ '</td>' +
            '<td>' + articulos[i]['nombre']+ '</td>' +
            '<td>' + articulos[i]['descripcion']+ '</td>' +
            '<td>' + ("" + ((1 * articulos[i]['precio']).toFixed(2))).replace(".", ",")+ '</td>' +
            '<td>' + articulos[i]['descuento'].replace(".", ",") + '</td>' +
            '<td>' + articulos[i]['iva'].replace(".", ",") + '</td>' +
            '<td><input type="number"  id="cod_articulo-' + articulos[i]['cod_articulo'] + '" name="cod_articulo-' + articulos[i]['cod_articulo'] + '" min="0" step="1" value="' + articulos[i]['cantidad'] + '"></td>' +
            '</tr>'
        );
    }
    $('#tbody').append(
        '<tr><td></td><td></td><td></td><td></td><td></td><td></td><td><input type="button" id="procesar" name="procesar" class="form-control btn-warning" value="Procesar"></td></tr>' +
        '<tr><td></td><td></td><td></td><td></td><td></td><td></td><td><input type="button" id="actualizar" name="actualizar" class="form-control btn-warning" value="Actualizar"></td></tr>'
    );
}

function injectPageNumber(){
    $('#pageActual').empty();
    $('#pageActual').append($('#numPage').val());
}