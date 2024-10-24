<?php

require_once "conexion.php";

class ComprobantesModelo{



    /*=============================================
     LISTAR EN DATATABLE COMPROBANTES
    =============================================*/
    static public function mdlListarComprobantes()
    {
         $smt = Conexion::conectar()->prepare('call SP_LISTAR_COMPROBANTES()');
         $smt->execute();
         return $smt->fetchAll();

       /* $stmt = Conexion::conectar()->prepare("SELECT id_medida,descripcion,abreviatura, '' as opciones
                                                    FROM medida 
                                                      ORDER BY id_medida DESC");
        $stmt->execute();
        return $stmt ->fetchAll();*/
    }



    /*=============================================
     REGISTRAR MEDIDA
    =============================================*/
    static public function mdlRegistraComprobantes($data)
     {
        try {
            //$fecha = date('Y-m-d');
           // $stmt = Conexion::conectar()->prepare("INSERT INTO medida (descripcion, abreviatura) VALUES (:descripcion, :abreviatura )");
             $stmt = Conexion::conectar()->prepare('call SP_REGISTRAR_COMPROBANTES(:compro_tipo, :compro_serie, :compro_numero)');                                                    

             $stmt->bindParam(":compro_tipo",  $data["compro_tipo"], PDO::PARAM_STR);
             $stmt->bindParam(":compro_serie",  $data["compro_serie"], PDO::PARAM_STR);
             $stmt->bindParam(":compro_numero",  $data["compro_numero"], PDO::PARAM_INT);

            if ($stmt->execute()) {
                $resultado = "ok";
            } else {
                $resultado = "error";
            }
        } catch (Exception $e) {
            $resultado = 'Excepción capturada: ' .  $e->getMessage() . "\n";
        }

        return $resultado;
        $stmt = null;

       // print_r($resultado);
    }


    
    /*=============================================
     ACTUALIZAR COMPROBANTES
    =============================================*/
    static public function mdlUpdateComprobantes($table, $data, $id, $nameId)
     {
        $set = "";

        foreach ($data as $key => $value) {
            $set .= $key . " = :" . $key . ","; //DEPENDE DEL ARRAY QUE VIENE DEL AJAX
        }

        $set = substr($set, 0, -1); //QUITA LA COMA

        $stmt = Conexion::conectar()->prepare("UPDATE $table SET $set WHERE $nameId = :$nameId");

        foreach ($data as $key => $value) {
            $stmt->bindParam(":" . $key, $data[$key], PDO::PARAM_STR);
        }

        $stmt->bindParam(":" . $nameId, $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "ok";
        } else {

            return Conexion::conectar()->errorInfo();
        }
    }

    /*=============================================
     ELIMINAR COMPROBANTES
    =============================================*/
    static public function mdlEliminarComprobantes($table, $id, $nameId)
    {
        $stmt = Conexion::conectar()->prepare("DELETE FROM $table WHERE $nameId = :$nameId");
        $stmt->bindParam(":" . $nameId, $id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return "ok";;
        } else {
            return Conexion::conectar()->errorInfo();
           // print_r($stmt);
        }
    }

     /*=============================================
     LISTAR SELECT EN COMBO
    =============================================*/
    static public function mdlListarSelectCompro(){

        $stmt = Conexion::conectar()->prepare("SELECT compro_id, compro_tipo 
                                                FROM comprobante	where compro_tipo <> 'Cotizacion' and compro_estado = 'ACTIVO'	
                                                ORDER BY compro_id ");

        $stmt -> execute();
        return $stmt->fetchAll();
    }
}