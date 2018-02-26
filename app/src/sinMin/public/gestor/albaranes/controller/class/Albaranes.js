"use strict";

class Albaranes{
    getParameterSearchAlbaranes(){
        return 'action=' + 'searchAlbaranes&' + $("#formSearch").serialize();
    }

    getParameterSearchLineas(cod_albaran){
        return 'action=' + 'searchLineasAlbaranes&cod_albaran=' + cod_albaran + "&" + $("#formSearch").serialize();
    }
    getParameterSearchCliente(){
        return 'action=' + 'searchCliente&' + $("#formSearch").serialize() + "&cod_cliente=" + cod_cliente;
    }
    getParameterUpdateAlbaran(){
        return 'action=' + 'updateAlbaran&' + $("#formLineas").serialize();
    }
    getParameterProcesarAlbaran(){
        return 'action=' + 'procesarAlbaran&' + $("#formLineas").serialize() + "&cod_cliente=" + cod_cliente;
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
    evalInputsPrecio(){
        let precios = document.getElementsByClassName('precios');
        let result = [];
        result['success'] = true;
        result['errores'] = [];
        for(let i = 0; i < precios.length; i++){
            if(!validatePrecio(precios[i].value)) {
                result['success'] = false;
                result['errores'].push('Linea - ' + precios[i].name.split('-')[1] + "<br>");
            }
        }
        return result;
    }

    evalInputsDescuentos(){
        let descuentos = document.getElementsByClassName('descuentos');
        let result = [];
        result['success'] = true;
        result['errores'] = [];
        for(let i = 0; i < descuentos.length; i++){
            if(!validateDescuento(descuentos[i].value)) {
                result['success'] = false;
                result['errores'].push('Linea ' + ' - ' + descuentos[i].name.split('-')[1] + "<br>");
            }
        }
        return result;
    }



    getTextErrorPrecio(errores){
        let errorText = "<strong>Las siguientes lineas de albaran tienen un formato de precio incorrecto</strong><br>";
        for(let i = 0; i < errores.length; i++){
            errorText += errores[i];
        }

        return errorText;
    }

    getTextErrorDescuento(errores){
        let errorText = "<strong>Las siguientes lineas de albaran tienen un formato de descuento incorrecto</strong><br>";
        for(let i = 0; i < errores.length; i++){
            errorText += errores[i];
        }

        return errorText;
    }
}