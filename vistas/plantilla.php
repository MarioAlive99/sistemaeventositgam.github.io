<?php

session_start();

?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<title>ITGAM</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta content="" name="keywords">
	<meta content="" name="description">

	<!-- Favicon -->
	<link href="vistas/img/favicon.ico" rel="icon">

	<!-- Google Web Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

	<!-- Icon Font Stylesheet -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

	<!-- Libraries Stylesheet -->
	<link href="vistas/lib/animate/animate.min.css" rel="stylesheet">
	<link href="vistas/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
	<link href="vistas/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

	<!-- Customized Bootstrap Stylesheet -->
	<link href="vistas/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

	<!-- Template Stylesheet -->
	<link href="vistas/css/style.css" rel="stylesheet">
</head>

<body>

	<?php

	/*=============================================
	Módulos fijos superiores
	=============================================*/
	include "paginas/cabecera.php";



	#ISSET: isset() Determina si una variable está definida y no es NULL
	#contenido
	if (isset($_GET["pagina"])) {     
		if (
			$_GET["pagina"] == "registro" ||
			$_GET["pagina"] == "ingreso" ||
			$_GET["pagina"] == "talleres" ||
			$_GET["pagina"] == "crearCurso" ||
			$_GET["pagina"] == "crearMaestro" ||
			$_GET["pagina"] == "AlumnoEspacio" ||
			$_GET["pagina"] == "MaestroEspacio" ||
			$_GET["pagina"] == "editarCurso" ||
			$_GET["pagina"] == "AdminAreaMaestros" ||
			$_GET["pagina"] == "AdminMaestroIndividual" ||
			$_GET["pagina"] == "AdminEditarMaestro" ||
			$_GET["pagina"] == "AdminAreaAlumnos" ||
			$_GET["pagina"] == "AdminAlumnoIndividual" ||
			$_GET["pagina"] == "VerCurso" ||
			$_GET["pagina"] == "VerCursoAlumno" ||
			$_GET["pagina"] == "AdminAreaCursos" ||
			$_GET["pagina"] == "AdminCursoIndividual" ||
			$_GET["pagina"] == "AdminEditarCurso" ||
			$_GET["pagina"] == "AdminAreaInscriptos" ||
			$_GET["pagina"] == "AdminInscripcionIndividual" ||
			$_GET["pagina"] == "AdminAreaPagos" ||
			$_GET["pagina"] == "AdminAreaPagosAlumnas" ||
			$_GET["pagina"] == "AdminAreaPagosAlumnos" ||
			$_GET["pagina"] == "AdminAreaMaestrosMasivos" ||
			$_GET["pagina"] == "AdminCarrusel" ||
			$_GET["pagina"] == "Prueba" ||
			$_GET["pagina"] == "salir" ||
			$_GET["pagina"] == "inicio"
		) {

			include "paginas/" . $_GET["pagina"] . ".php";
		} else {
			include "paginas/error404.php";
		}
	} else {
		include "paginas/inicio.php";
	}

	#pie de pagina
	include "paginas/pie.php";
	?>





	<a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


	<!-- JavaScript Libraries -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
	<script src="vistas/lib/wow/wow.min.js"></script>
	<script src="vistas/lib/easing/easing.min.js"></script>
	<script src="vistas/lib/waypoints/waypoints.min.js"></script>
	<script src="vistas/lib/owlcarousel/owl.carousel.min.js"></script>
	<script src="vistas/lib/lightbox/js/lightbox.min.js"></script>
	<!--<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>-->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

	<!-- Template Javascript -->
	<script src="vistas/js/main.js"></script>
	<script src="vistas/js/scriptM.js"></script>
 
</body>

</html>