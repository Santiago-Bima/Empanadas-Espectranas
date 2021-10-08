<?php
    class ctrlFormProd{
        static public function ctrlRegProd(){
            if(isset($_POST['regProd']) && isset($_POST['regDesc']) && isset($_FILES['regImg']['name']) && isset($_POST['regPrecio']) && $_POST['tipos']!=" "){
                if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]+$/', $_POST["regProd"])){
                    $nomImg=$_FILES['regImg']['name'];
                    $tipoImg=$_FILES['regImg']['type'];
                    $tamañoImg=$_FILES['regImg']['size'];
                    
                    if ($tamañoImg<=1000000){
                        if ($tipoImg=='image/jpeg' || $tipoImg=='image/png' || $tipoImg=='image/jpg'){
                            $destinoImg=$_SERVER['DOCUMENT_ROOT'].'/Empanadas Espectranas/html/fotos/prods/';
                            move_uploaded_file($_FILES['regImg']['tmp_name'],$destinoImg.$nomImg);

                            $nomImg=preg_replace("/\s+/", "%20", $nomImg);
                            $tabla='productos';
                            $datos=array('nombre'=>$_POST['regProd'], 'descripcion'=>$_POST['regDesc'], 'foto'=>$nomImg, 'precio'=>$_POST['regPrecio'], 'tipo'=>$_POST['tipos']);
                            $rta=mdlFormProd::mdlRegProd($tabla, $datos);
                            return $rta;
                        }else{
                            echo 'no se acepta el tipo de archivo';
                        }
                    }else{
                        echo 'el tamaño es demasiado grande';
                    }
                }else{
                    $rta='error';
                    return $rta;
                }
            }else{
                $rta='complete todos los campos';
                return $rta;
            }
        }
        static public function ctrlSelectProd(){
            $tabla='productos';
            $rta=mdlFormProd::mdlSelectProd($tabla);
            return $rta;
        }
    }