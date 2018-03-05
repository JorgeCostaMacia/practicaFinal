"use strict";

function borrarCarrito(){
    albaranesApp.borrarAlbaranesCarrito();
    msjInfo("REALIZAR PEDIDOS", '<strong>Se ha borrado el carrito de albaranes correctamente</strong>');
    cleanTbody();
    injectTitleAlbaranes();
    restoreAlbaranes();
}

function carrito(){
    albaranesApp.iniAlbaranesCarrito();
    if(Object.keys(albaranesCarrito).length > 0 ){
        ajaxApp.callController(albaranesApp.getParameterSearchAlbaranesCarrito(),'callBackCarrito');
    }
    else {
        cleanTbody();
        restoreAlbaranes();
        injectTitleCarrito();
    }
}

function callBackCarrito(result){
    if (!result["success"]) {
        msjDanger("ALBARANES", result["errores"][0]["errMessage"]);
    }
    else {
        carritoProcesar = result["albaranes"];
        injectTitleCarrito();
        cleanTbody();
        restoreAlbaranes();
        if(result["albaranes"].length > 0 ){
            injectCarrito(carritoProcesar);
            addEventsProcesar();
        }
    }
}

function agregar(){
    albaranesApp.iniAlbaranesCarrito();

    for(let i = 0; i < albaranes.length; i++){
        if(albaranes[i]["cod_albaran"] === cod_albaran){
            if(albaranes[i]["estado"] === "pendiente"){
                albaranesApp.addLocalStorage();
                msjInfo("ALBARANES", '<strong>Se ha agregado correctamente</strong>');
            }
            else {
                msjInfo("ALBARANES", '<strong>No se puede realizar la accion<br></strong>Todas las lineas han sido procesadas');
            }
        }
    }
}

function  procesarAlbaran(){
    ajaxApp.callController(albaranesApp.getParameterProcesarAlbaran(),'callBackProcesarAlbaran');
}

function callBackProcesarAlbaran(result){
    if (!result["success"]) {
        msjDanger("ALBARANES", result["errores"][0]["errMessage"]);
        cleanTbody();
        injectTitleAlbaranes();
        restoreAlbaranes();
    }
    else {
        msjSucces("ALBARANES", "<strong>Se han generado las facturas correctamente</strong>");
        albaranesApp.borrarAlbaranesCarrito();
        cleanTbody();
        injectTitleAlbaranes();
        restoreAlbaranes();
    }
}