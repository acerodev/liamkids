<?php
require_once '../controladores/usuario.controlador.php';
require_once '../modelos/usuario.modelo.php';
                       
                      
                        $nombre_sist2 = UsuarioControlador::ctrObtenerNombre_sistema();
                       // var_dump($nombre_sist2[0]['moneda']);

?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <!-- <div class="col-md-6">
                <h2 class="m-0">Categorías</h2>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                    <li class="breadcrumb-item">Productos</li>
                    <li class="breadcrumb-item active">Categorías</li>
                </ol>
            </div> -->
        </div>
    </div>
</div>

<!-- Main content - VENTAS DEL DIA -->
<div class="content pb-2">
    <div class="container-fluid">
        <div class="row p-0 m-0">
            <div class="col-md-12">
                <div class="card card-info card-outline shadow ">
                    <div class="card-header">
                        <h3 class="card-title">Reporte de Ventas del dia</h3>

                    </div>
                    <div class=" card-body">

                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">
                                        <span class="small">Fecha Inicio:</span>
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                    class="far fa-calendar-alt"></i></span></div>
                                        <input type="date" class="form-control form-control-sm"
                                            data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy"
                                            id="text_fecha_I">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">
                                        <span class="small">Fecha Fin:</span>
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                    class="far fa-calendar-alt"></i></span></div>
                                        <input type="date" class="form-control form-control-sm" max="<?php echo date("Y-m-d"); ?>" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" id="text_fecha_F">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8 d-flex flex-row align-items-center justify-content-end">
                                <div class="form-group m-0"><a class="btn btn-primary btn-sm" style="width:120px;" id="btnFiltrar">Buscar</a></div>
                            </div>
                        </div><br>



                        <div class="table-responsive">
                            <table id="tbl_ventas_dia"
                                class="table display table-hover text-nowrap compact  w-100  rounded">
                                <thead class="bg-info text-center">
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Tipo C.</th>
                                        <th>Comprobante</th>
                                        <th>Cliente</th>
                                        <th style="text-align:center">Base Imp.</th>
                                        <th>IGV</th>
                                        <th>Total <?php echo $nombre_sist2[0]['moneda'] ; ?></th>
                                    </tr>
                                </thead>
                                <tbody class="small text-center">
                                </tbody>
                                <tfoot class="small text-center">
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th>Total:</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        
                                    </tr>
                                </tfoot>
                            </table>

                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->


<!-- Main content - VENTAS - GANANCIAS POR FECHAS -->
<div class="content pb-2">
    <div class="container-fluid">
        <div class="row p-0 m-0">
            <div class="col-md-12">
                <div class="card card-info card-outline shadow ">
                    <div class="card-header">
                        <h3 class="card-title">Reporte ganancias de ventas</h3>

                    </div>
                    <div class=" card-body">

                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">
                                        <span class="small">Fecha Inicio:</span>
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                    class="far fa-calendar-alt"></i></span></div>
                                        <input type="date" class="form-control form-control-sm"
                                            data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy"
                                            id="text_fecha_I_G">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">
                                        <span class="small">Fecha Fin:</span>
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i
                                                    class="far fa-calendar-alt"></i></span></div>
                                        <input type="date" class="form-control form-control-sm" max="<?php echo date("Y-m-d"); ?>" 
                                        data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" id="text_fecha_F_G">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8 d-flex flex-row align-items-center justify-content-end">
                                <div class="form-group m-0"><a class="btn btn-primary btn-sm" style="width:120px;" id="btnFiltrar_G">Buscar</a></div>
                            </div>
                        </div><br>



                        <div class="table-responsive">
                            <table id="tbl_ventas_ganancia"
                                class="table display table-hover text-nowrap compact  w-100  rounded">
                                <thead class="bg-info text-center">
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Tipo C.</th>
                                        <th>Comprobante</th>
                                        <th>Cliente</th>
                                        <th style="text-align:center">Base Imp.</th>
                                        <th>IGV</th>
                                        <th>TOTAL</th>
                                        <th>CANT.</th>
                                        <th>P. COMP.</th>
                                        <th>P. VENTA</th>
                                        <th>GANANCIA</th>
                                        <th>USUARIO</th>
                                    </tr>
                                </thead>
                                <tbody class="small text-center">
                                </tbody>
                                <tfoot class="small text-center">
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th>Total:</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th>Total:</th>
                                        <th></th>
                                        <th></th>
                                        
                                    </tr>
                                </tfoot>
                            </table>

                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->



<!-- Main content - VENTAS POR MES Y AÑO -->
<div class="content pb-2">
    <div class="container-fluid">
        <div class="row p-0 m-0">
            <div class="col-md-12">
                <div class="card card-info card-outline shadow ">
                    <div class="card-header">
                        <h3 class="card-title">Reporte por Mes y Año</h3>

                    </div>
                    <div class=" card-body">

                    <div class="row">

                        <div class="col-md-5">
                            <label for="">Mes</label>
                            <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="select_mes_venta" >
                                   
                                <option value="">Seleccione</option>
                                <option value="1">Enero</option>
                                <!--iniciar el select 2 en el script -->
                                <option value="2">Febrero</option>
                                <option value="3">Marzo</option>
                                <option value="4">Abril</option>
                                <option value="5">Mayo</option>
                                <option value="6">Junio</option>
                                <option value="7">Julio</option>
                                <option value="8">Agosto</option>
                                <option value="9">Septiembre</option>
                                <option value="10">Octubre</option>
                                <option value="11">Noviembre</option>
                                <option value="12">Diciembre</option>
                            </select>
                        </div>

                        <div class="col-md-5">
                            <label for="">Año</label>
                            <select class="form-select form-select-sm" aria-label=".form-select-sm example"  id="select_anio_m_a" > </select>
                        </div>

                        
                        <div class="col-md-2 d">
                             <label for="">&nbsp; &nbsp; </label><br>
                                <div class="form-group m-0">
                                    <a class="btn btn-primary btn-sm" id="btnMesyanio">Buscar</a>
                                </div>
                            </div>

                        </div><br>



                        <div class="table-responsive">
                            <table id="tbl_ventas_mes_anio"
                                class="table display table-hover text-nowrap compact  w-100  rounded">
                                <thead class="bg-info text-center">
                                    <tr>
                                        <th>Cliente</th>
                                        <th>Comprobante</th>
                                        <th>Monto</th>
                                        <th>Cant Productos</th>
                                        <th>Fecha</th>
                                        <th>usuario</th>
                                    </tr>
                                </thead>
                                <tbody class="small text-center">
                                </tbody>
                                <tfoot class="small text-center">
                                    <tr>
                                        <th></th>
                                        <th>total:</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                      
                                        
                                    </tr>
                                </tfoot>
                            </table>

                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->


<!-- Main content - VENTAS POR AÑO -->
<div class="content pb-2">
    <div class="container-fluid">
        <div class="row p-0 m-0">
            <div class="col-md-12">
                <div class="card card-info card-outline shadow ">
                    <div class="card-header">
                        <h3 class="card-title">Reporte por Año</h3>

                    </div>
                    <div class=" card-body">

                    <div class="row">

                        

                        <div class="col-md-5">
                            <label for="">Año</label>
                            <select class="form-select form-select-sm" aria-label=".form-select-sm example"  id="select_anio_anual" > </select>
                        </div>

                        
                        <div class="col-md-2 d">
                             <label for="">&nbsp; &nbsp; </label><br>
                                <div class="form-group m-0">
                                    <a class="btn btn-primary btn-sm" id="btnAnio">Buscar</a>
                                </div>
                            </div>

                        </div><br>



                        <div class="table-responsive">
                            <table id="tbl_ventas_anio"
                                class="table display table-hover text-nowrap compact  w-100  rounded">
                                <thead class="bg-info text-center">
                                    <tr>
                                        <th>Año</th>
                                        <th>Mes</th>
                                        <th>Cant Ventas</th>
                                        <th>Total <?php echo $nombre_sist2[0]['moneda'] ; ?></th>
                                       </tr>
                                </thead>
                                <tbody class="small text-center">
                                </tbody>
                                <tfoot class="small text-center">
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th>total:</th>
                                        <th></th>  
                                    </tr>
                                </tfoot>
                            </table>

                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->


<!-- Main content - VENTAS GENERAL ANUAL -->
<div class="content pb-2">
    <div class="container-fluid">
        <div class="row p-0 m-0">
            <div class="col-md-12">
                <div class="card card-info card-outline shadow ">
                    <div class="card-header">
                        <h3 class="card-title">Comparativo Anual</h3>

                    </div>
                    <div class=" card-body">

                        <div class="table-responsive">
                            <table id="tbl_ventas_comp_anual"
                                class="table display table-hover text-nowrap compact  w-100  rounded">
                                <thead class="bg-info text-center">
                                    <tr>
                                        <th>Año</th>
                                        <th>Cant Ventas</th>
                                        <th>Total <?php echo $nombre_sist2[0]['moneda'] ; ?></th>
                                       </tr>
                                </thead>
                                <tbody class="small text-center">
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




<script>
var accion;
var tbl_ventas_dia, tbl_ventas_mes_anio, tbl_ventas_anio, tbl_ventas_comp_anual, tbl_ventas_ganancia;

var Toast = Swal.mixin({
    toast: true,
    position: 'top',
    showConfirmButton: false,
    timer: 3000
});


$(document).ready(function() {

    fechas();
    filtroporFechas();
  
    filtroporMesyAnio();
    filtroPorAnio();
    filtroComparativoAnual();
    filtroGananciasporFechas();

    
    /*===================================================================*/
    // CARGAR AÑOS EN SELECT - REPORTE POR MES Y AÑO
    /*===================================================================*/
    $.ajax({
        dataType: 'json',
        url: "ajax/rpt_ventas_ajax.php",
        //dataSrc: "",
        type: "POST",
        data: {
            'accion': 2
        },
        // cache: false,
        // contentType: false,
        // processData: false,
       // dataType: 'json',
        success: function(respuesta) {
           // console.log(respuesta);

            var options = '<option selected value="">Seleccione un Año</option>';

            for (let index = 0; index < respuesta.length; index++) {
                options = options + '<option >' + respuesta[index][0] + '</option>';
            }

            $("#select_anio_m_a").append(options);
        }
    });

    /*===================================================================*/
    // AÑOS EN SELECT - REPORTE POR AÑOS
    /*===================================================================*/
    $.ajax({
        dataType: 'json',
        url: "ajax/rpt_ventas_ajax.php",
        //dataSrc: "",
        type: "POST",
        data: {
            'accion': 2
        },
        // cache: false,
        // contentType: false,
        // processData: false,
       // dataType: 'json',
        success: function(respuesta) {
           // console.log(respuesta);

            var options = '<option selected value="">Seleccione un Año</option>';

            for (let index = 0; index < respuesta.length; index++) {
                options = options + '<option >' + respuesta[index][0] + '</option>';
            }

            $("#select_anio_anual").append(options);
        }
    });

    


    /****************************************** */
    //FILTRAR EN EL REPORTE VENTAS DEL DIA
    /****************************************** */
    $("#btnFiltrar").on('click', function() {
            filtroporFechas();
            validar();
    })




    /****************************************** */
    //FILTRAR EN EL REPORTE VENTAS MES - AÑO
    /****************************************** */
    $("#btnMesyanio").on('click', function() {
        validarMesyAnio();
        filtroporMesyAnio();      
        })

    /****************************************** */
    //FILTRAR EN EL REPORTE POR AÑO
    /****************************************** */
    $("#btnAnio").on('click', function() {
        filtroPorAnio();
        
        })

        /****************************************** */
    //FILTRAR EN EL REPORTE VENTAS DEL DIA
    /****************************************** */
    $("#btnFiltrar_G").on('click', function() {
        filtroGananciasporFechas();
           // validar();
        })




   


}) //////////// FIN DOCUMENT READY


    /****************************************** */
    //LISTAS LAS VENTAS POR RANGO DE FECHA
    /****************************************** */
    function filtroporFechas() {
        fecha_ini = $("#text_fecha_I").val(); //capturamos el valor
        fecha_fin = $("#text_fecha_F").val();

        tbl_ventas_dia = $("#tbl_ventas_dia").DataTable({
            responsive: true,
            destroy: true,
            //paging: false,
            async: false,
            processing: true,

            dom: 'Blfrtip',
            buttons: [{
                    "extend": 'excelHtml5',
                    "title": 'Reporte ventas del dia',
                    "exportOptions": {
                        'columns': [0, 1, 2, 3, 4, 5, 6]
                    },
                    "text": '<i class="fa fa-file-excel"></i>',
                    "titleAttr": 'Exportar a Excel'
                },
                {
                    "extend": 'print',
                    "text": '<i class="fa fa-print"></i> ',
                    "titleAttr": 'Imprimir',
                    "exportOptions": {
                        'columns': [0, 1, 2, 3, 4, 5, 6]
                    },
                    "download": 'open'
                },
               
            ],
            ajax: {
                url: "ajax/rpt_ventas_ajax.php",
                dataSrc: "",
                type: "POST",
                data: {
                    'accion': 1,
                    'fecha_ini': fecha_ini,
                    'fecha_fin': fecha_fin
                }, //LISTAR 
            },
            columnDefs: [
               
 
            ],


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
                                    .column(4)
                                    .data()
                                    .reduce(function(a, b) {
                                        return intval(a) + intval(b);
                                    }, 0);
                                pageTotal = api
                                    .column(4, {
                                        page: 'current'
                                    })
                                    .data()
                                    .reduce(function(a, b) {
                                        return intval(a) + intval(b);
                                    }, 0);
                                $(api.column(4).footer()).html(
                                    '' + pageTotal 
                                    //   '' + pageTotal + ' ( ' + total + ' total)'
                                );


                                total = api
                                    .column(5)
                                    .data()
                                    .reduce(function(a, b) {
                                        return intval(a) + intval(b);
                                    }, 0);
                                pageTotal = api
                                    .column(5, {
                                        page: 'current'
                                    })
                                    .data()
                                    .reduce(function(a, b) {
                                        return intval(a) + intval(b);
                                    }, 0);
                                $(api.column(5).footer()).html(
                                    '' + pageTotal 
                                    //   '' + pageTotal + ' ( ' + total + ' total)'
                                );


                                total = api
                                    .column(6)
                                    .data()
                                    .reduce(function(a, b) {
                                        return intval(a) + intval(b);
                                    }, 0);
                                pageTotal = api
                                    .column(6, {
                                        page: 'current'
                                    })
                                    .data()
                                    .reduce(function(a, b) {
                                        return intval(a) + intval(b);
                                    }, 0);
                                $(api.column(6).footer()).html(
                                    '' + pageTotal 
                                    //   '' + pageTotal + ' ( ' + total + ' total)'
                                );

                },

            lengthMenu: [5, 10, 15, 20, 50],
             pageLength: 10,
            "language": idioma_espanol,
            select: true
        });


    }


     /****************************************** */
    //LISTAS LAS VENTAS POR RANGO DE FECHA
    /****************************************** */
    function filtroGananciasporFechas() {
        fecha_ini = $("#text_fecha_I_G").val(); //capturamos el valor
        fecha_fin = $("#text_fecha_F_G").val();

        tbl_ventas_ganancia = $("#tbl_ventas_ganancia").DataTable({
            responsive: true,
            destroy: true,
            //paging: false,
            async: false,
            processing: true,

            dom: 'Blfrtip',
            buttons: [{
                    "extend": 'excelHtml5',
                    "title": 'Reporte ventas del dia',
                    "exportOptions": {
                        'columns': [0, 1, 2, 3, 4, 5, 6,7,8,9,10,11]
                    },
                    "text": '<i class="fa fa-file-excel"></i>',
                    "titleAttr": 'Exportar a Excel'
                },
                {
                    "extend": 'print',
                    "text": '<i class="fa fa-print"></i> ',
                    "titleAttr": 'Imprimir',
                    "exportOptions": {
                        'columns': [0, 1, 2, 3, 4, 5, 6,7,8,9,10,11]
                    },
                    "download": 'open'
                },
               
            ],
            ajax: {
                url: "ajax/rpt_ventas_ajax.php",
                dataSrc: "",
                type: "POST",
                data: {
                    'accion': 9,
                    'fecha_ini': fecha_ini,
                    'fecha_fin': fecha_fin
                }, //LISTAR 
            },
            columnDefs: [
            
 
            ],


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
                                    .column(4)
                                    .data()
                                    .reduce(function(a, b) {
                                        return intval(a) + intval(b);
                                    }, 0);
                                pageTotal = api
                                    .column(4, {
                                        page: 'current'
                                    })
                                    .data()
                                    .reduce(function(a, b) {
                                        return intval(a) + intval(b);
                                    }, 0);
                                $(api.column(4).footer()).html(
                                    '' + pageTotal 
                                    //   '' + pageTotal + ' ( ' + total + ' total)'
                                );


                                total = api
                                    .column(5)
                                    .data()
                                    .reduce(function(a, b) {
                                        return intval(a) + intval(b);
                                    }, 0);
                                pageTotal = api
                                    .column(5, {
                                        page: 'current'
                                    })
                                    .data()
                                    .reduce(function(a, b) {
                                        return intval(a) + intval(b);
                                    }, 0);
                                $(api.column(5).footer()).html(
                                    '' + pageTotal 
                                    //   '' + pageTotal + ' ( ' + total + ' total)'
                                );


                                total = api
                                    .column(6)
                                    .data()
                                    .reduce(function(a, b) {
                                        return intval(a) + intval(b);
                                    }, 0);
                                pageTotal = api
                                    .column(6, {
                                        page: 'current'
                                    })
                                    .data()
                                    .reduce(function(a, b) {
                                        return intval(a) + intval(b);
                                    }, 0);
                                $(api.column(6).footer()).html(
                                    '' + pageTotal 
                                    //   '' + pageTotal + ' ( ' + total + ' total)'
                                );

                                total = api
                                    .column(10)
                                    .data()
                                    .reduce(function(a, b) {
                                        return intval(a) + intval(b);
                                    }, 0);
                                pageTotal = api
                                    .column(10, {
                                        page: 'current'
                                    })
                                    .data()
                                    .reduce(function(a, b) {
                                        return intval(a) + intval(b);
                                    }, 0);
                                $(api.column(10).footer()).html(
                                    '' + pageTotal 
                                    //   '' + pageTotal + ' ( ' + total + ' total)'
                                );

                },

            lengthMenu: [5, 10, 15, 20, 50],
             pageLength: 10,
            "language": idioma_espanol,
            select: true
        });


    }

    /****************************************** */
    //LISTAS LAS VENTAS MES Y AÑO
    /****************************************** */
    function filtroporMesyAnio() {
        mes = $("#select_mes_venta").val(); //capturamos el valor
        anio = $("#select_anio_m_a").val();
       // console.log(mes, anio);

        tbl_ventas_mes_anio = $("#tbl_ventas_mes_anio").DataTable({
            responsive: true,
            destroy: true,
            //paging: false,
            async: false,
            processing: true,

            dom: 'Blfrtip',
            buttons: [{
                    "extend": 'excelHtml5',
                    "title": 'Reporte ventas de Mes y año',
                    "exportOptions": {
                        'columns': [0, 1, 2, 3, 4, 5]
                    },
                    "text": '<i class="fa fa-file-excel"></i>',
                    "titleAttr": 'Exportar a Excel'
                },
                {
                    "extend": 'print',
                    "text": '<i class="fa fa-print"></i> ',
                    "titleAttr": 'Imprimir',
                    "exportOptions": {
                        'columns': [0, 1, 2, 3, 4, 5]
                    },
                    "download": 'open'
                },
               
            ],
            ajax: {
                url: "ajax/rpt_ventas_ajax.php",
                dataSrc: "",
                type: "POST",
                data: {
                    'accion': 3,
                    'mes': mes,
                    'anio': anio
                }, //LISTAR 
            },
            columnDefs: [
                // {
                //     targets: 0,
                //     visible: false

                // }, {
                //     targets: 2,
                //     visible: false

                // }, 
                // {
                //     targets: 7,
                //     visible: false

                // }, 
 
            ],


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

            lengthMenu: [5, 10, 15, 20, 50],
             pageLength: 10,
            "language": idioma_espanol,
            select: true
        });


    }


    /****************************************** */
    //LISTAS LAS VENTAS POR AÑO
    /****************************************** */
    function filtroPorAnio() {
       
        anio_a = $("#select_anio_anual").val();
       // console.log(mes, anio);

       tbl_ventas_anio = $("#tbl_ventas_anio").DataTable({
            responsive: true,
            destroy: true,
            //paging: false,
            async: false,
            processing: true,

            dom: 'Blfrtip',
            buttons: [{
                    "extend": 'excelHtml5',
                    "title": 'Reporte ventas por año',
                    "exportOptions": {
                        'columns': [0, 1, 2, 3]
                    },
                    "text": '<i class="fa fa-file-excel"></i>',
                    "titleAttr": 'Exportar a Excel'
                },
                {
                    "extend": 'print',
                    "text": '<i class="fa fa-print"></i> ',
                    "titleAttr": 'Imprimir',
                    "exportOptions": {
                        'columns': [0, 1, 2, 3]
                    },
                    "download": 'open'
                },
               
            ],
            ajax: {
                url: "ajax/rpt_ventas_ajax.php",
                dataSrc: "",
                type: "POST",
                data: {
                    'accion': 4,
                    'anio_a': anio_a
                }, //LISTAR 
            },
            columnDefs: [
                // {
                //     targets: 0,
                //     visible: false

                // }, {
                //     targets: 2,
                //     visible: false

                // }, 
                // {
                //     targets: 7,
                //     visible: false

                // }, 
 
            ],


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
                                    .column(3)
                                    .data()
                                    .reduce(function(a, b) {
                                        return intval(a) + intval(b);
                                    }, 0);
                                pageTotal = api
                                    .column(3, {
                                        page: 'current'
                                    })
                                    .data()
                                    .reduce(function(a, b) {
                                        return intval(a) + intval(b);
                                    }, 0);
                                $(api.column(3).footer()).html(
                                    '' + pageTotal 
                                    //   '' + pageTotal + ' ( ' + total + ' total)'
                                );


                               

                },

            lengthMenu: [5, 10, 15, 20, 50],
             pageLength: 10,
            "language": idioma_espanol,
            select: true
        });


    }


    /****************************************** */
    //REPORTE COMPARATIVO ANUAL
    /****************************************** */
    function filtroComparativoAnual() {
       
        tbl_ventas_comp_anual = $("#tbl_ventas_comp_anual").DataTable({
           responsive: true,
           destroy: true,
           //paging: false,
           async: false,
           processing: true,

           dom: 'Blfrtip',
           buttons: [{
                   "extend": 'excelHtml5',
                   "title": 'Reporte ventas por año',
                   "exportOptions": {
                       'columns': [0, 1, 2]
                   },
                   "text": '<i class="fa fa-file-excel"></i>',
                   "titleAttr": 'Exportar a Excel'
               },
               {
                   "extend": 'print',
                   "text": '<i class="fa fa-print"></i> ',
                   "titleAttr": 'Imprimir',
                   "exportOptions": {
                       'columns': [0, 1, 2]
                   },
                   "download": 'open'
               },
              
           ],
           ajax: {
               url: "ajax/rpt_ventas_ajax.php",
               dataSrc: "",
               type: "POST",
               data: {
                   'accion': 5
               }, //LISTAR 
           },
           columnDefs: [
               // {
               //     targets: 0,
               //     visible: false

               // }, {
               //     targets: 2,
               //     visible: false

               // }, 
               // {
               //     targets: 7,
               //     visible: false

               // }, 

           ],

           lengthMenu: [5, 10, 15, 20, 50],
            pageLength: 10,
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
        
       

        document.getElementById('text_fecha_I_G').value = anio + "-" + mes + "-" + d;
        document.getElementById('text_fecha_F_G').value = anio + "-" + mes + "-" + d;
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

    function validarMesyAnio() {
        let mes_v = document.getElementById('select_mes_venta').value;
        let anio_v = document.getElementById('select_anio_m_a').value;
        if (mes_v.length == 0) {

            Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'DEBE SELECCIONAR UN MES',
                showConfirmButton: true,
                timer: 1500
            })
            //$("#fecha_ini").focus();
            return false;
        }
        if (anio_v.length == 0) {
            Toast.fire({
                icon: 'error',
                title: 'DEBE SELECCIONAR UN AÑO'
            })
            //$("#fecha_fin").focus();
            return false;
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