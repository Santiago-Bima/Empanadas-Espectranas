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
	$productos=ctrlFormProd::ctrlSelectProd(null, null);
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
					<input type="text" id="producto" name="regProd" autocomplete="off">
				</li>
				<br>
				<li>
					<label for="desc">Descripción:</label>
					<br>
					<textarea id="desc" name="regDesc"></textarea>
				</li>
				<br>
				<li>
					<label for="img" class="img">Imagen:</label>
					<br>
					<input type="file" id="img" name="regImg" accept="image/png, image/jpeg, image/jpg" size="20">
				</li>

				<br>
				<li>
					<label for="precio">Precio:</label>
					<br>
					<input type="number" min="1" id="precio" class='precio' name="regPrecio" autocomplete="off"
						title="">
				</li>
				<li class='tipos'>
					<select name='tipos'>
						<option value=" ">Seleccione:</option>
						<?php
									$stmt=conexion_sql::conectar()->prepare("SELECT * FROM tipos_de_productos");
									$stmt->execute();
            						$tipos=$stmt->fetchAll();
									foreach ($tipos as $key=>$valores):
										echo '<option value="'.$valores["tipos"].'">'.$valores["tipos"].'</option>';
									endforeach;
							?>
					</select>
				</li>
				<br>
				<?php
						$registro=ctrlFormProd::ctrlRegProd();
						if($registro=='ok'){
							echo '<script> 
									if(window.history.replaceState){
										window.history.replaceState( null, null, window.location.href);
									}
								</script>';
							echo "<div class='alert'>
								El producto se ingreso correctamente
								<br>
								recarge la página si quiere ingresar otro
							</div>";
						}elseif($registro=="error"){
							echo '<script> 
									if(window.history.replaceState){
										window.history.replaceState( null, null, window.location.href);
									}
								</script>';
							echo "<div class='alert-error'>
									Error, no pudo ingresarse el producto
								</div>";
						}else{
							echo "<div class='alert3'>"
								.$registro."
								</div>";
						}
					?>
				<li>
					<button type="submit" value="Registrar">Registrar</button>
				</li>
			</ul>
		</form>
	</div>