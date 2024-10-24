<?php

require_once "../controladores/color_controlador.php";
require_once "../modelos/color_modelo.php";

class AjaxColor{

    /*===================================================================*/
    //LISTAR EN DATATABLE COLORES
    /*===================================================================*/
    public function  getListarColor()
    {
        $ColorList = ColorControlador::ctrListarColor();
        echo json_encode($ColorList);
    }

    
    /*===================================================================*/
    //REGISTRAR COLOR
    /*===================================================================*/
    public function ajaxRegistrarColor()
    {
        $RegColor = ColorControlador::ctrRegistrarColor(
            $this->descripcion
        );
        echo json_encode($RegColor);
    }

    /*===================================================================*/
    //ACTUALIZAR COLOR
    /*===================================================================*/
    public function ajaxActualizarColor($data)
    {
        $table = "color"; //TABLA
        $id = $_POST["id_color"]; 
        $nameId = "id_color"; //CAMPO DE LA BASE
        $actualizarColor = ColorControlador::ctrActualizarColor($table, $data, $id, $nameId);
        echo json_encode($actualizarColor);
    }


    /*===================================================================*/
    //ELIMINAR TALLA
    /*===================================================================*/
    public function ajaxEliminarColor(){
        $table = "color"; //TABLA
        $id = $_POST["id_color"]; 
        $nameId = "id_color"; //CAMPO DE LA BASE
        $eliminarColor = ColorControlador::ctrEliminarColor($table, $id, $nameId);
        echo json_encode($eliminarColor);

    }

    
}


/*===================================================================*/
//LISTAR EN DATATABLE COLOR
/*===================================================================*/
if (isset($_POST['accion']) && $_POST['accion'] == 1) { 
    $ColorList = new AjaxColor();
    $ColorList->getListarColor();

}
/*===================================================================*/
//REGISTRAR COLOR
/*===================================================================*/
else if (isset($_POST['accion']) && $_POST['accion'] == 2) { 

    $RegColor = new AjaxColor();
    $RegColor->descripcion = $_POST["descripcion"];
    $RegColor->ajaxRegistrarColor();

}
/*===================================================================*/
//ACTUALIZAR COLOR
/*===================================================================*/
else if (isset($_POST['accion']) && $_POST['accion'] == 3) { 
    $actualizarColor = new AjaxColor();
    $data = array(
        "descripcion" => $_POST["descripcion"]
    );
    $actualizarColor->ajaxActualizarColor($data);
}

/*===================================================================*/
//ELIMINAR COLOR
/*===================================================================*/
else if (isset($_POST['accion']) && $_POST['accion'] == 4) {

    $eliminarColor = new AjaxColor();
    $eliminarColor -> ajaxEliminarColor();


} 