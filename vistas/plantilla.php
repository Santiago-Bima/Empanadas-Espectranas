<?php
    session_start();

    if(isset($_GET["token"])){
        $item="token";
        $valor=$_GET["token"];
	}

    $productos=ctrlFormProd::ctrlSelectProd(null, null);
    $stmt=conexion_sql::conectar()->prepare("SELECT * FROM tipos_de_productos");
	$stmt->execute();
    $tipos=$stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php 
                    $css=new ctrlPlantilla;  
                    echo($css->enlacesCtrlCss());  
                ?>">
    <link rel="stylesheet" href="html/css/estilo-entorno.css">
    <script src="html/js/jquery-3.6.0.min.js"></script>
    <script src="html/js/jquery.dataTables.min.js"></script>
    <title>Empanadas Espectranas</title>

    <link rel="icon" href="https://images.vexels.com/media/users/3/143119/isolated/preview/a0f029c40978547ca50451575e1f4586-icono-de-empanada-by-vexels.png">
		<script src="https://kit.fontawesome.com/62ea397d3a.js" crossorigin="anonymous"></script>
</head>
    <body id="body">
        <header>
                <div  id="seccion-pagina" class="tit_sub_pag">
                    <h1 id="titulo"><b>Empanadas Espectranas</b></h1>
                </div>   
                
                <div id="seccion-pagina" class="nav">
                    <nav class="menu">
                        <div id="decor_nav">
                            <img class="logo"
                                src="https://images.vexels.com/media/users/3/143119/isolated/preview/a0f029c40978547ca50451575e1f4586-icono-de-empanada-by-vexels.png">
                            <p class="p_logo">
                                EE
                            </p>
                            <p class="barra">|</p>
                            
                        </div>
                        <div class="ham_menu">
                            <li>
                                <button class="ham" type="button">
                                    <span class="btn_menu">
                                        <i class="fa fa-bars"></i>
                                    </span>
                                </button>
                            </li>
                            <li class="prop_inicio">
                                <button id="ham_carrito" class="prop_inicio">
                                    <i class="fas fa-cart-arrow-down carrito prop_inicio"></i>
                                </button>
                            </li>
                            <li class="ham_li_buscar">
                                <ul class="ham_buscar">
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
                    <ul class="ham_menu_items_drop prop_inicio">
                        <?php
                                $cont=0;
                                foreach($tipos as $key=>$tipoProd){
                                    if($cont==0){
                                        echo '<a href="#empanadas" class="menu__drop__items sub__in ham__menu__drop__texto">
                                                Empanadas
                                            </a>';
                                    }elseif($cont==2){
                                        echo '<a href="#bebidas" class="menu__drop__items sub__in ham__menu__drop__texto">
                                                Bebidas
                                            </a>';
                                    }
                                    echo '<a href="#'.$tipoProd['tipos'].'" class="menu__drop__items menu__prod ham__menu__drop__texto">'.$tipoProd['tipos'].'</a>';
                                    $cont+=1;
                                }
                            ?>
                    </ul>
                    <div class="ham_options">
                        <li>
                            <a class="li_a_princ" href="inicio">Inicio</a>
                        </li>
                        <li class="prop_inicio">
                            <a class="li_a_sec prop_inicio" href="info">Info</a>
                        </li>
                        <li class="prop_inicio">
                            <button class="li_a_sec ham_menu_drop prop_inicio">
                                Menú
                                <i class="ham_menu_drop_js fas fa-caret-down prop_inicio"></i>
                            </button>
                        </li>
                    </div>
                    <div class="ham_contenedor_carrito prop_inicio">
                        <ul>
                            Lista de productos
                            <div class="lista">
                                No ingresaste ningun producto
                            </div>
                            <li>
                                <input type="hidden" name="total" value="0" id='total'>
                                <p class="total" style="margin-top: 15px;">Total: $0</p>
                            </li>
                            <li>
                                <button id="compra_carrito">Comprar</button>
                                <button id="borrar_carrito" style="position: relative; right: -80px">Borrar</button>
                            </li>
                        </ul>
                    </div>
                    <div class="contenedor_carrito prop_inicio">
                        <ul>
                            Lista de productos
                            <div class="lista">
                                No ingresaste ningun producto
                            </div>
                            <li>
                                <input type="hidden" name="total" value="0" id='total'>
                                <p class="total" style="margin-top: 15px;">Total: $0</p>
                            </li>
                            <li>
                                <button id="compra_carrito">Comprar</button>
                                <button id="borrar_carrito" style="position: relative; right: -80px">Borrar</button>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <?php 
                    $pag=new ctrlPlantilla;  
                    $pag->enlacesCtrl();  
                ?>
                
            <aside>
                <div id="seccion-pagina" class="opciones">
                    <ul id="lista_de_opciones">
                            <li><a id="link_cuenta" href="registro">Registro</a></li>
                            <li><a id="link_cuenta" href="ingreso">Ingreso</a></li>
                            <?php 
                                if(isset($_SESSION["validar"])=='ok'):
                            ?>
                                    <li><a id="link_cuenta" href="index.php?activo=editar&token=<?php echo  $_SESSION['token']; ?>">Editar</a></li>
                                    <li><a id="link_cuenta" href="salir">Salir</a></li>
                                    <li>
                                        <form method="post" style="display:inline;">
                                            <input type="hidden" value="<?php echo $_SESSION['token']; ?>" name="elimReg">
                                            <input type='button'  class='eliminar' onclick="if(confirm('Quieres eliminar este usuario?')){this.form.submit();}"><i class='fas fa-user-times' id='elimIcono' style='z-index: 10; position: relative; left: -17.5px;'></i>
                                            <?php
                                                $eliminar= new ctrlForm();
                                                $eliminar->ctrlElimReg();
                                            ?>
                                        </form>
                                    </li>
                            <?php
                                endif;
                            ?>
                        <?php
                            if(!isset($_SESSION['password'])){
                                $_SESSION['password']='a';
                            }
                            if ($_SESSION['password']=='Frijolito753'){
                                    echo '<li><a href="productos">
                                        + Productos
                                    </a></li>';
                            }
                        ?>
                    </ul>
                    <div class="etiqueta_opciones">
                        <i class="fas fa-angle-right etiqueta"></i>
                    </div>
                </div>
             </aside>

            <footer>
                <div  id="seccion-pagina" class="footer">
                    <div class="f_email">
                        <p>
                            Mail para contactarnos: EspectroFriends@hotmail.com
                        </p>
                    </div>
                    <div class="f_tel">
                        <p>
                            Numero de telefono: +54 9 351-234-4344
                        </p>
                    </div>
                </div>
            </footer>
        </div>

        <!-- js -->
        <script src="<?php 
            $js=new ctrlPlantilla; 
            echo($js->enlacesCtrlScripts());
        ?>"></script>
        <script src="html/js/buscador.js"></script>
        <script src="html/js/entorno.js"></script>
    </body>
</html>