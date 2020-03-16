<?php
$administrador = new Administrador($_SESSION["id"]);
$administrador->consultar();
?>
<div class="nav" style="margin-bottom: auto">
	<div class="container position-relative">
		<nav id="nav" class="navbar navbar-expand-lg">
			<div class="site-logo">
				<a id="tool" class="navbar-brand" href="index.php"
					data-toggle="tooltip" data-placement="bottom"
					title="Sistema de Gestion de Gimnasios"> <i class="fas fa-dumbbell"></i>
					<span class="logo-text"> SGG </span>
				</a>
			</div>
			<button class="navbar-toggler collapsed" type="button"
				data-toggle="collapse" data-target="#navigation"
				aria-controls="navigation" aria-expanded="false"
				aria-label="Toggle navigation">
				<span class="navbar-toggler-icon" style="color: #1a252f"></span>
			</button>
			<div class="navbar-collapse collapse" id="navigation">
				<ul
					class="social-list list-inline mt-3 mt-lg-0 mb-lg-0 d-flex ml-lg-5 mr-lg-5">
					<li class="list-inline-item"><a id="tool" data-toggle="tooltip"
						data-placement="bottom" title="Github"
						href="https://github.com/oscarce10" target="_blank"> <i
							class="fab fa-github"></i>
					</a></li>
					<li class="list-inline-item"><a id="tool" data-toggle="tooltip"
						data-placement="bottom" title="GitLab"
						href="https://gitlab.com/oscarce10" target="_blank"> <i
							class="fab fa-gitlab"></i>
					</a></li>
				</ul>

				<ul class="navbar-nav ml-lg-auto">
					<li class="nav-item mr-lg-4"><span class="nav-link">
                                <?php echo "Administrador: " . $administrador->getNombre() . " " . $administrador->getApellido();?>
                            </span></li>
					<li class="nav-item dropdown" style="overflow: visible"><a
						class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
						role="button" data-toggle="dropdown" aria-haspopup="true"
						aria-expanded="false"> Consultar </a>
						<div
							class="dropdown-menu dropdown-menu-right rounded shadow menu-animate slideIn"
							aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="#"> Clientes </a> <a
								class="dropdown-item" href="#"> Entrenadores </a> <a
								class="dropdown-item" href="#"> Enfermeros </a>
						</div></li>
					<li class="nav-item mr-lg-4"><a class="nav-link" href=""> Opcion </a>
					</li>

					<li class="nav-item mr-lg-4"><a class="nav-link"
						href="index.php?pid=<?php echo  base64_encode("presentacion/salir.php");?>&logout=true">
							Salir </a></li>
				</ul>
			</div>
		</nav>
	</div>
</div>
