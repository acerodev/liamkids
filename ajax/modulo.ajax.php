<?php

require_once "../controladores/modulo.controlador.php";
require_once "../modelos/modulo.modelo.php";

class AjaxModulos{

    public function ajaxObtenerModulos(){

        $modulos = ModuloControlador::ctrObtenerModulos();

        echo json_encode($modulos);
    }

    public function ajaxObtenerModulosPorPerfil($id_perfil){

        $modulosPerfil = ModuloControlador::ctrObtenerModulosPorPerfil($id_perfil);

        echo json_encode($modulosPerfil);
    }

    /*==============================================================
    SE USA PARA EL MODULO DE MANTENIMIENTO DE MODULOS
    ==============================================================*/
    public function ajaxObtenerModulosSistema(){

        $modulosSistema = ModuloControlador::ctrObtenerModulosSistema();

        echo json_encode($modulosSistema);
    }

    /*==============================================================
    FNC PARA REORGANIZAR LOS MODULOS DEL SISTEMA
    ==============================================================*/
    public function ajaxReorganizarModulos($modulos_ordenados){

        $modulosOrdenados = ModuloControlador::ctrReorganizarModulos($modulos_ordenados);

        echo json_encode($modulosOrdenados);
    }

    /*==============================================================
    FNC PARA REGISTRAR MODULOS
    ==============================================================*/
    public function AjaxRegistrarModulo()
    {
        $modulos = ModuloControlador::ctrRegistrarModulos(
            $this->modulo,
            $this->vista,
            $this->icon_menu

        );
        echo json_encode($modulos);
    }
    /*===================================================================*/
    //ACTUALIZAR MODULOS
    /*===================================================================*/
    public function ajaxActualizarModulos($data)
    {
        $table = "modulos"; //TABLA
        $id = $_POST["id"]; //LO QUE VIENE DE PRODUCTOS.PHP
        $nameId = "id"; //CAMPO DE LA BASEbien bebe

        $respuesta = ModuloControlador::ctrActualizarModulos($table, $data, $id, $nameId);

        echo json_encode($respuesta);
    }

    
    /*===================================================================*/
    //ELIMINAR MODULO
    /*===================================================================*/
    public function ajaxEliminarModulo(){
        $table = "modulos"; //TABLA
        $id = $_POST["id"]; //LO QUE VIENE DE PRODUCTOS.PHP
        $nameId = "id"; //CAMPO DE LA BASE
        $respuesta = ModuloControlador::ctrEliminarModulo($table, $id, $nameId);

        echo json_encode($respuesta);

    }


}


if(isset($_POST['accion']) && $_POST['accion'] == 1){ //
    $modulos = new AjaxModulos;
    $modulos->ajaxObtenerModulos();
}else if(isset($_POST['accion']) && $_POST['accion'] == 2){ //
    $modulosPerfil = new AjaxModulos();
    $modulosPerfil->ajaxObtenerModulosPorPerfil($_POST["id_perfil"]);
}
/* ===============================================================
SOLICITUD PARA OBTENER MODULOS DEL SISTEMA
================================================================*/
else if(isset($_POST['accion']) && $_POST['accion'] == 3){ //

    $modulosSistema = new AjaxModulos;
    $modulosSistema->ajaxObtenerModulosSistema();

}
/* ===============================================================
SOLICITUD PARA REORGANIZAR LOS MODULOS
================================================================*/
else if(isset($_POST['accion']) && $_POST['accion'] == 4){ 

    $organizar_modulos = new AjaxModulos;
    $organizar_modulos->ajaxReorganizarModulos($_POST["modulos"]);

}
/* ===============================================================
SOLICITUD PARA REGISTRO DE MODULOS
================================================================*/
else if (isset($_POST['accion']) && $_POST['accion'] == 5) { //PARA REGISTRAR MODULOS

    $modulos = new AjaxModulos();
    $modulos->modulo = $_POST["modulo"];
    $modulos->vista = $_POST["vista"];
    $modulos->icon_menu = $_POST["icon_menu"];
    $modulos->AjaxRegistrarModulo();

} else if (isset($_POST['accion']) && $_POST['accion'] == 6) { //ACTUALIZAR MODULOS

    $actualizarModulos = new AjaxModulos();
    $data = array(
        // "id_categoria_producto" => $_POST["id_categoria_producto"],//campo de tabla y la variable definida en el registrar
        "modulo" => $_POST["modulo"],
        "vista" => $_POST["vista"],
        "icon_menu" => $_POST["icon_menu"],

    );
    $actualizarModulos->ajaxActualizarModulos($data);

}else if (isset($_POST['accion']) && $_POST['accion'] == 7) {// PARA ELIMINAR MODULOS

    //ELIMINAR UN MODULO
    $eliminarModulo = new AjaxModulos();
    $eliminarModulo -> ajaxEliminarModulo();


}
// else if(isset($_POST['accion']) && $_POST['accion'] == 5){ 

//     $array_datos = [];

//     parse_str($_POST['datos'], $array_datos);
 
//     $registro_modulo = new AjaxModulos();
//     $registro_modulo->ajaxRegistrarModulo($array_datos);

// }