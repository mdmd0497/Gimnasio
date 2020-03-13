<body class="text-center">
	<form class="form-signin" action="index.php?pid=<?php echo base64_encode("presentacion/autenticar.php") ?>&nos=true" method="post">
		<div class="mb-4 logo">
			<a href="index.php?pid=<?php echo base64_encode("presentacion/inicio.php") ?>" title="Login"><i class="fab fa-critical-role fa-7x"></i></a>
		</div>
		<div>
								
		<h1 class="h3 mb-3 font-weight-normal">Sistema de Gestion Gimnasios</h1>
		<?php if(isset($_GET['auth'])){?>
							<div class="alert alert-danger" role="alert">
							Correo o clave incorrectos.
							</div>
						<?php }?>
		<!--Campo de correo-->
		<div class="input-group mb-3">
			<div class="input-group-prepend email">
				<span class="input-group-text"><i class="fas fa-user-tie"></i></span>
			</div>
			<input type="email" name="correo" id="inputEmail" class="form-control" placeholder="Correo electronico" required autofocus="" title="Ingrese correo" />
		</div>

		<!--Campo de contraseña-->
		<div class="input-group mb-3 contr">
			<div class="input-group-prepend pass">
				<span class="input-group-text"><i class="fas fa-key"></i></span>
			</div>
			<input type="password" name="clave" id="inputEmail" class="form-control" placeholder="Contraseña" required autofocus="" title="Ingrese Contraseña" />
		</div>

		
		<button class="btn btn-lg btn-primary btn-block btn-ingreso" type="submit">
			Ingresar
		</button>
            <a id="btn-registro" class="btn btn-primary" href="index.php?pid=<?php echo base64_encode("presentacion/registro.php");?>" role="button">Registro Cliente</a>
		
		</div>

    </form>

</body>