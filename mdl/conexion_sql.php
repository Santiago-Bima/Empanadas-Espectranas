<?php
    class conexion_sql{
        static public function conectar(){
            $link= new pdo("mysql:host=localhost;dbname=empanadas-espectranas", "Empleado", 'frijolito753');
            $link->exec('set names utf8');
            return $link;
        }
    }