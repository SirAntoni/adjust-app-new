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
    <title>HOME</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css<?php echo date('ymdsis') ?>" rel="stylesheet" />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.css'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <style>
    .masthead {
        position: relative;
        width: 100%;
        height: auto;
        min-height: 35rem;
        padding: 15rem 0;
        /* background: linear-gradient(to bottom, rgba(0, 0, 0, 0.3) 0%, rgba(0, 0, 0, 0.7) 75%, #000 100%), url("./assets/images/bg/"); */
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: scroll;
        background-size: cover;
    }

    .cont-multichat {
        width: 70px;
        bottom: 10px;
        right: 16px;
        position: fixed;
        z-index: 1000
    }

    .cont-multichat a {
        width: 70px;
        height: 70px;
        margin-bottom: 10px;
        display: block;
        box-shadow: 0 0 1px #999;
        border-radius: 50%;
        background: #fff;
        color: #fff
    }

    .cont-multichat img {
        width: 70px;
    }

    #filter {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
    }

    #filter li {
        margin: 10px;
        cursor: pointer;
    }


    .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #fff;

        /* Center slide text vertically */
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
    }

    .swiper-slide img {
        max-width: 300px;
        max-height: 300x;
    }

    #btnConocenos {
        margin-right: 30px;
        margin-bottom: 0px;
    }

    @media (max-width : 390px) {


        #btnConocenos {
            margin-right: 0;
            margin-bottom: 10px;
        }

    }
    </style>
</head>

<body id="page-top" class='bg-black'>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" id='webLogo' href="#page-top"></a>
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
                    <li class="nav-item"><a id='organizador' class="nav-link" href="organizador">Productos</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
            <div class="d-flex justify-content-center">
                <div class="text-center">

                    <h2 id='webSlogan' class="text-white-50 mx-auto  mb-5">Lorem ipsum, dolor sit amet consectetur
                        adipisicing
                        elit. Reprehenderit.</h2>
                    <a class="btn btn-primary" id="btnConocenos" href="#about">Conocenos</a>
                    <a class="btn btn-primary" id='productos' href="organizador">Productos</a>
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
                <div class="col-xl-8 col-lg-7" id='webNosotrosImg'></div>
                <div class="col-xl-4 col-lg-5">
                    <div class="featured-text text-center text-lg-left">
                        <h4 class='text-white'>Nosotros</h4>
                        <p class="text-white mb-0" id='webNosotros'>Lorem ipsum dolor sit amet consectetur adipisicing
                            elit.
                            Repellendus esse quaerat doloremque corrupti, aperiam, sunt tenetur iusto ut sed aliquid
                            nihil, quo similique quia labore. Dignissimos provident voluptates animi vel!</p>
                    </div>
                </div>
            </div>
            <!-- Project One Row-->
            <div class="row gx-0 mb-5 mb-lg-0 justify-content-center">
                <div class="col-lg-6" id='webMisionImg'></div>
                <div class="col-lg-6">
                    <div class="bg-black text-center h-100 project">
                        <div class="d-flex h-100">
                            <div class="project-text w-100 my-auto text-center text-lg-left">
                                <h4 class="text-white">Mision</h4>
                                <p class="mb-0 text-white" id='webMision'>Lorem ipsum, dolor sit amet consectetur
                                    adipisicing elit.
                                    Itaque molestiae ea eveniet natus esse ex ratione corrupti. Atque, incidunt dolorem.
                                    Cumque culpa pariatur dolores quia eius repellat enim doloremque dolorem!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Project Two Row-->
            <div class="row gx-0 justify-content-center">
                <div class="col-lg-6" id='webVisionImg'></div>
                <div class="col-lg-6 order-lg-first">
                    <div class="bg-black text-center h-100 project">
                        <div class="d-flex h-100">
                            <div class="project-text w-100 my-auto text-center text-lg-right">
                                <h4 class="text-white">Vision</h4>
                                <p class="mb-0 text-white" id='webVision'>Lorem, ipsum dolor sit amet consectetur
                                    adipisicing elit.
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
                                <div>
                                    <ul class="list-unstyled mb-0" id="filter">
                                        <li><a class="categories text-white" data-filter="*">Todo</a></li>
                                        <li><a class="categories text-white" data-filter=".branding">Aros</a></li>
                                        <li><a class="categories text-white" data-filter=".design">Faros</a></li>
                                        <li><a class="categories text-white" data-filter=".photo">Neumaticos</a></li>
                                        <li><a class="categories text-white" data-filter=".coffee">Parachoques</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="port portfolio-masonry mt-4">
                            <div id='imagenes' class="portfolioContainer row photo">




                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </section>
    <section class="contact-section bg-black">
        <div id='mapa'>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3901.8071829125565!2d-77.03999758860083!3d-12.056783842039627!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c8c6c76e03e5%3A0x3e12ff686b901453!2sReal%20Plaza%20Centro%20C%C3%ADvico!5e0!3m2!1ses-419!2spe!4v1697848059247!5m2!1ses-419!2spe"
                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>
    <!-- Signup-->
    <!--section class="signup-section" id="signup">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5">
                <div class="col-md-10 col-lg-8 mx-auto text-center">
                    <i class="far fa-paper-plane fa-2x mb-2 text-white"></i>
                    <h2 class="text-white mb-5">Envianos tu email para contactarte!</h2>
                    <form class="form-signup" id="contactForm" data-sb-form-api-token="API_TOKEN">
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
                        <div class="d-none" id="submitSuccessMessage">
                            <div class="text-center mb-3 mt-2 text-white">
                                <div class="fw-bolder">Form submission successful!</div>
                                To activate this form, sign up at
                                <br />
                                <a
                                    href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                            </div>
                        </div>
                        <div class="d-none" id="submitErrorMessage">
                            <div class="text-center text-danger mb-3 mt-2">Error sending message!</div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section-->

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
                            <div class="small text-black-50" id='webDireccion'>4923 Market Street, Orlando FL</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-envelope text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Email</h4>
                            <hr class="my-4 mx-auto" />
                            <div class="small text-black-50" id='webEmail'><a href="#!">hello@yourdomain.com</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-mobile-alt text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">telefono</h4>
                            <hr class="my-4 mx-auto" />
                            <div class="small text-black-50" id='webTelefono'>+1 (555) 902-8832</div>
                        </div>
                    </div>
                </div>
            </div>
            <div id='redes-sociales' class="social d-flex justify-content-center">

            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="footer bg-black small text-center text-white-50">
        <div class="container px-4 px-lg-5">Copyright &copy; Realizado con la tecnologia de AdjustApp</div>
    </footer>
    <div class="cont-multichat">

    </div>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>
    <script src="js/app.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>



</body>


</html>