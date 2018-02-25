"use strict";

function cleanTbody(){
    $('#tbody').empty();
}

function injectAccesos(accesos){
    for(let i = 0; i < accesos.length; i++){
        $('#tbody').append(
            '<tr><td>' + accesos[i]["cod_acceso"] + '</td>' +
            '<td>' + accesos[i]["cod_gestor"] + ' - ' + accesos[i]["nombre_gestor"] +'</td>' +
            '<td>' + accesosApp.formatDate(accesos[i]["fecha_hora_acceso"]) + '</td>' +
            '<td>' + accesosApp.formatDate(accesos[i]["fecha_hora_salida"]) + '</td></tr>'
        );
    }
}

function injectPageNumber(){
    $('#pageActual').empty();
    $('#pageActual').append($('#numPage').val());
}

function enableDescarga(){$('#descarga').attr('disabled', false);}
function disableDescarga(){$('#descarga').attr('disabled', true);}


function showDescarga(event){
    let doc = new jsPDF('p', 'mm', [297, 210]);
    doc.setProperties({
        title: 'Accesos',
        subject: 'Listado accesos',
        author: 'Gestor',
        creator: 'Gestor'
    });

    let logo = new Image();
    logo.src = '../public/src/img/logo.jpg';
    doc.addImage(logo, 'JPG', 20, 20,30,10);
    doc.setFontSize(8);
    doc.text(150,20,"Imagen.SA");
    doc.text(150,24,"CIF: 85479060C");
    doc.text(150,28,"EMAIL: imagen@gmail.com");
    doc.text(150,32,"TELF: 897678768876");
    doc.text(150,36,"C/ imagen Elche Alicante");

    doc.setFontSize(15);
    doc.text(20,45,"Accesos");

    let columns = ["Codigo", "Gestor", "Acceso", "Salida"];
    let data = [];

    for(let i = 0; i < accesos.length; i++){
        let acceso = [accesos[i]["cod_acceso"], accesos[i]["cod_gestor"] + ' - ' + accesos[i]["nombre_gestor"], accesosApp.formatDate(accesos[i]["fecha_hora_acceso"]), accesosApp.formatDate(accesos[i]["fecha_hora_salida"])];
        data.push(acceso);
    }
    doc.autoTable(columns,data, {styles: {fontSize: 5, overflow: 'linebreak'}, margin:{ top: 50 }});

    doc.output('dataurlnewwindow');
    doc.save("accesos.pdf");
}