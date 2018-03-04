"use strict";

class Actividad{
    getParameterSearchActividad(){
        return  'action=' + 'searchActividad&' + $("#formSearch").serialize();
    }
    formatDate(date){
            let dateTime = date.split(" ");
            let format = dateTime[0].split("-");
            return format[2] + "-" + format[1] + "-" + format[0] + " " + dateTime[1];
    }
}