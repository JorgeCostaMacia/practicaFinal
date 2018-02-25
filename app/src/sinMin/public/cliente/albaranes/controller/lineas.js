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
        addEventsButtonLineas();
        lineasAlbaranes = result["lineas_albaranes"];
        injectLineas(result["lineas_albaranes"]);
    }
}

function searchCliente(){
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