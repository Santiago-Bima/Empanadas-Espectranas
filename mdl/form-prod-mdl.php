<?php
    require_once 'conexion_sql.php';

    class mdlFormProd{
        static public function mdlRegProd($datos){
            $stmt=conexion_sql::conectar()->prepare("INSERT INTO productos(nombre, descripcion, foto, precio, tipo) VALUES (:nombre, :descripcion, :foto, :precio, :tipo)");
            $stmt->bindParam(':nombre', $datos['nombre'], pdo::PARAM_STR);
            $stmt->bindParam(':descripcion', $datos['descripcion'], PDO::PARAM_STR);
            $stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
            $stmt->bindParam(":precio", $datos["precio"], PDO::PARAM_INT);
            $stmt->bindParam(":tipo", $datos["tipo"], PDO::PARAM_STR);
            
            $resultado="ok";
            
            try{
                $stmt->execute();
            }catch (Exception $e) {
                $resultado="nook";
            };

            unset($stmt);
            return $resultado;
        }

        static public function mdlSelectProd($item, $valor){
            if($item==null && $valor==null){
                $stmt=conexion_sql::conectar()->prepare("SELECT * FROM productos");
                $stmt->execute();
                return $stmt->fetchAll(); 
            }else{
                $stmt=conexion_sql::conectar()->prepare("SELECT * FROM productos WHERE $item=:$item");
                $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
                $stmt->execute();
                return $stmt->fetch();
            };
        }

        static public function mdlElimProd($valor){
            $stmt=conexion_sql::conectar()->prepare("DELETE FROM productos where Id=:Id");
            $stmt->bindParam(":Id", $valor, PDO::PARAM_STR);
            
            $resultado="ok";
            
            try{
                $stmt->execute();
            }catch (Exception $e) {
                $resultado="nook";
            };

            unset($stmt);
            return $resultado;
        }

        static public function mdlEditProd($datos){
            $stmt=conexion_sql::conectar()->prepare("UPDATE productos SET nombre=:nombre, descripcion=:descripcion, foto=:foto, precio=:precio, tipo=:tipo WHERE id=:id");
            $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
            $stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
            $stmt->bindParam(":precio", $datos["precio"], PDO::PARAM_STR);
            $stmt->bindParam(":tipo", $datos["tipo"], PDO::PARAM_STR);
            $stmt->bindParam(":id", $datos["id"], PDO::PARAM_STR);

            $resultado="ok";
            
            try{
                $stmt->execute();
            }catch (Exception $e) {
                $resultado="nook";
            };

            unset($stmt);
            return $resultado;
        }
    } 