<?php

require_once "conexion.php";

class TallaModelo{

    /*=============================================
     LISTAR EN DATATABLE LAS TALLA
    =============================================*/
    static public function mdlListarTalla()
    {
        // $smt = Conexion::conectar()->prepare('call SP_LISTAR_CATEGORIAS()');
        // $smt->execute();
        // return $smt->fetchAll();

        $stmt = Conexion::conectar()->prepare("SELECT id_talla,
                                                       descripcion,
                                                        '' as opciones
                                                    FROM
                                                        talla 
                                                        ORDER BY id_talla DESC");
        $stmt->execute();
        return $stmt ->fetchAll();
    }


    /*=============================================
     REGISTRAR TALLA
    =============================================*/
    static public function mdlRegistrarTalla($descripcion) {
        try {
            //$fecha = date('Y-m-d');
            $stmt = Conexion::conectar()->prepare("INSERT INTO talla (descripcion) 
                                                                VALUES (:descripcion )");

            $stmt->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
           
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
    ACTUALIZAR TALLA
    =============================================*/
    static public function mdlActualizarTalla($table, $data, $id, $nameId)
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
     ELIMINAR TALLA
    =============================================*/
    static public function mdlEliminarTalla($table, $id, $nameId)
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
    //SELECT MONEDAS EN COMBO
    /*===================================================================*/
    static public function mdlListarSelectTalla()
    {

        $stmt = Conexion::conectar()->prepare("SELECT id_talla, 
                                                    descripcion
                                                FROM
                                                    talla			
                                                ORDER BY id_talla asc");

        $stmt->execute();

        return $stmt->fetchAll();
    }


    /*===================================================================*/
    //SELECT     TALLA POR CODIGO
    /*===================================================================*/
    static public function mdlListarSelectTallasPorCod($codigo_producto)
    {
        $stmt = Conexion::conectar()->prepare('call SP_SELECT_TALLAS_POR_CODIGO(:codigo_producto)');
        $stmt->bindParam(":codigo_producto", $codigo_producto, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }


    /*===================================================================*/
    //SELECT     TALLA POR CODIGO PARA CODIGO DE BARRA 
    /*===================================================================*/
    static public function mdlListarSelectTallasCodBarra($codigo_producto)
    {
        $stmt = Conexion::conectar()->prepare('call SP_SELECT_TALLAS_PARA_CODIGO_BARRA(:codigo_producto)');
        $stmt->bindParam(":codigo_producto", $codigo_producto, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }


}