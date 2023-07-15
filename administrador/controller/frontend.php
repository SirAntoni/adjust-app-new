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

if(isset($_SESSION['rango'])){
    $rango = $_SESSION['rango'];
}

if(isset($_SESSION['id'])){
    $negocio = $_SESSION['id'];
}

if(isset($_POST['marca'])){
    $marca = $_POST['marca'];
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
       $listar = json_encode($frontend->listar_marcas($rango));
       echo $listar;
    break;
    case 'listar_tipos':
        $listar = json_encode($frontend->listar_tipos($rango));
        echo $listar;
    break;
    case 'listar_modelos':
        $listar = json_encode($frontend->listar_modelos($marca,$tipo,$rango));
        echo $listar;
    break;
    case 'listar_anios':
        $listar = json_encode($frontend->listar_anios($rango));
        echo $listar;
    break;
    case 'buscar':
        $listar = json_encode($frontend->buscar($marca,$tipo,$modelo,$anio,$negocio));
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
    default:
        echo 'ERROR';
    break;
}

?>