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


<!-- Main content - COMPRAS DEL DIA -->
<div class="content pb-2">
    <div class="container-fluid">
        <div class="row p-0 m-0">
            <div class="col-md-12">
                <div class="card card-info card-outline shadow ">
                    <div class="card-header">
                        <h3 class="card-title">Reporte de Movimientos por Fechas</h3>

                    </div>
                    <div class=" card-body">

                        <div class="row">
                            
                          <div class="col-md-2">
                              <div class="form-group mb-2">
                                 <label for="" class="">
                                      <span class="small"> Tipo Movimiento</span>
                                  </label>
                                  <select name="" id="select_tipo_movi" class="form-select form-select-sm" aria-label=".form-select-sm example" required>
                                      <option value="">Seleccione...</option>
                                      <option value="INGRESO">INGRESO</option>
                                      <option value="EGRESO">EGRESO</option>
                                  </select>

                                  <div class="invalid-feedback">Seleccione un tipo de movimiento</div>

                              </div>
                          </div>
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
                                        <input type="date" class="form-control form-control-sm"
                                            max="<?php echo date("Y-m-d"); ?>" data-inputmask-alias="datetime"
                                            data-inputmask-inputformat="dd/mm/yyyy" id="text_fecha_F">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 d-flex flex-row align-items-center justify-content-end">
                                <div class="form-group m-0"><a class="btn btn-primary btn-sm" style="width:120px;"
                                        id="btnFiltrar">Buscar</a></div>
                            </div>
                        </div><br>



                        <div class="table-responsive">
                            <table id="tbl_rpt_movi"
                                class="table display table-hover text-nowrap compact  w-100  rounded">
                                <thead class="bg-info text-center">
                                    <tr>
                                         
                                          <th>Tipo Movi.</th>
                                          <th>Descripcion</th>
                                          <th>Monto</th>
                                          <th>Fecha</th>
                                          <th>Resp.</th>
                                          <th>Estado Caja</th>
                                          
                                      </tr>
                                </thead>
                                <tbody class="small text-center">
                                </tbody>
                                <tfoot class="small text-center">
                                    <tr>
                                        <th></th>
                                        <th>Total:</th>
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


<script>
      var accion;
      var tbl_rpt_movi;

      var Toast = Swal.mixin({
          toast: true,
          position: 'top',
          showConfirmButton: false,
          timer: 3000
      });
      $(document).ready(function() {
        fechas();
        filtroporFechas();

        
    /****************************************** */
    //FILTRAR EN EL REPORTE VENTAS DEL DIA
    /****************************************** */
    $("#btnFiltrar").on('click', function() {
        filtroporFechas();
        validar();
    })


      }) //FIN DOCUMENT READY



      
/****************************************** */
//LISTAS LAS COMPRAS POR RANGO DE FECHA
/****************************************** */
function filtroporFechas() {
    movi = $("#select_tipo_movi").val();
    fecha_ini = $("#text_fecha_I").val(); 
    fecha_fin = $("#text_fecha_F").val();

    tbl_rpt_movi = $("#tbl_rpt_movi").DataTable({
        responsive: true,
        destroy: true,
        //paging: false,
        async: false,
        processing: true,

        dom: 'Blfrtip',
        buttons: [{
                "extend": 'excelHtml5',
                "title": 'Reporte de Movimientos',
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
            url: "ajax/rpt_movi_ajax.php",
            dataSrc: "",
            type: "POST",
            data: {
                'accion': 1,
                'movi': movi,
                'fecha_ini': fecha_ini,
                'fecha_fin': fecha_fin
               
            }, //LISTAR 
        },
        columnDefs: [
            {
                      targets: 0,
                      sortable: false, //no ordene

                  },
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
        "order": [
                  [0, 'desc']
              ],

        lengthMenu: [5, 10, 15, 20, 50],
        pageLength: 10,
        "language": idioma_espanol,
        select: true
    });


}




/****************************************** */
//VALIDAR QUE COLOQUEN FECHAS CORRECTAS
/****************************************** */
function validar() {
    let fecha_ini = document.getElementById('text_fecha_I').value;
    let fecha_fin = document.getElementById('text_fecha_F').value;
    let val_movi = document.getElementById('select_tipo_movi').value;
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

    if (val_movi.length == 0) {
        Toast.fire({
            icon: 'error',
            title: ' Debe seleccionar un tipo de movimiento'
        })
        //$("#fecha_fin").focus();
        return false;
    }
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