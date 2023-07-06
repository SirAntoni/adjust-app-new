<?php 
session_start();

if(isset($_SESSION['id'])){
    header('Location:home');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Adjust App | HOME</title>
    <link href="https://fonts.googleapis.com/css?family=Asap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<body>

    <div id='loader' class="loader">
        <h1>ADJUST APP</h1>
    </div>

    <!-- partial:index.partial.html -->
    <form id='login' class="login">
        <input type="hidden" name="opcion" value="login">
        <input type="ruc" name='ruc' placeholder="RUC">
        <input type="password" name='contrasena' placeholder="Contraseña">
        <button id='entrar' type='submit'>Entrar</button>
    </form>

    <a href="#" target="_blank">Todos los derechos reservados | Adjust App 2023</a>
    <!-- partial -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="assets/js/main.js"></script>
    <script>
    setTimeout(function() {
        var loader = document.getElementById("loader");
        var login = document.getElementById("login");
        loader.classList.add("animate__animated");
        loader.classList.add("animate__lightSpeedOutLeft");
        login.style.display = 'block';
    }, 3000);
    </script>
</body>

</html>