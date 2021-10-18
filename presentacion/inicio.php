<div class="container" id="login">
    <div class="row">
        <div class="col align-self-center">
            <form class="form-signin"
                  action="index.php?pid=<?php echo base64_encode("presentacion/autenticar.php") ?>&action=login"
                  method="post">
                <div class="brand text-center">
                    <?php
                    if(isset($_GET["result"]) && $_GET["result"] == "success"){ ?>
                        <div class="alert alert-success result align-items-center" role="alert">
                            Cliente registrado exitosamente.</div>
                    <?php }
                    ?>
                    <div class="mb-4 logo">
                        <a
                                href="index.php?pid=<?php echo base64_encode("presentacion/inicio.php") ?>"
                                title="Login"><i class="fas fa-dumbbell fa-7x"></i></a>
                    </div>


                    <h1 class="h3 mb-3 font-weight-normal">Sistema de Gestion Gimnasios</h1>
                    <?php if (isset($_GET['login'])) { ?>
                        <div class="alert alert-danger" role="alert">Correo o clave
                            incorrectos.
                        </div>
                    <?php }
                    elseif (isset($_GET["status"]) && $_GET["status"] == "fail"){?>
                        <div class="alert alert-danger" role="alert">Usuario no activo aun
                        </div>
                    <?php } ?>
                </div>
                <!--Campo de correo-->
                <div class="input-group mb-3">
                    <div class="input-group-prepend email">
                        <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
                    </div>
                    <input type="email" name="correo" id="inputEmail" class="form-control"
                           placeholder="Correo electronico" required autofocus=""
                           title="Ingrese correo"/>
                </div>

                <!--Campo de contraseña-->
                <div class="input-group mb-3 contr">
                    <div class="input-group-prepend pass">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div>
                    <input type="password" name="clave" id="inputEmail"
                           class="form-control" placeholder="Contraseña" required autofocus=""
                           title="Ingrese Contraseña"/>
                </div>

                <div class="input-group mb-3">
                    <button class="btn btn-lg btn-primary btn-block btn-ingreso"
                            type="submit">Ingresar
                    </button>


                </div>

            </form>
        </div>
    </div>
</div>
</div>

    <script>
        document.title = "Sistema de Gestion Gimnasios";
    </script>