<?php

require_once "../controladores/perfil_modulo.controlador.php";
require_once "../modelos/perfil_modulo.modelo.php";

class AjaxPerfilModulo{
    public $descripcion;

    public function ajaxRegistrarPerfilModulo($array_idModulos, $idPerfil, $id_modulo_inicio){

        $registroPerfilModulo = PerfilModuloControlador::ctrRegistrarPerfilModulo($array_idModulos, $idPerfil, $id_modulo_inicio);

        echo json_encode($registroPerfilModulo);
    }

   
}

if(isset($_POST['accion']) && $_POST['accion'] == 1){ //

    $registroPerfilModulo = new AjaxPerfilModulo;    
    $registroPerfilModulo->ajaxRegistrarPerfilModulo($_POST['id_modulosSeleccionados'],$_POST['id_Perfil'], $_POST['id_modulo_inicio']);

}else if (isset($_POST['accion']) && $_POST['accion'] == 2) { //PARA REGISTRAR PERFIL

    $registroPerfil = new AjaxPerfiles();
    $registroPerfil->descripcion = $_POST["descripcion"];
    $registroPerfil->ajaxRegistrarPerfil();

}else if (isset($_POST['accion']) && $_POST['accion'] == 3) { //ACTUALIZAR PERFIL

    $actualizarPerfil = new AjaxPerfiles();
    $data = array(
        // "id_categoria_producto" => $_POST["id_categoria_producto"],//campo de tabla y la variable definida en el registrar
        "descripcion" => $_POST["descripcion"],
       // "estado" => $_POST["estado"],

    );
    $actualizarPerfil->ajaxActualizarPerfil($data);

}else if (isset($_POST['accion']) && $_POST['accion'] == 4) {//ELIMINAR PERFIL

    //ELIMINAR UN PERFIL
    $eliminarPerfil  = new AjaxPerfiles();
    $eliminarPerfil -> ajaxEliminarPerfil();


}