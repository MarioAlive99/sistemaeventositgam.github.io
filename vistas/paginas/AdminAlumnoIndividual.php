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
        <thead class="tbody-talleres">
            <tr class="encabezado">
                <th>Número control</th>
                <th>Nombre</th>
                <th>Carrera</th>
                <th>Correo</th>
                <th>Contraseña</th>
                <th>Fecha de ingreso</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody class="tbody-td">
            <?php
            $id_valor = $valor = $_GET['valor'];
            $item = $_GET['buscar_por'];

            $talleres = ControladorFormularios::ctrSeleccionarUnSoloMaestro($item, $id_valor); // Obtener los talleres desde el controlador

            $numero_control = $talleres["numero_control"];
            $nombre = $talleres["nombre"];
            $carrera = $talleres["carrera"];
            $correo = $talleres["correo"];
            $password = $talleres["password"];
            $fecha = $talleres["fecha"];

            if ($talleres == null) {
                echo '<h2>No se encontraron coincidencias</h2>';
            } else {
                echo '<tr>
                    <td>' . $numero_control . '</td>
                    <td>' . $nombre . '</td>
                    <td>' . $carrera . '</td>
                    <td>' . $correo . '</td>
                    <td>' . $password . '</td>
                    <td>' . $fecha . '</td>';
                echo '<td><a href="index.php?pagina=AdminEditarMaestro&id=' . $numero_control . '" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a></td>';
            }
            ?>
            <td>
                <form method="post">
                    <input type="text" value="<?php echo $numero_control; ?>" name="eliminarRegistro" hidden>
                    <button type="submit" id="submitEliminar" name="submitEliminar" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>

                    <?php
                    $id = $numero_control;

                    $tabla = "usuario";
                    $campo = "numero_control";
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