
    var accion;
    var tbl_lista_ventas, fecha_ini, fecha_fin, tbl_detalle_venta;

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
        $("#tbl_lista_ventas tbody").on('click', '.btnVerDetalle', function() {
            //tbl_report_cliente.destroy();
            //accion = 2; //seteamos la accion para Eliminar

            if (tbl_lista_ventas.row(this).child.isShown()) {
                var data = tbl_lista_ventas.row(this).data();
            } else {
                var data = tbl_lista_ventas.row($(this).parents('tr')).data(); //OBTENER EL ARRAY CON LOS DATOS DE CADA COLUMNA DEL DATATABLE
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
        $("#tbl_lista_ventas tbody").on('click', '.btnImprimir', function() {
            //tbl_report_cliente.destroy();
            //accion = 2; //seteamos la accion para Eliminar

            if (tbl_lista_ventas.row(this).child.isShown()) {
                var data = tbl_lista_ventas.row(this).data();
            } else {
                var data = tbl_lista_ventas.row($(this).parents('tr')).data(); //OBTENER EL ARRAY CON LOS DATOS DE CADA COLUMNA DEL DATATABLE
               //console.log(data);
            }

            window.open("MPDF/reporte_venta.php?codigo=" + data[4] + "#zoom=90", "Venta Electronica", "scrollbards=NO");


        })

        /* ======================================================================================*/
           // IMPRIMIR EN TICKET
        /* =========================================================================================*/
        $("#tbl_lista_ventas tbody").on('click', '.btnTicket', function() {
            //tbl_report_cliente.destroy();
            //accion = 2; //seteamos la accion para Eliminar

            if (tbl_lista_ventas.row(this).child.isShown()) {
                var data = tbl_lista_ventas.row(this).data();
            } else {
                var data = tbl_lista_ventas.row($(this).parents('tr')).data(); //OBTENER EL ARRAY CON LOS DATOS DE CADA COLUMNA DEL DATATABLE
               //console.log(data);
            }

            window.open("MPDF/reporte_venta_electronica.php?codigo=" + data[4] + "#zoom=90", "Venta Electronica", "scrollbards=NO");


        })


        /**************************************************************
         * PARA ELIMINAR LA BOLETA
         ***************************************************************/
        $('#tbl_lista_ventas tbody').on('click', '.btnAnular', function() {

            if (tbl_lista_ventas.row(this).child.isShown()) {
                var data = tbl_lista_ventas.row(this).data();
            } else {
                var data = tbl_lista_ventas.row($(this).parents('tr')).data(); //OBTENER EL ARRAY CON LOS DATOS DE CADA COLUMNA DEL DATATABLE
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
                            tbl_lista_ventas.ajax.reload();
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

        tbl_lista_ventas = $("#tbl_lista_ventas").DataTable({
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
                url: "ajax/ventas.ajax.php",
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

                }, 
                {
                    targets: 9,
                    //sortable: false,
                    createdCell: function(td, cellData, rowData, row, col) {

                        if (rowData[9] == 'REGISTRADA') {
                            $(td).html("<span class='badge badge-success'>REGISTRADA</span>")
                        } else if (rowData[9] == 'CREDITO') {
                            $(td).html("<span class='badge badge-info'>CREDITO</span>")
                        } else if (rowData[9] == 'PAGADA') {
                            $(td).html("<span class='badge badge-success'>PAGADA</span>")
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
                                "<span class='btnVerDetalle text-primary px-1'style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Ver Detalle'> " +
                                "<i class='fa fa-eye fs-6'> </i> " +
                                "</span>" +

                               "<span class='btnAnular  text-danger px-1' style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Anular Venta'> " +
                                "<i class='fas fa-ban'></i> " +
                                "</span> " +
                                "<span class='btnImprimir  text-info px-1' style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Imprimir  en formato A4'> " +
                                "<i class='fas fa-print' fs-6></i> " +
                                "</span> " +
                                "<span class='btnTicket  text-warning px-1' style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Imprimir en formato Ticket'> " +
                                "<i class='fa fa-file-pdf' fs-6></i> " +
                                "</span> " +

                                "</center>"
                        } else if (rowData[9] == 'CREDITO') {
                            return "<center>" +
                                "<span class='btnVerDetalle text-primary px-1'style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Ver Detalle'> " +
                                "<i class='fa fa-eye fs-6'> </i> " +
                                "</span>" +

                               "<span class='btnAnular  text-danger px-1' style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Anular Venta'> " +
                                "<i class='fas fa-ban'></i> " +
                                "</span> " +
                                "<span class='btnImprimir  text-info px-1' style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Imprimir  en formato A4'> " +
                                "<i class='fas fa-print' fs-6></i> " +
                                "</span> " +
                                "<span class='btnTicket  text-warning px-1' style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Imprimir en formato Ticket'> " +
                                "<i class='fa fa-file-pdf' fs-6></i> " +
                                "</span> " +

                                "</center>"
                        }else if (rowData[9] == 'ANULADA') {
                            return "<center>" +
                                "<span class='btnVerDetalle text-primary px-1'style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Ver Detalle'> " +
                                "<i class='fa fa-eye fs-6'> </i> " +
                                "</span>" +

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
                        } else if (rowData[9] == 'PAGADA') {
                            return "<center>" +
                                "<span class='btnVerDetalle text-primary px-1'style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Ver Detalle'> " +
                                "<i class='fa fa-eye fs-6'> </i> " +
                                "</span>" +

                               "<span class='btnAnular  text-danger px-1' style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Anular Venta'> " +
                                "<i class='fas fa-ban'></i> " +
                                "</span> " +
                                "<span class='btnImprimir  text-info px-1' style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Imprimir  en formato A4'> " +
                                "<i class='fas fa-print' fs-6></i> " +
                                "</span> " +
                                "<span class='btnTicket  text-warning px-1' style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Imprimir en formato Ticket'> " +
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
