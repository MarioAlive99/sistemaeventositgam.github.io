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
            <tr class="encabezado">
                <th>ID Inscripcion</th>
                <th>Titulo</th>
                <th>
                    <i class="fas fa-user"></i> Nombre alumno
                </th>
                <th>Horario</th>
                <th style="width: 150px;">Fecha</th>
                <th>Aula</th>
                <th>Souvenir</th>
                <th>Talla</th>
                </tr>
        </thead>

        <tbody class="tbody-td">
            <?php
            $id_valor = $valor = $_GET['valor'];
            $item = $_GET['buscar_por'];

    

            $taller = ControladorFormularios::ctrSeleccionarUnaSolaInscripcion($id_valor); // Obtener los talleres desde el controlador

            $id_curso =$taller["id_curso"];
            $id_inscripcion = $taller["id_inscripcion"];
            $titulo = $taller["titulo"];
            $nombre = $taller["nombre_alumno"];
            $horario = $taller["horario"];
            $fecha = $taller["fecha"];
            $aula = $taller["aula"];
            $souvenir = $taller["souvenir"];
            $talla = $taller["talla"];
           

            if ($taller == null) {
                echo '<h2>No se encontraron coincidencias</h2>';
            } else {
                echo '<tr>
                <td>' . $id_inscripcion . '</td>
                <td>' . $titulo . '</td>
                <td>' . $nombre . '</td>
                <td>' . $horario . '</td>
                <td>' . $fecha . '</td>
                 <td>' . $aula . '</td>
                <td>' . $souvenir . '</td>
                <td>' . $talla . '</td>';
                

               
            }


            ?>
            <td>
                <form method="post">
                    <input type="text" value="<?php echo $id_inscripcion; ?>" name="eliminarRegistro" hidden>
                    <button type="submit" id="submitEliminar" name="submitEliminar" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>

                    <?php
                    $idcursos=$id_curso;
                    $id = $id_inscripcion;
                    $tabla = "inscripciones";
                    $campo = "id_inscripcion";
                    $actualizar = new ControladorFormularios();
                    $actualizar->ctrActualizarCursoCupo($idcursos);
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