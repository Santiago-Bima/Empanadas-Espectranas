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
            <li>
                <a class="li_a_sec" href="info">Info</a>
            </li>
            <li>
                <button class="li_a_sec menu_drop">
                    Menú
                    <i class="menu_drop_js fas fa-caret-down"></i>
                </button>
            </li>
            <li>
                <button id="carrito">
                    <i class="fas fa-cart-arrow-down carrito"></i>
                </button>
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
                                    <li><a href=" inicio#<?php echo $tipoProd['tipos'] ?>"><?php echo $tipoProd["tipos"]; ?></a></li>
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
        </li>
        </ul>
    </nav>
    <ul class="menu_items_drop">
        <?php
                $cont=0;
                foreach($tipos as $key=>$tipoProd){
                    if($cont==0){
                        echo '<a href="#empanadas" class="menu__drop__items sub__in menu__drop__texto">
                                Empanadas
                            </a>';
                    }elseif($cont==2){
                        echo '<a href="#bebidas" class="menu__drop__items sub__in menu__drop__texto">
                                Bebidas
                            </a>';
                    }
                    echo '<a href="#'.$tipoProd['tipos'].'" class="menu__drop__items menu__prod menu__drop__texto">'.$tipoProd['tipos'].'</a>';
                    $cont+=1;
                }
            ?>
    </ul>
    <div class="contenedor_carrito">
        <ul>
            Lista de productos
            <li>
                <p>total=</p>
            </li>
            <li>
                <button id="compra_carrito">Comprar</button>
            </li>
        </ul>
    </div>
</div>

</header>
<div id="seccion-pagina" class="subtitulo_grande">
    <h3 id="subtitulo_g"><b>Menú</b></h3>
</div>

<div id="contenedor-general">
    <div id="contenido">

        <section>
            <div id="seccion-pagina" class="desarrollo">
                <?php 
                    $cont=0;
                    foreach($tipos as $key=>$tipoProd):
                        if($cont==0){
                            echo '<h1 id="empanadas"> Empanadas </h1>';
                        }elseif($cont==2){
                            echo '<h1 id="bebidas"> Bebidas </h1>';
                        }
                        echo '<h3 id="'.$tipoProd['tipos'].'">'.$tipoProd["tipos"].'</h3>';
                ?>
                <div class='productos'>
                    <?php foreach($productos as $key=>$value):
                            if($value['tipo']==$tipoProd['tipos']): ?>
                    <div class='producto'>
                        <tr>
                            <form action="" method="post">
                                <td>
                                    <h4 id="<?php echo $value['nombre'] ?>" class='nombre'><?php echo $value["nombre"]?>
                                    </h4>
                                </td>
                                <br>
                                <td>
                                    <p class='desc'><?php echo $value["descripcion"]?></p>
                                </td>
                                <br>
                                <td><?php echo '<img src="html/fotos/prods/'.$value["foto"].'" width="250px" height="150px">'?>
                                </td>
                                <br>
                                <td><input type="number" min="1" class='precio' name="cant" autocomplete="off"
                                        placeholder="cantidad"></td>
                                <td>
                                    <p class='precio'>Precio: $<?php echo $value["precio"]?></p>
                                </td>
                            </form>
                        </tr>
                    </div>
                    <?php       endif;
                        endforeach;
                        echo '</div>';
                        $cont+=1;
                    endforeach; 
                ?>
                </div>
        </section>
    </div>