<?php
session_start();

if(!isset($_SESSION['id'])){
    header('Location: ./');
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adjust App | HOME</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <style>
    body {
        background: url(assets/images/bg/bg-home.jpg);
        background-size: cover;
        background-repeat: no-repeat;
        margin: 0;
        height: 100vh;
    }

    #home {
        width: 55px;
        height: 55px;
        background: #2C3E50;
        cursor: pointer;
        position: absolute;
        top: 0;
        left: 0;
    }

    #home a {
        color: #fff;
    }


    .content {
        height: 90vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .content img {
        width: 350px;
        opacity: 0.9;
    }

    @media (max-width: 600px) {
        .opcion-home {
            width: 220px !important;
        }
    }

    div.codepen {
        display: flex;
        align-items: center;
        justify-content: center;
        display: block;
        height: 300px;
        width: 300px;
        border-radius: 50%;
        background-color: #121212;
        cursor: pointer;
        opacity: 0.8;
        transition: color 0.8s linear,
            background 0.8s linear,
            box-shadow 0.1s linear,
            transform 0.1s linear;
    }

    div.codepen:hover {
        background: #DCDCDC;
        box-shadow: 0 0 1em 0.1em rgba(0, 0, 0, 0.75);
        transform: scale(1.02);
        color: #000;
    }

    div.codepen p {
        color: #DCDCDC;
        line-height: 300px;
        text-align: center;
        font-size: 45px;
    }

    div.codepen p:hover {
        transition: color 0.8s linear;
        color: #000;
        text-decoration: none;
    }
    </style>
</head>

<body>
    <div id="home" class="d-flex align-items-center justify-content-center">
        <a href="logout"> <i class='bx bx-log-out bx-md'></i></a>
    </div>
    </div>
    <div class="container">
        <div class="row text-center content">
            <div class="col-md-6">
                <div id='galeria' class="codepen">
                    <p class='nombre'>Galeria</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="codepen">
                    <p class='nombre'>Nosotros</p>
                </div>
            </div>
        </div>
    </div>



</body>

<script>
    const btnGaleria = document.getElementById('galeria');
    btnGaleria.addEventListener('click', function(e){
        window.location = 'galeria'
    })
</script>

</html>