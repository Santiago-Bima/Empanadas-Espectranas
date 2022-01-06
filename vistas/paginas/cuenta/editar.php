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
    $productos=ctrlFormProd::ctrlSelectProd(null, null);
    $stmt=conexion_sql::conectar()->prepare("SELECT * FROM tipos_de_productos");
	$stmt->execute();
    $tipos=$stmt->fetchAll();
?>


<div id="seccion-pagina" class="nav">
    <nav class="menu">
        <div id="decor_nav">
            <img class="logo"
                src="https://images.vexels.com/media/users/3/143119/isolated/preview/a0f029c40978547ca50451575e1f4586-icono-de-empanada-by-vexels.png">
            <p class="p_logo">
                EE
            </p>
            <p class="barra">|</p>
            <button class="ham" type="button">
                <span class="btn_menu">
                    <i class="fa fa-bars"></i>
                </span>
            </button>
        </div>
        <ul class="menu_items">
            <li>
                <a class="li_a_princ" href="inicio">Inicio</a>
            </li>
            <li class="li_buscar">
                <ul class="buscar">
                    <input id='buscador' class="form_control me-2" type="search" placeholder="buscar"
                        aria-label="search">
                    <div class='search' id='search'>
                        <ul id='box-search'>
                            <li><a href="inicio">Inicio</a></li>
                            <li><a href="inicio#empanadas">Empanadas</a></li>
                            <li><a href="inicio#bebidas">Bebidas</a></li>
                            <?php 
                                foreach($tipos as $key=>$tipoProd): ?>
                            <li><a href=" inicio#<?php echo $tipoProd['tipos'] ?>"><?php echo $tipoProd["tipos"]; ?></a>
                            </li>
                            <?php endforeach;?>
                            <li><a href="info">Info</a></li>
                            <li><a href="#nosotros">Acerca de Nosotros</a></li>
                            <li><a href="#local">Local</a></li>
                            <li><a href="editar">Editar</a></li>
                            <li><a href="ingreso">Ingreso</a></li>
                            <li><a href="registro">Registro</a></li>
                            <?php foreach($productos as $key=>$value):?>
                            <li><a href="inicio#<?php echo $value['nombre'] ?>"><?php echo $value["nombre"]?></a></li>
                            <?php
                                endforeach;
                            ?>
                        </ul>
                    </div>
                </ul>
            </li>
        </ul>
    </nav>
</div>
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