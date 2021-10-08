<?php
    require_once 'conexion_sql.php';

    class mdlForm{
        static public function mdlReg($tabla, $datos){
            $stmt=conexion_sql::conectar()->prepare("INSERT INTO $tabla(token, usuario, email, password) 
                values (:token, :usuario, :email, :password)");
            $stmt->bindParam(':token', $datos['token'], pdo::PARAM_STR);
            $stmt->bindParam(':usuario', $datos['usuario'], PDO::PARAM_STR);
            $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
            $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);

            if($stmt->execute()){
                return 'ok';
            }else{
                print_r(conexion_sql::conectar()->errorInfo());
            }

            $stmt->close();
            $stmt=null;
        }

        static public function mdlSelecReg($tabla, $item, $valor){
            $stmt=conexion_sql::conectar()->prepare("SELECT * FROM $tabla where $item=:$item");
            $stmt->bindParam(':'.$item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();

            $stmt->close();
            $stmt=null;
        }

        static public function mdlActReg($tabla, $datos){
            $stmt=conexion_sql::conectar()->prepare("UPDATE $tabla SET usuario=:usuario, email=:email, password=:password WHERE token=:token");
            $stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
            $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
            $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
            $stmt->bindParam(":token", $datos["token"], PDO::PARAM_STR);
            if($stmt->execute()){
                return "ok";
            }else{
                print_r(conexion_sql::conectar()->errorInfo());
            }
            $stmt->close();
            $stmt=null;
        }

        static public function mdlElimReg($tabla, $valor){
            $stmt=conexion_sql::conectar()->prepare("DELETE FROM $tabla where token=:token");
            $stmt->bindParam(":token", $valor, PDO::PARAM_STR);
            if($stmt->execute()){
                return "ok";
            }else{
                print_r(conexion_sql::conectar()->errorInfo());
            }
            $stmt->close();
            $stmt=null;
        }
        static public function mdlActIF($tabla, $valor, $token){
            $stmt=conexion_sql::conectar()->prepare("UPDATE $tabla SET intentos_fallidos=:intentos_fallidos WHERE token=:token");
            $stmt->bindParam(":intentos_fallidos", $valor, PDO::PARAM_INT);
            $stmt->bindParam(':token', $token, PDO::PARAM_STR);
            if($stmt->execute()){
                return 'ok';
            }else{
                print_r(conexion_sql::conectar()->errorInfo());
            }

            $stmt->close();
            $stmt=null;
        }
    }