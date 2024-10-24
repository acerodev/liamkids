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
                  <div class="card card-info card-outline shadow ">
                      <div class="card-header">
                          <h3 class="card-title">Configuracion de la empresa</h3>
                          <button class="btn btn-success btn-sm float-right" id="abrirmodalLogo"><i
                                  class="fas fa-image"></i> Logo</button>

                      </div>
                      <div class=" card-body">
                          <form class="needs-validation" novalidate>
                              <div class="row">
                                  <div class="col-md-4">
                                      <div class="form-group mb-2">
                                          <label for="" class="">

                                              <span class="small"> Nombre del Sistema</span><span class="text-danger">*</span>
                                          </label>
                                         
                                          <input type="text" class=" form-control form-control-sm" id="text_nombre_sist"
                                              name="text_nombre_sist" required>
                                          <div class="invalid-feedback">Debe ingresar EL nombre del sistema</div>

                                      </div>
                                  </div>

                                  <div class="col-md-4">
                                      <div class="form-group mb-2">
                                          <label for="" class="">

                                              <span class="small"> Razon Social</span><span class="text-danger">*</span>
                                          </label>
                                          <input type="hidden" name="" id="id" >
                                          <input type="text" class=" form-control form-control-sm" id="text_razon"
                                              name="text_razon" required>
                                          <div class="invalid-feedback">Debe ingresar la Razon social</div>

                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="form-group mb-2">
                                          <label for="" class="">
                                             
                                              <span class="small">Ruc</span><span class="text-danger">*</span>
                                          </label>
                                          <input type="text" class=" form-control form-control-sm" id="text_ruc"
                                              name="text_ruc" required>
                                          <div class="invalid-feedback">Debe ingresar el ruc</div>

                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group mb-2">
                                          <label for="" class="">
                                             
                                              <span class="small">Direccion</span><span class="text-danger">*</span>
                                          </label>
                                          <input type="text" class=" form-control form-control-sm" id="text_direccion"
                                              name="text_direccion" required>
                                          <div class="invalid-feedback">Debe ingresar la Direccion</div>

                                      </div>
                                  </div>
                                  <div class="col-md-3">
                                      <div class="form-group mb-2">
                                          <label for="" class="">
                                              
                                              <span class="small">Celular</span><span class="text-danger">*</span>
                                          </label>
                                          <input type="text" class=" form-control form-control-sm" id="text_celular"
                                              name="text_celular" required>
                                          <div class="invalid-feedback">Debe ingresar un celular</div>

                                      </div>
                                  </div>
                                  <div class="col-md-2">
                                      <div class="form-group mb-2">
                                          <label for="" class="">
                                         
                                              <span class="small">Moneda</span><span class="text-danger">*</span>
                                          </label>
                                          <input type="text" class=" form-control form-control-sm" id="text_moneda"
                                              name="text_moneda" required>
                                          <div class="invalid-feedback">Debe ingresar la Moneda</div>

                                      </div>
                                  </div>

                                  <div class="col-lg-2">
                                      <div class="form-group mb-2">
                                          <label for="" class="">
                                             
                                              <span class="small">Tipo Imp.</span><span class="text-danger">*</span>
                                          </label>
                                          <input type="text" class=" form-control form-control-sm" id="text_tipo_impuesto"
                                              name="text_tipo_impuesto" required>
                                          <div class="invalid-feedback">Debe ingresar el tipo de impuesto</div>

                                      </div>
                                  </div>

                                  <div class="col-md-2">
                                      <div class="form-group mb-2">
                                          <label for="" class="">
                                         
                                              <span class="small">Impuesto</span><span class="text-danger">*</span>
                                          </label>
                                          <input type="text" class=" form-control form-control-sm" id="text_igv"
                                              name="text_igv" required>
                                          <div class="invalid-feedback">Debe ingresar el impuesto</div>

                                      </div>
                                  </div>

                                 
                                  <div class="col-lg-3">
                                      <div class="form-group mb-2">
                                          <label for="" class="">
                                             
                                              <span class="small">Correo</span><span class="text-danger">*</span>
                                          </label>
                                          <input type="text" class=" form-control form-control-sm" id="text_correo"
                                              name="text_correo" required>
                                          <div class="invalid-feedback">Debe ingresar la Direccion</div>

                                      </div>
                                  </div>

                                  <div class="col-lg-3">
                                      <div class="form-group mb-2">
                                          <label for="" class="">
                                             
                                              <span class="small">Nombre Moneda 1</span><span class="text-danger">*</span>
                                          </label>
                                          <input type="text" class=" form-control form-control-sm" id="text_nombre_moneda1"
                                              name="text_nombre_moneda1" placeholder="SOLES">
                                          <div class="invalid-feedback">Debe ingresar el nombre moneda </div>

                                      </div>
                                  </div>
                                  <div class="col-lg-3">
                                      <div class="form-group mb-2">
                                          <label for="" class="">
                                             
                                              <span class="small">Nombre Moneda 2</span><span class="text-danger">*</span>
                                          </label>
                                          <input type="text" class=" form-control form-control-sm" id="text_nombre_moneda2"
                                              name="text_nombre_moneda2" placeholder="CENTIMOS">
                                          <div class="invalid-feedback">Debe ingresar el nombre moneda </div>

                                      </div>
                                  </div>

                                  <div class="col-lg-2">
                                      <div class="form-group mb-2">
                                          <label for="" class="">
                                             
                                              <span class="small">Cuenta</span><span class="text-danger">*</span>
                                          </label>
                                          <input type="text" class=" form-control form-control-sm" id="text_cuenta"
                                              name="text_cuenta" required>
                                          <!-- <div class="invalid-feedback">Debe ingresar la Direccion</div> -->

                                      </div>
                                  </div>
                                  <div class="col-lg-4">
                                      <div class="form-group mb-2">
                                          <label for="" class="">
                                             
                                              <span class="small">Nro Cuenta</span><span class="text-danger">*</span>
                                          </label>
                                          <input type="text" class=" form-control form-control-sm" id="text_nro_cuenta"
                                              name="text_nro_cuenta" required>
                                          <!-- <div class="invalid-feedback">Debe ingresar la Direccion</div> -->

                                      </div>
                                  </div>
                              </div>

                          </form>

                      </div>
                      <div class="card-footer">
                          <button class="btn btn-info btn-sm float-left" id="btnGuardar"><i class="fas fa-save"></i>
                              Guardar</button>
                      </div>
                  </div>
              </div>

          </div>

      </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->



  <!-- MODAL MODIFICAR FOTO AL PRODUCTO -->
  <div class="modal fade" id="mdlmodificar_foto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">

              <div class="modal-header bg-gray py-2">
                  <h6 class="modal-title" id="titulo_modal_code">Insertar Logo</h6>
                  <button type="button" class="btn-close text-white fs-6" data-bs-dismiss="modal" aria-label="Close"
                      id="btnCerrarModalMod_foto">
                  </button>
              </div>

              <div class="modal-body">

                  <div class="row">



                      <div class="col-md-12">
                          <div class="form-group mb-2">
                              <label class="" for="">
                                  <span class="small">Seleccione una imagen </span>
                              </label>
                              <input type="file" class="form-control form-control-sm" id="text_imagen" accept="image/*"
                                  onchange="previewFile(this);">


                          </div>

                      </div>
                      <div class="col-12 col-lg-5">
                          <div style="width:100%; height:280px;">
                              <img id="previewImg" src="vistas/assets/imagenes/empresa/default.png"
                                  class="border border-secondary" style="objet-filt:cover; width:120%; height:100%;"
                                  alt="">

                          </div>

                      </div>
                      <input type="hidden" name="edit_foto" id="edit_foto_m">

                  </div>

              </div>

              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"
                      id="btnCancelarMod_foto">Cancelar</button>
                  <a class="btn btn-primary btn-sm " id="btnMod_foto_p">Actualizar</a>
              </div>

          </div>
      </div>
  </div>

  <script>
var accion;

var Toast = Swal.mixin({
    toast: true,
    position: 'top',
    showConfirmButton: false,
    timer: 3000
});
$(document).ready(function() {

    /* ======================================================================================
      TRAER LOS DATOS
      ======================================================================================*/
    CargarDatosEmpresa();




    /*===================================================================*/
    //EVENTO QUE GUARDA LOS DATOS DEL PRODUCTO, PREVIA VALIDACION DEL INGRESO DE LOS DATOS OBLIGATORIOS
    /*===================================================================*/
    document.getElementById("btnGuardar").addEventListener("click", function() {

        // Get the forms we want to add validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {

            //si se ingresan todos los datos 
            if (form.checkValidity() === true) {
                const inputImage = document.querySelector('#text_imagen');

                // console.log("Listo para registrar el producto")
                Swal.fire({
                    title: 'Está seguro de Actualizar la informacion?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Si',
                    cancelButtonText: 'Cancelar',
                }).then((result) => {
                    if (result.isConfirmed) {



                        var datos = new FormData();

                        datos.append("accion", 2);
                        datos.append("id_empresa", $("#id").val()); //id
                        datos.append("razon_social", $("#text_razon").val()); //nombre
                        datos.append("ruc", $("#text_ruc").val()); //peso
                        datos.append("direccion", $("#text_direccion").val());
                        datos.append("moneda", $("#text_moneda").val());
                        datos.append("celular", $("#text_celular").val());
                        datos.append("email", $("#text_correo").val());
                        datos.append("igv", $("#text_igv").val());
                        datos.append("cuenta", $("#text_cuenta").val());
                        datos.append("nro_cuenta", $("#text_nro_cuenta").val());
                        datos.append("nombre_sistema", $("#text_nombre_sist").val());
                        datos.append("tipo_impuesto", $("#text_tipo_impuesto").val());  
                        datos.append("soles", $("#text_nombre_moneda1").val());
                        datos.append("centimos", $("#text_nombre_moneda2").val());
                        // datos.append('archivo[]', inputImage.files[0]);


                        $.ajax({
                            url: "ajax/configuracion_ajax.php",
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
                                        title: 'Datos Actualizados'
                                        //title: titulo_msj
                                    });

                                    $(".needs-validation").removeClass(
                                        "was-validated");

                                } else {
                                    Toast.fire({
                                        icon: 'error',
                                        title: 'no se pudo Actualizar'
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


    /*===================================================================*/
    //HACER CLICK EN ABRIR MODAL REGISTRAR PRODUCTOS
    /*===================================================================*/
    $("#abrirmodalLogo").on('click', function() {
        AbrirModalRegistroLogo();
    })


    /* ======================================================================================
    ACTUALIZAR IMAGEN DEL PRODUCTO
    =========================================================================================*/
    $("#btnMod_foto_p").on('click', function() {
        accion = 3; //PARA GUARDA LA IMAGEN

        var id_empre = $("#id").val();
        const inputImage = document.querySelector('#text_imagen');

        Swal.fire({
            title: 'Está seguro de Guardar el Logo?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Guardar!',
            cancelButtonText: 'Cancelar',
        }).then((result) => {

            if (result.isConfirmed) {

                var datos = new FormData();

                datos.append("accion", accion);
                datos.append("id_empresa", id_empre);
                datos.append('archivo[]', inputImage.files[0]);


                $.ajax({
                    url: "ajax/configuracion_ajax.php",
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
                                title: 'Logo Guardado '
                                // title: titulo_msj
                            });

                            $("#mdlmodificar_foto").modal('hide');
                          
                            $("#text_imagen").val("");


                        } else {
                            Toast.fire({
                                icon: 'error',
                                title: 'No se puede Guardar'
                            });
                        }

                    }
                });

            }
        })


    })



}) ///////////////FIN DOCUMENT READY




//FUNCIONES


/*===================================================================*/
//FUNCION PARA CARGAR EL NRO DE BOLETA
/*===================================================================*/
function CargarDatosEmpresa() {

    $.ajax({
        async: false,
        url: "ajax/configuracion_ajax.php",
        method: "POST",
        data: {
            'accion': 1
        },
        dataType: 'json',
        success: function(respuesta) {

            id_empresa = respuesta["id_empresa"];
            razon_social = respuesta["razon_social"]; //campos de base
            ruc = respuesta["ruc"];
            direccion = respuesta["direccion"];
            celular = respuesta["celular"];
            moneda = respuesta["moneda"];
            // nro_correlativo_venta = respuesta["nro_correlativo_venta"];
            email = respuesta["email"];
            imagen = respuesta["imagen"];
            igv = respuesta["igv"];
            cuent = respuesta["cuenta"];
            nro_cuent = respuesta["nro_cuenta"];

            $("#id").val(id_empresa);
            $("#text_razon").val(razon_social); //SETEAMOS EN LOS TEXTBOX
            $("#text_ruc").val(ruc);
            $("#text_direccion").val(direccion);
            $("#text_celular").val(celular);
            $("#text_moneda").val(moneda);

            $("#text_correo").val(email);
            // $("#text_imagen").val(imagen);
              $("#edit_foto").val(imagen);
              $("#text_igv").val(igv);
              $("#text_cuenta").val(cuent);
              $("#text_nro_cuenta").val(nro_cuent);
              $("#text_nombre_sist").val(respuesta["nombre_sistema"]);
              $("#text_tipo_impuesto").val(respuesta["tipo_impuesto"]);
              $("#text_nombre_moneda1").val(respuesta["soles"]);
              $("#text_nombre_moneda2").val(respuesta["centimos"]);

            //     if(imagen != ""){
            //         $("#previewImg").attr('src', 'vistas/assets/imagenes/empresa/'+imagen)   
            //     }
        }
    });
}

function CargarDatosEmpresaLogo() {

$.ajax({
    async: false,
    url: "ajax/configuracion_ajax.php",
    method: "POST",
    data: {
        'accion': 1
    },
    dataType: 'json',
    success: function(respuesta) {

     
        imagen = respuesta["imagen"];


         //$("#text_imagen").val(imagen);
          //$("#edit_foto_m").val(imagen);

            if(imagen != ""){
                $("#previewImg").attr('src', 'vistas/assets/imagenes/empresa/'+imagen)
            }else {
                $("#previewImg").attr('src', 'vistas/assets/imagenes/empresa/default.png')
            }
    }
});
}
function AbrirModalRegistroLogo() {
    //para que no se nos salga del modal haciendo click a los costados
    $("#mdlmodificar_foto").modal({
        backdrop: 'static',
        keyboard: false
    });
    $("#mdlmodificar_foto").modal('show'); //abrimos el modal
    $("#btnMod_foto_p").html('Registrar');

    CargarDatosEmpresaLogo();

}

/*===================================================================*/
//PREVIEW DE LA IMAGEN
/*===================================================================*/
function previewFile(input) {
    var file = $("input[type=file]").get(0).files[0];
    if (file["type"] != "image/jpeg" && file["type"] != "image/png") {
        $("#text_imagen").val('');

        Toast.fire({
            icon: 'error',
            title: 'La imagen debe ser jpeg o png!'

        });
    } else if (file["size"] > 2000000) {

        $("#text_imagen").val('');
        Toast.fire({
            icon: 'error',
            title: 'La imagen no debe pesar más de 2mb!'
            //footer: '<a href>Why do I have this issue?</a>'
        });
    } else {
        // if(file){
        var reader = new FileReader();
        reader.onload = function() {
            $("#previewImg").attr("src", reader.result);
        }
        reader.readAsDataURL(file);
    }

}
  </script>