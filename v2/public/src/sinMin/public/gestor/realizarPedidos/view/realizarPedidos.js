"use strict";

function cleanTbody(){$('#tbody').empty(); }
function disableProcesar(){$('#procesar').attr('disabled', true);}
function enableBuscar(){$('#search').attr('disabled', false);}
function enableCarrito(){$('#carrito').attr('disabled', false);}

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
            '<td>' + articulos[i]['descuento'].replace(".", ",")+ '</td>' +
            '<td>' + articulos[i]['iva'].replace(".", ",")+ '</td>' +
            '<td><input type="number"  id="cod_articuloReal-' + articulos[i]['cod_articulo'] + '" name="cod_articuloReal-' + articulos[i]['cod_articulo'] + '" min="0" step="1" value="0"></td>' +
            '</tr>');
    }
    $('#tbody').append('<tr><td></td><td></td><td></td><td></td><td></td><td></td><td><input type="button" id="agregar" name="agregar" class="form-control btn-warning" value="Agregar"></td></tr>');
}

function injectCarrito(articulos){
    $.each( articulos, function(key, articulo) {
        $('#tbody').append(
            '<tr>' +
            '<td>' + articulo['cod_articulo']+ '</td>' +
            '<td>' + articulo['nombre']+ '</td>' +
            '<td>' + articulo['descripcion']+ '</td>' +
            '<td>' + ("" + ((1 * articulo['precio']).toFixed(2))).replace(".", ",")+ '</td>' +
            '<td>' + articulo['descuento'].replace(".", ",") + '</td>' +
            '<td>' + articulo['iva'].replace(".", ",") + '</td>' +
            '<td><input type="number"  id="cod_articulo-' + articulo['cod_articulo'] + '" name="cod_articulo-' + articulo['cod_articulo'] + '" min="0" step="1" value="' + articulo['cantidad'] + '"></td>' +
            '</tr>'
        );
    });
    $('#tbody').append(
        '<tr><td></td><td></td><td></td><td></td><td></td><td></td><td><input type="button" id="procesar" name="procesar" class="form-control btn-warning" value="Procesar"></td></tr>' +
        '<tr><td></td><td></td><td></td><td></td><td></td><td></td><td><input type="button" id="actualizar" name="actualizar" class="form-control btn-warning" value="Actualizar"></td></tr>'
    );
}

function injectClientes(clientes){
    for(let i = 0; i < clientes.length; i++){
        $('#cod_cliente').append('<option value="' + clientes[i]['cod_cliente'] + '">' + clientes[i]['cod_cliente'] + '-' + clientes[i]['nombre_completo'] + '</option>');
    }
}

function injectPageNumber(){
    $('#pageActual').empty();
    $('#pageActual').append($('#numPage').val());
}