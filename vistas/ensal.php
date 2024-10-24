  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
          <!-- <div class="row mb-2">
              <div class="col-sm-6">
                  <h1 class="m-0">Configuracion</h1>
              </div>
              <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                      <li class="breadcrumb-item active">Configuracion</li>
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
                  <div class="card card-info shadow ">
                      <div class="card-header">
                          <h3 class="card-title">Listado de Entradas y Salidas</h3>

                      </div>
                      <div class=" card-body">
                          <div class="table-responsive">
                              <table id="tbl_en_sal"
                                  class="table display table-hover text-nowrap compact  w-100  rounded">
                                  <!-- <table id="tbl_categorias" class="table display table-hover text-nowrap compact  w-100  rounded"> -->
                                  <thead class="bg-info">
                                      <tr>
                                          <!-- <th>Id</th> -->
                                          <th>Codigo</th>
                                          <th>Descrpcion</th>
                                          <th>precio</th>
                                          <th>Ingresos</th>
                                          <th>Salidas</th>
                                          <th>Stock </th>
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


    <!-- HACER CLICK EN BOTON PARA ENVIAR AL REPORTE STOCK POR PRODUCTO -->
    <div class="content pb-2">
      <div class="container-fluid">
          <div class="row p-0 m-0">
              <div class="col-md-12">
                  <div class="card card-success shadow ">
                      <div class="card-header">
                          <h3 class="card-title">Reporte Stock por Producto</h3>

                      </div>
                      <div class=" card-body">
                      <div class="">
                                <div class="form-group m-0">
                                    <a class="btn btn-primary btn-sm" id="btnReportStock">Reporte Inventario  <i class="fas fa-file-alt"></i></a>
                                </div>
                            </div>
                      </div>
                  </div>
              </div>

          </div>

      </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->

  <!-- MODAL MOCIMIENTOS POR PRODUCTOS-->
<div class="modal fade" id="modal_movi_producto" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-gray py-1 align-items-center">
                <h5 class="modal-title" id="">Movimientos por Producto </h5>&nbsp;&nbsp; <label for="" id="codigo_prod"></label>
                <button type="button" class="close  text-white border-0 fs-5" id="btncerrarmodal_detalle" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                      <div class="table-responsive">
                        <table id="tbl_movi_prod" class="table display table-hover text-nowrap compact  w-100  rounded" style="width:100%;">
                            <thead class="text-center bg-info">
                                <tr>
                                   
                                    <th>Codigo</th>
                                    <th style="text-align: center;">Comprobante</th>
                                    <th>Concepto</th>
                                    <th>Fecha</th>
                                    <th>Ingresos</th>
                                    <th>Salidas</th>
                                   
                                </tr>
                            </thead>
                            <tbody style="text-align: center;">
                            </tbody>
                            <tfoot style="text-align: center;">
                              <tr>
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

               
                    <!-- <div class="table-responsive">
                        <table id="tbl_movi_prod" class="table display table-hover text-nowrap compact  w-100  rounded" style="width:100%;">
                            <thead class="text-center bg-info">
                                <tr>
                                   
                                    <th>Codigo</th>
                                    <th style="text-align: center;">Comprobante</th>
                                    <th>Cliente</th>
                                    <th>Fecha</th>
                                    <th>Cant.</th>
                                    <th>Precio</th>
                                    <th>Total</th>
                                    <th>IDCLIENTE</th>
                                   
                                </tr>
                            </thead>
                            <tbody style="text-align: center;">
                            </tbody>
                            <tfoot style="text-align: center;">
                              <tr>
                                  <th></th>
                                  <th></th>
                                  <th></th>
                                  <th>Total:</th>
                                  <th></th>
                                  <th></th>
                                  <th></th>
                                  <th></th>
                                
                              </tr>
                          </tfoot>
                        </table>
                        
                    </div> -->
               
                    
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal" id="btncerrar_detallee">Cerrar</button>
                <!-- <button type="button" class="btn btn-primary btn-sm" id="btnregistrar_cliente">Registrar</button> -->
            </div>
        </div>
    </div>
</div>
<!-- fin Modal -->



  <script>
    var tbl_en_sal, tbl_movi_prod;
    var accion ;
        var Toast = Swal.mixin({
            toast: true,
            position: 'top',
            showConfirmButton: false,
            timer: 3000
        });

    $(document).ready(function() {

    /***************************************************************************
     * INICIAR DATATABLE INVENTARIO
     ******************************************************************************/
    var tbl_en_sal = $("#tbl_en_sal").DataTable({
        responsive: true,
        dom: 'Bfrtip',
        buttons: [{
                "extend": 'excelHtml5',
                "title": 'Reporte Ingresos y salidas',
                "exportOptions": {
                    'columns': [1,2,3,4,5,6]
                },
                "text": '<i class="fa fa-file-excel"></i>',
                "titleAttr": 'Exportar a Excel'
            },
            {
                "extend": 'print',
                "text": '<i class="fa fa-print"></i> ',
                "titleAttr": 'Imprimir',
                "exportOptions": {
                    'columns': [1,2,3,4,5,6]
                },
                "download": 'open'
            },
            'pageLength',
        ],
        ajax: {
            url: "ajax/ent_sal_ajax.php",
            dataSrc: "",
            type: "POST",
            data: {
                'accion': 1
            },
        },
        columnDefs: [
            // {
            //     targets: 0,
            //     visible: false

            // },
            {
                targets: 2,
                visible: false

            },{
                targets: 6, //columna 2
                sortable: false, //no ordene
                render: function(data, type, full, meta) {
                    return "<center>" +
                        "<span class='btnMovimiento_p text-primary px-1' style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Ver Movimientos'> " +
                        "<i class='fas fa-eye fs-6'></i> " +
                        "</span> " +
                        "<span class='btnImprimirMovi text-danger px-1' style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='imprimir Movimientos'> " +
                        "<i class='fas fa-print fs-6'></i> " +
                        "</span> " +
                        
                        "</center>"
                }
            }
           
        ],

        lengthMenu: [0, 5, 10, 15, 20, 50],
        "pageLength": 10,
        "language": idioma_espanol,
        select: true
    });



    /***************************************************************************
     * IHACER CLICK EN BOTON VER MOVIMIENTOS
     ******************************************************************************/
    $('#tbl_en_sal tbody').on('click', '.btnMovimiento_p', function() {
        if (tbl_en_sal.row(this).child.isShown()) {
                var data = tbl_en_sal.row(this).data();
            } else {
                var data = tbl_en_sal.row($(this).parents('tr')).data(); //OBTENER EL ARRAY CON LOS DATOS DE CADA COLUMNA DEL DATATABLE
                console.log(data[1], data[2]);
            }

            $("#modal_movi_producto").modal({
                backdrop: 'static',
                keyboard: false
            });
            $("#modal_movi_producto").modal('show'); //abrimos el modal*/

            //$("#codigo_prod").innerHTML (data[1]);
            document.getElementById('codigo_prod').innerHTML = '('+ data[0] + ' - ' + data[1]+')' ;
            Traer_Detalle(data[0]);

            

    })



    /********************************************************************
          		IMPRIMIR REPORTE
    ********************************************************************/
          $('#btnReportStock').on('click', function() {               
              window.open("MPDF/reporte_pro_tallas_stock.php", "#zoom=90", "Reporte inventario", "scrollbards=NO");
          });


    /********************************************************************
          		IMPRIMIR REPORTE MOVIMIENTOS
    ********************************************************************/
    $('#tbl_en_sal').on('click', '.btnImprimirMovi', function() { //class foto tiene que ir en el boton
              var data = tbl_en_sal.row($(this).parents('tr')).data(); //tama単o de escritorio
              if (tbl_en_sal.row(this).child.isShown()) {
                  var data = tbl_en_sal.row(this).data(); //para celular y usas el responsive datatable
               
              }
             // console.log(data);

              window.open("MPDF/reporte_movimientos_pro.php?codigo=" + parseInt(data[0]) + "#zoom=100", "Movimientos por productos", "scrollbards=NO");
          });



    }) // FIN DOCUMENT READY


    function Traer_Detalle(codigo_p) {
        tbl_movi_prod = $("#tbl_movi_prod").DataTable({
            responsive: true,
            destroy: true,
            //searching: false,
            dom: 'lftp',
         
            
            ajax: {
                url: "ajax/ent_sal_ajax.php",
                dataSrc: "",
                type: "POST",
                data: {
                    'accion': 2,
                    'codigo_p': codigo_p
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

                 

              },
              
              
            lengthMenu: [5, 10, 15, 20, 50],
             pageLength: 20,
            "language": idioma_espanol,
            select: true
        });
    }




    var idioma_espanol = {
        select: {
            rows: "%d fila seleccionada"
        },
        "sProcessing": "Procesando...",
        "sLengthMenu": "_MENU_ ",
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


