<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <!-- <div class="col-sm-6">
                <h2 class="m-0">Inventario / Productos</h2>
            </div> -->
            <!-- <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                    <li class="breadcrumb-item active">Inventario / Productos</li>
                </ol>
            </div> -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">

    <div class="container-fluid">

        <!-- row para criterios de busqueda -->
        <div class="row" hidden>

            <div class="col-lg-12">

                <div class="card card-gray shadow">
                    <div class="card-header">
                        <h3 class="card-title">CRITERIOS DE BÚSQUEDA</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool text-warning" id="btnLimpiarBusqueda">
                                <i class="fas fa-times"></i>
                            </button>
                        </div> <!-- ./ end card-tools -->
                    </div> <!-- ./ end card-header -->
                    <div class="card-body">

                        <div class="row">

                            <div class="d-none d-md-flex col-md-12 ">

                                <div style="width: 20%;" class="form-floating mx-1">
                                    <input type="text" id="iptCodigoBarras" class="form-control" data-index="1">
                                    <label for="iptCodigoBarras">Código de Barras</label>
                                </div>

                                <div style="width: 20%;" class="form-floating mx-1">
                                    <input type="text" id="iptCategoria" class="form-control" data-index="3">
                                    <label for="iptCategoria">Categoría</label>
                                </div>

                                <div style="width: 20%;" class="form-floating mx-1">
                                    <input type="text" id="iptProducto" class="form-control" data-index="4">
                                    <label for="iptProducto">Producto</label>
                                </div>

                                <div style="width: 20%;" class="form-floating mx-1">
                                    <input type="text" id="iptPrecioVentaDesde" class="form-control">
                                    <label for="iptPrecioVentaDesde">P. Venta Desde</label>
                                </div>

                                <div style="width: 20%;" class="form-floating mx-1">
                                    <input type="text" id="iptPrecioVentaHasta" class="form-control">
                                    <label for="iptPrecioVentaHasta">P. Venta Hasta</label>
                                </div>
                            </div>

                            <div class="d-block d-sm-none">

                                <div style="width: 100%;" class="form-floating mx-1 my-1">
                                    <input type="text" id="iptCodigoBarras" class="form-control" data-index="1">
                                    <label for="iptCodigoBarras">Código de Barras</label>
                                </div>

                                <div style="width: 100%;" class="form-floating mx-1 my-1">
                                    <input type="text" id="iptCategoria" class="form-control" data-index="3">
                                    <label for="iptCategoria">Categoría</label>
                                </div>

                                <div style="width: 100%;" class="form-floating mx-1 my-1">
                                    <input type="text" id="iptProducto" class="form-control" data-index="4">
                                    <label for="iptProducto">Producto</label>
                                </div>

                                <div style="width: 100%;" class="form-floating mx-1 my-1">
                                    <input type="text" id="iptPrecioVentaDesde" class="form-control">
                                    <label for="iptPrecioVentaDesde">P. Venta Desde</label>
                                </div>

                                <div style="width: 100%;" class="form-floating mx-1 my-1">
                                    <input type="text" id="iptPrecioVentaHasta" class="form-control">
                                    <label for="iptPrecioVentaHasta">P. Venta Hasta</label>
                                </div>
                            </div>

                        </div>
                    </div> <!-- ./ end card-body -->
                </div>

            </div>

        </div>
        <div class="row p-0 m-0">
            <div class="col-md-12">
                <div class="card card-info card-outline shadow ">
                    <div class="card-header">
                        <h3 class="card-title">Listado de Productos&nbsp; &nbsp; &nbsp;</h3>

                        <button class="btnCatalogo btn btn-success btn-sm float-left"><i class="fas fa-images"></i> Catalogo</button>

                        <button class="btn btn-info btn-sm float-right" id="abrirmodalP"><i class="fas fa-plus"></i>Nuevo</button>

                    </div>
                    <div class=" card-body">

                        <!-- row para listado de productos/inventario -->
                        <div class="row">
                            <!-- <div class="col-lg-12"> -->
                            <div class="table-responsive">
                                <table id="tbl_productos" class="table display table-hover text-nowrap compact  w-100  rounded">

                                    <thead class="bg-info">
                                        <tr style="font-size: 15px;">
                                            <th></th> <!-- 0 -->
                                            <th>Codigo</th> <!-- 1 -->
                                            <th>Id Categoria</th> <!-- 2 -->
                                            <th>Categoría</th> <!-- 3 -->
                                            <th>Producto</th> <!-- 4 -->
                                            <th>P. Compra</th> <!-- 5 -->
                                            <th>P. Venta</th> <!-- 6 -->
                                            <th>P. Venta Mayor</th> <!-- 7 -->
                                            <th>P. Venta Oferta</th> <!-- 8 -->
                                            <th>Stock</th> <!-- 9 -->
                                            <th>Min. Stock</th> <!-- 10 -->
                                            <th>Ventas</th> <!-- 11 -->
                                            <th>Fecha Creación</th> <!-- 12 -->
                                            <th>Fecha Actualización</th> <!-- 13 -->
                                            <th>Estado</th> <!-- 14 -->
                                            <th class="text-cetner">Opciones</th> <!-- 17 -->
                                        </tr>
                                    </thead>
                                    <tbody class="text-small">
                                    </tbody>
                                </table>

                            </div>

                            <!-- </div> -->

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div><!-- /.container-fluid -->

</div>
<!-- /.content -->

<!-- MODAL REGISTRAR Y EDITAR PRODUCTOS -->
<div class="modal fade" id="mdlGestionarProducto" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg">

        <!-- contenido del modal -->
        <div class="modal-content">

            <!-- cabecera del modal -->
            <div class="modal-header bg-gray py-1">

                <h5 class="modal-title" id="titulo_modal_p">Agregar Producto</h5>

                <button type="button" class="btn btn-outline-primary text-white border-0 fs-5" data-bs-dismiss="modal" id="btnCerrarModal">
                    <i class="far fa-times-circle"></i>
                </button>

            </div>

            <!-- cuerpo del modal -->
            <div class="modal-body">

                <!-- <form id="frm-datos-producto" class="needs-validation" novalidate> -->
                <!-- Abrimos una fila -->
                <div class="row">

                    <!-- Columna para registro del codigo de barras -->
                    <div class="col-12 col-lg-6">
                        <div class="form-group mb-2">
                            <label class="" for="iptCodigoReg">
                                <span class="small">Código de Barras</span><span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control form-control-sm" id="iptCodigoReg" name="iptCodigoReg" placeholder="Código de Barras" required>
                            <div class="invalid-feedback">Ingrese el codigo de barras</div>
                        </div>
                    </div>

                    <!-- Columna para registro de la categoría del producto -->
                    <div class="col-12  col-lg-6">
                        <div class="form-group mb-2">
                            <label class="" for="">
                                <span class="small">Categoria</span><span class="text-danger">*</span>
                            </label>
                            <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="selCategoriaReg" name="selCategoriaReg" required>
                            </select>
                            <div class="invalid-feedback">Seleccione la categoría</div>
                        </div>
                    </div>



                    <!-- Columna para registro de la descripción del producto -->
                    <div class="col-md-8">
                        <div class="form-group mb-2">
                            <label class="" for="iptDescripcionReg">
                                <span class="small">Descripción</span><span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-sm" id="iptDescripcionReg" name="iptDescripcionReg" placeholder="Descripción" onkeyup="mayus(this);" required>
                            <div class="invalid-feedback">Ingrese la descripción</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-2">
                            <label for="" class="">
                                <span class="small">Medida</span>
                            </label>
                            <select name="" id="select_medida" class="form-select form-select-sm" aria-label=".form-select-sm example" required></select>

                            <div class="invalid-feedback">Seleccione una Medida</div>

                        </div>
                    </div>

                    <!-- Columna para registro del Precio de Compra -->
                    <div class="col-12  col-lg-3">
                        <div class="form-group mb-2">
                            <label class="" for="iptPrecioCompraReg"><span class="small">Precio
                                    Compra</span><span class="text-danger">*</span></label>
                            <input type="number" min="0" class="form-control form-control-sm" step="0.01" id="iptPrecioCompraReg" placeholder="Precio de Compra" name="iptPrecioCompraReg" required>
                            <div class="invalid-feedback">Ingrese el Precio de compra</div>
                        </div>
                    </div>

                    <!-- Columna para registro del Precio de Venta -->
                    <div class="col-12 col-lg-3">
                        <div class="form-group mb-2">
                            <label class="" for="iptPrecioVentaReg"> <span class="small">Precio
                                    Venta</span><span class="text-danger">*</span></label>
                            <input type="number" min="0" class="form-control form-control-sm" id="iptPrecioVentaReg" name="iptPrecioVentaReg" placeholder="Precio de Venta" step="0.01" required>
                            <div class="invalid-feedback">Ingrese el precio de venta</div>
                        </div>
                    </div>

                    <!-- Columna para registro del Precio de Venta Mayor-->
                    <div class="col-12 col-lg-3">
                        <div class="form-group mb-2">
                            <label class="" for="iptPrecioVentaMayorReg"><span class="small">Precio
                                    Venta x Mayor</span></label>
                            <input type="number" min="0" value="0" class="form-control form-control-sm" id="iptPrecioVentaMayorReg" name="iptPrecioVentaMayorReg" placeholder="Precio de Venta" step="0.01">
                        </div>
                    </div>

                    <!-- Columna para registro del Precio de Venta Oferta-->
                    <div class="col-12 col-lg-3">
                        <div class="form-group mb-2">
                            <label class="" for="iptPrecioVentaOfertaReg"> <span class="small">Precio
                                    Venta Oferta</span></label>
                            <input type="number" min="0" value="0" class="form-control form-control-sm" id="iptPrecioVentaOfertaReg" name="iptPrecioVentaOfertaReg" placeholder="Precio de Venta" step="0.01">
                        </div>
                    </div>

                    <!-- Columna para registro del Stock del producto -->
                    <div class="col-12 col-lg-4">
                        <div class="form-group mb-2">
                            <label class="" for="iptStockReg">
                                <span class="small">Stock</span><span class="text-danger">*</span></label>
                            <input type="number" min="0" class="form-control form-control-sm" id="iptStockReg" name="iptStockReg" placeholder="Stock" required>
                            <div class="invalid-feedback">Ingrese el stock</div>
                        </div>
                    </div>


                    <!-- Columna para registro del Minimo de Stock -->
                    <div class="col-12 col-lg-4">
                        <div class="form-group mb-2">
                            <label class="" for="iptMinimoStockReg"> <span class="small">Mínimo
                                    Stock</span><span class="text-danger">*</span></label>
                            <input type="number" min="0" class="form-control form-control-sm" id="iptMinimoStockReg" name="iptMinimoStockReg" placeholder="Mínimo Stock" required>
                            <div class="invalid-feedback">Ingrese el minimo stock</div>
                        </div>
                    </div>
                    <div class="col-md-4" id="vacio">
                        <!-- <div class="form-group mb-2">
                                <label for="" class="">
                                    <span class="small">Talla</span>
                                </label>
                                <select name="" id="select_talla" class="form-select form-select-sm" aria-label=".form-select-sm example" required></select>

                                <div class="invalid-feedback">Seleccione una Talla</div>

                            </div> -->
                    </div>
                    <div class="col-md-4" id="esta">
                        <div class="form-group mb-2">
                            <label for="" class="col-form-label">

                                <span class="small">Estado</span>
                            </label>
                            <select class="form-control form-control-sm js-example-basic-single" id="selEstado" required>
                                <option value="Activo">Activo</option>
                                <option value="Inactivo">Inactivo</option>
                            </select>

                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group mb-2">
                            <label for="" class="">
                                <span class="small">Talla</span>
                            </label>
                            <select name="" id="select_talla" class="form-select form-select-sm" aria-label=".form-select-sm example" required onchange="traeridtallanombre();"></select>
                            <input type="hidden" class="form-control form-control-sm" id="text_id_talla">
                            <input type="hidden" class="form-control form-control-sm" id="text_nombre_talla">


                            <div class="invalid-feedback">Seleccione una Talla</div>

                        </div>
                    </div>

                    <div class="col-12 col-lg-4">
                        <div class="form-group mb-2">
                            <label class="" for=""> <span class="small">
                                    Stock</span><span class="text-danger">*</span></label>
                            <input type="number" min="0" class="form-control form-control-sm" id="text_stock_talla_pro" name="" placeholder="Stock" required>
                            <div class="invalid-feedback">Ingrese el minimo stock</div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="form-group mb-2">
                            <label for="">&nbsp;</label><br>
                            <button class="btn btn-success btn-sm " id="btnagregar_t">Agregar</button>
                            <button class="btn btn-danger btn-sm " id="btnInsert_t">Agregar</button>
                            <!-- <button class="btn btn-danger btn-sm float-right" id="btnLimpiarCampos" hidden>Limpiar</button> -->
                        </div>
                    </div>



                </div>
                <!-- </form> -->

                <div class="row">

                    <div class="table-responsive">
                        <table id="tbl_tallas_pro" class="table-bordered display compact" style="width: 100%">
                            <thead class="bg-info">
                                <tr>
                                    <th>Id</th>
                                    <th>Talla</th>
                                    <th>Stock</th>
                                    <th>accion</th>

                                </tr>
                            </thead>
                            <tbody id="tbody_tabla_detalle_pro">

                            </tbody>
                        </table>

                    </div>
                </div>
                <br>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btnCancelarRegistro">Cerrar</button>
                <!-- <button type="button" class="btn btn-primary" id="btnGuardarProducto">Registrar</button> -->
                <a class="btn btn-info " id="btnGuardarProducto">Registrar</a>
            </div>

        </div>
    </div>


</div>
<!-- /. End Ventana Modal para ingreso de Productos -->

<!-- MODAL STOCK PRODUCTOS -->
<div class="modal fade" id="mdlGestionarStock" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header bg-gray py-2">
                <h6 class="modal-title" id="titulo_modal_stock">Adicionar Stock</h6>
                <button type="button" class="btn-close text-white fs-6" data-bs-dismiss="modal" aria-label="Close" id="btnCerrarModalStock">
                </button>
            </div>

            <div class="modal-body">

                <div class="row">

                    <div class="col-12 mb-3">
                        <label for="" class="form-label text-primary d-block">Codigo: <span id="stock_codigoProducto" class="text-secondary"></span></label>
                        <label for="" class="form-label text-primary d-block">Producto: <span id="stock_Producto" class="text-secondary"></span></label>
                        <label for="" class="form-label text-primary d-block">Stock: <span id="stock_Stock" class="text-secondary"></span></label>
                    </div>

                    <div class="col-12">
                        <div class="form-group mb-2">
                            <label class="" for="iptStockSumar">
                                <i class="fas fa-plus-circle fs-6"></i> <span class="small" id="titulo_modal_label">Agregar al Stock</span>
                            </label>
                            <input type="number" min="0" class="form-control form-control-sm" id="iptStockSumar" placeholder="Ingrese cantidad a agregar al Stock">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label for="" class="">
                                <span class="small">Talla</span>
                            </label>
                            <select name="" id="select_talla_aumentar" class="form-select form-select-sm" aria-label=".form-select-sm example" required></select>
                            <!-- <input type="text"  class="form-control form-control-sm" id="text_id_talla_aumentar" >
                                      <input type="text"  class="form-control form-control-sm" id="text_nombre_talla_aumentar" >  -->

                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label class="" for=""> <span class="small">
                                    Stock</span><span class="text-danger">*</span></label>
                            <input type="text" min="0" class="form-control form-control-sm" id="text_stock_tallas_aumentar" name="" placeholder="Stock" required>

                            <input type="text" class="form-control form-control-sm" id="textSuma_stock" hidden>
                        </div>
                    </div>


                    <div class="col-12">
                        <label for="" class="form-label text-danger">Nuevo Stock: <span id="stock_NuevoStock" class="text-secondary"></span></label><br>
                    </div>

                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal" id="btnCancelarRegistroStock">Cancelar</button>
                <!-- <button type="button" class="btn btn-primary btn-sm" id="">Guardar</button> -->
                <a class="btn btn-primary btn-sm " id="btnGuardarNuevorStock">Guardar</a>
            </div>

        </div>
    </div>
</div>

<!-- MODAL GENERAR CODIGO DE BARRA -->
<div class="modal fade" id="mdlGenerarcode" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header bg-gray py-2">
                <h6 class="modal-title" id="titulo_modal_code">Generar codigo de barras</h6>
                <button type="button" class="btn-close text-white fs-6" data-bs-dismiss="modal" aria-label="Close" id="btnCerrarModalcodB">
                </button>
            </div>

            <div class="modal-body">

                <div class="row">

                    <div class="col-12">
                        <div class="form-group mb-2">
                            <label class="" for="">
                                <span class="small">Codigo Producto</span>
                            </label>
                            <input type="text" class="form-control form-control-sm" id="text_cod_pro" disabled>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group mb-2">
                            <label for="" class="">
                                <span class="small">Talla</span>
                            </label>
                            <select name="" id="select_talla_cod_barra" class="form-select form-select-sm" aria-label=".form-select-sm example" required></select>
                            <!-- <input type="text"  class="form-control form-control-sm" id="text_id_talla_aumentar" >
                                      <input type="text"  class="form-control form-control-sm" id="text_nombre_talla_aumentar" >  -->

                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group mb-2">
                            <label class="" for="">
                                <span class="small">Fila</span>
                            </label>
                            <input type="number" min="0" max="10" class="form-control form-control-sm" id="text_can_cod_b" placeholder="Ingrese cantidad " value="1">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group mb-2">
                            <label class="" for="">
                                <span class="small">Columna</span>
                            </label>
                            <input type="number" min="0" max="4" class="form-control form-control-sm" id="text_columna" placeholder="Ingrese cantidad " value="1">
                        </div>
                    </div>


                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal" id="btnCancelarGenerarBarra">Cancelar</button>
                <a class="btn btn-primary btn-sm " id="btnGenerarCodeBarra">Generar</a>
            </div>

        </div>
    </div>
</div>

<!-- MODAL MODIFICAR FOTO AL PRODUCTO -->
<div class="modal fade" id="mdlmodificar_foto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header bg-gray py-2">
                <h6 class="modal-title" id="titulo_modal_code">Modificar foto del Producto</h6>
                <button type="button" class="btn-close text-white fs-6" data-bs-dismiss="modal" aria-label="Close" id="btnCerrarModalMod_foto">
                </button>
            </div>

            <div class="modal-body">

                <div class="row">

                    <div class="col-12">
                        <div class="form-group mb-2">
                            <label class="" for="">
                                <span class="small">Codigo Producto</span>
                            </label>
                            <input type="text" class="form-control form-control-sm" id="text_mod_cod_p" disabled>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group mb-2">
                            <label class="" for="">
                                <span class="small">Seleccione una imagen </span>

                            </label>
                            <input type="file" class="form-control form-control-sm" id="text_imagen_m" accept="image/*" onchange="previewFile2(this);"> <br>
                            <span class="small text-danger">Tamaño de imagen (250 x 250)</span>


                        </div>
                    </div>
                    <div class="col-12 col-lg-5">
                        <div style="width:100%; height:280px;">
                            <img id="previewImg_m" src="vistas/assets/imagenes/default.png" class="border border-secondary" style="objet-filt:cover; width:120%; height:100%;" alt="">

                        </div>

                    </div>
                    <input type="hidden" name="edit_foto" id="edit_foto_m">

                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal" id="btnCancelarMod_foto">Cancelar</button>
                <a class="btn btn-primary btn-sm " id="btnMod_foto_p">Actualizar</a>
            </div>

        </div>
    </div>
</div>

<!-- MODAL GENERAR CATALOGO DEL PRODUCTO -->
<div class="modal fade" id="mdlGenerarCatalogo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header bg-gray py-2">
                <h6 class="modal-title" id="titulo_modal_catalogo">Generar Catalogo por Categoria</h6>
                <button type="button" class="btn-close text-white fs-6" data-bs-dismiss="modal" aria-label="Close" id="btnCerrarModalcatalogo">
                </button>
            </div>

            <div class="modal-body">

                <div class="row">


                    <div class="col-md-12">
                        <div class="form-group mb-2">
                            <label for="" class="">
                                <span class="small">Categoria</span>
                            </label>
                            <select name="" id="select_categoria_cat" class="form-select form-select-sm" aria-label=".form-select-sm example" required></select>


                        </div>
                    </div>

                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal" id="btnCancelarGenerarCatalogo">Cancelar</button>
                <a class="btn btn-primary btn-sm " id="btnGenerarCatalogo">Generar</a>
            </div>

        </div>
    </div>
</div>



<script>
    var accion;
    var table, tbl_tallas_pro;
    var operacion_stock = 0; // permitar definir si vamos a sumar o restar al stock (1: sumar, 2:restar)

    /*===================================================================*/
    //INICIALIZAMOS EL MENSAJE DE TIPO TOAST (EMERGENTE EN LA PARTE SUPERIOR)
    /*===================================================================*/
    var Toast = Swal.mixin({
        toast: true,
        position: 'top',
        showConfirmButton: false,
        timer: 3000
    });

    $(document).ready(function() {





        /*===================================================================*/
        //SOLICITUD AJAX PARA CARGAR SELECT DE CATEGORIAS22
        /*===================================================================*/
        $.ajax({
            dataType: 'json',
            url: "ajax/categorias.ajax.php",
            dataSrc: "",
            type: "POST",
            data: {
                'accion': 2
            },
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(respuesta) {

                var options = '<option selected value="">Seleccione una categoria</option>';

                for (let index = 0; index < respuesta.length; index++) {
                    options = options + '<option value=' + respuesta[index][0] + '>' + respuesta[index][
                        1
                    ] + '</option>';
                }

                $("#selCategoriaReg").append(options);
            }
        });

        //SELECT DE CATALOGO DE PRODUCTOS
        $.ajax({
            dataType: 'json',
            url: "ajax/categorias.ajax.php",
            dataSrc: "",
            type: "POST",
            data: {
                'accion': 2
            },
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(respuesta) {

                var options = '<option selected value="">Seleccione una categoria</option>';

                for (let index = 0; index < respuesta.length; index++) {
                    options = options + '<option value=' + respuesta[index][0] + '>' + respuesta[index][
                        1
                    ] + '</option>';
                }

                $("#select_categoria_cat").append(options);
            }
        });

        /*===================================================================*/
        //SOLICITUD AJAX PARA CARGAR SELECT DE TALLAS
        /*===================================================================*/

        $.ajax({
            url: "ajax/talla_ajax.php",
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(respuesta) {

                var options = '<option selected value="">Seleccione una Talla</option>';

                for (let index = 0; index < respuesta.length; index++) {
                    options = options + '<option value=' + respuesta[index][0] + '>' + respuesta[index][1] + '</option>';

                }

                $("#select_talla").append(options);

            }
        });

        /*===================================================================*/
        //SOLICITUD AJAX PARA CARGAR SELECT DE UNIDAD DE MEDIDAS
        /*===================================================================*/
        $.ajax({
            url: "ajax/medida_ajax.php",
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(respuesta) {

                var options = '<option selected value="">Seleccione una Medida..</option>';

                for (let index = 0; index < respuesta.length; index++) {
                    options = options + '<option value=' + respuesta[index][0] + '>' + respuesta[index][1] + '</option>';

                }

                $("#select_medida").append(options);

            }
        });



        /*===================================================================*/
        // CARGA DEL LISTADO CON EL PLUGIN DATATABLE JS
        /*===================================================================*/
        table = $("#tbl_productos").DataTable({
            dom: 'Bfrtip',
            responsive: true,
            dom: 'Bfrtip',
            buttons: [{
                    "extend": 'excelHtml5',
                    "title": 'Reporte Productos',
                    "exportOptions": {
                        'columns': [1, 3, 4, 5, 6, 7, 8, 9, 10, 11, 14]
                    },
                    "text": '<i class="fa fa-file-excel"></i>',
                    "titleAttr": 'Exportar a Excel'
                },
                {
                    "extend": 'print',
                    "text": '<i class="fa fa-print"></i> ',
                    "titleAttr": 'Imprimir',
                    "exportOptions": {
                        'columns': [1, 3, 4, 5, 6, 7, 8, 9, 10, 11, 14]
                    },
                    "download": 'open'
                },
                'pageLength',
            ],
            pageLength: [5, 10, 15, 30, 50, 100],
            pageLength: 10,
            ajax: {
                url: "ajax/productos.ajax.php",
                dataSrc: '',
                type: "POST",
                data: {
                    'accion': 1 //1: LISTAR PRODUCTOS
                },
            },
            responsive: {
                details: {
                    type: 'column'
                }
            },
            columnDefs: [{
                    targets: 0,
                    orderable: false,
                    className: 'control'
                },
                {
                    targets: 2,
                    visible: false
                },
                {
                    targets: 7,
                    visible: false
                },
                {
                    targets: 8,
                    visible: false
                },
                {
                    targets: 9,
                    createdCell: function(td, cellData, rowData, row, col) {
                        if (parseInt(rowData[9]) <= parseInt(rowData[10])) {
                            $(td).parent().css('background', '#FF5733')
                            // $(td).parent().css('color', '#ffffff')
                        }
                    }
                },
                {
                    targets: 11,
                    visible: false
                },
                {
                    targets: 12,
                    visible: false
                },
                {
                    targets: 13,
                    visible: false
                },
                {
                    targets: 14,
                    //sortable: false,
                    createdCell: function(td, cellData, rowData, row, col) {

                        if (rowData[16] == "Activo") {
                            $(td).html("<span class='badge badge-success'>Activo</span>")
                        } else {
                            $(td).html("<span class='badge badge-danger'>Inactivo</span>")
                        }

                    }
                },

                {
                    targets: 15,
                    orderable: false,
                    render: function(data, type, full, meta) {
                        return "<center>" +
                            "<span class='btnEditarProducto text-primary px-1' style='cursor:pointer;'>" +
                            "<i class='fas fa-pencil-alt fs-5'></i>" +
                            "</span>" +
                            "<span class='btnAumentarStock text-success px-1' style='cursor:pointer;'>" +
                            "<i class='fas fa-plus-circle fs-5'></i>" +
                            "</span>" +
                            "<span class='btnDisminuirStock text-warning px-1' style='cursor:pointer;'>" +
                            "<i class='fas fa-minus-circle fs-5'></i>" +
                            "</span>" +
                            "<span class='btnEliminarProducto text-danger px-1' style='cursor:pointer;'>" +
                            "<i class='fas fa-trash fs-5'></i>" +
                            "</span>" +
                            "<span class='btnCambiarFoto text-secundary px-1' style='cursor:pointer;' title= 'Cambiar foto al producto'>" +
                            "<i class='fas fa-image fs-5'></i>" +
                            "</span>" +
                            "<span class='btnCode_barra text-info px-1' style='cursor:pointer;' title= 'Generar Codigo de barras'>" +
                            "<i class='fas fa-barcode fs-5'></i>" +
                            "</span>" +
                            // "<div class='btn-group mb-1'>"+
                            //     "<div class='dropdown'>"+
                            //          "<button type='button' class='btn btn-primary btn-sm dropdown-toggle' data-bs-toggle='dropdown' aria-haspopup='true' aria-expanded='false'> Opciones</button>"+
                            //             "<div class='dropdown-menu' style=''>"+
                            //             "<a class='dropdown-item' href='../reportes/printbarcode.php?codigopr=ALCOHOL9888&amp;st=94.00&amp;pr=90.00'>Código de barra</a>"+
                            //             " <a class='dropdown-item' onclick='mostrar(62)'>Editar artículo</a>"+
                            //             "<a class='dropdown-item' onclick='desactivar(62)'>Desactivar articulo</a>"+
                            //             "</div>"+
                            //             "</div>"+
                            //             "</div>"+
                            // "<span class='btnCatalogo text-success px-1' style='cursor:pointer;' title= 'Generar Catalogo'>" +
                            // "<i class='fas fa-book  fs-5'></i>" +
                            // "</span>" +
                            "</center>"
                    }
                }

            ],
            "language": idioma_espanol,
            select: true
        });



        //AVITAR DECIMALES
        $('#text_stock_talla_pro').on('input', function() {
            this.value = this.value.replace(/[^0-9,]/g, '').replace(/,/g, '.');
        });

        $('#iptMinimoStockReg').on('input', function() {
            this.value = this.value.replace(/[^0-9,]/g, '').replace(/,/g, '.');
        });


        /*===================================================================*/
        // INSERTAR TALLAS EN EL DATATABLE
        /*===================================================================*/
        $("#btnagregar_t").on('click', function() {
            //var id_talla = $("#text_id_talla").val();
            let id_talla = document.getElementById('text_id_talla').value;
            var talla = $("#text_nombre_talla").val();
            var stock = $("#text_stock_talla_pro").val();
            //console.log(id_talla);

            if (id_talla == 0) {
                Toast.fire({
                    icon: 'warning',
                    title: 'Seleccione una talla'
                });
                $("#select_talla").focus();
            } else if (stock == 0) {
                Toast.fire({
                    icon: 'warning',
                    title: 'Ingrese stock para esa talla'
                });
                $("#text_stock_talla_pro").focus();
            } else if (verificarid(id_talla)) {
                Toast.fire({
                    icon: 'warning',
                    title: 'La talla ya esta Agregada'
                });
            } else {
                var cant1 = 0;
                let datos_agregar = "<tr>"; //para agregar en el detalle DEL EXAMEN
                datos_agregar += "<td for='id'>" + id_talla + "</td>"; //hace referenci al verificar id
                datos_agregar += "<td> " + talla + "</td>";
                datos_agregar += "<td class='subtotal'>" + stock + "</td>";
                datos_agregar +=
                    "<td><button class='btn btn-danger btn-sm remove2'  ><i class ='fa fa-trash'></i> </button></td>";
                datos_agregar += "</tr>"; //cierre de etiqueta
                cant1 = parseFloat(cant1) + parseFloat(stock);
                $("#tbody_tabla_detalle_pro").append(
                    datos_agregar); //agregamos a la tabla style="text-align: center;"
                $("#select_talla").val("");
                $("#text_stock_talla_pro").val("");
                $("#text_nombre_talla").val("");
                $("#text_id_talla").val("");
                sumar_columnas();



            }

        })


        /*===================================================================*/
        // INSERTAR TALLAS EN EL DATATABLE
        /*===================================================================*/
        $("#btnInsert_t").on('click', function() {
            accion = 13; //seteamos la accion para insertar nuevas tallas

            let id_talla_ins = document.getElementById('text_id_talla').value;
            let cod_barra_ins = document.getElementById('iptCodigoReg').value;
            var talla_ins = $("#text_nombre_talla").val();
            var stock_ins = $("#text_stock_talla_pro").val();


            if (id_talla_ins == 0) {
                Toast.fire({
                    icon: 'warning',
                    title: 'Seleccione una talla'
                });
                $("#select_talla").focus();
            } else if (verificarid(id_talla_ins)) {
                Toast.fire({
                    icon: 'warning',
                    title: 'La talla ya esta Agregada'
                });
            } else {

                Swal.fire({
                    title: 'Esta seguro de Insertar la nueva talla al producto?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, deseo Insertar!',
                    cancelButtonText: 'Cancelar',
                }).then((result) => {

                    if (result.isConfirmed) {

                        var datos = new FormData();

                        datos.append("accion", accion);
                        datos.append("codigo_producto", cod_barra_ins); //jalamos el codigo que declaramos mas arriba
                        datos.append("id_talla", id_talla_ins);


                        $.ajax({
                            url: "ajax/productos.ajax.php",
                            method: "POST",
                            data: datos, //enviamos lo de la variable datos
                            cache: false,
                            contentType: false,
                            processData: false,
                            dataType: 'json',
                            success: function(respuesta) {
                                //console.log(respuesta);

                                if (respuesta > 0) {
                                    if (respuesta == 1) { //validamos la respuesta del procedure si retorna 1 o 2
                                        Toast.fire({
                                            icon: 'success',
                                            title: 'Talla insertada'
                                        });

                                        var cant1 = 0;
                                        let datos_agregar = "<tr>"; //para agregar en el detalle DEL EXAMEN
                                        datos_agregar += "<td for='id'>" + id_talla_ins + "</td>"; //hace referenci al verificar id
                                        datos_agregar += "<td> " + talla_ins + "</td>";
                                        datos_agregar += "<td class='subtotal'>" + stock_ins + "</td>";
                                        datos_agregar +=
                                            "<td><button class='btn btn-danger btn-sm remove2'  ><i class ='fa fa-trash'></i> </button></td>";
                                        datos_agregar += "</tr>"; //cierre de etiqueta
                                        cant1 = parseFloat(cant1) + parseFloat(stock_ins);
                                        $("#tbody_tabla_detalle_pro").append(
                                            datos_agregar); //agregamos a la tabla style="text-align: center;"
                                        $("#select_talla").val("");
                                        $("#text_stock_talla_pro").val("");
                                        $("#text_nombre_talla").val("");
                                        $("#text_id_talla").val("");

                                        // tbl_tallas_pro.ajax.reload(); //recargamos el datatable

                                    } else {
                                        Toast.fire({
                                            icon: 'warning',
                                            title: 'Talla ya esta registrada para este producto'
                                        });
                                    }

                                } else {
                                    Toast.fire({
                                        icon: 'error',
                                        title: 'No se puede insertar la talla'

                                    });
                                }

                            }
                        });

                    }
                })

            }

        })


        /*===================================================================*/
        //ELIMINAR ITEM TALLA DEL DATATABLE
        /*===================================================================*/
        $('#tbody_tabla_detalle_pro').on('click', '.remove2', function() { //
            Swal.fire({
                title: 'Esta seguro de eliminar',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, deseo eliminarlo!',
                cancelButtonText: 'Cancelar',
            }).then((result) => {

                if (result.isConfirmed) {
                    remove(this);
                }
            })
        });





        /*===================================================================*/
        // EVENTOS PARA CRITERIOS DE BUSQUEDA (CODIGO, CATEGORIA Y PRODUCTO)
        /*===================================================================*/
        $("#iptCodigoBarras").keyup(function() {
            table.column($(this).data('index')).search(this.value).draw();
        })

        $("#iptCategoria").keyup(function() {
            table.column($(this).data('index')).search(this.value).draw();
        })

        $("#iptProducto").keyup(function() {
            table.column($(this).data('index')).search(this.value).draw();
        })

        /*===================================================================*/
        // EVENTOS PARA CRITERIOS DE BUSQUEDA POR RANGO (PREVIO VENTA)
        /*===================================================================*/
        $("#iptPrecioVentaDesde, #iptPrecioVentaHasta").keyup(function() {
            table.draw();
        })

        $.fn.dataTable.ext.search.push(

            function(settings, data, dataIndex) {

                var precioDesde = parseFloat($("#iptPrecioVentaDesde").val());
                var precioHasta = parseFloat($("#iptPrecioVentaHasta").val());

                var col_venta = parseFloat(data[6]);

                if ((isNaN(precioDesde) && isNaN(precioHasta)) ||
                    (isNaN(precioDesde) && col_venta <= precioHasta) ||
                    (precioDesde <= col_venta && isNaN(precioHasta)) ||
                    (precioDesde <= col_venta && col_venta <= precioHasta)) {
                    return true;
                }

                return false;
            }
        )

        /*===================================================================*/
        // EVENTO PARA LIMPIAR INPUTS DE CRITERIOS DE BUSQUEDA
        /*===================================================================*/
        $("#btnLimpiarBusqueda").on('click', function() {

            $("#iptCodigoBarras").val('')
            $("#iptCategoria").val('')
            $("#iptProducto").val('')
            $("#iptPrecioVentaDesde").val('')
            $("#iptPrecioVentaHasta").val('')

            table.search('').columns().search('').draw();
        })

        //  CERRAR MODAL O HACER CLICK EN CANCELAR 
        $("#btnCancelarRegistro, #btnCerrarModal").on('click', function() {

            $("#iptCodigoReg").val("");
            $("#selCategoriaReg").val("");
            $("#iptDescripcionReg").val("");
            $("#iptPrecioCompraReg").val("");
            $("#iptPrecioVentaReg").val("");
            $("#iptPrecioVentaMayorReg").val("");
            $("#iptPrecioVentaOfertaReg").val("");
            $("#iptStockReg").val("");
            $("#iptMinimoStockReg").val("");
            $("#select_talla").val("");
            $("#select_medida").val("");

        })

        //  CERRAR MODAL O HACER CLICK EN CANCELAR 
        $("#btnCancelarGenerarBarra, #btnCerrarModalcodB").on('click', function() {
            $("#text_cod_pro").val("");
            $("#text_can_cod_b").val("");
            $("#text_columna").val("");

            //RESETAMOS EL SELECT
            var selectElement = document.getElementById("select_talla_cod_barra");

            while (selectElement.length > 0) {
                selectElement.remove(0);
            }

        })



        /* ======================================================================================
        //ENVIAR STOCK A TEXBOX CUANDO SELECCIONE LA TALLA - AUMENTAR STOCK
        =========================================================================================*/
        $("#select_talla_aumentar").change(function() {
            var mData = this.options[this.selectedIndex].dataset;
            // console.log(mData);
            var lstock = document.getElementById('text_stock_tallas_aumentar');
            var lstock2 = document.getElementById('textSuma_stock');
            lstock.value = mData.stock;
            lstock2.value = mData.stock;
            $("#iptStockSumar").prop('disabled', false);

        })

        /* ======================================================================================
   //GENERAR CODIGO DE BARRA
    =========================================================================================*/
        $("#btnGenerarCodeBarra").on('click', function() {
            var cod_b = $("#text_cod_pro").val();
            var fila = $("#text_can_cod_b").val();
            var id_t = $("#select_talla_cod_barra").val();
            var col = $("#text_columna").val();
            // console.log(id_t)

            if (fila == 0) {
                Toast.fire({
                    icon: 'warning',
                    title: 'Debe ingresar una cantidad mayor a 0'
                });
                $("#text_can_cod_b").focus();
                //return false;

            } else if (id_t == 0) {
                Toast.fire({
                    icon: 'warning',
                    title: 'Debe seleccionar una talla'
                });
                $("#select_talla_cod_barra").focus();
                //return false;

            } else if (col == 0) {
                Toast.fire({
                    icon: 'warning',
                    title: 'Debe ingresar una cantidad mayor a 0'
                });
                $("#text_columna").focus();
                //return false;

            } else if (parseInt(col) < 1) {
                Toast.fire({
                    icon: 'warning',
                    title: 'Debe ingresar una cantidad mayor a 0'
                });
                $("#text_columna").focus();


            } else if (parseInt(fila) < 1) {
                Toast.fire({
                    icon: 'warning',
                    title: 'Debe ingresar una cantidad mayor a 0'
                });
                $("#text_can_cod_b").focus();


            } else {
                window.open("MPDF/reporte_codigo_barras2.php?codigo=" + parseInt(cod_b) + "&contador=" +parseInt(fila) + "&idtalla=" + parseInt(id_t) + "&columna=" + parseInt(col) +"#zoom=90", "Generar codigo de barras", "scrollbards=NO");

                //window.open("MPDF/ticket_pago_cuota.php?codigo=" + data[1] + "&cuota=" + data[2] + "#zoom=100", "Recibo de Pago ", "scrollbards=NO");

            }


        })

        /* ======================================================================================
   //GENERAR CATALOGO
    =========================================================================================*/
        $("#btnGenerarCatalogo").on('click', function() {

            var id_categ = $("#select_categoria_cat").val();

            if (id_categ == 0) {
                Toast.fire({
                    icon: 'warning',
                    title: 'Seleccione una categoria'
                });
                $("#select_categoria_cat").focus();
                //return false;

            } else {
                window.open("MPDF/catalogo.php?categoria=" + parseInt(id_categ) + "#zoom=90", "Catalogo por categoria", "scrollbards=NO");

                //window.open("MPDF/ticket_pago_cuota.php?codigo=" + data[1] + "&cuota=" + data[2] + "#zoom=100", "Recibo de Pago ", "scrollbards=NO");

            }


        })

        /* ======================================================================================
   //GENERAR CATALOGO - ABRIR MODAL
    =========================================================================================*/
        $('.btnCatalogo').on('click', function() {

            // operacion_stock = 1; //sumar stock
            // accion = 3;
            $("#mdlGenerarCatalogo").modal({
                backdrop: 'static',
                keyboard: false
            });

            $("#mdlGenerarCatalogo").modal('show'); //MOSTRAR VENTANA MODAL



        })

        /* ======================================================================================
        EVENTO AL DAR CLICK EN EL BOTON GENERAR CODIGO DE BARRA
        =========================================================================================*/
        $('#tbl_productos tbody').on('click', '.btnCode_barra', function() {

            // operacion_stock = 1; //sumar stock
            // accion = 3;
            $("#mdlGenerarcode").modal({
                backdrop: 'static',
                keyboard: false
            });

            $("#mdlGenerarcode").modal('show'); //MOSTRAR VENTANA MODAL

            var data = table.row($(this).parents('tr')).data(); //OBTENER EL ARRAY CON LOS DATOS DE CADA COLUMNA DEL DATATABLE
            // console.log(data);
            $("#text_can_cod_b").val("1");
            $("#text_columna").val("1");

            $("#text_cod_pro").val(data[1]); //CODIGO DEL PRODUCTO DEL DATATABLE


            SelectTallaCodBarra(data[1]);


        })

        /* ======================================================================================
       EVENTO AL DAR CLICK EN EL BOTON AUMENTAR STOCK
      =========================================================================================*/
        $('#tbl_productos tbody').on('click', '.btnAumentarStock', function() {

            operacion_stock = 1; //sumar stock
            accion = 3;
            $("#mdlGestionarStock").modal({
                backdrop: 'static',
                keyboard: false
            });

            $("#mdlGestionarStock").modal('show'); //MOSTRAR VENTANA MODAL

            $("#titulo_modal_stock").html('Aumentar Stock'); // CAMBIAR EL TITULO DE LA VENTANA MODAL
            $("#titulo_modal_label").html(
                'Agregar al Stock'); // CAMBIAR EL TEXTO DEL LABEL DEL INPUT PARA INGRESO DE STOCK
            $("#iptStockSumar").attr("placeholder",
                "Ingrese cantidad a agregar al Stock"); //CAMBIAR EL PLACEHOLDER 

            //var data = table.row($(this).parents('tr')).data(); //OBTENER EL ARRAY CON LOS DATOS DE CADA COLUMNA DEL DATATABLE
            if (table.row(this).child.isShown()) {
                var data = table.row(this).data();
            } else {
                var data = table.row($(this).parents('tr')).data();
            }

            $("#iptStockSumar").prop('disabled', true);
            $("#text_stock_tallas_aumentar").prop('disabled', true);
            $("#stock_codigoProducto").html(data[1]) //CODIGO DEL PRODUCTO DEL DATATABLE
            $("#stock_Producto").html(data[4]) //NOMBRE DEL PRODUCTO DEL DATATABLE
            $("#stock_Stock").html(data[9]) //STOCK ACTUAL DEL PRODUCTO DEL DATATABLE

            $("#stock_NuevoStock").html(parseFloat($("#stock_Stock").html()));
            SelectTallasPorCodigoP(data[1]);
            // console.log(data);

        })

        /* ======================================================================================
        EVENTO AL DAR CLICK EN EL BOTON DISMINUIR STOCK
        =========================================================================================*/
        $('#tbl_productos tbody').on('click', '.btnDisminuirStock', function() {

            operacion_stock = 2; //restar stock
            accion = 3;
            $("#mdlGestionarStock").modal('show'); //MOSTRAR VENTANA MODAL

            $("#titulo_modal_stock").html('Disminuir Stock'); // CAMBIAR EL TITULO DE LA VENTANA MODAL
            $("#titulo_modal_label").html(
                'Disminuir al Stock'); // CAMBIAR EL TEXTO DEL LABEL DEL INPUT PARA INGRESO DE STOCK
            $("#iptStockSumar").attr("placeholder",
                "Ingrese cantidad a disminuir al Stock"); //CAMBIAR EL PLACEHOLDER 


            // var data = table.row($(this).parents('tr')).data(); //OBTENER EL ARRAY CON LOS DATOS DE CADA COLUMNA DEL DATATABLE
            if (table.row(this).child.isShown()) {
                var data = table.row(this).data();
            } else {
                var data = table.row($(this).parents('tr')).data();
            }

            $("#text_stock_tallas_aumentar").prop('disabled', true);
            $("#stock_codigoProducto").html(data[1]) //CODIGO DEL PRODUCTO DEL DATATABLE
            $("#stock_Producto").html(data[4]) //NOMBRE DEL PRODUCTO DEL DATATABLE
            $("#stock_Stock").html(data[9]) //STOCK ACTUAL DEL PRODUCTO DEL DATATABLE

            $("#stock_NuevoStock").html(parseFloat($("#stock_Stock").html()));
            SelectTallasPorCodigoP(data[1]);

        })

        /* ======================================================================================
        EVENTO QUE LIMPIA EL INPUT DE INGRESO DE STOCK AL CERRAR LA VENTANA MODAL
        =========================================================================================*/
        $("#btnCancelarRegistroStock, #btnCerrarModalStock").on('click', function() {
            $("#iptStockSumar").val("");
            $("#text_stock_tallas_aumentar").val("");
            $("#textSuma_stock").val("");

            //RESET DEL SELECT TALLAS POR CODIGO
            reseteodeSelect();

        })

        $("#btnCancelarGenerarCatalogo, #btnCerrarModalcatalogo").on('click', function() {
            $("#select_categoria_cat").val("");

        })



        /* ======================================================================================
        EVENTO AL DIGITAR LA CANTIDAD A AUMENTAR O DISMINUIR DEL STOCK
        =========================================================================================*/
        $("#iptStockSumar").keyup(function() {
            if (operacion_stock == 1) {
                if ($("#iptStockSumar").val() != "" && $("#iptStockSumar").val() > 0) {

                    var stockActual = parseFloat($("#stock_Stock").html());
                    var cantidadAgregar = parseFloat($("#iptStockSumar").val());
                    var stocktalla = parseFloat($("#text_stock_tallas_aumentar").val());
                    var stocktallaActual = parseFloat($("#textSuma_stock").val());


                    $("#stock_NuevoStock").html(stockActual + cantidadAgregar);
                    $("#text_stock_tallas_aumentar").val(stocktallaActual + cantidadAgregar)

                } else {

                    Toast.fire({
                        icon: 'warning',
                        title: 'Ingrese un valor mayor a 0'
                    });

                    $("#iptStockSumar").val("")
                    $("#text_stock_tallas_aumentar").val("");
                    $("#stock_NuevoStock").html(parseFloat($("#stock_Stock").html()));
                    $("#select_talla_aumentar").val("");
                    $("#textSuma_stock").val("");
                    $("#iptStockSumar").prop('disabled', true); //deshabilitamos
                    $("#select_talla_aumentar").focus();
                }

            } else {

                if ($("#iptStockSumar").val() != "" && $("#iptStockSumar").val() > 0) {

                    var stockActual = parseFloat($("#stock_Stock").html());
                    var cantidadAgregar = parseFloat($("#iptStockSumar").val());
                    var stocktalla = parseFloat($("#text_stock_tallas_aumentar").val());
                    var stocktallaActual = parseFloat($("#textSuma_stock").val());


                    $("#stock_NuevoStock").html(stockActual - cantidadAgregar);
                    $("#text_stock_tallas_aumentar").val(stocktallaActual - cantidadAgregar)

                    if (parseInt($("#stock_NuevoStock").html()) < 0) {

                        Toast.fire({
                            icon: 'warning',
                            title: 'La cantidad a disminuir no puede ser mayor al stock actual (Nuevo stock < 0)'
                        });

                        $("#iptStockSumar").val("")
                        $("#text_stock_tallas_aumentar").val("");
                        $("#stock_NuevoStock").html(parseFloat($("#stock_Stock").html()));
                        $("#select_talla_aumentar").val("");
                        $("#textSuma_stock").val("");
                        $("#iptStockSumar").prop('disabled', true); //deshabilitamos
                        $("#select_talla_aumentar").focus();
                    }
                } else {

                    Toast.fire({
                        icon: 'warning',
                        title: 'Ingrese un valor mayor a 0'
                    });

                    $("#iptStockSumar").val("")
                    $("#stock_NuevoStock").html(parseFloat($("#stock_Stock").html()));
                }
            }

        })

        /* ======================================================================================
        EVENTO QUE REGISTRA EN BD EL AUMENTO O DISMINUCION DE STOCK
        =========================================================================================*/
        $("#btnGuardarNuevorStock").on('click', function() {

            if ($("#iptStockSumar").val() != "" && $("#iptStockSumar").val() > 0) {

                var nuevoStock = parseFloat($("#stock_NuevoStock").html()),
                    codigo_producto = $("#stock_codigoProducto").html()
                id_talla = $("#select_talla_aumentar").val(),
                    stock_talla = $("#text_stock_tallas_aumentar").val();
                //console.log(id_talla);

                var datos = new FormData();

                datos.append('accion', accion);
                datos.append('nuevoStock', nuevoStock);
                datos.append('codigo_producto', codigo_producto);
                datos.append('tipo_movimiento', operacion_stock);
                datos.append('cant_stock', $("#iptStockSumar").val());
                datos.append("id_talla", id_talla);
                // datos.append("stock", stock_talla);

                $.ajax({
                    url: "ajax/productos.ajax.php",
                    method: "POST",
                    data: datos,
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    success: function(respuesta) {

                        $("#stock_NuevoStock").html("");
                        $("#iptStockSumar").val("");

                        reseteodeSelect();
                        $("#text_stock_tallas_aumentar").val("");
                        $("#textSuma_stock").val("");



                        $("#mdlGestionarStock").modal('hide');

                        table.ajax.reload();
                        Notificaciones();

                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Se actualizo el stock correctamente.!',
                            showConfirmButton: false,
                            timer: 1500
                        })



                    }
                });

            } else {
                Toast.fire({
                    icon: 'warning',
                    title: 'Debe ingresar la cantidad a aumentar'
                });

                //mensajeToast('error', 'Debe ingresar la cantidad a aumentar');

                return false;
            }

        })

        /* ======================================================================================
        EVENTO AL DAR CLICK EN EL BOTON EDITAR PRODUCTO
        =========================================================================================*/
        $('#tbl_productos tbody').on('click', '.btnEditarProducto', function() {

            accion = 4; //seteamos la accion para editar
            $("#mdlGestionarProducto").modal({
                backdrop: 'static',
                keyboard: false
            });

            $("#mdlGestionarProducto").modal('show');
            $("#titulo_modal_p").html('Actualizar Productos');
            $("#btnGuardarProducto").html('Actualizar');
            titulo_modal = "Actualizar";

            var data = ($(this).parents('tr').hasClass('child')) ?
                table.row($(this).parents().prev('tr')).data() :
                table.row($(this).parents('tr')).data();

            // if (tbl_clientes.row(this).child.isShown()) {
            //       var data = tbl_clientes.row(this).data();
            //   } else {
            //       var data = tbl_clientes.row($(this).parents('tr')).data(); 
            //   }

            // console.log(data);



            $("#iptStockReg").prop('disabled', true);
            $("#iptCodigoReg").prop('disabled', true);
            $("#esta").prop('hidden', false);
            $("#vacio").prop('hidden', true);
            $("#btnagregar_t").prop('hidden', true);
            $("#btnInsert_t").prop('hidden', false);

            $("#add_imagen").prop('hidden', true);

            //$("#select_talla").prop('disabled', true);
            $("#text_stock_talla_pro").prop('disabled', true);
            $("#btnagregar_t").prop('disabled', true);


            $("#iptCodigoReg").val(data["codigo_producto"]);
            $("#selCategoriaReg").val(data[2]);
            $("#iptDescripcionReg").val(data[4]);
            $("#iptPrecioCompraReg").val(data[5]);
            $("#iptPrecioVentaReg").val(data[6]);
            $("#iptPrecioVentaMayorReg").val(data[7]);
            $("#iptPrecioVentaOfertaReg").val(data[8]);
            $("#iptStockReg").val(data[20]);
            $("#iptMinimoStockReg").val(data[21]);


            $("#selEstado").val(data[16]);
            //$("#select_talla").val(data[17]);
            $("#select_medida").val(data[17]);

            Traer_Detalle(data["codigo_producto"]);

        })

        /* ======================================================================================
        EVENTO AL DAR CLICK EN EL BOTON EDITAR PRODUCTO
        =========================================================================================*/
        $('#tbl_productos tbody').on('click', '.btnCambiarFoto', function() {


            $("#mdlmodificar_foto").modal({
                backdrop: 'static',
                keyboard: false
            });

            $("#mdlmodificar_foto").modal('show');


            var data = ($(this).parents('tr').hasClass('child')) ?
                table.row($(this).parents().prev('tr')).data() :
                table.row($(this).parents('tr')).data();


            var imagen = data["imagen_p"];
            // console.log(data);

            $("#text_mod_cod_p").val(data["codigo_producto"]);


            if (imagen != "") {
                $("#edit_foto_m").val(imagen);
                $("#previewImg_m").attr('src', 'vistas/assets/imagenes/productos/' + imagen);
            } else {
                $("#edit_foto_m").val("default.png");
                $("#previewImg_m").attr('src', 'vistas/assets/imagenes/default.png');
            }

            if (imagen == null) {
                imagen = "default.png"; // o "" para asignar una cadena vacía
                $("#previewImg_m").attr('src', 'vistas/assets/imagenes/productos/' + imagen);
                return false;
            }


        })

        /* ======================================================================================
        ACTUALIZAR IMAGEN DEL PRODUCTO
        =========================================================================================*/
        $("#btnMod_foto_p").on('click', function() {
            accion = 12; //PARA GUARDA LA IMAGEN

            var cod_pro = $("#text_mod_cod_p").val();
            // console.log(cod_pro);
            const inputImage = document.querySelector('#text_imagen_m');

            Swal.fire({
                title: 'Está seguro de Actualizar la imagen el producto?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Actualizar!',
                cancelButtonText: 'Cancelar',
            }).then((result) => {

                if (result.isConfirmed) {

                    var datos = new FormData();

                    datos.append("accion", accion);
                    datos.append("codigo_producto", cod_pro);
                    datos.append('archivo[]', inputImage.files[0]);


                    $.ajax({
                        url: "ajax/productos.ajax.php",
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
                                    title: 'Foto Actualizada del producto '
                                    // title: titulo_msj
                                });

                                $("#mdlmodificar_foto").modal('hide');
                                table.ajax.reload(); //recargamos el datatable
                                $("#text_imagen_m").val("");


                            } else {
                                Toast.fire({
                                    icon: 'error',
                                    title: 'No se puede Actualizar'
                                });
                            }

                        }
                    });

                }
            })


        })

        /* ======================================================================================
        EVENTO AL DAR CLICK EN EL BOTON ELIMINAR PRODUCTO
        =========================================================================================*/
        $("#tbl_productos tbody").on('click', '.btnEliminarProducto', function() {

            accion = 5; //seteamos la accion para editar

            if (table.row(this).child.isShown()) {
                var data = table.row(this).data();
            } else {
                var data = table.row($(this).parents('tr'))
                    .data(); //OBTENER EL ARRAY CON LOS DATOS DE CADA COLUMNA DEL DATATABLE
                //   console.log("🚀 ~ file: productos.php ~ line 751 ~ $ ~ data", data);
            }

            var codigo_producto = data["codigo_producto"];

            Swal.fire({
                title: 'Está seguro de Eliminar el producto?',
                icon: 'warning',
                showCancelButton: true,
               confirmButtonText: 'Si, deseo Eliminarlo!',
                cancelButtonText: 'Cancelar',
            }).then((result) => {

                if (result.isConfirmed) {

                    var datos = new FormData();

                    datos.append("accion", accion);
                    datos.append("codigo_producto", codigo_producto); //jalamos el codigo que declaramos mas arriba


                    $.ajax({
                        url: "ajax/productos.ajax.php",
                        method: "POST",
                        data: datos, //enviamos lo de la variable datos
                        cache: false,
                        contentType: false,
                        processData: false,
                        dataType: 'json',
                        success: function(respuesta) {
                            console.log(respuesta);

                            if (respuesta > 0) {
                                if (respuesta == 1) { 
                                    Toast.fire({
                                        icon: 'success',
                                        title: 'EL ARTICULO SE ELIMINO CORRECTAMENTE'
                                    });

                                    table.ajax.reload(); 
                                  

                                } else {
                                    Toast.fire({
                                        icon: 'warning',
                                        title: 'EL ARTICULO YA TIENE MOVIMIENTOS'
                                    });
                                   
                                }

                            } else {
                                Toast.fire({
                                    icon: 'error',
                                    title: 'NO SE PUDO ELIMINAR EL ARTICULO'

                                });
                            }

                            /* if (respuesta == "ok") {

                                 Toast.fire({
                                     icon: 'success',
                                     title: 'El producto se Elimino de forma correcta'
                                     // title: titulo_msj
                                 });

                                 table.ajax.reload(); //recargamos el datatable

                             } else {
                                 Toast.fire({
                                     icon: 'error',
                                     title: 'El producto no se pudo Eliminar porque ya tiene movimientos'
                                 });
                             }*/

                        }
                    });

                }
            })

        })


    });

    /*===================================================================*/
    //DUPLICADO DE CODIGOS
    /*===================================================================*/
    $("#iptCodigoReg").change(function() {

        var codigo_producto = $("#iptCodigoReg").val();

        // console.log(codBarra);
        $.ajax({
            async: false,
            url: "ajax/productos.ajax.php",
            method: "POST",
            data: {
                'accion': 9,
                'codigo_producto': codigo_producto
                //  'cantidad_a_comprar': cantidad
            },

            dataType: 'json',
            success: function(respuesta) {
                //console.log(respuesta);
                if (parseInt(respuesta['ex']) > 0) {
                    Toast.fire({
                        icon: 'error',
                        title: ' El codigo ' + codigo_producto + '  ya se encuentra registrado'
                    })

                    $("#iptCodigoReg").val("");
                    $("#iptCodigoReg").focus();

                } else {
                    // console.log('');
                }
            }
        });

    })



    /*===================================================================*/
    //EVENTO QUE GUARDA LOS DATOS DEL PRODUCTO, PREVIA VALIDACION DEL INGRESO DE LOS DATOS OBLIGATORIOS
    /*===================================================================*/
    document.getElementById("btnGuardarProducto").addEventListener("click", function() {
        var count = 0;
        var imagen_valida = true;
        var codigo = $("#iptCodigoReg").val();
        var categoria = $("#selCategoriaReg").val();
        var descripcion = $("#iptDescripcionReg").val();
        var medida = $("#select_medida").val();
        var pcompra = $("#iptPrecioCompraReg").val();
        var pventa = $("#iptPrecioVentaReg").val();
        var min_stock = $("#iptMinimoStockReg").val();
        var stock = $("#iptStockReg").val();
        var pr_mayor = $("#iptPrecioVentaMayorReg").val();
        var pr_oferta = $("#iptPrecioVentaOfertaReg").val();

        /*CONTADOR PARA QUE EL DETALLE NO ESTE VACIO*/
        $("#tbl_tallas_pro  tbody  tr ").each(function(i, e) {
            count = count + 1; //cuenta las filas 
        })


        if (codigo == 0) {
            Toast.fire({
                icon: 'warning',
                title: 'Ingrese un Codigo del Producto'
            });
            $("#iptCodigoReg").focus();
        } else if (categoria == 0) {
            Toast.fire({
                icon: 'warning',
                title: 'Ingrese una Categoria del Producto'
            });
            $("#selCategoriaReg").focus();
        } else if (descripcion == 0) {
            Toast.fire({
                icon: 'warning',
                title: 'Ingrese una Descripcion del Producto'
            });
            $("#iptDescripcionReg").focus();
        } else if (medida == 0) {
            Toast.fire({
                icon: 'warning',
                title: 'Ingrese una Medida del Producto'
            });
            $("#select_medida").focus();
        } else if (pcompra == 0) {
            Toast.fire({
                icon: 'warning',
                title: 'Ingrese un Precio de compra del Producto'
            });
            $("#iptPrecioCompraReg").focus();
        } else if (pventa == 0) {
            Toast.fire({
                icon: 'warning',
                title: 'Ingrese un Precio de Venta del Producto'
            });
            $("#iptPrecioVentaReg").focus();
        } else if (min_stock == 0) {
            Toast.fire({
                icon: 'warning',
                title: 'Ingrese el minimo stock del Producto'
            });
            $("#iptMinimoStockReg").focus();
        } else if (stock == 0) {
            Toast.fire({
                icon: 'warning',
                title: 'Ingrese el stock del Producto'
            });
            $("#iptStockReg").focus();
        } else if (parseInt(min_stock) < 1) {
            Toast.fire({
                icon: 'warning',
                title: 'El minimo stock debe ser mayor a 0'
            });
            $("#iptMinimoStockReg").focus();
        } else if (parseInt(pcompra) < 1) {
            Toast.fire({
                icon: 'warning',
                title: 'El precio de compra debe ser mayor a 0'
            });
            $("#iptPrecioCompraReg").focus();
        } else if (parseInt(pventa) < 1) {
            Toast.fire({
                icon: 'warning',
                title: 'El precio de Venta debe ser mayor a 0'
            });
            $("#iptPrecioVentaReg").focus();
        } else if (!$.isNumeric(pr_mayor)) {
            Toast.fire({
                icon: 'error',
                title: 'INGRESE UN VALOR NUMERICO Y MAYOR A 0'
            });
            $("#iptPrecioVentaMayorReg").focus();
        } else if (count > 0) {

            Swal.fire({
                title: 'Esta seguro de ' + titulo_modal + ' el producto?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, deseo ' + titulo_modal + '!',
                cancelButtonText: 'Cancelar',
            }).then((result) => {

                if (result.isConfirmed) {
                    var datos = new FormData();

                    datos.append("accion", accion);
                    datos.append("codigo_producto", $("#iptCodigoReg").val()); //codigo_producto
                    datos.append("id_categoria_producto", $("#selCategoriaReg")
                        .val()); //id_categoria_producto
                    datos.append("descripcion_producto", $("#iptDescripcionReg")
                        .val()); //descripcion_producto
                    datos.append("precio_compra_producto", $("#iptPrecioCompraReg")
                        .val()); //precio_compra_producto
                    datos.append("precio_venta_producto", $("#iptPrecioVentaReg")
                        .val()); //precio_venta_producto
                    datos.append("precio_mayor_producto", $("#iptPrecioVentaMayorReg").val());
                    datos.append("precio_oferta_producto", $("#iptPrecioVentaOfertaReg").val());
                    datos.append("stock_producto", $("#iptStockReg").val());
                    datos.append("minimo_stock_producto", $("#iptMinimoStockReg").val());
                    datos.append("ventas_producto", 0);
                    datos.append("estado", $("#selEstado").val());
                    datos.append("id_medida", $("#select_medida").val());
                    // datos.append('archivo[]', inputImage.files[0]);



                    if (accion == 2) {
                        var titulo_msj = "El producto se registro correctamente"
                        RegistrarDetalle(); //REGISTRAR EL DETALLE DE LAS TALLAS
                    }

                    if (accion == 4) {
                        var titulo_msj = "El producto se actualizo correctamente"
                    }


                    $.ajax({
                        url: "ajax/productos.ajax.php",
                        method: "POST",
                        // data: {
                        //     'accion' : accion,
                        //     'detalle_producto': $("#frm-datos-producto").serialize()
                        // },
                        data: datos, //enviamos lo de la variable datos
                        cache: false,
                        contentType: false,
                        processData: false,
                        dataType: 'json',
                        success: function(respuesta) {

                            if (respuesta == "ok") {

                                Toast.fire({
                                    icon: 'success',
                                    //title: 'PRODUCTO REGISTRADO'
                                    title: titulo_msj
                                });
                                table.ajax.reload();
                                $("#mdlGestionarProducto").modal('hide');

                                $('#tbl_tallas_pro').DataTable().clear().destroy();

                                $("#iptCodigoReg").val("");
                                $("#selCategoriaReg").val(0);
                                $("#iptDescripcionReg").val("");
                                $("#iptPrecioCompraReg").val("");
                                $("#iptPrecioVentaReg").val("");
                                $("#iptPrecioVentaMayorReg").val("");
                                $("#iptPrecioVentaOfertaReg").val("");
                                $("#iptStockReg").val("");
                                $("#iptMinimoStockReg").val("");
                                // $("#text_imagen").val('');
                                // $("#previewImg").attr("src",
                                //     "vistas/assets/imagenes/default.png");

                            } else {
                                Toast.fire({
                                    icon: 'error',
                                    title: 'El producto no se pudo registrar'
                                });
                            }

                        }
                    });

                }
            })

        } else {

            Toast.fire({
                icon: 'warning',
                title: 'Inserte las tallas del Producto'
            });
            $("#select_talla").focus();

        }

    });


    /*===================================================================*/
    //EVENTO QUE LIMPIA LOS MENSAJES DE ALERTA DE INGRESO DE DATOS DE CADA INPUT AL CANCELAR LA VENTANA MODAL
    /*===================================================================*/
    document.getElementById("btnCancelarRegistro").addEventListener("click", function() {
        $(".needs-validation").removeClass("was-validated");
    })

    /*===================================================================*/
    //HACER CLICK EN ABRIR MODAL REGISTRAR PRODUCTOS
    /*===================================================================*/
    $("#abrirmodalP").on('click', function() {
        AbrirModalRegistroProductos();
    })




    /*===================================================================*/
    //REGISTRAR DETALLE TALLAS
    /*===================================================================*/
    function RegistrarDetalle() {
        var count = 0;
        var codigo_pro = $("#iptCodigoReg").val();

        var arreglo_id_talla = new Array();
        var arreglo_stock = new Array();

        $("#tbl_tallas_pro tbody tr").each(function(i, e) {
            arreglo_id_talla.push($(this).find('td').eq(0).text());
            arreglo_stock.push($(this).find('td').eq(2).text());
            //arreglo_fecha.push($(this).find('td').eq(1).text());
            count++;
        })

        var id_talla = arreglo_id_talla.toString();
        var stock = arreglo_stock.toString();

        $.ajax({
            url: "ajax/productos.ajax.php",
            method: "POST",
            data: {
                accion: 10,
                codigo_producto: codigo_pro,
                id_talla: id_talla,
                stock: stock
            },
            dataType: 'json',
            success: function(respuesta) {
                // console.log(respuesta);


                //   Swal.fire({
                //       position: 'center',
                //       icon: 'success',
                //       title: respuesta,
                //       showConfirmButton: false,
                //       timer: 1500
                //   })



            }
        });

    }

    /*===================================================================*/
    //FUNCION PARA TRAER EL DETALLE PARA PAGAR UNA CUOTA
    /*===================================================================*/
    function Traer_Detalle(codigo_pro) {
        tbl_tallas_pro = $("#tbl_tallas_pro").DataTable({
            //responsive: true,
            destroy: true,
            //retrieve: true,
            //searching: false,
            paging: false,
            async: false,
            processing: true,
            dom: 'tp',
            ajax: {
                url: "ajax/productos.ajax.php",
                dataSrc: "",
                type: "POST",
                data: {
                    'accion': 11,
                    'codigo_producto': codigo_pro
                }, //LISTAR 
            },
            columnDefs: [{
                    targets: 0,
                    visible: true

                },

            ],

            "language": idioma_espanol,
            select: true
        });
    }

    /*===================================================================*/
    //FUNCION PARA TRAER LAS TALLAS POR CODIGO A UNMENTAR O DISMINUIR STOCK
    /*===================================================================*/
    function SelectTallasPorCodigoP(codigo_producto) {
        //$("#select_talla_aumentar").trigger('destroy');
        $.ajax({

            url: "ajax/talla_ajax.php",
            dataSrc: "",
            type: "POST",
            data: {
                'accion': 5,
                'codigo_producto': codigo_producto
            },
            cache: false,
            dataType: 'json',
            success: function(respuesta) {
                //console.log(respuesta);

                var options = '<option selected value="">Seleccione una Talla</option>';

                for (let index = 0; index < respuesta.length; index++) {
                    options = options + '<option value=' + respuesta[index][0] + ' data-stock =' + respuesta[index][2] + '>' + respuesta[index][1] + '</option>';
                }
                //$('#select_talla_aumentar option[value="1"]').prop("selected", true);

                $("#select_talla_aumentar").append(options);

            }
        });
    }


    /*===================================================================*/
    //RESETAR SELECT DE LAS TALLAS POR CODIGO
    /*===================================================================*/
    function reseteodeSelect() {

        var selectElement = document.getElementById("select_talla_cod_barra");

        while (selectElement.length > 0) {
            selectElement.remove(0);
        }
    }



    /*===================================================================*/
    //FUNCION PARA TRAER LAS TALLAS POR CODIGO A UNMENTAR STOCK
    /*===================================================================*/
    function SelectTallaCodBarra(codigo_producto) {
        //$("#select_talla_aumentar").trigger('destroy');
        $.ajax({

            url: "ajax/talla_ajax.php",
            dataSrc: "",
            type: "POST",
            data: {
                'accion': 6,
                'codigo_producto': codigo_producto
            },
            cache: false,
            dataType: 'json',
            success: function(respuesta) {
                //console.log(respuesta);

                var options = '<option selected value="">Seleccione una Talla</option>';

                for (let index = 0; index < respuesta.length; index++) {
                    // options = options + '<option value=' + respuesta[index][0] + ' data-stock ='+ respuesta[index][2] +'>' + respuesta[index][1] + '</option>';
                    options = options + '<option value=' + respuesta[index][0] + '>' + respuesta[index][1] +
                        '</option>';
                }
                //$('#select_talla_aumentar option[value="1"]').prop("selected", true);

                $("#select_talla_cod_barra").append(options);
            }
        });
    }

    /*===================================================================*/
    //PREVIEW DE LA IMAGEN
    /*===================================================================*/
    function previewFile2(input) {
        var file = $("input[type=file]").get(0).files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function() {

                $("#previewImg_m").attr("src", reader.result);
            }
            reader.readAsDataURL(file);
        }

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
<script src="js/productos.js?rev=<?php echo time(); ?>"></script>