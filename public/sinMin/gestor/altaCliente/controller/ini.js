"use strict";

var ajaxApp = new Ajax();
var altaClienteApp = new AltaCliente();

document.onload = addEventsLogin();

function addEventsLogin(){
    $("#registrar").click(evalRegistro);
}

