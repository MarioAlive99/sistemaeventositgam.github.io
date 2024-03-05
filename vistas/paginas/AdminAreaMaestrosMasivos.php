<?php

// Verificar si el usuario está autenticado y es de tipo "maestro"
if (!isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] !== 'admin') {
    header("Location: index.php?pagina=inicio"); // Redireccionar al inicio si no es maestro
    exit();
}
?>
<div style="margin-top: 10px;">
                <a href="javascript:history.back()" class="btn btn-primary">Regresar</a>
            </div>
<!-- Contact Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">


        </div>


        <div class="form-group">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">

                    <h3 class="mb-4">Ingresar Maestros por archivo csv</h3>
                    <form method="post" enctype="multipart/form-data" id="formSubirArchivo">
    <input type="hidden" name="pagina" value="formulariosP.controlador">
    <div class="input-group mb-3">
        <label for="archivo" class="input-group-text btn btn-warning">Seleccionar archivo</label>
        <input type="file" name="archivo" id="archivo" class="form-control" style="display: none;">
        <button type="submit" class="btn btn-success" name="submitUp" id="submitBtn" disabled>Subir archivo</button>
    </div>
</form>

<?php
if (isset($_POST['submitUp'])) {
    // Procesar el formulario y enviar al controlador
    $archivo = $_FILES['archivo']['tmp_name'];
    $registros = ControladorFormulariosMaestros::ctrLeerArchivoCSV($archivo);
    

    if (!empty($registros)) {
       $resultado= ControladorFormulariosMaestros::ctrInsertarMaestrosCSV($registros);
       
 
       if ($resultado == "ok") {
        echo '<script>
            alert("Inserción de Maestros exitosa.");
            window.location.href = "index.php?pagina=AdminAreaMaestrosMasivos";
        </script>';
    } else {
        echo '<script>
            alert("Error al insertar los pagos: ' . $resultado . '");
            window.location.href = "index.php?pagina=AdminAreaMaestrosMasivos";
        </script>';
    }

    } else {
        echo '<div class="alert alert-danger">El archivo CSV está vacío o no contiene datos válidos.</div>';
    }
}
?>
 
                     
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">

                    <img src="vistas/img/5.jpg" alt="Descripción de la imagen" style="max-width: 100%; height: auto;">

                </div>
            </div>
        </div>

        <div class="form-group">



            <div class="form-group">
            <script>
    document.addEventListener("DOMContentLoaded", function() {
        var archivoInput = document.getElementById("archivo");
        var submitBtn = document.getElementById("submitBtn");

        archivoInput.addEventListener("change", function() {
            if (archivoInput.files.length > 0) {
                submitBtn.disabled = false;
            } else {
                submitBtn.disabled = true;
            }
        });
    });
</script>




            </div>





        </div>



    </div>
</div>

<div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">


</div>

<div class="form-group">
</div>

<div class="form-group">
    <h3>Maestros registrados</h3>
</div>
<div class="table-responsive">
<div class="table-responsive">
    <table class="table wow fadeInUp" data-wow-delay="1.2"">
    <thead class=" tbody-talleres">
     
<tr class="encabezadoL">

<th>ID</th>
    <th>Clave del Maestro</th>
    <th>Nombre</th>
    <th>Tipo usuario</th>
    <th>Correo</th>
    <th>Password</th>
    <th>Fecha de registro</th>
 
        </thead>
        <tbody class="tbody-td">
            <?php
            

            $talleres = ControladorFormularios::ctrSeleccionarAdminTalleresMaestro(); // Obtener los talleres desde el controlador

            foreach ($talleres as $taller) {
                $id_user = $taller['id_user'];
                $numero_control = $taller['numero_control'];
                $nombre = $taller['nombre'];
                $tipo_usuario = $taller['tipo_usuario'];
                $carrera = $taller['carrera'];
                $semestre = $taller['semestre'];
                $grupo = $taller['grupo'];
                $correo = $taller['correo'];
                $password = $taller['password'];
                $fecha = $taller['fecha'];
                $limite = $taller['limite'];


                // Agrega más campos si es necesario

                echo '<tr>
                     
                <td>' .  $id_user . '</td>
                <td>' . $numero_control . '</td>
                <td>' .  $nombre . '</td>
                <td>' . $tipo_usuario . '</td>
                <td>' .  $correo . '</td>
                <td>' .  $password. '</td>
                <td>' .  $fecha . '</td>
                ';
                       




                echo '</tr>';
            }

            ?>

            <!-- Agrega más filas según sea necesario -->
        </tbody>
    </table>
</div>
 