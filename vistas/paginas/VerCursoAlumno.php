<?php

if (isset($_GET["id"])) {

    $item = "id";
    $valor = $_GET["id"];


    $usuario = ControladorFormulariosMaestros::ctrSeleccionarCursoBuscar($valor);
}

?>
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">


        </div>



        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <h3 class="mb-4"><?php echo $usuario['titulo']; ?></h3>
                <table style="border: 1px solid #ddd;">
                    <thead>
                        <tr>
                            <th style="background-color: #1570C7; color: white; border: 1px solid #ddd; padding: 8px;">Datos</th>
                            <th style="background-color: #1570C7; color: white; border: 1px solid #ddd; padding: 8px;">Descripción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="border: 1px solid #ddd; padding: 8px;"><strong>Nombre Profesor</strong></td>
                            <td style="border: 1px solid #ddd; padding: 8px;"><?php echo $usuario['nombre_profesor']; ?></td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid #ddd; padding: 8px;"><strong>Descripción</strong></td>
                            <td style="border: 1px solid #ddd; padding: 8px;">
                                <?php echo '<a href="' . $usuario['pdf_descripcion'] . '" download>
                                <img src="vistas/img/icon/descarga.png" alt="Icono de PDF" style="width: 30px; height: 30px;">
                                Descripción.pdf
                                 </a>'; ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid #ddd; padding: 8px;"><strong>Souvenir</strong></td>
                            <td style="border: 1px solid #ddd; padding: 8px;"><?php echo $usuario['souvenir']; ?></td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid #ddd; padding: 8px;"><strong>Precio</strong></td>
                            <td style="border: 1px solid #ddd; padding: 8px;"><?php echo $usuario['precio']; ?></td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid #ddd; padding: 8px;"><strong>Tipo</strong></td>
                            <td style="border: 1px solid #ddd; padding: 8px;"><?php echo $usuario['tipo']; ?></td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid #ddd; padding: 8px;"><strong>Horario</strong></td>
                            <td style="border: 1px solid #ddd; padding: 8px;"><?php echo $usuario['horario']; ?></td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid #ddd; padding: 8px;"><strong>Fecha</strong></td>
                            <td style="border: 1px solid #ddd; padding: 8px;">Del  <?php echo $usuario['fecha']; ?>  al  <?php echo $usuario['fechafinal']; ?></td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid #ddd; padding: 8px;"><strong>Aula</strong></td>
                            <td style="border: 1px solid #ddd; padding: 8px;"><?php echo $usuario['aula']; ?></td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid #ddd; padding: 8px;"><strong>Cupo</strong></td>
                            <td style="border: 1px solid #ddd; padding: 8px;"><?php echo $usuario['cupo']; ?></td>
                        </tr>

                        <!-- Agrega las demás filas aquí -->
                    </tbody>
                </table>

            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">

                <img src="<?php echo $usuario['url_imagen']; ?>" alt="Descripción de la imagen" style="max-width: 50%; height: auto;">

            </div>
            <div style="margin-top: 10px;">
                    <a href="javascript:history.back()" class="btn btn-primary">Regresar</a>
                </div>
        </div>
    </div>
</div>


<div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">


</div>

<div class="form-group">
</div>
<div class="table-responsive">
    <table class="table wow fadeInUp" data-wow-delay="1.2"">
    <thead class=" tbody-talleres">
        <tr class="encabezadoL ">

            <th>Compañeros Inscritos:</th>
            <th>Número de control</th>
            <th>Nombre Alumno</th>
            <th>Souvenir</th>
            <th>Talla</th>
            <th></th>

        </tr>
        </thead>
        <tbody class="tbody-td">
            <?php
            $id_curso =  $usuario["id_curso"];

            $talleres = ControladorFormulariosMaestros::ctrSeleccionarTalleresInscrito($id_curso); // Obtener los talleres desde el controlador


            if (empty($talleres)) {
                echo '<h2>Ningún alumno inscrito</h2>';
            } else {
                foreach ($talleres as $taller) {
                    $titulo = $taller["titulo"];
                    $numero = $taller["numero_control"];
                    $nombre = $taller["nombre_alumno"];
                    $souvenir = $taller["souvenir"];
                    $talla = $taller["talla"];
            
                    echo '<tr>';
                    echo '<td> <i class="fas fa-user"></i></td>';
                    echo '<td>' . $numero . '</td>';
                    echo '<td>' . $nombre . '</td>';
                    echo '<td>' . $souvenir . '</td>';
                    echo '<td>' . $talla . '</td>';
                    echo '</tr>';
                }
            }

            ?>

            <!-- Agrega más filas según sea necesario -->
        </tbody>
    </table>
</div>