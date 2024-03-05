<?php
$carrusel = ControladorFormulariosPagos::ctrSeleccionarCarrusel();

$a = $carrusel["A"] . '?v=' . time(); // Agregar el parámetro de versión a la URL de la imagen
$b = $carrusel["B"] . '?v=' . time();
$c = $carrusel["C"] . '?v=' . time();
$d = $carrusel["D"] . '?v=' . time();
$e = $carrusel["E"] . '?v=' . time();
$f = $carrusel["F"] . '?v=' . time();
$g = $carrusel["G"] . '?v=' . time();
$h = $carrusel["H"] . '?v=' . time();
?>
<div style="margin-top: 10px;">
    <a href="index.php?pagina=AdminAreaCursos" class="btn btn-primary">Regresar</a>
</div>
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Selecciona imagen</th>
                <th scope="col">Imagen miniatura en el carrusel</th>
                <th scope="col">Subir</th>
            </tr>
        </thead>
        <tbody>
            <form method="POST" enctype="multipart/form-data">
                <tr>

                    <td>
                        <input type="file" name="A" id="file_a" onchange="validateFile(this)">
                    </td>
                    <td>
                        <div class="project-item mb-5">
                            <div class="position-relative">
                                <img class="img-fluid " src="<?php echo $a; ?>" alt="" width="150" height="280">
                                <div class="project-overlay">
                                    <a class="btn btn-lg-square btn-light rounded-circle m-1" href="<?php echo $a; ?>" data-lightbox="project"><i class="fa fa-eye"></i></a>

                                </div>
                            </div>

                        </div>
                    </td>
                    <td>
                        <button type="submit" id="submitA" name="submitA" class="btn btn-primary">Subir</button>
                    </td>
                </tr>
            </form>

            <!-- Repite las filas para los otros grupos -->
            <form method="POST" enctype="multipart/form-data">
                <tr>

                    <td>
                        <input type="file" name="B" id="file_b" onchange="validateFile(this)">
                    </td>
                    <td>
                        <div class="project-item mb-5">
                            <div class="position-relative">
                                <img class="img-fluid " src="<?php echo $b; ?>" alt="" width="150" height="280">
                                <div class="project-overlay">
                                    <a class="btn btn-lg-square btn-light rounded-circle m-1" href="<?php echo $b; ?>" data-lightbox="project"><i class="fa fa-eye"></i></a>

                                </div>
                            </div>

                        </div>
                    </td>
                    <td>
                        <button type="submit" id="submitA" name="submitB" class="btn btn-primary">Subir</button>
                    </td>
                </tr>
            </form>

            <!-- Repite las filas para los otros grupos -->
            <form method="POST" enctype="multipart/form-data">
                <tr>

                    <td>
                        <input type="file" name="C" id="file_c" onchange="validateFile(this)">
                    </td>
                    <td>
                        <div class="project-item mb-5">
                            <div class="position-relative">
                                <img class="img-fluid " src="<?php echo $c; ?>" alt="" width="150" height="280">
                                <div class="project-overlay">
                                    <a class="btn btn-lg-square btn-light rounded-circle m-1" href="<?php echo $c; ?>" data-lightbox="project"><i class="fa fa-eye"></i></a>

                                </div>
                            </div>

                        </div>
                    </td>
                    <td>
                        <button type="submit" id="submitC" name="submitC" class="btn btn-primary">Subir</button>
                    </td>
                </tr>
            </form>

            <!-- Repite las filas para los otros grupos -->
            <form method="POST" enctype="multipart/form-data">
                <tr>

                    <td>
                        <input type="file" name="D" id="file_d" onchange="validateFile(this)">
                    </td>
                    <td>
                        <div class="project-item mb-5">
                            <div class="position-relative">
                                <img class="img-fluid " src="<?php echo $d; ?>" alt="" width="150" height="280">
                                <div class="project-overlay">
                                    <a class="btn btn-lg-square btn-light rounded-circle m-1" href="<?php echo $d; ?>" data-lightbox="project"><i class="fa fa-eye"></i></a>

                                </div>
                            </div>

                        </div>
                    </td>
                    <td>
                        <button type="submit" id="submitD" name="submitD" class="btn btn-primary">Subir</button>
                    </td>
                </tr>
            </form>
            <!-- Repite las filas para los otros grupos -->
            <form method="POST" enctype="multipart/form-data">
                <tr>

                    <td>
                        <input type="file" name="E" id="file_e" onchange="validateFile(this)">
                    </td>
                    <td>
                        <div class="project-item mb-5">
                            <div class="position-relative">
                                <img class="img-fluid " src="<?php echo $e; ?>" alt="" width="150" height="280">
                                <div class="project-overlay">
                                    <a class="btn btn-lg-square btn-light rounded-circle m-1" href="<?php echo $e; ?>" data-lightbox="project"><i class="fa fa-eye"></i></a>

                                </div>
                            </div>

                        </div>
                    </td>
                    <td>
                        <button type="submit" id="submitE" name="submitE" class="btn btn-primary">Subir</button>
                    </td>
                </tr>
            </form>
            <form method="POST" enctype="multipart/form-data">
                <tr>

                    <td>
                        <input type="file" name="F" id="file_f" onchange="validateFile(this)">
                    </td>
                    <td>
                        <div class="project-item mb-5">
                            <div class="position-relative">
                                <img class="img-fluid " src="<?php echo $f; ?>" alt="" width="150" height="280">
                                <div class="project-overlay">
                                    <a class="btn btn-lg-square btn-light rounded-circle m-1" href="<?php echo $f; ?>" data-lightbox="project"><i class="fa fa-eye"></i></a>

                                </div>
                            </div>

                        </div>
                    </td>
                    <td>
                        <button type="submit" id="submitF" name="submitF" class="btn btn-primary">Subir</button>
                    </td>
                </tr>
            </form>

            <form method="POST" enctype="multipart/form-data">
                <tr>

                    <td>
                        <input type="file" name="G" id="file_g" onchange="validateFile(this)">
                    </td>
                    <td>
                        <div class="project-item mb-5">
                            <div class="position-relative">
                                <img class="img-fluid " src="<?php echo $g; ?>" alt="" width="150" height="280">
                                <div class="project-overlay">
                                    <a class="btn btn-lg-square btn-light rounded-circle m-1" href="<?php echo $g; ?>" data-lightbox="project"><i class="fa fa-eye"></i></a>

                                </div>
                            </div>

                        </div>
                    </td>
                    <td>
                        <button type="submit" id="submitG" name="submitG" class="btn btn-primary">Subir</button>
                    </td>
                </tr>
            </form>
            <form method="POST" enctype="multipart/form-data">
                <tr>

                    <td>
                        <input type="file" name="H" id="file_h" onchange="validateFile(this)">
                    </td>
                    <td>
                        <div class="project-item mb-5">
                            <div class="position-relative">
                                <img class="img-fluid " src="<?php echo $h; ?>" alt="" width="150" height="280">
                                <div class="project-overlay">
                                    <a class="btn btn-lg-square btn-light rounded-circle m-1" href="<?php echo $h; ?>" data-lightbox="project"><i class="fa fa-eye"></i></a>

                                </div>
                            </div>

                        </div>
                    </td>
                    <td>
                        <button type="submit" id="submitH" name="submitH" class="btn btn-primary">Subir</button>
                    </td>
                </tr>
            </form>


        </tbody>
    </table>


</div>

<style>
    th,
    td {
        text-align: center;
        vertical-align: middle;
    }
</style>
<script>
    function validateFile(input) {
        var fileName = input.value;
        var ext = fileName.substring(fileName.lastIndexOf('.') + 1).toLowerCase();
        if (ext !== 'jpg' && ext !== 'png') {
            alert('Por favor, selecciona un archivo de imagen JPG o PNG.');
            input.value = '';
        }
    }
</script>

<?php
// ...

if (isset($_POST['submitA'])) {
    $registro = ControladorFormulariosPagos::ctrActualizarCarruselA();

    if ($registro == "ok") {
        echo '<script>
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
            alert("¡Registro exitoso!");
            window.location.href = "index.php?pagina=AdminCarrusel";
        </script>';
    } else {
        echo '<script>
            alert("Error en el registro: ' . $registro . '");
        </script>';
    }
}

if (isset($_POST['submitB'])) {
    $registro = ControladorFormulariosPagos::ctrActualizarCarruselB();

    if ($registro == "ok") {
        echo '<script>
             if (window.history.replaceState) {
                 window.history.replaceState(null, null, window.location.href);
             }
             alert("¡Registro exitoso!");
             window.location.href = "index.php?pagina=AdminCarrusel";
         </script>';
    } else {
        echo '<script>
             alert("Error en el registro: ' . $registro . '");
         </script>';
    }
}

if (isset($_POST['submitC'])) {
    $registro = ControladorFormulariosPagos::ctrActualizarCarruselC();

    if ($registro == "ok") {
        echo '<script>
             if (window.history.replaceState) {
                 window.history.replaceState(null, null, window.location.href);
             }
             alert("¡Registro exitoso!");
             window.location.href = "index.php?pagina=AdminCarrusel";
         </script>';
    } else {
        echo '<script>
             alert("Error en el registro: ' . $registro . '");
         </script>';
    }
}

if (isset($_POST['submitD'])) {
    $registro = ControladorFormulariosPagos::ctrActualizarCarruselD();

    if ($registro == "ok") {
        echo '<script>
             if (window.history.replaceState) {
                 window.history.replaceState(null, null, window.location.href);
             }
             alert("¡Registro exitoso!");
             window.location.href = "index.php?pagina=AdminCarrusel";
         </script>';
    } else {
        echo '<script>
             alert("Error en el registro: ' . $registro . '");
         </script>';
    }
}




if (isset($_POST['submitE'])) {
    $registro = ControladorFormulariosPagos::ctrActualizarCarruselE();

    if ($registro == "ok") {
        echo '<script>
             if (window.history.replaceState) {
                 window.history.replaceState(null, null, window.location.href);
             }
             alert("¡Registro exitoso!");
             window.location.href = "index.php?pagina=AdminCarrusel";
         </script>';
    } else {
        echo '<script>
             alert("Error en el registro: ' . $registro . '");
         </script>';
    }
}


if (isset($_POST['submitF'])) {
    $registro = ControladorFormulariosPagos::ctrActualizarCarruselF();

    if ($registro == "ok") {
        echo '<script>
             if (window.history.replaceState) {
                 window.history.replaceState(null, null, window.location.href);
             }
             alert("¡Registro exitoso!");
             window.location.href = "index.php?pagina=AdminCarrusel";
         </script>';
    } else {
        echo '<script>
             alert("Error en el registro: ' . $registro . '");
         </script>';
    }
}


if (isset($_POST['submitG'])) {
    $registro = ControladorFormulariosPagos::ctrActualizarCarruselG();

    if ($registro == "ok") {
        echo '<script>
             if (window.history.replaceState) {
                 window.history.replaceState(null, null, window.location.href);
             }
             alert("¡Registro exitoso!");
             window.location.href = "index.php?pagina=AdminCarrusel";
         </script>';
    } else {
        echo '<script>
             alert("Error en el registro: ' . $registro . '");
         </script>';
    }
}


if (isset($_POST['submitH'])) {
    $registro = ControladorFormulariosPagos::ctrActualizarCarruselH();

    if ($registro == "ok") {
        echo '<script>
             if (window.history.replaceState) {
                 window.history.replaceState(null, null, window.location.href);
             }
             alert("¡Registro exitoso!");
             window.location.href = "index.php?pagina=AdminCarrusel";
         </script>';
    } else {
        echo '<script>
             alert("Error en el registro: ' . $registro . '");
         </script>';
    }
}



?>