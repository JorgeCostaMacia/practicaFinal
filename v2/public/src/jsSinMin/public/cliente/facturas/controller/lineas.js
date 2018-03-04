"use strict";

function searchLineas(event){
    cleanLineas();
    cod_factura = event.target.id.split('-')[1];
    ajaxApp.callController(facturasApp.getParameterSearchLineas(cod_factura),'callBackSearchLineas');
}

function callBackSearchLineas(result){
    if (!result["success"]) {
        msjDanger("FACTURAS", result["errores"][0]["errMessage"]);
    }
    else {
        addEventsButtonLineas();
        lineasFacturas = result["lineas_facturas"];
        injectLineas(result["lineas_facturas"]);
    }
}

function searchCliente(){
    ajaxApp.callController(facturasApp.getParameterSearchCliente(),'callBackSearchCliente');
}

function callBackSearchCliente(result){
    if (!result["success"]) {
        msjDanger("FACTURAS", result["errores"][0]["errMessage"]);
    }
    else {
        for(let i = 0; i < facturas.length; i++){
            if(facturas[i]["cod_factura"] === cod_factura){
                showDescarga(result["usuarios_cliente"][0], facturas[i]);
            }
        }
    }
}