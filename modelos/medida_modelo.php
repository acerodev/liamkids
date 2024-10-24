<?php

require_once "conexion.php";

class MedidaModelo{

    /*=============================================
     LISTAR EN DATATABLE MEDIDA
    =============================================*/
    static public function mdlListarMedida()
    {
        // $smt = Conexion::conectar()->prepare('call SP_LISTAR_CATEGORIAS()');
        // $smt->execute();
        // return $smt->fetchAll();

        $stmt = Conexion::conectar()->prepare("SELECT id_medida,
                                                       descripcion,
                                                       abreviatura,
                                                        '' as opciones
                                                    FROM
                                                        medida 
                                                        ORDER BY id_medida DESC");
        $stmt->execute();
        return $stmt ->fetchAll();
    }


    /*=============================================
     REGISTRAR MEDIDA
    =============================================*/
    static public function mdlRegistrarMedida($descripcion, $abreviatura) {
        try {
            //$fecha = date('Y-m-d');
            $stmt = Conexion::conectar()->prepare("INSERT INTO medida (descripcion, abreviatura) 
                                                                VALUES (:descripcion, :abreviatura )");

            $stmt->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
            $stmt->bindParam(":abreviatura", $abreviatura, PDO::PARAM_STR);
           
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
    }

    /*=============================================
    ACTUALIZAR MEDIDA
    =============================================*/
    static public function mdlActualizarMedida($table, $data, $id, $nameId)
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
     ELIMINAR MEDIDA
    =============================================*/
    static public function mdlEliminarMedida($table, $id, $nameId)
    {
        $stmt = Conexion::conectar()->prepare("DELETE FROM $table WHERE $nameId = :$nameId");
        $stmt->bindParam(":" . $nameId, $id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return "ok";;
        } else {
            return Conexion::conectar()->errorInfo();
        }
    }


    /*===================================================================*/
    //SELECT MEDIDA EN COMBO
    /*===================================================================*/
    static public function mdlListarSelectMedida()
    {

        $stmt = Conexion::conectar()->prepare("SELECT id_medida, 
                                                    descripcion
                                                FROM
                                                    medida			
                                                ORDER BY id_medida asc");

        $stmt->execute();

        return $stmt->fetchAll();
    }
}