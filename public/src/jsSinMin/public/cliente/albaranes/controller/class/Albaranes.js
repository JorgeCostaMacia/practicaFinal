"use strict";

class Albaranes{
    getParameterSearchAlbaranes(){
        return 'action=' + 'searchAlbaranes&' + $("#formSearch").serialize();
    }

    getParameterSearchLineas(cod_albaran){
        return 'action=' + 'searchLineasAlbaranes&cod_albaran=' + cod_albaran + "&" + $("#formSearch").serialize();
    }
    getParameterSearchCliente(){
        return 'action=' + 'searchCliente&' + $("#formSearch").serialize();
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