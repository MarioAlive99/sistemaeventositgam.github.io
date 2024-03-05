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



        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <h3 class="mb-4">Buscar Alumno</h3>

                <form action="index.php" method="get">
                    <input type="hidden" name="pagina" value="AdminAlumnoIndividual">
                    <div class="form-group">
                        <label for="buscar_por">Buscar por:</label>
                        <select class="form-control" id="buscar_por" name="buscar_por">
                            <option value="numero_control">Número de Control</option>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="valor">Valor:</label>
                        <input type="text" class="form-control" id="valor" name="valor" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Buscar</button>

                </form>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">

                <img src="vistas/img/6.jpg" alt="Descripción de la imagen" style="max-width: 100%; height: auto;">

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

        <tr class="encabezadoL">

            <th>Número control</th>
            <th>Nombre</th>
            <th>Tipo usuario</th>
            <th>Carrera</th>
            <th>Semestre</th>
            <th>Grupo</th>
            <th>Correo</th>
            <th>Contraseña</th>
            <th>Fecha</th>
           

            </thead>
            <tbody class="tbody-td">
                <?php


                $talleres = ControladorFormularios::ctrSeleccionarAdminTalleresAlumnos(); // Obtener los talleres desde el controlador

                foreach ($talleres as $taller) {
                    $numero_control = $taller['numero_control'];
                    $nombre = $taller['nombre'];
                    $tipo_usuario = $taller['tipo_usuario'];
                    $carrera = $taller['carrera'];
                    $semestre = $taller['semestre'];
                    $grupo = $taller['grupo'];
                    $correo = $taller['correo'];
                    $password = $taller['password'];
                    $fecha = $taller['fecha'];
                    


                    // Agrega más campos si es necesario

                    echo '<tr>
                     
                      
                       <td>' . $numero_control . '</td>
                       <td>' .  $nombre . '</td>
                       <td>' . $tipo_usuario . '</td>
                       <td>' . $carrera . '</td>
                       <td>' . $semestre . '</td>
                       <td>' . $grupo . '</td>
                       <td>' .  $correo . '</td>
                       <td>' .  $password . '</td>
                       <td>' .  $fecha . '</td>';
                   

                    echo '</tr>';
                }

                ?>

                <!-- Agrega más filas según sea necesario -->
            </tbody>
    </table>
</div>