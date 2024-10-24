<?php

class ColorControlador{

     /*===================================================================*/
    //LISTAR EN DATATABLE  COLOR
    /*===================================================================*/
    static public function ctrListarColor()
    {
        $ColorList = ColorModelo::mdlListarColor();
        return $ColorList;
    }

     /*===================================================================*/
    //REGISTRAR COLOR
    /*===================================================================*/
    static public function ctrRegistrarColor($descripcion)
    {
        $RegColor = ColorModelo::mdlRegistrarColor($descripcion);
        return $RegColor;
    }

    /*===================================================================*/
    //ACTUALIZAR COLOR
    /*===================================================================*/
    static public function ctrActualizarColor($table, $data, $id, $nameId)
    {
        $actualizarColor = ColorModelo::mdlActualizarColor($table, $data, $id, $nameId);
        return $actualizarColor;
    }


    /*===================================================================*/
    //ELIMINAR COLOR
    /*===================================================================*/
    static public function ctrEliminarColor($table, $id, $nameId)
    {
        $eliminarColor = ColorModelo::mdlEliminarColor($table, $id, $nameId);
        return $eliminarColor;
    }


}