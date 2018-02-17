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

    getParameterUpdateLineas(){
        let parameter = 'action=' + 'updateLineasPedidos&';
        parameter += $('#formLineas').serialize();
        return parameter;
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