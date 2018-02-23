"use strict";

var ajaxApp = new Ajax();
var altaArticuloApp = new AltaArticulo();

document.onload = addEventsLogin();

function addEventsLogin(){
    $("#registrar").click(evalRegistro);
}

