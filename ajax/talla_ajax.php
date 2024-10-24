<?php

require_once "../controladores/talla_controlador.php";
require_once "../modelos/talla_modelo.php";

class AjaxTalla{
    public $descripcion;

    /*===================================================================*/
    //LISTAR EN DATATABLE LAS TALLA
    /*===================================================================*/
    public function  getListarTallas()
    {
        $tallaList = TallaControlador::ctrListarTalla();
        echo json_encode($tallaList);
    }


    /*===================================================================*/
    //REGISTRAR TALLA
    /*===================================================================*/
    public function ajaxRegistrarTalla()
    {
        $RegTalla = TallaControlador::ctrRegistrarTalla(
            $this->descripcion
        );
        echo json_encode($RegTalla);
    }


    /*===================================================================*/
    //ACTUALIZAR TALLA
    /*===================================================================*/
    public function ajaxActualizarTalla($data)
    {
        $table = "talla"; //TABLA
        $id = $_POST["id_talla"]; 
        $nameId = "id_talla"; //CAMPO DE LA BASE
        $actualizarTalla = TallaControlador::ctrActualizarTalla($table, $data, $id, $nameId);
        echo json_encode($actualizarTalla);
    }


    /*===================================================================*/
    //ELIMINAR TALLA
    /*===================================================================*/
    public function ajaxEliminarTalla(){
        $table = "talla"; //TABLA
        $id = $_POST["id_talla"]; 
        $nameId = "id_talla"; //CAMPO DE LA BASE
        $eliminarTalla = TallaControlador::ctrEliminarTalla($table, $id, $nameId);
        echo json_encode($eliminarTalla);

    }

     /*===================================================================*/
    //LISTAR SELECT EN COMBO
    /*===================================================================*/
    public function ListarSelectTalla()
    {
        $SelectTalla = TallaControlador::ctrListarSelectTalla();
        echo json_encode($SelectTalla, JSON_UNESCAPED_UNICODE);
    }


    /*===================================================================*/
    //LISTAR TALLAS PARA AUMENTAR STOCK
    /*===================================================================*/
    public function ListarSelectTallasPorCod($codigo_producto)
    {
        $SelectTallasPorCod = TallaControlador::ctrListarSelectTallasPorCod($codigo_producto);
        echo json_encode($SelectTallasPorCod);
        //var_dump($SelectTallasPorCod);
    }

    /*===================================================================*/
    //LISTAR TALLAS PARA GENERAR CODIGO DE BARRA MAYOR STOCK A 0
    /*===================================================================*/
    public function ListarSelectTallasCodBarra($codigo_producto)
    {
        $SelectTallasPorCodBarra = TallaControlador::ctrListarSelectTallasCodBarra($codigo_producto);
        echo json_encode($SelectTallasPorCodBarra);
       
    }

}




/*===================================================================*/
//LISTAR EN DATATABLE LAS TALLA
/*===================================================================*/
if (isset($_POST['accion']) && $_POST['accion'] == 1) { 
    $tallaList = new AjaxTalla();
    $tallaList->getListarTallas();

}
/*===================================================================*/
//REGISTRAR TALLA
/*===================================================================*/
else if (isset($_POST['accion']) && $_POST['accion'] == 2) { 

    $RegTalla = new AjaxTalla();
    $RegTalla->descripcion = $_POST["descripcion"];
    $RegTalla->ajaxRegistrarTalla();

}
/*===================================================================*/
//ACTUALIZAR TALLA
/*===================================================================*/
else if (isset($_POST['accion']) && $_POST['accion'] == 3) { 
    $actualizarTalla = new AjaxTalla();
    $data = array(
        "descripcion" => $_POST["descripcion"]
    );
    $actualizarTalla->ajaxActualizarTalla($data);
}
/*===================================================================*/
//ELIMINAR TALLA
/*===================================================================*/
else if (isset($_POST['accion']) && $_POST['accion'] == 4) {

    $eliminarTalla = new AjaxTalla();
    $eliminarTalla -> ajaxEliminarTalla();

}
/*===================================================================*/
//LISTAR TALLAS POR CODIGO DE PROD
/*===================================================================*/
else if (isset($_POST['accion']) && $_POST['accion'] == 5) { 
    $SelectTallasPorCod = new AjaxTalla();
    $SelectTallasPorCod->ListarSelectTallasPorCod($_POST["codigo_producto"]);

}
/*===================================================================*/
//LISTAR TALLAS PARA GENERAR CODIGO DE BARRA MAYOR STOCK A 0
/*===================================================================*/
else if (isset($_POST['accion']) && $_POST['accion'] == 6) { 
    $SelectTallasPorCodBarra = new AjaxTalla();
    $SelectTallasPorCodBarra->ListarSelectTallasCodBarra($_POST["codigo_producto"]);

} else {

    $SelectTalla = new AjaxTalla(); // SELECT EN COMBO
    $SelectTalla->ListarSelectTalla();
}

















