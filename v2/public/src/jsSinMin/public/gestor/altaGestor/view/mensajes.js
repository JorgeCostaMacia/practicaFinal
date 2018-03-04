"use strict";

function msjDanger(accion, text) {
    let idMsj = Math.floor((Math.random() * 10000000000000000) + 1);
    $("#mensajes").append(
        '<div class="modal fade bd-example-modal-lg" id="danger' + idMsj + '" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">' +
        '<div class="modal-dialog modal-lg">' +
        '<div class="modal-content">' +
        '<div class="modal-header modal-header-danger">' +
        '<h1>' + accion + '</h1>' +
        '</div>' +
        '<div class="modal-body">' + text + '</div>' +
        '<div class="modal-footer">' +
        '<button type="button" class="btn btn-default pull-rigth" data-dismiss="modal">Cerrar</button>' +
        '</div>' +
        '</div>' +
        '</div>' +
        '</div>'
    );
    $("#danger" + idMsj).modal("show");
}

function msjWarning(accion, text) {
    let idMsj = Math.floor((Math.random() * 10000000000000000) + 1);
    $("#mensajes").append(
        '<div class="modal fade bd-example-modal-lg" id="warning' + idMsj + '" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">' +
        '<div class="modal-dialog modal-lg">' +
        '<div class="modal-content">' +
        '<div class="modal-header modal-header-warning">' +
        '<h1>' + accion + '</h1>' +
        '</div>' +
        '<div class="modal-body">' + text + '</div>' +
        '<div class="modal-footer">' +
        '<button type="button" class="btn btn-default pull-rigth" data-dismiss="modal">Cerrar</button>' +
        '</div>' +
        '</div>' +
        '</div>' +
        '</div>'
    );

    $("#warning" + idMsj).modal("show");
}

function msjSucces(accion, text) {
    let idMsj = Math.floor((Math.random() * 10000000000000000) + 1);
    $("#mensajes").append(
        '<div class="modal fade bd-example-modal-lg" id="success' + idMsj + '" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">' +
        '<div class="modal-dialog modal-lg">' +
        '<div class="modal-content">' +
        '<div class="modal-header modal-header-success">' +
        '<h1>' + accion + '</h1>' +
        '</div>' +
        '<div class="modal-body">' + text + '</div>' +
        '<div class="modal-footer">' +
        '<button type="button" class="btn btn-default pull-rigth" data-dismiss="modal">Cerrar</button>' +
        '</div>' +
        '</div>' +
        '</div>' +
        '</div>'
    );

    $("#success" + idMsj).modal("show");
}

function msjInfo(accion, text) {
    let idMsj = Math.floor((Math.random() * 10000000000000000) + 1);
    $("#mensajes").append(
        '<div class="modal fade bd-example-modal-lg" id="info' + idMsj + '" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">' +
        '<div class="modal-dialog modal-lg">' +
        '<div class="modal-content">' +
        '<div class="modal-header modal-header-info">' +
        '<h1>' + accion + '</h1>' +
        '</div>' +
        '<div class="modal-body">' + text + '</div>' +
        '<div class="modal-footer">' +
        '<button type="button" class="btn btn-default pull-rigth" data-dismiss="modal">Cerrar</button>' +
        '</div>' +
        '</div>' +
        '</div>' +
        '</div>'
    );

    $("#info" + idMsj).modal("show");
}