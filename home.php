<?php
session_start();

if(!isset($_SESSION['id'])){
    header('Location: ./');
}

if($_SESSION['tipo'] === 2){
    header('Location: web?negocio='.$_SESSION["razon_social"]);
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
        background: url(assets/images/bg/<?php echo $_SESSION['fondo_home'] ?>);
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

    .btnGaleria {
        width: 350px;
        height: 362px;
        background: url('./assets/images/btnGaleriaNew.png');
        background-repeat: no-repeat;
        background-size: 350px 350px;
        -webkit-transition: background-image 1s ease-out;
        -moz-transition: background-image 1s ease-out;
        -o-transition: background-image 1s ease-out;
        transition: background-image 1s ease-out;
    }

    .btnGaleria:hover {
        background: url('./assets/images/btnGaleriaNewHover.png');
        background-repeat: no-repeat;
        background-size: 350px 350px;
        cursor: pointer;
    }

    .btnNosotros {
        width: 350px;
        height: 362px;
        background: url('./assets/images/btnNosotrosNew.png');
        background-repeat: no-repeat;
        background-size: 350px 350px;
        -webkit-transition: background-image 1s ease-out;
        -moz-transition: background-image 1s ease-out;
        -o-transition: background-image 1s ease-out;
        transition: background-image 1s ease-out;
    }

    .btnNosotros:hover {
        background: url('./assets/images/btnNosotrosNewHover.png');
        background-repeat: no-repeat;
        background-size: 350px 350px;
        cursor: pointer;
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
            <div class="<?php echo ($_SESSION['rango'] == 3) ? 'col-md-12':'col-md-6'; ?> d-flex justify-content-center">
                <div id='galeria' class="btnGaleria">
                    
                </div>
            </div>
            <div class="<?php echo ($_SESSION['rango'] == 3) ? 'd-none':'col-md-6 d-flex justify-content-center'; ?> ">
                <div id='nosotros' class="btnNosotros">
                </div>
            </div>
        </div>
    </div>



</body>

<script>

const btnGaleria = document.getElementById('galeria');
const btnNosotros = document.getElementById('nosotros');
btnGaleria.addEventListener('click', function(e) {
    window.location = 'galeria'
})

btnNosotros.addEventListener('click', function(e) {
    window.location = 'web?negocio=<?php echo $_SESSION['razon_social']; ?>'
})

</script>

</html>