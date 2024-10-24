  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
          <!-- <div class="row mb-2">
              <div class="col-sm-6">
                  <h4 class="m-0">Clientes</h4>
              </div>
              <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                      <li class="breadcrumb-item active">Clientes</li>
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
                          <h3 class="card-title">Listado de Clientes</h3>
                          <button class="btn btn-info btn-sm float-right" id="abrirmodal_cliente"><i class="fas fa-plus"></i>
                              Nuevo</button>
                      </div>
                      <div class=" card-body">
                          <div class="table-responsive">
                              <table id="tbl_clientes" class="table display table-hover text-nowrap compact  w-100  rounded">
                                  <thead class="bg-info text-left">
                                      <tr>
                                          <th>Id</th>
                                          <th>Tipo</th>
                                          <th>Documento</th>
                                          <th>Cliente</th>
                                          <th>Direccion</th>
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
                                      <input type="text" id="id_cliente" hidden>
                                      <span class="small"> Tipo Doc.</span><span class="text-danger">*</span>
                                  </label>
                                  <select class="form-control form-control-sm js-example-basic-single" id="selTipoDoc" required>
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
                                  <input type="text" class=" form-control form-control-sm" id="text_direccion" name="text_direccion" placeholder="Direccion" >
                                  <div class="invalid-feedback">Debe ingresar una direccion</div>

                              </div>
                          </div>


                          <div class="col-lg-12">
                              <div class="form-group mb-2">
                                  <label for="" class="">
                                      <span class="small"> Celular</span><span class="text-danger">*</span>
                                  </label>
                                  <input type="text" class=" form-control form-control-sm" id="text_cel" name="text_cel" placeholder="Celular / telefono" >
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



  <script>
      var accion;
      var tbl_clientes, titulo_modal;

      var Toast = Swal.mixin({
          toast: true,
          position: 'top',
          showConfirmButton: false,
          timer: 3000
      });

      $(document).ready(function() {

        //OCULTAR LO BOTONES DE BUSQUEDAD
          $("#buscarDni").attr('hidden', true);
          $("#buscarRuc").attr('hidden', true);

          //PARA HABILITAR LO BOTONES DE BUSQUEDAD
          $("#selTipoDoc").change(function() {
              buscarDniRuc();
          });


          /***************************************************************************
           * INICIAR DATATABLE CLIENTES
           ******************************************************************************/
          var tbl_clientes = $("#tbl_clientes").DataTable({
              responsive: true,
              dom: 'Bfrtip',
              buttons: [{
                      "extend": 'excelHtml5',
                      "title": 'Reporte Clientes',
                      "exportOptions": {
                          'columns': [1, 2, 3, 4, 5, 6, 7]
                      },
                      "text": '<i class="fa fa-file-excel"></i>',
                      "titleAttr": 'Exportar a Excel'
                  },
                  {
                      "extend": 'print',
                      "text": '<i class="fa fa-print"></i> ',
                      "titleAttr": 'Imprimir',
                      "exportOptions": {
                          'columns': [1, 2, 3, 4, 5, 6, 7]
                      },
                      "download": 'open'
                  },
                  'pageLength',
              ],
              ajax: {
                  url: "ajax/clientes_ajax.php",
                  dataSrc: "",
                  type: "POST",
                  data: {
                      'accion': 1
                  }, //LISTAR 
              },
              columnDefs: [{
                  targets: 0,
                  visible: false

              }, {
                  targets: 5, //columna 2
                  sortable: false, //no ordene
                  render: function(data, type, full, meta) {
                      return "<center>" +
                          "<span class='btnEditarCliente  text-primary px-1' style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Editar Cliente'> " +
                          "<i class='fas fa-pencil-alt fs-6'></i> " +
                          "</span> " +
                          "<span class='btnEliminarCliente text-danger px-1'style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Eliminar Cliente'> " +
                          "<i class='fas fa-trash fs-6'> </i> " +
                          "</span>" +

                          "</center>"
                  }
              }],

              lengthMenu: [5, 10, 15, 20, 50],
              "pageLength": 10,
              "language": idioma_espanol,
              select: true
          });


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
                          $('#text_nombres').val(r.nombres + ' ' + r.apellidoPaterno + ' ' + r.apellidoMaterno);
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
                    //console.log(r);
                    if(r.numeroDocumento==ruc){
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
          $("#abrirmodal_cliente").on('click', function() {
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
                              datos.append("cliente_nombres", $("#text_nombres").val()); //modulo
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

                                          tbl_clientes.ajax.reload(); //recargamos el datatable 

                                          $("#modal_registro_cliente").modal('hide');

                                          $("#id_cliente").val("");
                                          $("#text_nombres").val("");
                                          $("#text_documento").val("");
                                          $("#text_cel").val("");
                                          $("#text_direccion").val("");
                                          $("#text_correo").val("");

                                          $("#selTipoDoc").val("");


                                          $(".needs-validation").removeClass("was-validated");

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


          /* ======================================================================================
           EVENTO AL DAR CLICK EN EL BOTON EDITAR CLIENTE
          =========================================================================================*/
          $("#tbl_clientes tbody").on('click', '.btnEditarCliente', function() {

              accion = 3; //seteamos la accion para editar
              titulo_modal = 'Actualizar';
              $("#modal_registro_cliente").modal({
                  backdrop: 'static',
                  keyboard: false
              });
              $("#modal_registro_cliente").modal('show'); //modal de registrar producto
              $("#titulo_modal_cliente").html('Actualizar Cliente');
              $("#btnregistrar_cliente").html('Actualizar');

              //var data = table.row($(this).parents('tr')).data();

              if (tbl_clientes.row(this).child.isShown()) {
                  var data = tbl_clientes.row(this).data();
              } else {
                  var data = tbl_clientes.row($(this).parents('tr'))
                      .data(); //OBTENER EL ARRAY CON LOS DATOS DE CADA COLUMNA DEL DATATABLE
                 // console.log("🚀 ~ file: CLIENTE.php ~ line 363 ~ $ ~ data", data);
              }

              $("#id_cliente").val(data[0]);
              
              $("#selTipoDoc").val(data[1]);
              $("#text_documento").val(data[2]);
              $("#text_nombres").val(data[3]);
              $("#text_direccion").val(data[4]);
              $("#text_cel").val(data[6]);
              // $("#text_direccion").attr('hidden', true); //ocultamos el tex             
              $("#text_correo").val(data[7]);

          })


          /* ======================================================================================
           EVENTO AL DAR CLICK EN EL BOTON ELIMINAR CLIENTE
          =========================================================================================*/
          $("#tbl_clientes tbody").on('click', '.btnEliminarCliente', function() {

              accion = 4; //seteamos la accion para Eliminar

              if (tbl_clientes.row(this).child.isShown()) {
                  var data = tbl_clientes.row(this).data();
              } else {
                  var data = tbl_clientes.row($(this).parents('tr'))
                      .data(); //OBTENER EL ARRAY CON LOS DATOS DE CADA COLUMNA DEL DATATABLE
                  //   console.log("🚀 ~ file: productos.php ~ line 751 ~ $ ~ data", data);
              }

              var cliente_id = data[0];
              //  console.log(id_usuario);

              Swal.fire({
                  title: 'Desea Eliminar el Cliente "' + data[2] + '" ?',
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Si, Eliminar',
                  cancelButtonText: 'Cancelar',
              }).then((result) => {

                  if (result.isConfirmed) {

                      var datos = new FormData();

                      datos.append("accion", accion);
                      datos.append("cliente_id",
                          cliente_id); //jalamos el codigo que declaramos mas arriba


                      $.ajax({
                          url: "ajax/clientes_ajax.php",
                          method: "POST",
                          data: datos, //enviamos lo de la variable datos
                          cache: false,
                          contentType: false,
                          processData: false,
                          dataType: 'json',
                          success: function(respuesta) {

                              if (respuesta == "ok") {

                                  Toast.fire({
                                      icon: 'success',
                                      title: 'El Cliente se Elimino de forma correcta'
                                      // title: titulo_msj
                                  });

                                  tbl_clientes.ajax.reload(); //recargamos el datatable

                              } else {
                                  Toast.fire({
                                      icon: 'error',
                                      title: 'El Cliente no se pudo Eliminar'
                                  });
                              }

                          }
                      });

                  }
              })

          })




          /* ======================================================================================
            EVENTO QUE LIMPIA EL INPUT  AL CERRAR LA VENTANA MODAL
           =========================================================================================*/
          $("#btncerrarmodal_cliente, #btncerrar_cliente").on('click', function() {
              $("#id_cliente").val("");
              $("#text_nombres").val("");
              $("#text_documento").val("");
              $("#text_cel").val("");
              $("#text_direccion").val("");
              $("#text_correo").val("");
              $("#selTipoDoc").val("");

          })


          /*===================================================================*/
          //EVENTO QUE LIMPIA LOS MENSAJES DE ALERTA DE INGRESO DE DATOS DE CADA INPUT AL CANCELAR LA VENTANA MODAL
          /*===================================================================*/
          document.getElementById("btncerrar_cliente").addEventListener("click", function() {
              $(".needs-validation").removeClass("was-validated");
          })
          document.getElementById("btncerrarmodal_cliente").addEventListener("click", function() {
              $(".needs-validation").removeClass("was-validated");
          })






      }) // FIN DOCUMEN READY


    



      //////////////////////////////////////////////////////////////////// FUNCIONES///////////////////////////////////////////////////////////////////////////////////////////////


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