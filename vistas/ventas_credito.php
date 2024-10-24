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
<div class="content pb-2">
    <div class="container-fluid">
        <div class="row p-0 m-0">
            <div class="col-md-12">
                <div class="card card-info card-outline shadow ">
                    <div class="card-header">
                        <h3 class="card-title">Listado de Ventas a credito</h3>
                        <input type="text" id="id_caja" hidden>
                        <!-- <button class="btn btn-info btn-sm float-right" id="abrirmodal"><i class="fas fa-plus"></i>
                            Nuevo</button> -->
                    </div>
                    <div class=" card-body">
                        <div class="table-responsive">
                            <table id="tbl_ventas_cre" class="table display table-hover text-nowrap compact  w-100  rounded">
                                <!-- <table id="tbl_categorias" class="table display table-hover text-nowrap compact  w-100  rounded"> -->
                                <thead class="bg-info">
                                    <tr>
                                        <!-- <th>Id</th> -->
                                        <th>Nro Comprobante</th>
                                        <th>Cliente</th>
                                        <th>Fecha</th>
                                        <th>Monto</th>
                                        <th>Abonado</th>
                                        <th>Restante</th>
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



<!-- MODAL REGISTRAR PAGOS DE VENTA CREDITO-->
<div class="modal fade" id="modal_registrar_pago" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header bg-gray py-1 align-items-center">
                <h5 class="modal-title" id="">Pagar monto de venta a credito</h5>
                <button type="button" class="close  text-white border-0 fs-5" id="btncerrarmodal_registrar_pago" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row">

                    <div class="col-lg-12 ">
                        <div class="form-group mb-2">
                            <label for="" class="">
                                <span class="small"> Nro Comprobante</span>
                            </label>
                            <input type="text" class=" form-control form-control-sm" id="text_comprobante" name="text_comprobante" placeholder="Comprobante" disabled>

                        </div>
                    </div>
                    <div class="col-lg-12 ">
                        <div class="form-group mb-2">
                            <label for="" class="">
                                <span class="small"> Cliente</span>
                            </label>
                            <input type="text" class=" form-control form-control-sm" id="text_cliente" name="text_cliente" placeholder="Cliente" disabled>

                        </div>
                    </div>
                    <div class="col-lg-6 ">
                        <div class="form-group mb-2">
                            <label for="" class="">
                                <span class="small"> Monto Total</span>
                            </label>
                            <input type="text" class=" form-control form-control-sm" id="text_mont_total" name="text_mont_total" placeholder="monto total" disabled>

                        </div>
                    </div>
                    <div class="col-lg-6 ">
                        <div class="form-group mb-2">
                            <label for="" class="">
                                <span class="small"> Monto Abonado</span>
                            </label>
                            <input type="text" class=" form-control form-control-sm" id="text_mont_abonado" name="text_mont_abonado" placeholder="Monto Abonado" disabled>

                        </div>
                    </div>
                    <div class="col-lg-6 ">
                        <div class="form-group mb-2">
                            <label for="" class="">
                                <span class="small">Restante</span>
                            </label>
                            <input type="text" class=" form-control form-control-sm" id="text_mont_restante" name="text_mont_restante" placeholder="Monto restante" disabled>

                        </div>
                    </div>

                    <div class="col-lg-6 ">
                        <div class="form-group mb-2">
                            <label for="" class="">
                                <span class="small">Abonar</span>
                            </label>
                            <input type="number" class=" form-control form-control-sm" id="text_mont_abonar" name="text_mont_abonar" placeholder="Monto abonar">

                        </div>
                    </div>



                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal" id="btncerrar_pago">Cerrar</button>
                <a class="btn btn-info btn-sm" id="btnregistrar_pago">Registrar</a>
            </div>
        </div>
    </div>
</div>
</div>
<!-- fin Modal -->

<!-- MODAL IMPRIMIR PAGOS DE VENTA CREDITO-->
<div class="modal fade" id="modal_impresion_pago" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-gray py-1 align-items-center">
                <h5 class="modal-title" id="">Impresion de Pagos</h5>
                <button type="button" class="close  text-white border-0 fs-5" id="btncerrarmodal_impresion_pago" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row">

                    <div class="col-lg-12 " hidden>
                        <div class="form-group mb-2">
                            <label for="" class="">
                                <span class="small"> Nro Comprobante</span>
                            </label>
                            <input type="text" class=" form-control form-control-sm" id="text_comprobante_impre" name="text_comprobante_impre" placeholder="Comprobante" disabled>

                        </div>
                    </div>

                    <div class="col-lg-12 ">
                        <div class="table-responsive">
                            <table id="tbl_impresion_p" class="table display table-hover text-nowrap compact  w-100  rounded">
                                <!-- <table id="tbl_categorias" class="table display table-hover text-nowrap compact  w-100  rounded"> -->
                                <thead class="bg-info">
                                    <tr>

                                        <th>Id</th>
                                        <th>Comprobante</th>
                                        <th>Monto</th>
                                        <th>Fecha</th>
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
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal" id="btncerrar_impresion">Cerrar</button>
                <!-- <a class="btn btn-info btn-sm" id="btnregistrar_pago">Registrar</a> -->
            </div>
        </div>
    </div>
</div>
</div>
<!-- fin Modal -->
<script type="text/javascript" src="js/ventas_credito.js"></script>

