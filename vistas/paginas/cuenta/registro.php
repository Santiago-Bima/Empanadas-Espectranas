<div id="seccion-pagina" class="subtitulo_grande">
    <h3 id="subtitulo_g"><b>Cuenta</b></h3>
</div>
</div>
</header>

<div id="contenedor-general">
    <div id="contenido">

        <section>
            <div id="seccion-pagina" class="desarrollo">
                <h1 id="sub-indice">Registro</h1>
                <a class="volver" href="inicio">Volver</a>
                <a class="ingresoRegistro" href="ingreso">Iniciar Sesion</a>
                <form action="" method="post">
                    <div class="form">
                        <ul>
                            <li>
                                <label for="usuario">Ingrese el usuario</label>
                                <br>
                                <input type="text" id="usuario" name="regUser" placeholder="Nombre de Usuario"
                                    autocomplete="off">
                            </li>
                            <li>
                                <label for="email">Ingrese el Email</label>
                                <br>
                                <input type="email" id="email" name="regEmail" placeholder="Correo electrónico"
                                    autocomplete="off">
                            </li>
                            <li>
                                <label for="psw">Ingrese la Contraseña</label>
                                <br>
                                <input type="password" id="psw" name="regPsw" placeholder="Contraseña"
                                    autocomplete="off">
                            </li>
                            <?php
                                        $registro=ctrlForm::ctrlRegistro();
                                        if($registro=='ok'){
                                            echo '<script> 
                                                    if(window.history.replaceState){
                                                        window.history.replaceState( null, null, window.location.href);
                                                    }
                                                    window.location="inicio";
                                                </script>';
                                        }elseif($registro=="error"){
                                            echo '<script> 
                                                    if(window.history.replaceState){
                                                        window.history.replaceState( null, null, window.location.href);
                                                    }
                                                </script>';
                                            echo "<div class='alert-error'>
                                                    Error, esta mal ingresado el usuario
                                                </div>";
                                        }elseif($registro=="nook"){
                                                    echo '<script> 
                                                            if(window.history.replaceState){
                                                                window.history.replaceState( null, null, window.location.href);
                                                            }
                                                        </script>';
                                                    echo "<div class='alert-error'>
                                                            Error, el mail de usuario ya existe
                                                        </div>";                                                
                                        }
                                    ?>
                            <li class="button li-form">
                                <button type="submit">Enviar</button>
                            </li>
                        </ul>
                    </div>
                </form>
            </div>
        </section>


    </div>