<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADJUST APP | GALERIA</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/808596313d.js" crossorigin="anonymous"></script>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">

    <style>
    body {
        /* background: url(assets/images/bg/ ?>); */
        background-size: cover;
        background-repeat: no-repeat;
        margin: 0;
    }

    .auto {
        background: #FFF;
    }

    #auto360 {
        width: 500px;
        margin: auto;
        background: #FFF;
        height: 300px;
    }

    .color img {
        width: 30px;
        border-radius: 50%;
        margin: 10px 5px;
        cursor: pointer;
    }

    .colores {
        display: flex;
        justify-content: center;
        background: #ccc;
    }

    .accesorio {
        background: #1c1c1c;
        height: 60px;
        color: #FFF;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 0px 0px 0px 10px;

    }

    .redes {
        background: #1c1c1c;
        height: 60px;
        color: #FFF;
        display: flex;
        align-items: center;
        justify-content: center;
        border-right: 1px solid #fff;
        border-left: 1px solid #fff;
    }

    .categorias {
        padding: 0;
        background: #ccc;
    }

    .select_accesorios {
        background: #ccc;

    }

    .titulo_categoria {
        background: #1c1c1c;
        height: 60px;
        color: #FFF;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .stock {
        background: #1c1c1c;
        height: 60px;
        color: #FFF;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 0px 0px 10px 0px;
    }

    .autopartes {
        padding: 0;
    }

    .nombre_auto {
        background: #1c1c1c;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 60px;
        color: #ffffff;
        border-radius: 10px 10px 0px 0px;
    }

    .app {
        margin: 40px auto;
        width: 100%;
    }

    .carousel-cell {
        display: flex;
        justify-content: center;
        flex-direction: column;
        background-color: #000;
        width: 200px;
        /* half-width */
        height: 200px;
        margin-right: 10px;
    }

    .carousel-cell img {
        height: 150px;
    }

    .social {
        color: #FFF;
        margin-right: 10px;
    }

    .fullScreen {
        margin: 8px 5px;
        font-size: 25px;
        cursor: pointer;
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

    .txtBusqueda{
        outline: none;
    }

    .btnBusqueda{
        border:none;
        color:black;
        padding: 3px 15px;
        cursor: pointer;
        border-radius: 5px;
        background-color: #e7e7e7;
        margin-left: 3px;
    }

    .btnBusqueda:hover{
        background: #ddd;
    }

    @media (max-width : 780px) {
        .color img {
            width: 20px;
        }

        #auto360 {
            width: 100%;
            height: 250px;
        }


        .accesorio {
            border-right: 0px solid !important;
        }

        .app {
            width: 100%;
        }

        .fullScreen {
            display: none;
        }


    }
    </style>
    <style>

    </style>


</head>

<body class='masthead-galeria'>


    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light fixed-top navbar-shrink" id="mainNav">
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
                        <li class="nav-item"><a class="nav-link" href="#" onclick='window.history.go(-1)'>Inicio</a></li>
                        <li class="nav-item"><a class="nav-link" href="#" onclick='window.history.go(-1)'>Nosotros</a></li>
                        <li class="nav-item"><a class="nav-link" href="#" onclick='window.history.go(-1)'>Galeria</a></li>
                        <li class="nav-item"><a class="nav-link" href="#" onclick='window.history.go(-1)'>Contacto</a></li>
                        <li class="nav-item"><a id='organizador' class="nav-link" href="organizador">Organizador</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="app" style='margin-top:120px'>
            <div class="row">
                <div class="col-md-12 nombre_auto">
                    <h3 id='detalle_nombre_auto'>[NOMBRE AUTO]</h3>
                </div>
                <div class="col-md-12 auto">
                    <div id='auto360' class="img-wrap">
                        <div id="circlrDiv">


                        </div>
                    </div>
                </div>
                <div id='detalle_colores' class="col-md-12 colores">
                </div>
                <div class="col-md-12 titulo_categoria">
                    Seleccione una categoria <div><input type='text' class='txtBusqueda' placeholder="Filtrar" id='textCategorias' /><input id='btnCategorias' type='button' value='Buscar' class='btnBusqueda' /><input class='btnBusqueda' id='btnResetCategorias' type='button' value='Reset'/></div>
                </div>
                <div class="col-md-12 categorias">
                    <div id="carousel_categorias" class="carousel_categorias">


                    </div>
                </div>
                <div id="autoparte_seccion_titulo" class="col-md-12 titulo_categoria select_accesorios d-none">
                    Seleccione un accesorio <div><input type='text' class='txtBusqueda' placeholder="Filtrar" id='textSubcategorias' /><input id='btnSubcategorias' type='button' value='Buscar' class='btnBusqueda' /><input class='btnBusqueda' id='btnResetSubcategorias' type='button' value='Reset'/></div>
                </div>
                <div id="autoparte_seccion_contenido" class="col-md-12 select_accesorios d-none">
                    <div id="carousel_autopartes" class="carousel_autopartes">
                        <div class="carousel-cell"><img src="assets/images/body_kits.jpeg" alt=""></div>
                        <div class="carousel-cell"><img src="assets/images/fr_bumper.jpeg" alt=""></div>
                        <div class="carousel-cell"><img src="assets/images/fr_wheels.jpeg" alt=""></div>
                    </div>
                </div>
                <div id="subautoparte_seccion_titulo" class="col-md-12 titulo_categoria select_accesorios d-none">
                    Seleccione un accesorio
                </div>
                <div id="subautoparte_seccion_contenido" class="col-md-12 select_accesorios d-none">
                    <div id="subcarousel_autopartes" class="subcarousel_autopartes">
                        <div class="carousel-cell"><img src="assets/images/body_kits.jpeg" alt=""></div>
                        <div class="carousel-cell"><img src="assets/images/fr_bumper.jpeg" alt=""></div>
                        <div class="carousel-cell"><img src="assets/images/fr_wheels.jpeg" alt=""></div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div id="carousel_accesorios" class="carousel_accesorios">
                    </div>
                </div>
                <div id='accesorio' class="col-md-4 accesorio">
                    Seleccione un accesorio
                </div>
                <div id='redes' class="col-md-4 redes">

                </div>
                <div class=" col-md-4 stock">
                    <span id='stock'>Seleccione un accesorio</span>
                </div>
            </div>
        </div>
    </div>

    <div class="cont-multichat">

    </div>



    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"
        integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous">
    </script>
    
    <script src="assets/js/circlr.min.js"></script>
    <script src="assets/js/main.js?code=<?php echo date('ymdsis') ?>"></script>
    <script src="js/app.js"></script>
    <script src="assets/js/notiflix.js"></script>
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip();
        cargar_logo();
    })

    const cargar_logo = function() {

        var url = new URL(window.location.href);
        var params = new URLSearchParams(url.search);

        $.ajax({
            url: 'administrador/controller/frontend.php',
            method: 'POST',
            data: {
                opcion: 'cargar_web',
                negocio: params.get('negocio')
            },
            success: function(response) {
                const data = JSON.parse(response);

                if (data.status === 'error') {
                    window.location = './';
                } else {

                    $("#webLogo").html(`<img width=200px' src="./assets/img/${data.logo}" alt="">`);
                }

            }
        })

    }

   
    </script>
</body>

</html>