"use strict";

function iniUsuarios(){
    ajaxApp.callController(realizarPedidosApp.getParameterGetClientes(),'callBackIniUsuarios');
}

function callBackIniUsuarios(result){
    if (!result["success"]) {
        msjDanger("REALIZAR PEDIDOS", result["errores"][0]["errMessage"]);
    }
    else if(result["usuarios_cliente"].length > 0){
        injectClientes(result["usuarios_cliente"]);
        enableBuscar();
        enableCarrito();
    }
}

function search(){
    cleanTbody();
    injectTitleArticulos();
    delEventsSig();
    delEventsAnt();
    $('#numPage').val(1);
    injectPageNumber();
    ajaxApp.callController(realizarPedidosApp.getParameterSearchArticulos(),'callBackSearchArticulos');
}

function callBackSearchArticulos(result){
    if (!result["success"]) {
        msjDanger("REALIZAR PEDIDOS", result["errores"][0]["errMessage"]);
    }
    else {
        if(result["articulos"].length !== 0){
            articulos = result["articulos"];
            injectArticulos(articulos);
            addEventsSiguiente();
            addEventsAgregar();
        }
        else {
            disableProcesar();
            articulos = "";
        }
    }
}


function searchSiguiente(){
    delEventsSig();
    delEventsAnt();
    $('#numPage').val($('#numPage').val() * 1 + 1);

    ajaxApp.callController(realizarPedidosApp.getParameterSearchArticulos(),'callBackSearchSiguiente');
}

function callBackSearchSiguiente(result){
    if (!result["success"]) {
        msjDanger("REALIZAR PEDIDOS", result["errores"][0]["errMessage"]);
    }
    else {
        if(result["articulos"].length !== 0){
            cleanTbody();
            injectTitleArticulos();
            articulos = result["articulos"];
            injectArticulos(result["articulos"]);
            addEventsAgregar();
            addEventsSiguiente();
        }
        else{ $('#numPage').val($('#numPage').val() * 1 - 1); }

        if($('#numPage').val() !== "1" ){ addEventsAnterior();}

        injectPageNumber();
    }
}

function searchAnterior(){
    delEventsSig();
    delEventsAnt();
    $('#numPage').val($('#numPage').val() * 1 - 1);
    ajaxApp.callController(realizarPedidosApp.getParameterSearchArticulos(),'callBackSearchAnterior');
}

function callBackSearchAnterior(result){
    if (!result["success"]) {
        msjDanger("REALIZAR PEDIDOS", result["errores"][0]["errMessage"]);
    }
    else {
        cleanTbody();
        injectTitleArticulos();
        articulos = result["articulos"];
        injectArticulos(result["articulos"]);
        addEventsAgregar();
        addEventsSiguiente();
        if($('#numPage').val() !== "1" ){ addEventsAnterior();}

        injectPageNumber();
    }
}
