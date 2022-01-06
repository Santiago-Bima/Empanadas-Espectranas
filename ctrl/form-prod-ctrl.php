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
                            $datos=array('nombre'=>$_POST['regProd'], 'descripcion'=>$_POST['regDesc'], 'foto'=>$nomImg, 'precio'=>$_POST['regPrecio'], 'tipo'=>$_POST['tipos']);
                            $rta=mdlFormProd::mdlRegProd($datos);
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
        static public function ctrlSelectProd($item, $valor){
            $rta=mdlFormProd::mdlSelectProd($item, $valor);
            return $rta;
        }

        public function ctrlElimProd(){
            if(isset($_POST['elimProd'])){
                $valor=$_POST['elimProd'];
                $rta=mdlFormProd::mdlElimProd($valor);
                unlink('/Empanadas Espectranas/html/fotos/prods/'.$_POST['foto']);
                
                if($rta=="ok"){
                    echo '<script> 
                        if(window.history.replaceState){
                            window.history.replaceState( null, null, window.location.href);
                        }
                        window.location="inicio";
                    </script>';
                }
            }
        }

        static public function ctrlEditProd($item, $valor){
            if(isset($_POST['editProd']) && isset($_POST['editDesc']) && isset($_POST['editPrecio']) && $_POST['tipos']!=" "){
                if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]+$/', $_POST["editProd"])){
                    if($_FILES['editImg']['name']==null){
                        $img=mdlFormProd::mdlSelectProd($item, $valor);
                        $nomImg=$img['foto'];
                    }else{
                        $nomImg=$_FILES['editImg']['name'];
                        $tipoImg=$_FILES['editImg']['type'];
                        $tamañoImg=$_FILES['editImg']['size'];
                        
                        if ($tamañoImg<=1000000){
                            if ($tipoImg=='image/jpeg' || $tipoImg=='image/png' || $tipoImg=='image/jpg'){
                                $destinoImg=$_SERVER['DOCUMENT_ROOT'].'/Empanadas Espectranas/html/fotos/prods/';
                                move_uploaded_file($_FILES['editImg']['tmp_name'],$destinoImg.$nomImg);
    
                                $nomImg=preg_replace("/\s+/", "%20", $nomImg);
                            }else{
                                $rta='no se acepta el tipo de archivo';
                                return $rta;
                            }
                        }else{
                            $rta='el tamaño es demasiado grande';
                            return $rta;
                        }
                    }
                    
                    $datos=array('id'=>$valor,'nombre'=>$_POST['editProd'], 'descripcion'=>$_POST['editDesc'], 'foto'=>$nomImg, 'precio'=>$_POST['editPrecio'], 'tipo'=>$_POST['tipos']);
                    $rta=mdlFormProd::mdlEditProd($datos);
                    return $rta;

                }else{
                    $rta='error';
                    return $rta;
                }
            }else{
                $rta='complete todos los campos';
                return $rta;
            }
        }

}