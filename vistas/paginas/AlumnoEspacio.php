<?php

// Verificar si el usuario está autenticado y es de tipo "maestro"
if (!isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] !== 'alumno') {
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
                <h3 class="mb-4">Mis datos</h3>
                <p class="mb-4">En este espacio puedes ver tus datos y ver tus cursos mas abajo, si tienes dudas acude
                    con el administrador del Sitio</a>.</p>
                <form method="post">
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="nombre">Nombre</label>
                            <div class="form-floating">

                                <?php echo '<input type="text" class="form-control" id="nombre" name="nombre" value="' . $_SESSION['nombre'] . '" >'; ?>
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="carrera">Carrera</label>
                            <div class="form-floating">


                                <?php echo '<input type="text" class="form-control" id="carrera" name="carrera" value="' . $_SESSION['carrera'] . '" >'; ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="nombre">Grupo</label>
                            <div class="form-floating">


                                <?php echo '<input type="text" class="form-control" id="grupo" name="grupo" value="' . $_SESSION['grupo'] . '" >'; ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="nombre">Semestre</label>
                            <div class="form-floating">


                                <?php echo '<input type="text" class="form-control" id="semestre" name="semestre" value="' . $_SESSION['semestre'] . '" >'; ?>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-floating">

                                <?php echo '<label for="' . $_SESSION['limite'] . '">Cursos Inscrito  ' . $_SESSION['limite'] . '</label>'; ?>

                            </div>
                        </div>


                        <div class="col-12">
                            <button class="btn btn-primary rounded-pill py-3 px-5" id="submitActualizar" name="submitActualizar" type="submit">Actualizar Datos</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">

                <img src="vistas/img/9.jpg" alt="Descripción de la imagen" style="max-width: 100%; height: auto;">

            </div>
        </div>
    </div>
</div>
<?php
if (isset($_POST['submitActualizar'])) {
    $id_alumno = $_SESSION['numero_control'];
    $registro = ControladorFormularios::ctrActualizarAlumno($id_alumno);

    if ($registro == "ok") {
        echo '<script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
        alert("¡Registro exitoso! Ingresa de nuevo para ver los cambios Actualizados");
        window.location.href = "index.php?pagina=salir";
    </script>';
    } else {
        echo '<script>
            alert("Error en el registro: ' . $registro . '");
        </script>';
    }
}
?>

<div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">


</div>

<div class="form-group">
</div>
<div class="table-responsive">
    <h2>Mis inscripciones</h2>
    <table class="table wow fadeInUp" data-wow-delay="1.2"">
    <thead class=" tbody-talleres">
        <tr class="encabezadoL ">
            <th class="hidden-header">
                <i class="fas fa-id-card-alt"></i> id_curso
            </th>
            <th>Taller o Conferencia</th>
            <th>
                <i class="fas fa-user"></i> Ponente
            </th>
            <th class="hidden-header"> N_maestro </th>
            <th> <i class="fas fa-file-alt"></i> Descripción </th>
            <th>
                Souvenir
            </th>
            <th>Talla</th>
            <th>Genero</th>
            <th>Horario</th>
            <th style="width: 150px;">Fecha</th>
            <th>Aula</th>
            <th>Ver</th>
            <th>Editar</th>
            <th>Eliminar</th>

        </tr>
        </thead>
        <tbody class="tbody-td">
            <?php
            $id_alumno = $_SESSION["numero_control"];

            $talleres = ControladorFormulariosAlumnos::ctrSeleccionarTalleresAlumno($id_alumno); // Obtener los talleres desde el controlador

            foreach ($talleres as $taller) {
                $id_curso = $taller["id_curso"];
                $titulo = $taller["titulo"];
                $nombre_profesor = $taller["nombre_profesor"];
                $pdf_descripcion = $taller["pdf_descripcion"];
                $horario = $taller["horario"];
                $fecha = $taller["fecha"];
                $aula = $taller["aula"];
                $souvenir = $taller["souvenir"];
                $talla = $taller["talla"];
                $sexo = $taller["sexo"];



                // Agrega más campos si es necesario

                echo '<tr>
                     
                       <td>' . $titulo . '</td>
                       <td>' . $nombre_profesor . '</td>
                       
                       <td>
                       <a href="' . $pdf_descripcion . '" download>
                           <img src="./vistas/img/icon/descarga.png" alt="Icono de PDF" style="width: 30px; height: 30px;">
                           Descripción.pdf
                       </a>
                       </td>
                       <td>' . $souvenir . '</td>
                       <td>' . $talla . '</td>
                       <td>' . $sexo . '</td>
                       <td>' . $horario . '</td>
                       <td>' . $fecha . '</td>
                       <td>' . $aula . '</td>';
                echo '<td><a href="index.php?pagina=VerCursoAlumno&id=' . $id_curso . '"class="btn btn-success"><i <i class="fas fa-search"></i></a></td>';
                echo '<td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#updateModal" onclick="mostrarValores2(this)"><i class="fas fa-pencil-alt"></i></a></td>';
                echo '<td>';
                echo '<form method="post">';
                echo '<input type="text" value="' . $id_curso . '" name="eliminarRegistro" hidden>';
                echo ' <button type="submit" id="submitEliminar" name="submitEliminar" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>';
                $idcursos = $id_curso;
                $id = $_SESSION['numero_control'];
                $tabla = "inscripciones";
                $campo = "numero_control";
                $actualizar = new ControladorFormularios();
                $actualizar->ctrActualizarCursoCupo($idcursos);
                $eliminar = new ControladorFormularios();
                $eliminar->ctrEliminarRegistroAlumnos($tabla, $campo, $id);

                echo ' </form>';
            }

            ?>










            </td>
            </tr>
            <!-- Agrega más filas según sea necesario -->
        </tbody>
    </table>
</div>

<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header BGGB-primary">
                <h5 class="modal-title text-white" id="inscriptionModalLabel">
                    <i class="fas fa-pencil-alt mr-2"></i> Formulario de Inscripción
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">
                    <!-- Contenido del formulario -->
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="alumnoLabel" class="text-primary font-weight-bold">
                                    <i class="fas fa-user-graduate mr-2"></i> Alumno:
                                </label>
                                <input type="text" id="nombre" name="nombre" readonly value="<?php echo $_SESSION['nombre']; ?>" style="border: none; text-align: justify; width: 250px;">

                            </div>
                            <div class="col">
                                <label for="numeroControlLabel" class="text-primary font-weight-bold">
                                    <i class="fas fa-id-card-alt mr-2"></i> N. de Control:
                                </label>
                                <input type="text" id="numero_control" name="numero_control" readonly value="<?php echo $_SESSION['numero_control']; ?>" style="border: none; text-align: justify;">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col d-flex align-items-center">
                                <label for="sexoLabel" class="text-primary font-weight-bold mr-2">
                                    <i class="fas fa-venus-mars"></i> Género:
                                </label>
                                <select id="sexoSelect" name="sexo" class="form-control form-control-sm" style="width: 100px;" required>
                                    <option value="">-----</option>
                                    <option value="MUJER">Mujer</option>
                                    <option value="HOMBRE">Hombre</option>
                                </select>
                            </div>
                            <div class="col d-flex align-items-center">
                                <label for="tallaLabel" class="text-primary font-weight-bold mr-2">
                                    <i class="fas fa-tshirt mr-2"></i> Selecciona tu talla:
                                </label>
                                <select id="tallaSelect" name="talla" class="form-control form-control-sm" style="width: 100px;" required>
                                <option value="">-----</option>
                                         <option value="ExCH">Extra chica</option>
                                         <option value="CH">Chica</option>
                                         <option value="M">Mediana</option>
                                         <option value="G">Grande</option>
                                         <option value="ExG">Extra Grande</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                    </div>
                    <div class="form-group">
                        <!-- Campos del formulario -->
                    </div>
                    <div class="modal-footer bg-light">
                        <button type="submit" class="btn btn-primary" id="submitmodalActualizar" name="submitmodalActualizar">
                            <i class="fas fa-paper-plane mr-2"></i> Actualizar
                        </button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            <i class="fas fa-times mr-2"></i> Cerrar
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
</div>
</div>

<?php
// ...
$numero_de_control = $_SESSION['numero_control'];
if (isset($_POST['submitmodalActualizar'])) {
    $registro = ControladorFormularios::ctrEditarInscripcionAlumno($numero_de_control);
    var_dump($registro);

    if ($registro == "ok") {
        echo '<script>
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
            alert("¡Registro exitoso! ");
            window.location.href = "index.php?pagina=AlumnoEspacio";
        </script>';
    } else {
        echo '<script>
            alert("Error en el registro: ' . $registro . '");
        </script>';
    }
}

?>

<div class="container-xxl py-5">
</div>
<div class="container-xxl py-5">
</div>