<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <!-- <div class="col-md-6">
                <h2 class="m-0">Categorías</h2>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                    <li class="breadcrumb-item">Productos</li>
                    <li class="breadcrumb-item active">Categorías</li>
                </ol>
            </div> -->
        </div>
    </div>
</div>

<!-- Main content -->
<div class="content pb-2">
    <div class="container-fluid">
        <div class="row p-0 m-0">
            <div class="col-md-12">
                <div class="card card-info card-outline shadow ">
                    <div class="card-header">
                        <h3 class="card-title">Listado de Colores</h3>
                        <button class="btn btn-info btn-sm float-right" id="abrirmodal"><i class="fas fa-plus"></i>
                            Nuevo</button>
                    </div>
                    <div class=" card-body">
                        <div class="table-responsive">
                            <table id="tbl_colores" class="table display table-hover text-nowrap compact  w-100  rounded">
                                <!-- <table id="tbl_categorias" class="table display table-hover text-nowrap compact  w-100  rounded"> -->
                                <thead class="bg-info">
                                    <tr>
                                        <th>Id</th>
                                        <th>Descrpcion</th>
                                        <!-- <th>Medida</th> -->
                                        <th class="text-center">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody class="small text left">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->

<!-- MODAL REGISTRAR COLOR-->
<div class="modal fade" id="modal_registro_color" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header bg-gray py-1 align-items-center">
                <h5 class="modal-title" id="titulo_modal_color">Registro de Colores</h5>
                <button type="button" class="close  text-white border-0 fs-5" id="btncerrarmodal"
                    data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <form class="needs-validation" novalidate>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group mb-2">
                                <label for="" class="">
                                    <input type="text" id="id_color" hidden>
                                    <span class="small"> Descipcion 22 ejemplo seaf</span><span class="text-danger">*</span>
                                </label>
                                <input type="text" class=" form-control form-control-sm" id="text_descripcion"
                                    name="text_descripcion" placeholder="Color" required>
                                <div class="invalid-feedback">Debe ingresar un color</div>

                            </div>
                        </div>


                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"
                    id="btncerrar">Cerrar</button>
                <a class="btn btn-info btn-sm" id="btnregistrar_color">Registrar</a>
            </div>
        </div>
    </div>
</div>
<!-- fin Modal -->


<script>
var accion;
var tbl_colores;

var Toast = Swal.mixin({
    toast: true,
    position: 'top',
    showConfirmButton: false,
    timer: 3000
});
$(document).ready(function() {

    /***************************************************************************
     * INICIAR DATATABLE CATEGORIAS
     ******************************************************************************/
    var tbl_colores = $("#tbl_colores").DataTable({
        responsive: true,
        dom: 'Bfrtip',
        buttons: [{
                "extend": 'excelHtml5',
                "title": 'Reporte Color',
                "exportOptions": {
                    'columns': [1]
                },
                "text": '<i class="fa fa-file-excel"></i>',
                "titleAttr": 'Exportar a Excel'
            },
            {
                "extend": 'print',
                "text": '<i class="fa fa-print"></i> ',
                "titleAttr": 'Imprimir',
                "exportOptions": {
                    'columns': [1]
                },
                "download": 'open'
            },
            'pageLength',
        ],
        ajax: {
            url: "ajax/color_ajax.php",
            dataSrc: "",
            type: "POST",
            data: {
                'accion': 1
            },
        },
        columnDefs: [{
                targets: 0,
                visible: true

            },
            {
                targets: 2, //columna 2
                sortable: false, //no ordene
                render: function(data, type, full, meta) {
                    return "<center>" +
                        "<span class='btnEditarcolor text-primary px-1' style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Editar Color'> " +
                        "<i class='fas fa-pencil-alt fs-6'></i> " +
                        "</span> " +
                        "<span class='btnEliminarcolor text-danger px-1'style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Eliminar Color'> " +
                        "<i class='fas fa-trash fs-6'> </i> " +
                        "</span>" +
                        "</center>"
                }
            }
        ],

        lengthMenu: [0, 5, 10, 15, 20, 50],
        "pageLength": 10,
        "language": idioma_espanol,
        select: true
    });


    /*===================================================================*/
    //EVENTO PARA ABRIR EL MODAL DE REGISTRAR
    /*===================================================================*/
    $("#abrirmodal").on('click', function() {
        AbrirModalRegistroColor();
    })


    /*===================================================================*/
    //EVENTO QUE GUARDA LOS DATOS DEL PRODUCTO, PREVIA VALIDACION DEL INGRESO DE LOS DATOS OBLIGATORIOS
    /*===================================================================*/
    document.getElementById("btnregistrar_color").addEventListener("click", function() {

        var forms = document.getElementsByClassName('needs-validation');
        var validation = Array.prototype.filter.call(forms, function(form) {

            //si se ingresan todos los datos 
            if (form.checkValidity() === true) {

                // console.log("Listo para registrar el producto")
                Swal.fire({
                    title: 'Está seguro de ' + titulo_modal + ' el Color?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si',
                    cancelButtonText: 'Cancelar',
                }).then((result) => {

                    if (result.isConfirmed) {

                        var datos = new FormData();

                        datos.append("accion", accion);
                        datos.append("id_color", $("#id_color").val()); //id
                        datos.append("descripcion", $("#text_descripcion")
                            .val()); //nombre

                        if (accion == 2) {
                            var titulo_msj = "El Color se registro correctamente"
                        }

                        if (accion == 3) {
                            var titulo_msj = "El Color se actualizo correctamente"
                        }

                        $.ajax({
                            url: "ajax/color_ajax.php",
                            method: "POST",
                            data: datos, //enviamos lo de la variable datos
                            cache: false,
                            contentType: false,
                            processData: false,
                            dataType: 'json',
                            success: function(respuesta) {

                                if (respuesta == "ok") {

                                    Toast.fire({
                                        icon: 'success',
                                        //title: 'El Color se registro de forma correcta'
                                        title: titulo_msj
                                    });

                                    tbl_colores.ajax.reload(); //recargamos el datatable
                                    $("#modal_registro_color").modal('hide');
                                    $("#text_descripcion").val("");
                                    $("#id_color").val("");

                                    $(".needs-validation").removeClass("was-validated");

                                } else {
                                    Toast.fire({
                                        icon: 'error',
                                        title: 'El Color no se pudo registrar'
                                    });
                                }

                            }
                        });

                    }
                })


            } else {
                //console.log(" ") //No paso la validacion
            }

            form.classList.add('was-validated');


        });
    });




    /* ======================================================================================
      EVENTO AL DAR CLICK EN EL BOTON EDITAR CATEGORIA
     =========================================================================================*/
    $("#tbl_colores tbody").on('click', '.btnEditarcolor', function() {

        accion = 3; //seteamos la accion para editar
        titulo_modal = "Actualizar";
        $("#modal_registro_color").modal({
            backdrop: 'static',
            keyboard: false
        });
        $("#modal_registro_color").modal('show'); //modal de registrar producto
        $("#titulo_modal_color").html('Actualizar Color');
        $("#btnregistrar_color").html('Actualizar');

        if (tbl_colores.row(this).child.isShown()) {
            var data = tbl_colores.row(this).data();
        } else {
            var data = tbl_colores.row($(this).parents('tr'))
        .data(); //OBTENER EL ARRAY CON LOS DATOS DE CADA COLUMNA DEL DATATABLE
            // console.log(data);
        }

        $("#id_color").val(data[0]);
        $("#text_descripcion").val(data[1]);

    })



    /* ======================================================================================
       EVENTO AL DAR CLICK EN EL BOTON ELIMINAR PRODUCTO
    =========================================================================================*/
    $("#tbl_colores tbody").on('click', '.btnEliminarcolor', function() {

        accion = 4; //seteamos la accion para editar

        if (tbl_colores.row(this).child.isShown()) {
            var data = tbl_colores.row(this).data();
        } else {
            var data = tbl_colores.row($(this).parents('tr'))
                .data(); //OBTENER EL ARRAY CON LOS DATOS DE CADA COLUMNA DEL DATATABLE
            //   console.log("🚀 ~ file: productos.php ~ line 751 ~ $ ~ data", data);
        }

        var id_color = data[0];

        Swal.fire({
            title: 'Desea Eliminar el Color "' + data[1] + '" ?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Eliminar',
            cancelButtonText: 'Cancelar',
        }).then((result) => {

            if (result.isConfirmed) {

                var datos = new FormData();

                datos.append("accion", accion);
                datos.append("id_color",id_color); //jalamos el codigo que declaramos mas arriba


                $.ajax({
                    url: "ajax/color_ajax.php",
                    method: "POST",
                    data: datos, //enviamos lo de la variable datos
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    success: function(respuesta) {

                        if (respuesta == "ok") {

                            Toast.fire({
                                icon: 'success',
                                title: 'El Color se Elimino de forma correcta'
                                // title: titulo_msj
                            });

                            tbl_colores.ajax.reload(); //recargamos el datatable

                        } else {
                            Toast.fire({
                                icon: 'error',
                                title: 'El Color no se pudo Eliminar'
                            });
                        }

                    }
                });

            }
        })

    })


    /* ======================================================================================
     EVENTO QUE LIMPIA EL INPUT  AL CERRAR LA VENTANA MODAL
     =========================================================================================*/
    $("#btncerrarmodal, #btncerrar").on('click', function() {
        $("#id_color").val("");
        $("#text_descripcion").val("");

    })




}) //////////// FIN DOCUMENT READY



function AbrirModalRegistroColor() {
    //para que no se nos salga del modal haciendo click a los costados
    $("#modal_registro_color").modal({
        backdrop: 'static',
        keyboard: false
    });
    $("#modal_registro_color").modal('show'); //abrimos el modal
    $("#titulo_modal_color").html('Registrar Color');
    $("#btnregistrar_color").html('Registrar');
    accion = 2; // guardar
    titulo_modal = "Registrar";
}


var idioma_espanol = {
    select: {
        rows: "%d fila seleccionada"
    },
    "sProcessing": "Procesando...",
    "sLengthMenu": "Ver _MENU_ ",
    "sZeroRecords": "No se encontraron resultados",
    "sEmptyTable": "No hay informacion en esta tabla",
    "sInfo": "Mostrando (_START_ a _END_) total de _TOTAL_ registros",
    "sInfoEmpty": "Registros del (0 al 0) total de 0 registros",
    "sInfoFiltered": "(Filtrado de un total de _MAX_ registros)",
    "SInfoPostFix": "",
    "sSearch": "Buscar:",
    "sUrl": "",
    "sInfoThousands": ",",
    "sLoadingRecords": "<b>No se encontraron datos</b>",
    "oPaginate": {
        "sFirst": "Primero",
        "sLast": "Ultimo",
        "sNext": "Siguiente",
        "sPrevious": "Anterior"
    },
    "aria": {
        "sSortAscending": ": ordenar de manera Ascendente",
        "SSortDescending": ": ordenar de manera Descendente ",
    }
}
</script>