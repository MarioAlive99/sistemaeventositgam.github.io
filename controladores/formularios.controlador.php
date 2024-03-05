<?php

class ControladorFormularios
{

	/*=============================================
	Registro
	=============================================*/

	static public function ctrRegistro()
	{



		if (isset($_POST["numero_control"])) {

			$tabla = "usuario";

			$datos = array(
				"numero_control" => $_POST["numero_control"],
				"nombre" => $_POST["nombre"],
				"carrera" => $_POST["carrera"],
				"semestre" => $_POST["semestre"],
				"grupo" => $_POST["grupo"],
				"correo" => $_POST["correo"],
				"password" => $_POST["password"]
			);

			# Validar campos del formulario con expresiones regulares


			$patron_nombre = "/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/";

			 


			$errores = array();



			if (!preg_match($patron_nombre, $_POST["nombre"])) {
				$errores[] = "El nombre no es válido.";
			}



		 



			# Verificar si el correo ya existe en la base de datos
			$existe_correo = ModeloFormularios::mdlExisteCorreo($tabla, $_POST["correo"]);
			#var_dump($existe_correo);
			if ($existe_correo == true) {
				$errores[] = "El correo ya está en uso.Dirigite con el administrador del sitio.";
			}
			# Verificar si el numero de control ya existe en la base de datos
			$existe_numero_de_control = ModeloFormularios::mdlExisteNúmeroControl($tabla, $_POST["numero_control"]);
			#var_dump($existe_numero);
			if ($existe_numero_de_control == true) {
				$errores[] = "El número de control esta en uso.Dirigite con el administrador del sitio.";
			}

			if (count($errores) > 0) {
				$mensaje_error = "Por favor corrige los siguientes errores:<br><ul>";
				foreach ($errores as $error) {
					$mensaje_error .= "<li>$error</li>";
				}
				$mensaje_error .= "</ul>";
				return $mensaje_error;
			}

			# Si todos los datos son válidos, registrar usuario en la base de datos

			$respuesta = ModeloFormularios::mdlRegistro($tabla, $datos);
			#var_dump($existe_correo);
			if ($respuesta == "ok") {
				return "Usuario registrado ingresa en el login";
			} else {
				return $respuesta;
			}
		}
	}

	/*=============================================
	Seleccionar Registros
	=============================================*/

	static public function ctrSeleccionarRegistros($item, $valor)
	{

		$tabla = "registros";

		$respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	Ingreso
	=============================================*/

	public function ctrIngreso()
	{

		if (isset($_POST["ingresoCorreo"])) {

			// Validar correo electrónico y contraseña


			$tabla = "usuario";
			$item = "correo";
			$valor = $_POST["ingresoCorreo"];

			$respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);

			if (!is_null($respuesta) && $respuesta["correo"] == $_POST["ingresoCorreo"] && $respuesta["password"] == $_POST["ingresoPassword"]) {

				$_SESSION["validarIngreso"] = "ok";
				$_SESSION["tipo_usuario"] = $respuesta["tipo_usuario"];
				$_SESSION["nombre"] = $respuesta["nombre"];
				$_SESSION["carrera"] = $respuesta["carrera"];
				$_SESSION["semestre"] = $respuesta["semestre"];
				$_SESSION["grupo"] = $respuesta["grupo"];
				$_SESSION["limite"] = $respuesta["limite"];
				$_SESSION["numero_control"] = $respuesta["numero_control"];
				// Redirigir a la página de inicio
				echo '<script>
								window.location = "index.php?pagina=inicio";
			</script>';
				exit();
			} else {

				echo '<script>
    alert("Error al ingresar al sistema, el correo o la contraseña no coinciden");
    window.location = "index.php?pagina=ingreso";
</script>';
			}
		}
	}








	/*=============================================
	Actualizar Registro
	=============================================*/
	static public function ctrActualizarRegistro()
	{

		if (isset($_POST["actualizarNombre"])) {

			if ($_POST["actualizarPassword"] != "") {

				$password = $_POST["actualizarPassword"];
			} else {

				$password = $_POST["passwordActual"];
			}

			$tabla = "registros";

			$datos = array(
				"id" => $_POST["idUsuario"],
				"nombre" => $_POST["actualizarNombre"],
				"email" => $_POST["actualizarEmail"],
				"password" => $password
			);

			$respuesta = ModeloFormularios::mdlActualizarRegistro($tabla, $datos);

			return $respuesta;
		}
	}

	/*=============================================
	Eliminar Registro
	=============================================*/
	static public function ctrEliminarRegistro($tabla, $campo, $valor)
	{
		if (isset($_POST["submitEliminar"])) {
			$campo_eliminar = $campo;
			$tabla_eliminar = $tabla;
			$respuesta = ModeloFormularios::mdlEliminarRegistro($tabla_eliminar, $campo_eliminar, $valor);

			if ($respuesta == "ok") {
				$respuesta2 = ModeloFormularios::mdlEliminarInscripcion($valor);
				if ($respuesta2 == "ok") {



					echo '<script>
				if (window.history.replaceState) {
					window.history.replaceState(null, null, window.location.href);
				}
				alert("Registro eliminado con éxito.Seras redirigiendo al inicio.");
				window.location = "index.php?pagina=inicio";
			</script>';
				} else {
					echo '<script>
				alert("No se pudo eliminar la inscripción.Porque no existe");
			</script>';
				}
			} else {
				echo '<script>
				alert("No se pudo eliminar el registro.");
			</script>';
			}
		}
	}


	static public function ctrEliminarRegistroAlumnos($tabla, $campo, $valor)
	{
		if (isset($_POST["submitEliminar"])) {
			$campo_eliminar = $campo;
			$tabla_eliminar = $tabla;
			$respuesta = ModeloFormularios::mdlEliminarRegistro($tabla_eliminar, $campo_eliminar, $valor);

			if ($respuesta == "ok") {
				$respuesta2 = ModeloFormularios::mdlEliminarInscripcion($valor);
				if ($respuesta2 == "ok") {

					echo '<script>
					if (window.history.replaceState) {
						window.history.replaceState(null, null, window.location.href);
					}
					alert("Registro eliminado con éxito.Seras redirigiendo al inicio  ");
					window.location = "index.php?pagina=inicio";
				</script>';
				} else {
					echo '<script>
				alert("No se pudo eliminar la inscripción.Porque no existe");
			</script>';
				}
			} else {
				echo '<script>
				alert("No se pudo eliminar el registro.");
			</script>';
			}
		}
	}

	/**/

	static public function ctrActualizarAlumno($idnumerocontrol)
	{
		$idnumero_control = $idnumerocontrol;

		if (isset($_POST["submitActualizar"])) {
			$tabla = "usuario";
			$datos = array(
				"numero_control" => $idnumero_control,
				"nombre" => $_POST["nombre"],
				"carrera" => $_POST["carrera"],
				"semestre" => $_POST["semestre"],
				"grupo" => $_POST["grupo"],

			);


			$respuesta = ModeloFormularios::mdlActualizarRegistroAlumno($tabla, $datos);


			if ($respuesta == 'ok') {

				return "ok";
			} else {
				return "error";
			}
		}
	}

	static public function ctrActualizarMaestro($idnumerocontrol)
	{
		$idnumero_control = $idnumerocontrol;

		if (isset($_POST["submitActualizar"])) {
			$tabla = "usuario";
			$datos = array(
				"numero_control" => $idnumero_control,
				"nombre" => $_POST["nombre"],
				"carrera" => $_POST["carrera"],


			);


			$respuesta = ModeloFormularios::mdlActualizarRegistroAlumno($tabla, $datos);


			if ($respuesta == 'ok') {

				return "ok";
			} else {
				return "error";
			}
		}
	}

	/*=============================================
	Seleccionar Registros maestros admin
	=============================================*/

	static public function ctrSeleccionarUnSoloMaestro($item, $valor)
	{

		$item =  $item;

		$respuesta = ModeloFormularios::mdlMostrarUnSoloMaestro($item, $valor);

		return $respuesta;
	}

	////selecionar un solo curso

	static public function ctrSeleccionarUnSoloCurso($item, $valor)
	{

		$item =  $item;

		$respuesta = ModeloFormularios::mdlMostrarUnSoloCurso($item, $valor);

		return $respuesta;
	}

	////selecionar una sola inscripcion

	static public function ctrSeleccionarUnaSolaInscripcion($valor)
	{
		$respuesta = ModeloFormularios::mdlMostrarUnaSolaInscripcion($valor);
		return $respuesta;
	}



	////conotrlador buscar usuarios para el administrador
	static public function ctrSeleccionarUsuarioBuscar($id_usuario)
	{


		$idusuario = $id_usuario;

		$respuesta = ModeloFormularios::mdlBuscaEidtarUsuarios($idusuario);

		return $respuesta;
	}

	/////editar

	static public function EditarUsuarioMaestro($idnumerocontrol)
	{
		$tabla = "usuario";
		$idnumero_control = $idnumerocontrol;

		if (isset($_POST["submitActualizar"])) {
			$datos = array(
				"numero_control" => $idnumero_control,
				"nombre" => $_POST["nombre"],
				"carrera" => $_POST["carrera"],
				"correo" => $_POST["correo"],
				"password" => $_POST["password"]
			);

			$respuesta = ModeloFormularios::mdlActualizarMaestroAdmin($tabla, $datos);

			if ($respuesta == "ok") {
				return "Registro Exitoso";
			} else {
				return $respuesta;
			}
		}
	}

	////areamaestros todo
	static public function ctrEditarInscripcionAlumno($idnumerocontrol)
	{

		$idnumero_control = $idnumerocontrol;

		if (isset($_POST["submitmodalActualizar"])) {
			$datos = array(
				"numero_control" => $idnumero_control,
				"sexo" => $_POST["sexo"],
				"talla" => $_POST["talla"],

			);


			$respuesta = ModeloFormularios::mdlActualizarInscripciones($datos);


			return $respuesta;
		}
	}
	///////////////

	static public function ctrSeleccionarAdminTalleresMaestro()
	{

		$item = "maestro";

		$respuesta = ModeloFormularios::mdlMostrarListarTodosMaestros($item);

		return $respuesta;
	}

	static public function ctrSeleccionarAdminTalleresAlumnos()
	{

		$item = "alumno";

		$respuesta = ModeloFormularios::mdlMostrarListarTodosMaestros($item);

		return $respuesta;
	}


	static public function ctrRegistroMaestro()
	{



		if (isset($_POST["numero_control"])) {

			$tabla = "usuario";

			$datos = array(
				"numero_control" => $_POST["numero_control"],
				"nombre" => $_POST["nombre"],
				"carrera" => $_POST["carrera"],
				"correo" => $_POST["correo"],
				"semestre" => "universal",
				"grupo" => "universal",
				"password" => $_POST["password"]
			);

			# Validar campos del formulario con expresiones regulares


			$patron_nombre = "/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/";
			$patron_carrera = "/^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9\s]+$/";



			$errores = array();



			if (!preg_match($patron_nombre, $_POST["nombre"])) {
				$errores[] = "El nombre no es válido.";
			}

			if (!preg_match($patron_carrera, $_POST["carrera"])) {
				$errores[] = "La carrera no es válida.";
			}





			# Verificar si el correo ya existe en la base de datos
			$existe_correo = ModeloFormularios::mdlExisteCorreo($tabla, $_POST["correo"]);
			#var_dump($existe_correo);
			if ($existe_correo == true) {
				$errores[] = "El correo ya está en uso.Dirigite con el administrador del sitio.";
			}
			# Verificar si el numero de control ya existe en la base de datos
			$existe_numero_de_control = ModeloFormularios::mdlExisteNúmeroControl($tabla, $_POST["numero_control"]);
			#var_dump($existe_numero);
			if ($existe_numero_de_control == true) {
				$errores[] = "El número de control esta en uso.Dirigite con el administrador del sitio.";
			}

			if (count($errores) > 0) {
				$mensaje_error = "Por favor corrige los siguientes errores:<br><ul>";
				foreach ($errores as $error) {
					$mensaje_error .= "<li>$error</li>";
				}
				$mensaje_error .= "</ul>";
				return $mensaje_error;
			}

			# Si todos los datos son válidos, registrar usuario en la base de datos

			$respuesta = ModeloFormularios::mdlRegistroMaestro($tabla, $datos);
			#var_dump($existe_correo);
			if ($respuesta == "ok") {
				return "Registro Exitoso";
			} else {
				return $respuesta;
			}
		}
	}

	///
	////inscripciones

	static public function ctrSeleccionarInscripciones()
	{
		$respuesta = ModeloFormularios::mdlMostrarListaInscriptos();
		return $respuesta;
	}

	////inscripciones

	static public function ctrActualizarCursoCupo($valor)
	{

		if (isset($_POST["submitEliminar"])) {

			$respuesta1 = ModeloFormularios::mdlObtenerCupoCurso($valor);
			if ($respuesta1 < 30) {

				ModeloFormularios::mdlActualizarCupo($valor);
			} else {
			}


			#




		}
	}
}
