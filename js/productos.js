/*===================================================================*/
//ABRIR MODAL REGISTRAR PRODUCTOS
/*===================================================================*/
function AbrirModalRegistroProductos() {
    //para que no se nos salga del modal haciendo click a los costados
    $("#mdlGestionarProducto").modal({
        backdrop: 'static',
        keyboard: false
    });
    $("#mdlGestionarProducto").modal('show'); //abrimos el modal
    $("#titulo_modal_p").html('Registrar Productos');
    $("#btnGuardarProducto").html('Registrar');
    titulo_modal = "Registrar";
    accion = 2; // guardar

    $("#iptStockReg").prop('disabled', true);
    $("#iptCodigoReg").prop('disabled', false);
    $("#esta").prop('hidden', true);
    $("#vacio").prop('hidden', false);
    $("#add_imagen").prop('hidden', false);
    $("#btnagregar_t").prop('hidden', false);
    $("#btnInsert_t").prop('hidden', true);

    $("#iptPrecioVentaOfertaReg").attr('value', '0');
    $("#iptPrecioVentaMayorReg").attr('value', '0');
    $("#select_talla").prop('disabled', false);
    $("#text_stock_talla_pro").prop('disabled', false);
    $("#btnagregar_t").prop('disabled', false);

    $(".needs-validation").removeClass("was-validated");
    $('#tbl_tallas_pro').DataTable().clear().destroy();


    let nombrefoto="";
    let f = new Date();
    //nombrefoto="PROD"
    nombrefoto=f.getDate()+""+(f.getMonth()+1)+""+f.getFullYear()+""+f.getHours()+""+f.getMilliseconds();

    var codeb =  Date.now();
    var c = document.getElementById('iptCodigoReg');
    c.value = nombrefoto;

    

}

/*===================================================================*/
//ELIMINAR ITEM DEL DATATABLE
/*===================================================================*/
function remove(t) {
    var td = t.parentNode;
    var tr = td.parentNode;
    var table = tr.parentNode;
    table.removeChild(tr);
    //SumarTotalneto();
}

/*===================================================================*/
//TRAER DATOS DEL COMBO TALLAS
/*===================================================================*/
function traeridtallanombre() {
    /* Para obtener el valor */
    var cod = document.getElementById("select_talla").value;
    document.getElementById('text_id_talla').value = cod;

    /* Para obtener el texto */
    var combo = document.getElementById("select_talla");
    var selected = combo.options[combo.selectedIndex].text;
    document.getElementById('text_nombre_talla').value = selected;
}

/*===================================================================*/
//VERIFICAR QUE NO SE AGREGE DOS TALLAS IGUALES
/*===================================================================*/
function verificarid(id) {
    let idverificar = document.querySelectorAll('#tbl_tallas_pro td[for="id"]');
    return [].filter.call(idverificar, td => td.textContent === id).length === 1;
}


/*===================================================================*/
//SUMAR COLUMNAS DEL STOCK Y SUMAR EN TEXBOX 
/*===================================================================*/

function sumar_columnas(){
    var sum=0;
        //itera cada input de clase .subtotal y la suma
        $('.subtotal').each(function() {sum += parseFloat($(this).text());                     
        }); 
        $('#iptStockReg').val(sum);
        //$('#iptStockReg').val(sum.toFixed(2));
    }


// CALCULA LA UTILIDAD
function calcularUtilidad() {

    var iptPrecioCompraReg = $("#iptPrecioCompraReg").val();
    var iptPrecioVentaReg = $("#iptPrecioVentaReg").val();
    var Utilidad = iptPrecioVentaReg - iptPrecioCompraReg;

    // $("#iptUtilidadReg").val(Utilidad.toFixed(2));

}


/*===================================================================*/
//RESETAR SELECT DE LAS TALLAS POR CODIGO
/*===================================================================*/
function reseteodeSelect() {
    
    var selectElement = document.getElementById("select_talla_aumentar");

    while (selectElement.length > 0) {
    selectElement.remove(0);
    }
}

/*===================================================================*/
//PREVIEW DE LA IMAGEN
/*===================================================================*/
function previewFile(input) {
    var file = $("input[type=file]").get(0).files[0];
    if(file["type"] != "image/jpeg" && file["type"] != "image/png"){
        $("#text_imagen").val('');
       
        Toast.fire({
                icon: 'error',
                title: 'La imagen debe ser jpeg o png!'
               
            });
    }else if(file["size"] > 2000000 ){

        $("#text_imagen").val('');
         Toast.fire({
                icon: 'error',
                title: 'La imagen no debe pesar más de 2mb!'
               //footer: '<a href>Why do I have this issue?</a>'
            });
    }
    else{
   // if(file){
        var reader = new FileReader();
        reader.onload = function(){
            $("#previewImg").attr("src", reader.result);
        }
        reader.readAsDataURL(file);
    }

}

function previewFile233333(input) {
    var file = $("input[type=file]").get(0).files[0];
    if(file["type"] != "image/jpeg" && file["type"] != "image/png"){
        $("#text_imagen_m").val('');
       
        Toast.fire({
                icon: 'error',
                title: 'La imagen debe ser jpeg o png!'
               
            });
    }else if(file["size"] > 2000000 ){

        $("#text_imagen_m").val('');
         Toast.fire({
                icon: 'error',
                title: 'La imagen no debe pesar más de 2mb!'
               //footer: '<a href>Why do I have this issue?</a>'
            });
    }
    else{
   // if(file){
        var reader = new FileReader();
        reader.onload = function(){
            $("#previewImg_m").attr("src", reader.result);
        }
        reader.readAsDataURL(file);
    }

}













/*===================================================================*/
    //PARA MAYUSCULAS
/*===================================================================*/
function mayus(e) {
    e.value = e.value.toUpperCase();
}





