"use strict";

function search(){
    cleanTbody();
    restoreClientes();
    delEventsSig();
    delEventsAnt();
    $('#numPage').val(1);
    injectPageNumber();
    msjClean();
    ajaxApp.callController(clientesApp.getParameterSearchClientes(),'callBackSearchClientes');
}

function callBackSearchClientes(result){
    if (!result["success"]) {
        msjDanger("SEARCH CLIENTES", result["errores"][0]["errMessage"]);
    }
    else {
        if(result["usuarios_cliente"].length !== 0){
            clientes = result["usuarios_cliente"];
            injectClientes(result["usuarios_cliente"]);
            addEventsModificar(result["usuarios_cliente"]);
            addEventsSiguiente();
        }
    }
}

function searchSiguiente(){
    restoreClientes();
    delEventsSig();
    delEventsAnt();
    msjClean();
    $('#numPage').val($('#numPage').val() * 1 + 1);

    ajaxApp.callController(clientesApp.getParameterSearchClientes(),'callBackSearchSiguiente');
}

function callBackSearchSiguiente(result){
    if (!result["success"]) {
        msjDanger("SEARCH PEDIDOS", result["errores"][0]["errMessage"]);
    }
    else {
        if(result["usuarios_cliente"].length !== 0){
            clientes = result["usuarios_cliente"];
            cleanTbody();
            injectClientes(result["usuarios_cliente"]);
            addEventsModificar(result["usuarios_cliente"]);
            addEventsSiguiente();
        }
        else{ $('#numPage').val($('#numPage').val() * 1 - 1); }

        if($('#numPage').val() !== "1" ){ addEventsAnterior();}

        injectPageNumber();
    }
}

function searchAnterior(){
    restoreClientes();
    delEventsSig();
    delEventsAnt();
    msjClean();
    $('#numPage').val($('#numPage').val() * 1 - 1);
    ajaxApp.callController(clientesApp.getParameterSearchClientes(),'callBackSearchAnterior');
}

function callBackSearchAnterior(result){
    if (!result["success"]) {
        msjDanger("SEARCH PEDIDOS", result["errores"][0]["errMessage"]);
    }
    else {
        cleanTbody();
        injectClientes(result["usuarios_cliente"]);
        addEventsModificar(result["usuarios_cliente"]);
        addEventsSiguiente();
        if($('#numPage').val() !== "1" ){ addEventsAnterior();}

        injectPageNumber();
    }
}

function showCliente(event){
    $('#tableModificar').empty();

    for(let i = 0; i < clientes.length; i++){
        if(clientes[i]["cod_cliente"] === this.id.split('-')[1]){
            injectModificar(clientes[i]);
            addEventsUpdate();
        }
    }
}

function evalModificar(){
    msjClean();

    let result = clientesApp.evalInputsUpdate();

    if(!result["succes"]){
        msjDanger("UPDATE", clientesApp.getTextErrorUpdate(result["errores"]));
    }
    else {
        ajaxApp.callController(clientesApp.getParameterUpdate(),'callBackEvalUpdate');
    }
}

function callBackEvalUpdate(result){
    if (!result["success"]) {
        msjDanger("UPDATE", result["errores"][0]["errMessage"]);
    }
    else {
        msjInfo("UPDATE", "Se ha modificado correctamente");
    }
}