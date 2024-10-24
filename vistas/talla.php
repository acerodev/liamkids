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
                        <h3 class="card-title">Listado de Tallas</h3>
                        <button class="btn btn-info btn-sm float-right" id="abrirmodal"><i class="fas fa-plus"></i>
                            Nuevo</button>
                    </div>
                    <div class=" card-body">
                        <div class="table-responsive">
                            <table id="tbl_tallas" class="table display table-hover text-nowrap compact  w-100  rounded">
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
<!-- MODAL REGISTRAR TALLA-->
<div class="modal fade" id="modal_registro_talla" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header bg-gray py-1 align-items-center">
                <h5 class="modal-title" id="titulo_modal_talla">Registro de Tallas</h5>
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
                                    <input type="text" id="id_talla" hidden>
                                    <span class="small"> Descipcion</span><span class="text-danger">*</span>
                                </label>
                                <input type="text" class=" form-control form-control-sm" id="text_descripcion"
                                    name="text_descripcion" placeholder="Talla" required>
                                <div class="invalid-feedback">Debe ingresar una talla</div>

                            </div>
                        </div>


                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"
                    id="btncerrar">Cerrar</button>
                <!-- <button type="button" class="btn btn-primary btn-sm" id="btnregistrar_talla">Registrar</button> -->
                <a class="btn btn-info btn-sm" id="btnregistrar_talla">Registrar</a>
            </div>
        </div>
    </div>
</div>
<!-- fin Modal -->

<script>
var accion;
var tbl_tallas;

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
    var tbl_tallas = $("#tbl_tallas").DataTable({
        responsive: true,
        dom: 'Bfrtip',
        buttons: [{
                "extend": 'excelHtml5',
                "title": 'Reporte tallas',
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
            url: "ajax/talla_ajax.php",
            dataSrc: "",
            type: "POST",
            data: {
                'accion': 1
            },
        },
        columnDefs: [{
                targets: 0,
                visible: true,
                orderable: false,

            },
            {
                targets: 2, //columna 2
                sortable: false, //no ordene
                render: function(data, type, full, meta) {
                    return "<center>" +
                        "<span class='btnEditartalla  text-primary px-1' style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Editar Talla'> " +
                        "<i class='fas fa-pencil-alt fs-6'></i> " +
                        "</span> " +
                        "<span class='btnEliminartalla text-danger px-1'style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Eliminar Talla'> " +
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
        AbrirModalRegistroTalla();
    })

    /*===================================================================*/
    //EVENTO QUE GUARDA LOS DATOS DEL PRODUCTO, PREVIA VALIDACION DEL INGRESO DE LOS DATOS OBLIGATORIOS
    /*===================================================================*/
    document.getElementById("btnregistrar_talla").addEventListener("click", function() {

        var forms = document.getElementsByClassName('needs-validation');
        var validation = Array.prototype.filter.call(forms, function(form) {

            //si se ingresan todos los datos 
            if (form.checkValidity() === true) {

                // console.log("Listo para registrar el producto")
                Swal.fire({
                    title: 'Está seguro de ' + titulo_modal + ' la Talla?',
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
                        datos.append("id_talla", $("#id_talla").val()); //id
                        datos.append("descripcion", $("#text_descripcion")
                    .val()); //nombre

                        if (accion == 2) {
                            var titulo_msj = "La Talla se registro correctamente"
                        }

                        if (accion == 3) {
                            var titulo_msj = "La Talla se actualizo correctamente"
                        }

                        $.ajax({
                            url: "ajax/talla_ajax.php",
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
                                        //title: 'La Talla se registro de forma correcta'
                                        title: titulo_msj
                                    });

                                    tbl_tallas.ajax
                                .reload(); //recargamos el datatable
                                    $("#modal_registro_talla").modal(
                                    'hide');
                                    $("#text_descripcion").val("");
                                    $("#id_talla").val("");

                                    $(".needs-validation").removeClass(
                                        "was-validated");

                                } else {
                                    Toast.fire({
                                        icon: 'error',
                                        title: 'La Talla no se pudo registrar'
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
    $("#tbl_tallas tbody").on('click', '.btnEditartalla', function() {

        accion = 3; //seteamos la accion para editar
        titulo_modal = "Actualizar";
        $("#modal_registro_talla").modal({
            backdrop: 'static',
            keyboard: false
        });
        $("#modal_registro_talla").modal('show'); //modal de registrar producto
        $("#titulo_modal_talla").html('Actualizar Talla');
        $("#btnregistrar_talla").html('Actualizar');

        if (tbl_tallas.row(this).child.isShown()) {
            var data = tbl_tallas.row(this).data();
        } else {
            var data = tbl_tallas.row($(this).parents('tr'))
        .data(); //OBTENER EL ARRAY CON LOS DATOS DE CADA COLUMNA DEL DATATABLE
            // console.log(data);
        }

        $("#id_talla").val(data[0]);
        $("#text_descripcion").val(data[1]);

    })


    /* ======================================================================================
        EVENTO AL DAR CLICK EN EL BOTON ELIMINAR PRODUCTO
     =========================================================================================*/
    $("#tbl_tallas tbody").on('click', '.btnEliminartalla', function() {

        accion = 4; //seteamos la accion para editar

        if (tbl_tallas.row(this).child.isShown()) {
            var data = tbl_tallas.row(this).data();
        } else {
            var data = tbl_tallas.row($(this).parents('tr'))
        .data(); //OBTENER EL ARRAY CON LOS DATOS DE CADA COLUMNA DEL DATATABLE
            //   console.log("🚀 ~ file: productos.php ~ line 751 ~ $ ~ data", data);
        }

        var id_talla = data[0];

        Swal.fire({
            title: 'Desea Eliminar la Talla "' + data[1] + '" ?',
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
                datos.append("id_talla",
                id_talla); //jalamos el codigo que declaramos mas arriba


                $.ajax({
                    url: "ajax/talla_ajax.php",
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
                                title: 'La Talla se Elimino de forma correcta'
                                // title: titulo_msj
                            });

                            tbl_tallas.ajax.reload(); //recargamos el datatable

                        } else {
                            Toast.fire({
                                icon: 'error',
                                title: 'La Talla no se pudo Eliminar'
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
        $("#id_talla").val("");
        $("#text_descripcion").val("");

    })



}) //////////// FIN DOCUMENT READY


function AbrirModalRegistroTalla() {
    //para que no se nos salga del modal haciendo click a los costados
    $("#modal_registro_talla").modal({
        backdrop: 'static',
        keyboard: false
    });
    $("#modal_registro_talla").modal('show'); //abrimos el modal
    $("#titulo_modal_talla").html('Registrar Talla');
    $("#btnregistrar_talla").html('Registrar');
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