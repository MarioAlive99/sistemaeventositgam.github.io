
<!-- Project Start -->

<?php
 $carrusel = ControladorFormulariosPagos::ctrSeleccionarCarrusel();

 $a = $carrusel["A"] . '?v=' . time(); // Agregar el parámetro de versión a la URL de la imagen
 $b = $carrusel["B"] . '?v=' . time();
 $c = $carrusel["C"] . '?v=' . time();
 $d = $carrusel["D"] . '?v=' . time();
 $e = $carrusel["E"] . '?v=' . time();
 $f = $carrusel["F"] . '?v=' . time();
 $g = $carrusel["G"] . '?v=' . time();
 $h = $carrusel["H"] . '?v=' . time();
?>
<div class="container-xxl pt-5">
    <div class="container">
    <div class="d-flex align-items-center">
        <div>
            <img src="./vistas/img/logo.png" alt="Imagen del evento" class="img-fluid mr-3" style="max-width: 200px; height: auto;">
        </div>
        <div>
            <h3 class="display-7 mb-6">Nuestros próximos eventos</h3>
        </div>
    </div>    
   
         
        <div class="owl-carousel project-carousel wow fadeInUp" data-wow-delay="0.1s">
            <div class="project-item mb-5">
                <div class="position-relative">
                    <img class="img-fluid"  src="<?php echo $a;?>" alt="">
                    <div class="project-overlay">
                        <a class="btn btn-lg-square btn-light rounded-circle m-1" href="<?php echo $a;?>" data-lightbox="project"><i class="fa fa-eye"></i></a>

                    </div>
                </div>

            </div>
            <div class="project-item mb-5">
                <div class="position-relative">
                    <img class="img-fluid" src="<?php echo $b;?>" alt="">
                    <div class="project-overlay">
                        <a class="btn btn-lg-square btn-light rounded-circle m-1" href="<?php echo $b;?>" data-lightbox="project"><i class="fa fa-eye"></i></a>
                        <a class="btn btn-lg-square btn-light rounded-circle m-1" href=""><i class="fa fa-link"></i></a>
                    </div>
                </div>
 
            </div>
            <div class="project-item mb-5">
                <div class="position-relative">
                    <img class="img-fluid" src="<?php echo $c;?>" alt="">
                    <div class="project-overlay">
                        <a class="btn btn-lg-square btn-light rounded-circle m-1" href="<?php echo $c;?>" data-lightbox="project"><i class="fa fa-eye"></i></a>
                        <a class="btn btn-lg-square btn-light rounded-circle m-1" href=""><i class="fa fa-link"></i></a>
                    </div>
                </div>

            </div>
            <div class="project-item mb-5">
                <div class="position-relative">
                    <img class="img-fluid" src="<?php echo $d;?>" alt="">
                    <div class="project-overlay">
                        <a class="btn btn-lg-square btn-light rounded-circle m-1" href="<?php echo $d;?>" data-lightbox="project"><i class="fa fa-eye"></i></a>

                    </div>
                </div>

            </div>
            <div class="project-item mb-5">
                <div class="position-relative">
                    <img class="img-fluid" src="<?php echo $e;?>" alt="">
                    <div class="project-overlay">
                        <a class="btn btn-lg-square btn-light rounded-circle m-1" href="<?php echo $e;?>" data-lightbox="project"><i class="fa fa-eye"></i></a>

                    </div>
                </div>
    
            </div>
            <div class="project-item mb-5">
                <div class="position-relative">
                    <img class="img-fluid" src="<?php echo $f;?>" alt="">
                    <div class="project-overlay">
                        <a class="btn btn-lg-square btn-light rounded-circle m-1" href="<?php echo $f;?>" data-lightbox="project"><i class="fa fa-eye"></i></a>

                    </div>
                </div>
    
            </div>

            <div class="project-item mb-5">
                <div class="position-relative">
                    <img class="img-fluid" src="<?php echo $g;?>" alt="">
                    <div class="project-overlay">
                        <a class="btn btn-lg-square btn-light rounded-circle m-1" href="<?php echo $g;?>" data-lightbox="project"><i class="fa fa-eye"></i></a>

                    </div>
                </div>
    
            </div>
            <div class="project-item mb-5">
                <div class="position-relative">
                    <img class="img-fluid" src="<?php echo $h;?>" alt="">
                    <div class="project-overlay">
                        <a class="btn btn-lg-square btn-light rounded-circle m-1" href="<?php echo $h;?>" data-lightbox="project"><i class="fa fa-eye"></i></a>

                    </div>
                </div>
    
            </div>
        </div>
    </div>
</div>
<!-- Project End -->






<!-- Features Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-0 feature-row">
            <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.1s">
                <div class="feature-item border h-100 p-5">
                    <div class="btn-square bg-light rounded-circle mb-4" style="width: 64px; height: 64px;">
                        <img class="img-fluid" src="./vistas/img/icon/icon-1.png" alt="Icon">
                    </div>
                    <h5 class="mb-3">Tu nos interesas</h5>
                    <p class="mb-0">En el ITGAM estamos comprometidos en brindarte eventos de gran calidad</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.3s">
                <div class="feature-item border h-100 p-5">
                    <div class="btn-square bg-light rounded-circle mb-4" style="width: 64px; height: 64px;">
                        <img class="img-fluid" src="./vistas/img/icon/icon-2.png" alt="Icon">
                    </div>
                    <h5 class="mb-3">Profesionales</h5>
                    <p class="mb-0">Los mejores conferencistas e instructores para brindarte la mejor experiencia de aprendizaje. </p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.5s">
                <div class="feature-item border h-100 p-5">
                    <div class="btn-square bg-light rounded-circle mb-4" style="width: 64px; height: 64px;">
                        <img class="img-fluid" src="./vistas/img/icon/icon-3.png" alt="Icon">
                    </div>
                    <h5 class="mb-3">Gracias por tu pago</h5>
                    <p class="mb-0">Tu contribución es muy apreciada y esperamos que disfrutes de nuestro talleres y conferencias.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.7s">
                <div class="feature-item border h-100 p-5">
                    <div class="btn-square bg-light rounded-circle mb-4" style="width: 64px; height: 64px;">
                        <img class="img-fluid" src="./vistas/img/icon/icon-4.png" alt="Icon">
                    </div>
                    <h5 class="mb-3">En camino del aprendizaje</h5>
                    <p class="mb-0">Aprovecha al máximo tu experiencia de aprendizaje talleres especializados y grandes conferencias</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Features End -->



<!-- About Start -->
<div class="container-xxl about my-5">
    <div class="container">
        <div class="row g-0">
            <div class="col-lg-6">
                <div class="h-100 d-flex align-items-center justify-content-center" style="min-height: 300px;">
                    <button type="button" class="btn-play" data-bs-toggle="modal" data-src="https://www.youtube.com/embed/zwui433EmSA" data-bs-target="#videoModal">
                        <span></span>
                    </button>
                </div>
            </div>
            <div class="col-lg-6 pt-lg-5 wow fadeIn" data-wow-delay="0.5s">
                <div class="bg-white rounded-top p-5 mt-lg-5">
                    <p class="fs-5 fw-medium text-primary">INSTITUTO TECNOLÓGICO DE GUSTAVO A. MADERO</p>
                    <h1 class="display-6 mb-4">Formando los líderes del futuro</h1>
                    <p class="mb-4">Ofrecemos una educación especializada en áreas tecnológicas, científicas y de ingeniería para preparar
                        a los estudiantes para una carrera en el mundo digital en constante evolución.</p>
                    <div class="row g-5 pt-2 mb-5">
                        <div class="col-sm-6">
                            <img class="img-fluid mb-4" src="./vistas/img/icon/icon-5.png" alt="">
                            <h5 class="mb-3">Eventos, Talleres y Conferencias</h5>
                            <span>Fomentamos el aprendizaje tecnológico construyendo pensamientos criticos y creativos</span>
                        </div>
                        <div class="col-sm-6">
                            <img class="img-fluid mb-4" src="./vistas/img/icon/icon-2.png" alt="">
                            <h5 class="mb-3">Expertos dedicados</h5>
                            <span>Preparar a nuestros estudiantes para el mundo tecnológico en constante evolución </span>
                        </div>
                    </div>
                    <a class="btn btn-primary rounded-pill py-3 px-5" href="index.php?pagina=talleres">Inscribete a los talleres y conferencias</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->


<!-- Video Modal Start -->
<div class="modal modal-video fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Youtube Video</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- 16:9 aspect ratio -->
                <div class="ratio ratio-16x9">
                    <iframe class="embed-responsive-item" src="" id="video" allowfullscreen allowscriptaccess="always" allow="autoplay"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Video Modal End -->



<!-- Team Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">

            <h1 class="display-5 mb-5">"Contamos con las mejores enseñanzas tecnológicas para ofrecer una educación de calidad y formar a nuestros estudiantes como líderes en su área."</h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item rounded overflow-hidden pb-4">
                    <img class="img-fluid mb-4" src="./vistas/img/team-1.jpg" alt="">
                    <h5>SQL</h5>
                  
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="team-item rounded overflow-hidden pb-4">
                    <img class="img-fluid mb-4" src="./vistas/img/team-2.jpg" alt="">
                    <h5>CCNA</h5>
                   

                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="team-item rounded overflow-hidden pb-4">
                    <img class="img-fluid mb-4" src="./vistas/img/team-3.jpg" alt="">
                    <h5>CODEIGNITER</h5>
                   

                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                <div class="team-item rounded overflow-hidden pb-4">
                    <img class="img-fluid mb-4" src="./vistas/img/team-4.jpg" alt="">
                    <h5>VUE</h5>
                  

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Team End -->