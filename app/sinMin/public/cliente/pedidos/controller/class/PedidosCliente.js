"use strict";

class PedidosCliente{
    getParameterSearchPedidosCliente(){
        return 'action=' + 'searchPedidos&' + $("#formSearch").serialize();
    }

    getParameterSearchLineas(cod_pedido){
        return 'action=' + 'searchLineasPedidos&cod_pedido=' + cod_pedido + "&" + $("#formSearch").serialize();
    }

    getParameterUpdateLineas(){
        return 'action=' + 'updateLineasPedidos&' + $('#formLineas').serialize();
    }

    evalInputsCantidades(){
        let cantidades = document.getElementsByClassName('cantidades');
        let result = [];
        result['success'] = true;
        result['errores'] = [];
        for(let i = 0; i < cantidades.length; i++){
            if(!validateCantidad(cantidades[i].value)) {
                result['success'] = false;
                result['errores'].push(cantidades[i].name.split('-')[0] + ' - ' + cantidades[i].name.split('-')[1]);
            }
        }
        return result;
    }

    getTextErrorCantidades(errores){
        let errorText = "<strong>Las siguientes lineas de pedidos tienen un formato de cantidades incorrectas</strong><br>";
        for(let i = 0; i < errores.length; i++){
            errorText += errores[i];
        }

        return errorText;
    }
}