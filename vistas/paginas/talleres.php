 <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">

     <h4 class="display-5 mb-5">Talleres y Conferencias</h4>
 </div>

 <div class="form-group">
 </div>
 <div class="table-responsive">
     <table class="table">
         <thead class="tbody-talleres">
             <tr class="encabezadoL ">
                 <th class="hidden-header">
                     <i class="fas fa-id-card-alt"></i> id_curso
                 </th>
                 <th>Titulo</th>
                 <th>
                     <i class="fas fa-user"></i> Ponente
                 </th>
                 <th class="hidden-header"> N_maestro </th>
                 <th> <i class="fas fa-file-alt"></i> Descripción </th>
                 <th>
                     Souvenir
                 </th>
                 <th class="hidden-header">Precio</th>
                 <th>Horario</th>
                 <th style="width: 150px;">Fecha Inicial</th>
                 <th style="width: 150px;">Fecha Final</th>
                 <th>Aula</th>
                 <th>Cupo</th>
                 <th>Tipo</th>
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
                    $fechafinal = $taller["fechafinal"];
                    $aula = $taller["aula"];
                    $cupo = $taller["cupo"];
                    // Agrega más campos si es necesario

                    echo '<tr>
                            <td class="hidden-cell registroId">' . $id_curso . '</td>
                            <td>' . $titulo . '</td>
                            <td>' . $nombre_profesor . '</td>
                            <td class="hidden-cell registroId">' . $numero_control_profesor . '</td>
                            <td>
                            <a href="' . $pdf_descripcion . '" download>
                                <img src="vistas/img/icon/descarga.png" alt="Icono de PDF" style="width: 30px; height: 30px;">
                                Descripción.pdf
                            </a>
                            </td>
                            <td>' . $souvenir . '</td>
                            <td class="hidden-cell registroId">' . $precio . '</td>
                            <td>' . $horario . '</td>
                            <td>' . $fecha . '</td>
                            <td>' . $fechafinal . '</td>
                            <td>' . $aula . '</td>
                            <td>' . $cupo . '</td>
                            <td>' . $tipo . '</td>';

                    if (isset($_SESSION["validarIngreso"]) && $_SESSION["validarIngreso"] == "ok") {
                        // ID del modal con el formulario
                        if (isset($_SESSION["tipo_usuario"]) && $_SESSION["tipo_usuario"] == "alumno") {
                            echo '<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#inscriptionModal" onclick="mostrarValores(this)">Inscribirse</button></td>';
                        } else {
                            // Mostrar un mensaje de usuario no válido
                            echo '<td><button type="button" class="btn btn-primary" onclick="mostrarAlerta()">Inscribirse</button></td>';
                        }
                    } else {
                        echo '<td> <a href="index.php?pagina=ingreso"> <button type="button" class="btn btn-primary">Inscribirse</button></a></td>';
                    }



                    echo '</tr>';
                }

                ?>

             <!-- Agrega más filas según sea necesario -->
         </tbody>
     </table>

     <!-- Modal para el formulario de inscripción -->
     <div class="modal fade" id="inscriptionModal" tabindex="-1" role="dialog" aria-labelledby="inscriptionModalLabel" aria-hidden="true">
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
                                     <label for="id_cursoLabel" class="text-primary font-weight-bold">
                                         <i class="fas fa-id-card mr-2"></i> Id_curso:
                                     </label>
                                     <input type="text" id="id_cursoLabel" name="id_curso" readonly value="" style="border: none; text-align: justify; width: auto;" />
                                 </div>
                                 <div class="col">
                                     <label for="tituloLabel" class="text-primary font-weight-bold">
                                         <i class="fas fa-file-alt"></i> Título:
                                     </label>

                                     <input type="text" id="tituloLabel" name="titulo" readonly value="" style="border: none; text-align: justify; width: auto;" />
                                 </div>
                             </div>
                         </div>

                         <div class="form-group">
                             <div class="row">
                                 <div class="col">
                                     <label for="ponenteLabel" class="text-primary font-weight-bold">
                                         <i class="fas fa-user mr-2"></i> Ponente:
                                     </label>

                                     <input type="text" id="ponenteLabel" name="maestro" readonly value="" style="border: none; text-align: justify; width: 250px;" />
                                 </div>
                                 <div class="col">
                                     <label for="precioLabel" class="text-primary font-weight-bold">
                                         <i class="fas fa-dollar-sign mr-2"></i> Cooperación:
                                     </label>

                                     <input type="text" id="precioLabel" name="precio" readonly value="" style="border: none; text-align: justify;" />
                                 </div>
                             </div>
                         </div>
                         <div class="form-group">


                             <label for="souvenirLabel" class="text-primary font-weight-bold">
                                 <i class="fas fa-gift mr-2"></i> Souvenir:
                                 <input type="text" id="souvenirLabel" name="regalo" readonly value="" style="border: none; text-align: justify; width: 280px;" />
                             </label>






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
                             <div class="row">
                                 <div class="col">
                                     <label for="horarioLabel" class="text-primary font-weight-bold">
                                         <i class="far fa-clock mr-2"></i> Horario:
                                     </label>
                                     <input type="text" id="horarioLabel" name="horario" readonly value="" style="border: none; text-align: justify;" />
                                 </div>
                                 <div class="col">
                                     <label for="aulaLabel" class="text-primary font-weight-bold">
                                         <i class="fas fa-building mr-2"></i>Fecha:
                                     </label>
                                     <input type="text" id="fechaLabel" name="fecha" readonly value="" style="border: none; text-align: justify;" />
                                 </div>
                             </div>
                         </div>

                         <div class="form-group">
                             <div class="row">
                                 <div class="col">
                                     <label for="aulaLabel" class="text-primary font-weight-bold">
                                         <i class="fas fa-users mr-2"></i> Aula:
                                         <input type="text" id="aulaLabel" name="aula" readonly value="" style="border: none; text-align: justify;" />
                                     </label>
                                 </div>
                                 <div class="col">
                                     <label for="cupoLabel" class="text-primary font-weight-bold">
                                         <i class="fas fa-users mr-2"></i> Cupo:
                                         <input type="text" id="cupoLabel" name="cupo" readonly value="" style="border: none; text-align: justify;" />
                                     </label>
                                 </div>
                             </div>
                         </div>
                         <div class="form-group">
                             <div class="row">
                                 <div class="col">
                                     <label for="alumnoLabel" class="text-primary font-weight-bold">
                                         <i class="fas fa-user-graduate mr-2"></i> Alumno:
                                     </label>
                                     <input type="text" id="nombre" name="nombre" readonly value="<?php echo $_SESSION['nombre']; ?>" style="border: none; text-align: justify;">
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
                         </div>
                         <div class="form-group">
                             <!-- Campos del formulario -->
                         </div>
                         <div class="modal-footer bg-light">
                             <button type="submit" class="btn btn-primary" id="submitmodal1" name="submitmodal1">
                                 <i class="fas fa-paper-plane mr-2"></i> Inscribirse
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
      if (isset($_POST['submitmodal1'])) {
        $registro = ControladorFormulariosAlumnos::ctrRegistroInscripcion();
        if ($registro == "ok") {
            echo '<script>
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
            alert("¡Registro exitoso!");
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
 <div class="container-xxl py-5">
 </div>