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
                        <h3 class="card-title">Listado de Unidades de Medida</h3>
                        <button class="btn btn-info btn-sm float-right" id="abrirmodal"><i class="fas fa-plus"></i>
                            Nuevo</button>
                    </div>
                    <div class=" card-body">
                        <div class="table-responsive">
                            <table id="tbl_medida" class="table display table-hover text-nowrap compact  w-100  rounded">
                                <!-- <table id="tbl_categorias" class="table display table-hover text-nowrap compact  w-100  rounded"> -->
                                <thead class="bg-info">
                                    <tr>
                                        <th>Id</th>
                                        <th>Descrpcion</th>
                                        <th>Abreviatura</th>
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

<!-- MODAL REGISTRAR MEDIDA-->
<div class="modal fade" id="modal_registro_medida" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header bg-gray py-1 align-items-center">
                <h5 class="modal-title" id="titulo_modal_medida">Registro de Colores</h5>
                <button type="button" class="close  text-white border-0 fs-5" id="btncerrarmodal"
                    data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mb-2">
                                <label for="" class="">
                                    <input type="text" id="id_medida" hidden>
                                    <span class="small"> Descripcion</span><span class="text-danger">*</span>
                                </label>
                                <input type="text" class=" form-control form-control-sm" id="text_descripcion" name=""
                                    placeholder="Descripcion" required>
                                <div class="invalid-feedback">Debe ingresar una Descripcion</div>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-2">
                                <label for="" class="">

                                    <span class="small"> Abreviatura</span><span class="text-danger">*</span>
                                </label>
                                <input type="text" class=" form-control form-control-sm" id="text_abreviatura" name=""
                                    placeholder="Abreviatura" required>
                                <div class="invalid-feedback">Debe ingresar una Abreviatura</div>

                            </div>
                        </div>


                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"
                    id="btncerrar">Cerrar</button>
                <a class="btn btn-info btn-sm" id="btnregistrar_medida">Registrar</a>
            </div>
        </div>
    </div>
</div>
<!-- fin Modal -->

<script>
var accion;
var tbl_medida;

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
    var tbl_medida = $("#tbl_medida").DataTable({
        responsive: true,
        dom: 'Bfrtip',
        buttons: [{
                "extend": 'excelHtml5',
                "title": 'Reporte Medida',
                "exportOptions": {
                    'columns': [1, 2]
                },
                "text": '<i class="fa fa-file-excel"></i>',
                "titleAttr": 'Exportar a Excel'
            },
            {
                "extend": 'print',
                "text": '<i class="fa fa-print"></i> ',
                "titleAttr": 'Imprimir',
                "exportOptions": {
                    'columns': [1, 2]
                },
                "download": 'open'
            },
            'pageLength',
        ],
        ajax: {
            url: "ajax/medida_ajax.php",
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
                targets: 3, //columna 2
                sortable: false, //no ordene
                render: function(data, type, full, meta) {
                    return "<center>" +
                        "<span class='btnEditarmedida text-primary px-1' style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Editar Medida'> " +
                        "<i class='fas fa-pencil-alt fs-6'></i> " +
                        "</span> " +
                        "<span class='btnEliminarmedida text-danger px-1'style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Eliminar Medida'> " +
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
        AbrirModalRegistroMedida();
    })

    /*===================================================================*/
    //EVENTO QUE GUARDA LOS DATOS DEL PRODUCTO, PREVIA VALIDACION DEL INGRESO DE LOS DATOS OBLIGATORIOS
    /*===================================================================*/
    document.getElementById("btnregistrar_medida").addEventListener("click", function() {

        var forms = document.getElementsByClassName('needs-validation');
        var validation = Array.prototype.filter.call(forms, function(form) {

            //si se ingresan todos los datos 
            if (form.checkValidity() === true) {

                // console.log("Listo para registrar el producto")
                Swal.fire({
                    title: 'Está seguro de ' + titulo_modal + ' la Unidad de medida?',
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
                        datos.append("id_medida", $("#id_medida").val()); //id
                        datos.append("descripcion", $("#text_descripcion").val());
                        datos.append("abreviatura", $("#text_abreviatura").val());

                        if (accion == 2) {
                            var titulo_msj = "La Medida se registro correctamente"
                        }

                        if (accion == 3) {
                            var titulo_msj = "La Medida se actualizo correctamente"
                        }

                        $.ajax({
                            url: "ajax/medida_ajax.php",
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

                                    tbl_medida.ajax
                                        .reload(); //recargamos el datatable
                                    $("#modal_registro_medida").modal(
                                        'hide');
                                    $("#text_descripcion").val("");
                                    $("#text_abreviatura").val("");
                                    $("#id_medida").val("");

                                    $(".needs-validation").removeClass(
                                        "was-validated");

                                } else {
                                    Toast.fire({
                                        icon: 'error',
                                        title: 'La medida no se pudo registrar'
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
    $("#tbl_medida tbody").on('click', '.btnEditarmedida', function() {

        accion = 3; //seteamos la accion para editar
        titulo_modal = "Actualizar";
        $("#modal_registro_medida").modal({
            backdrop: 'static',
            keyboard: false
        });
        $("#modal_registro_medida").modal('show'); //modal de registrar producto
        $("#titulo_modal_medida").html('Actualizar Medida');
        $("#btnregistrar_medida").html('Actualizar');

        if (tbl_medida.row(this).child.isShown()) {
            var data = tbl_medida.row(this).data();
        } else {
            var data = tbl_medida.row($(this).parents('tr'))
                .data(); //OBTENER EL ARRAY CON LOS DATOS DE CADA COLUMNA DEL DATATABLE
            // console.log(data);
        }

        $("#id_medida").val(data[0]);
        $("#text_descripcion").val(data[1]);
        $("#text_abreviatura").val(data[2]);

    })


    /* ======================================================================================
       EVENTO AL DAR CLICK EN EL BOTON ELIMINAR PRODUCTO
    =========================================================================================*/
    $("#tbl_medida tbody").on('click', '.btnEliminarmedida', function() {

        accion = 4; //seteamos la accion para editar

        if (tbl_medida.row(this).child.isShown()) {
            var data = tbl_medida.row(this).data();
        } else {
            var data = tbl_medida.row($(this).parents('tr'))
                .data(); //OBTENER EL ARRAY CON LOS DATOS DE CADA COLUMNA DEL DATATABLE
            //   console.log("🚀 ~ file: productos.php ~ line 751 ~ $ ~ data", data);
        }

        var id_medida = data[0];

        Swal.fire({
            title: 'Desea Eliminar la Medida "' + data[1] + '" ?',
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
                datos.append("id_medida",id_medida); //jalamos el codigo que declaramos mas arriba


                $.ajax({
                    url: "ajax/medida_ajax.php",
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
                                title: 'La medida se Elimino de forma correcta'
                                // title: titulo_msj
                            });

                            tbl_medida.ajax.reload(); //recargamos el datatable

                        } else {
                            Toast.fire({
                                icon: 'error',
                                title: 'La medida no se pudo Eliminar'
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
        $("#id_medida").val("");
        $("#text_descripcion").val("");
        $("#text_abreviatura").val("");

    })


    /*===================================================================*/
        //EVENTO QUE LIMPIA LOS MENSAJES DE ALERTA DE INGRESO DE DATOS DE CADA INPUT AL CANCELAR LA VENTANA MODAL
    /*===================================================================*/
    document.getElementById("btncerrar").addEventListener("click", function() {
              $(".needs-validation").removeClass("was-validated");
          })
          document.getElementById("btncerrarmodal").addEventListener("click", function() {
              $(".needs-validation").removeClass("was-validated");
        })


}) /////// FIN DOCUMENT READY


function AbrirModalRegistroMedida() {
    //para que no se nos salga del modal haciendo click a los costados
    $("#modal_registro_medida").modal({
        backdrop: 'static',
        keyboard: false
    });
    $("#modal_registro_medida").modal('show'); //abrimos el modal
    $("#titulo_modal_medida").html('Registrar Medida');
    $("#btnregistrar_medida").html('Registrar');
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