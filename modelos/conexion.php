<?php

class Conexion{

    static public function conectar(){
        try {
            $conn = new PDO("mysql:host=localhost;dbname=dbropa","root","",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            return $conn;
        }
        catch (PDOException $e) {
            echo 'Falló la conexión: ' . $e->getMessage();
        }

    }

    static public  function ruta(){
        return "http://192.168.100.120/liamkids/";
    }

    
}

date_default_timezone_set('America/Lima');