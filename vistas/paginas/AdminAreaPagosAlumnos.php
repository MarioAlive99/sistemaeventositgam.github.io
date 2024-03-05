<?php

// Verificar si el usuario está autenticado y es de tipo "maestro"
if (!isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] !== 'admin') {
    header("Location: index.php?pagina=inicio"); // Redireccionar al inicio si no es maestro
    exit();
}
?>
<!-- Contact Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
        </div>
        <div class="form-group">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">

                    <h3 class="mb-4">Ingresar Pagos</h3>
                    <form method="post" enctype="multipart/form-data" id="formSubirArchivo">
                        <input type="hidden" name="pagina" value="formulariosP.controlador">
                        <div class="input-group mb-3">
                            <label for="archivo" class="input-group-text btn btn-warning">Seleccionar archivo</label>
                            <input type="file" name="archivo" id="archivo" class="form-control" style="display: none;">
                            <button type="submit" class="btn btn-success" name="submitUp" id="submitBtn" disabled>Subir archivo</button>
                        </div>
                    </form>

                    <?php
                    if (isset($_POST['submitUp'])) {
                        // Procesar el formulario y enviar al controlador
                        $archivo = $_FILES['archivo']['tmp_name'];
                        $registros = ControladorFormulariosPagos::ctrLeerArchivoCSV($archivo);

                        if (!empty($registros)) {
                            $resultado = ControladorFormulariosPagos::ctrInsertarPagos($registros);

                            if ($resultado == "ok") {
                                echo '<script>
                                        alert("Inserción de pagos exitosa.");
                                        window.location.href = "index.php?pagina=AdminAreaPagos";
                                    </script>';
                            } else {
                                echo '<script>
                                        alert("Error al insertar los pagos: ' . $resultado . '");
                                        window.location.href = "index.php?pagina=AdminAreaPagos";
                                    </script>';
                            }
                        } else {
                            echo '<div class="alert alert-danger">El archivo CSV está vacío o no contiene datos válidos.</div>';
                        }
                    }
                    ?>
                    <form method="post">
                        <button type="submit" class="btn btn-danger" name="vaciarTabla" onclick="return confirm('¿Estás seguro de que deseas vaciar la tabla de pagos?')">Vaciar Tabla Pagos</button>
                    </form>
                    <?php
                    if (isset($_POST['vaciarTabla'])) {
                        // Ejecutar el controlador para vaciar la tabla
                        $resultado = ControladorFormulariosPagos::ctrVaciarTabla();

                        if ($resultado === "Ok") {
                            echo '<script>
                alert("La tabla ha sido vaciada correctamente.");
                window.location.href = "index.php?pagina=AdminAreaPagos";
              </script>';
                        } else {
                            echo '<script>
                alert("Error al vaciar la tabla: ' . $resultado . '");
              </script>';
                        }
                    }
                    ?>
                    <div class="form-group"></div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <div style="margin-top: 10px;">
                                    <a href="index.php?pagina=AdminAreaPagos" class="btn btn-primary">Todos Cuota Pagada</a>
                                </div>
                                <div style="margin-top: 10px;">
                                    <a href="index.php?pagina=AdminAreaPagosAlumnos" class="btn btn-dark">Alumnos Cuota pagada</a>
                                </div>
                                <div style="margin-top: 10px;">
                                    <a href="index.php?pagina=AdminAreaPagosAlumnas" class="btn btn-primary">Alumnas Cuota Pagada</a>
                                </div>
                                <div style="margin-top: 10px;">
                                    <a href="index.php?pagina=AdminAreaCursos" class="btn btn-primary">Regresar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <img src="vistas/img/5.jpg" alt="Descripción de la imagen" style="max-width: 100%; height: auto;">
                </div>
            </div>
        </div>
        <div class="form-group">
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    var archivoInput = document.getElementById("archivo");
                    var submitBtn = document.getElementById("submitBtn");
                    archivoInput.addEventListener("change", function() {
                        if (archivoInput.files.length > 0) {
                            submitBtn.disabled = false;
                        } else {
                            submitBtn.disabled = true;
                        }
                    });
                });
            </script>
        </div>
    </div>
</div>
</div>
<div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;"></div>
<?php
$resultado = ControladorFormulariosPagos::ctrSeleccionarTotalTallaHombres();
$ExCh = $resultado["ExCH"];
$CH = $resultado["CH"];
$M = $resultado["M"];
$G = $resultado["G"];
$ExG = $resultado["ExG"];
?>
<div class="form-group">
    <h3>Alumnos inscritos con cuota pagada</h3>
    <h5>Totales de tallas Hombres</h5>
    <table class="table table-bordered">
        <tr>
            <th>Extra Chica</th>
            <th>Chica</th>
            <th>Mediana</th>
            <th>Grande</th>
            <th>Extra Grande</th>
        </tr>
        <tr>
            <td><?php echo  $ExCh;  ?></td>
            <td><?php echo  $CH;  ?></td>
            <td><?php echo  $M;  ?></td>
            <td><?php echo  $G;  ?></td>
            <td><?php echo  $ExG;  ?></td>
        </tr>
    </table>
</div>
<div class="table-responsive">
    <table class="table">
        <thead class="tbody-talleres">
            <tr class="encabezadoL">
                <th>Curso</th>
                <th>Número de Control</th>
                <th>
                    <i class="fas fa-user"></i> Nombre alumno
                </th>
                <th>Souvenir</th>
                <th>Talla</th>
                <th style="width: 150px;">Fecha de pago</th>
            </tr>
        </thead>
        <tbody class="tbody-td">
            <?php
            $talleres = ControladorFormulariosPagos::ctrSeleccionarPagosHombres(); // Obtener los talleres desde el controlador
            foreach ($talleres as $taller) {
                $id_pago = $taller["id_pagos"];
                $titulo = $taller["titulo"];
                $numero = $taller["numero_control"];
                $nombre = $taller["nombre_alumno"];
                $fecha = $taller["fecha_pago"];
                $talla = $taller["talla"];
                $souvenir = $taller["souvenir"];
                echo '<tr>
                <td>' . $titulo . '</td>
                <td>' . $numero . '</td>
                <td>' . $nombre . '</td>
                <td>' . $souvenir . '</td>
                <td>' . $talla . '</td>
                <td>' . $fecha . '</td>';
                echo '</tr>';
            }
            ?>
            <!-- Agrega más filas según sea necesario -->
        </tbody>
    </table>
</div>
<script>
    const archivoInput = document.getElementById('archivo');
    const btnSubirArchivo = document.getElementById('btnSubirArchivo');
    archivoInput.addEventListener('change', function() {
        if (archivoInput.files.length > 0) {
            btnSubirArchivo.removeAttribute('disabled');
        } else {
            btnSubirArchivo.setAttribute('disabled', 'disabled');
        }
    });
</script>
<div class="form-group"></div>
<div class="form-group"></div>
<div class="form-group"></div>