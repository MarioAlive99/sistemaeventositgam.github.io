<?php
 
class ControladorFormulariosPagos
{

//listar pagos
static public function ctrSeleccionarPaosGeneral(){
    $respuesta = ModeloFormulariosPagos::mdlMostrarListaPagos();
    return $respuesta;
}

static public function ctrSeleccionarPagosMujeres(){



    $respuesta = ModeloFormulariosPagos::mdlMostrarListaPagosMujeres();

    return $respuesta;

}
static public function ctrSeleccionarPagosHombres(){
    $respuesta = ModeloFormulariosPagos::mdlMostrarListaPagosHombres();
    return $respuesta;

}


static public function ctrSeleccionarCarrusel(){



    $respuesta = ModeloFormulariosPagos::mdlMostrarCarrusel();
    return $respuesta;


}

static public function ctrSeleccionarTotalTallaHombres(){



    $respuesta = ModeloFormulariosPagos::contarTallasHombres();
    return $respuesta;


}

static public function ctrSeleccionarTotalTallaMujeres(){



    $respuesta = ModeloFormulariosPagos::contarTallasMujeres();
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

static public function ctrInsertarPagos($registros)
{
  $resultado= ModeloFormulariosPagos::mdlInsertarPagos($registros);

    return "ok";
}

static public function ctrVaciarTabla(){

    $resultado = ModeloFormulariosPagos::mdlVaciarPagos();

    if ($resultado === true) {
        return "Ok"; // Éxito al vaciar la tabla
    } else {
        return $resultado; // Retorna el mensaje de error del modelo
    }
}



static public function ctrActualizarCarruselA() {
    if (isset($_POST['submitA'])) {
        $columna = "A"; // Columna a actualizar
        
        // Validar archivo
        if (isset($_FILES['A']) && $_FILES['A']['error'] === UPLOAD_ERR_OK && $_FILES['A']['size'] > 0) {
            $file = $_FILES['A'];
            $fileName = $file['name'];
            $fileTmp = $file['tmp_name'];
            $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            $fileSize = $file['size'];

            // Validar extensión (JPG o PNG)
            if ($fileExt === 'jpg' || $fileExt === 'png') {
                $ruta = "vistas/img/carrusel/" . $columna . "." . $fileExt;

                // Verificar si existe un archivo con el mismo nombre y eliminarlo
                if (file_exists($ruta)) {
                    unlink($ruta);
                }

                // Validar tamaño de archivo (máximo 2MB)
                $maxFileSize = 2 * 1024 * 1024; // 2MB en bytes
                if ($fileSize > $maxFileSize) {
                    return "El tamaño del archivo excede el límite permitido (2MB).";
                }
                
                // Validar altura mínima de imagen (900 píxeles)
                $imageInfo = getimagesize($fileTmp);
                $imageHeight = $imageInfo[1];
                if ($imageHeight < 900) {
                    return "La altura de la imagen debe ser de al menos 9000 píxeles.";
                }

                // Mover archivo a la ruta especificada
                if (move_uploaded_file($fileTmp, $ruta)) {
                    // Actualizar columna en la tabla
                    $resultado = ModeloFormulariosPagos::mdlActualizarCarrusel($columna, $ruta);

                    if ($resultado === "ok") {
                        return "ok"; // Éxito al actualizar el carrusel
                    } else {
                        return $resultado; // Retorna el mensaje de error del modelo
                    }
                } else {
                    return "Error al mover el archivo.";
                }
            } else {
                return "Por favor, selecciona un archivo de imagen JPG o PNG.";
            }
        } else {
            return "No se ha seleccionado ningún archivo o el tamaño del archivo es muy grande.";
        }
    }
}

static public function ctrActualizarCarruselB() {
    if (isset($_POST['submitB'])) {
        $columna = "B"; // Columna a actualizar
        
        // Validar archivo
        if (isset($_FILES['B']) && $_FILES['B']['error'] === UPLOAD_ERR_OK && $_FILES['B']['size'] > 0) {
            $file = $_FILES['B'];
            $fileName = $file['name'];
            $fileTmp = $file['tmp_name'];
            $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            $fileSize = $file['size'];

            // Validar extensión (JPG o PNG)
            if ($fileExt === 'jpg' || $fileExt === 'png') {
                $ruta = "vistas/img/carrusel/" . $columna . "." . $fileExt;

                // Verificar si existe un archivo con el mismo nombre y eliminarlo
                if (file_exists($ruta)) {
                    unlink($ruta);
                }

                // Validar tamaño de archivo (máximo 2MB)
                $maxFileSize = 2 * 1024 * 1024; // 2MB en bytes
                if ($fileSize > $maxFileSize) {
                    return "El tamaño del archivo excede el límite permitido (2MB).";
                }
                 // Validar altura mínima de imagen (900 píxeles)
                 $imageInfo = getimagesize($fileTmp);
                 $imageHeight = $imageInfo[1];
                 if ($imageHeight < 900) {
                     return "La altura de la imagen debe ser de al menos 900 píxeles.";
                 }

                // Mover archivo a la ruta especificada
                if (move_uploaded_file($fileTmp, $ruta)) {
                    // Actualizar columna en la tabla
                    $resultado = ModeloFormulariosPagos::mdlActualizarCarrusel($columna, $ruta);

                    if ($resultado === "ok") {
                        return "ok"; // Éxito al actualizar el carrusel
                    } else {
                        return $resultado; // Retorna el mensaje de error del modelo
                    }
                } else {
                    return "Error al mover el archivo.";
                }
            } else {
                return "Por favor, selecciona un archivo de imagen JPG o PNG.";
            }
        } else {
            return "No se ha seleccionado ningún archivo o el tamaño del archivo es muy grande.";
        }
    }
}

static public function ctrActualizarCarruselC() {
    if (isset($_POST['submitC'])) {
        $columna = "C"; // Columna a actualizar
        
        // Validar archivo
        if (isset($_FILES['C']) && $_FILES['C']['error'] === UPLOAD_ERR_OK && $_FILES['C']['size'] > 0) {
            $file = $_FILES['C'];
            $fileName = $file['name'];
            $fileTmp = $file['tmp_name'];
            $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            $fileSize = $file['size'];

            // Validar extensión (JPG o PNG)
            if ($fileExt === 'jpg' || $fileExt === 'png') {
                $ruta = "vistas/img/carrusel/" . $columna . "." . $fileExt;

                // Verificar si existe un archivo con el mismo nombre y eliminarlo
                if (file_exists($ruta)) {
                    unlink($ruta);
                }

                // Validar tamaño de archivo (máximo 2MB)
                $maxFileSize = 2 * 1024 * 1024; // 2MB en bytes
                if ($fileSize > $maxFileSize) {
                    return "El tamaño del archivo excede el límite permitido (2MB).";
                }
                
                // Validar altura mínima de imagen (900 píxeles)
                $imageInfo = getimagesize($fileTmp);
                $imageHeight = $imageInfo[1];
                if ($imageHeight < 900) {
                    return "La altura de la imagen debe ser de al menos 900 píxeles.";
                }

                // Mover archivo a la ruta especificada
                if (move_uploaded_file($fileTmp, $ruta)) {
                    // Actualizar columna en la tabla
                    $resultado = ModeloFormulariosPagos::mdlActualizarCarrusel($columna, $ruta);

                    if ($resultado === "ok") {
                        return "ok"; // Éxito al actualizar el carrusel
                    } else {
                        return $resultado; // Retorna el mensaje de error del modelo
                    }
                } else {
                    return "Error al mover el archivo.";
                }
            } else {
                return "Por favor, selecciona un archivo de imagen JPG o PNG.";
            }
        } else {
            return "No se ha seleccionado ningún archivo o el tamaño del archivo es muy grande.";
        }
    }
}

static public function ctrActualizarCarruselD() {
    if (isset($_POST['submitD'])) {
        $columna = "D"; // Columna a actualizar
        
        // Validar archivo
        if (isset($_FILES['D']) && $_FILES['D']['error'] === UPLOAD_ERR_OK && $_FILES['D']['size'] > 0) {
            $file = $_FILES['D'];
            $fileName = $file['name'];
            $fileTmp = $file['tmp_name'];
            $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            $fileSize = $file['size'];

            // Validar extensión (JPG o PNG)
            if ($fileExt === 'jpg' || $fileExt === 'png') {
                $ruta = "vistas/img/carrusel/" . $columna . "." . $fileExt;

                // Verificar si existe un archivo con el mismo nombre y eliminarlo
                if (file_exists($ruta)) {
                    unlink($ruta);
                }

                // Validar tamaño de archivo (máximo 2MB)
                $maxFileSize = 2 * 1024 * 1024; // 2MB en bytes
                if ($fileSize > $maxFileSize) {
                    return "El tamaño del archivo excede el límite permitido (2MB).";
                }
                
                // Validar altura mínima de imagen (900 píxeles)
                $imageInfo = getimagesize($fileTmp);
                $imageHeight = $imageInfo[1];
                if ($imageHeight < 900) {
                    return "La altura de la imagen debe ser de al menos 900 píxeles.";
                }

                // Mover archivo a la ruta especificada
                if (move_uploaded_file($fileTmp, $ruta)) {
                    // Actualizar columna en la tabla
                    $resultado = ModeloFormulariosPagos::mdlActualizarCarrusel($columna, $ruta);

                    if ($resultado === "ok") {
                        return "ok"; // Éxito al actualizar el carrusel
                    } else {
                        return $resultado; // Retorna el mensaje de error del modelo
                    }
                } else {
                    return "Error al mover el archivo.";
                }
            } else {
                return "Por favor, selecciona un archivo de imagen JPG o PNG.";
            }
        } else {
            return "No se ha seleccionado ningún archivo o el tamaño del archivo es muy grande.";
        }
    }
}

static public function ctrActualizarCarruselE() {
    if (isset($_POST['submitE'])) {
        $columna = "E"; // Columna a actualizar
        
        // Validar archivo
        if (isset($_FILES['E']) && $_FILES['E']['error'] === UPLOAD_ERR_OK && $_FILES['E']['size'] > 0) {
            $file = $_FILES['E'];
            $fileName = $file['name'];
            $fileTmp = $file['tmp_name'];
            $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            $fileSize = $file['size'];

            // Validar extensión (JPG o PNG)
            if ($fileExt === 'jpg' || $fileExt === 'png') {
                $ruta = "vistas/img/carrusel/" . $columna . "." . $fileExt;

                // Verificar si existe un archivo con el mismo nombre y eliminarlo
                if (file_exists($ruta)) {
                    unlink($ruta);
                }

                // Validar tamaño de archivo (máximo 2MB)
                $maxFileSize = 2 * 1024 * 1024; // 2MB en bytes
                if ($fileSize > $maxFileSize) {
                    return "El tamaño del archivo excede el límite permitido (2MB).";
                }
                
               // Validar altura mínima de imagen (900 píxeles)
               $imageInfo = getimagesize($fileTmp);
               $imageHeight = $imageInfo[1];
               if ($imageHeight < 900) {
                   return "La altura de la imagen debe ser de al menos 900 píxeles.";
               }

                // Mover archivo a la ruta especificada
                if (move_uploaded_file($fileTmp, $ruta)) {
                    // Actualizar columna en la tabla
                    $resultado = ModeloFormulariosPagos::mdlActualizarCarrusel($columna, $ruta);

                    if ($resultado === "ok") {
                        return "ok"; // Éxito al actualizar el carrusel
                    } else {
                        return $resultado; // Retorna el mensaje de error del modelo
                    }
                } else {
                    return "Error al mover el archivo.";
                }
            } else {
                return "Por favor, selecciona un archivo de imagen JPG o PNG.";
            }
        } else {
            return "No se ha seleccionado ningún archivo o el tamaño del archivo es muy grande.";
        }
    }
}

static public function ctrActualizarCarruselF() {
    if (isset($_POST['submitF'])) {
        $columna = "F"; // Columna a actualizar
        
        // Validar archivo
        if (isset($_FILES['F']) && $_FILES['F']['error'] === UPLOAD_ERR_OK && $_FILES['F']['size'] > 0) {
            $file = $_FILES['F'];
            $fileName = $file['name'];
            $fileTmp = $file['tmp_name'];
            $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            $fileSize = $file['size'];

            // Validar extensión (JPG o PNG)
            if ($fileExt === 'jpg' || $fileExt === 'png') {
                $ruta = "vistas/img/carrusel/" . $columna . "." . $fileExt;

                // Verificar si existe un archivo con el mismo nombre y eliminarlo
                if (file_exists($ruta)) {
                    unlink($ruta);
                }

                // Validar tamaño de archivo (máximo 2MB)
                $maxFileSize = 2 * 1024 * 1024; // 2MB en bytes
                if ($fileSize > $maxFileSize) {
                    return "El tamaño del archivo excede el límite permitido (2MB).";
                }
                
                // Validar altura mínima de imagen (900 píxeles)
                $imageInfo = getimagesize($fileTmp);
                $imageHeight = $imageInfo[1];
                if ($imageHeight < 900) {
                    return "La altura de la imagen debe ser de al menos 900 píxeles.";
                }

                // Mover archivo a la ruta especificada
                if (move_uploaded_file($fileTmp, $ruta)) {
                    // Actualizar columna en la tabla
                    $resultado = ModeloFormulariosPagos::mdlActualizarCarrusel($columna, $ruta);

                    if ($resultado === "ok") {
                        return "ok"; // Éxito al actualizar el carrusel
                    } else {
                        return $resultado; // Retorna el mensaje de error del modelo
                    }
                } else {
                    return "Error al mover el archivo.";
                }
            } else {
                return "Por favor, selecciona un archivo de imagen JPG o PNG.";
            }
        } else {
            return "No se ha seleccionado ningún archivo o el tamaño del archivo es muy grande.";
        }
    }
}

static public function ctrActualizarCarruselG() {
    if (isset($_POST['submitG'])) {
        $columna = "G"; // Columna a actualizar
        
        // Validar archivo
        if (isset($_FILES['G']) && $_FILES['G']['error'] === UPLOAD_ERR_OK && $_FILES['G']['size'] > 0) {
            $file = $_FILES['G'];
            $fileName = $file['name'];
            $fileTmp = $file['tmp_name'];
            $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            $fileSize = $file['size'];

            // Validar extensión (JPG o PNG)
            if ($fileExt === 'jpg' || $fileExt === 'png') {
                $ruta = "vistas/img/carrusel/" . $columna . "." . $fileExt;

                // Verificar si existe un archivo con el mismo nombre y eliminarlo
                if (file_exists($ruta)) {
                    unlink($ruta);
                }

                // Validar tamaño de archivo (máximo 2MB)
                $maxFileSize = 2 * 1024 * 1024; // 2MB en bytes
                if ($fileSize > $maxFileSize) {
                    return "El tamaño del archivo excede el límite permitido (2MB).";
                }
                
                // Validar altura mínima de imagen (900 píxeles)
                $imageInfo = getimagesize($fileTmp);
                $imageHeight = $imageInfo[1];
                if ($imageHeight < 900) {
                    return "La altura de la imagen debe ser de al menos 900 píxeles.";
                }

                // Mover archivo a la ruta especificada
                if (move_uploaded_file($fileTmp, $ruta)) {
                    // Actualizar columna en la tabla
                    $resultado = ModeloFormulariosPagos::mdlActualizarCarrusel($columna, $ruta);

                    if ($resultado === "ok") {
                        return "ok"; // Éxito al actualizar el carrusel
                    } else {
                        return $resultado; // Retorna el mensaje de error del modelo
                    }
                } else {
                    return "Error al mover el archivo.";
                }
            } else {
                return "Por favor, selecciona un archivo de imagen JPG o PNG.";
            }
        } else {
            return "No se ha seleccionado ningún archivo o el tamaño del archivo es muy grande.";
        }
    }
}

static public function ctrActualizarCarruselH() {
    if (isset($_POST['submitH'])) {
        $columna = "H"; // Columna a actualizar
        
        // Validar archivo
        if (isset($_FILES['H']) && $_FILES['H']['error'] === UPLOAD_ERR_OK && $_FILES['H']['size'] > 0) {
            $file = $_FILES['H'];
            $fileName = $file['name'];
            $fileTmp = $file['tmp_name'];
            $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            $fileSize = $file['size'];

            // Validar extensión (JPG o PNG)
            if ($fileExt === 'jpg' || $fileExt === 'png') {
                $ruta = "vistas/img/carrusel/" . $columna . "." . $fileExt;

                // Verificar si existe un archivo con el mismo nombre y eliminarlo
                if (file_exists($ruta)) {
                    unlink($ruta);
                }

                // Validar tamaño de archivo (máximo 2MB)
                $maxFileSize = 2 * 1024 * 1024; // 2MB en bytes
                if ($fileSize > $maxFileSize) {
                    return "El tamaño del archivo excede el límite permitido (2MB).";
                }
                
               // Validar altura mínima de imagen (900 píxeles)
               $imageInfo = getimagesize($fileTmp);
               $imageHeight = $imageInfo[1];
               if ($imageHeight < 900) {
                   return "La altura de la imagen debe ser de al menos 900 píxeles.";
               }

                // Mover archivo a la ruta especificada
                if (move_uploaded_file($fileTmp, $ruta)) {
                    // Actualizar columna en la tabla
                    $resultado = ModeloFormulariosPagos::mdlActualizarCarrusel($columna, $ruta);

                    if ($resultado === "ok") {
                        return "ok"; // Éxito al actualizar el carrusel
                    } else {
                        return $resultado; // Retorna el mensaje de error del modelo
                    }
                } else {
                    return "Error al mover el archivo.";
                }
            } else {
                return "Por favor, selecciona un archivo de imagen JPG o PNG.";
            }
        } else {
            return "No se ha seleccionado ningún archivo o el tamaño del archivo es muy grande.";
        }
    }
}

static public function ctrActualizarCarruselI() {
    if (isset($_POST['submitI'])) {
        $columna = "I"; // Columna a actualizar
        
        // Validar archivo
        if (isset($_FILES['I']) && $_FILES['I']['error'] === UPLOAD_ERR_OK && $_FILES['I']['size'] > 0) {
            $file = $_FILES['I'];
            $fileName = $file['name'];
            $fileTmp = $file['tmp_name'];
            $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            $fileSize = $file['size'];

            // Validar extensión (JPG o PNG)
            if ($fileExt === 'jpg' || $fileExt === 'png') {
                $ruta = "vistas/img/carrusel/" . $columna . "." . $fileExt;

                // Verificar si existe un archivo con el mismo nombre y eliminarlo
                if (file_exists($ruta)) {
                    unlink($ruta);
                }

                // Validar tamaño de archivo (máximo 2MB)
                $maxFileSize = 2 * 1024 * 1024; // 2MB en bytes
                if ($fileSize > $maxFileSize) {
                    return "El tamaño del archivo excede el límite permitido (2MB).";
                }
                
                // Validar altura mínima de imagen (900 píxeles)
                $imageInfo = getimagesize($fileTmp);
                $imageHeight = $imageInfo[1];
                if ($imageHeight < 900) {
                    return "La altura de la imagen debe ser de al menos 900 píxeles.";
                }

                // Mover archivo a la ruta especificada
                if (move_uploaded_file($fileTmp, $ruta)) {
                    // Actualizar columna en la tabla
                    $resultado = ModeloFormulariosPagos::mdlActualizarCarrusel($columna, $ruta);

                    if ($resultado === "ok") {
                        return "ok"; // Éxito al actualizar el carrusel
                    } else {
                        return $resultado; // Retorna el mensaje de error del modelo
                    }
                } else {
                    return "Error al mover el archivo.";
                }
            } else {
                return "Por favor, selecciona un archivo de imagen JPG o PNG.";
            }
        } else {
            return "No se ha seleccionado ningún archivo o el tamaño del archivo es muy grande.";
        }
    }
}


}




?>