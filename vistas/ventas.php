
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

                    <div class="card-body py-2">

                        <div class="row">
                            <!-- INPUT PARA INGRESO DEL CODIGO DE BARRAS O DESCRIPCION DEL PRODUCTO -->
                            <div class="col-md-12 mb-3">

                                <div class="form-group mb-2">

                                    <label class="col-form-label" for="iptCodigoVenta">
                                        <input type="hidden" name="id_caja" id="id_caja">
                                        <input type="hidden" name="text_igv" id="text_igv">
                                        <input type="hidden" name="text_moneda_emp" id="text_moneda_emp">
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
                                <a class="btn btn-primary dataval " id="btnIniciarVenta"><i class="fas fa-shopping-cart"></i> Realizar Venta</a>
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
                                                <th>Desc.</th>
                                            </tr>
                                        </thead>
                                        <tbody class="small text-left fs-6">
                                        </tbody>
                                    </table>
                                </div>
                                <!-- / table -->
                            </div>
                            <br><br><br>
                            <!-- /.col -->
                        </div>
                    </div> <!-- ./ end card-body -->
                </div>

            </div>

            <div class="col-md-3">

                <div class="card card-gray shadow">

                    <!-- <h5 class="card-header py-1 bg-primary text-white text-center">
                        Total Venta: S./ <span id="totalVentaRegistrar">0.00</span>
                    </h5> -->

                    <div class="card-body p-2">

                        <!-- SELECCIONAR TIPO DE DOCUMENTO -->
                        <div class="form-group mb-2">

                            <label class="col-form-label p-0" for="selCategoriaReg">

                                <span class="small">Documento</span><span class="text-danger">*</span>
                            </label>
                            <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="selDocumentoVenta">

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
                            <!-- <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="select_cliente"></select> -->
                            <select class="form-control form-control-sm js-example-basic-single" id="select_cliente"
                                    style="width:100%"> </select>

                            <span id="validate_categoria" class="text-danger small fst-italic" style="display:none">
                                Debe Seleccione documento
                            </span>

                        </div>
                       

                        <!-- SELECCIONAR TIPO DE PAGO -->
                        <div class="form-group mb-2">

                            <label class="col-form-label p-0" for="selCategoriaReg">

                                <span class="small">Tipo Pago</span><span class="text-danger">*</span>
                            </label>

                            <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="selTipoPago">
                                <option value="0">Seleccione Tipo Pago</option>
                                <option value="Efectivo" >Efectivo</option>
                                <option value="Credito" >Credito</option>
                                <option value="Yape">Yape</option>
                                <option value="Plin">Plin</option>
                                <option value="Transferencia">Transferencia</option>
                                <option value="efecytrans">Efectivo y otros</option>
                            </select>

                            <span id="validate_categoria" class="text-danger small fst-italic" style="display:none">
                                Debe Ingresar tipo de pago
                            </span>

                        </div>
                         <div class="form-group mb-2" id="ope_efec">

                            <label class="col-form-label p-0" for="">

                                <span class="small">Monto Efectivo</span>
                            </label>
                            <input type="number" name="text_monto_efec" id="text_monto_efec" class="form-control form-control-sm" placeholder="monto efectivo">

                        </div>

                        <div class="form-group mb-2" id="operacion">

                            <label class="col-form-label p-0" for="">

                                <span class="small">Codigo Operacion</span>
                            </label>
                            <input type="text" name="text_codOpera" id="text_codOpera" class="form-control form-control-sm" placeholder="Codigo de operacion">

                        </div>

                          <div class="form-group mb-2" id="ope_monto_ope">

                            <label class="col-form-label p-0" for="">

                                <span class="small">Monto Ope.</span>
                            </label>
                            <input type="number" name="text_monto_ope" id="text_monto_ope" class="form-control form-control-sm" placeholder="monto operacion">

                        </div>
                        <div class="form-group mb-2" id="ope_credito" hidden>

                            <label class="col-form-label p-0" for="">

                                <span class="small">Monto Efectivo</span>
                            </label>
                            <input type="number" name="text_monto_credito" id="text_monto_credito" class="form-control form-control-sm" placeholder="monto credito">

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

                                    <input type="text" min="0" name="iptEfectivo" id="iptNroVenta" class="form-control form-control-sm" placeholder="Nro Venta" disabled>

                                </div>

                            </div>

                        </div>

                        <!-- INPUT DE EFECTIVO ENTREGADO -->
                        <div class="form-group" id="efe_reci_ocultar">
                            <label for="iptEfectivoRecibido" class="p-0 m-0">Efectivo recibido</label>
                            <input type="number" min="0" name="iptEfectivo" id="iptEfectivoRecibido" class="form-control form-control-sm" placeholder="Cantidad de efectivo recibida">
                        </div>

                        <!-- INPUT CHECK DE EFECTIVO EXACTO -->
                        <div class="form-check" id="chk_ocultar">
                            <input class="form-check-input" type="checkbox" value="" id="chkEfectivoExacto">
                            <label class="form-check-label" for="chkEfectivoExacto">
                                Efectivo Exacto
                            </label>
                        </div>

                        <!-- MOSTRAR MONTO EFECTIVO ENTREGADO Y EL VUELTO -->
                        <div class="row mt-2">

                            <div class="col-12">
                                <h6 class="text-start fw-bold">Monto Efectivo: <?php echo $nombre_sist2[0]['moneda'] ; ?> <span id="EfectivoEntregado">0.00</span></h6>
                            </div>

                            <div class="col-12">
                                <h6 class="text-start text-danger fw-bold">Vuelto: <?php echo $nombre_sist2[0]['moneda'] ; ?> <span id="Vuelto">0.00</span>
                                </h6>
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
                                <span>DESCUENTO</span>
                            </div>
                            <div class="col-md-5 text-right">
                            <?php echo $nombre_sist2[0]['moneda'] ; ?> <span class="" id="boleta_descuento">0.00</span>
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

<!-- MODAL REGISTRAR CLIENTE-->
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
<script type="text/javascript" src="js/ventas.js"></script>

