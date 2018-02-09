"use strict";

var loginApp = new Login();
var ajaxApp = new Ajax();
var registroApp = new Registro();

document.onload = addEventsLogin();

function addEventsLogin(){
    $("#entrar").click(evalLogin);
    $("#addFormRegistrar").click(addformGetAccount);

    $("#registrar").click(evalRegistro);
    $("#addFormLogin").click(addformLogin);
}

