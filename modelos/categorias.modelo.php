<?php

require_once "conexion.php";

class CategoriasModelo{


    static public function mdlListarCategorias(){

        $stmt = Conexion::conectar()->prepare("SELECT  id_categoria, 
                                                        nombre_categoria, 
                                                        -- aplica_peso as medida, 
                                                        '' as opciones
                                                FROM categorias c order BY id_categoria DESC");

        $stmt -> execute();

        return $stmt->fetchAll();
    }

    static public function mdlGuardarCategoria($accion, $idCategoria, $categoria){

        $date = null;

        if($accion > 0){// REGISTRAR

            //$date = date("Y-m-d H:i:s");
            
            $stmt = Conexion::conectar()->prepare("INSERT INTO categorias(nombre_categoria,aplica_peso) VALUES(:categoria,'0')");

            $stmt -> bindParam(":categoria", $categoria , PDO::PARAM_STR);
           // $stmt -> bindParam(":fecha_actualizacion_categoria",  $date , PDO::PARAM_STR);

            if($stmt -> execute()){
                $resultado = "Se registro la categoría correctamente.";
            }else{
                $resultado = "Error al registrar la categoria";
            }

        }else{// EDITAR

            //$date = date("Y-m-d H:i:s");

            $stmt = Conexion::conectar()->prepare("UPDATE categorias 
                                                      SET nombre_categoria = :categoria
                                                        
                                                    WHERE id_categoria = :idCategoria") ;
            

            $stmt -> bindParam(":idCategoria", $idCategoria , PDO::PARAM_STR);
            $stmt -> bindParam(":categoria", $categoria , PDO::PARAM_STR);
            //$stmt -> bindParam(":medida", $medida, PDO::PARAM_STR);
           

            if($stmt -> execute()){
                $resultado = "Se actualizo la categoría correctamente.";
            }else{
                $resultado = "Error al actualizar la categoría";
            }
        }

        return $resultado;
        
        $stmt = null;

    }


    /*=============================================
    ELIMINAR DATOS DEL CLIENTE
    =============================================*/

    static public function mdlEliminarCategoria($table, $id, $nameId)
    {

        $stmt = Conexion::conectar()->prepare("DELETE FROM $table WHERE $nameId = :$nameId");
        $stmt->bindParam(":" . $nameId, $id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return "ok";;
        } else {
            return Conexion::conectar()->errorInfo();
        }
    }

     /*=============================================
    Peticion SELECT: PARA MOSTRAR EN COMBO DE PRODUCTOS
    =============================================*/
    static public function mdlListarSelectCategorias(){

        $stmt = Conexion::conectar()->prepare("SELECT  id_categoria, nombre_categoria
                                                FROM categorias c 
                                            order BY nombre_categoria asc");
        $stmt -> execute();
        return $stmt->fetchAll();
    }

    

}