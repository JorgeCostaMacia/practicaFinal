"use strict";

function searchLineas(event){
    cleanLineas();
    cod_albaran = event.target.id.split('-')[1];
    ajaxApp.callController(albaranesApp.getParameterSearchLineas(cod_albaran),'callBackSearchLineas');
}

function callBackSearchLineas(result){
    if (!result["success"]) {
        msjDanger("ALBARANES", result["errores"][0]["errMessage"]);
    }
    else {
        for(let i = 0; i < albaranes.length; i++){
            if(albaranes[i]["cod_albaran"] === cod_albaran){
                cod_cliente = albaranes[i]["cod_cliente"];
            }
        }
        addEventsAgregar();
        addEventsButtonLineas();
        lineasAlbaranes = result["lineas_albaranes"];
        injectLineas(result["lineas_albaranes"]);
    }
}

function searchCliente(){
    for(let i = 0; i < albaranes.length; i++){
        if(albaranes[i]["cod_albaran"] === cod_albaran){
            cod_cliente = albaranes[i]["cod_cliente"];
        }
    }
    ajaxApp.callController(albaranesApp.getParameterSearchCliente(),'callBackSearchCliente');
}

function callBackSearchCliente(result){
    if (!result["success"]) {
        msjDanger("ALBARANES", result["errores"][0]["errMessage"]);
    }
    else {
        for(let i = 0; i < albaranes.length; i++){
            if(albaranes[i]["cod_albaran"] === cod_albaran){
                showDescarga(result["usuarios_cliente"][0], albaranes[i]);
            }
        }
    }
}

function  procesarAlbaran(){
    for(let i = 0; i < albaranes.length; i++){
        if(albaranes[i]["cod_albaran"] === cod_albaran){
            if(albaranes[i]["estado"] === "pendiente"){
                ajaxApp.callController(albaranesApp.getParameterProcesarAlbaran(),'callBackProcesarAlbaran');
            }
            else {
                msjInfo("ALBARANES", '<strong>No se puede realizar la accion<br></strong>Todas las lineas han sido procesadas');
            }
        }
    }
}

function callBackProcesarAlbaran(result){
    if (!result["success"]) {
        msjDanger("ALBARANES", result["errores"][0]["errMessage"]);
    }
    else {
        msjSucces("ALBARANES", "<strong>Se ha procesado correctamente el albaran</strong>");
        cleanTbody();
        restoreAlbaranes();
    }
}

function  actualizarAlbaran(){
    let result1 = albaranesApp.evalInputsPrecio();
    let result2 = albaranesApp.evalInputsDescuentos();

    if(result1["success"] && result2["success"]){
        for(let i = 0; i < albaranes.length; i++){
            if(albaranes[i]["cod_albaran"] === cod_albaran){
                if(albaranes[i]["estado"] === "pendiente"){
                    ajaxApp.callController(albaranesApp.getParameterUpdateAlbaran(),'callBackActualizarAlbaran');
                }
                else {
                    msjInfo("ALBARANES", '<strong>No se puede realizar la accion<br></strong>Todas las lineas han sido procesadas');
                }
            }
        }
    }
    else {
        let textError = "";
        if(!result1["success"]){
            textError += albaranesApp.getTextErrorPrecio(result1["errores"]);
        }
        if(!result2["success"]){
            textError += albaranesApp.getTextErrorDescuento(result2["errores"]);
        }
        msjDanger("ALBARANES", textError);
    }
}

function callBackActualizarAlbaran(result){
    if (!result["success"]) {
        msjDanger("ALBARANES", result["errores"][0]["errMessage"]);
    }
    else {
        msjSucces("ALBARANES", "<strong>Se actualizaron los datos correctamente</strong>");
        cleanTbody();
        restoreAlbaranes();
    }
}