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
    
        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <h3 class="mb-4">Buscar Inscripción</h3>
                <form action="index.php" method="get">
                    <input type="hidden" name="pagina" value="AdminInscripcionIndividual">
                    <div class="form-group">
                        <label for="buscar_por">Buscar por:</label>
                        <select class="form-control" id="buscar_por" name="buscar_por">
                            <option value="id_inscripcion">Id Inscripción</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="valor">Valor:</label>
                        <input type="text" class="form-control" id="valor" name="valor" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Buscar</button>
                    <a href="javascript:history.back()" class="btn btn-primary">Regresar</a>
                </form>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                <img src="vistas/img/5.jpg" alt="Descripción de la imagen" style="max-width: 100%; height: auto;">
            </div>
        </div>
    </div>
</div>
<div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
</div>
<div class="form-group">
</div>
<div class="table-responsive">
    <table class="table">
        <thead class="tbody-talleres">
            <tr class="encabezadoL">
                <th>id inscripción</th>
                <th>Taller</th>
                <th>Número de Control</th>
                <th>
                    <i class="fas fa-user"></i> Nombre alumno
                </th>
                <th>Horario</th>
                <th style="width: 150px;">Fecha</th>
                <th>Aula</th>
                <th>Souvenir</th>
                <th>Talla</th>
                <th></th>
            </tr>
        </thead>
        <tbody class="tbody-td">
            <?php
            $talleres = ControladorFormularios::ctrSeleccionarInscripciones(); // Obtener los talleres desde el controlador 
            foreach ($talleres as $taller) {
                $id_inscripcion = $taller["id_inscripcion"];
                $titulo = $taller["titulo"];
                $numero = $taller["numero_control"];
                $nombre = $taller["nombre_alumno"];
                $horario = $taller["horario"];
                $fecha = $taller["fecha"];
                $aula = $taller["aula"];
                $souvenir = $taller["souvenir"];
                $talla = $taller["talla"];
                echo '<tr>
                            <td>' . $id_inscripcion . '</td>
                            <td>' . $titulo . '</td>
                            <td>' . $numero . '</td>
                            <td>' . $nombre . '</td>
                            <td>' . $horario . '</td>
                            <td>' . $fecha . '</td>
                             <td>' . $aula . '</td>
                            <td>' . $souvenir . '</td>
                            <td>' . $talla . '</td>';
                echo '</tr>';
            }
            ?>
            <!-- Agrega más filas según sea necesario -->
        </tbody>
    </table>
</div>