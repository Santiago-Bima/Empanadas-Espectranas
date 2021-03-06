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
    if(isset($_GET["id"])){
        $item="id";
        $valor=$_GET["id"];
		$producto=ctrlFormProd::ctrlSelectProd($item, $valor);
	}
    $stmt=conexion_sql::conectar()->prepare("SELECT * FROM tipos_de_productos");
	$stmt->execute();
    $tipos=$stmt->fetchAll();
?>

<div id="seccion-pagina" class="subtitulo_grande">
	<h3 id="subtitulo_g"><b>Productos</b></h3>
</div>
</div>
</header>

<div id="contenedor-general">
	<div id="contenido">
		<?php
				require_once 'mdl/conexion_sql.php';
			?>
		<form class='form' method="post" enctype="multipart/form-data">
			<ul>
				<li>
					<label for="producto">Nombre del producto:</label>
					<br>
					<input type="text" id="producto" name="editProd" autocomplete="off"  value='<?php echo $producto['nombre'] ?>'>
				</li>
				<br>
				<li>
					<label for="desc">Descripción:</label>
					<br>
					<textarea id="desc" name="editDesc"><?php echo $producto['descripcion'] ?></textarea>
				</li>
				<br>
				<li>
					<label for="img" class="img">Imagen:</label>
					<br>
					<input type="file" id="img" name="editImg" accept="image/png, image/jpeg, image/jpg" size="20">
				</li>

				<br>
				<li>
					<label for="precio">Precio:</label>
					<br>
					<input type="number" min="1" id="precio" class='precio' name="editPrecio" autocomplete="off"
						title="" value='<?php echo $producto['precio'] ?>'>
				</li>
				<li class='tipos'>
					<select name='tipos'>
						<option value="<?php echo $producto['tipo'] ?>"><?php echo $producto['tipo'] ?></option>
						<?php
									$stmt=conexion_sql::conectar()->prepare("SELECT * FROM tipos_de_productos");
									$stmt->execute();
            						$tipos=$stmt->fetchAll();
									foreach ($tipos as $key=>$valores):
                                        if($valores['tipos']!=$producto['tipo']){
                                            echo "<option value='".$valores['tipos']."'>".$valores['tipos']."</option>";
                                        }
									endforeach;
							?>
					</select>
				</li>
				<br>
				<?php
						$update=ctrlFormProd::ctrlEditProd($item, $valor);
						if($update=='ok'){
							echo '<script> 
									if(window.history.replaceState){
										window.history.replaceState( null, null, window.location.href);
									}
								</script>';
							echo "<div class='alert'>
								El producto se actualizó correctamente
							</div>";
						}elseif($update=="error"){
							echo '<script> 
									if(window.history.replaceState){
										window.history.replaceState( null, null, window.location.href);
									}
								</script>';
							echo "<div class='alert-error'>
									Error, no pudo actualizarse  el producto
								</div>";
						}else{
							echo "<div class='alert3'>"
								.$update."
								</div>";
						}
					?>
				<li>
					<button type="submit" value="Registrar">Editar</button>
				</li>
			</ul>
		</form>
	</div>