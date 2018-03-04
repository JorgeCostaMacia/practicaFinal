"use strict";

var ajaxApp = new Ajax();
var updateApp = new Update();

document.onload = addEventsUpdate();

function addEventsUpdate(){
    $("#modificar").click(evalModificar);
}