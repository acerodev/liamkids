

    var table, tbl_tallas;
    var items = []; // SE USA PARA EL INPUT DE AUTOCOMPLETE
    var itemProducto = 1;

    var Toast = Swal.mixin({
        toast: true,
        position: 'top',
        showConfirmButton: false,
        timer: 4000
    });

    $(document).ready(function() {
        $('.js-example-basic-single').select2();
        cargartableprod();
        TraerListadodeProductosAutocomplete();

        cargarSelectCLiente();
        cargarSelectComprobantes();
        CargarEstadoCaja();
        CargarId_Caja();
        CargarIgv();

       var traerigv =  $("#text_igv").val();
       var traermoneda =  $("#text_moneda_emp").val(); 
       //console.log(traerigv, traermoneda);


        /* ======================================================================================
        TRAER EL NRO DE BOLETA
        ======================================================================================*/

       // CargarNroBoleta();

        //OCULTAR LO BOTONES DE BUSQUEDAD
        $("#buscarDni").attr('hidden', true);
        $("#buscarRuc").attr('hidden', true);
        $("#operacion").attr('hidden', true);
        $("#ope_efec").attr('hidden', true);
        $("#ope_monto_ope").attr('hidden', true);

        // $('#selDocumentoVenta').on('select:select', function(e) {
        //           CargarNroBoleta();
        // })

        //PARA HABILITAR LO BOTONES DE BUSQUEDAD
        $("#selTipoDoc").change(function() {
            buscarDniRuc();
        });

        $("#selTipoPago").change(function() {
            habilitarTipoOpeYape();
        });
        $("#selDocumentoVenta").change(function() {
            CargarNroBoleta();
        });

        /* ======================================================================================
        EVENTO PARA VACIAR EL CARRITO DE COMPRAS
        =========================================================================================*/
        $("#btnVaciarListado").on('click', function() {
            vaciarListado();
        })

        /* ======================================================================================
        INICIALIZAR LA TABLA DE VENTAS
        ======================================================================================*/
        function  cargartableprod() {
            table = $('#lstProductosVenta').DataTable({
                "columns": [{
                        "data": "id"
                    },
                    {
                        "data": "codigo_producto"
                    },
                    {
                        "data": "id_categoria"
                    },
                    {
                        "data": "nombre_categoria"
                    },
                    {
                        "data": "descripcion_producto"
                    },
                    {
                        "data": "cantidad"
                    },
                    {
                        "data": "precio_venta_producto"
                    },
                    {
                        "data": "total"
                    },
                    {
                        "data": "acciones"
                    },
                    {
                        "data": "aplica_peso"
                    },
                    {
                        "data": "precio_mayor_producto"
                    },
                    {
                        "data": "precio_oferta_producto"
                    },
                    {
                        "data": "id_talla"
                    },
                    {
                        "data": "talla"
                    },
                    {
                        "data": "stock"
                    },
                    {
                        "data": "descuento"
                    }
                ],
                columnDefs: [{
                        targets: 0,
                        visible: true
                    },
                    {
                        targets: 3,
                        visible: false
                    },
                    {
                        targets: 2,
                        visible: false
                    },
                    {
                        targets: 6,
                        orderable: false
                    },
                    {
                        targets: 9,
                        visible: false
                    },
                    {
                        targets: 10,
                        visible: false
                    },
                    {
                        targets: 11,
                        visible: false
                    },
                    {
                        targets: 12,
                        visible: false
                    }
                ],
                "order": [
                    [0, 'desc']
                ],
                "language": idioma_espanol,
                select: true
            });

        }
       

        /* ======================================================================================
		TRAER LISTADO DE PRODUCTOS PARA INPUT DE AUTOCOMPLETADO
		======================================================================================*/
      

       


        /* ======================================================================================
        EVENTO QUE REGISTRA EL PRODUCTO EN EL LISTADO CUANDO SE INGRESA EL CODIGO DE BARRAS
        ======================================================================================*/
        $("#iptCodigoVenta").change(function() {
            CargarProductos();
        });

        /* ======================================================================================
        EVENTO PARA ELIMINAR UN PRODUCTO DEL LISTADO
        ======================================================================================*/
        $('#lstProductosVenta tbody').on('click', '.btnEliminarproducto', function() {
            table.row($(this).parents('tr')).remove().draw();
            recalcularTotales();
            recalcularDescuento();
        });

        /* ======================================================================================
        EVENTO PARA AUMENTAR LA CANTIDAD DE UN PRODUCTO DEL LISTADO
        ====================================================================================== */
        $('#lstProductosVenta tbody').on('click', '.btnAumentarCantidad', function() {

            var data = table.row($(this).parents('tr')).data(); //Recuperar los datos de la fila

            var idx = table.row($(this).parents('tr')).index(); // Recuperar el Indice de la Fila

            var codigo_producto = data['codigo_producto'];
            var cantidad = data['cantidad'];

            $.ajax({
                async: false,
                url: "ajax/productos.ajax.php",
                method: "POST",
                data: {
                    'accion': 8,
                    'codigo_producto': codigo_producto,
                    'cantidad_a_comprar': cantidad
                },

                dataType: 'json',
                success: function(respuesta) {
                

                    if (parseInt(respuesta['existe']) == 0) {

                        Toast.fire({
                            icon: 'error',
                            title: ' EL PRODUCTO ' + data['descripcion_producto'] +
                                ' YA NO TIENE STOCK'
                        })

                        $("#iptCodigoVenta").val("");
                        $("#iptCodigoVenta").focus();

                    } else {

                        cantidad = parseInt(data['cantidad']) + 1;

                        table.cell(idx, 5).data(cantidad + ' Und(s)').draw();

                        NuevoPrecio = (parseInt(data['cantidad']) * data['precio_venta_producto']).toFixed(2);
                        NuevoPrecio =  NuevoPrecio;

                        table.cell(idx, 7).data(NuevoPrecio).draw();

                        recalcularTotales();
                    }
                }
            });

        });

        /* ======================================================================================
        EVENTO PARA DESMINUIR LA CANTIDAD DE UN PRODUCTO DEL LISTADO
        ======================================================================================*/
        $('#lstProductosVenta tbody').on('click', '.btnDisminuirCantidad', function() {

            var data = table.row($(this).parents('tr')).data();

            if (data['cantidad'].replace('Und(s)', '') >= 2) {

                cantidad = parseInt(data['cantidad'].replace('Und(s)', '')) - 1;

                var idx = table.row($(this).parents('tr')).index();

                table.cell(idx, 5).data(cantidad + ' Und(s)').draw();

                NuevoPrecio = (parseInt(data['cantidad']) * data['precio_venta_producto']).toFixed(2);
                NuevoPrecio = NuevoPrecio;

                table.cell(idx, 7).data(NuevoPrecio).draw();

            }

            recalcularTotales();
        });

        /* ======================================================================================
        EVENTO PARA INGRESAR EL PESO DEL PRODUCTO
        ====================================================================================== */
        $('#lstProductosVenta tbody').on('click', '.btnIngresarPeso', function() {

            var data = table.row($(this).parents('tr')).data();

            Swal.fire({
                title: "",
                text: "Peso del Producto (Grms):",
                input: 'text',
                width: 300,
                confirmButtonText: 'Aceptar',
                showCancelButton: true,
            }).then((result) => {

                if (result.value) {

                    cantidad = result.value;

                    var idx = table.row($(this).parents('tr')).index();

                    table.cell(idx, 5).data(cantidad + ' Kg(s)').draw();

                    NuevoPrecio = ((parseFloat(data['cantidad']) * data['precio_venta_producto']).toFixed(2));
                    NuevoPrecio = NuevoPrecio;

                    table.cell(idx, 7).data(NuevoPrecio).draw();

                    recalcularTotales();

                }

            });


        });

        /* ======================================================================================
        EVENTO PARA MODIFICAR EL PRECIO DE VENTA DEL PRODUCTO
        ======================================================================================*/
        $('#lstProductosVenta tbody').on('click', '.dropdown-item', function() {

            codigo_producto = $(this).attr("codigo");
            id = $(this).attr("id");
            //console.log("🚀 ~ file: ventas.php:527 ~ $ ~ codigo_producto", codigo_producto)
            precio_venta = parseFloat($(this).attr("precio")).toFixed(2);

            recalcularMontos(id, precio_venta);
        });

        /* ======================================================================================
         DOBLE CLICK PARA SELECCIONAR UNA TALLA 
        ======================================================================================*/
        $('#lstProductosVenta tbody').on('dblclick', '.iptTalla_n', function(event) {

            var data = table.row($(this).parents('tr')).data();


            var codp = data['codigo_producto'];
            var id = data['id'];
            

            //console.log(id)
            $("#modal_tallas").modal({
                backdrop: 'static',
                keyboard: false
            });

            var tallaagregar = parseFloat($.parseHTML(data['id_talla'])[0]['value']);
            //console.log(tallaagregar);

            $("#modal_tallas").modal('show');
            $("#iddelItem").val(id); //enviamos el id del item hacia el modal de las tallas


            tbl_tallas = $("#tbl_tallas").DataTable({
                dom: 'lft',
                destroy: true,
                ajax: {
                    url: "ajax/talla_ajax.php",
                    dataSrc: "",
                    type: "POST",
                    data: {
                        'accion': 5,
                        'codigo_producto': codp
                    }, //LISTAR 
                },
                "footerCallback": function(row, data, start, end, display) {
                    var api = this.api(),
                        data;
                    var intval = function(i) {
                        return typeof i === 'string' ?
                            i.replace(/[\$,]/g, '') * 1 :
                            typeof i === 'number' ?
                            i : 0;
                    };
                    total = api
                        .column(2)
                        .data()
                        .reduce(function(a, b) {
                            return intval(a) + intval(b);
                        }, 0);

                    pageTotal = api
                        .column(2, {
                            page: 'current'
                        })
                        .data()
                        .reduce(function(a, b) {
                            return intval(a) + intval(b);
                        }, 0);

                    $(api.column(2).footer()).html(
                        '' + pageTotal
                        //   '' + pageTotal + ' ( ' + total + ' total)'
                    );
                },

                columnDefs: [{
                    targets: 3, //columna 2
                    sortable: false, //no ordene
                    render: function(td, cellData, rowData, row, col) {
                        if (rowData[2] == 0) {
                            return "<center>" +
                                "<span class='  text-secondary px-1'  data-bs-toggle='tooltip' data-bs-placement='top' > " +
                                "<i class='fas fa-plus fs-6'></i> " +
                                "</span> " +

                                "</center>"
                        } else {
                            return "<center>" +
                                "<span class='btnAgregar  text-primary px-1' style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Agregar Talla'> " +
                                "<i class='fas fa-plus fs-6'></i> " +
                                "</span> " +

                                "</center>"

                        }
                    }
                }],

                "order": [
                    [0, 'desc']
                ],
        
                lengthMenu: [5, 10, 15, 20, 50],
                pageLength: 10,
                "language": idioma_espanol,
                select: true
            });

        });



        /* ======================================================================================
         //ENVIAR LAS TALLAS AL CAMPO DEL DATATABLE (S-L-M) id y stock
        ======================================================================================*/
        //$(document).on('click', '#tbl_tallas tr', '.btnAgregar', function(event) {
        $('#tbl_tallas').on('click', '.btnAgregar', function() {
            var data = tbl_tallas.row($(this).parents('tr')).data(); //tamaño de escritorio

            if (tbl_tallas.row(this).child.isShown()) {
                var data = tbl_tallas.row(this).data(); //para celular y usas el responsive datatable
            }
            //console.log(data);

            var id = $("#iddelItem").val();
            // let idtalla = $(this).find("td").eq(0).html();
            let idtalla = data['id_talla'];
           
            //let talla = $(this).find("td").eq(1).html();
            let talla = data['descripcion'];
            //let stock = $(this).find("td").eq(2).html();
            let stock = data['stock'];
            //console.log(idtalla, stock);



            table.rows().eq(0).each(function(index) {

                var row = table.row(index);
                var data = row.data();
                var id_talla_habili = $.parseHTML(data['id_talla'])[0]['value'];
                var cod_producto_actual = data['codigo_producto'];
                let id_t = $.parseHTML(data['id_talla'])[0]['value'] ;
               
                //console.log(id_talla_habili);

                if (data['id'] == id ) {

                    // table.cell(index, 12).data(talla).draw(); iptTalla_n
                    table.cell(index, 12).data('<input type="text" style="width:40px;" codigoProducto = "' + cod_producto_actual + '" class="form-control form-control-sm text-center iptTalla m-0 p-0" value="' + idtalla + '" disabled>').draw();
                    table.cell(index, 13).data('<input type="text" style="width:50px;" codigoProducto = "' + cod_producto_actual + '"placeholder="dobleclick" class="form-control form-control-sm text-center iptTalla_n m-0 p-0" value="' + talla + '" readonly>').draw();
                    table.cell(index, 14).data('<input type="text" style="width:50px;" codigoProducto = "' + cod_producto_actual + '" class="form-control form-control-sm text-center iptStock m-0 p-0" value="' + stock + '" disabled>').draw();
                    table.cell(index, 5).data('<input type="text" style="width:60px;" codigoProducto = "' + cod_producto_actual + '"  iptTalla_asig = "' + idtalla + '" class="form-control form-control-sm text-center iptCantidad m-0 p-0"  value="1">').draw();
                    table.cell(index, 15).data('<input type="text" style="width:60px;" codigoProducto = "' + cod_producto_actual + '"  iptTalla_asig = "' + idtalla + '" class="form-control form-control-sm text-center iptdescuento m-0 p-0"  value="0">').draw();
                   // $(".iptCantidad").prop('disabled', false);
                    $("#modal_tallas").modal('hide');
                    return false; 

                } if (id_t == idtalla || id == data['id']){

                    Toast.fire({
                        icon: 'error',
                        title: 'LA TALLA   " ' + talla +' "  YA SE ENCUENTRA AGREGADA EN EL DETALLE'
                    });

                   
                    return false; 




                }

            })
        });


        /* ======================================================================================
        EVENTO PARA MODIFICAR LA CANTIDAD DE PRODUCTOS A COMPRAR
        ======================================================================================*/
        $('#lstProductosVenta tbody').on('change', '.iptCantidad', function() {

            var data = table.row($(this).parents('tr')).data();
            var id = data.id;
            talla = $("#text_id_talla").val();
            // t = data.talla['attributes']['value'];;


            cantidad_actual = $(this)[0]['value'];
            cod_producto_actual = $(this)[0]['attributes'][2]['value'];
            // texttall = $(this)[0]['attributes'][3]['value'];

            //console.log($.parseHTML(data['stock'])[0]['value']);
            // console.log(id)

            if (!$.isNumeric($(this)[0]['value']) || $(this)[0]['value'] <= 0) {

                // mensajeToast('error', 'INGRESE UN VALOR NUMERICO Y MAYOR A 0');
                Toast.fire({
                    icon: 'error',
                    title: 'INGRESE UN VALOR NUMERICO Y MAYOR A 0'
                });

                $(this)[0]['value'] = "1";

                $("#iptCodigoVenta").val("");
                $("#iptCodigoVenta").focus();
                return;
            }



            table.rows().eq(0).each(function(index) {

                var row = table.row(index);

                var data = row.data();

                var stockt = $.parseHTML(data['stock'])[0]['value'];
                var id_talla_vali = $.parseHTML(data['id_talla'])[0]['value'];
                var talla_nomb = $.parseHTML(data['talla'])[0]['value'];
                //console.log(data);




                
                if (data['id'] == id) {

                    $.ajax({
                        async: false,
                        url: "ajax/productos.ajax.php",
                        method: "POST",
                        data: {
                            'accion': 8,
                            'codigo_producto': cod_producto_actual,
                            'stock': cantidad_actual,
                            'id_talla': id_talla_vali
                        },
                        dataType: 'json',
                        success: function(respuesta) {
                            //console.log(respuesta);

                            if (parseInt(respuesta['existe']) == 0) {

                                Toast.fire({
                                    icon: 'error',
                                    title: ' EL PRODUCTO " ' + data['descripcion_producto'] + ' " CON LA TALLA " ' + talla_nomb + ' " YA NO TIENE STOCK'
                                });
                                $(".iptTalla").val("");


                                table.cell(index, 5).data('<input type="text" style="width:60px;" codigoProducto = "' + cod_producto_actual + '" class="form-control form-control-sm text-center iptCantidad m-0 p-0" value="1">').draw();
                                //table.cell(index, 12).data('<input type="text" style="width:80px;" codigoProducto = "' +cod_producto_actual +'" class="form-control text-center iptCantidad m-0 p-0" value="' +talla + '">').draw();
                                $("#iptCodigoVenta").val("");
                                $("#iptCodigoVenta").focus();

                                // ACTUALIZAR EL NUEVO PRECIO DEL ITEM DEL LISTADO DE VENTA
                                NuevoPrecio = (parseFloat(1) * data['precio_venta_producto']).toFixed(2);
                                NuevoPrecio = NuevoPrecio;
                                table.cell(index, 7).data(NuevoPrecio).draw();

                                // RECALCULAMOS TOTALES
                                recalcularTotales();

                            } else {

                                // AUMENTAR EN 1 EL VALOR DE LA CANTIDAD
                                //table.cell(index, 5).data('<input type="text" style="width:80px;" codigoProducto = "' +cod_producto_actual +'" class="form-control text-center iptCantidad m-0 p-0" value="' +cantidad_actual + '">').draw();
                                table.cell(index, 5).data('<input type="text" style="width:60px;" codigoProducto = "' + cod_producto_actual + '" class="form-control form-control-sm text-center iptCantidad m-0 p-0" value="' + cantidad_actual + '">').draw();



                                // ACTUALIZAR EL NUEVO PRECIO DEL ITEM DEL LISTADO DE VENTA
                                NuevoPrecio = (parseFloat(cantidad_actual) * data['precio_venta_producto']).toFixed(2);
                                NuevoPrecio =  NuevoPrecio;
                                table.cell(index, 7).data(NuevoPrecio).draw();

                                // RECALCULAMOS TOTALES
                                recalcularTotales();
                            }
                        }
                    });



                }


            });

        });


        
        /* ======================================================================================
        EVENTO PARA MODIFICAR LA CANTIDAD DE PRODUCTOS A COMPRAR
        ======================================================================================*/
        $('#lstProductosVenta tbody').on('change', '.iptdescuento', function() {

            var data = table.row($(this).parents('tr')).data();
            var id = data.id;
            talla = $("#text_id_talla").val();
            // t = data.talla['attributes']['value'];;

            var mon_total_2 = $("#totalVenta").html();
            var mon_desc_acumulado= $("#boleta_descuento").html();
            var acumulado_desc = 0;

            descuento_actual = $(this)[0]['value'];
             cantidad_actual =$.parseHTML(data['cantidad'])[0]['value'];
            cod_producto_actual = $(this)[0]['attributes'][2]['value'];
     

            // if (!$.isNumeric($(this)[0]['value']) || $(this)[0]['value'] <= 0 ) {

            //     $("#iptdescuento").focus();
            //     return;
            // }



            table.rows().eq(0).each(function(index) {

                var row = table.row(index);

                var data = row.data();

                var stockt = $.parseHTML(data['stock'])[0]['value'];
                var id_talla_vali = $.parseHTML(data['id_talla'])[0]['value'];
                var talla_nomb = $.parseHTML(data['talla'])[0]['value'];

                if (data['id'] == id) {
                 // console.log(descuento_actual);
                 if (descuento_actual > parseFloat(data['total']) || descuento_actual == parseFloat(data['total']) ) {
                    Toast.fire({
                        icon: 'error',
                        title: 'EL DESCUENTO NO DEBE SER SUPERIOR QUE EL PRECIO DE VENTA'
                    })

                    table.cell(index, 15).data('<input type="text" style="width:60px;" codigoProducto = "' + cod_producto_actual + '" class="form-control form-control-sm text-center iptdescuento m-0 p-0" value="' + 0 + '">').draw();
                    Nuevototald =(parseFloat(cantidad_actual) * data['precio_venta_producto']).toFixed(2);
                    Nuevototald =  Nuevototald;
                    table.cell(index, 7).data(Nuevototald).draw();

                    recalcularDescuento();

                 }else {
                    if (descuento_actual > 0) {
                        table.cell(index, 15).data('<input type="text" style="width:60px;" codigoProducto = "' + cod_producto_actual + '" class="form-control form-control-sm text-center iptdescuento m-0 p-0" value="' + descuento_actual + '">').draw();
                         // ACTUALIZAR EL NUEVO PRECIO DEL ITEM DEL LISTADO DE VENTA
                         Nuevototal = (parseFloat(data['total']) - parseFloat(descuento_actual)).toFixed(2);
                         Nuevototal =  Nuevototal;
                        table.cell(index, 7).data(Nuevototal).draw();

                            
                                recalcularDescuento();
                    }  else {
                            // console.log("desccccccccccccccc");

                        table.cell(index, 15).data('<input type="text" style="width:60px;" codigoProducto = "' + cod_producto_actual + '" class="form-control form-control-sm text-center iptdescuento m-0 p-0" value="' + descuento_actual + '">').draw();
                        // ACTUALIZAR EL NUEVO PRECIO DEL ITEM DEL LISTADO DE VENTA
                        Nuevototald =(parseFloat(cantidad_actual) * data['precio_venta_producto']).toFixed(2);
                        Nuevototald =  Nuevototald;
                        table.cell(index, 7).data(Nuevototald).draw();

                        recalcularDescuento();

                    }


                 }

                   

                }





            });
           


        });

        




        /* =======================================================================================
        EVENTO QUE PERMITE CHECKEAR EL EFECTIVO CUANDO ES EXACTO
        =========================================================================================*/
        $("#chkEfectivoExacto").change(function() {

            if ($("#chkEfectivoExacto").is(':checked')) {

                var vuelto = 0;
                var totalVenta = $("#totalVenta").html();

                $("#iptEfectivoRecibido").val(totalVenta);

                $("#EfectivoEntregado").html(totalVenta);

                var EfectivoRecibido = parseFloat($("#EfectivoEntregado").html());

                vuelto = parseFloat(totalVenta) - parseFloat(EfectivoRecibido);

                $("#Vuelto").html(vuelto.toFixed(2));

            } else {

                $("#iptEfectivoRecibido").val("")
                $("#EfectivoEntregado").html("0.00");
                $("#Vuelto").html("0.00");

            }
        })

        /* ======================================================================================
        EVENTO QUE SE DISPARA AL DIGITAR EL MONTO EN EFECTIVO ENTREGADO POR EL CLIENTE
        =========================================================================================*/
        $("#iptEfectivoRecibido").keyup(function() {
            actualizarVuelto();
        });

        /* ======================================================================================
        EVENTO PARA INICIAR EL REGISTRO DE LA VENTA
        ====================================================================================== */
        $("#btnIniciarVenta").on('click', function() {
            realizarVenta();
        })

        /*===================================================================*/
        //BUSCAR DNI EN RENIEC CON API
        /*===================================================================*/
        $("#buscarDni").on('click', function() {

            var dni = $("#text_documento").val();
            //console.log(dni);
            $.ajax({
                async: false,
                url: "controladores/reniec/reniecDni.php",
                method: "POST",
                data: {
                    'dni': dni
                },
                dataType: 'json',
                success: function(r) {
                    if (r.numeroDocumento == dni) {
                        $('#text_nombres').val(r.nombres + ' ' + r.apellidoPaterno + ' ' + r
                            .apellidoMaterno);
                    } else {
                        // alert(r.error);
                        Toast.fire({
                            icon: 'error',
                            title: r.error
                        })
                    }
                    //console.log(r)
                }
            });
        });


        /*===================================================================*/
        //BUSCAR RUC EN RENIEC CON API
        /*===================================================================*/
        $("#buscarRuc").on('click', function() {

            var ruc = $("#text_documento").val();
            //console.log(dni);
            $.ajax({
                async: false,
                url: "controladores/reniec/reniecRuc.php",
                method: "POST",
                data: {
                    'ruc': ruc
                },
                dataType: 'json',
                success: function(r) {
                    console.log(r);
                    if (r.numeroDocumento == ruc) {
                        $('#text_nombres').val(r.nombre);
                        $('#text_direccion').val(r.direccion);
                    } else {
                        // alert(r.error);
                        Toast.fire({
                            icon: 'error',
                            title: r.error
                        })
                    }
                    //console.log(r)
                }
            });
        });


        /*===================================================================*/
        //EVENTO PARA ABRIR EL MODAL DE REGISTRAR AL DAR CLICK EN BOTON NUEVO
        /*===================================================================*/
        $("#btnRegistrarCli").on('click', function() {
            AbrirModalRegistroCliente();
        })

        /*===================================================================*/
        //DUPLICADO DE DOCUMENTOS
        /*===================================================================*/
        $("#text_documento").change(function() {

            var document = $("#text_documento").val();

            //console.log(document);
            $.ajax({
                async: false,
                url: "ajax/clientes_ajax.php",
                method: "POST",
                data: {
                    'accion': 5,
                    'cliente_dni': document
                    //  'cantidad_a_comprar': cantidad
                },

                dataType: 'json',
                success: function(respuesta) {
                    //console.log(respuesta);
                    if (parseInt(respuesta['ex']) > 0) {
                        Toast.fire({
                            icon: 'error',
                            title: ' El Documento ' + document +
                                '  ya se encuentra registrado'
                        })

                        $("#text_documento").val("");
                        $("#text_documento").focus();

                    } else {
                        //  console.log('dfgdfgdfg');
                    }
                }
            });

        })

        /*===================================================================*/
        //EVENTO QUE GUARDA Y ACTUALIZA LOS DATOS DEL MODULO, PREVIA VALIDACION DEL INGRESO DE LOS DATOS OBLIGATORIOS
        /*===================================================================*/
        document.getElementById("btnregistrar_cliente").addEventListener("click", function() {

            // Get the forms we want to add validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {

                //si se ingresan todos los datos 
                if (form.checkValidity() === true) {

                    Swal.fire({
                        title: 'Esta seguro de ' + titulo_modal + ' el Cliente?',
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
                            datos.append("cliente_id", $("#id_cliente").val()); //id
                            datos.append("cliente_tipo_doc", $("#selTipoDoc").val());
                            datos.append("cliente_dni", $("#text_documento").val());
                            datos.append("cliente_nombres", $("#text_nombres")
                                .val()); //modulo
                            datos.append("cliente_direccion", $("#text_direccion").val());
                            datos.append("cliente_celular", $("#text_cel").val());
                            datos.append("cliente_correo", $("#text_correo").val());

                            if (accion == 2) {
                                var titulo_msj = "El Cliente  se registro correctamente"
                            }

                            if (accion == 3) {
                                var titulo_msj = "El Cliente se actualizo correctamente"
                            }

                            $.ajax({
                                url: "ajax/clientes_ajax.php",
                                method: "POST",
                                data: datos, //enviamos lo de la variable datos
                                cache: false,
                                contentType: false,
                                processData: false,
                                dataType: 'json',
                                success: function(respuesta) {
                                    // console.log(respuesta);

                                    if (respuesta == "ok") {

                                        Toast.fire({
                                            icon: 'success',
                                            //title: 'El Cliente se registro de forma correcta'
                                            title: titulo_msj
                                        });

                                        cargarSelectCLiente
                                            (); //recargamos el selct 

                                        $("#modal_registro_cliente").modal(
                                            'hide');

                                        $("#id_cliente").val("");
                                        $("#text_nombres").val("");
                                        $("#text_documento").val("");
                                        $("#text_cel").val("");
                                        $("#text_direccion").val("");
                                        $("#text_correo").val("");

                                        $("#selTipoDoc").val("");


                                        $(".needs-validation").removeClass(
                                            "was-validated");

                                    } else {
                                        Toast.fire({
                                            icon: 'error',
                                            title: 'El Cliente no se pudo registrar'
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




    }) //FIN DOCUMENT READY

    function TraerListadodeProductosAutocomplete() {
        $.ajax({
            async: false,
            url: "ajax/productos.ajax.php",
            method: "POST",
            data: {
                'accion': 6
            },
            dataType: 'json',
            success: function(respuesta) {

                for (let i = 0; i < respuesta.length; i++) {
                    items.push(respuesta[i]['descripcion_producto'])
                }

                $("#iptCodigoVenta").autocomplete({

                    source: items,
                    select: function(event, ui) {

                        CargarProductos(ui.item.value);

                        $("#iptCodigoVenta").val("");

                        $("#iptCodigoVenta").focus();

                        return false;
                    }
                })

            }
        });

       }


    /*===================================================================*/
    //FUNCION PARA CARGAR EL NRO DE BOLETA
    /*===================================================================*/
    //function CargarNroBoleta() {
      //  var compro_id = $("#selDocumentoVenta").val();
      function CargarNroBoleta(id = "") {

        if (id != "") {
            var compro_id = id;

        } else {
            var compro_id = $("#selDocumentoVenta").val();
        }
        // if (id != "") {
        //     var compro_id = id;
        // } else {
        //     var compro_id = $("#selDocumentoVenta").val();
        // }
        //console.log(compro_id);
        $.ajax({
            async: false,
            url: "ajax/ventas.ajax.php",
            method: "POST",
            data: {
                'accion': 1,
                'compro_id': compro_id
            },
            dataType: 'json',
            success: function(respuesta) {
                // console.log(respuesta);

                serie = respuesta["compro_serie"];
                nro_boleta = respuesta["nro_boleta"];


                $("#iptNroSerie").val(serie);
                $("#iptNroVenta").val(nro_boleta);
            }
        });

    }

    /*===================================================================*/
    //FUNCION PARA LIMPIAR TOTALMENTE EL CARRITO DE VENTAS
    /*===================================================================*/
    function vaciarListado() {
        table.clear().draw();
        LimpiarInputs();
    }

    /*===================================================================*/
    //FUNCION PARA LIMPIAR LOS INPUTS DE LA BOLETA Y LABELS QUE TIENEN DATOS
    /*===================================================================*/
    function LimpiarInputs() {
        $("#totalVenta").html("0.00");
        $("#totalVentaRegistrar").html("0.00");
        $("#boleta_total").html("0.00");
        $("#iptEfectivoRecibido").val("");
        $("#EfectivoEntregado").html("0.00");
        $("#Vuelto").html("0.00");
        $("#chkEfectivoExacto").prop('checked', false);
        $("#boleta_subtotal").html("0.00");
        $("#boleta_igv").html("0.00")
        $("#iptCodigoVenta").val("");
        $("#text_codOpera").val("");
        $("#boleta_descuento").html("0.00");
        //$("#select_cliente").val("");
        // $("#select_cliente").select().val("").trigger('change.select');
    } /* FIN LimpiarInputs */

    /*===================================================================*/
    //FUNCION PARA ACTUALIZAR EL VUELTO
    /*===================================================================*/
    function actualizarVuelto() {

        var totalVenta = $("#totalVenta").html();

        $("#chkEfectivoExacto").prop('checked', false);

        var efectivoRecibido = $("#iptEfectivoRecibido").val();

        if (efectivoRecibido > 0) {

            $("#EfectivoEntregado").html(parseFloat(efectivoRecibido).toFixed(2));

            vuelto = parseFloat(efectivoRecibido) - parseFloat(totalVenta);

            $("#Vuelto").html(vuelto.toFixed(2));

        } else {

            $("#EfectivoEntregado").html("0.00");
            $("#Vuelto").html("0.00");

        }
    }


   
    function recalcularMontos(id, precio_venta) {

        table.rows().eq(0).each(function(index) {

            var row = table.row(index);

            var data = row.data();
            //console.log(data);


            if (data['id'] == id) {
              

                // AUMENTAR EN 1 EL VALOR DE LA CANTIDAD
                table.cell(index, 6).data( + parseFloat(precio_venta).toFixed(2)).draw();

              
               
                cantidad_actual = parseFloat($.parseHTML(data['cantidad'])[0]['value']);

                // ACTUALIZAR EL NUEVO PRECIO DEL ITEM DEL LISTADO DE VENTA
                NuevoPrecio = (parseFloat(cantidad_actual) * data['precio_venta_producto']).toFixed(2);
               
                NuevoPrecio =  NuevoPrecio;
               // NuevoPrecio = traermoneda + NuevoPrecio;
                table.cell(index, 7).data(NuevoPrecio).draw();

            }


        });

        // RECALCULAMOS TOTALES
        recalcularTotales();

    }

    /*===================================================================*/
    //FUNCION PARA RECALCULAR LOS TOTALES DE VENTA
    /*===================================================================*/
    function recalcularTotales() {

        var TotalVenta = 0.00;
        //var TotalDescu = 0.00;

        table.rows().eq(0).each(function(index) {

            var row = table.row(index);
            var data = row.data();

           // console.log(data);

           // cantidad_actual = parseFloat($.parseHTML(data['cantidad'])[0]['value']);
            TotalDess = parseFloat($.parseHTML(data['descuento'])[0]['value']);
            TotalVenta = parseFloat(TotalVenta) + parseFloat(data['total']) + parseFloat(TotalDess);
            
           // console.log(TotalDescu);

        });

        $("#totalVenta").html("");
        $("#totalVenta").html(TotalVenta.toFixed(2));

        var totalVenta = $("#totalVenta").html();
        var totalIGv = $("#text_igv").val(); //JALAMOS EL IGV DESDE LA CONFIGURACION
        var igv = parseFloat(totalVenta) * parseFloat(totalIGv)
       
        var subtotal = parseFloat(totalVenta) - parseFloat(igv);
        //var des_sum = parseFloat(totalVenta) - parseFloat(TotalDescu);

        $("#totalVentaRegistrar").html(totalVenta);

        $("#boleta_subtotal").html(parseFloat(subtotal).toFixed(2));
        $("#boleta_igv").html(parseFloat(igv).toFixed(2));
        $("#boleta_total").html(parseFloat(totalVenta).toFixed(2));
       // $("#boleta_descuento").html(parseFloat(TotalDescu).toFixed(2));

        //limpiamos el input de efectivo exacto; desmarcamos el check de efectivo exacto
        //borramos los datos de efectivo entregado y vuelto
        $("#iptEfectivoRecibido").val("");
        $("#chkEfectivoExacto").prop('checked', false);
        $("#EfectivoEntregado").html("0.00");
        $("#Vuelto").html("0.00");

        $("#iptCodigoVenta").val("");
        $("#iptCodigoVenta").focus();
        habilitarTipoOpeYape();
       // recalcularDescuento();
    }

    function recalcularDescuento() {

        
        var TotalDescu = 0.00;
        var montoydesc = 0.00;
        var Tsumasubtotal = 0.00;
        var tot_t = $("#totalVenta").html();
        //console.log(tot_t);

        table.rows().eq(0).each(function(index) {

            var row = table.row(index);
            var data = row.data();

            //console.log(data);

        // cantidad_actual = parseFloat($.parseHTML(data['cantidad'])[0]['value']);

       
            TotalDescu = parseFloat(TotalDescu) + parseFloat($.parseHTML(data['descuento'])[0]['value']);
            Tsumasubtotal = parseFloat(Tsumasubtotal) + parseFloat(data['total']) ;
        // console.log(TotalDescu);

        });

           
            $("#boleta_descuento").html(parseFloat(TotalDescu).toFixed(2));
           
             $("#boleta_total").html(parseFloat(Tsumasubtotal).toFixed(2));
             $("#totalVenta").html(parseFloat(Tsumasubtotal).toFixed(2));

            
           habilitarTipoOpeYape();
        }


        function recalcularDescuento22() {

        
            var TotalDescu = 0.00;
            var montoydesc = 0.00;
            var Tsumasubtotal = 0.00;
            var tot_t = $("#totalVenta").html();
            //console.log(tot_t);
    
            table.rows().eq(0).each(function(index) {
    
                var row = table.row(index);
                var data = row.data();
    
                //console.log(data);
    
            // cantidad_actual = parseFloat($.parseHTML(data['cantidad'])[0]['value']);
    
           
                TotalDescu = parseFloat(TotalDescu) - parseFloat($.parseHTML(data['descuento'])[0]['value']);
                Tsumasubtotal = parseFloat(Tsumasubtotal) + parseFloat(data['total']) ;
            // console.log(TotalDescu);
    
            });
    
               
                $("#boleta_descuento").html(parseFloat(TotalDescu).toFixed(2));
               
                 $("#boleta_total").html(parseFloat(Tsumasubtotal).toFixed(2));
                 $("#totalVenta").html(parseFloat(Tsumasubtotal).toFixed(2));
    
                
               habilitarTipoOpeYape();
            }


    /*===================================================================*/
    //FUNCION PARA CARGAR PRODUCTOS EN EL DATATABLE
    /*===================================================================*/
    function CargarProductos(producto = "") {

        if (producto != "") {
            var codigo_producto = producto;

        } else {
            var codigo_producto = $("#iptCodigoVenta").val();
        }

        codigo_producto = $.trim(codigo_producto.split('/')[0]);
        //console.log("🚀 ~ file: ventas.php:844 ~ CargarProductos ~ codigo_producto", codigo_producto)

        // return;

        var producto_repetido = 0;

        /*===================================================================*/
        // AUMENTAMOS LA CANTIDAD SI EL PRODUCTO YA EXISTE EN EL LISTADO
        /*===================================================================*/
        table.rows().eq(0).each(function(index) {

            var row = table.row(index);
            var data = row.data();


            //console.log("🚀 ~ file: ventas.php:829 ~ table.rows ~ data", $.parseHTML(data['cantidad'])[0]['value'])


            if (codigo_producto == data['codigo_producto']) {

                producto_repetido = 0;

                cantidad_a_comprar = parseFloat($.parseHTML(data['cantidad'])[0]['value']) + 1;

                $.ajax({
                    async: false,
                    url: "ajax/productos.ajax.php",
                    method: "POST",
                    data: {
                        'accion': 8,
                        'codigo_producto': codigo_producto,
                        'cantidad_a_comprar': cantidad_a_comprar
                        //'id_talla': talla
                    },
                    dataType: 'json',
                    success: function(respuesta) {

                        if (parseInt(respuesta['existe']) == 0) {

                            // mensajeToast('error', ' El producto ' + data['descripcion_producto'] +' ya no tiene stock');

                            Toast.fire({
                                icon: 'error',
                                title: ' EL PRODUCTO ' + data['descripcion_producto'] +
                                    ' YA NO TIENE STOCK'
                            });

                            $("#iptCodigoVenta").val("");
                            $("#iptCodigoVenta").focus();
                            //reseteodeSelect();

                        } else {

                            // AUMENTAR EN 1 EL VALOR DE LA CANTIDAD
                            //table.cell(index, 5).data('<input type="text" style="width:80px;" codigoProducto = "' +codigo_producto +'" class="form-control text-center iptCantidad m-0 p-0" value="' +cantidad_a_comprar + '">').draw();
                            //SelectTallasPorCodigoP(codigo_producto);

                            // ACTUALIZAR EL NUEVO PRECIO DEL ITEM DEL LISTADO DE VENTA
                            // NuevoPrecio = (parseFloat(cantidad_a_comprar) * data['precio_venta_producto']).toFixed(2);
                            // NuevoPrecio = "S./ " + NuevoPrecio;
                            // table.cell(index, 7).data(NuevoPrecio).draw();

                            // RECALCULAMOS TOTALES
                            recalcularTotales();
                            //reseteodeSelect();
                        }
                    }
                });

            }
        });

        // return;

        // if (producto_repetido == 1) {
        //     return;
        // }

        //console.log(codigo_producto);

        $.ajax({
            url: "ajax/productos.ajax.php",
            method: "POST",
            data: {
                'accion': 7, //BUSCAR PRODUCTOS POR SU CODIGO DE BARRAS
                'codigo_producto': codigo_producto
            },
            dataType: 'json',
            success: function(respuesta) {

                //console.log(respuesta);
                /*===================================================================*/
                //SI LA RESPUESTA ES VERDADERO, TRAE ALGUN DATO
                /*===================================================================*/
                if (respuesta) {

                    var TotalVenta = 0.00;

                    // traerdatos();

                    table.row.add({
                        'id': itemProducto,
                        'codigo_producto': respuesta['codigo_producto'],
                        'id_categoria': respuesta['id_categoria'],
                        'nombre_categoria': respuesta['nombre_categoria'],
                        'descripcion_producto': respuesta['descripcion_producto'],
                        'cantidad': '<input min="0" type="number" style="width:60px;" codigoProducto = "' + respuesta['codigo_producto'] + 
                                '" class="form-control form-control-sm text-center iptCantidad p-0 m-0 px-2" value="1" disabled>',
                        //'cantidad_temp': 1,
                        'precio_venta_producto': respuesta['precio_venta_producto'],
                        'total': respuesta['total'],
                        'acciones': "<center>" +

                            "<span class='btnEliminarproducto text-danger px-1'style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Eliminar producto'> " +
                            "<i class='fas fa-trash fs-5'> </i> " +
                            "</span>" +
                            "<div class='btn-group'>" +
                            "<button type='button' class=' p-0 btn btn-primary transparentbar dropdown-toggle btn-sm' data-bs-toggle='dropdown' aria-expanded='false'>" +
                            "<i class='fas fa-cog text-primary fs-5'></i> <i class='fas fa-chevron-down text-primary'></i>" +
                            "</button>" +

                            "<ul class='dropdown-menu'>" +
                            "<li><a class='dropdown-item' codigo = '" + respuesta['codigo_producto'] +
                            "' id =' " + itemProducto +
                            "' precio=' " + respuesta['precio_venta_producto'] +
                            "' style='cursor:pointer; font-size:14px;'>Normal (" + respuesta[
                                'precio_venta_producto'] + ")</a></li>" +
                            "<li><a class='dropdown-item' codigo = '" + respuesta['codigo_producto'] +
                            "' id =' " + itemProducto +
                            "' precio=' " + respuesta['precio_mayor_producto'] +
                            "' style='cursor:pointer; font-size:14px;'>Por Mayor ( " + parseFloat(
                                respuesta['precio_mayor_producto']).toFixed(2) + ")</a></li>" +
                            "<li><a class='dropdown-item' codigo = '" + respuesta['codigo_producto'] +
                            "' id =' " + itemProducto +
                            "' precio=' " + respuesta['precio_oferta_producto'] +
                            "' style='cursor:pointer; font-size:14px;'>Oferta (" + parseFloat(
                                respuesta['precio_oferta_producto']).toFixed(2) + ")</a></li>" +
                            "</ul>" +
                            "</div>" +
                            "</center>",
                        'aplica_peso': respuesta['aplica_peso'],
                        'precio_mayor_producto': respuesta['precio_mayor_producto'],
                        'precio_oferta_producto': respuesta['precio_oferta_producto'],
                        'id_talla': '<input type="text" style="width:40px;" codigoProducto = "' +
                            respuesta['codigo_producto'] +
                            '" class="form-control text-center form-control-sm iptTalla p-0 m-0" value="" " disabled>',
                        'talla': '<input type="text" style="width:50px;" codigoProducto = "' +
                            respuesta['codigo_producto'] +
                            '" class="form-control text-center form-control-sm iptTalla_n p-0 m-0" placeholder="dobleclick" value="" onkeyup="mayus(this);" readonly>',
                        'stock': '<input type="text" style="width:50px;" codigoProducto = "' +
                            respuesta['codigo_producto'] +
                            '" class="form-control text-center form-control-sm iptStock p-0 m-0" value="" " disabled>',
                        'descuento': '<input type="text" style="width:60px;" codigoProducto = "' + respuesta['codigo_producto'] + '" class="form-control form-control-sm text-center iptdescuento p-0 m-0" value="0" disabled>',
                        // "<center>" +
                        // " <select class='form-select form-select-sm' aria-label='.form-select-sm example' id='selTallasVen' onchange="traerdatos();" >"+   
                        //    ' <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="selTallasVen"  >'+   

                        //    " </select>"+
                        //    "<input type='text'  id='text_stock_t' >"+
                        //    '<input type="text" id="text_id_talla" value="0" >'

                        //"</center>"


                    }).draw();

                    itemProducto = itemProducto + 1;
                    

                    //  Recalculamos el total de la venta
                    recalcularTotales();

                    /*===================================================================*/
                    //SI LA RESPUESTA ES FALSO, NO TRAE ALGUN DATO
                    /*===================================================================*/
                } else {

                    //mensajeToast('error', 'EL PRODUCTO NO EXISTE O NO TIENE STOCK');
                    Toast.fire({
                        icon: 'error',
                        title: 'EL PRODUCTO NO EXISTE O NO TIENE STOCK'
                    });

                    $("#iptCodigoVenta").val("");
                    $("#iptCodigoVenta").focus();
                }

            }
        });

    } /* FIN CargarProductos */




    /*===================================================================*/
    //CARGAR STOCK Y EL ID POR TALLAS
    /*===================================================================*/
    function traerdatos3() {

        var cod = document.getElementById('selTallasVen').value;
        document.getElementById('text_id_talla').value = cod;


        /* Para obtener el texto */
        var combo = document.getElementById('selTallasVen');
        var selected = combo.options[combo.selectedIndex].dataset;
        //console.log(cod);

        document.getElementById('text_stock_t').value = selected.stock; //capturamos el stock

        var result = {
            valu: {
                id: $("#text_id_talla").attr("value", cod)
            }
        }; //enviamos el codigo al value



        //alert(result.valu.id);
        //alert(result);

        if (selected.stock == 0) {
            Toast.fire({
                icon: 'error',
                title: 'EL PRODUCTO EN ESA TALLA NO TIENE STOCK'
            });
            $("#selTallasVen").val("");
            $("#selTallasVen").focus();
            $("#text_stock_t").val("");
            $("#text_id_talla").val("");
            return false;

        }

    }



    /*===================================================================*/
    //REALIZAR LA VENTA
    /*===================================================================*/
   
    function realizarVenta() {

        var count = 0;
        var totalVenta = $("#totalVenta").html();
        var nro_boleta = $("#iptNroVenta").val();
        var subtotal = $("#boleta_subtotal").html();
        var igv = $("#boleta_igv").html();
        var id_user = $("#text_Idprincipal").val();
        var id_cli = $("#select_cliente").val();
        var fpago = $("#selTipoPago").val();
        
        var compro_id = $("#selDocumentoVenta").val();
        var serie = $("#iptNroSerie").val();
        var talla = $(".iptTalla_n").val();
        var cant_v = $(".iptCantidad").val();
        var stock_talla = $(".iptStock").val();
        var caja_id = $("#id_caja").val();
        var validTalla = true;
        var validTallayproducto = false;
        var validaprecioventa = true;
        let efec = $("#iptEfectivoRecibido").val();

        var fpago_ope = $("#text_codOpera").val();
        var monto_tarje = $("#text_monto_ope").val();
        var monto_efec = $("#text_monto_efec").val();

        var totalDescu = $("#boleta_descuento").html();

        //console.log(id_cli);

        table.rows().eq(0).each(function(index) {
            count = count + 1;   
            
            var row = table.row(index);
            var data = row.data();

            var tallaInput = $(data['id_talla']).find('.iptTalla_n');
            var tallaVal = parseFloat($.parseHTML(data['id_talla'])[0]['value']);
            var codidoytallaVal = data['codigo_producto'];
            var precvent =  data['precio_venta_producto'];
           // console.log(precvent);

           
            if (parseInt(precvent) == 0 ) {
                    Toast.fire({
                        icon: 'error',
                        title: 'Inserte un precio enm la fila ' + (index + 1)
                    });
                    
                    validaprecioventa = false;
                    return false;
            }

        
             if (isNaN(parseInt(tallaVal)) ) {
                    Toast.fire({
                        icon: 'error',
                        title: 'Seleccione una talla en la fila ' + (index + 1)
                    });
                    tallaInput.focus();
                    validTalla = false;
                    return false;
            }

                var duplicates = table.rows().eq(0).filter(function(rowIndex) {
                var rowData = table.row(rowIndex).data();
                var rowCodigoProducto = rowData['codigo_producto'];
                var rowTallaVal = parseFloat($.parseHTML(rowData['id_talla'])[0]['value']);
                return rowCodigoProducto === codidoytallaVal && rowTallaVal === tallaVal;
            });

            if (duplicates.length > 1) {
                Toast.fire({
                    icon: 'error',
                    title: 'El cOdigo de producto y la talla ya existen en el datatable en la fila ' + (index + 1)
                });
                validTallayproducto = true; // Hay duplicados, se marca como verdadero
                return false;
            }

 
       
        });

        //if (count > 0 && validTalla) {
        if (count > 0 ) {
            if ( validTalla) {
                    if ( !validTallayproducto) {
                             if ( validaprecioventa) {

                                if (parseFloat(efec) < parseFloat(totalVenta)) { 
                                    Toast.fire({
                                        icon: 'error',
                                        title: 'EL EFECTIVO ES MENOR EL COSTO TOTAL DE LA VENTA'
                                    });
                                    $("#iptEfectivoRecibido").focus();
                                  //  console.log(efec, totalVenta);
                                        return false;
                               }
                                   

                                    if (talla == "") {
                                        Toast.fire({
                                            icon: 'error',
                                            title: 'SELECCIONE UNA TALLA '
                                        });
                                        $(".iptTalla_n").focus();
                                        return false;
                                    }

                                    if (fpago == 0) {
                                        Toast.fire({
                                            icon: 'error',
                                            title: 'SELECCIONE UNA FORMA DE PAGO '
                                        });
                                        $("#selTipoPago").focus();
                                        return false;
                                    } 

                                    //validacion de campos vacios para efec  y tarjeta
                                    if (fpago == "efecytrans") {
                                        if (fpago_ope == "") {
                                            Toast.fire({
                                            icon: 'error',
                                            title: 'FALTA CODIGO DE OPERACION '
                                        });
                                        return false;

                                        }
                                        if (monto_tarje == "") {
                                            Toast.fire({
                                            icon: 'error',
                                            title: 'FALTA MONTO DE TARJETA '
                                        });
                                        return false;

                                        }

                                        if (monto_efec == "") {
                                            Toast.fire({
                                            icon: 'error',
                                            title: 'FALTA MONTO EFECTIVO '
                                        });
                                        return false;

                                        }
                                        
                                     
                                    } //
                                
                                    if (compro_id == "seleccione") {
                                        Toast.fire({
                                            icon: 'error',
                                            title: 'SELECCIONE UN COMPROBANTE '
                                        });
                                        $("#selDocumentoVenta").focus();
                                        return false;
                                    }

                                   

                                    detalle_productos = $("#lstProductosVenta").DataTable().rows().data().toArray();
                                    //console.log("detalle pro datatable",detalle_productos);


                                

                                    var formData = new FormData();
                                    var arr = [];

                                    $('#lstProductosVenta').DataTable().rows().eq(0).each(function(index) {
                                        count = count + 1;

                                        var row = $('#lstProductosVenta').DataTable().row(index);

                                        var data = row.data();


                                        arr[index] = data['codigo_producto'] + "," + parseFloat($.parseHTML(data['cantidad'])[0]['value']) + "," + data['total'] + "," + data['precio_venta_producto'] + "," + parseFloat($.parseHTML(data['id_talla'])[0]['value']) + "," + parseFloat($.parseHTML(data['descuento'])[0]['value']);
                                        formData.append('arr[]', arr[index]);
                                        //console.log("arr index", arr[index] );
                                    });

                                  
                                    //PARA GUARDAR  LA CABECERA
                                    //formData.append('arr_detalle_productos', JSON.stringify(detalle_productos));
                                    formData.append('nro_boleta', serie + '-' + nro_boleta);
                                    formData.append('descripcion_venta', 'Venta realizada : ' + serie + '-' + nro_boleta);
                                    formData.append('total_venta', parseFloat(totalVenta));
                                    formData.append('subtotal', parseFloat(subtotal));
                                    formData.append('igv', parseFloat(igv));
                                    formData.append('id_usuario', id_user);
                                    formData.append('cliente_id', id_cli);
                                    formData.append('f_pago', fpago);
                                    formData.append('f_pago_ope', fpago_ope);
                                    formData.append('compro_id', compro_id);
                                    formData.append('caja_id', caja_id);
                                    formData.append('monto_efectivo', monto_efec);
                                    formData.append('monto_transfe', monto_tarje);
                                    formData.append('descuento', totalDescu);
                                    
                                    

                                    $.ajax({
                                        url: "ajax/ventas.ajax.php",
                                        method: "POST",
                                        data: formData,
                                        cache: false,
                                        contentType: false,
                                        processData: false,
                                        success: function(respuesta) {
                                            Swal.fire({
                                                title: respuesta,
                                                icon: 'success',
                                                showCancelButton: true,
                                                confirmButtonColor: '#3085d6',
                                                cancelButtonColor: '#d33',
                                                confirmButtonText: 'Imprimir Comprobante?',
                                                allowOutsideClick: false
                                            }).then((result) => {
                                                if (result.value) {
                                                    window.open("MPDF/reporte_venta_electronica.php?codigo=" + serie + '-' + nro_boleta + "#zoom=100", "Comprobante de Venta - ticket", "scrollbards=NO");
                                                    table.clear().draw();

                                                    LimpiarInputs();
                                                    cargarSelectCLiente();
                                                    CargarNroBoleta();
                                                   // TraerListadodeProductosAutocomplete();
                                                   
                                                   // habilitarTipoOpeYape();

                                                    $("#selTipoPago").val("0");
                                                    $("#operacion").attr('hidden', true);
                                                    $("#text_codOpera").val("");

                                                    $("#text_monto_efec").val("");
                                                    $("#text_monto_ope").val("");
                                                   

                                                   
                                                    $("#ope_efec").attr('hidden', true);
                                                    $("#ope_monto_ope").attr('hidden', true); 
                                                }

                                                $("#CargarContenido").load("venta.php");
                                                table.clear().draw();

                                                LimpiarInputs();
                                                cargarSelectCLiente();
                                                CargarNroBoleta();
                                              // TraerListadodeProductosAutocomplete();
                                               
                                                Notificaciones();
                                                

                                                $("#selTipoPago").val("0");
                                                $("#operacion").attr('hidden', true);
                                                $("#text_codOpera").val("");

                                                $("#text_monto_efec").val("");
                                                $("#text_monto_ope").val("");
                                                   

                                                
                                                $("#ope_efec").attr('hidden', true);
                                                $("#ope_monto_ope").attr('hidden', true); 
                                            })
                                        }
                                    });


                              /*  } else {
                                    console.log(efec);
                                    Toast.fire({
                                        icon: 'error',
                                        title: 'EL EFECTIVO ES MENOR EL COSTO TOTAL DE LA VENTA'
                                    });
                                } */
                            }  else {
                                Toast.fire({
                                    icon: 'error',
                                    title: 'INSERTE UN PRECIO AL PRODUCTO '
                                });
                            } 
                    }else {
                        Toast.fire({
                            icon: 'error',
                            title: 'El codigo de producto y la talla ya existen en el datatable'
                        });
                    } 

            }  else {
                Toast.fire({
                    icon: 'error',
                    title: ' TIENE UN PRODUCTO SIN TALLA'
                });
            } 
        } else {
            Toast.fire({
                icon: 'error',
                title: 'NO HAY PRODUCTOS EN EL LISTADO '
            });
        }
        $("#iptCodigoVenta").focus();

    } /* FIN realizarVenta */


    /*===================================================================*/
    //HABILITAR BOTONES DE BUSQUEDAD
    /*===================================================================*/
    function buscarDniRuc() {
        var tipoDoc = $("#selTipoDoc").val();
        //console.log(tipoDoc);

        if (tipoDoc == 'Dni') {
            $("#buscarDni").attr('hidden', false);
            $("#buscarRuc").attr('hidden', true);
        } else if (tipoDoc == 'Ruc') {
            $("#buscarDni").attr('hidden', true);
            $("#buscarRuc").attr('hidden', false);
        } else {
            Toast.fire({
                icon: 'error',
                title: 'Debe Seleccione un tipo de documento'
            })

            $("#buscarDni").attr('hidden', true);
            $("#buscarRuc").attr('hidden', true);
        }

    }

    /*===================================================================*/
    //HABILITAR TEXTBOX DE CODIGO DE OPERACION
    /*===================================================================*/
    function habilitarTipoOpeYape() {
        var tipoOpe = $("#selTipoPago").val();
        let mont_tota =  $("#boleta_total").html();
        //console.log(tipoOpe);

        if (tipoOpe == 'Transferencia') {
            $("#operacion").attr('hidden', false);
            $("#ope_efec").attr('hidden', true);
            $("#ope_monto_ope").attr('hidden', false); 
            $("#text_codOpera").val("");
            $("#text_monto_efec").val("0");

            $("#text_monto_ope").val(mont_tota);
          
        } else if (tipoOpe == 'Yape') {
            $("#operacion").attr('hidden', false);
            $("#ope_efec").attr('hidden', true);
            $("#ope_monto_ope").attr('hidden', false); 

            $("#text_codOpera").val("");
            $("#text_monto_efec").val("0");

            $("#text_monto_ope").val(mont_tota);



        } else if (tipoOpe == 'Plin') {
            $("#operacion").attr('hidden', false);
            $("#ope_efec").attr('hidden', true);
            $("#ope_monto_ope").attr('hidden', false); 
            $("#text_codOpera").val("");
            $("#text_monto_efec").val("0");

            $("#text_monto_ope").val(mont_tota);


        } else if (tipoOpe == 'efecytrans') {
            $("#ope_efec").attr('hidden', false);
            $("#operacion").attr('hidden', false);
            $("#ope_monto_ope").attr('hidden', false);
         

           
            $("#text_codOpera").val("");
            $("#text_monto_efec").val("0");
            $("#text_monto_ope").val("0");

            

        } else if (tipoOpe == 'Efectivo') {


            $("#operacion").attr('hidden', true);
            $("#ope_efec").attr('hidden', true);
            $("#ope_monto_ope").attr('hidden', true);
            $("#text_monto_ope").val("0");
            $("#text_codOpera").val("");

            $("#text_monto_efec").val(mont_tota);
            
        } else if (tipoOpe == 'Credito') {


        $("#operacion").attr('hidden', true);
        $("#ope_efec").attr('hidden', true);
        $("#ope_monto_ope").attr('hidden', true);
        $("#text_monto_ope").val("0");
        $("#text_codOpera").val("");

        $("#text_monto_efec").val(mont_tota);

        } else {
            $("#text_codOpera").val("");
            $("#text_monto_efec").val("");
            $("#text_monto_ope").val("");

        }
    }


    /*===================================================================*/
    //RESETAR SELECT DE LAS TALLAS POR CODIGO
    /*===================================================================*/
    // function reseteodeSelect() {

    //     var selectElement = document.getElementById("selTallasVen");

    //     while (selectElement.length > 0) {
    //     selectElement.remove(0);
    //     }
    // }



    function AbrirModalRegistroCliente() {
        //para que no se nos salga del modal haciendo click a los costados
        $("#modal_registro_cliente").modal({
            backdrop: 'static',
            keyboard: false
        });
        $("#modal_registro_cliente").modal('show'); //abrimos el modal
        $("#titulo_modal_cliente").html('Registrar Cliente');
        $("#btnregistrar_cliente").html('Registrar');
        accion = 2; // guardar
        titulo_modal = "Registrar";
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
                        //timer: 1500
                    })

                    // $("#btnCalcular").attr('hidden', true);
                    // $("#text_monto").attr('disabled', true);
                    // $("#text_interes").attr('disabled', true);
                    // $("#text_cuotas").attr('disabled', true);
                    // $("#select_f_pago").attr('disabled', true);
                    // $("#select_moneda").attr('disabled', true);
                    // $("#text_fecha").attr('disabled', true);
                    //$("#CargarContenido").load('vistas/caja.php','content-wrapper');
                    CargarContenido('vistas/caja.php', 'content-wrapper');
                }
            }
        });
    }


    /*===================================================================*/
    //SOLICITUD AJAX PARA CARGAR SELECT DE CLIENTES
    /*===================================================================*/
    function cargarSelectCLiente() {

        $.ajax({
            url: "ajax/clientes_ajax.php",
            method: "POST",
            cache: false,
            //   data: {
            //       'accion': 1
            //   },
            dataType: 'json',
            success: function(respuesta) {
                // console.log(respuesta);

                var options = '';

                if (respuesta.length > 0) {
                    for (let i = 0; i < respuesta.length; i++) {
                        options += "<option value='" + respuesta[i][0] + "'>" + respuesta[i][1] + "</option>";
                    }
                    document.getElementById('select_cliente').innerHTML = options;
                } else {
                    options += "<option value=''>No se encontraron datos</option>";
                    // document.getElementById('select_usuario').innerHTML = options;
                }



            }
        })
    }

    function cargarSelectComprobantes() {
        $.ajax({
            url: "ajax/comprobantes_ajax.php",
            method: "POST",
            cache: false,
            //   data: {
            //       'accion': 1
            //   },
            dataType: 'json',
            success: function(respuesta) {
                // console.log(respuesta);

                var options = '<option>seleccione</option>';

                if (respuesta.length > 0) {
                    for (let i = 0; i < respuesta.length; i++) {
                        options += "<option value='" + respuesta[i][0] + "'>" + respuesta[i][1] + "</option>";
                    }
                    document.getElementById('selDocumentoVenta').innerHTML = options;
                    //$('#selDocumentoVenta option[value="1"]').prop("selected", true);
                } else {
                    options += "<option value=''>No se encontraron datos</option>";
                    // document.getElementById('select_usuario').innerHTML = options;
                }



            }
        })
    }

    /*===================================================================*/
    //FUNCION PARA CARGAR EL IGV
    /*===================================================================*/
    function CargarIgv() {

        $.ajax({
            async: false,
            url: "ajax/configuracion_ajax.php",
            method: "POST",
            data: {
                'accion': 1
            },
            dataType: 'json',
            success: function(respuesta) {
                igv = respuesta["igv"];
                simbolomoneda = respuesta["moneda"];
                $("#text_igv").val(igv);  
                $("#text_moneda_emp").val(simbolomoneda);  
            }
        });
    }

    /*===================================================================*/
    //PARA MAYUSCULAS
    /*===================================================================*/
    function mayus(e) {
        e.value = e.value.toUpperCase();
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
