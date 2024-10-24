<?php

require_once "conexion.php";

class ColorModelo{

    /*=============================================
     LISTAR EN DATATABLE COLOR
    =============================================*/
    static public function mdlListarColor()
    {
        // $smt = Conexion::conectar()->prepare('call SP_LISTAR_CATEGORIAS()');
        // $smt->execute();
        // return $smt->fetchAll();

        $stmt = Conexion::conectar()->prepare("SELECT id_color,
                                                       descripcion,
                                                        '' as opciones
                                                    FROM
                                                        color 
                                                        ORDER BY id_color DESC");
        $stmt->execute();
        return $stmt ->fetchAll();
    }


    /*=============================================
     REGISTRAR COLOR
    =============================================*/
    static public function mdlRegistrarColor($descripcion) {
        try {
            //$fecha = date('Y-m-d');
            $stmt = Conexion::conectar()->prepare("INSERT INTO color (descripcion) 
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
    ACTUALIZAR COLOR
    =============================================*/
    static public function mdlActualizarColor($table, $data, $id, $nameId)
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
     ELIMINAR COLOR
    =============================================*/
    static public function mdlEliminarColor($table, $id, $nameId)
    {
        $stmt = Conexion::conectar()->prepare("DELETE FROM $table WHERE $nameId = :$nameId");
        $stmt->bindParam(":" . $nameId, $id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return "ok";;
        } else {
            return Conexion::conectar()->errorInfo();
        }
    }




}