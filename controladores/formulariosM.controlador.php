<?php

class ControladorFormulariosMaestros {

    static public function ctrRegistroCurso()
    {

        if (isset($_POST["titulo"])) {

            $tabla = "curso";

            $datos = array(
                "titulo" => $_POST["titulo"],
                "numero_control_profesor" => $_POST["numero_control_profesor"],
                "nombre_profesor" => $_POST["nombre_profesor"],
                "pdf_descripcion" => "",
                "souvenir" => $_POST["souvenir"],
                "precio" => $_POST["precio"],
                "tipo" => $_POST["tipo"],
                "horario" => $_POST["hora_inicio"] . " - " . $_POST["hora_fin"],
                "fecha"=> $_POST["fecha"],
                "fechafinal"=> $_POST["fechafinal"],
                "aula" => $_POST["aula"],
                "url_imagen" => ""
            );




            // Validar campos del formulario según sea necesario

            // Procesar archivo de imagen si se seleccionó uno
            if (isset($_FILES["imagen"]) && isset($_FILES["imagen"]["tmp_name"]) && $_FILES["imagen"]["tmp_name"] != "") {
                if (self::validarImagen($_FILES["imagen"])) {
                    $imagen = self::subirImagen($_FILES["imagen"], $_POST["numero_control_profesor"]);
                    if ($imagen != "error") {
                        $datos["url_imagen"] = $imagen;
                    } else {
                        return "Error al subir la imagen.";
                    }
                } else {
                    return "Formato de imagen no válido. Solo se permiten archivos PNG y JPG.";
                }
            }

            if (isset($_FILES["pdf_descripcion"]) && isset($_FILES["pdf_descripcion"]["tmp_name"]) && $_FILES["pdf_descripcion"]["tmp_name"] != "") {
                if (self::validarPDF($_FILES["pdf_descripcion"])) {
                    $pdfDescripcion = self::subirPDF($_FILES["pdf_descripcion"], $_POST["numero_control_profesor"]);
                    if ($pdfDescripcion != "error") {
                        $datos["pdf_descripcion"] = $pdfDescripcion;
                    } else {
                        return "Error al subir el archivo de descripción.";
                    }
                } else {
                    return "Formato de archivo no válido. Solo se permiten archivos PDF.";
                }
            }

            // Guardar los datos en la base de datos
            $respuesta = ModeloFormulariosMaestros::mdlInsertarCurso($tabla, $datos);
            if ($respuesta == "ok") {
                return "Curso registrado correctamente.";
            } else {
                return "Error al registrar el curso: " . $respuesta;
            }
        }
    }

    static private function subirImagen($archivo, $numero_control_profesor)
    {


        $carpetaDestino = "vistas/img/curso/"; // Ruta donde deseas guardar las imágenes
        $nombreArchivo = $numero_control_profesor . "_" . $archivo["name"];
        $rutaCompleta = $carpetaDestino . $nombreArchivo;

        if (move_uploaded_file($archivo["tmp_name"], $rutaCompleta)) {
            return $rutaCompleta; // Retornas la URL de la imagen subida
        } else {
            return "error"; // Retornas "error" en caso de fallo
        }
    }

    static private function validarImagen($archivo)
    {
        $extension = strtolower(pathinfo($archivo["name"], PATHINFO_EXTENSION));
        $extensionesPermitidas = array("png", "jpg", "jpeg");

        if (!in_array($extension, $extensionesPermitidas)) {
            return false; // La extensión no está permitida
        }

        return true; // La extensión es válida
    }

    static private function subirPDF($archivo, $numero_control_profesor)
    {
        $carpetaDestino = "vistas/PDFdescripcion/"; // Ruta donde deseas guardar los archivos PDF
        $nombreArchivo = $numero_control_profesor . "_" . $archivo["name"];
        $rutaCompleta = $carpetaDestino . $nombreArchivo;

        if (move_uploaded_file($archivo["tmp_name"], $rutaCompleta)) {
            return $rutaCompleta; // Retornas la ruta completa del PDF subido
        } else {
            return "error"; // Retornas "error" en caso de fallo
        }
    }

    static private function validarPDF($archivo)
    {
        $extension = strtolower(pathinfo($archivo["name"], PATHINFO_EXTENSION));
        $extensionesPermitidas = array("pdf");

        if (!in_array($extension, $extensionesPermitidas)) {
            return false; // La extensión no está permitida
        }

        return true; // La extensión es válida
    }


    static public function ctrSeleccionarTalleres(){
		$tabla = "curso";
		$respuesta = ModeloFormulariosMaestros::mdlMostrarListaTalleres($tabla); 
		return $respuesta;
	}




    static public function ctrSeleccionarTalleresMaestro($idmaestro){

		 
        $id_maestro =$idmaestro;

		$respuesta = ModeloFormulariosMaestros::mdlMostrarMaestro($id_maestro);
   
		return $respuesta;

	}

    static public function ctrSeleccionarCursoBuscar($id_curso){

		 
        $idcurso =$id_curso;

		$respuesta = ModeloFormulariosMaestros::mdlMostrarCurso($idcurso);
    
		return $respuesta;

	}


    static public function ctrEditarCurso($id_curso)
    {

        if (isset($_POST["titulo"])) {

            $idcurso1 = $id_curso;

            $datos = array(
                "id_curso" =>  $idcurso1,
                "titulo" => $_POST["titulo"],
                "numero_control_profesor" => $_POST["numero_control_profesor"],
                "nombre_profesor" => $_POST["nombre_profesor"],
                "pdf_descripcion" => "",
                "souvenir" => $_POST["souvenir"],
                "precio" => $_POST["precio"],
                "tipo" => $_POST["tipo"],
                "horario" => $_POST["hora_inicio"] . " - " . $_POST["hora_fin"],
                "fecha"=> $_POST["fecha"],
                "fechafinal"=> $_POST["fechafinal"],
                "aula" => $_POST["aula"],
                
            );




            // Validar campos del formulario según sea necesario

            // Procesar archivo de imagen si se seleccionó uno
            if (isset($_FILES["imagen"]) && isset($_FILES["imagen"]["tmp_name"]) && $_FILES["imagen"]["tmp_name"] != "") {
                if (self::validarImagen($_FILES["imagen"])) {
                    $imagen = self::subirImagen($_FILES["imagen"], $_POST["numero_control_profesor"]);
                    if ($imagen != "error") {
                        $datos["url_imagen"] = $imagen;
                    } else {
                        return "Error al subir la imagen.";
                    }
                } else {
                    return "Formato de imagen no válido. Solo se permiten archivos PNG y JPG.";
                }
            }

            if (isset($_FILES["pdf_descripcion"]) && isset($_FILES["pdf_descripcion"]["tmp_name"]) && $_FILES["pdf_descripcion"]["tmp_name"] != "") {
                if (self::validarPDF($_FILES["pdf_descripcion"])) {
                    $pdfDescripcion = self::subirPDF($_FILES["pdf_descripcion"], $_POST["numero_control_profesor"]);
                    if ($pdfDescripcion != "error") {
                        $datos["pdf_descripcion"] = $pdfDescripcion;
                    } else {
                        return "Error al subir el archivo de descripción.";
                    }
                } else {
                    return "Formato de archivo no válido. Solo se permiten archivos PDF.";
                }
            }

            // Guardar los datos en la base de datos
            $respuesta = ModeloFormulariosMaestros::mdlActualizarCurso($datos);
            if ($respuesta == "ok") {
                return "Curso registrado correctamente.";
            } else {
                return "Error al registrar el curso: " . $respuesta;
            }
        }
    }

    static public function ctrSeleccionarTalleresInscrito($icurso){

		 
        $id_alumno =$icurso;

		$respuesta = ModeloFormulariosMaestros::mdlMostrarTallerInscritos($id_alumno);
  
		return $respuesta; 

    

	}

    static public function ctrLeerArchivoCSV($archivo)
{
    $registros = array();

    if (($gestor = fopen($archivo, "r")) !== false) {
        $cabecera = fgetcsv($gestor, 1000, ",");
        while (($datos = fgetcsv($gestor, 1000, ",")) !== false) {
            $registro = array_combine($cabecera, $datos);
            $registros[] = array_values($registro);
        }
        fclose($gestor);
    }

    return $registros;
}

static public function ctrInsertarMaestrosCSV($registros)
{
  $resultado= ModeloFormulariosMaestros::mdlInsertarMaestrosMasivos($registros);
var_dump($resultado);
    return "ok";
}


}
