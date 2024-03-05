<?php

// Verificar si el usuario está autenticado y es de tipo "maestro"
if (!isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] !== 'admin') {
    header("Location: index.php?pagina=inicio"); // Redireccionar al inicio si no es maestro
    exit();
}
?>
<?php
 # $talleres = ControladorFormulariosPagos::ctrSeleccionarTalleres(); // Obtener los talleres desde el controlador
?>
<!-- Contact Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">


        </div>



        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <h3 class="mb-4">Buscar Taller o Conferencia</h3>

                <form action="index.php" method="get">
                    <input type="hidden" name="pagina" value="AdminCursoIndividual">
                    <div class="form-group">
                        <label for="buscar_por">Buscar por:</label>
                        <select class="form-control" id="buscar_por" name="buscar_por">
                            <option value="id_curso">Id taller o conferencia</option>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="valor">Valor:</label>
                        <input type="text" class="form-control" id="valor" name="valor" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Buscar</button>
                    <a href="index.php?pagina=AdminAreaInscriptos" class="btn btn-primary">Ver Inscripciones</a>
                    <a href="index.php?pagina=AdminAreaPagos" class="btn btn-primary">Ver Pagos</a>
                     <a href="index.php?pagina=AdminCarrusel" class="btn btn-primary">Carrusel</a>
                </form>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">

                <img src="./vistas/img/5.jpg" alt="Descripción de la imagen" style="max-width: 100%; height: auto;">

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
            <tr class="encabezadoL ">
                <th>ID </th>
                <th>Titulo</th>
                <th>
                    <i class="fas fa-user"></i> Ponente
                </th>

                <th> <i class="fas fa-file-alt"></i> Descripción </th>
                <th>
                    Souvenir
                </th>
                <th>Precio</th>
                <th>Horario</th>
                <th style="width: 150px;">Fecha</th>
                <th>Aula</th>
                <th>Cupo</th>

                <th></th>
            </tr>
        </thead>
        <tbody class="tbody-td">
            <?php

            $talleres = ControladorFormulariosMaestros::ctrSeleccionarTalleres(); // Obtener los talleres desde el controlador

            foreach ($talleres as $taller) {
                $id_curso = $taller["id_curso"];
                $titulo = $taller["titulo"];
                $numero_control_profesor = $taller["numero_control_profesor"];
                $nombre_profesor = $taller["nombre_profesor"];
                $pdf_descripcion = $taller["pdf_descripcion"];
                $souvenir = $taller["souvenir"];
                $precio = $taller["precio"];
                $tipo = $taller["tipo"];
                $horario = $taller["horario"];
                $fecha = $taller["fecha"];
                $aula = $taller["aula"];
                $cupo = $taller["cupo"];
                // Agrega más campos si es necesario

                echo '<tr>
                            <td>' . $id_curso . '</td>
                            <td>' . $titulo . '</td>
                            <td>' . $nombre_profesor . '</td>
                           
                            <td>
                            <a href="' . $pdf_descripcion . '" download>
                                <img src="./vistas/img/icon/descarga.png" alt="Icono de PDF" style="width: 30px; height: 30px;">
                                Descripción.pdf
                            </a>
                            </td>
                            <td>' . $souvenir . '</td>
                            <td>' . $precio . '</td>
                            <td>' . $horario . '</td>
                            <td>' . $fecha . '</td>
                            <td>' . $aula . '</td>
                            <td>' . $cupo . '</td>';




                echo '</tr>';
            }

            ?>

            <!-- Agrega más filas según sea necesario -->
        </tbody>
    </table>
</div>