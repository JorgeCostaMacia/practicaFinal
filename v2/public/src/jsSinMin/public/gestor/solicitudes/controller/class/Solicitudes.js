"use strict";

class Solicitudes{
    getParameterSearchSolicitudes(){
        return  'action=' + 'searchSolicitudes&' + $("#formSearch").serialize();
    }
    getParameterAceptarSolicitud(event){
        return 'action=' + 'aceptarSolicitud&usuario=' + $('#usuario').val() + "&cod_solicitud=" + event.target.name.split('-')[1];
    }
    getParameterCancelarSolicitud(event){
        return 'action=' + 'cancelarSolicitud&usuario=' + $('#usuario').val() + "&cod_solicitud=" + event.target.name.split('-')[1];
    }
}