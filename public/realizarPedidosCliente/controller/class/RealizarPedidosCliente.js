"use strict";

class RealizarPedidosCliente{
    getParameterSearchArticulos(){
        let parameter = 'action=' + 'searchArticulos&';
        parameter += $("#formSearch").serialize();
        return parameter;
    }
}