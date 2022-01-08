<?php
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

<div id="seccion-pagina" class="subtitulo_grande">
    <h3 id="subtitulo_g"><b>Acerca de Nosotros</b></h3>
</div>
</div>
</header>
<div id="contenedor-general">
    <div id="contenido">
        <section>
            <div id="seccion-pagina" class="desarrollo">
                <div class="cont">
                    <div class="nosotros">
                        <img class="fotoSpectro" src="html/fotos/Spectro.jpeg" width="329" height="276"
                            alt="Espectro y Friends" title="Miembros originales de EE">
                        <h3 id="nosotros ">Nosotros</h3>
                        <p>
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Magni at maxime modi facilis
                            exercitationem, assumenda corrupti, autem natus delectus distinctio culpa saepe. Similique
                            adipisci minus cumque sapiente, dolorem provident. Dignissimos blanditiis eos iusto natus
                            quae, reprehenderit consequuntur debitis ex eligendi cumque sunt perferendis voluptatum ab
                            repellendus voluptatem animi numquam molestias itaque dolorum totam cupiditate deserunt
                            illo.
                            <br>
                            laudantium dolores odit, porro voluptate fugiat expedita corporis qui ea inventore sapiente
                            aliquid nihil reiciendis totam ipsam. Perferendis quae iure pariatur, nesciunt suscipit
                            facere molestias, commodi sit aut repellat doloremque vero quam dolorem voluptatem? Suscipit
                            a dicta, excepturi nulla accusamus, repellat accusantium deleniti laudantium dignissimos
                            aliquam ad facere. Deleniti illum quia facere suscipit?
                        </p>
                    </div>
                    <br>
                    <div class="local">
                        <img class='fotoLocal' src="html/fotos/local.jpg" alt="nuestro local">
                        <h3 id="local">El Local</h3>
                        <p>
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. In reiciendis consequuntur quidem.
                            Deleniti consequuntur a quo rerum ab animi vero culpa! Reprehenderit fuga quam consequatur,
                            delectus rerum ipsam totam consequuntur impedit illo, consectetur officiis, ut modi! Est
                            animi libero consequatur, officia,
                            <br>
                            possimus ducimus delectus aliquid quam incidunt ut obcaecati impedit cupiditate alias? Quia
                            aspernatur, distinctio deleniti nesciunt asperiores veniam exercitationem itaque ipsum
                            facere a tempore repudiandae, officiis aut vitae ea deserunt recusandae quasi hic voluptate
                            fugit. Magnam dignissimos dolorum pariatur minus exercitationem id in laboriosam
                            voluptatibus numquam, fugiat iste. In!
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </div>