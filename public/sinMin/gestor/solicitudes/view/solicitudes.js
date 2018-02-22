"use strict";

function cleanTbody(){$('#tbody').empty(); }

function injectSolicitudes(solicitudes){
    for(let i = 0; i < solicitudes.length; i++){
        $('#tbody').append(
            '<tr>' +
            '<td>' + solicitudes[i]['cif_dni']+ '</td>' +
            '<td>' + solicitudes[i]['nombre_completo']+ '</td>' +
            '<td>' + solicitudes[i]['razon_social']+ '</td>' +
            '<td><input type="button"  id="detalles-' + solicitudes[i]['cod_solicitud'] + '" name="detalles-' + solicitudes[i]['cod_solicitud'] + '" value="Detalles" class="btn btn-primary btn-block"></td>' +
            '<td><input type="button"  id="aceptar-' + solicitudes[i]['cod_solicitud'] + '" name="aceptar-' + solicitudes[i]['cod_solicitud'] + '" value="Aceptar" class="btn btn-warning btn-block"></td>' +
            '<td><input type="button"  id="cancelar-' + solicitudes[i]['cod_solicitud'] + '" name="cancelar-' + solicitudes[i]['cod_solicitud'] + '" value="Cancelar" class="btn btn-danger btn-block"></td>' +
            '</tr>');
    }
}

function injectDetalles(solicitud){
    let text = '<div class="table-responsive"><table class="table table-hover"><thead><tr><th>domicilio_social</th>' +
        '<th>ciudad</th><th>email</th><th>telefono</th><th>nick</th><th>password</th></tr>' +
        '</thead><tbody>' +
        '<tr>' +
        '<td>' + solicitud["domicilio_social"] + '</td>' +
        '<td>' + solicitud["ciudad"] + '</td>' +
        '<td>' + solicitud["email"] + '</td>' +
        '<td>' + solicitud["telefono"] + '</td>' +
        '<td>' + solicitud["nick"] + '</td>' +
        '<td>' + solicitud["password"] + '</td>' +
        '</tr>' +
        '</tbody></table></div>';

    msjInfo('SOLICITUD', text);
}