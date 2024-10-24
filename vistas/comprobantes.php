<div class="content-header">
    <div class="container-fluid">
        <div class="row">

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
                        <h3 class="card-title">Lista de Comprobantes</h3>
                        <button class="btn btn-info btn-sm float-right" id="abrirmodal"><i class="fas fa-plus"></i>
                            Nuevo</button>
                    </div>
                    <div class=" card-body">

                        <div class="col-12 table-responsive">
                            <table id="tbl_compro" class="table display table-hover text-nowrap compact  w-100  rounded">
                                <thead class="bg-info text-left">
                                    <tr>
                                        <th>Id caja</th>
                                        <th>Tipo</th>
                                        <th>Serie</th>
                                        <th>Correlativo</th>
                                        <th>Estado</th>

                                        <th class="text-cetner">Opciones</th>
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
<div class="modal fade" id="modal_registro_compro" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header bg-gray py-1 align-items-center">
                <h5 class="modal-title" id="titulo_modal_compro">Registro de Comprobantes</h5>
                <button type="button" class="close  text-white border-0 fs-5" id="btncerrarmodal" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group mb-2">
                                <label for="" class="">
                                    <input type="text" id="id_compro" hidden>
                                    <span class="small">Tipo</span><span class="text-danger">*</span>
                                </label>
                                <input type="text" class=" form-control form-control-sm" id="text_tipo" name="" placeholder="Boleta" required>
                                <div class="invalid-feedback">Debe ingresar un Tipo Comprobante</div>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-2">
                                <label for="" class="">

                                    <span class="small"> Serie</span><span class="text-danger">*</span>
                                </label>
                                <input type="text" class=" form-control form-control-sm" id="text_serie" name="" placeholder="B001" required>
                                <div class="invalid-feedback">Debe ingresar una Serie</div>

                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group mb-2">
                                <label for="" class="">

                                    <span class="small"> Numero</span><span class="text-danger">*</span>
                                </label>
                                <input type="number" class=" form-control form-control-sm" id="text_numero" name="" placeholder="00000000" required>
                                <div class="invalid-feedback">Debe ingresar un Correlativo</div>

                            </div>
                        </div>

                        <div class="col-md-12" id="ocultar_estado">
                            <div class="form-group mb-2">
                                <label for="" class="">

                                    <span class="small"> Estado</span><span class="text-danger">*</span>
                                </label>
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="selEstado" name="selEstado">
                                    <option value="">Seleccione</option>
                                    <option value="ACTIVO">ACTIVO</option>
                                    <option value="INACTIVO">INACTIVO</option>
                                </select>
                                <div class="invalid-feedback">Debe ingresar un Estado</div>

                            </div>
                        </div>


                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal" id="btncerrar">Cerrar</button>
                <a class="btn btn-info btn-sm" id="btnregistrar_compro">Registrar</a>
            </div>
        </div>
    </div>
</div>
<!-- fin Modal -->

<script>
    var accion;
    var tbl_compro;

    var Toast = Swal.mixin({
        toast: true,
        position: 'top',
        showConfirmButton: false,
        timer: 4000
    });
    $(document).ready(function() {


        /*===================================================================*/
        // INICIAMOS EL DATATABLE
        /*===================================================================*/
        tbl_compro = $("#tbl_compro").DataTable({
            responsive: true,

            dom: 'Blfrtip',
            select: true,
            buttons: [{
                    "extend": 'excelHtml5',
                    "title": 'Comprobantes',
                    "exportOptions": {
                        'columns': [1, 2, 3]
                    },
                    "text": '<i class="fa fa-file-excel"></i>',
                    "titleAttr": 'Exportar a Excel'
                },
                {
                    "extend": 'print',
                    "text": '<i class="fa fa-print"></i> ',
                    "titleAttr": 'Imprimir',
                    "exportOptions": {
                        'columns': [1, 2, 3]
                    },
                    "download": 'open'
                },


            ],
            ajax: {
                url: "ajax/comprobantes_ajax.php",
                dataSrc: "",
                type: "POST",
                data: {
                    'accion': 1

                }, //LISTAR 
            },
            columnDefs: [{
                    targets: 0,
                    visible: false

                },
                {
                    targets: 4,
                    //sortable: false,
                    createdCell: function(td, cellData, rowData, row, col) {

                        if (rowData[4] == 'ACTIVO') {
                            $(td).html("<span class='badge badge-success'>ACTIVO</span>")
                        } else {
                            $(td).html("<span class='badge badge-danger'>INACTIVO</span>")
                        }

                    }
                }, {
                    targets: 5, //columna 2
                    sortable: false, //no ordene
                    render: function(td, cellData, rowData, row, col) {
                        return "<center>" +
                            "<span class='btnEditarcompro text-primary px-1' style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Editar Comprobante'> " +
                            "<i class='fas fa-pencil-alt fs-6'></i> " +
                            "</span> " +
                            "<span class='btnEliminarcompro text-danger px-1'style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Eliminar Comprobante'> " +
                            "<i class='fas fa-trash fs-6'> </i> " +
                            "</span>" +
                            "</center>"
                    }
                }

            ],
            "order": [
                [0, 'asc']
            ],
            lengthMenu: [5, 10, 15, 20, 50],
            pageLength: 10,
            "language": idioma_espanol

        });

        /*===================================================================*/
        //EVENTO PARA ABRIR EL MODAL DE REGISTRAR
        /*===================================================================*/
        $("#abrirmodal").on('click', function() {
            AbrirModalRegistroCompro();
        })

        /*===================================================================*/
        //EVENTO QUE GUARDA LOS DATOS DEL COMPROBANTE, PREVIA VALIDACION DEL INGRESO DE LOS DATOS OBLIGATORIOS
        /*===================================================================*/
        document.getElementById("btnregistrar_compro").addEventListener("click", function() {

            var forms = document.getElementsByClassName('needs-validation');
            var validation = Array.prototype.filter.call(forms, function(form) {

                //si se ingresan todos los datos 
                if (form.checkValidity() === true) {

                    // console.log("Listo para registrar el producto")
                    Swal.fire({
                        title: 'Está seguro de ' + titulo_modal + ' el Comprobante?',
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
                            datos.append("compro_id", $("#id_compro").val()); //id
                            datos.append("compro_tipo", $("#text_tipo").val());
                            datos.append("compro_serie", $("#text_serie").val());
                            datos.append("compro_numero", $("#text_numero").val());
                            datos.append("compro_estado", $("#selEstado").val());

                            if (accion == 2) {
                                var titulo_msj = "El Comprobante se registro correctamente"
                            }

                            if (accion == 3) {
                                var titulo_msj = "El Comprobante se actualizo correctamente"
                            }

                            $.ajax({
                                url: "ajax/comprobantes_ajax.php",
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

                                        tbl_compro.ajax.reload(); //recargamos el datatable
                                        $("#modal_registro_compro").modal('hide');
                                        $("#id_compro").val("");
                                        $("#text_tipo").val("");
                                        $("#text_serie").val("");
                                        $("#text_numero").val("");

                                        $(".needs-validation").removeClass("was-validated");

                                    } else {
                                        Toast.fire({
                                            icon: 'error',
                                            title: 'El Comprobante no se pudo registrar'
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
        $("#tbl_compro tbody").on('click', '.btnEditarcompro', function() {

            accion = 3; //seteamos la accion para editar
            titulo_modal = "Actualizar";
            $("#modal_registro_compro").modal({
                backdrop: 'static',
                keyboard: false
            });
            $("#modal_registro_compro").modal('show'); //modal de registrar producto
            $("#titulo_modal_compro").html('Actualizar Comprobante');
            $("#btnregistrar_compro").html('Actualizar');
            $("#ocultar_estado").prop('hidden', false);

            if (tbl_compro.row(this).child.isShown()) {
                var data = tbl_compro.row(this).data();
            } else {
                var data = tbl_compro.row($(this).parents('tr')).data(); //OBTENER EL ARRAY CON LOS DATOS DE CADA COLUMNA DEL DATATABLE
                // console.log(data);
            }

            $("#id_compro").val(data[0]);
            $("#text_tipo").val(data[1]);
            $("#text_serie").val(data[2]);
            $("#text_numero").val(data[3]);
            $("#selEstado").val(data[4]);

        })

        /* ======================================================================================
            EVENTO AL DAR CLICK EN EL BOTON ELIMINAR PRODUCTO
         =========================================================================================*/
        $("#tbl_compro tbody").on('click', '.btnEliminarcompro', function() {

            accion = 4; //seteamos la accion para eliminar

            if (tbl_compro.row(this).child.isShown()) {
                var data = tbl_compro.row(this).data();
            } else {
                var data = tbl_compro.row($(this).parents('tr')).data(); //OBTENER EL ARRAY CON LOS DATOS DE CADA COLUMNA DEL DATATABLE
                 // console.log("🚀 ~ file:  data", data);
            }

            var id_com = data[0];
            //console.log(id_com);

            Swal.fire({
                title: 'Desea Eliminar el comprobante "' + data[1] + '" ?',
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
                    datos.append("compro_id", id_com); //jalamos el codigo que declaramos mas arriba


                    $.ajax({
                       // url: "ajax/comprobantes_ajax.php",
                        method: "POST",
                        data: datos, //enviamos lo de la variable datos
                        cache: false,
                        contentType: false,
                        processData: false,
                        dataType: 'json',
                        success: function(respuesta) {
                            //console.log(respuesta);

                            if (respuesta == "ok") {

                                Toast.fire({
                                    icon: 'success',
                                    title: 'El Comprobante se Elimino de forma correcta'
                                    // title: titulo_msj
                                });

                                tbl_compro.ajax.reload(); //recargamos el datatable

                            } else {
                                Toast.fire({
                                    icon: 'error',
                                    title: 'El Comprobante  no se pudo Eliminar - con movimientos'
                                   
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
            $("#id_compro").val("");
            $("#text_tipo").val("");
            $("#text_serie").val("");
            $("#text_numero").val("");

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






    }) // FIN DOCUMENT READY

    function AbrirModalRegistroCompro() {
        //para que no se nos salga del modal haciendo click a los costados
        $("#modal_registro_compro").modal({
            backdrop: 'static',
            keyboard: false
        });
        $("#modal_registro_compro").modal('show'); //abrimos el modal
        $("#titulo_modal_compro").html('Registrar Comprobante');
        $("#btnregistrar_compro").html('Registrar');
        $("#ocultar_estado").prop('hidden', true);
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