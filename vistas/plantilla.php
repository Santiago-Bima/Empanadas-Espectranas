<?php
    session_start();
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
                                            <input type='button'  class='eliminar' onclick="if(confirm('Quieres eliminar este usuario?')){this.form.submit();}"><i class='fas fa-user-times' id='elimIcono' style='z-index: 10; position: relative; left: -17.5px; cursor:pointer;'></i>
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
    </body>
</html>