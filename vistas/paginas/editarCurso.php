<?php

// Verificar si el usuario está autenticado y es de tipo "maestro" o "admin"
if (!isset($_SESSION['tipo_usuario']) || ($_SESSION['tipo_usuario'] !== 'maestro' && $_SESSION['tipo_usuario'] !== 'admin')) {
    header("Location: index.php?pagina=inicio"); // Redireccionar al inicio si no es maestro ni admin
    exit();
}
?>

<?php

if (isset($_GET["id"])) {

    $item = "id";
    $valor = $_GET["id"];


    $usuario = ControladorFormulariosMaestros::ctrSeleccionarCursoBuscar($valor);
    if (!isset($_SESSION['numero_control']) || $_SESSION['numero_control'] !== $usuario['numero_control_profesor']) {
        header("Location: index.php?pagina=inicio"); // Redireccionar al inicio si no coincide el número de control
        exit();
    }
}

?>
 
            <div class="container-xxl py-2">
    <div class="container">
        <section class="h-100 h-custom" style="background-color: #1b396a;" data-wow-delay="0.1s">
            <div class="container py-2 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-lg-8 col-xl-12">
                        <div class="card rounded-3">
                            <div class="container-xxl py-10">
                                <div class="container">
                                    <h4 class="mb-2 pb-2 pb-md-0 mb-md-2 px-md-2">Editar Taller o Conferencia</h4>


                                    <form class="px-md-2" style="color: #1b396a;" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="titulo" style="font-weight: bold; color: #1b396a;">Título</label>
                                                    <input type="text" class="form-control border border-primary" id="titulo" value="<?php echo $usuario["titulo"]; ?>" name="titulo" required oninput="this.value = this.value.toUpperCase()">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="numero_control_profesor" style="font-weight: bold; color: #1b396a;">Clave del Profesor</label>
                                                    <input type="text" class="form-control border border-primary" id="numero_control_profesor" name="numero_control_profesor" readonly value="<?php echo $_SESSION['numero_control']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="nombre_profesor" style="font-weight: bold; color: #1b396a;">Nombre del Profesor</label>
                                                    <input type="text" class="form-control border border-primary" id="nombre_profesor" name="nombre_profesor" readonly value="<?php echo $_SESSION['nombre']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="aula" style="font-weight: bold; color: #1b396a;">Aula</label>
                                                    <input type="text" class="form-control" id="aula" value="<?php echo $usuario["aula"]; ?>" name="aula" required oninput="this.value = this.value.toUpperCase()">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="tipo" style="font-weight: bold; color: #1b396a;">Tipo</label>
                                                    <select class="form-control" id="tipo" name="tipo" required>
                                                        <option value="TALLER">Taller</option>
                                                        <option value="CONFERENCIA">Conferencia</option>
                                                        <!-- Agrega más opciones según sea necesario -->
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="souvenir" style="font-weight: bold; color: #1b396a;">Souvenir</label>
                                                    <input type="text" class="form-control border border-primary" id="souvenir" value="<?php echo $usuario["souvenir"]; ?>" name="souvenir" required oninput="this.value = this.value.toUpperCase()">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="cooperacion" style="font-weight: bold; color: #1b396a;">Cooperación</label>
                                                    <div class="input-group">
                                                    <input type="number" class="form-control" id="precio" value="<?php echo $usuario["precio"]; ?>" name="precio" required oninput="this.value = this.value.toUpperCase()">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">$</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="hora_inicio" style="font-weight: bold; color: #1b396a;">Hora inicial</label>
                                                    <input class="form-control" type="time" id="hora_inicio" name="hora_inicio" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="hora_fin" style="font-weight: bold; color: #1b396a;">Hora final</label>
                                                    <input class="form-control" type="time" id="hora_fin" name="hora_fin" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="fecha" style="font-weight: bold; color: #1b396a;">Fecha inicial</label>
                                                    <input type="date" class="form-control" id="fecha" name="fecha" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="fechafinal" style="font-weight: bold; color: #1b396a;">Fecha final</label>
                                                    <input type="date" class="form-control" id="fechafinal" name="fechafinal" required>
                                                </div>
                                            </div>


                                        </div>

                                        <div class="row">

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="pdf_descripcion" style="font-weight: bold; color: #1b396a;">Subir archivo Temario</label>
                                                    <input type="file" class="form-control-file" id="pdf_descripcion" name="pdf_descripcion" accept=".pdf" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="archivo" style="font-weight: bold; color: #1b396a;">Imagen Representativa</label>
                                                <input type="file" class="form-control-file" id="archivo" name="imagen" accept=".jpg" required>
                                            </div>
                                        </div>

                                        <button type="submit" name="submit" class="btn btn-primary rounded-pill py-lg-2 px-lg-4" style="display: block; margin: auto; max-width: 100%;">Enviar información</button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<?php
// ...

if (isset($_POST['submit'])) {


    $id_curso =  $usuario["id_curso"];
    $registro = ControladorFormulariosMaestros::ctrEditarCurso($id_curso);

    if ($registro == "Curso registrado correctamente.") {
        echo '<script>
                if (window.history.replaceState) {
                    window.history.replaceState(null, null, window.location.href);
                }
            </script>';

        echo '<script>alert("¡Registro exitoso!"); window.location.href ="index.php?pagina=MaestroEspacio";</script>';
    } else {

        echo '<script>alert' . $registro . '</script>';
    }
}

// ...
?>


<script>
    function validarFechas() {
        var fechaInicial = new Date(document.getElementById('fecha').value);
        var fechaFinal = new Date(document.getElementById('fechafinal').value);

        if (fechaFinal < fechaInicial) {
            alert('La fecha final debe ser posterior a la fecha inicial');
            return false;
        }

        return true;
    }

    document.querySelector('form').addEventListener('submit', function(event) {
        if (!validarFechas()) {
            event.preventDefault();
        }
    });
</script>