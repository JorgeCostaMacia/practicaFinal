"use strict";

class Albaranes{
    getParameterSearchAlbaranes(){
        return 'action=' + 'searchAlbaranes&' + $("#formSearch").serialize();
    }

    getParameterSearchLineas(cod_albaran){
        return 'action=' + 'searchLineasPedidos&cod_albaran=' + cod_albaran + "&" + $("#formSearch").serialize();
    }
}