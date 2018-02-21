"use strict";

function cleanTbody(){
    $('#tbody').empty();
}
function restoreClientes(){
    $('#tableModificar').empty();
    $('#tableClientes').attr('hidden', false);
}

function cleanModificar(){
    $('#tableModificar').empty();
}

function injectClientes(clientes){
    for(let i = 0; i < clientes.length; i++){
        $('#tbody').append(
            '<tr><td><input type="button" value="' + clientes[i]["cod_cliente"] + '" class="form-control btn-default"></td>' +
            '<td><input type="button" value="' + clientes[i]["cif_dni"] + '" class="form-control btn-default"></td>' +
            '<td><input type="button" value="' + clientes[i]["nombre_completo"] + '" class="form-control btn-default"></td>' +
            '<td><input type="button" value="' + clientes[i]["razon_social"] + '" class="form-control btn-default"></td>' +
            '<td><button type="button" id="modificar-' + clientes[i]["cod_cliente"] + '" value="' + clientes[i]["cod_cliente"] + '" class="form-control btn-warning">Modificar</td></td></tr>'
        );
    }
}

function injectPageNumber(){
    $('#pageActual').empty();
    $('#pageActual').append($('#numPage').val());
}

function injectModificar(cliente){
    let tableModificar = '<form id="formGetAccount" method="POST">' +
        '<input type="hidden" id="usuario" name="usuario" value="gestor">' +
        '<input type="hidden" name="cod_cliente" value="' + cliente["cod_cliente"] + '">' +
        '<input type="hidden" name="estado" value="' + cliente["estado"] + '">' +
        '<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">' +
            '<div class="input-group input-group-lg">'+
                '<span class="input-group-addon "><span class="glyphicon glyphicon-user"></span></span>'+
                '<input type="text" name="cod_cliente" id="cod_cliente" maxlength="30" class="form-control" placeholder="Nick" aria-describedby="sizing-addon1" value="' + cliente["cod_cliente"] + '" disabled>'+
            '</div>'+
            '<br>'+
        '</div>' +
        '<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">' +
            '<div class="input-group input-group-lg">'+
                '<span class="input-group-addon "><span class="glyphicon glyphicon-user"></span></span>'+
                '<input type="text" name="nick" id="nickReg" maxlength="30" class="form-control" placeholder="Nick" aria-describedby="sizing-addon1" value="' + cliente["nick"] + '" disabled>'+
            '</div>'+
            '<br>'+
        '</div>' +
        '<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">' +
            '<div class="input-group input-group-lg">' +
                '<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>'+
                '<input type="password" name="password" id="passReg" maxlength="30" class="form-control" placeholder="Password" value="' + cliente["password"] + '" required>'+
            '</div>'+
            '<br/>'+
        '</div>' +
        '<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">' +
            '<div class="input-group input-group-lg">'+
                '<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>'+
                '<input type="text" name="nombre_completo" id="nombre_completo" maxlength="30" class="form-control" placeholder="Nombre completo" value="' + cliente["nombre_completo"] + '" disabled>'+
            '</div>'+
            '<br>'+
        '</div>' +
        '<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">' +
            '<div class="input-group input-group-lg">'+
                '<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>'+
                '<input type="text" name="cif_dni" id="cif_dni" maxlength="30" class="form-control" placeholder="CIF / DNI" value="' + cliente["cif_dni"] + '" disabled>'+
            '</div>'+
            '<br>'+
        '</div>' +
        '<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">' +
            '<div class="input-group input-group-lg">'+
                '<span class="input-group-addon"><span class="glyphicon glyphicon-briefcase"></span></span>'+
                '<input type="text" name="razon_social" id="razon_social" maxlength="30" class="form-control" placeholder="Razon social" value="' + cliente["razon_social"] + '" required>'+
            '</div>'+
            '<br>'+
        '</div>' +
        '<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">' +
            '<div class="input-group input-group-lg">'+
                '<span class="input-group-addon"><span class="glyphicon glyphicon-briefcase"></span></span>'+
                '<input type="text" name="domicilio_social" id="domicilio_social" maxlength="30" class="form-control" placeholder="Domicilio social" value="' + cliente["domicilio_social"] + '" required>'+
            '</div>'+
            '<br>'+
        '</div>' +
        '<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">' +
            '<div class="input-group input-group-lg">'+
                '<span class="input-group-addon"><span class="glyphicon glyphicon-map-marker"></span></span>'+
                '<input type="text" name="ciudad" id="ciudad" maxlength="30" class="form-control" placeholder="Ciudad" value="' + cliente["ciudad"] + '" required>'+
            '</div>'+
            '<br>'+
        '</div>' +
        '<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">' +
            '<div class="input-group input-group-lg">'+
                '<span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>'+
                '<input type="email" name="email" id="email" maxlength="30" class="form-control" placeholder="Email" value="' + cliente["email"] + '" required>'+
            '</div>'+
            '<br>'+
        '</div>' +
        '<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">' +
            '<div class="input-group input-group-lg">'+
                '<span class="input-group-addon"><span class="glyphicon glyphicon-earphone"></span></span>'+
                '<input type="text" name="telefono" id="telefono" maxlength="30" class="form-control" placeholder="Telefono" value="' + cliente["telefono"] + '" required>'+
            '</div>'+
            '<br>' +
        '</div>' +
        '<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">' +
            '<div class="input-group input-group-lg">'+
                '<span class="input-group-addon"><span class="glyphicon glyphicon-cog"></span></span>' +
                '<select name="estado" id="estado" class="form-control">';

                if(cliente["estado"] === "activo"){
                    tableModificar += '<option value="activo" checked>Activo</option>';
                    tableModificar += '<option value="inactivo">Inactivo</option>';
                }
                else {
                    tableModificar += '<option value="activo">Activo</option>';
                    tableModificar += '<option value="inactivo" checked>Inactivo</option>';
                }
                tableModificar += '</select>'+
            '</div>'+
            '<br>' +
        '</div>' +
        '<div class="col-lg-12">' +
            '<button type="button" name="updateCliente" id="updateCliente" class="btn btn-warning btn-block">Modificar</button>'+
            '<button type="button" id="buttonVolver" name="buttonVolver" class="btn btn-primary btn-block">Volver clientes</button>' +
        '</div>' +
    '</form>';

    $('#tableClientes').attr('hidden', true);
    $('#tableModificar').append(tableModificar);
}