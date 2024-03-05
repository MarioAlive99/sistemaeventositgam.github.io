   
   <?php
// Verificar si la sesión está activa
if (isset($_SESSION["validarIngreso"]) && $_SESSION["validarIngreso"] == "ok") {
  header("Location: index.php?pagina=inicio"); // Redirigir a la página de inicio
  exit; // Detener la ejecución del script después de la redirección
}
?>
   <!-- Quote Start -->
    <div class="container-xxl py-1">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-11 wow fadeInUp" data-wow-delay="0.1s">
    <section class="vh-100">
        <div class="container-fluid data-wow-delay="0.1s">
          <div class="row">
            <div class="col-sm-6 text-black">
      
              <div class="px-5 ms-xl-4">
                <img src="./vistas/img/logo.png" alt="Texto alternativo de la imagen" style="max-width:50%; height:auto;">
            
              </div>
      
              <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-4 pt-5 pt-xl-0 mt-xl-n5" style="margin-bottom: 15px;">
      
                <form style="width: 23rem;" method="post">
      
                  <h3 class="fw-normal mb-1 pb-1" style="letter-spacing: 1px;">Iniciar Sesión</h3>
      
                  <div class="form-outline mb-4">
                    <input type="email" id="form2Example18" class="form-control form-control-lg" name="ingresoCorreo" required />
                    <label class="form-label" for="form2Example18">Correo Electrónico</label>
                  </div>
      
                  <div class="form-outline mb-4">
                    <input type="password" id="form2Example28" class="form-control form-control-lg" name="ingresoPassword" required/>
                    <label class="form-label" for="form2Example28">Password</label>
                  </div>
      
                  <div class="pt-1 mb-4">
                    <button class="btn btn-primary rounded-pill py-2 px-5" name="submitLogin">Ingresar</button>
                  </div>
      
                  <p class="small mb-5 pb-lg-2"><a class="text-muted" href="#!" onclick="mostrarAlerta()">¿Olvidaste tu password?</a></p>
                 
      
                </form>
      
              </div>
      
            </div>
            <div class="col-sm-6 px-0 d-none d-sm-block">
              <img src="./vistas/img/img3.jpg"
                alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
            </div>
          </div>
        </div>
      </section>

      </div>
      </div>
      </div>
      </div>


<?php
if (isset($_POST['submitLogin'])) {
		$ingreso = new ControladorFormularios();
		$ingreso->ctrIngreso();
}
		?>

<script>
    function mostrarAlerta() {
        alert('Por favor, acuda con el administrador de la página en Control Escolar');
    }
</script>