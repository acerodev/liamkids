<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <!-- <div class="row mb-2">
            <div class="col-sm-6">
                <h4 class="m-0">Aprobar Solicitud de Prestamos</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                    <li class="breadcrumb-item active">Aprobacion Prestamos</li>
                </ol>
            </div>
        </div> -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content pb-2">
    <div class="container-fluid">
        <div class="row p-0 m-0">
            <div class="col-md-12">
                <div class="card card-info card-outline shadow ">
                    <div class="card-header">
                        <h3 class="card-title">Listado de Cotizaciones</h3>

                    </div>
                    <div class=" card-body">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">
                                        <span class="small">Fecha Inicio:</span>
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i class="far fa-calendar-alt"></i></span></div>
                                        <input type="date" class="form-control form-control-sm" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" id="text_fecha_I">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">
                                        <span class="small">Fecha Fin:</span>
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i class="far fa-calendar-alt"></i></span></div>
                                        <input type="date" class="form-control form-control-sm" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" id="text_fecha_F">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8 d-flex flex-row align-items-center justify-content-end">
                                <div class="form-group m-0"><a class="btn btn-primary btn-sm" style="width:120px;" id="btnFiltrar">Buscar</a></div>
                            </div>
                        </div><br>

                        <div class="table-responsive">
                            <table id="tbl_lista_coti" class="table display table-hover text-nowrap compact  w-100  rounded">
                                <thead class="bg-info text-left">
                                    <tr>
                                      
                                        <th>cliente id</th>
                                        <th>Cliente</th>
                                        <th>id compr</th>
                                        <th>Comprobante</th>
                                        <th>Correlativo</th>
                                        <th>Monto</th>
                                        <th>Fecha</th>
                                        <th>id Usu</th>
                                        <th>Usuario</th>
                                        <th>Estado</th>
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

<!-- MODAL DETALLE VENTA-->
<div class="modal fade" id="modal_detalle_coti" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-gray py-1 align-items-center">
                <h5 class="modal-title" id="titulo_modal_cliente">Detalle de la Venta</h5>
                <button type="button" class="close  text-white border-0 fs-5" id="btncerrarmodal_detalle" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- <form class="needs-validation" novalidate> -->
                <div class="row">

                    <div class="col-lg-8">
                        <div class="form-group mb-2">
                            <label for="" class="">
                                <input type="text" id="id_venta" hidden>
                                <span class="small"> Cliente</span>
                            </label>
                            <input type="text" class=" form-control form-control-sm" id="text_cliente_d" placeholder="Documento" disabled>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-2">
                            <label for="" class="">
                                <span class="small"> Fecha</span>
                            </label>
                            <input type="text" class=" form-control form-control-sm" id="text_fecha" placeholder="Documento" disabled>


                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group mb-2">
                            <label for="" class="">
                                <span class="small"> Tipo</span>
                            </label>
                            <input type="text" class=" form-control form-control-sm" id="text_tipo_c" placeholder="Descripcion" disabled>


                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-2">
                            <label for="" class="">
                                <span class="small">Correlativo</span>
                            </label>
                            <input type="text" class=" form-control form-control-sm" id="text_corre" placeholder="Descripcion" disabled>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-2">
                            <label for="" class="">
                                <span class="small"> Forma de Pago</span>
                            </label>
                            <input type="text" class=" form-control form-control-sm" id="text_fpago_d" placeholder="Descripcion" disabled>

                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group mb-2">
                            <label for="" class="">
                                <span class="small">Descipcion</span>
                            </label>
                            <input type="text" class=" form-control form-control-sm" id="text_descri" placeholder="Descripcion" disabled>


                        </div>
                    </div>


                </div>
                <br>
                <div class="row">
                    <div class="table-responsive">
                        <table id="tbl_detalle_venta" class="table display table-hover text-nowrap compact  w-100  rounded" style="width:100%;">
                            <thead class="bg-info text-left">
                                <tr>
                                   
                                    <th>NRO BO</th>
                                    <th>COD P</th>
                                    <th>Descripcion</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Sub. Total</th>
                                    <!-- <th class="text-cetner">Opciones</th> -->
                                </tr>
                            </thead>
                            <tbody class="small text left">
                            </tbody>
                        </table>
                        
                    </div>
                </div>
                    
                 <div class="row">
                    <div> <br>

                      <div class="form-group row">
                            <label for="" class="col form-label"><span class="small" style="float: right;">SUBTOTAL</span></label>
                            <div class="col-sm-3">
                            <input type="text" class="form-control form-control-sm" id="lbl_subtotal_e" placeholder="subtotal" disabled>
                            </div>
                      </div>

                      <div class="form-group row">
                            <label for="" class="col form-label"><span class="small" style="float: right;">IGV</span></label>
                            <div class="col-sm-3">
                            <input type="text" class="form-control form-control-sm" id="lbl_igv" placeholder="igv" disabled>
                            </div>
                      </div>

                      <div class="form-group row">
                            <label for="" class="col form-label"><span class="small" style="float: right;">TOTAL</span></label>
                            <div class="col-sm-3">
                            <input type="text" class="form-control form-control-sm" id="lbl_total" placeholder="total" disabled>
                            </div>
                      </div>
         
                                                 
                        </div><br>
                   
                   
                    


                </div>
                <!-- </form> -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal" id="btncerrar_detallee">Cerrar</button>
                <!-- <button type="button" class="btn btn-primary btn-sm" id="btnregistrar_cliente">Registrar</button> -->
            </div>
        </div>
    </div>
</div>
<!-- fin Modal -->


<script>
    var accion;
    var tbl_lista_coti, fecha_ini, fecha_fin, tbl_detalle_venta;

    var Toast = Swal.mixin({
        toast: true,
        position: 'top',
        showConfirmButton: false,
        timer: 3000
    });

    $(document).ready(function() {
        fechas();
        filtroporFechas();

        $("#btnFiltrar").on('click', function() {
            filtroporFechas();
            validar();

        })


        /* ======================================================================================*/
           // VER DETALLE DE PAGOS  -
        /* =========================================================================================*/
        $("#tbl_lista_coti tbody").on('click', '.btnVerDetalle', function() {
            //tbl_report_cliente.destroy();
            //accion = 2; //seteamos la accion para Eliminar

            if (tbl_lista_coti.row(this).child.isShown()) {
                var data = tbl_lista_coti.row(this).data();
            } else {
                var data = tbl_lista_coti.row($(this).parents('tr')).data(); //OBTENER EL ARRAY CON LOS DATOS DE CADA COLUMNA DEL DATATABLE
               // console.log(data);
            }

            $("#modal_detalle_venta").modal({
                backdrop: 'static',
                keyboard: false
            });
            $("#modal_detalle_venta").modal('show'); //abrimos el modal*/

            //$("#id_venta").val(data[0]);
            $("#text_cliente_d").val(data[1]);
            $("#text_fecha").val(data[6]);
            $("#text_tipo_c").val(data[3]);
            $("#text_corre").val(data[4]);
            $("#text_fpago_d").val(data[11]);

            $("#lbl_total").val(data[5]);
            $("#lbl_subtotal_e").val(data[12]);
            $("#lbl_igv").val(data[13]);
            //$("#text_descri").val(data[10]);



            Traer_Detalle(data[4]);


        })

         /* ======================================================================================*/
           // IMPRIMIR EN PDF
        /* =========================================================================================*/
        $("#tbl_lista_coti tbody").on('click', '.btnImprimir', function() {
            //tbl_report_cliente.destroy();
            //accion = 2; //seteamos la accion para Eliminar

            if (tbl_lista_coti.row(this).child.isShown()) {
                var data = tbl_lista_coti.row(this).data();
            } else {
                var data = tbl_lista_coti.row($(this).parents('tr')).data(); //OBTENER EL ARRAY CON LOS DATOS DE CADA COLUMNA DEL DATATABLE
               //console.log(data);
            }

            window.open("MPDF/reporte_cotizacion.php?codigo=" + data[4] + "#zoom=90", "Cotizacion", "scrollbards=NO");


        })

    

        /**************************************************************
         * PARA ELIMINAR LA BOLETA
         ***************************************************************/
        $('#tbl_lista_coti tbody').on('click', '.btnAnular', function() {

            if (tbl_lista_coti.row(this).child.isShown()) {
                var data = tbl_lista_coti.row(this).data();
            } else {
                var data = tbl_lista_coti.row($(this).parents('tr')).data(); //OBTENER EL ARRAY CON LOS DATOS DE CADA COLUMNA DEL DATATABLE
               // console.log(data);
            }

            var nroBoleta = data[4]; //CAPTURAMOS EL NRO BOLETA DEL DATATABLE
            //console.log(nroBoleta);

            Swal.fire({
                title: 'Anular comprobante "' + nroBoleta + '"?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Anular',
                cancelButtonText: 'Cancelar',
            }).then((result) => {

                if (result.isConfirmed) {
                    $.ajax({
                        url: "ajax/ventas.ajax.php",
                        type: "POST",
                        data: {
                            accion: '3',
                            Boleta: nroBoleta
                        },
                        dataType: 'json',
                        success: function(respuesta) {
                            //console.log(respuesta);

                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: respuesta[0],
                                showConfirmButton: false,
                                timer: 1500
                            })
                            tbl_lista_coti.ajax.reload();
                        }
                    });
                }
            })
        });



    }) // FIN DOCUMENT READY



    /****************************************** */
    //LISTAS LAS VENTAS POR RANGO DE FECHA
    /****************************************** */
    function filtroporFechas() {
        fecha_ini = $("#text_fecha_I").val(); //capturamos el valor
        fecha_fin = $("#text_fecha_F").val();

        tbl_lista_coti = $("#tbl_lista_coti").DataTable({
            responsive: true,
            destroy: true,
            //paging: false,
            async: false,
            processing: true,

            dom: 'Blfrtip',
            buttons: [{
                    "extend": 'excelHtml5',
                    "title": 'Reporte listado de ventas por rango',
                    "exportOptions": {
                        'columns': [1, 3, 4, 5, 6, 8, 9]
                    },
                    "text": '<i class="fa fa-file-excel"></i>',
                    "titleAttr": 'Exportar a Excel'
                },
                {
                    "extend": 'print',
                    "text": '<i class="fa fa-print"></i> ',
                    "titleAttr": 'Imprimir',
                    "exportOptions": {
                        'columns': [1, 3, 4, 5, 6, 8, 9]
                    },
                    "download": 'open'
                },
               
            ],
            ajax: {
                url: "ajax/cotizacion_ajax.php",
                dataSrc: "",
                type: "POST",
                data: {
                    'accion': 4,
                    'fecha_ini': fecha_ini,
                    'fecha_fin': fecha_fin
                }, //LISTAR 
            },
            columnDefs: [{
                    targets: 0,
                    visible: false

                }, {
                    targets: 2,
                    visible: false

                }, 
                {
                    targets: 7,
                    visible: false

                }, {
                    targets: 9,
                    //sortable: false,
                    createdCell: function(td, cellData, rowData, row, col) {

                        if (rowData[9] == 'REGISTRADA') {
                            $(td).html("<span class='badge badge-success'>REGISTRADA</span>")
                        } else {
                            $(td).html("<span class='badge badge-danger'>ANULADA</span>")

                        }
                    }
                }, {
                    targets: 10,
                    sortable: false, //no ordene
                    render: function(td, cellData, rowData, row, col) {

                        if (rowData[9] == 'REGISTRADA') {
                            return "<center>" +
                                // "<span class='btnVerDetalle text-primary px-1'style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Ver Detalle'> " +
                                // "<i class='fa fa-eye fs-6'> </i> " +
                                // "</span>" +

                            //    "<span class='btnAnular  text-danger px-1' style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Anular Venta'> " +
                            //     "<i class='fas fa-ban'></i> " +
                            //     "</span> " +
                                "<span class='btnImprimir  text-info px-1' style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Imprimir  en formato A4'> " +
                                "<i class='fas fa-print' fs-6></i> " +
                                "</span> " +
                                // "<span class='btnTicket  text-warning px-1' style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Imprimir en formato Ticket'> " +
                                // "<i class='fa fa-file-pdf' fs-6></i> " +
                                // "</span> " +

                                "</center>"
                        } else if (rowData[9] == 'ANULADA') {
                            return "<center>" +
                                // "<span class='btnVerDetalle text-primary px-1'style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Ver Detalle'> " +
                                // "<i class='fa fa-eye fs-6'> </i> " +
                                // "</span>" +

                                "<span class='  text-secondary px-1'  data-bs-toggle='tooltip' data-bs-placement='top' > " +
                                "<i class='fa fa-ban' fs-6></i> " +
                                "</span> " +
                                "<span class='btnImprimir  text-info px-1' style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Imprimir'> " +
                                "<i class='fas fa-print' fs-6></i> " +
                                "</span> " +
                                "<span class='btnTicket  text-warning px-1' style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Imprimir'> " +
                                "<i class='fa fa-file-pdf' fs-6></i> " +
                                "</span> " +

                                "</center>"
                        }

                    }

                }
            ],

            lengthMenu: [5, 10, 15, 20, 50],
             pageLength: 10,
            "language": idioma_espanol,
            select: true
        });


    }



    /****************************************** */
    //TRAER EL DETALLE DE LA VENTA
    /****************************************** */
    function Traer_Detalle(nro_boleta) {
        tbl_detalle_venta = $("#tbl_detalle_venta").DataTable({
            responsive: true,
            destroy: true,
            searching: false,
            dom: 't',
            ajax: {
                url: "ajax/ventas.ajax.php",
                dataSrc: "",
                type: "POST",
                data: {
                    'accion': 5,
                    'nro_boleta': nro_boleta
                }, //LISTAR 
            },
            columnDefs: [ 
                {
                    targets: 0,
                    visible: false

                }, {
                    targets: 1,
                    visible: false

                }
                
                
            ],

            "language": idioma_espanol,
            select: true
        });
    }


    /****************************************** */
    //CARGAR FECHAS AL INICIAR LA PAGINA
    /****************************************** */
    function fechas() {
        var f = new Date();
        var anio = f.getFullYear();
        var mes = f.getMonth() + 1;
        var d = f.getDate();
        let primerDia = new Date(f.getFullYear(), f.getMonth() + 1, 0).getDate();
        if (d < 10) {
            d = '0' + d;
        }
        if (mes < 10) {
            mes = '0' + mes;
        }

        document.getElementById('text_fecha_I').value = anio + "-" + mes + "-" + d;
        document.getElementById('text_fecha_F').value = anio + "-" + mes + "-" + d;
    }


    /****************************************** */
    //VALIDAR QUE COLOQUEN FECHAS CORRECTAS
    /****************************************** */
    function validar() {
        let fecha_ini = document.getElementById('text_fecha_I').value;
        let fecha_fin = document.getElementById('text_fecha_F').value;
        if (fecha_ini.length == 0) {

            Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'Debe colocar una fecha de inicio',
                showConfirmButton: true,
                timer: 1500
            })
            //$("#fecha_ini").focus();
            return false;
        }
        if (fecha_fin.length == 0) {
            Toast.fire({
                icon: 'error',
                title: ' Debe una fecha fin'
            })
            //$("#fecha_fin").focus();
            return false;
        }

        if (fecha_ini > fecha_fin) {
            Toast.fire({
                icon: 'error',
                title: 'Fecha inicio es mayor que la de fin'
            })
            //$("#fecha_ini").focus();
            return false;
        }
    }


    var idioma_espanol = {
        select: {
            rows: "%d fila seleccionada"
        },
        "sProcessing": "Procesando...",
        "sLengthMenu": " _MENU_ ",
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