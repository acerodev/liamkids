<?php


class ConfiguracionControlador {

    static public function ctrObtenerDataEmpresa(){
        $DataEmpresa = ConfiguracionModelo::mdlObtenerDataEmpresa();
        return $DataEmpresa;
    }


     //ACTUALIZAR EMPRESA
     static public function ctrActualizarConfiguracion($table, $data)
     {
 
         $respuesta = ConfiguracionModelo::mdlActualizarConfiguracion($table, $data);
 
         return $respuesta;
     }

         /*===================================================================
     //REGISTRAR PRODUCTO
    ====================================================================*/
    static public function ctrActualizaFoto( $data, $imagen){

        $ActualizaFoto = ConfiguracionModelo::mdlActualizaFoto( $data, $imagen);
        return $ActualizaFoto;

    }

}