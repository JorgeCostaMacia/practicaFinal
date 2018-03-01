"use strict";

function cleanTbody(){
    $('#tbody').empty();
}
function restoreAlbaranes(){
    $('#tableLineas').empty();
    $('#tableAlbaranes').attr('hidden', false);
}

function cleanLineas(){
    $('#tableLineas').empty();
}
function injectAlbaranes(albaranes){
    for(let i = 0; i < albaranes.length; i++){
        $('#tbody').append(
            '<tr><td>' + albaranes[i]["cod_albaran"] + '</td>' +
            '<td>' + albaranes[i]["cod_pedido"] + '</td>' +
            '<td>' + albaranes[i]["cod_cliente"] + '-' + albaranes[i]["nombre_cliente"] + '</td>' +
            '<td>' + albaranesApp.formatDate(albaranes[i]["fecha"]) + '</td>' +
            '<td>' + albaranes[i]["estado"] + '</td>' +
            '<td><input type="button" id="cod_albaran-' + albaranes[i]["cod_albaran"] + '" value="' + albaranes[i]["lineas"] + '" class="form-control btn-primary"></td></tr>'
        );
    }
}

function injectPageNumber(){
    $('#pageActual').empty();
    $('#pageActual').append($('#numPage').val());
}

function injectLineas(lineas){
    let tableLineas = '<form id="formLineas" name="formLineas">' +
        '<input type="hidden" id="usuario" name="usuario" value="gestor">' +
        '<input type="hidden" name="cod_gestor" value="' + $('#cod_gestor').val() + '">' +
        '<input type="hidden" id="cod_albaran" name="cod_albaran" value="' + cod_albaran + '">' +
        '<input type="hidden" id="cod_pedido" name="cod_pedido" value="' + lineas[0]["cod_pedido"] + '">' +
        '<h2>Albaran ' + lineas[0]["cod_albaran"] +'</h2>' +
        '<div class="table-responsive">' +
        '<table class="table table-hover">' +
        '<thead>' +
        '<tr>' +
        '<th>Linea</th>' +
        '<th>Articulo</th>' +
        '<th>Total</th>' +
        '<th>Estado</th>' +
        '<th>Cantidad</th>' +
        '<th>Borrar</th>' +
        '<th>Precio</th>' +
        '<th>Descuento</th>' +
        '<th>Iva</th>' +
        '</tr>' +
        '</thead>' +
        '<tbody>';
    for(let i = 0; i < lineas.length; i++){
        tableLineas +=
            '<tr><td>' + lineas[i]["cod_linea"] + '</td>' +
            '<td>' + lineas[i]["cod_articulo"] + '-' + lineas[i]["nombre_articulo"] + '</td>' +
            '<td>' + lineas[i]["total"].replace(".", ",") + '</td>' +
            '<td>' + lineas[i]["estado"] + '</td>' +
            '<td>' + lineas[i]["cantidad"].replace(".", ",") + '</td>' +
            '<td><div class="material-switch">'+
            '<input id="borrar-' + lineas[i]["cod_linea"] + '" name="borrar-' + lineas[i]["cod_linea"] + '" type="checkbox" value="borrar"/>'+
            '<label for="borrar-' + lineas[i]["cod_linea"] + '" class="label-danger"></label>'+
            '</div></td>';

        tableLineas += '<input type="hidden" id="cantidad-' + lineas[i]["cod_linea"] + '" name="cantidad-' + lineas[i]["cod_linea"] + '" value="' + lineas[i]["cantidad"] + '">';

        if(lineas[i]["estado"] === "pendiente"){
                tableLineas += '<td><input type="number" name="precio-' + lineas[i]["cod_linea"] + '" value="' + lineas[i]["precio"] + '" class="precios form-control" min="0"></td>';
                tableLineas += '<td><input type="number" name="descuento-' + lineas[i]["cod_linea"] + '" value="' + lineas[i]["descuento"] + '" class="descuentos form-control" min="0" max="1" step="0.01"></td>';

                tableLineas += '<td><select name="iva-' + lineas[i]["cod_linea"] + '" id="iva-' + lineas[i]["cod_linea"] + '" class="form-control">';
                if(lineas[i]["iva"] === "0"){
                    tableLineas += '<option value="0" selected>0</option>';
                    tableLineas += '<option value="4">4</option>';
                    tableLineas += '<option value="10">10</option>';
                    tableLineas += '<option value="21">21</option>';
                }
                else if(lineas[i]["iva"] === "4"){
                    tableLineas += '<option value="0">0</option>';
                    tableLineas += '<option value="4" selected>4</option>';
                    tableLineas += '<option value="10">10</option>';
                    tableLineas += '<option value="21">21</option>';
                }
                else if(lineas[i]["iva"] === "1" || lineas[i]["iva"] === "10" ){
                    tableLineas += '<option value="0">0</option>';
                    tableLineas += '<option value="0.04">4</option>';
                    tableLineas += '<option value="0.10" selected>10</option>';
                    tableLineas += '<option value="0.21">21</option>';

                }
                else if(lineas[i]["iva"] === "21"){
                    tableLineas += '<option value="0">0</option>';
                    tableLineas += '<option value="4">4</option>';
                    tableLineas += '<option value="10">10</option>';
                    tableLineas += '<option value="21" selected>21</option>';
                }
                tableLineas += '</select></td>';
            }
            else {
                tableLineas += '<td><input type="number" name="precio-' + lineas[i]["cod_linea"] + '" value="' + lineas[i]["precio"] + '" class="precios form-control" min="0" disabled></td>';
                tableLineas += '<td><input type="number" name="descuento-' + lineas[i]["cod_linea"] + '" value="' + lineas[i]["descuento"] + '" class="descuentos form-control" min="0" max="100" step="1" disabled></td>';

                tableLineas += '<td><select name="iva-' + lineas[i]["cod_linea"] + '" id="iva-' + lineas[i]["cod_linea"] + '" class="form-control" disabled>';
                if(lineas[i]["iva"] === "0"){
                    tableLineas += '<option value="0" selected>0</option>';
                    tableLineas += '<option value="4">4</option>';
                    tableLineas += '<option value="10">10</option>';
                    tableLineas += '<option value="21">21</option>';
                }
                else if(lineas[i]["iva"] === "4"){
                    tableLineas += '<option value="0">0</option>';
                    tableLineas += '<option value="4" selected>4</option>';
                    tableLineas += '<option value="10">10</option>';
                    tableLineas += '<option value="21">21</option>';
                }
                else if(lineas[i]["iva"] === "10" ){
                    tableLineas += '<option value="0">0</option>';
                    tableLineas += '<option value="4">4</option>';
                    tableLineas += '<option value="10" selected>10</option>';
                    tableLineas += '<option value="21">21</option>';

                }
                else if(lineas[i]["iva"] === "21"){
                    tableLineas += '<option value="0">0</option>';
                    tableLineas += '<option value="4">0.04</option>';
                    tableLineas += '<option value="10">0.10</option>';
                    tableLineas += '<option value="21" selected>0.21</option>';
                }
                tableLineas += '</select></td>';
            }
    }

    tableLineas += '<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><button type="button" id="procesar" name="procesar" class="form-control btn-warning" value="" >Procesar</button></td><td></td></tr>';
    tableLineas += '<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><button type="button" id="actualizar" name="actualizar" class="form-control btn-warning" value="" >Actualizar</button></td><td></td></tr>';
    tableLineas += '<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><button type="button" id="descarga" name="descarga" class="form-control btn-success" value=""><span class="glyphicon glyphicon-download" aria-hidden="true"></span> PDF</button></td><td></td></tr>';
    tableLineas += '<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><button type="button" id="buttonVolver" name="buttonVolver" class="form-control btn-primary">Volver albaranes</button></td><td></td></tr>';
    tableLineas += '</tbody></table></div></form>';

    $('#tableAlbaranes').attr('hidden', true);
    $('#tableLineas').append(tableLineas);
}


function showDescarga(cliente, albaran){
    let doc = new jsPDF('p', 'mm', [297, 210]);
    let total = 0;

    doc.setProperties({
        title: 'Albaranes',
        subject: 'Listado albaranes',
        author: 'Cliente',
        creator: 'Cliente'
    });

    let logo = new Image();
    logo.src =  'data:image/jpeg;base64,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';
    console.log(logo);
    doc.addImage(logo, 'JPEG', 20, 20,30,10);
    doc.setFontSize(8);
    doc.text(150,20,"Imagen.SA");
    doc.text(150,24,"CIF: 85479060C");
    doc.text(150,28,"EMAIL: imagen@gmail.com");
    doc.text(150,32,"TELF: 897678768876");
    doc.text(150,36,"C/ imagen Elche Alicante");

    doc.text(20,45, cliente["nombre_completo"]);
    doc.text(20,49,'CIF / DNI : ' + cliente["cif_dni"]);
    doc.text(20,53,'Razon social: ' +  cliente["razon_social"]);
    doc.text(20,57,'Domicilio social: ' + cliente["domicilio_social"]);
    doc.text(20,61,'Ciudad: ' + cliente["ciudad"]);

    doc.setFontSize(15);
    doc.text(150,45,"Albaran");
    doc.setFontSize(8);
    doc.text(150,50,'Codigo albaran: ' + albaran["cod_albaran"]);
    doc.text(150,54,'Codigo pedido : ' + albaran["cod_pedido"]);
    doc.text(150,58,'Cod cliente: ' +  albaran["cod_cliente"]);
    doc.text(150,62,'Fecha: ' + albaranesApp.formatDate(albaran["fecha"]));
    doc.text(150,66,'Estado: ' + albaran["estado"]);

    let columns = ["Codigo", "Articulo", "Precio", "Cantidad", "Descuento", "Iva", "Total", "Estado"];
    let data = [];

    for(let i = 0; i < lineasAlbaranes.length; i++){
        let acceso = [lineasAlbaranes[i]["cod_linea"], lineasAlbaranes[i]["cod_articulo"] + ' - ' + lineasAlbaranes[i]["nombre_articulo"], lineasAlbaranes[i]["precio"].replace(".", ","), lineasAlbaranes[i]["cantidad"], lineasAlbaranes[i]["descuento"].replace(".", ","), lineasAlbaranes[i]["iva"].replace(".", ","), lineasAlbaranes[i]["total"].replace(".", ","), lineasAlbaranes[i]["estado"]];
        total += 1 * lineasAlbaranes[i]["total"];
        data.push(acceso);
    }
    doc.autoTable(columns,data, {styles: {fontSize: 5, overflow: 'linebreak'}, margin:{ top: 81 }});

    doc.setFontSize(8);
    doc.text(20,70, albaranesApp.getDate() + ' Elche');
    doc.setFontType("bold");
    doc.text(20,74,('Total: ' +  total + "€").replace(".", ","));

    doc.output('dataurlnewwindow');
    doc.save("albaran.pdf");
}