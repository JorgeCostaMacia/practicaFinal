"use strict";

class Pedidos{
    getParameterSearchPedidosCliente(){
        return 'action=' + 'searchPedidos&' + $("#formSearch").serialize();
    }

    getParameterSearchLineas(cod_pedido){
        return 'action=' + 'searchLineasPedidos&cod_pedido=' + cod_pedido + "&" + $("#formSearch").serialize();
    }

    getParameterUpdateLineas(){
        return 'action=' + 'updateLineasPedidos&' + $('#formLineas').serialize();
    }

    getParameterProcesarLineas(){
        let parameter = 'action=' + 'procesarLineasPedidos&usuario=' + $('#usuario').val() + '&cod_pedido=' +  $('#cod_pedido').val() + '&cod_gestor=' +  $('#cod_gestor').val() + '&cod_cliente=' + $('#cod_cliente').val();
        for(let i = 0; i < lineasPedidos.length; i++){
            if($('#estado-' + lineasPedidos[i]["cod_linea"]).val() === "pendiente" && $('#estado-' + lineasPedidos[i]["cod_linea"]).prop('checked')){
                parameter += '&cod_linea-' + lineasPedidos[i]["cod_linea"] + '=pendiente';
                parameter += '&cod_articulo-' + lineasPedidos[i]["cod_linea"] + '=' + lineasPedidos[i]["cod_articulo"] ;
                parameter += '&cantidad-' + lineasPedidos[i]["cod_linea"] + '=' + lineasPedidos[i]["cantidad"] ;
            }
        }
        return parameter;
    }

    getCodClientePedido(cod_pedido){
        for(let i = 0; i < pedidos.length; i++){
            if(pedidos[i]["cod_pedido"] === cod_pedido){
                return pedidos[i]["cod_cliente"];
            }
        }
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

    evalEstadoInputs(){
        let result = [];
        result['success'] = false;
        for(let i = 0; i < lineasPedidos.length; i++){
            if($('#estado-' + lineasPedidos[i]["cod_linea"]).val() === "pendiente" && $('#estado-' + lineasPedidos[i]["cod_linea"]).prop('checked')){
                result['success'] = true;
            }
        }
        return result;
    }

    evalExistPendientes(){
        let result = [];
        result['success'] = false;
        for(let i = 0; i < lineasPedidos.length; i++){
            if($('#estado-' + lineasPedidos[i]["cod_linea"]).val() === "pendiente"){
                result['success'] = true;
            }
        }
        return result;
    }
    formatDate(date){
        let format = date.split("-");
        return format[2] + "-" + format[1] + "-" + format[0];
    }
}