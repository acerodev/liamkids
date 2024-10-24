<?php

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

class AjaxCategorias{

    public $idCategoria;
    public $categoria;
    public $medida;

    public function ajaxListarCategorias(){

        $categorias = CategoriasControlador::ctrListarCategorias();

        echo json_encode($categorias, JSON_UNESCAPED_UNICODE);
    }

    public function ajaxGuardarCategoria($accion){

        $guardarCategorias = CategoriasControlador::ctrGuardarCategoria($accion, $this->idCategoria, $this->categoria);

        echo json_encode($guardarCategorias, JSON_UNESCAPED_UNICODE);
    }


    /*===================================================================*/
      //ELIMINAR CLIENTE
    /*===================================================================*/
    public function ajaxEliminarCategoria()
    {
        $table = "categorias"; //TABLA
        $id = $_POST["id_categoria"]; //LO QUE VIENE DE PRODUCTOS.PHP
        $nameId = "id_categoria"; //CAMPO DE LA BASE 
        $respuesta = CategoriasControlador::ctrEliminarCategoria($table, $id, $nameId);

        echo json_encode($respuesta);
    }

    /*===================================================================*/
    //LISTAR CATEGORIAS EN COMBOBOX DE PRODUCTOS
    /*===================================================================*/
    public function ListarSelectCategorias()
    {
        $Selectcategorias = CategoriasControlador::ctrListarSelectCategorias();
        echo json_encode($Selectcategorias, JSON_UNESCAPED_UNICODE);
    }

}

if(isset($_POST['idCategoria']) && $_POST['idCategoria'] > 0){ //EDITAR

    $editarCategoria = new AjaxCategorias();
    $editarCategoria->idCategoria = $_POST['idCategoria'];
    $editarCategoria->categoria = $_POST['categoria'];
    //$editarCategoria->medida = $_POST['medida'];
    $editarCategoria->ajaxGuardarCategoria(0);

}else if(isset($_POST['idCategoria']) && $_POST['idCategoria'] == 0){ //REGISTRAR

    $registrarCategoria = new AjaxCategorias();
    $registrarCategoria->idCategoria = $_POST['idCategoria'];
    $registrarCategoria->categoria = $_POST['categoria'];
    //$registrarCategoria->medida = $_POST['medida'];
    $registrarCategoria->ajaxGuardarCategoria(1);

} else if (isset($_POST['accion']) && $_POST['accion'] == 1) { //ELIMINAR 


    $eliminarCategoria = new AjaxCategorias();
    $eliminarCategoria->ajaxEliminarCategoria();


} else if (isset($_POST['accion']) && $_POST['accion'] == 2) { //LISTAR CATEGORIAS EN DATA TABLE
    $Selectcategorias = new AjaxCategorias();
    $Selectcategorias->ListarSelectCategorias();

}

else{

    $listaCategorias = new AjaxCategorias();
    $listaCategorias -> ajaxListarCategorias();
}