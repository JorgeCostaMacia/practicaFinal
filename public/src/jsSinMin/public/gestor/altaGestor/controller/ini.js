"use strict";

var ajaxApp = new Ajax();
var altaGestorApp = new AltaGestor();

document.onload = addEventsLogin();

function addEventsLogin(){
    $("#registrar").click(evalRegistro);
}

