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
    <link rel="stylesheet" href="assets/css/galeria.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
    body {
        background: url(assets/images/bg/<?php echo $_SESSION['fondo_galeria'] ?>);
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
    </style>
</head>

<body>


    <div id="home" class="d-flex align-items-center justify-content-center">
        <a href="index"> <i class='bx bx-home-alt bx-md'></i></a>
    </div>

    <div class="container h-100 d-flex align-items-center justify-content-center">

        <div id="seleccion_modelo">
            <form id="form-buscar">
                <input type="hidden" name="opcion" value="buscar">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="marcas">Marca</label>
                            <select name="marca" id="marcas" class="form-control">
                                <option value="">Seleccione una opción</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="tipos">Tipo</label>
                            <select name="tipo" id="tipos" class="form-control">
                                <option value="">Seleccione una opción</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="modelos">Modelo</label>
                            <select name="modelo" id="modelos" class="form-control">
                                <option value="">Seleccione una marca</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="anios">Año</label>
                            <select name="anio" id="anios" class="form-control">
                                <option value="">Seleccione una opción</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12 text-center">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa-solid fa-magnifying-glass"></i> Buscar
                            </button>
                            <a href="index" class="btn btn-danger">
                                <i class="fa-solid fa-magnifying-glass"></i> Volver
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="modalBuscar" tabindex="-1" role="dialog" aria-labelledby="modalBuscar"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Resultados</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class='table table-bordered'>
                            <thead>
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Acción</th>
                                </tr>
                            </thead>
                            <tbody id="resultado">
                                
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>
</div>

    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"
        integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous">
    </script>
    <script src="assets/js/main.js"></script>
</body>

</html>