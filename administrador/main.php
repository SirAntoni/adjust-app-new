<?php

ob_start();
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location:login');
}

if (!isset($_GET['module'])) {
    header('Location:main?module=dashboard');
}

if($_GET['module'] == 'dashboard' && $_SESSION['id'] !== "1") {
    header('Location:main?module=negocios');
}

require "config/conexion.php";

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DASHBOARD | ADJUST APP <?php echo date("Y"); ?></title>
    <!-- core:css -->
    <link rel="stylesheet" href="assets/vendors/core/core.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <!-- end plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="assets/vendors/jquery-tags-input/jquery.tagsinput.min.css">
    <link rel="stylesheet" href="assets/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="assets/fonts/feather-font/css/iconfont.css">
    <link rel="stylesheet" href="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />
    <script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/estilos/style.css">
    <link rel="stylesheet" href="assets/css/estilos/custom.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

</head>

<body>
    <div class="main-wrapper">

        <!-- partial:partials/_navbar.html -->
        <div class="horizontal-menu">
            <?php include "include/header.php"; ?>
            <?php include "include/navbar.php"; ?>
        </div>
        <!-- partial -->

        <div class="page-wrapper">

            <div class="page-content">


                <?php

                if (isset($_GET['module'])) {
                    $module = $_GET['module'];
                } else {
                    $module = '';
                }

                switch ($module) {
                    case 'dashboard':
                        require_once "views/dashboard.php";
                        break;

                    case 'marcas':
                        require_once "views/marcas.php";
                        break;

                    case 'tipos':
                        require_once "views/tipos.php";
                        break;

                    case 'modelos':
                        require_once "views/modelos.php";
                        break;

                    case 'anios':
                        require_once "views/anios.php";
                        break;

                    case 'negocios':
                        require_once "views/negocios.php";
                        break;

                    case 'autos':
                        require_once "views/autos.php";
                        break;
                    
                    case 'configurar-auto':
                        require_once "views/configurar-auto.php";
                        break;
                    
                    case 'configurar-color':
                        require_once "views/configurar-color.php";
                        break;

                    case 'configurar-color-autoparte':
                        require_once "views/configurar-color-autoparte.php";
                        break;

                    case 'autopartes':
                        require_once "views/autopartes.php";
                        break;

                    case 'web':
                        require_once "views/web.php";
                        break;

                    case 'galeria':
                        require_once "views/galeria.php";
                        break;

                    case 'usuarios':
                        require_once "views/usuarios.php";
                        break;

                    default:
                        require_once "views/dashboard.php";
                        break;
                }

                ?>

            </div>

            <?php include "include/footer.php"; ?>

        </div>
    </div>

    <!-- core:js -->
    <script src="assets/vendors/core/core.js"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <script src="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="assets/vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="assets/vendors/jquery-tags-input/jquery.tagsinput.min.js"></script>
    <script src="assets/vendors/moment/moment.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="assets/vendors/select2/select2.min.js"></script>
    <!-- end plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/vendors/feather-icons/feather.min.js"></script>
    <script src="assets/js/template.js"></script>
    <!-- endinject -->
    <!-- custom js for this page -->
    <script src="assets/js/notiflix.js"></script>
    <script src="assets/js/datepicker.js"></script>
    <script src="assets/js/select2.js"></script>
    <script src="assets/js/file-upload.js"></script>
    <script src="assets/js/tags-input.js"></script>
    <script src="app/app.js"></script>
    <script>
    </script>
</body>

</html>