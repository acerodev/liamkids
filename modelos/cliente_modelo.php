<?php

require_once "conexion.php";

class ClienteModelo{

    static public function mdlListarSelectClientes(){

        $stmt = Conexion::conectar()->prepare("SELECT cliente_id, CONCAT(cliente_dni, ' - ', cliente_nombres ) as cliente
                                                FROM clientes			
                                                ORDER BY cliente_id ");

        $stmt -> execute();
        return $stmt->fetchAll();
    }



    /*=============================================
    Peticion LISTAR EN DATATABLE CLIENTE
    =============================================*/
    static public function mdlListarClientes()
    {
        $smt = Conexion::conectar()->prepare('call SP_LISTAR_CLIENTES_TABLE()');
        $smt->execute();
        return $smt->fetchAll();
    }


    /*=============================================
      //REGISTRAR CLIENTE
    =============================================*/
    static public function mdlRegistrarCliente($cliente_tipo_doc, $cliente_dni, $cliente_nombres, $cliente_direccion,  $cliente_celular, $cliente_correo)
    {
        try {
            //$fecha = date('Y-m-d');
            $stmt = Conexion::conectar()->prepare("INSERT INTO clientes  (cliente_tipo_doc,
                                                                          cliente_dni,
                                                                          cliente_nombres, 
                                                                          cliente_direccion ,
                                                                          cliente_celular,
                                                                          cliente_correo
                                                                          ) 
                                                                VALUES (:cliente_tipo_doc, 
                                                                        :cliente_dni, 
                                                                        :cliente_nombres,
                                                                        :cliente_direccion, 
                                                                        :cliente_celular,
                                                                        :cliente_correo
                                                                        )");

            $stmt->bindParam(":cliente_tipo_doc", $cliente_tipo_doc, PDO::PARAM_STR);
            $stmt->bindParam(":cliente_dni", $cliente_dni, PDO::PARAM_STR);
            $stmt->bindParam(":cliente_nombres", $cliente_nombres, PDO::PARAM_STR);
            $stmt->bindParam(":cliente_direccion", $cliente_direccion, PDO::PARAM_STR);
            $stmt->bindParam(":cliente_celular", $cliente_celular, PDO::PARAM_STR);
            $stmt->bindParam(":cliente_correo", $cliente_correo, PDO::PARAM_STR);

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
    //ACTUALIZAR DATOS DEL CLIENTE
    =============================================*/
    static public function mdlActualizarCliente($table, $data, $id, $nameId)
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
    DUPLICADO DEL DOCUMENTO DEL CLIENTE
    =============================================*/
    static public function mdlVerificarDuplicadoDocument($cliente_dni)
    {
        $stmt = Conexion::conectar()->prepare("SELECT   count(*) as ex
                                                FROM clientes c 
                                                 WHERE c.cliente_dni = :cliente_dni");

        $stmt->bindParam(":cliente_dni", $cliente_dni, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_OBJ); //devuelve 1 registro
        //  var_dump($stmt);

    }


    /*=============================================
    ELIMINAR DATOS DEL CLIENTE
    =============================================*/

    static public function mdlEliminarCliente($table, $id, $nameId)
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
    Peticion LISTAR EN DATATABLE CLIENTE
    =============================================*/
    static public function mdlListarClientesAutocomplete()
    {
        $smt = Conexion::conectar()->prepare('call SP_LISTAR_CLIENTES_AUTOCOMPLETE()');
        $smt->execute();
        return $smt->fetchAll();
    }


    /*=============================================
    AUTOCOMPLETE POR DNI
    =============================================*/
    static public function mdlAutocompleteDni($cliente_dni)
    {
        $stmt = Conexion::conectar()->prepare("SELECT
                                                    cliente_id,
                                                    cliente_dni,
                                                    cliente_nombres
                                                FROM
                                                    clientes  
                                                    WHERE cliente_dni = :cliente_dni");

        $stmt->bindParam(":cliente_dni", $cliente_dni, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_OBJ); //devuelve 1 registro
        //  var_dump($stmt);

    }

      /*=============================================
    Peticion LISTAR EN DATATABLE CLIENTE
    =============================================*/
    static public function mdlListarProveedores()
    {
        $smt = Conexion::conectar()->prepare('call SP_LISTAR_PROVEEDORES()');
        $smt->execute();
        return $smt->fetchAll();
    }
}