"use strict";

function searchLineas(event){
    cleanLineas();
    cod_albaran = event.target.id.split('-')[1];
    ajaxApp.callController(albaranesApp.getParameterSearchLineas(cod_pedido),'callBackSearchLineas');
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