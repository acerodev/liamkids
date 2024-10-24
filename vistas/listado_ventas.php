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
                        <h3 class="card-title">Listado de Ventas</h3>

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
                            <table id="tbl_lista_ventas" class="table display table-hover text-nowrap compact  w-100  rounded">
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
<div class="modal fade" id="modal_detalle_venta" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
<script type="text/javascript" src="js/listado_ventas.js"></script>

