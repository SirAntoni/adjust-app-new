<?php 

session_start();

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?php echo $_SESSION['razon_social'] ?> <?php echo date('Y') ?></title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.css'>
    <link rel="stylesheet" href="./css/isotope.css">
</head>

<body id="page-top" class='bg-black'>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#page-top"><img src="./assets/img/Logo-ADJUSTAPP.png" alt=""></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#page-top">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">Nosotros</a></li>
                    <li class="nav-item"><a class="nav-link" href="#galeria">Galeria</a></li>
                    <li class="nav-item"><a class="nav-link" href="#signup">Contacto</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
            <div class="d-flex justify-content-center">
                <div class="text-center">
                    
                    <h2 class="text-white-50 mx-auto  mb-5">Lorem ipsum, dolor sit amet consectetur adipisicing
                        elit. Reprehenderit.</h2>
                    <a class="btn btn-primary" href="#about">Conocenos</a>
                </div>
            </div>
        </div>
    </header>
    <!-- About-->
    <!-- Projects-->
    <section class="projects-section bg-black" id="about">
        <div class="container px-4 px-lg-5">
            <!-- Featured Project Row-->
            <div class="row gx-0 mb-4 mb-lg-5 align-items-center">
                <div class="col-xl-8 col-lg-7"><img class="img-fluid mb-3 mb-lg-0" src="assets/img/nosotros.jpg"
                        alt="..." /></div>
                <div class="col-xl-4 col-lg-5">
                    <div class="featured-text text-center text-lg-left">
                        <h4 class='text-white' >Nosotros</h4>
                        <p class="text-white mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Repellendus esse quaerat doloremque corrupti, aperiam, sunt tenetur iusto ut sed aliquid
                            nihil, quo similique quia labore. Dignissimos provident voluptates animi vel!</p>
                    </div>
                </div>
            </div>
            <!-- Project One Row-->
            <div class="row gx-0 mb-5 mb-lg-0 justify-content-center">
                <div class="col-lg-6"><img class="img-fluid" src="assets/img/mision.jpg" alt="..." /></div>
                <div class="col-lg-6">
                    <div class="bg-black text-center h-100 project">
                        <div class="d-flex h-100">
                            <div class="project-text w-100 my-auto text-center text-lg-left">
                                <h4 class="text-white">Mision</h4>
                                <p class="mb-0 text-white-50">Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                                    Itaque molestiae ea eveniet natus esse ex ratione corrupti. Atque, incidunt dolorem.
                                    Cumque culpa pariatur dolores quia eius repellat enim doloremque dolorem!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Project Two Row-->
            <div class="row gx-0 justify-content-center">
                <div class="col-lg-6"><img class="img-fluid" src="assets/img/vision.jpg" alt="..." /></div>
                <div class="col-lg-6 order-lg-first">
                    <div class="bg-black text-center h-100 project">
                        <div class="d-flex h-100">
                            <div class="project-text w-100 my-auto text-center text-lg-right">
                                <h4 class="text-white">Vision</h4>
                                <p class="mb-0 text-white-50">Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                                    Ad cum suscipit expedita blanditiis autem itaque, optio architecto at quod. Quasi
                                    quia velit ullam natus, amet saepe! Accusamus facilis repellat quasi.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="galeria-section bg-black" id="galeria">
        <div class="container px-4 px-lg-5">
            <!-- Featured Project Row-->
            <div class="row gx-0 mb-4 mb-lg-5 align-items-center text-center">
                <h1 class='text-white'>Galeria</h1>

                <section class="section">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="text-center">
                                    <ul class="col  container-filter portfolioFilte list-unstyled mb-0" id="filter">
                                        <li><a class="categories text-white active" data-filter="*">Todo</a></li>
                                        <li><a class="categories text-white" data-filter=".branding">Aros</a></li>
                                        <li><a class="categories text-white" data-filter=".design">Faros</a></li>
                                        <li><a class="categories text-white" data-filter=".photo">Neumaticos</a></li>
                                        <li><a class="categories text-white" data-filter=".coffee">Parachoques</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="port portfolio-masonry mt-4">
                            <div class="portfolioContainer row photo">
                                <div class="col-lg-4 p-4 ">
                                    <div class="item-box">
                                        <a class="mfp-image" href="https://www.bootdey.com/image/800x540/D3D3D3/000000"
                                            title="Project Name">
                                            <img class="item-container img-fluid"
                                                src="https://www.bootdey.com/image/800x540/D3D3D3/000000"
                                                alt="work-img">
                                            <div class="item-mask">
                                                <div class="item-caption">
                                                    <p class="text-dark mb-0">Branding</p>
                                                    <h6 class="text-dark mt-1 text-uppercase">Nonsensical content</h6>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-lg-4 p-4 branding coffee">
                                    <div class="item-box">
                                        <a class="mfp-image" href="https://www.bootdey.com/image/800x540/D3D3D3/000000"
                                            title="Project Name">
                                            <img class="item-container img-fluid"
                                                src="https://www.bootdey.com/image/800x540/D3D3D3/000000"
                                                alt="work-img">
                                            <div class="item-mask">
                                                <div class="item-caption">
                                                    <p class="text-dark mb-0">Coffee</p>
                                                    <h6 class="text-dark mt-1 text-uppercase">PageMaker including</h6>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-lg-4 p-4 branding photo">
                                    <div class="item-box">
                                        <a class="mfp-image" href="https://www.bootdey.com/image/800x540/D3D3D3/000000"
                                            title="Project Name">
                                            <img class="item-container img-fluid"
                                                src="https://www.bootdey.com/image/800x540/D3D3D3/000000"
                                                alt="work-img">
                                            <div class="item-mask">
                                                <div class="item-caption">
                                                    <p class="text-dark mb-0">Lebles</p>
                                                    <h6 class="text-dark mt-1 text-uppercase">Sometime Active</h6>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-lg-4 p-4 branding design photo">
                                    <div class="item-box">
                                        <a class="mfp-image" href="https://www.bootdey.com/image/800x540/D3D3D3/000000"
                                            title="Project Name">
                                            <img class="item-container img-fluid"
                                                src="https://www.bootdey.com/image/800x540/D3D3D3/000000"
                                                alt="work-img">
                                            <div class="item-mask">
                                                <div class="item-caption">
                                                    <p class="text-dark mb-0">Card</p>
                                                    <h6 class="text-dark mt-1 text-uppercase">Therefore Always</h6>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-lg-4 p-4 design photo">
                                    <div class="item-box">
                                        <a class="mfp-image" href="https://www.bootdey.com/image/800x540/D3D3D3/000000"
                                            title="Project Name">
                                            <img class="item-container img-fluid"
                                                src="https://www.bootdey.com/image/800x540/D3D3D3/000000"
                                                alt="work-img">
                                            <div class="item-mask">
                                                <div class="item-caption">
                                                    <p class="text-dark mb-0">Pepers</p>
                                                    <h6 class="text-dark mt-1 text-uppercase">Therefore Always</h6>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-lg-4 p-4 branding design coffee">
                                    <div class="item-box">
                                        <a class="mfp-image" href="https://www.bootdey.com/image/800x540/D3D3D3/000000"
                                            title="Project Name">
                                            <img class="item-container img-fluid"
                                                src="https://www.bootdey.com/image/800x540/D3D3D3/000000"
                                                alt="work-img">
                                            <div class="item-mask">
                                                <div class="item-caption">
                                                    <p class="text-dark mb-0">Bottle</p>
                                                    <h6 class="text-dark mt-1 text-uppercase">Therefore Always</h6>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-lg-4 p-4 branding design">
                                    <div class="item-box">
                                        <a class="mfp-image" href="https://www.bootdey.com/image/800x540/D3D3D3/000000"
                                            title="Project Name">
                                            <img class="item-container img-fluid"
                                                src="https://www.bootdey.com/image/800x540/D3D3D3/000000"
                                                alt="work-img">
                                            <div class="item-mask">
                                                <div class="item-caption">
                                                    <p class="text-dark mb-0">Watch</p>
                                                    <h6 class="text-dark mt-1 text-uppercase">Sometime Active</h6>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-lg-4 p-4 branding design photo coffee">
                                    <div class="item-box">
                                        <a class="mfp-image" href="https://www.bootdey.com/image/800x540/D3D3D3/000000"
                                            title="Project Name">
                                            <img class="item-container img-fluid"
                                                src="https://www.bootdey.com/image/800x540/D3D3D3/000000"
                                                alt="work-img">
                                            <div class="item-mask">
                                                <div class="item-caption">
                                                    <p class="text-dark mb-0">Milk</p>
                                                    <h6 class="text-dark mt-1 text-uppercase">Sometime Active</h6>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-lg-4 p-4 branding design photo coffee">
                                    <div class="item-box">
                                        <a class="mfp-image" href="https://www.bootdey.com/image/800x540/D3D3D3/000000"
                                            title="Project Name">
                                            <img class="item-container img-fluid"
                                                src="https://www.bootdey.com/image/800x540/D3D3D3/000000"
                                                alt="work-img">
                                            <div class="item-mask">
                                                <div class="item-caption">
                                                    <p class="text-dark mb-0">Milk</p>
                                                    <h6 class="text-dark mt-1 text-uppercase">Sometime Active</h6>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </section>
    <!-- Signup-->
    <section class="signup-section" id="signup">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5">
                <div class="col-md-10 col-lg-8 mx-auto text-center">
                    <i class="far fa-paper-plane fa-2x mb-2 text-white"></i>
                    <h2 class="text-white mb-5">Envianos tu email para contactarte!</h2>
                    <!-- * * * * * * * * * * * * * * *-->
                    <!-- * * SB Forms Contact Form * *-->
                    <!-- * * * * * * * * * * * * * * *-->
                    <!-- This form is pre-integrated with SB Forms.-->
                    <!-- To make this form functional, sign up at-->
                    <!-- https://startbootstrap.com/solution/contact-forms-->
                    <!-- to get an API token!-->
                    <form class="form-signup" id="contactForm" data-sb-form-api-token="API_TOKEN">
                        <!-- Email address input-->
                        <div class="row input-group-newsletter">
                            <div class="col"><input class="form-control" id="emailAddress" type="email"
                                    placeholder="Ingresa tu email..." aria-label="Ingresa tu email..."
                                    data-sb-validations="required,email" /></div>
                            <div class="col-auto"><button class="btn btn-primary disabled" id="submitButton"
                                    type="submit">Contactame!</button></div>
                        </div>
                        <div class="invalid-feedback mt-2" data-sb-feedback="emailAddress:required">An email is
                            required.</div>
                        <div class="invalid-feedback mt-2" data-sb-feedback="emailAddress:email">Email is not valid.
                        </div>
                        <!-- Submit success message-->
                        <!---->
                        <!-- This is what your users will see when the form-->
                        <!-- has successfully submitted-->
                        <div class="d-none" id="submitSuccessMessage">
                            <div class="text-center mb-3 mt-2 text-white">
                                <div class="fw-bolder">Form submission successful!</div>
                                To activate this form, sign up at
                                <br />
                                <a
                                    href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                            </div>
                        </div>
                        <!-- Submit error message-->
                        <!---->
                        <!-- This is what your users will see when there is-->
                        <!-- an error submitting the form-->
                        <div class="d-none" id="submitErrorMessage">
                            <div class="text-center text-danger mb-3 mt-2">Error sending message!</div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact-->
    <section class="contact-section bg-black">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5">
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Direccion</h4>
                            <hr class="my-4 mx-auto" />
                            <div class="small text-black-50">4923 Market Street, Orlando FL</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-envelope text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Email</h4>
                            <hr class="my-4 mx-auto" />
                            <div class="small text-black-50"><a href="#!">hello@yourdomain.com</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-mobile-alt text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">telefono</h4>
                            <hr class="my-4 mx-auto" />
                            <div class="small text-black-50">+1 (555) 902-8832</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="social d-flex justify-content-center">
                <a class="mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                <a class="mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                <a class="mx-2" href="#!"><i class="fab fa-github"></i></a>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="footer bg-black small text-center text-white-50">
        <div class="container px-4 px-lg-5">Copyright &copy; Realizado con la tecnologia de AdjustApp</div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    <script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js'></script>
    <script src="./js/isotope.js"></script>
</body>


</html>