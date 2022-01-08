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