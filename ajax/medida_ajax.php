<?php

require_once "../controladores/medida_controlador.php";
require_once "../modelos/medida_modelo.php";

class AjaxMedida{

    public $descripcion;
    public $abreviatura;
 

    /*===================================================================*/
    //LISTAR EN DATATABLE MEDIDA
    /*===================================================================*/
    public function  getListarMedida()
    {
        $MedidaList = MedidaControlador::ctrListarMedida();
        echo json_encode($MedidaList);
    }

    /*===================================================================*/
    //REGISTRAR MEDIDA
    /*===================================================================*/
    public function ajaxRegistrarMedida()
    {
        $RegMedida = MedidaControlador::ctrRegistrarMedida(
            $this->descripcion,
            $this->abreviatura
        );
        echo json_encode($RegMedida);
    }

    /*===================================================================*/
    //ACTUALIZAR MEDIDA
    /*===================================================================*/
    public function ajaxActualizarMedida($data)
    {
        $table = "medida"; //TABLA
        $id = $_POST["id_medida"]; 
        $nameId = "id_medida"; //CAMPO DE LA BASE
        $actualizarMedida = MedidaControlador::ctrActualizarMedida($table, $data, $id, $nameId);
        echo json_encode($actualizarMedida);
    }

     /*===================================================================*/
    //ELIMINAR MEDIDA
    /*===================================================================*/
    public function ajaxEliminarMedida(){
        $table = "medida"; //TABLA
        $id = $_POST["id_medida"]; 
        $nameId = "id_medida"; //CAMPO DE LA BASE
        $eliminarMedida = MedidaControlador::ctrEliminarMedida($table, $id, $nameId);
        echo json_encode($eliminarMedida);
    }

     /*===================================================================*/
    //LISTAR SELECT EN MEDIDA
    /*===================================================================*/
    public function ListarSelectMedida()
    {
        $SelectMedida = MedidaControlador::ctrListarSelectMedida();
        echo json_encode($SelectMedida, JSON_UNESCAPED_UNICODE);
    }

}




/*===================================================================*/
//LISTAR EN DATATABLE MEDIDA
/*===================================================================*/
if (isset($_POST['accion']) && $_POST['accion'] == 1) { 
    $MedidaList = new AjaxMedida();
    $MedidaList->getListarMedida();

}
/*===================================================================*/
//REGISTRAR MEDIDA
/*===================================================================*/
else if (isset($_POST['accion']) && $_POST['accion'] == 2) { 

    $RegMedida = new AjaxMedida();
    $RegMedida->descripcion = $_POST["descripcion"];
    $RegMedida->abreviatura = $_POST["abreviatura"];
    $RegMedida->ajaxRegistrarMedida();

}
/*===================================================================*/
//ACTUALIZAR MEDIDA
/*===================================================================*/
else if (isset($_POST['accion']) && $_POST['accion'] == 3) { 
    $actualizarMedida = new AjaxMedida();
    $data = array(
        "descripcion" => $_POST["descripcion"],
        "abreviatura" => $_POST["abreviatura"]
    );
    $actualizarMedida->ajaxActualizarMedida($data);
}

/*===================================================================*/
//ELIMINAR MEDIDA
/*===================================================================*/
else if (isset($_POST['accion']) && $_POST['accion'] == 4) {

    $eliminarMedida = new AjaxMedida();
    $eliminarMedida -> ajaxEliminarMedida();


}else {

    $SelectMedida = new AjaxMedida(); // SELECT EN COMBO
    $SelectMedida->ListarSelectMedida();
}
