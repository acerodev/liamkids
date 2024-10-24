
<?php
require_once '../controladores/usuario.controlador.php';
require_once '../modelos/usuario.modelo.php';
                       
                      
                        $nombre_sist2 = UsuarioControlador::ctrObtenerNombre_sistema();
                       // var_dump($nombre_sist2[0]['moneda']);

?>
<!-- Content Header (Page header) -->
<div class="content-header">

    <div class="container-fluid">

        <div class="row mb-2">

            <!-- <div class="col-sm-6">

                <h2 class="m-0">Punto de Venta</h2>

            </div>

            <div class="col-sm-6">

                <ol class="breadcrumb float-sm-right">

                    <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>

                    <li class="breadcrumb-item active">Ventas</li>

                </ol>

            </div> -->

        </div><!-- /.row -->

    </div><!-- /.container-fluid -->

</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">

    <div class="container-fluid">

        <div class="row mb-3">

            <div class="col-md-9">

                <div class="card card-gray shadow">

                    <div class="card-body p-3">

                        <div class="row">
                            <!-- INPUT PARA INGRESO DEL CODIGO DE BARRAS O DESCRIPCION DEL PRODUCTO -->
                            <div class="col-md-12 mb-3">

                                <div class="form-group mb-2">

                                    <label class="col-form-label" for="iptCodigoVenta">
                                        <input type="hidden" name="id_caja" id="id_caja">
                                        <input type="hidden" name="text_igv" id="text_igv">
                                        <span class="small">Productos</span>
                                    </label>

                                    <input type="text" class="form-control form-control-sm" id="iptCodigoVenta" placeholder="Ingrese el código de barras o el nombre del producto">
                                </div>

                            </div>

                            <!-- ETIQUETA QUE MUESTRA LA SUMA TOTAL DE LOS PRODUCTOS AGREGADOS AL LISTADO -->
                            <div class="col-md-7 mb-3 rounded-3" style="background-color: info;color: black;text-align:center;border:1px solid gray;">
                                <h2 class="fw-bold m-0"><?php echo $nombre_sist2[0]['moneda'] ; ?> <span class="fw-bold" id="totalVenta">0.00</span></h2>
                            </div>

                            <!-- BOTONES PARA VACIAR LISTADO Y COMPLETAR LA VENTA -->
                            <div class="col-md-5 text-right">
                                <!-- <button class="btn btn-primary" id="btnIniciarVenta"><i class="fas fa-shopping-cart"></i> Realizar Venta</button> -->
                                <a class="btn btn-primary dataval " id="btnIniciarVenta"><i class="fas fa-shopping-cart"></i> Realizar Cotizacion</a>
                                <button class="btn btn-danger" id="btnVaciarListado">
                                    <i class="far fa-trash-alt"></i> Vaciar Listado
                                </button>
                            </div>

                            <!-- LISTADO QUE CONTIENE LOS PRODUCTOS QUE SE VAN AGREGANDO PARA LA COMPRA -->
                            <div class="col-md-12">
                                <div class="table-responsive ">
                                    <table id="lstProductosVenta" class="display nowrap table-striped w-100 shadow ">
                                        <thead class="bg-info ">
                                            <tr>
                                                <th class="item">Item</th>
                                                <th>Codigo</th>
                                                <th>Id Categoria</th>
                                                <th>Categoria</th>
                                                <th>Producto</th>
                                                <th>Cantidad</th>
                                                <th>Precio</th>
                                                <th>Total</th>
                                                <th class="text-center">Opciones</th>
                                                <th>Aplica Peso</th>
                                                <th>Precio Por Mayor</th>
                                                <th>Precio Oferta</th>
                                                <th>idtalla</th>
                                                <th>Talla</th>
                                                <th>stock</th>
                                            </tr>
                                        </thead>
                                        <tbody class="small text-left fs-6">
                                        </tbody>
                                    </table>
                                </div>
                                <!-- / table -->
                            </div>
                            <!-- /.col -->
                        </div>
                    </div> <!-- ./ end card-body -->
                </div>

            </div>

            <div class="col-md-3">

                <div class="card card-gray shadow">

                   

                    <div class="card-body p-2">

                        <!-- SELECCIONAR TIPO DE DOCUMENTO -->
                        <div class="form-group mb-2">

                            <label class="col-form-label p-0" for="selCategoriaReg">

                                <span class="small">Documento</span><span class="text-danger">*</span>
                            </label>
                            <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="selDocumentoVenta">
                                 <option value="0">Seleccione Tipo Doc.</option>
                                <option value="4">Cotizacion</option>

                            </select>

                            <!-- <select class="form-select form-select-sm" aria-label=".form-select-sm example"
                                id="selDocumentoVenta" disabled>
                                <option value="0">Seleccione Documento</option>
                                <option value="1" selected="true">Boleta</option>
                                <option value="2">Factura</option>
                                <option value="3">Ticket</option>
                            </select> -->

                            <span id="validate_categoria" class="text-danger small fst-italic" style="display:none">
                                Debe Seleccionar un documento
                            </span>

                        </div>
                        <div class="form-group mb-2">

                            <label class="col-form-label p-0" for="">

                                <span class="small">Cliente</span><span class="text-danger">*</span>
                            </label>

                            <button type="button" class="btn btn-sm btn-success" id="btnRegistrarCli"><i class="fas fa-plus"></i></button>
                            <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="select_cliente">

                            </select>

                            <span id="validate_categoria" class="text-danger small fst-italic" style="display:none">
                                Debe Seleccione documento
                            </span>

                        </div>
                        <!-- SELECCIONAR CLIENTE -->
                        <!-- <div class="col-12 col-xs-10">
                            <div class="form-group mb-2">

                                <label class="col-form-label" for="selCliente">
                                    <span class="small">Cliente</span><span class="text-danger">*</span>
                                </label>
                                <button type="button" class="btn btn-sm btn-success" id="btnRegistrarCli"><i
                                        class="fas fa-plus"></i></button>
                                 <select class="form-control form-control-sm js-example-basic-single" id="select_cliente">
                                  </select> 
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example"
                                    id="select_cliente">

                                </select>


                                <span id="validate_cliente" class="text-danger small fst-italic" style="display:none">
                                    Debe Seleccione un cliente
                                </span>
                            </div>
                        </div> -->

                        <!-- SELECCIONAR TIPO DE PAGO -->
                        <div class="form-group mb-2">

                            <label class="col-form-label p-0" for="selCategoriaReg">

                                <span class="small">Tipo Pago</span><span class="text-danger">*</span>
                            </label>

                            <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="selTipoPago">
                                <option value="0">Seleccione Tipo Pago</option>
                                <option value="Al contado" >Al contado</option>
                                <option value="Credito">Credito</option>
                                <option value="Transferencia">Transferencia</option>

                                <!-- <option value="Efectivo" selected="true">Efectivo</option>
                                <option value="Yape">Yape</option>
                                <option value="Plin">Plin</option>
                                <option value="Transferencia">Transferencia</option> -->
                            </select>

                            <span id="validate_categoria" class="text-danger small fst-italic" style="display:none">
                                Debe Ingresar tipo de pago
                            </span>

                        </div>

                        <div class="form-group mb-2" id="operacion">

                            <label class="col-form-label p-0" for="">

                                <span class="small">Codigo Operacion</span>
                            </label>
                            <input type="text" name="text_codOpera" id="text_codOpera" class="form-control form-control-sm" placeholder="Codigo de operacion">

                        </div>

                        <!-- SERIE Y NRO DE BOLETA -->
                        <div class="form-group">

                            <div class="row">

                                <div class="col-md-4">

                                    <label for="iptNroSerie" class="p-0 m-0">Serie</label>

                                    <input type="text" min="0" name="iptEfectivo" id="iptNroSerie" class="form-control form-control-sm" placeholder="nro Serie" disabled>
                                </div>

                                <div class="col-md-8">

                                    <label for="iptNroVenta" class="p-0 m-0">Correlativo</label>

                                    <input type="text" min="0" name="iptEfectivo" id="iptNroVenta" class="form-control form-control-sm" placeholder="Correlativo" disabled>

                                </div>

                            </div>

                        </div>
                        <div class="form-group">

                            <div class="row">

                                <div class="col-md-6">

                                    <label for="iptNroSerie" class="p-0 m-0">Atiende</label>

                                    <input type="text"  name="iptEfectivo" id="text_atiende" class="form-control form-control-sm" placeholder="Nombre" >
                                </div>

                                <div class="col-md-6">

                                    <label for="iptNroVenta" class="p-0 m-0">Validez </label>

                                    <input type="text" min="0" name="iptEfectivo" id="text_dias" class="form-control form-control-sm" placeholder="Nro dias" >

                                </div>

                            </div>

                        </div>

                                              

                        <!-- MOSTRAR EL SUBTOTAL, IGV Y TOTAL DE LA VENTA -->
                        <div class="row fw-bold">

                        <div class="col-md-7">
                                <span>SUBTOTAL</span>
                            </div>
                            <div class="col-md-5 text-right">
                            <?php echo $nombre_sist2[0]['moneda'] ; ?> <span class="" id="boleta_subtotal">0.00</span>
                            </div>
                            

                            <div class="col-md-7">
                            <?php
                                $igv = $nombre_sist2[0]['igv'];
                                $igv_porcentaje = $igv * 100;
                            ?>
                            <span><?php echo $nombre_sist2[0]['tipo_impuesto'] ; ?> (<?php echo $igv_porcentaje; ?>%)</span>
                            </div>
                            <div class="col-md-5 text-right">
                            <?php echo $nombre_sist2[0]['moneda'] ; ?> <span class="" id="boleta_igv">0.00</span>
                            </div>

                            

                            <div class="col-md-7">
                                <span>TOTAL</span>
                            </div>
                            <div class="col-md-5 text-right">
                            <?php echo $nombre_sist2[0]['moneda'] ; ?> <span class="" id="boleta_total">0.00</span>
                            </div>
                        </div>

                    </div><!-- ./ CARD BODY -->

                </div><!-- ./ CARD -->
            </div>

        </div>
    </div>

</div>


<!-- MODAL REGISTRAR CLIENTE-->
<div class="modal fade" id="modal_registro_cliente" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header bg-gray py-1 align-items-center">
                <h5 class="modal-title" id="titulo_modal_cliente">Registro de Usuarios</h5>
                <button type="button" class="close  text-white border-0 fs-5" id="btncerrarmodal_cliente" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate>
                    <!-- FORMULARIO CLIENTE -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mb-2">
                                <label for="" class="">

                                    <span class="small"> Tipo Doc.</span><span class="text-danger">*</span>
                                </label>
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="selTipoDoc" required>
                                    <option value="">Seleccione Tipo Documento</option>
                                    <option value="Dni">Dni</option>
                                    <option value="Ruc">Ruc</option>
                                </select>
                                <div class="invalid-feedback">Debe ingresar tipo de documento</div>

                                </button>
                            </div>
                        </div>

                        <div class="col-10 col-xs-10">
                            <div class="form-group mb-2">
                                <label for="" class="">
                                    <span class="small"> Documento</span><span class="text-danger">*</span>
                                </label>
                                <input type="text" class=" form-control form-control-sm" id="text_documento" name="text_documento" placeholder="Documento" required>
                                <div class="invalid-feedback">Debe ingresar el documento del cliente</div>

                            </div>
                        </div>
                        <div class="col-2 col-xs-2">
                            <div class="form-group mb-2">
                                <label for="">&nbsp;</label> <br>
                                <button type="button" class="btn btn-sm btn-success" id="buscarDni"><i class="fas fa-search"></i></button>
                                <button type="button" class="btn btn-sm btn-danger" id="buscarRuc"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group mb-2">
                                <label for="" class="">
                                    <span class="small"> Nombres</span><span class="text-danger">*</span>
                                </label>
                                <input type="text" class=" form-control form-control-sm" id="text_nombres" name="text_nombres" placeholder="Nombres" required>
                                <div class="invalid-feedback">Debe ingresar los nombres del cliente</div>

                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group mb-2" id="iptclave">
                                <label for="ipclave" class="">
                                    <span class="small"> Direccion</span><span class="text-danger">*</span>
                                </label>
                                <input type="text" class=" form-control form-control-sm" id="text_direccion" name="text_direccion" placeholder="Direccion">
                                <div class="invalid-feedback">Debe ingresar una direccion</div>

                            </div>
                        </div>


                        <div class="col-lg-12">
                            <div class="form-group mb-2">
                                <label for="" class="">
                                    <span class="small"> Celular</span><span class="text-danger">*</span>
                                </label>
                                <input type="text" class=" form-control form-control-sm" id="text_cel" name="text_cel" placeholder="Celular / telefono">
                                <div class="invalid-feedback">Debe ingresar el celular </div>

                            </div>
                        </div>


                        <div class="col-lg-12">
                            <div class="form-group mb-2" id="iptclave">
                                <label for="ipclave" class="">
                                    <span class="small"> Correo</span>
                                </label>
                                <input type="text" class=" form-control form-control-sm" id="text_correo" name="text_correo" placeholder="Correo">


                            </div>
                        </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal" id="btncerrar_cliente">Cerrar</button>
                <!-- <button type="button" class="btn btn-primary btn-sm" id="btnregistrar_cliente">Registrar</button> -->
                <div class="form-group m-0"><a class="btn btn-primary btn-sm" id="btnregistrar_cliente">Registrar</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- fin Modal -->

<!-- MODAL VER TALLAS DEL PRODUCTO-->
<div class="modal fade" id="modal_tallas" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header bg-gray py-1 align-items-center">
                <h5 class="modal-title" id="titulo_modal_cliente">Tallas por Articulo</h5>
                <button type="button" class="close  text-white border-0 fs-5" id="btncerrarmodal_tallas" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-md-12">
                        <input type="text" id="iddelItem" hidden>
                        <div class="table-responsive ">
                            <table id="tbl_tallas" class="display nowrap table-striped w-100 shadow ">
                                <thead class="bg-info " style="text-align: center;">
                                    <tr>
                                        <th class="item">Id</th>
                                        <th>Talla</th>
                                        <th style="text-align: center;">Stock</th>
                                        <th class="text-center">Opciones</th>

                                    </tr>
                                </thead>
                                <tbody style="text-align: center;">
                                </tbody>
                                <tfoot style="text-align: center;">
                                    <tr>
                                        <th></th>
                                        <th>Total:</th>
                                        <th></th>
                                        <th></th>

                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- / table -->
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal" id="btncerrar_tallas">Cerrar</button>
                <!-- <button type="button" class="btn btn-primary btn-sm" id="btnregistrar_cliente">Registrar</button> -->
                <!-- <div class="form-group m-0"><a class="btn btn-primary btn-sm" id="btnregistrar_cliente">Registrar</a> -->
            </div>
        </div>
    </div>
</div>
</div>
<!-- fin Modal -->

<script>
    var accion;
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

        cargarSelectCLiente();
       //cargarSelectComprobantes();
        //CargarEstadoCaja();
        //CargarId_Caja();
        CargarIgv();


        /* ======================================================================================
        TRAER EL NRO DE BOLETA
        ======================================================================================*/

       // CargarNroBoleta();

        //OCULTAR LO BOTONES DE BUSQUEDAD
        $("#buscarDni").attr('hidden', true);
        $("#buscarRuc").attr('hidden', true);
        $("#operacion").attr('hidden', true);

        // $('#selDocumentoVenta').on('select:select', function(e) {
        //           CargarNroBoleta();
        // })

        //PARA HABILITAR LO BOTONES DE BUSQUEDAD
        $("#selTipoDoc").change(function() {
            buscarDniRuc();
        });

        // $("#selTipoPago").change(function() {
        //     habilitarTipoOpeYape();
        // });
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

        /* ======================================================================================
		TRAER LISTADO DE PRODUCTOS PARA INPUT DE AUTOCOMPLETADO
		======================================================================================*/
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
                NuevoPrecio =  NuevoPrecio;

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
                    NuevoPrecio =  NuevoPrecio;

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
                dom: 't',
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




                // if (data['codigo_producto'] == cod_producto_actual) {
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
                                NuevoPrecio =  NuevoPrecio;
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
            realizarCotiza();
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
            url: "ajax/cotizacion_ajax.php",
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


    //function recalcularMontos(codigo_producto, precio_venta) {
    function recalcularMontos(id, precio_venta) {

        table.rows().eq(0).each(function(index) {

            var row = table.row(index);

            var data = row.data();
            //console.log(data);


            if (data['id'] == id) {
                //  if (data['id'] == id) {

                // AUMENTAR EN 1 EL VALOR DE LA CANTIDAD
                table.cell(index, 6).data(parseFloat(precio_venta).toFixed(2)).draw();

                // cantidad_actual = 
                //console.log("🚀 ~ file: ventas.php:744 ~ table.rows ~ data", parseFloat($.parseHTML(data[ 'cantidad'])[0]['value']))
                cantidad_actual = parseFloat($.parseHTML(data['cantidad'])[0]['value']);

                // ACTUALIZAR EL NUEVO PRECIO DEL ITEM DEL LISTADO DE VENTA
                NuevoPrecio = (parseFloat(cantidad_actual) * data['precio_venta_producto']).toFixed(2);
                NuevoPrecio =  NuevoPrecio;
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

        table.rows().eq(0).each(function(index) {

            var row = table.row(index);
            var data = row.data();

            TotalVenta = parseFloat(TotalVenta) + parseFloat(data['total']);

        });

        $("#totalVenta").html("");
        $("#totalVenta").html(TotalVenta.toFixed(2));

        var totalVenta = $("#totalVenta").html();
        var totalIGv = $("#text_igv").val(); //JALAMOS EL IGV DESDE LA CONFIGURACION
        var igv = parseFloat(totalVenta) * parseFloat(totalIGv)
        //var igv = parseFloat(totalVenta) * 0.18
        var subtotal = parseFloat(totalVenta) - parseFloat(igv);

        $("#totalVentaRegistrar").html(totalVenta);

        $("#boleta_subtotal").html(parseFloat(subtotal).toFixed(2));
        $("#boleta_igv").html(parseFloat(igv).toFixed(2));
        $("#boleta_total").html(parseFloat(totalVenta).toFixed(2));

        //limpiamos el input de efectivo exacto; desmarcamos el check de efectivo exacto
        //borramos los datos de efectivo entregado y vuelto
        $("#iptEfectivoRecibido").val("");
        $("#chkEfectivoExacto").prop('checked', false);
        $("#EfectivoEntregado").html("0.00");
        $("#Vuelto").html("0.00");

        $("#iptCodigoVenta").val("");
        $("#iptCodigoVenta").focus();
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
                        'cantidad': '<input type="text" style="width:60px;" codigoProducto = "' + respuesta['codigo_producto'] + '" class="form-control form-control-sm text-center iptCantidad p-0 m-0" value="1" disabled>',
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
                            "' style='cursor:pointer; font-size:14px;'>Por Mayor (" + parseFloat(
                                respuesta['precio_mayor_producto']).toFixed(2) + ")</a></li>" +
                            "<li><a class='dropdown-item' codigo = '" + respuesta['codigo_producto'] +
                            "' id =' " + itemProducto +
                            "' precio=' " + respuesta['precio_oferta_producto'] +
                            "' style='cursor:pointer; font-size:14px;'>Oferta ( " + parseFloat(
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
                            '" class="form-control text-center form-control-sm iptStock p-0 m-0" value="" " disabled>'
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
   
    function realizarCotiza() {

        var count = 0;
        var totalVenta = $("#totalVenta").html();
        var nro_boleta = $("#iptNroVenta").val();
        var subtotal = $("#boleta_subtotal").html();
        var igv = $("#boleta_igv").html();
        var id_user = $("#text_Idprincipal").val();
        var id_cli = $("#select_cliente").val();
        var fpago = $("#selTipoPago").val();
        var fpago_ope = $("#text_codOpera").val();
        var compro_id = $("#selDocumentoVenta").val();
        var serie = $("#iptNroSerie").val();
        var talla = $(".iptTalla_n").val();
        var cant_v = $(".iptCantidad").val();
        var stock_talla = $(".iptStock").val();
        var caja_id = $("#id_caja").val();
        var atiende = $("#text_atiende").val();
        var dias = $("#text_dias").val();
        var validTalla = true;
        var validTallayproducto = false;
        var validaprecioventa = true;

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

                               // if ($("#iptEfectivoRecibido").val() < parseFloat(totalVenta)) {

                                    if (talla == "") {
                                        Toast.fire({
                                            icon: 'error',
                                            title: 'SELECCIONE UNA TALLA '
                                        });
                                        $(".iptTalla_n").focus();
                                        return false;
                                    }
                                
                                    if (compro_id == "0") {
                                        Toast.fire({
                                            icon: 'error',
                                            title: 'SELECCIONE UN COMPROBANTE '
                                        });
                                        $("#selDocumentoVenta").focus();
                                        return false;
                                    }
                                    if (fpago == "0") {
                                        Toast.fire({
                                            icon: 'error',
                                            title: 'SELECCIONE UNA FORMA DE PAGO '
                                        });
                                        $("#selTipoPago").focus();
                                        return false;
                                    }

                                

                                    var formData = new FormData();
                                    var arr = [];

                                    table.rows().eq(0).each(function(index) {
                                        var row = table.row(index);
                                        var data = row.data();
                                       
                                        //PARA GUARDAR EL DETALLE DEL DATATABLE
                                        arr[index] = data['codigo_producto'] + "," + parseFloat($.parseHTML(data['cantidad'])[0]['value']) + "," + data['total'] + "," + data['precio_venta_producto'] + "," + parseFloat($.parseHTML(data['id_talla'])[0]['value']);
                                        formData.append('arr[]', arr[index]);
                                        

                                    });
                                
                                    //PARA GUARDAR  LA CABECERA
                                    formData.append('nro_boleta', serie + '-' + nro_boleta);
                                    formData.append('descripcion_venta', 'Cotizacion: ' + serie + '-' + nro_boleta);
                                    formData.append('total_venta', parseFloat(totalVenta));
                                    formData.append('subtotal', parseFloat(subtotal));
                                    formData.append('igv', parseFloat(igv));
                                    formData.append('id_usuario', id_user);
                                    formData.append('cliente_id', id_cli);
                                    formData.append('f_pago', fpago);
                                    formData.append('f_pago_ope', fpago_ope);
                                    formData.append('compro_id', compro_id);
                                    //formData.append('caja_id', caja_id);
                                    formData.append('atiende', atiende);
                                    formData.append('validez', dias);

                                    $.ajax({
                                        url: "ajax/cotizacion_ajax.php",
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
                                                confirmButtonText: 'Imprimir Cotizacion?',
                                                allowOutsideClick: false
                                            }).then((result) => {
                                                if (result.value) {
                                                    window.open("MPDF/reporte_cotizacion.php?codigo=" + serie + '-' + nro_boleta + "#zoom=100", "Cotizacion", "scrollbards=NO");
                                                    table.clear().draw();

                                                    LimpiarInputs();
                                                    cargarSelectCLiente();
                                                    CargarNroBoleta();

                                                    $("#selTipoPago").val("0");
                                                    $("#operacion").attr('hidden', true);
                                                    $("#text_codOpera").val("");
                                                    $("#text_atiende").val("");
                                                    $("#text_dias").val("");
                                                    //$("#selDocumentoVenta").val("");
                                                    //$("#selDocumentoVenta").val("");
                                                }

                                                $("#CargarContenido").load("cotizacion.php");
                                                table.clear().draw();

                                                LimpiarInputs();
                                                cargarSelectCLiente();
                                                CargarNroBoleta();
                                                Notificaciones();

                                                $("#selTipoPago").val("0");
                                                $("#operacion").attr('hidden', true);
                                                $("#text_codOpera").val("");
                                                 $("#text_atiende").val("");
                                                 $("#text_dias").val("");
                                                // codigoProductoList = [];
                                                //  tallaList = [];
                                            })
                                        }
                                    });


                               // } 
                                /*else {
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

    } /* FIN realizarCotiza */


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
        //console.log(tipoOpe);

        if (tipoOpe == 'Transferencia') {
            $("#operacion").attr('hidden', false);
            // $("#efe_reci_ocultar").attr('hidden', true);
            // $("#chk_ocultar").attr('hidden', true);
            $("#text_codOpera").val("");
        } else if (tipoOpe == 'Yape') {
            $("#operacion").attr('hidden', false);
            $("#text_codOpera").val("");
        } else if (tipoOpe == 'Plin') {
            $("#operacion").attr('hidden', false);
            $("#text_codOpera").val("");
        } else {
            // Toast.fire({
            //     icon: 'error',
            //     title: 'Debe Seleccione un tipo de documento'
            // })

            $("#operacion").attr('hidden', true);
            //$("#efe_reci_ocultar").attr('hidden', false);
            //$("#chk_ocultar").attr('hidden', false);
        }
    }




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
                $("#text_igv").val(igv);
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
</script>