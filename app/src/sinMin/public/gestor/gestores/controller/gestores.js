"use strict";

function search(){
    cleanTbody();
    restoreGestores();
    delEventsSig();
    delEventsAnt();
    $('#numPage').val(1);
    injectPageNumber();
    ajaxApp.callController(gestoresApp.getParameterSearchGestores(),'callBackSearchGestores');
}

function callBackSearchGestores(result){
    if (!result["success"]) {
        msjDanger("GESTORES", result["errores"][0]["errMessage"]);
    }
    else {
        if(result["usuarios_gestion"].length !== 0){
            gestores = result["usuarios_gestion"];
            injectGestores(result["usuarios_gestion"]);
            addEventsModificar(result["usuarios_gestion"]);
            addEventsSiguiente();
        }
    }
}

function searchSiguiente(){
    restoreClientes();
    delEventsSig();
    delEventsAnt();
    $('#numPage').val($('#numPage').val() * 1 + 1);

    ajaxApp.callController(gestoresApp.getParameterSearchGestores(),'callBackSearchSiguiente');
}

function callBackSearchSiguiente(result){
    if (!result["success"]) {
        msjDanger("GESTORES", result["errores"][0]["errMessage"]);
    }
    else {
        if(result["usuarios_gestion"].length !== 0){
            gestores = result["usuarios_gestion"];
            cleanTbody();
            injectGestores(result["v"]);
            addEventsModificar(result["usuarios_gestion"]);
            addEventsSiguiente();
        }
        else{ $('#numPage').val($('#numPage').val() * 1 - 1); }

        if($('#numPage').val() !== "1" ){ addEventsAnterior();}

        injectPageNumber();
    }
}

function searchAnterior(){
    restoreGestores();
    delEventsSig();
    delEventsAnt();
    $('#numPage').val($('#numPage').val() * 1 - 1);
    ajaxApp.callController(gestoresApp.getParameterSearchGestores(),'callBackSearchAnterior');
}

function callBackSearchAnterior(result){
    if (!result["success"]) {
        msjDanger("GESTORES", result["errores"][0]["errMessage"]);
    }
    else {
        cleanTbody();
        injectClientes(result["usuarios_gestion"]);
        addEventsModificar(result["usuarios_gestion"]);
        addEventsSiguiente();
        if($('#numPage').val() !== "1" ){ addEventsAnterior();}

        injectPageNumber();
    }
}

function showGestores(event){
    cleanModificar();

    for(let i = 0; i < gestores.length; i++){
        if(gestores[i]["cod_gestor"] === this.id.split('-')[1]){
            injectModificar(gestores[i]);
            addEventsUpdate();
        }
    }
}

function evalModificar(){
    let result = gestoresApp.evalInputsUpdate();

    if(!result["succes"]){
        msjDanger("GESTORES", clientesApp.getTextErrorUpdate(result["errores"]));
    }
    else {
        ajaxApp.callController(gestoresApp.getParameterUpdate(),'callBackEvalUpdate');
    }
}

function callBackEvalUpdate(result){
    if (!result["success"]) {
        msjDanger("GESTORES", result["errores"][0]["errMessage"]);
    }
    else {
        msjSucces("GESTORES", "<strong>Se ha modificado correctamente</strong>");
        cleanTbody();
        restoreGestores();
    }
}