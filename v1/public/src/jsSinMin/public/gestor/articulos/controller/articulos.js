"use strict";

function search(){
    cleanTbody();
    restoreArticulos();
    delEventsSig();
    delEventsAnt();
    $('#numPage').val(1);
    injectPageNumber();
    ajaxApp.callController(articulosApp.getParameterSearchArticulos(),'callBackSearchArticulos');
}

function callBackSearchArticulos(result){
    if (!result["success"]) {
        msjDanger("ARTICULOS", result["errores"][0]["errMessage"]);
    }
    else {
        if(result["articulos"].length !== 0){
            articulos = result["articulos"];
            injectArticulos(result["articulos"]);
            addEventsModificar(result["articulos"]);
            addEventsSiguiente();
        }
    }
}

function searchSiguiente(){
    restoreArticulos();
    delEventsSig();
    delEventsAnt();
    $('#numPage').val($('#numPage').val() * 1 + 1);

    ajaxApp.callController(articulosApp.getParameterSearchArticulos(),'callBackSearchSiguiente');
}

function callBackSearchSiguiente(result){
    if (!result["success"]) {
        msjDanger("ARTICULOS", result["errores"][0]["errMessage"]);
    }
    else {
        if(result["articulos"].length !== 0){
            articulos = result["articulos"];
            cleanTbody();
            injectArticulos(result["articulos"]);
            addEventsModificar(result["articulos"]);
            addEventsSiguiente();
        }
        else{ $('#numPage').val($('#numPage').val() * 1 - 1); }

        if($('#numPage').val() !== "1" ){ addEventsAnterior();}

        injectPageNumber();
    }
}

function searchAnterior(){
    restoreArticulos();
    delEventsSig();
    delEventsAnt();
    $('#numPage').val($('#numPage').val() * 1 - 1);
    ajaxApp.callController(articulosApp.getParameterSearchArticulos(),'callBackSearchAnterior');
}

function callBackSearchAnterior(result){
    if (!result["success"]) {
        msjDanger("ARTICULOS", result["errores"][0]["errMessage"]);
    }
    else {
        cleanTbody();
        articulos = result["articulos"];
        injectArticulos(result["articulos"]);
        addEventsModificar(result["articulos"]);
        addEventsSiguiente();
        if($('#numPage').val() !== "1" ){ addEventsAnterior();}

        injectPageNumber();
    }
}

function showArticulo(event){
    cleanModificar();

    for(let i = 0; i < articulos.length; i++){
        if(articulos[i]["cod_articulo"] === this.id.split('-')[1]){
            injectModificar(articulos[i]);
            addEventsUpdate();
        }
    }
}

function evalModificar(){
    let result = articulosApp.evalInputsUpdate();

    if(!result["succes"]){
        msjDanger("ARTICULOS", articulosApp.getTextErrorUpdate(result["errores"]));
    }
    else {
        ajaxApp.callController(articulosApp.getParameterUpdate(),'callBackEvalUpdate');
    }
}

function callBackEvalUpdate(result){
    if (!result["success"]) {
        msjDanger("ARTICULOS", result["errores"][0]["errMessage"]);
    }
    else {
        msjSucces("ARTICULOS", "<strong>Se ha modificado correctamente</strong>");
        cleanTbody();
        restoreArticulos();
    }
}