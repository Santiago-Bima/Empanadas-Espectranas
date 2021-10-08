<?php
    $productos=ctrlFormProd::ctrlSelectProd();
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
                <h1 id="sub-indice">Ingreso</h1>
                <a class="volver" href="inicio">Volver</a>
                <a class="ingresoRegistro" href="registro">Registrarse</a>
            </div>
            <div>
                <form action="" method="post">
                    <div class="form">
                        <ul>
                            <li>
                                <label for="email">Email adress</label>
                                <br>
                                <input type="email" id="email" name="ingEmail" placeholder="Correo electrónico"
                                    autocomplete="off">
                            </li>
                            <li>
                                <label for="psw">Contraseña</label>
                                <br>
                                <input type="password" id="psw" name="ingPsw" placeholder="Contraseña"
                                    autocomplete="off">
                            </li>
                            <?php
                                    $ingreso=new ctrlForm();
                                    $ingreso->ctrlIngreso();
                                ?>
                            <li>
                                <button class='btn'type="submit">Ingresar</button>
                            </li>
                        </ul>
                    </div>
                </form>
            </div>
        </section>


    </div>