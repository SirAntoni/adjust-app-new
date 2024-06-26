<?php 
session_start();
require "../config/conexion.php";
require "../model/frontend.php";

$frontend = new Frontend();

$rol = '';
$marca = '';
$modelo = '';
$tipo = '';
$anio = '';
$auto = '';
$color = '';
$categoria = '';
$autoparte = '';
$opcion = '';
$negocio = '';
$filtro = '';
$padre_id = '';

if(isset($_SESSION['id'])){
    $negocio = $_SESSION['id'];
}


if(isset($_POST['marca'])){
    $marca = $_POST['marca'];
}

if(isset($_POST['padre_id'])){
    $padre_id = $_POST['padre_id'];
}



if(isset($_POST['filtro'])){
    $filtro = $_POST['filtro'];
}

if(isset($_POST['negocio'])){
    $negocio = $_POST['negocio'];
}

if(isset($_POST['autoparte'])){
    $autoparte = $_POST['autoparte'];
}

if(isset($_POST['categoria'])){
    $categoria = $_POST['categoria'];
}

if(isset($_POST['color'])){
    $color = $_POST['color'];
}

if(isset($_POST['tipo'])){
    $tipo = $_POST['tipo'];
}

if(isset($_POST['modelo'])){
    $modelo = $_POST['modelo'];
}

if(isset($_POST['anio'])){
    $anio = $_POST['anio'];
}

if(isset($_POST['auto'])){
    $auto = $_POST['auto'];
}

if(isset($_POST['opcion'])){
    $opcion = $_POST['opcion'];
}

switch ($opcion){
    case 'listar_marcas':
       $listar = json_encode($frontend->listar_marcas($negocio));
       echo $listar;
    break;
    case 'cargar_web':
        $listar = json_encode($frontend->cargar_web($negocio));
        echo $listar;
     break;
     case 'cargar_filtros':
        $listar = json_encode($frontend->cargar_filtros($negocio));
        echo $listar;
     break;
     case 'cargar_ultimo_registro':
        $listar = json_encode($frontend->cargar_ultimo_registro($negocio));
        echo $listar;
     break;
     case 'cargar_imagenes':
        $listar = json_encode($frontend->cargar_imagenes($negocio));
        echo $listar;
     break;
     case 'cargar_redes':
        $listar = json_encode($frontend->cargar_redes($negocio));
        echo $listar;
     break;
    case 'listar_tipos':
        $listar = json_encode($frontend->listar_tipos($negocio));
        echo $listar;
    break;
    case 'listar_modelos':
        $listar = json_encode($frontend->listar_modelos($marca,$tipo));
        echo $listar;
    break;
    case 'listar_anios':
        $listar = json_encode($frontend->listar_anios($marca,$modelo,$negocio));
        echo $listar;
    break;
    case 'buscar':
        $listar = json_encode($frontend->buscar($anio));
        echo $listar;
    break;
    case 'obtener_auto':
        $listar = json_encode($frontend->obtener_auto($auto));
        echo $listar;
    break;
    case 'mostrar_autoparte':
        $listar = json_encode($frontend->mostrar_autoparte($autoparte));
        echo $listar;
    break;
    case 'obtener_auto_color':
        $listar = json_encode($frontend->obtener_auto_color($color));
        echo $listar;
    break;
    case 'obtener_autopartes':
        $listar = json_encode($frontend->obtener_autopartes($categoria));
        echo $listar;
break;
        case 'obtener_subautopartes':
            $listar = json_encode($frontend->obtener_subautopartes($padre_id));
            echo $listar;
    break;
    case 'obtener_negocio':
        $obtener = json_encode($frontend->obtener_negocio($negocio));
        echo $obtener;
    break;
    case 'obtener_fondo':
        $obtener = json_encode($frontend->obtener_fondo($negocio));
        echo $obtener;
    break;
    default:
        echo 'ERROR';
    break;
}

?>