<?php

    $menuUsuario = UsuarioControlador::ctrObtenerMenuUsuario($_SESSION["usuario"]->id_usuario);
    $nombre_sist = UsuarioControlador::ctrObtenerNombre_sistema();
    // var_dump($nombre_sist[0]['imagen']);

?>

<!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4 ">

     <!-- Brand Logo  sidebar-light-navy          bg-navy-->
     <a href="index.php" class="brand-link">
         <!-- <img src="vistas/assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
         <!-- <img src="logo/tiendab.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .9; "> -->
         <img src="vistas/assets/imagenes/empresa/<?php echo $nombre_sist[0]['imagen'] ; ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .9; ">
         <?php echo isset($nombre_sist[0]['nombre_sistema']) ? $nombre_sist[0]['nombre_sistema'] : 'Nombre no definido'; ?>
     </a>

    

     <!-- Sidebar -->
     <div class="sidebar">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="vistas/assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
            <h6 class="text-warning"><?php echo $_SESSION["usuario"]->nombre_usuario ?></h6>
            <input type="text" value="<?php echo $_SESSION["usuario"]->id_usuario;  ?>" id="text_Idprincipal" hidden>
            </div>
        </div>
        
         <!-- Sidebar Menu -->
         <nav class="mt-2">

             <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">

                <?php foreach ($menuUsuario as $menu) : ?>
                    <li class="nav-item">

                        <a style="cursor: pointer;" 
                            class="nav-link <?php if($menu->vista_inicio == 1) : ?>
                                                <?php echo 'active'; ?>
                                            <?php endif; ?>"
                            <?php if(!empty($menu->vista)) : ?>
                                onclick="CargarContenido('vistas/<?php echo $menu->vista; ?>','content-wrapper')"
                            <?php endif; ?>
                        >
                            <i class="nav-icon <?php echo $menu->icon_menu; ?>"></i>
                            <p>
                                <?php echo $menu->modulo ?>
                                <?php if(empty($menu->vista)) : ?>
                                    <i class="right fas fa-angle-left"></i> 
                                <?php endif; ?>
                            </p>
                        </a>

                        <?php if(empty($menu->vista)) : ?>

                            <?php
                                $subMenuUsuario = UsuarioControlador::ctrObtenerSubMenuUsuario($menu->id,$_SESSION["usuario"]->id_usuario);
                            ?>

                            <ul class="nav nav-treeview">

                                <?php foreach ($subMenuUsuario as $subMenu) : ?>

                                    <li class="nav-item">
                                        <a style="cursor: pointer;" class="nav-link" onclick="CargarContenido('vistas/<?php echo $subMenu->vista ?>','content-wrapper')">
                                            <i class="<?php echo $subMenu->icon_menu; ?> nav-icon"></i>
                                            <p><?php echo $subMenu->modulo; ?></p>
                                        </a>
                                    </li>

                                <?php endforeach; ?>
                                                          
                            </ul>

                        <?php endif; ?>

                    </li>
                <?php endforeach; ?>

                 
             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>

 <script>
     $(".nav-link").on('click', function() {
         $(".nav-link").removeClass('active');
         $(this).addClass('active');
     })
 </script>