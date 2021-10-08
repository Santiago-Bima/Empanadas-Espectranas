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