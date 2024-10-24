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


<!-- Main content - STOCK ENTRADAS Y SALIDAS-->
<div class="content pb-2">
    <div class="container-fluid">
        <div class="row p-0 m-0">
            <div class="col-md-12">
                <div class="card card-info card-outline shadow ">
                    <div class="card-header">
                        <h3 class="card-title">Reporte Entrada y Salidas de productos</h3>

                    </div>
                    <div class=" card-body">

                        <div class="table-responsive">
                            <table id="tbl_ensal_prod"
                                class="table display table-hover text-nowrap compact  w-100  rounded">
                                <thead class="bg-info text-center">
                                    <tr>
                                          <th>Codigo</th>
                                          <th>Descrpcion</th>
                                          <th>precio U.</th>
                                          <th>Ingresos</th>
                                          <th>Salidas</th>
                                          <th>Stock </th>
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

<!-- Main content - REPORTE PIVOT COMPRAS-->
<div class="content pb-2">
    <div class="container-fluid">
        <div class="row p-0 m-0">
            <div class="col-md-12">
                <div class="card card-info card-outline shadow ">
                    <div class="card-header">
                        <h3 class="card-title">Reporte Utilidad por productos y ventas</h3>

                    </div>
                    <div class=" card-body">

                        <div class="table-responsive">
                            <table id="tbl_utilidad"
                                class="table display table-hover text-nowrap compact  w-100  rounded">
                                <thead class="bg-info text-center">
                                    <tr>
                                        <th >Producto</th>
                                            <th >Cant. Vendida</th>
                                            <th >P. Venta</th>
                                            <th >P. Compra</th>
                                            <th >Utilidad Prod.</th>
                                            <th >Utilidad Ventas</th>
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
var tbl_ensal_prod, tbl_utilidad;

var Toast = Swal.mixin({
    toast: true,
    position: 'top',
    showConfirmButton: false,
    timer: 3000
});


$(document).ready(function() {
    StockProductosInSal();
    UtilidadProductos();
    


   

    
}) //////////// FIN DOCUMENT READY


  /***************************************************************************
     * INICIAR DATATABLE INVENTARIO
     ******************************************************************************/
    function StockProductosInSal() {
        var tbl_ensal_prod = $("#tbl_ensal_prod").DataTable({
            responsive: true,
            dom: 'Blfrtip',
           
            buttons: [{
                    "extend": 'excelHtml5',
                    "title": 'Reporte Ingresos y salidas',
                    "exportOptions": {
                        'columns': [0,1,2,3,4,5]
                    },
                    "text": '<i class="fa fa-file-excel"></i>',
                    "titleAttr": 'Exportar a Excel'
                },
                {
                    "extend": 'print',
                    "text": '<i class="fa fa-print"></i> ',
                    "titleAttr": 'Imprimir',
                    "exportOptions": {
                        'columns': [0,1,2,3,4,5]
                    },
                    "download": 'open'
                },
            
            ],
            ajax: {
                url: "ajax/ent_sal_ajax.php",
                dataSrc: "",
                type: "POST",
                data: {
                    'accion': 3
                },
            },
            columnDefs: [

                {
                      targets: 0,
                      sortable: false, //no ordene

                  },
            
                {
                    targets: 5,
                    createdCell: function(td, cellData, rowData, row, col) {
                        if (parseInt(rowData[5]) <= parseInt('5')) {
                            $(td).parent().css('background', '#FF5733')
                            // $(td).parent().css('color', '#ffffff')
                        }
                    }
                },
            
            ],

            "order": [
                  [0, 'desc']
              ],
            

            lengthMenu: [5, 10, 15, 20, 50],
            pageLength: 10,
            "language": idioma_espanol,
           
        });
    }



    /***************************************************************************
     * INICIAR DATATABLE INVENTARIO
     ******************************************************************************/
    function UtilidadProductos() {
        var tbl_utilidad = $("#tbl_utilidad").DataTable({
            responsive: true,
            dom: 'Blfrtip',
            async: false,
            processing: true,
            buttons: [{
                    "extend": 'excelHtml5',
                    "title": 'Reporte Utilidad productos',
                    "exportOptions": {
                        'columns': [0,1,2,3,4,5]
                    },
                    "text": '<i class="fa fa-file-excel"></i>',
                    "titleAttr": 'Exportar a Excel'
                },
                {
                    "extend": 'print',
                    "text": '<i class="fa fa-print"></i> ',
                    "titleAttr": 'Imprimir',
                    "exportOptions": {
                        'columns': [0,1,2,3,4,5]
                    },
                    "download": 'open'
                },
            
            ],
            ajax: {
                url: "ajax/ent_sal_ajax.php",
                dataSrc: "",
                type: "POST",
                data: {
                    'accion': 4
                },
            },
            columnDefs: [
            
               
            
            ],
            

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
