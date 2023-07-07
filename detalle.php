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

    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">

    <style>
    body {
        background: url(assets/images/bg/bg-video.jpg);
        background-size: cover;
        background-repeat: no-repeat;
        margin: 0;
    }

    .auto {
        background: #FFF;
    }

    .img-wrap {
        width: 40%;
        margin: auto;
        background: #FFF;
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
        border-right: 1px solid #fff;
        justify-content: center;
        border-radius: 0px 0px 0px 10px;

    }

    .categorias {
        padding: 0;
        background: #ccc;
    }

    .select_accesorios {
        padding: 0;
        background: #ccc;

    }

    .titulo_categoria {
        background: #1c1c1c;
        height: 60px;
        color: #FFF;
        display: flex;
        align-items: center;
        justify-content: center;
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
        width: 200px;
        /* half-width */
        height: 150px;
        margin-right: 10px;
    }

    .carousel-cell img {
        width: 200px;
        height: 150px;
    }

    .auto{
        height: 300px !important;
    }


    @media (max-width : 780px) {
        .color img {
            width: 20px;
        }

        .auto{
        height: 200px !important;
    }


        .accesorio {
            border-right: 0px solid !important;
        }

        .app {
            width: 100%;
        }

        .img-wrap {
            width: 60%;
        }
    }
    </style>
    <style>

    </style>


</head>

<body>


    <div class="container">

        <div class="app">
            <div class="row">
                <div class="col-md-12 nombre_auto">
                    <h3 id='detalle_nombre_auto'>[NOMBRE AUTO]</h3>
                </div>
                <div class="col-md-12 auto">
                    <div id='auto360' class="img-wrap" >
                        <div id="circlrDiv">


                        </div>
                    </div>
                </div>
                <div id='detalle_colores' class="col-md-12 colores">
                </div>
                <div class="col-md-12 titulo_categoria">
                    Seleccione una categoria
                </div>
                <div class="col-md-12 categorias">
                    <div id="carousel_categorias" class="carousel_categorias">
                       
                        
                    </div>
                </div>
                <div id="autoparte_seccion_titulo" class="col-md-12 titulo_categoria select_accesorios d-none">
                    Seleccione un accesorio
                </div>
                <div id="autoparte_seccion_contenido" class="col-md-12 select_accesorios d-none">
                    <div id="carousel_autopartes" class="carousel_autopartes">
                      

                            <div class="carousel-cell"><img src="assets/images/body_kits.jpeg" alt=""></div>
                            <div class="carousel-cell"><img src="assets/images/fr_bumper.jpeg" alt=""></div>
                            <div class="carousel-cell"><img src="assets/images/fr_wheels.jpeg" alt=""></div>
            
                    </div>
                </div>
                <div class="col-md-8">
                    <div id="carousel_accesorios" class="carousel_accesorios">

                    </div>
                </div>
                <div id='accesorio' class="col-md-6 accesorio">
                    Seleccione un accesorio
                </div>
                <div  class="col-md-6 stock">
                    <span id='stock'>Seleccione un accesorio</span>
                </div>
            </div>
        </div>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"
        integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous">
    </script>
    

    <script src="assets/js/circlr.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>

    <script>

    $(function() {
        $('[data-toggle="tooltip"]').tooltip();
    })
    </script>
</body>

</html>