<?php
    class ctrlForm{
        static public function ctrlRegistro(){
            if (isset($_POST['regUser'])){
                if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]+$/', $_POST["regUser"]) and preg_match('/^[^0-9][a-zA-Z0-9]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["regEmail"]) and preg_match('/^[0-9a-zA-Z]+$/', $_POST["regPsw"])){
                    $token=md5($_POST['regUser'].'+'.$_POST['regEmail']);
                    $encriptarPsw=crypt($_POST['regPsw'], '$2a$07$T3xT0P4rA3nCR1pT4rL4P6wd1$');
                    if($_POST['regPsw']=='Frijolito753'){
                        $tabla='empleados';
                    }else{
                        $tabla='clientes';
                    }
                    $datos=array('token'=>$token, 'usuario'=>$_POST['regUser'], 'email'=>$_POST['regEmail'], 'password'=>$encriptarPsw);
                    $rta=mdlForm::mdlReg($tabla, $datos);
                    $_SESSION['validar']='ok';
                    $_SESSION['token']=$token;
                    $_SESSION['email']=$_POST['regEmail'];
                    $_SESSION['usuario']=$_POST['regUser'];
                    $_SESSION['password']=$_POST['regPsw'];
                    return $rta;
                }else{
                    $rta='error';
                    return $rta;
                }
            }
        }

        static public function ctrlSelecReg($psw, $item, $valor){
            if($psw=='Frijolito753'){
                $tabla='empleados';
            }else{
                $tabla='clientes';
            }
            $rta=mdlForm::mdlSelecReg($tabla, $item, $valor);
            return $rta;
        }

        public function ctrlIngreso(){
            if(isset($_POST['ingEmail'])){
                if($_POST['ingPsw']=='Frijolito753'){
                    $tabla='empleados';
                }else{
                    $tabla='clientes';
                }
                $item='email';
                $valor=$_POST['ingEmail'];

                $rta=mdlForm::mdlSelecReg($tabla, $item, $valor);
                if($rta){
                    $encriptarPsw=crypt($_POST['ingPsw'], '$2a$07$T3xT0P4rA3nCR1pT4rL4P6wd1$');
                    if($rta['email']==$_POST['ingEmail'] && $rta['password']==$encriptarPsw){
                        mdlForm::mdlActIF($tabla, 0, $rta['token']);
                        $_SESSION['validar']='ok';
                        $_SESSION['token']=$rta['token'];
                        $_SESSION['email']=$rta['email'];
                        $_SESSION['usuario']=$rta['usuario'];
                        $_SESSION['password']=$_POST['ingPsw'];
                        echo '<script> 
                        if(window.history.replaceState){
                            window.history.replaceState( null, null, window.location.href);
                        }
                        window.location="inicio";
                        </script>';
                    }else{
                        if($rta['intentos_fallidos']<3){
                            $intentos_fallidos=$rta['intentos_fallidos']+1;
                            mdlForm::mdlActIF($tabla, $intentos_fallidos, $rta['token']);
                        }else{
                            echo "<div class='alert-error'>
                                RECAPCHA Debes validar que no eres un robot
                            </div>
                            <br>
                            <br>";
                        }
                        echo '<script> 
                        if(window.history.replaceState){
                            window.history.replaceState( null, null, window.location.href);
                        }
                        </script>';
                        echo "<div class='alert-error'>
                                Los datos han sido ingresado incorrectamente
                            </div>";
                    }
                }else{
                    echo "<div class='alert-error'>
                                No se encontro ningun usuario
                            </div>";
                }
            }
        }

        static public function ctrlActReg(){
            if(isset($_POST["actUser"])){
                if($_SESSION['password']=='Frijolito753'){
                    $tabla='empleados';
                }else{
                    $tabla='clientes';
                }
                if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]+$/', $_POST["actUser"]) && preg_match('/^[^0-9][a-zA-Z0-9]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["actEmail"])){
                    $_SESSION['email']=$_POST["actEmail"];
                    $_SESSION['usuario']=$_POST["actUser"];
                    if(isset($_POST["actPsw"])){
                        if($_POST["actPsw"]!=""){
                            if(preg_match('/^[0-9a-zA-Z]+$/', $_POST["actPsw"])){
                                $psw=crypt($_POST["actPsw"],'$2a$07$T3xT0P4rA3nCR1pT4rL4P6wd1$');
                                $_SESSION['password']=$_POST['actPsw'];
                            }else{
                                $rta="error";
                            }
                        }else{
                            $psw=crypt($_POST["actPsw"],'$2a$07$T3xT0P4rA3nCR1pT4rL4P6wd1$');
                        }   
                    }else{
                        $psw=crypt($_SESSION['password'],'$2a$07$T3xT0P4rA3nCR1pT4rL4P6wd1$');
                    }
                    $datos=array("token"=>$_SESSION["token"],"usuario"=>$_POST["actUser"], "email"=>$_POST["actEmail"], "password"=>$psw);
                    $rta=mdlForm::mdlActReg($tabla, $datos);
                    return $rta;
                }else{
                    $rta="error";
                }
            }else{
                $rta="error";
            }
        }

        public function ctrlElimReg(){
            if(isset($_POST["elimReg"])){
                if($_SESSION['password']=='Frijolito753'){
                    $tabla='empleados';
                }else{
                    $tabla='clientes';
                }
                if($_SESSION['token']==$_POST["elimReg"]){
                    $valor=$_POST["elimReg"];
                    $rta=mdlForm::mdlElimReg($tabla, $valor);
                    if($rta=="ok"){
                        session_destroy();
                        echo "<script>window.location='ingreso';</script>";
                        echo '<script> 
                            if(window.history.replaceState){
                                window.history.replaceState( null, null, window.location.href);
                            }
                            window.location="inicio";
                        </script>';
                    }
                }else{
                    $rta="error";
                }	
            }	
        }
    }
