"use strict";

class RealizarPedidosCliente{
    getParameterSearchArticulos(){
        return 'action=' + 'searchArticulosActivos&' + $("#formSearch").serialize();
    }

    getParameterProcesarArticulos(){
        let parameter = 'action=' + 'procesarArticulos&usuario=' + $('#usuario').val() + '&cod_cliente=' + $('#cod_cliente').val();
        for(let i = 0; i < articulos.length; i++){
            if($("#cod_articulo-" + articulos[i]["cod_articulo"]).val() !== "0"){
                parameter += '&cod_articulo-' + articulos[i]["cod_articulo"] + '=' + $('#cod_articulo-' + articulos[i]["cod_articulo"]).val();
            }
        }
        return parameter;
    }

    evalInputsCantidades(){
        let result = [];
        result['success'] = true;
        result['errores'] = [];
        for(let i = 0; i < articulos.length; i++){
            if(!validateCantidad($('#cod_articulo-' + articulos[i]["cod_articulo"]).val())) {
                result['success'] = false;
                result['errores'].push(articulos[i]["cod_articulo"] + ' - ' + articulos[i]["nombre"]);
            }
        }

        return result;
    }

    getTextErrorCantidades(errores){
        let errorText = "<strong>Los siguientes articulos tienen un formato de cantidades incorrectas</strong><br>";
        for(let i = 0; i < errores.length; i++){
            errorText += errores[i];
        }

        return errorText;
    }
}