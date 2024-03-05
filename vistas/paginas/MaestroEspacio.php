<?php

// Verificar si el usuario está autenticado y es de tipo "maestro"
if (!isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] !== 'maestro') {
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
                                                             
                                <?php echo '<input type="text" class="form-control" id="nombre" name="nombre" value="'.$_SESSION['nombre'].'" >'; ?>
                            </div>
                        </div>
                        <div class="col-12">
                        <label for="nombre">Carrera</label> 
                            <div class="form-floating">
                             
                              
                                <?php echo '<input type="text" class="form-control" id="carrera" name="carrera" value="'.$_SESSION['carrera'].'" >'; ?>
                            </div>
                        </div>
                   
                        <div class="col-12">
                            <button class="btn btn-primary rounded-pill py-3 px-5" id="submitActualizar" name="submitActualizar" type="submit">Actualizar Datos</button>
                            
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">

                <img src="vistas/img/2.jpg" alt="Descripción de la imagen" style="max-width: 100%; height: auto;">

            </div>
        </div>
    </div>
</div>
<?php
if (isset($_POST['submitActualizar'])) {
    $id_alumno = $_SESSION['numero_control'];
    $registro = ControladorFormularios::ctrActualizarMaestro( $id_alumno);

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
    <table class="table wow fadeInUp" data-wow-delay="1.2"">
    <thead class=" tbody-talleres">
        <tr class="encabezadoL ">
       
            <th>Taller o Conferencia</th>
            <th> <i class="fas fa-file-alt"></i> Descripción </th>
            <th>Souvenir</th>
            <th>Horario</th>
            <th style="width: 150px;">Fecha</th>
            <th style="width: 150px;">Fecha Final</th>
            <th>Aula</th>
            <th>Cupo</th>
            <th>Editar</th>
            <th>Ver</th>
        </tr>
        </thead>
        <tbody class="tbody-td">
            <?php
            $id_alumno = $_SESSION["numero_control"];

            $talleres = ControladorFormulariosMaestros::ctrSeleccionarTalleresMaestro($id_alumno); // Obtener los talleres desde el controlador

            foreach ($talleres as $taller) {
                $id_curso = $taller["id_curso"];
                $titulo = $taller["titulo"];
                $pdf_descripcion = $taller["pdf_descripcion"];
                $horario = $taller["horario"];
                $fecha = $taller["fecha"];
                $fechafinal = $taller["fechafinal"];
                $aula = $taller["aula"];
                $souvenir = $taller["souvenir"];
                $url_imagen = $taller["url_imagen"];
                $cupo = $taller ["cupo"];
                echo '<tr>                     
                       <td>' . $titulo . '</td>
                                         
                       <td>
                       <a href="' . $pdf_descripcion . '" download>
                           <img src="vistas/img/icon/descarga.png" alt="Icono de PDF" style="width: 30px; height: 30px;">
                           Descripción.pdf
                       </a>
                       </td>
                       
                       <td>' . $souvenir . '</td>
                       
                       <td>' . $horario . '</td>
                       <td>' . $fecha . '</td>
                       <td>' . $fechafinal . '</td>
                       <td>' . $aula . '</td>
                       <td>' . $cupo . '</td>';
                        
                        echo '<td><a href="index.php?pagina=editarCurso&id='.$id_curso.'"class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a></td>';
                        echo '<td><a href="index.php?pagina=VerCurso&id='.$id_curso.'"class="btn btn-success"><i <i class="fas fa-search"></i></a></td>';
                echo '</tr>';
            }

            ?>
 
            <!-- Agrega más filas según sea necesario -->
        </tbody>
    </table>
</div>


<div class="container-xxl py-5">
</div>

<div class="container-xxl py-5">
</div>