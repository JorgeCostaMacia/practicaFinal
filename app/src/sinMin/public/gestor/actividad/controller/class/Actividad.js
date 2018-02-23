"use strict";

class Actividad{
    getParameterSearchActividad(){
        return  'action=' + 'searchActividad&' + $("#formSearch").serialize();
    }
}