"use strict";

function cleanTbody(){
    $('#tbody').empty();
}
function restoreArticulos(){
    $('#tableModificar').empty();
    $('#tableArticulos').attr('hidden', false);
}

function cleanModificar(){
    $('#tableModificar').empty();
}

function injectArticulos(articulos){
    for(let i = 0; i < articulos.length; i++){
        $('#tbody').append(
            '<tr><td>' + articulos[i]["cod_articulo"] + '</td>' +
            '<td>' + articulos[i]["nombre"] + '</td>' +
            '<td>' + articulos[i]["descripcion"] + '</td>' +
            '<td><button type="button" id="modificar-' + articulos[i]["cod_articulo"] + '" value="' + articulos[i]["cod_articulo"] + '" class="form-control btn-warning">Modificar</td></td></tr>'
        );
    }
}

function injectPageNumber(){
    $('#pageActual').empty();
    $('#pageActual').append($('#numPage').val());
}

function injectModificar(articulo){
    let tableModificar = '<form id="formModificar" method="POST">' +
        '<input type="hidden" id="usuario" name="usuario" value="gestor">' +
        '<input type="hidden" id="cod_articulo" name="cod_articulo" value="' + articulo["cod_articulo"] + '" value="gestor">' +
        '<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">'+
            '<div class="input-group input-group-lg">'+
                '<span class="input-group-addon "><span class="glyphicon glyphicon-tag"></span></span>'+
                '<input type="text" class="form-control"  value="' + articulo["cod_articulo"] + '" aria-describedby="sizing-addon1" disabled>'+
            '</div>'+
            '<br>'+
        '</div>'+
        '<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">'+
            '<div class="input-group input-group-lg">'+
                '<span class="input-group-addon "><span class="glyphicon glyphicon-tag"></span></span>'+
                '<input type="text" name="nombre" id="nombre" maxlength="30" class="form-control" value="' + articulo["nombre"] + '" placeholder="Nombre" aria-describedby="sizing-addon1" required>'+
            '</div>'+
            '<br>'+
        '</div>'+
        '<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">'+
            '<div class="input-group input-group-lg">'+
                '<span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>'+
                '<input type="text" name="descripcion" id="descripcion" maxlength="30" class="form-control" value="' + articulo["descripcion"] + '" placeholder="Descripcion" required>'+
            '</div>'+
            '<br/>'+
        '</div>'+
        '<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">'+
            '<div class="input-group input-group-lg">'+
                '<span class="input-group-addon"><span class="glyphicon glyphicon-euro"></span></span>'+
                '<input type="number" name="precio" id="precio" maxlength="10" step="1" min="0" class="form-control" value="' + articulo["precio"] + '" placeholder="Precio" required>'+
            '</div>'+
            '<br>'+
        '</div>'+
        '<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">'+
            '<div class="input-group input-group-lg">'+
                '<span class="input-group-addon"><span class="glyphicon glyphicon-euro"></span></span>'+
                '<input type="number" name="descuento" id="descuento" maxlength="10" step="0.01" min="0" max="1" class="form-control" value="' + articulo["descuento"] + '" placeholder="Descuento" required>'+
            '</div>'+
            '<br>'+
        '</div>'+
        '<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">' +
            '<div class="input-group input-group-lg">'+
                '<span class="input-group-addon"><span class="glyphicon glyphicon-euro"></span></span>' +
                '<select name="iva" id="iva" class="form-control">';
                    if(articulo["iva"] === "0"){
                        tableModificar += '<option value="0" selected>Iva 0</option>';
                        tableModificar += '<option value="0.04">Iva 0.04</option>';
                        tableModificar += '<option value="0.10">Iva 0.10</option>';
                        tableModificar += '<option value="0.21">Iva 0.21</option>';
                    }
                    else if(articulo["iva"] === "0.04"){
                        tableModificar += '<option value="0">Iva 0</option>';
                        tableModificar += '<option value="0.04" selected>Iva 0.04</option>';
                        tableModificar += '<option value="0.10">Iva 0.10</option>';
                        tableModificar += '<option value="0.21">Iva 0.21</option>';
                    }
                    else if(articulo["iva"] === "0.1" || articulo["iva"] === "0.10" ){
                        tableModificar += '<option value="0">Iva 0</option>';
                        tableModificar += '<option value="0.04">Iva 0.04</option>';
                        tableModificar += '<option value="0.10" selected>Iva 0.10</option>';
                        tableModificar += '<option value="0.21">Iva 0.21</option>';

                    }
                    else if(articulo["iva"] === "0.21"){
                        tableModificar += '<option value="0">Iva 0</option>';
                        tableModificar += '<option value="0.04">Iva 0.04</option>';
                        tableModificar += '<option value="0.10">Iva 0.10</option>';
                        tableModificar += '<option value="0.21" selected>Iva 0.21</option>';
                    }
                tableModificar += '</select>'+
            '</div>'+
            '<br>' +
        '</div>' +
        '<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">' +
            '<div class="input-group input-group-lg">'+
                '<span class="input-group-addon"><span class="glyphicon glyphicon-cog"></span></span>' +
                '<select name="estado" id="estado" class="form-control">';
                    if(articulo["estado"] === "activo"){
                        tableModificar += '<option value="activo" selected>Activo</option>';
                        tableModificar += '<option value="inactivo">Inactivo</option>';
                    }
                    else {
                        tableModificar += '<option value="activo">Activo</option>';
                        tableModificar += '<option value="inactivo" selected>Inactivo</option>';
                    }
                tableModificar += '</select>'+
            '</div>'+
            '<br>' +
        '</div>' +
        '<div class="col-lg-12">' +
            '<button type="button" name="updateArticulo" id="updateArticulo" class="btn btn-warning btn-block">Modificar</button>'+
            '<button type="button" id="buttonVolver" name="buttonVolver" class="btn btn-primary btn-block">Volver articulos</button>' +
        '</div>' +
    '</form>';

    $('#tableArticulos').attr('hidden', true);
    $('#tableModificar').append(tableModificar);
}