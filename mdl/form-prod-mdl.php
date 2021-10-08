<?php
    require_once 'conexion_sql.php';

    class mdlFormProd{
        static public function mdlRegProd($tabla, $datos){
            $stmt=conexion_sql::conectar()->prepare("INSERT INTO $tabla(nombre, descripcion, foto, precio, tipo) VALUES (:nombre, :descripcion, :foto, :precio, :tipo)");
            $stmt->bindParam(':nombre', $datos['nombre'], pdo::PARAM_STR);
            $stmt->bindParam(':descripcion', $datos['descripcion'], PDO::PARAM_STR);
            $stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
            $stmt->bindParam(":precio", $datos["precio"], PDO::PARAM_INT);
            $stmt->bindParam(":tipo", $datos["tipo"], PDO::PARAM_STR);
            
            if($stmt->execute()){
                return 'ok';
            }else{
                print_r(conexion_sql::conectar()->errorInfo());
            }

            $stmt->close();
            $stmt=null;
        }

        static public function mdlSelectProd($tabla){
            $stmt=conexion_sql::conectar()->prepare("SELECT * FROM $tabla");
            $stmt->execute();
            return $stmt->fetchAll(); 
        }
    } 