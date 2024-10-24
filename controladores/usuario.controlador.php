<?php

class UsuarioControlador{

    /* 
    Validar el acceso del usuario
    */
    public function login(){

        if(isset($_POST["loginUsuario"])){

            $usuario = $_POST["loginUsuario"];
            $password = crypt($_POST["loginPassword"],'$2a$07$azybxcags23425sdg23sdfhsd$');

            $respuesta = UsuarioModelo::mdlIniciarSesion($usuario, $password);

            if(count($respuesta) > 0){

                $_SESSION["usuario"] = $respuesta[0];

                echo '
                    <script>
                        window.location = "' .Conexion::ruta(). '";
                    </script>
                
                ';
            }else{

                echo '
                    <script>
                        fncSweetAlert("error","Usuario y/o password inválido","' .Conexion::ruta(). '");
                    </script>
                
                ';
            }

        }
    }

    static public function ctrObtenerMenuUsuario($id_usuario){

        $menuUsuario = UsuarioModelo::mdlObtenerMenuUsuario($id_usuario);

        return $menuUsuario;
    }

    static public function ctrObtenerSubMenuUsuario($idMenu,$id_perfil_usuario){

        $subMenuUsuario = UsuarioModelo::mdlObtenerSubMenuUsuario($idMenu, $id_perfil_usuario);
        
        return $subMenuUsuario ;
    
    }

    static public function ctrObtenerNombre_sistema(){

        $nombre_sist = UsuarioModelo::mdlObtenerNombre_sistema();

        return $nombre_sist;
    }


    
    //LISTAR USUARIOS CON PROCEDURE
    static public function ctrListarUsuarios()
    {
        $usuario = UsuarioModelo::mdlListarUsuarios();
        return $usuario;
    }


    //LISTAR PERFILES EN COMBO DE USUARIO
    static public function ctrListarSelectPerfiles()
    {

        $perfiles = UsuarioModelo::mdlListarSelectPerfiles();
        return $perfiles;
    }


     //REGISTRAR USUARIOS
     static public function ctrRegistrarUsuario($nombre_usuario, $apellido_usuario, $usuario, $clave, $id_perfil_usuario)
     {
 
         $registroUsuario = UsuarioModelo::mdlRegistrarUsuario($nombre_usuario, $apellido_usuario, $usuario, $clave, $id_perfil_usuario);
 
         return $registroUsuario;
     }


     //ACTUALIZAR USUARIOS
    static public function ctrActualizarUsuario($table, $data, $id, $nameId)
    {

        $respuesta = UsuarioModelo::mdlActualizarUsuario($table, $data, $id, $nameId);

        return $respuesta;
    }


     //ELIMINAR USUARIOS
     static public function ctrEliminarUsuario($table, $id, $nameId)
     {
 
         $respuesta = UsuarioModelo::mdlEliminarUsuario($table, $id, $nameId);
 
         return $respuesta;
     }

     //CAMBIAR CLAVE
    static public function ctrActualizarClaveUsuario($table, $data, $id, $nameId)
    {

        $respuesta = UsuarioModelo::mdlActualizarClaveUsuario($table, $data, $id, $nameId);

        return $respuesta;
    }

    

}