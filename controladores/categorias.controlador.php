<?php

class CategoriasControlador{

    static public function ctrListarCategorias(){
        
        $categorias = CategoriasModelo::mdlListarCategorias();

        return $categorias;
  
    }

    static public function ctrGuardarCategoria($accion, $idCategoria, $categoria){

        $guardarCategoria = CategoriasModelo::mdlGuardarCategoria($accion, $idCategoria, $categoria);

        return $guardarCategoria;
    }

    /*===================================================================*/
    //ELIMINAR CLIENTES
    /*===================================================================*/
    static public function ctrEliminarCategoria($table, $id, $nameId)
    {
        $respuesta = CategoriasModelo::mdlEliminarCategoria($table, $id, $nameId);
        return $respuesta;
    }

    static public function ctrListarSelectCategorias()
    {

        $Selectcategorias = CategoriasModelo::mdlListarSelectCategorias();
        return $Selectcategorias;
    }

}