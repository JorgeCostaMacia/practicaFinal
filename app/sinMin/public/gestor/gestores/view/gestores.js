"use strict";

function cleanTbody(){
    $('#tbody').empty();
}
function restoreGestores(){
    $('#tableModificar').empty();
    $('#tableGestores').attr('hidden', false);
}

function cleanModificar(){
    $('#tableModificar').empty();
}

function injectGestores(gestores){
    for(let i = 0; i < gestores.length; i++){
        $('#tbody').append(
            '<tr><td><input type="button" value="' + gestores[i]["cod_gestor"] + '" class="form-control btn-default"></td>' +
            '<td><input type="button" value="' + gestores[i]["nombre_completo"] + '" class="form-control btn-default"></td>' +
            '<td><input type="button" value="' + gestores[i]["nick"] + '" class="form-control btn-default"></td>' +
            '<td><button type="button" id="modificar-' + gestores[i]["cod_gestor"] + '" value="' + gestores[i]["cod_gestor"] + '" class="form-control btn-warning">Modificar</td></td></tr>'
        );
    }
}

function injectPageNumber(){
    $('#pageActual').empty();
    $('#pageActual').append($('#numPage').val());
}

function injectModificar(gestor){
    let tableModificar = '<form id="formGetAccount" method="POST">' +
        '<input type="hidden" id="usuario" name="usuario" value="gestor">' +
        '<input type="hidden" name="cod_gestor" value="' + gestor["cod_gestor"] + '">' +
        '<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">' +
            '<div class="input-group input-group-lg">'+
                '<span class="input-group-addon "><span class="glyphicon glyphicon-user"></span></span>'+
                '<input type="text" name="cod_gestor" id="cod_gestor" maxlength="30" class="form-control" placeholder="Nick" aria-describedby="sizing-addon1" value="' + gestor["cod_gestor"] + '" disabled>'+
            '</div>'+
            '<br>'+
        '</div>' +
        '<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">' +
            '<div class="input-group input-group-lg">'+
                '<span class="input-group-addon "><span class="glyphicon glyphicon-user"></span></span>'+
                '<input type="text" name="nick" id="nickReg" maxlength="30" class="form-control" placeholder="Nick" aria-describedby="sizing-addon1" value="' + gestor["nick"] + '" disabled>'+
            '</div>'+
            '<br>'+
        '</div>' +
        '<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">' +
            '<div class="input-group input-group-lg">' +
                '<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>'+
                '<input type="password" name="password" id="passReg" maxlength="30" class="form-control" placeholder="Password" value="' + gestor["password"] + '" required>'+
            '</div>'+
            '<br/>'+
        '</div>' +
        '<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">' +
            '<div class="input-group input-group-lg">'+
                '<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>'+
                '<input type="text" name="nombre_completo" id="nombre_completo" maxlength="30" class="form-control" placeholder="Nombre completo" value="' + gestor["nombre_completo"] + '" disabled>'+
            '</div>'+
            '<br>'+
        '</div>' +
        '<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">' +
            '<div class="input-group input-group-lg">'+
                '<span class="input-group-addon"><span class="glyphicon glyphicon-cog"></span></span>' +
                '<select name="estado" id="estado" class="form-control">';

                if(gestor["estado"] === "activo"){
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
            '<button type="button" name="updateGestor" id="updateGestor" class="btn btn-warning btn-block">Modificar</button>'+
            '<button type="button" id="buttonVolver" name="buttonVolver" class="btn btn-primary btn-block">Volver gestores</button>' +
        '</div>' +
    '</form>';

    $('#tableGestores').attr('hidden', true);
    $('#tableModificar').append(tableModificar);
}