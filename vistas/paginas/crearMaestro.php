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
										<h5>Registrar Maestro</h5>
									</div>
									<div class="col-md-3 mb-6">
										<img src="./vistas/img/logo.png" alt="logo" style="display:block; margin:auto; max-width:50%; height:auto; border-top-left-radius: .3rem; border-top-right-radius: .3rem;" class="w-100">
									</div>
								</div>
								<form class="px-md-2" style="color: #1b396a; margin: 0 auto;" method="post">
									<div class="row">

										<div class="col-md-3 mb-6">
											<div class="form-outline">
												<input type="text" id="form3Example1q" class="form-control" name="numero_control" required oninput="this.value = this.value.toUpperCase()" focus />
												<label class="form-label" for="form3Example1q">Clave del Profesor</label>
											</div>
										</div>
										<div class="col-md-4 mb-6">
											<div class="form-outline">
												<input type="text" id="form3Example1q" class="form-control" name="nombre" required oninput="this.value = this.value.toUpperCase()" />
												<label class="form-label" for="form3Example1q">Nombre Completo</label>
											</div>
										</div>


										<div class="col-md-2 mb-2">
											<select class="select" name="carrera" required>
												<option value="">---------</option>
												<option value="Ingeniería Ambiental">Ingeniería Ambiental</option>
												<option value="Ingeniería Industrial">Ingeniería Industrial</option>
												<option value="Ingenieria en Logística">Ingenieria en Logística</option>
												<option value="Ingeniería en Tecnologías de la Información y Comunicaciones">
													I. Tecnologías de la Información y Comunicaciones</option>
												<option value="Ing. en gestión empresarial">
													Ing. en gestión empresarial</option>
											</select>
											<label class="form-label" for="form3Example1q">Carrera</label>

										</div>


										<div class="col-md-4">
											<div class="form-outline mb-4">
												<input type="email" id="form3Example1q" class="form-control" name="correo" required />
												<label class="form-label" for="form3Example1q">Correo electrónico</label>
											</div>
										</div>

										<div class="col-md-4">
											<div class="form-outline mb-4">
												<input type="password" class="form-control" id="password" name="password" required />
												<label class="form-label" for="form3Example1q">Contraseña</label>
											</div>
										</div>

										<div class="col-md-4">
											<div class="form-outline mb-4">
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

									<button type="submit" name="submit" class="btn btn-primary rounded-pill py-lg-2 px-lg-4" style="display: block; margin: auto; max-width: 100%;">Enviar información</button>
									<div></div>
									<?php
									// ...

									if (isset($_POST['submit'])) {
										$registro = ControladorFormularios::ctrRegistroMaestro();

										if ($registro == "Registro Exitoso") {
											echo '<script>
											if (window.history.replaceState) {
												window.history.replaceState(null, null, window.location.href);
											}
											alert("Registro exitoso");
											window.location.href = "index.php?pagina=AdminAreaMaestros";
										</script>';
										} else {
											echo '<div class="alert alert-danger">' . $registro . '</div>';
										}
									}

									// ...
									?>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>