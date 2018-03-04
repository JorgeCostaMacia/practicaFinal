"use strict";

class Facturas{
    getParameterSearchFacturas(){
        return 'action=' + 'searchFacturas&' + $("#formSearch").serialize();
    }

    getParameterSearchLineas(cod_factura){
        return 'action=' + 'searchLineasFacturas&cod_factura=' + cod_factura + "&" + $("#formSearch").serialize();
    }
    getParameterSearchCliente(){
        return 'action=' + 'searchCliente&' + $("#formSearch").serialize() + "&cod_cliente=" + cod_cliente;
    }
    getParameterProcesarFactura(){
        let parReturn = 'action=' + 'procesarFactura&' + $("#formLineas").serialize();
        if($('#estado').prop('checked') && factura["estado"] === "pendiente"){
            parReturn += '&estado=procesado';
        }
        else if(!$('#estado').prop('checked') && factura["estado"] === "procesado"){
            parReturn += '&estado=pendiente';
        }
        return parReturn;
    }
    getParameterUpdateFactura(){
        return 'action=' + 'updateFactura&' + $("#formLineas").serialize();
    }
    evalChangeEstado(){
        if($('#estado').prop('checked') && factura["estado"] === "pendiente"){
            return true;
        }
        else if(!$('#estado').prop('checked') && factura["estado"] === "procesado"){
            return true;
        }
        else { return false; }
    }
    evalInputDescuento(){
        let result = [];
        result['success'] = true;
        result['errores'] = [];
        if(!validateDescuento($('#descuento').val())) {
            result['success'] = false;
            result['errores'].push('Factura ' + ' - ' + factura["cod_factura"] + "<br>");
        }
        return result;
    }
    getTextErrorDescuento(errores){
        let errorText = "<strong>La siguiente factura tiene un formato de descuento incorrecto</strong><br>";
        errorText += errores[0];
        return errorText;
    }

    getDate(){
        let fechaActual = new Date();
        let mes = fechaActual.getMonth() * 1 + 1;
        if (mes < 10) mes = "0" + mes;
        return fechaActual.getDate() + "-" + mes + "-" + fechaActual.getFullYear();
    }
    formatDate(date){
        let format = date.split("-");
        return format[2] + "-" + format[1] + "-" + format[0];
    }
}