<?php

// Verificar si el usuario está autenticado y es de tipo "maestro"
if (!isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] !== 'admin') {
    header("Location: index.php?pagina=inicio"); // Redireccionar al inicio si no es maestro
    exit();
}
?>
<?php
// Verificar si se han enviado los datos
if (isset($_GET['buscar_por']) && isset($_GET['valor'])) {
    // Obtener los valores enviados
    $buscarPor = $_GET['buscar_por'];
    $valor = $_GET['valor'];
}
?>
 <div style="margin-top: 10px;">
                <a href="javascript:history.back()" class="btn btn-primary">Regresar</a>
            </div>
 
            <div class="container-xxl py-5">
                <h2> Resultado busqueda</h2>
</div>


<div class="table-responsive">
    <table class="table wow fadeInUp" data-wow-delay="1.2">
        <thead>
            <tr>
                <th>ID_curso</th>
                <th>Título</th>
                <th>ID profesor</th>
                <th>Nombre profesor</th>
                <th>PDF descripción</th>
                <th>Souvenir</th>
                <th>Precio</th>
                <th>Tipo</th>
                <th>Horario</th>
                <th>Fecha</th>
                <th>Aula</th>
                <th>Cupo</th>
                <th>Editar</th>
                <th>Eliminar</th>

            </tr>
        </thead>

        <tbody class="tbody-td">
            <?php
            $id_valor = $valor = $_GET['valor'];
            $item = $_GET['buscar_por'];



            $array = ControladorFormularios::ctrSeleccionarUnSoloCurso($item, $id_valor); // Obtener los talleres desde el controlador



            $id_curso = $array['id_curso'];
            $titulo = $array['titulo'];
            $numero_control_profesor = $array['numero_control_profesor'];
            $nombre_profesor = $array['nombre_profesor'];
            $pdf_descripcion = $array['pdf_descripcion'];
            $souvenir = $array['souvenir'];
            $precio = $array['precio'];
            $tipo = $array['tipo'];
            $horario = $array['horario'];
            $fecha = $array['fecha'];
            $aula = $array['aula'];
            $cupo = $array['cupo'];
            $url_imagen = $array['url_imagen'];

            if ($array == null) {
                echo '<h2>No se encontraron coincidencias</h2>';
            } else {
                echo '<tr>
                    <td>' . $id_curso . '</td>
                    <td>' . $titulo . '</td>
                    <td>' . $numero_control_profesor . '</td>
                    <td>' . $numero_control_profesor . '</td>
                    <td>
                    <a href="' . $pdf_descripcion . '" download>
                        <img src="vistas/img/icon/descarga.png" alt="Icono de PDF" style="width: 30px; height: 30px;">
                        Descripción.pdf
                    </a>
                    </td>
                    <td>' . $souvenir . '</td>
                    <td>' . $precio . '</td>
                    <td>' . $tipo . '</td>
                    <td>' . $horario . '</td>
                    <td>' . $fecha . '</td>
                    <td>' . $aula . '</td>
                    <td>' . $cupo . '</td>';


                echo '<td><a href="index.php?pagina=AdminEditarCurso&id=' . $id_curso . '" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a></td>';
            }


            ?>
            <td>
                <form method="post">
                    <input type="text" value="<?php echo $id_curso; ?>" name="eliminarRegistro" hidden>
                    <button type="submit" id="submitEliminar" name="submitEliminar" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>

                    <?php
                    $id = $id_curso;
                    $tabla = "curso";
                    $campo = "id_curso";
                    $eliminar = new ControladorFormularios();
                    $eliminar->ctrEliminarRegistro($tabla, $campo, $id)

                    ?>

                </form>
            </td>
            </tr>
            <!-- Agrega más filas según sea necesario -->
        </tbody>
    </table>
</div>