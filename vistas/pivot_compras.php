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


<!-- Main content - REPORTE PIVOT COMPRAS-->
<div class="content pb-2">
    <div class="container-fluid">
        <div class="row p-0 m-0">
            <div class="col-md-12">
                <div class="card card-info card-outline shadow ">
                    <div class="card-header">
                        <h3 class="card-title">Pivot Compras</h3>

                    </div>
                    <div class=" card-body">

                        <div class="table-responsive">
                            <table id="tbl_pivot_c"
                                class="table display table-hover text-nowrap compact  w-100  rounded">
                                <thead class="bg-info text-center">
                                    <tr>
                                        <th>Año</th>
                                        <th>Enero </th>
                                        <th>Febrero</th>
                                        <th>Marzo</th>
                                        <th>Abril</th>
                                        <th>Mayo</th>
                                        <th>Junio</th>
                                        <th>Julio</th>
                                        <th>Agosto</th>
                                        <th>Setiembre</th>
                                        <th>Octubre</th>
                                        <th>Noviembre</th>
                                        <th>Diciembre</th>
                                        <th>Total</th>
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


<!-- Main content -REPORTE POR USUARIO Y AÑO -->
<div class="content pb-2">
    <div class="container-fluid">
        <div class="row p-0 m-0">
            <div class="col-md-12">
                <div class="card card-info card-outline shadow ">
                    <div class="card-header">
                        <h3 class="card-title">Reporte Compras por Usuario </h3>

                    </div>
                    <div class=" card-body">

                        <div class="row">

                            <div class="col-md-5">
                                <label for="">Usuario</label>
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example"
                                    id="select_usu">
                                </select>
                            </div>

                            <div class="col-md-5">
                                <label for="">Año</label>
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example"
                                    id="select_anio_usu"> </select>
                            </div>


                            <div class="col-md-2 d">
                                <label for="">&nbsp; &nbsp; </label><br>
                                <div class="form-group m-0">
                                    <a class="btn btn-primary btn-sm" id="btnRecodUsuario">Buscar</a>
                                </div>
                            </div>

                        </div><br>



                        <div class="table-responsive">
                            <table id="tbl_record_usu"
                                class="table display table-hover text-nowrap compact  w-100  rounded">
                                <thead class="bg-info text-center">
                                    <tr>
                                        <th>Año</th>
                                        <th>Mes</th>
                                        <th>Usuario</th>
                                        <th>Cant. Ventas </th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody class="small text-center">
                                </tbody>
                                <tfoot class="small text-center">
                                    <tr>
                                        <th></th>
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



<script>
var accion;
var tbl_pivot_c, tbl_record_usu;

var Toast = Swal.mixin({
    toast: true,
    position: 'top',
    showConfirmButton: false,
    timer: 3000
});


$(document).ready(function() {
    PivotCompras();
    RecordUsuario();

    /*===================================================================*/
    // CARGAR USUARIOS EN SELECT - RECORD USUARIOS
    /*===================================================================*/
    $.ajax({
        dataType: 'json',
        url: "ajax/rpt_compras_ajax.php",
        //dataSrc: "",
        type: "POST",
        data: {
            'accion': 7
        },
        // cache: false,
        // contentType: false,
        // processData: false,
       // dataType: 'json',
        success: function(respuesta) {
           // console.log(respuesta);

            var options = '<option selected value="">Seleccione un Usuario</option>';

            for (let index = 0; index < respuesta.length; index++) {
                //options = options + '<option >' + respuesta[index][0] + '</option>';
                options = options + '<option value=' + respuesta[index][0] + '>' + respuesta[index][1] + '</option>';
            }

            $("#select_usu").append(options);
        }
    });


    /*===================================================================*/
    // AÑOS EN SELECT - REPORTE POR AÑOS
    /*===================================================================*/
    $.ajax({
        dataType: 'json',
        url: "ajax/rpt_compras_ajax.php",
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

            $("#select_anio_usu").append(options);
        }
    });


    /****************************************** */
    //FILTRAR EN EL REPORTE VENTAS MES - AÑO
    /****************************************** */
    $("#btnRecodUsuario").on('click', function() {
        RecordUsuario();
    })







}) //////////// FIN DOCUMENT READY


/****************************************** */
//REPORTE COMPARATIVO ANUAL
/****************************************** */
function PivotCompras() {

    tbl_pivot_c = $("#tbl_pivot_c").DataTable({
        responsive: true,
        destroy: true,
        //paging: false,
        async: false,
        processing: true,

        dom: 'Blfrtip',
        buttons: [{
                "extend": 'excelHtml5',
                "title": 'Reporte Pivot',
                "exportOptions": {
                    'columns': [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13]
                },
                "text": '<i class="fa fa-file-excel"></i>',
                "titleAttr": 'Exportar a Excel'
            },
            {
                "extend": 'print',
                "text": '<i class="fa fa-print"></i> ',
                "titleAttr": 'Imprimir',
                "exportOptions": {
                    'columns': [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13]
                },
                "download": 'open'
            },

        ],
        ajax: {
            url: "ajax/rpt_compras_ajax.php",
            dataSrc: "",
            type: "POST",
            data: {
                'accion': 6
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
//LISTAS LAS VENTAS MES Y AÑO
/****************************************** */
function RecordUsuario() {
    usu = $("#select_usu").val(); //capturamos el valor
    anio_usu = $("#select_anio_usu").val();
    // console.log(mes, anio);

    tbl_record_usu = $("#tbl_record_usu").DataTable({
        responsive: true,
        destroy: true,
        //paging: false,
        async: false,
        processing: true,

        dom: 'Blfrtip',
        buttons: [{
                "extend": 'excelHtml5',
                "title": 'Reporte Recor usuario',
                "exportOptions": {
                    'columns': [0, 1, 2, 3, 4]
                },
                "text": '<i class="fa fa-file-excel"></i>',
                "titleAttr": 'Exportar a Excel'
            },
            {
                "extend": 'print',
                "text": '<i class="fa fa-print"></i> ',
                "titleAttr": 'Imprimir',
                "exportOptions": {
                    'columns': [0, 1, 2, 3, 4]
                },
                "download": 'open'
            },

        ],
        ajax: {
            url: "ajax/rpt_compras_ajax.php",
            dataSrc: "",
            type: "POST",
            data: {
                'accion': 8,
                'usu': usu,
                'anio_usu': anio_usu
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




        },

        lengthMenu: [5, 10, 15, 20, 50],
        pageLength: 10,
        "language": idioma_espanol,
        select: true
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
</script>