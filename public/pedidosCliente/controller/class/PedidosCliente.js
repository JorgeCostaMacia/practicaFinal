"use strict";

class PedidosCliente{
    getParameterSearchPedidosCliente(){
        let parameter = 'action=' + 'searchPedidos&';
        parameter += $("#formSearch").serialize();
        return parameter;
    }

    getParameterSearchLineas(cod_pedido){
        let parameter = 'action=' + 'searchLineasPedidos&cod_pedido=' + cod_pedido + "&";
        parameter += $("#formSearch").serialize();
        return parameter;
    }

    evalInputsCantidades(){
        console.log(cantidades);
       /* let result = [];
        result['success'] = true;
        result['errores'] = [];
        for(let i = 0; i < articulos.length; i++){
            if(!validateCantidad($('#cod_articulo-' + articulos[i]["cod_articulo"]).val())) {
                result['success'] = false;
                result['errores'].push(articulos[i]["cod_articulo"] + ' - ' + articulos[i]["nombre"]);
            }
        }

        return result;*/
    }

    getTextErrorCantidades(errores){
        let errorText = "<strong>Los siguientes articulos tienen un formato de cantidades incorrectas</strong><br>";
        for(let i = 0; i < errores.length; i++){
            errorText += errores[i];
        }

        return errorText;
    }

}