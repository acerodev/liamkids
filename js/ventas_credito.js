

    var accion;
    var tbl_ventas_cre, tbl_impresion_p;

    var Toast = Swal.mixin({
        toast: true,
        position: 'top',
        showConfirmButton: false,
        timer: 3000
    });

    $(document).ready(function() {

        CargarEstadoCaja();
        CargarId_Caja();

        /***************************************************************************
         * INICIAR DATATABLE CATEGORIAS
         ******************************************************************************/
        var tbl_ventas_cre = $("#tbl_ventas_cre").DataTable({
            responsive: true,
            dom: 'Bfrtip',
            buttons: [{
                    "extend": 'excelHtml5',
                    "title": 'Reporte ventas credito',
                    "exportOptions": {
                        'columns': [1, 2, 3, 4, 5]
                    },
                    "text": '<i class="fa fa-file-excel"></i>',
                    "titleAttr": 'Exportar a Excel'
                },
                {
                    "extend": 'print',
                    "text": '<i class="fa fa-print"></i> ',
                    "titleAttr": 'Imprimir',
                    "exportOptions": {
                        'columns': [1, 2, 3, 4, 5]
                    },
                    "download": 'open'
                },
                'pageLength',
            ],
            ajax: {
                url: "ajax/ventas.ajax.php",
                dataSrc: "",
                type: "POST",
                data: {
                    'accion': 6
                },
            },
            columnDefs: [
                // {
                //     targets: 0,
                //     visible: true

                // },
                {
                    targets: 6,
                    //sortable: false,
                    createdCell: function(td, cellData, rowData, row, col) {

                        if (rowData[6] == 'CREDITO') {
                            $(td).html("<span class='badge badge-info'>CREDITO</span>")
                        } else if (rowData[6] == 'PAGADA') {
                            $(td).html("<span class='badge badge-success'>PAGADA</span>")
                        } else {
                            $(td).html("<span class='badge badge-danger'>ANULADA</span>")

                        }
                    }
                },
                {
                    targets: 7, //columna 2
                    sortable: false, //no ordene
                    render: function(td, cellData, rowData, row, col) {

                        if (rowData[6] == 'CREDITO') {
                            return "<center>" +
                                "<span class='btnPagarCuota text-primary px-1' style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Pagar Monto de venta'> " +
                                "<i class='fas fa-hand-holding-usd fs-6'></i> " +
                                "</span> " +
                                "<span class='btnimprimirRecibo text-danger px-1'style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Imprimir recibos de venta'> " +
                                "<i class='fas fa-print fs-6'> </i> " +
                                "</span>" +
                                "<span class='btnimprimirticket text-info px-1'style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Imprimir tickets'> " +
                                "<i class='fas fa-file fs-6'> </i> " +
                                "</span>" +
                                "</center>"
                        }
                        if (rowData[6] == 'PAGADA') {
                            return "<center>" +

                                "<span class='btnimprimirRecibo text-danger px-1'style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Imprimir recibos de venta'> " +
                                "<i class='fas fa-print fs-6'> </i> " +
                                "</span>" +
                                "<span class='btnimprimirticket text-info px-1'style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Imprimir tickets'> " +
                                "<i class='fas fa-file fs-6'> </i> " +
                                "</span>" +
                                "</center>"
                        } else {

                        }


                    }
                }
            ],

            lengthMenu: [0, 5, 10, 15, 20, 50],
            "pageLength": 10,
            "language": idioma_espanol,
            select: true
        });


        /* ======================================================================================
              EVENTO AL DAR CLICK EN EL BOTON EDITAR CATEGORIA
             =========================================================================================*/
        $("#tbl_ventas_cre tbody").on('click', '.btnPagarCuota', function() {

            accion = 7; //seteamos la accion para editar

            $("#modal_registrar_pago").modal({
                backdrop: 'static',
                keyboard: false
            });
            $("#modal_registrar_pago").modal('show'); //modal de registrar producto

            if (tbl_ventas_cre.row(this).child.isShown()) {
                var data = tbl_ventas_cre.row(this).data();
            } else {
                var data = tbl_ventas_cre.row($(this).parents('tr')).data(); //OBTENER EL ARRAY CON LOS DATOS DE CADA COLUMNA DEL DATATABLE
                // console.log(data);
            }

            $("#text_comprobante").val(data.nro_boleta);
            $("#text_mont_total").val(data.total_venta);
            $("#text_mont_abonado").val(data.abonado);
            $("#text_cliente").val(data.cliente_nombres);

            $("#text_mont_restante").val(data.restante);

        })



        /*===================================================================*/
        //EVENTO QUE GUARDA LOS DATOS DEL PRODUCTO, PREVIA VALIDACION DEL INGRESO DE LOS DATOS OBLIGATORIOS
        /*===================================================================*/
        $("#btnregistrar_pago").on('click', function() {
            var compro_r = $("#text_comprobante").val();
            var abonar_r = $("#text_mont_abonar").val();
            var restante_r = $("#text_mont_restante").val();
            var caja_r = $("#id_caja").val();
           // console.log(caja_r);

            if (abonar_r == "") {
                Toast.fire({
                    icon: 'error',
                    title: 'INGRESE UN MONTO ABONAR',

                });
                $("#text_mont_abonar").focus();

            }
            if (abonar_r <= 0) {
                Toast.fire({
                    icon: 'error',
                    title: 'INGRESE UN MONTO MAYOR A 0',

                });
                $("#text_mont_abonar").focus();
                $("#text_mont_abonar").val("");

            } else if (parseFloat(abonar_r) > parseFloat(restante_r)) {
                Toast.fire({
                    icon: 'error',
                    title: 'EL MONTO ABONAR DEBE SER MENOR AL RESTANTE',

                });
                $("#text_mont_abonar").focus();

            } else {

                Swal.fire({
                    title: 'Está seguro de registrar el abono?',
                    icon: 'warning',
                    showCancelButton: true,

                    confirmButtonText: 'Si, abonar',
                    cancelButtonText: 'Cancelar',
                }).then((result) => {

                    if (result.isConfirmed) {

                        var datos = new FormData();

                        datos.append("accion", accion);
                        datos.append("nro_boleta", compro_r);
                        datos.append("monto", abonar_r);
                        datos.append("caja_id", caja_r);



                        $.ajax({
                            url: "ajax/ventas.ajax.php",
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
                                        title: 'El abono se registro de forma correcta'

                                    });

                                    tbl_ventas_cre.ajax.reload(); //recargamos el datatable
                                    $("#modal_registrar_pago").modal('hide');
                                    $("#text_comprobante").val("");
                                    $("#text_mont_abonar").val("");



                                } else {
                                    Toast.fire({
                                        icon: 'error',
                                        title: 'No se pudo registrar el abono'
                                    });
                                }

                            }
                        });

                    }
                })
            }

        });


        /* ======================================================================================*/
        // IMPRIMIR EN PDF
        /* =========================================================================================*/
        $("#tbl_ventas_cre tbody").on('click', '.btnimprimirRecibo', function() {
            //tbl_report_cliente.destroy();
            //accion = 2; //seteamos la accion para Eliminar

            if (tbl_ventas_cre.row(this).child.isShown()) {
                var data = tbl_ventas_cre.row(this).data();
            } else {
                var data = tbl_ventas_cre.row($(this).parents('tr')).data(); //OBTENER EL ARRAY CON LOS DATOS DE CADA COLUMNA DEL DATATABLE
                console.log(data);
            }

            window.open("MPDF/reporte_venta_credito.php?codigo=" + data.nro_boleta + "#zoom=90", "Venta a credito", "scrollbards=NO");


        })

        /* ======================================================================================
              EVENTO AL DAR CLICK EN EL BOTON EDITAR CATEGORIA
             =========================================================================================*/
        $("#tbl_ventas_cre tbody").on('click', '.btnimprimirticket', function() {

            

            $("#modal_impresion_pago").modal({
                backdrop: 'static',
                keyboard: false
            });
            $("#modal_impresion_pago").modal('show'); //modal de registrar producto

            if (tbl_ventas_cre.row(this).child.isShown()) {
                var data = tbl_ventas_cre.row(this).data();
            } else {
                var data = tbl_ventas_cre.row($(this).parents('tr')).data(); //OBTENER EL ARRAY CON LOS DATOS DE CADA COLUMNA DEL DATATABLE
                // console.log(data);
            }

            $("#text_comprobante_impre").val(data.nro_boleta);

            Traer_Detalle(data.nro_boleta)
            

        })

        /********************************************************************
          		IMPRIMIR REPORTE MOVIMIENTOS
    ********************************************************************/
    $('#tbl_impresion_p').on('click', '.btnimprimir_tick_cuota', function() { //class foto tiene que ir en el boton
              var data = tbl_impresion_p.row($(this).parents('tr')).data(); //tama単o de escritorio
              if (tbl_impresion_p.row(this).child.isShown()) {
                  var data = tbl_impresion_p.row(this).data(); //para celular y usas el responsive datatable
               
              }
             // console.log(data);

              window.open("MPDF/impresion_recibo_venta_credito.php?codigo=" + parseInt(data[0]) + "#zoom=100", "Impresion de ticket - cuota", "scrollbards=NO");
          });




    }) /////// FIN DOCUMENT READY


    /*===================================================================*/
    //FUNCION PARA TRAER EL DETALLE PARA PAGAR UNA CUOTA
    /*===================================================================*/
    function Traer_Detalle(nrocompro) {
        tbl_impresion_p = $("#tbl_impresion_p").DataTable({
            responsive: true,
            destroy: true,
            //retrieve: true,
            //searching: false,
            paging: false,
            async: false,
            processing: true,
            dom: 'tp',
            ajax: {
                url: "ajax/ventas.ajax.php",
                dataSrc: "",
                type: "POST",
                data: {
                    'accion': 8,
                    'nro_boleta': nrocompro
                }, //LISTAR 
            },
            columnDefs: [
                {
                targets: 4, //columna 2
                sortable: false, //no ordene
                render: function(data, type, full, meta) {
                    return "<center>" +
                        "<span class='btnimprimir_tick_cuota text-primary px-1' style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title=''> " +
                        "<i class='fas fa-print fs-6'></i> " +
                        "</span> " +
                        
                        "</center>"
                }
            }

            ],

            "language": idioma_espanol,
            select: true
        });
    }

    /*===================================================================*/
    //FUNCION PARA CARGAR TRAER EL ID CAJA
    /*===================================================================*/
    function CargarId_Caja() {
        $.ajax({
            async: false,
            url: "ajax/caja_ajax.php",
            method: "POST",
            data: {
                'accion': 6
            },
            dataType: 'json',
            success: function(respuesta) {

                caja_id = respuesta["caja_id"];


                $("#id_caja").val(caja_id);
            }
        });
    }


    /*===================================================================*/
    //SI ESTA APERTURADA O NO UNA CAJA
    /*===================================================================*/
    function CargarEstadoCaja() {

        $.ajax({
            async: false,
            url: "ajax/caja_ajax.php",
            method: "POST",
            data: {
                'accion': 5
            },
            dataType: 'json',
            success: function(respuesta) {
                //console.log(respuesta);

                caja_estado = respuesta["caja_estado"];
                //console.log(caja_estado);
                // $("#text_correo").val(email);

                if (caja_estado == 'VIGENTE') {

                } else {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Mensaje de Error',
                        text: 'Debe aperturar una caja, se redireccionara a la ventana',
                        showConfirmButton: false,
                       timer: 3000
                    })

                  
                    CargarContenido('vistas/caja.php', 'content-wrapper');
                }
            }
        });
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
