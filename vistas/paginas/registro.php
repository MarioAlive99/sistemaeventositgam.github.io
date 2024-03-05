<?php
 // Verificar si la sesión está activa
if (isset($_SESSION["validarIngreso"]) && $_SESSION["validarIngreso"] == "ok") {
  header("Location: index.php?pagina=inicio"); // Redirigir a la página de inicio
  exit; // Detener la ejecución del script después de la redirección
}
?>
<div class="container-fluid py-2">
<div class="container">
    <!-- Footer Start -->
    <section class="h-100 d-flex justify-content-center align-items-center" style="background-color: #1b396a;">
        <div class="container py-3">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-xl-12">
                    <div class="card rounded-3">
                        
                        
                        <div class="card-body p-4 p-md-5">
                        <div class="row">
                        <div class="col-md-4 mb-3">
                            <h5  >Registra tu información</h5>
                            </div>
                            <div class="col-md-4 mb-3">
                            <img src="./vistas/img/logo.png" alt="logo" style="display:block; margin:auto; max-width:50%; height:auto; border-top-left-radius: .3rem; border-top-right-radius: .3rem;" class="w-100">
                            </div>
                        </div>
                            <form class="px-md-2" style="color: #1b396a; margin: 0 auto;" method="post">
                                    <div class="row">
                                        <div class="col-md-3 mb-4">
                                            <div class="form-outline">
                                                <input type="text" id="form3Example1q" class="form-control" name="numero_control" required oninput="this.value = this.value.toUpperCase()" focus />
                                                <label class="form-label" for="form3Example1q">Número de control</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-4">
                                            <div class="form-outline">
                                                <input type="text" id="form3Example1q" class="form-control" name="nombre" required oninput="this.value = this.value.toUpperCase()" />
                                                <label class="form-label" for="form3Example1q">Nombre Completo</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <div class="form-outline">
                                                <select class="select form-control" name="carrera">
                                                    <option value="">Carrera</option>
                                                    <option value="Ingeniería Ambiental">Ingeniería Ambiental</option>
                                                    <option value="Ingeniería Industrial">Ingeniería Industrial</option>
                                                    <option value="Ingenieria en Logística">Ingenieria en Logística</option>
                                                    <option value="Ingeniería en Tecnologías de la Información y Comunicaciones">Ing. Tecnologías de la Información y Comunicaciones</option>
                                                    <option value="Ing.en gestión empresarial">Ing.en gestión empresarial</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <div class="form-outline">
                                                <select class="select form-control" name="semestre">
                                                    <option value="">Semestre</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-4">
                                            <div class="form-outline">
                                                <input type="text" id="form3Example1w" class="form-control" name="grupo" required oninput="this.value = this.value.toUpperCase()" />
                                                <label class="form-label" for="form3Example1w">Grupo</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-4">
                                            <div class="form-outline">
                                                <input type="email" id="form3Example1q" class="form-control" name="correo" required />
                                                <label class="form-label" for="form3Example1q">Correo electrónico</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-4">
                                            <div class="form-outline">
                                                <input type="password" class="form-control" id="password" name="password" required />
                                                <label class="form-label" for="form3Example1q">Contraseña</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-4">
                                            <div class="form-outline">
                                                <input type="password" class="form-control" id="repetir-password" name="repetir_password" required />
                                                <label class="form-label" for="form3Example1q">Repetir contraseña</label>
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                                        var contrasena = document.getElementById("password");
                                        var repetirContrasena = document.getElementById("repetir-password");
                                        function validarContrasenas() {
                                        if (contrasena.value != repetirContrasena.value) {
                                            repetirContrasena.setCustomValidity("Las contraseñas no coinciden");
                                        } else {
                                            repetirContrasena.setCustomValidity("");
                                        }
                                    }

                                    contrasena.onchange = validarContrasenas;
                                    repetirContrasena.onkeyup = validarContrasenas;
                                </script>
                               <button type="submit" name="submit" class="btn btn-primary btn-lg rounded-pill py-lg-2">Registrarme</button>
									
									<?php
// ...

if (isset($_POST['submit'])) {
    $registro = ControladorFormularios::ctrRegistro();

    if ($registro == "Usuario registrado ingresa en el login") {
        echo '<script>
                if (window.history.replaceState) {
                    window.history.replaceState(null, null, window.location.href);
                }
                alert("Usuario registrado. Ingresa en el login.");
                window.location.href = "index.php?pagina=ingreso";
            </script>';
    } else {
        echo '<script>
                if (window.history.replaceState) {
                    window.history.replaceState(null, null, window.location.href);
                }
                alert("Error al registrar usuario: ' . $registro . '");
                window.location.href = "index.php?pagina=registro";
            </script>';
    }
}

// ...
?>							</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>