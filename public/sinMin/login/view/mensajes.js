"use strict";

function msjDanger(accion, text) {
    $("#mensajes").append(
        '<div class="modal fade bd-example-modal-lg" id="danger" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">' +
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

    $("#danger").modal("show");
}

function msjWarning(accion, text) {
    $("#mensajes").append(
        '<div class="modal fade bd-example-modal-lg" id="warning" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">' +
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

    $("#warning").modal("show");
}

function msjSucces(accion, text) {
    $("#mensajes").append(
        '<div class="modal fade bd-example-modal-lg" id="success" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">' +
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

    $("#success").modal("show");
}

function msjInfo(accion, text) {
    $("#mensajes").append(
        '<div class="modal fade bd-example-modal-lg" id="info" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">' +
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

    $("#info").modal("show");
}

function msjClean() {
    $("#mensajes").empty();
}