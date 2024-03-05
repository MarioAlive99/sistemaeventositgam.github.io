<?php

class ControladorFormulariosAlumnos{

    static public function ctrRegistroInscripcion()
    {
        if (isset($_POST["submitmodal1"])) {
            $tabla = "inscripciones";

            $datos = array(
                "id_curso" => $_POST["id_curso"],
                "nombre_alumno" => $_POST["nombre"],
                "numero_control" => $_POST["numero_control"],
                "talla" => $_POST["talla"],
                "sexo" => $_POST["sexo"],
                "fecha" => $_POST["fecha"],
                "horario" => $_POST["horario"],
               
                // Agrega los demás campos del formulario aquí
            );

            // Realiza las operaciones necesarias con los datos recibidos


            // Validar campos del formulario según sea necesario

            // Procesar archivo PDF si se seleccionó uno
      
            $idcurso = $_POST["id_curso"];
            $cupoDisponible = ModeloFormulariosAlumnos::mdlMostrarCupo($idcurso);

            $idalumno_horario = $_POST["numero_control"];
           
            $total_inscripciones = ModeloFormulariosAlumnos::mdlContarFechaHorario($idalumno_horario);


            $datos28 = ModeloFormulariosAlumnos::mdlMostrarHoraFecha($idalumno_horario);
            $fecha_comparar = $_POST["fecha"]; // Fecha que deseas comparar
            $horario_comparar = $_POST["horario"]; // Horario que deseas comparar
            $coincidencia = false;

            foreach ($datos28 as $dato28) {
                $fecha = $dato28['fecha'];
                $horario = $dato28['horario'];

                if ($fecha == $fecha_comparar && $horario == $horario_comparar) {
                    // Se encontró una coincidencia
                    $coincidencia = true;

                    break; // Salir del bucle
                }
            }

            $inscrito = ModeloFormulariosAlumnos::mdlMostrarInscritoYa($idalumno_horario,$idcurso);
     


            if ($inscrito[0] < 1 ) {
            if ($total_inscripciones[0] < 1 ) {
                if ($coincidencia != true) {
                    if ($cupoDisponible["cupo"] > 0) {
 
                        $actualizaCupo = ModeloFormulariosAlumnos::mdlActualizarCupo($idcurso);

                        if ($actualizaCupo == 'ok') {
                            $respuesta = ModeloFormulariosAlumnos::mdlInsertarInscripcion($tabla, $datos);
                            return $respuesta;
                        } else {
                            return "No se logró el registro";
                        }
                    } else {
                        return "No hay cupo disponible.";
                    }
                } else {
                    return "fecha ocupada";
                }
            } else {
                return "Has superado el límite de inscripciones.No te puedes inscribir a 2 talleres";
            }
        }else{
            return "Ya estas inscrito.";
        }



        }
    }








    static private function subirPDF($archivo, $numero_control)
    {
        $carpetaDestino = "vistas/PDFcomprobantes/"; // Ruta donde deseas guardar los archivos PDF
        $nombreArchivo = $numero_control . "_" . $archivo["name"];
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

    static public function ctrSeleccionarTalleresAlumno($idalumno){

		 
        $id_alumno =$idalumno;

		$respuesta = ModeloFormulariosAlumnos::mdlMostrarListaTalleres($id_alumno);
  
		return $respuesta;

	}


    

}
