<?php

require_once "conexion.php";



class ConfiguracionModelo
{
   

    static public function mdlObtenerDataEmpresa()
    {
        $smt = Conexion::conectar()->prepare('call SP_OBTENER_DATA_EMPRESA()');
        $smt->execute();
        return $smt->fetch(PDO::FETCH_OBJ);
    }


    
     /*=============================================
    Peticion UPDATE: para ACTUALIZAR DATOS
    =============================================*/
    static public function mdlActualizarConfiguracion($table, $data)
    {

        try {
            $stmt = Conexion::conectar()->prepare("UPDATE $table SET razon_social = :razon_social,  
                                                                        ruc = :ruc,
                                                                        direccion =:direccion,
                                                                        email = :email, 
                                                                        moneda = :moneda , 
                                                                        celular  = :celular,
                                                                        igv  = :igv,
                                                                        cuenta  = :cuenta,
                                                                        nro_cuenta  = :nro_cuenta,
                                                                        nombre_sistema  = :nombre_sistema,
                                                                        tipo_impuesto  = :tipo_impuesto,
                                                                        soles  = :soles,
                                                                        centimos  = :centimos
                                                                       
                                                                       ");

            $stmt->bindParam(":razon_social", $data["razon_social"], PDO::PARAM_STR);
            $stmt->bindParam(":ruc", $data["ruc"], PDO::PARAM_STR);
            $stmt->bindParam(":direccion", $data["direccion"], PDO::PARAM_STR);
            $stmt->bindParam(":email", $data["email"], PDO::PARAM_STR);
            $stmt->bindParam(":moneda", $data["moneda"], PDO::PARAM_STR);
            $stmt->bindParam(":celular", $data["celular"], PDO::PARAM_STR);
            $stmt->bindParam(":igv", $data["igv"], PDO::PARAM_STR);
            $stmt->bindParam(":cuenta", $data["cuenta"], PDO::PARAM_STR);
            $stmt->bindParam(":nro_cuenta", $data["nro_cuenta"], PDO::PARAM_STR);
            $stmt->bindParam(":nombre_sistema", $data["nombre_sistema"], PDO::PARAM_STR);
            $stmt->bindParam(":tipo_impuesto", $data["tipo_impuesto"], PDO::PARAM_STR);
            $stmt->bindParam(":soles", $data["soles"], PDO::PARAM_STR);
            $stmt->bindParam(":centimos", $data["centimos"], PDO::PARAM_STR);
           // $stmt->bindParam(":imagen",$imagen["nuevoNombre"], PDO::PARAM_STR);
            //var_dump($data["celular"]);

          /* if ($stmt->execute()) {
                $stmt = null;
               */
              

               // $resultado = "ok";
               
                 if ($stmt->execute()) {
                    
                     $resultado = "ok";
                 } else {
                     $resultado = "error";
                    //var_dump($stmt);
                 }
           // } else {
              //  $resultado = "error";
           // }
        } catch (Exception $e) {
            $resultado = 'Excepción capturada: ' .  $e->getMessage() . "\n";
        }

        return $resultado;

        $stmt = null;


    }


    
     /*=============================================
    Peticion UPDATE: para ACTUALIZAR DATOS
    =============================================*/
    static public function mdlActualizaFoto( $data, $imagen)
    {
        try {
            $stmt = Conexion::conectar()->prepare("UPDATE empresa SET  imagen = :imagen where id_empresa =  :id_empresa ");

            $stmt->bindParam(":id_empresa", $data["id_empresa"], PDO::PARAM_STR);
            $stmt->bindParam(":imagen",$imagen["nuevoNombre"], PDO::PARAM_STR);
               
                //GUARDAMOS LA IMAGEN EN LA CARPETA
                if($imagen){
                                
                    $guardarImagen = new ConfiguracionModelo();

                    $guardarImagen->guardarImagen($imagen["folder"], $imagen["ubicacionTemporal"], $imagen["nuevoNombre"]);

                }else { 
                }
    
                 if ($stmt->execute()) {
                    
                     $resultado = "ok";
                 } else {
                     $resultado = "error";
                    //var_dump($stmt);
                 }

        } catch (Exception $e) {
            $resultado = 'Excepción capturada: ' .  $e->getMessage() . "\n";
        }

        return $resultado;
        $stmt = null;

    }

    public function guardarImagen($folder, $ubicacionTemporal, $nuevoNombre){
        file_put_contents(strtolower($folder.$nuevoNombre), file_get_contents($ubicacionTemporal));
    }

}