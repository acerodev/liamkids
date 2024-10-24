<?php
require_once 'controladores/usuario.controlador.php';
require_once 'modelos/usuario.modelo.php';
session_start();
$nombre_sist = UsuarioControlador::ctrObtenerNombre_sistema();
    //  var_dump($nombre_sist[0]['imagen']);


if (isset($_GET["cerrar_sesion"]) && $_GET["cerrar_sesion"] == 1) {

    session_destroy();

    echo '
            <script>
            window.location = "' .Conexion::ruta(). '";
            </script>        
        ';
}
?>
<!-- http://localhost/sistropa/ -->
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIST-ROPA</title>

    <!-- <link rel="shortcut icon" href="vistas/assets/dist/img/AdminLTELogo.png" type="image/x-icon"> -->
    <link rel="shortcut icon" href="vistas/assets/imagenes/empresa/<?php echo $nombre_sist[0]['imagen'] ; ?>" type="image/x-icon">

    <!-- ============================================================================================================= -->
    <!-- REQUIRED CSS -->
    <!-- ============================================================================================================= -->

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="vistas/assets/plugins/fontawesome-free/css/all.min.css">

    <!-- Ionicons -->
    <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="vistas/assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <link rel="stylesheet" href="vistas/assets/plugins/sweetalert2/sweetalert2.min.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"> -->

    <!-- Jquery CSS -->
    <link rel="stylesheet" href="vistas/assets/plugins/jquery-ui/css/jquery-ui.css">

    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="vistas/assets/dist/css/bootstrap.min.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"> -->

    <!-- JSTREE CSS -->
    <link rel="stylesheet" href="vistas/assets/dist/css/style.min.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css" /> -->

    <link rel="stylesheet" type="text/css" href="vistas/assets/dist/css/select2.min.css" />
    <!-- ============================================================
    =ESTILOS PARA USO DE DATATABLES JS
    ===============================================================-->
    <link rel="stylesheet" href="vistas/assets/dist/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="vistas/assets/dist/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="vistas/assets/dist/css/buttons.dataTables.min.css">
    

    <!-- Theme style -->
    <link rel="stylesheet" href="vistas/assets/dist/css/adminlte.min.css">

    <!-- Estilos personzalidos -->
    <link rel="stylesheet" href="vistas/assets/dist/css/plantilla.css">

    <!-- ============================================================================================================= -->
    <!-- ============================================================================================================= -->
    <!-- ============================================================================================================= -->
    <!-- ============================================================================================================= -->
    <!-- REQUIRED SCRIPTS -->
    <!-- ============================================================================================================= -->
    <!-- ============================================================================================================= -->
    <!-- ============================================================================================================= -->
    <!-- ============================================================================================================= -->

    <!-- jQuery -->
    <script src="vistas/assets/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap 4 -->
    <script src="vistas/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- ChartJS -->
    <script src="vistas/assets/plugins/chart.js/Chart.min.js"></script>

    <script src="vistas/assets/dist/js/canvasjs.min.js"></script>
    <!-- <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script> -->

    <!-- InputMask -->
    <script src="vistas/assets/plugins/moment/moment.min.js"></script>
    <script src="vistas/assets/plugins/inputmask/jquery.inputmask.min.js"></script>

    <!-- SweetAlert2 -->
    <script src="vistas/assets/plugins/sweetalert2/sweetalert2.min.js"></script>

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> -->

    <!-- jquery UI -->
    <script src="vistas/assets/plugins/jquery-ui/js/jquery-ui.js"></script>

    <!-- JS Bootstrap 5 -->
    <script src="vistas/assets/dist/js/bootstrap.bundle5.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script> -->


    <!-- JSTREE JS -->
    <script src="vistas/assets/dist/js/jstree.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js"></script> -->


    <!-- ============================================================
    =LIBRERIAS PARA USO DE DATATABLES JS
    ===============================================================-->
    <script src="vistas/assets/dist/js/jquery.dataTables.min.js"></script>
    <script src="vistas/assets/dist/js/dataTables.responsive.min.js"></script>
    


    <!-- ============================================================
    =LIBRERIAS PARA EXPORTAR A ARCHIVOS
    ===============================================================-->
    <script src="vistas/assets/dist/js/dataTables.buttons.min.js"></script>
    <script src="vistas/assets/dist/js/jszip.min.js"></script>
    <script src="vistas/assets/dist/js/buttons.html5.min.js"></script>
    <script src="vistas/assets/dist/js/buttons.print.min.js"></script>

    <script type="text/javascript" src="vistas/assets/dist/js/select2.full.min.js"></script>

    <!-- AdminLTE App -->
    <script src="vistas/assets/dist/js/adminlte.min.js"></script>
    <script src="vistas/assets/dist/js/plantilla.js"></script>



</head>

<?php if (isset($_SESSION["usuario"])) : ?>

    <body class="hold-transition sidebar-mini layout-fixed text-sm sidebar-collapse">

        <div class="wrapper">

            <?php
            include "modulos/aside.php";
            include "modulos/navbar.php";
            ?>


            <div class="content-wrapper">

                <?php include "vistas/" . $_SESSION["usuario"]->vista ?>

            </div>
        </div>
        <script>
            function CargarContenido(pagina_php, contenedor) {
                $("." + contenedor).load(pagina_php);
            }

             /********************************************************************/
            // PARA BLOQUEAR ANTICLICK F12 CTR U
            /********************************************************************/
           /* document.oncontextmenu = function() {
                 return false
             };

             onkeydown = e => {
                 let tecla = e.which || e.keyCode;

                 // Evaluar si se ha presionado la tecla Ctrl:
                 if (e.ctrlKey) {
                     // Evitar el comportamiento por defecto del nevagador:
                     e.preventDefault();
                        e.stopPropagation();

                     // Mostrar el resultado de la combinaci贸n de las teclas:
                 if (tecla === 85)// U
                         console.log(" ");

                     if (tecla === 83) //S
                         console.log(" ");

                     if (tecla === 123) //F12
                         console.log(" ");
                 }
             }


             $(document).keydown(function(event) {
                 if (event.keyCode == 123) { // Prevent F12
                     return false;
                 } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) { // Prevent Ctrl+Shift+I        
                     return false;
                 }
             });*/
        </script>

    </body>

<?php else : ?>

    <body >

        <?php include "vistas/login.php"; ?>

    </body>

<?php endif; ?>

</html>