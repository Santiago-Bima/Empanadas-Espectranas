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
                            <td>
                                <h4 id="<?php echo $value['nombre'] ?>" class='nombre'><?php echo $value["nombre"]?>
                                </h4>
                            </td>
                            <br>
                            <td><?php echo '<img src="html/fotos/prods/'.$value["foto"].'" width="250px" height="150px" style="margin-top: 8px">'?>
                            </td>
                            <br>
                            <div class="detalles">
                                <form action="" method="post">
                                    <td>
                                        <h4 id="<?php echo $value['nombre'] ?>" class='nombre'>
                                            <?php echo $value["nombre"]?>
                                        </h4>
                                    </td>
                                    <br>
                                    <td><?php echo '<img src="html/fotos/prods/'.$value["foto"].'" width="250px" height="150px" style="margin-top: 8px">'?>
                                    </td>
                                    <br>
                                    <td>
                                        <p class='desc'><?php echo $value["descripcion"]?></p>
                                    </td>
                                    <br>
                                    <td>
                                        <input type="number" min="1" name="cant" autocomplete="off"    placeholder="cantidad" class='cant'>
                                    </td>
                                    <td>
                                        <input type="hidden" name="precio" class='precio_escondido' value="<?php echo $value["precio"]?>">
                                        <p class='precio'>Precio: $0</p>
                                    </td>
                                    <input type="submit" value="Agregar al carrito" class="agregar_carrito">
                                </form>
                            </div>
                        </tr>
                    </div>
                    <?php
                        if($_SESSION['password']=='Frijolito753'): ?>
                            <a class='editProd' href="index.php?activo=editarprod&id=<?php echo $value['Id']; ?>"><i class=" far fa-edit"></i></a>
                            <form method="post">
                                <input type="hidden" value="<?php echo $value['Id'] ?>" name="elimProd">
                                <input type="hidden" name="foto" value="<?php echo 'html/fotos/prods/'.$value['foto'] ?>">
                                <input type='button'  class='elimProd' onclick="if(confirm('Quieres eliminar este producto?')){this.form.submit();}"><i class="elimProdIcon fas fa-times"></i>
                                    <?php
                                        $eliminar= new ctrlFormProd();
                                        $eliminar->ctrlElimProd();
                                    ?>
                            </form>
                    <?php 
                        endif;
                    ?>
                    <i class="cruz fas fa-times"></i>
                    
                    <?php       endif;
                        endforeach;
                        echo '</div>';
                        $cont+=1;
                    endforeach; 
                    ?>
                </div>
        </section>
    </div>