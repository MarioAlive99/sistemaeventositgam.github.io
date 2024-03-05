	<!-- Spinner Start -->
	<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
		<div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
	</div>
	<!-- Spinner End -->
	<!-- Topbar Start -->
	<div class="container-fluid BGGB-primary text-white d-none d-lg-flex">
		<div class="container py-2">
			<div class="d-flex align-items-center">
				<a href="#">
					<h2 class="text-white fw-bold m-0">Instituto Tecnológico de Gustavo A Madero</h2>
				</a>
				<div class="ms-auto d-flex align-items-center">

					<div class="ms-2 d-flex">
						<a class="btn btn-sm-square btn-light text-primary rounded-circle ms-2" href="https://www.facebook.com/people/Tecnol%C3%B3gico-Nacional-de-M%C3%A9xico-ITGAM/100032494910892/"><i class="fab fa-facebook-f"></i></a>
						<a class="btn btn-sm-square btn-light text-primary rounded-circle ms-2" href="https://www.youtube.com/@institutotecnologicodegust425/featured"><i class="fab fa-youtube"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Topbar End -->


	<!-- Navbar Start -->
	<div class="container-fluid BGGB-primary sticky-top">
		<div class="container">
			<nav class="navbar  navbar-expand-lg BGGB-primary navbar-light p-lg-0">
				<a href="index.html" class="navbar-brand d-lg-none">
					<h1 class="fw-bold m-0 text-white">ITGAM </h1>
				</a>
				<button type="button" class="navbar-toggler me-0 btn-light" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarCollapse">
					<div class="navbar-nav">
						<a href="index.php?pagina=inicio" class="nav-item nav-link ">Inicio</a>
						<a href="index.php?pagina=talleres" class="nav-item nav-link">Talleres y Conferencias</a>
					 

						<?php
						if (isset($_SESSION["tipo_usuario"]) && $_SESSION["tipo_usuario"] == "alumno") {
							// Mostrar opciones para usuarios tipo "alumno"
							echo '<a href="index.php?pagina=AlumnoEspacio" class="nav-item nav-link">Mi espacio</a>';
							echo '<a href="index.php?pagina=salir" class="nav-item nav-link">Salir</a>';
						} else if (isset($_SESSION["tipo_usuario"]) && $_SESSION["tipo_usuario"] == "maestro") {
							// Mostrar opciones para usuarios tipo "maestro"
							echo '<a href="index.php?pagina=MaestroEspacio" class="nav-item nav-link">Mi espacio</a>';
							echo '<a href="index.php?pagina=crearCurso" class="nav-item nav-link">Crear Taller</a>';
							echo '<a href="index.php?pagina=salir" class="nav-item nav-link">Salir</a>';
						}
						else if (isset($_SESSION["tipo_usuario"]) && $_SESSION["tipo_usuario"] == "admin") {
							// Mostrar opciones para usuarios tipo "maestro"
							echo '<a href="index.php?pagina=AdminAreaCursos" class="nav-item nav-link">Gestionar Talleres</a>';
							echo '<a href="index.php?pagina=AdminAreaAlumnos" class="nav-item nav-link">Alumnos</a>';
							echo '<a href="index.php?pagina=AdminAreaMaestros" class="nav-item nav-link">Maestros</a>';
							echo '<a href="index.php?pagina=salir" class="nav-item nav-link">Salir</a>';
						}
						?>

					</div>
					<div class="ms-auto d-none d-lg-block">
						<?php

						if (isset($_SESSION["validarIngreso"]) && $_SESSION["validarIngreso"] == "ok") {
							// Mostrar opciones para usuarios tipo "alumno"
							echo '<a class="btn btn-primary rounded-pill py-2 px-3" name="login">Hola ' . $_SESSION["nombre"] . '</a>';
						} else {
							// Mostrar opciones para otros tipos de usuarios

							if (isset($_GET["pagina"]) && $_GET["pagina"] == "ingreso") {
								echo '<a href="index.php?pagina=registro" class="btn btn-primary rounded-pill py-2 px-3" name="login">Regístrate Aquí</a>';
							} else {
								echo '<a href="index.php?pagina=ingreso" class="btn btn-primary rounded-pill py-2 px-3" name="login">inicio de sesión</a>';
							}
						}
						?>
					</div>
				</div>
			</nav>
		</div>
	</div>
	<!-- Navbar End -->