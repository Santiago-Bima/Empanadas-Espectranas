<?php
	if(!isset($_SESSION["validar"])){
		echo "<script>window.location='ingreso';</script>";
		return;
	}else{
		if($_SESSION["validar"]!="ok"){
			echo "<script>window.location='ingreso';</script>";
			return;
		}
	}

	if(isset($_GET["token"])){
        $item="token";
        $valor=$_GET["token"];
		$psw=$_SESSION['password'];
		$usuario=ctrlForm::ctrlSelecReg($psw, $item, $valor);
	}
?>

<div id="seccion-pagina" class="subtitulo_grande">
    <h3 id="subtitulo_g"><b>Cuenta</b></h3>
</div>
</div>
</header>

<div id="contenedor-general">
    <div id="contenido">


        <section>
            <div id="seccion-pagina" class="desarrollo">
                <h1 id="sub-indice">Editar</h1>
                <a class="volver" href="inicio">Volver</a>
            </div>
        </section>

        <form method="post">
            <ul>
                <div class="form">
                    <li>
                        <input type="text" id='usuario' value='<?php echo $_SESSION['usuario']; ?>'
                            placeholder="Actualizar nombre" name="actUser" autocomplete="off">
                    </li>
                    <li>
                        <input type="email" id='email' value='<?php echo $_SESSION['email']; ?>'
                            placeholder="Actualizar Email" name="actEmail" autocomplete="off">
                    </li>
                    <?php
                            if ($psw!='Frijolito753'){
                                echo '<li>
                                    <input type="password" id="psw" placeholder="Actualizar Contraseña" name="actPsw">
                                    <input type="hidden" name="pswAct" value='. $_SESSION["password"].'>
                    <input type="hidden" name="tokenUser" value='.$_SESSION["token"].'>
                    </li>';
                    }
                    $act=ctrlForm::ctrlActReg();
                    if($act=="ok"){
                    echo '<script>
                        if (window.history.replaceState) {
                            window.history.replaceState(null, null, window.location.href);
                        }
                    </script>';
                    echo "<div class='alert'>
                        El usuario ha sido actualizado
                    </div>
                    <script>
                        setTimeout(function () {
                            window.location = 'inicio';
                        }, 1500)
                    </script>";
                    }else if($act=="error"){
                    echo '<script>
                        if (window.history.replaceState) {
                            window.history.replaceState(null, null, window.location.href);
                        }
                    </script>';
                    echo "<div class='alert-error'>
                        Error al actualizar el usuario
                    </div>";
                    }else if($act=="nook"){
                        echo '<script> 
                                if(window.history.replaceState){
                                    window.history.replaceState( null, null, window.location.href);
                                }
                            </script>';
                        echo "<div class='alert-error'>
                                Error, el mail de usuario ya existe
                            </div>";                                                
            }
                    ?>
                    <li>
                        <button type="submit" class='act'>Actualizar</button>
                    </li>
                </div>
            </ul>
        </form>


    </div>