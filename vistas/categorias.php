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

<div class="content pb-2">
    <div class="row p-0 m-0">

        <!--LISTADO DE CATEGORIAS -->
        <div class="col-md-8">
            <div class="card card-info card-outline shadow">
                <div class="card-header">
                    <h3 class="card-title"> Listado de Categorias</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table id="lstCategorias" class="table display table-hover text-nowrap compact  w-100  rounded">
                        <thead class="bg-info">
                            <th>id</th>
                            <th>Categoria</th>
                            <!-- <th>Medida</th> -->
                            <th class="text-center">Opciones</th>
                        </thead>
                        <tbody class="small text left">

                        </tbody>
                    </table>
                 </div>
                </div>
            </div>
        </div>

         <!--FORMULARIO PARA REGISTRO Y EDICION -->
        <div class="col-md-4">
            <div class="card card-info card-outline shadow">
                <div class="card-header">
                    <h3 class="card-title"> Registro de Categorias</h3>
                </div>
                <div class="card-body">

                    <form class="needs-validation" novalidate>

                        <div class="row">

                            <div class="col-md-12">

                                <div class="form-group mb-2">
                                    
                                    <label  class="col-form-label" for="iptCategoria">
                                        
                                        <span class="small">Categoria</span><span class="text-danger">*</span>
                                    </label>
                                    
                                    <input type="text" class="form-control form-control-sm" id="iptCategoria"
                                        name="iptCategoria" placeholder="Ingrese la Categoria" required>
                                    
                                    <div class="invalid-feedback">Debe ingresar la categoria</div>

                                </div>

                            </div>

                            <!-- <div class="col-md-12">

                                <div class="form-group mb-2">

                                    <label  class="col-form-label" for="selMedida">
                                        
                                        <span class="small">U. Medida</span><span class="text-danger">*</span>
                                    </label>
                                    
                                    <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="selMedida" required>
                                        <option value="">--Seleccione una medida--</option>
                                        <option value="0">Unidades</option>
                                        <option value="1">Kilogramos</option>
                                        <option value="2">Paquete</option>
                                    </select>
                                    
                                    <div class="invalid-feedback">Seleccione una medida</div>

                                </div>

                            </div> -->

                            <div class="col-md-12">
                                <div class="form-group m-0 mt-2">
                                    <a style="cursor:pointer;"
                                        class="btn btn-primary btn-sm w-100"
                                        id="btnRegistrarCategoria">Registrar Categoria
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>  
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var accion ;

        var Toast = Swal.mixin({
            toast: true,
            position: 'top',
            showConfirmButton: false,
            timer: 3000
        });
        
        $(document).ready(function() {

             //variables para registrar o editar la categoria
            var idCategoria = 0;        
            var categoria = "";
            //var medida = "";

            var tableCategorias = $('#lstCategorias').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'excel', 'print', 'pageLength',
                ],
                ajax: {
                    url: 'ajax/categorias.ajax.php',
                    dataSrc: ""
                },
                columnDefs: [
                    // {
                    //     targets: 2,
                    //     sortable: false,
                    //     createdCell: function(td, cellData, rowData, row, col) {

                    //         if (parseInt(rowData[2]) == 0) {
                    //             $(td).html("Und(s)")
                    //         } else {
                    //             $(td).html("Kg(s)")
                    //         }

                    //     }
                    // },
                    {
                        targets: 2,
                        sortable: false,
                        render: function(data, type, full, meta) {
                            return "<center>" +
                                        "<span class='btnEditarCategoria text-primary px-1' style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Editar Categoría'> " +
                                        "<i class='fas fa-pencil-alt fs-5'></i> " +
                                        "</span> " +
                                        "<span class='btnEliminarCategoria text-danger px-1'style='cursor:pointer;' data-bs-toggle='tooltip' data-bs-placement='top' title='Eliminar Categoría'> " +
                                        "<i class='fas fa-trash fs-5'> </i> " +
                                        "</span>" +
                                "</center>";
                        }
                    }
                ],
                "order": [[ 0, 'desc' ]],
                lengthMenu: [0, 5, 10, 15, 20, 50],
                "pageLength": 15,
                "language": idioma_espanol,
                 select: true
            });

            $('#lstCategorias tbody').on('click', '.btnEditarCategoria', function() {

                var data = tableCategorias.row($(this).parents('tr')).data();

                if ($(this).parents('tr').hasClass('selected')) {

                    $(this).parents('tr').removeClass('selected');

                    idCategoria = 0;
                    $("#iptCategoria").val("");
                   // $("#selMedida").val("");

                }else{

                    tableCategorias.$('tr.selected').removeClass('selected');                    
                    $(this).parents('tr').addClass('selected'); 

                    idCategoria = data[0];
                    $("#iptCategoria").val(data[1]);
                   // $("#selMedida").val(data[2]);

                    
                }
            })

            $('#lstCategorias tbody').on('click', '.btnEliminarCategoria', function() {
                accion = 1;

                var data = tableCategorias.row($(this).parents('tr')).data();
                
                var id_categoria = data[0];
                //console.log(id_categoria);


                Swal.fire({
                    title: 'Está seguro de eliminar la categoría ' + data[1] +'?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Aceptar!',
                    cancelButtonText: 'Cancelar!',
                }).then((result) => {
                    if (result.isConfirmed) {

                        var datos = new FormData();

                        datos.append("accion", accion);
                        datos.append("id_categoria", id_categoria); //jalamos el codigo que declaramos mas arriba


                        $.ajax({
                            url: "ajax/categorias.ajax.php",
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
                                        title: 'La Categoria se Elimino de forma correcta'
                                        // title: titulo_msj
                                    });

                                    tableCategorias.ajax.reload(); //recargamos el datatable

                                } else {
                                    Toast.fire({
                                        icon: 'error',
                                        title: 'La Categoria no se pudo Eliminar'
                                    });
                                }

                            }
                        });

                        }
                })
            })
            

            document.getElementById("btnRegistrarCategoria").addEventListener("click", function() {

                // Get the forms we want to add validation styles to
                var forms = document.getElementsByClassName('needs-validation');

                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {

                    if (form.checkValidity() === true) { 
                        
                        categoria = $("#iptCategoria").val();
                        //medida = $("#selMedida").val();

                        var datos = new FormData();

                        datos.append("idCategoria",idCategoria);
                        datos.append("categoria",categoria);
                        //datos.append("medida",medida);
                        
                        Swal.fire({
                            title: 'Está seguro de guardar la categoría?',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Aceptar!',
                            cancelButtonText: 'Cancelar!',
                        }).then((result) => {

                            if (result.isConfirmed) {
                                
                                $.ajax({
                                    url: "ajax/categorias.ajax.php",
                                    type: "POST",
                                    data: datos,
                                    cache: false,
                                    contentType: false,
                                    processData: false,
                                    dataType: 'json',
                                    success:function(respuesta){

                                        Toast.fire({
                                            icon: 'success',
                                            title: respuesta
                                        });
                                        
                                        idCategoria = 0;
                                        categoria = "";
                                        //medida = "";

                                        $("#iptCategoria").val("");
                                        //$("#selMedida").val("");

                                        tableCategorias.ajax.reload();
                                        $(".needs-validation").removeClass("was-validated");
                                    }
                                });
                            }
                        })
                    }

                    form.classList.add('was-validated');

                })
                
            });
        })


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