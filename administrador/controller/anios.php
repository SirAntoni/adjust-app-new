<?php 
session_start();
require "../config/conexion.php";
require "../model/anio.php";

$anios = new Anios();

$id = '';
$anio = '';
$tipo = '';
$opcion = '';

if(isset($_POST['opcion'])){
    $opcion = $_POST['opcion'];
}

if(isset($_POST['id'])){
    $id = $_POST['id'];
}

if(isset($_POST['anio'])){
    $anio = $_POST['anio'];
}

if(isset($_POST['tipo'])){
    $tipo = $_POST['tipo'];
}


switch ($opcion){
    case 'listar_anios':
       $listar = json_encode($anios->listar_anios());
       echo $listar;
    break;
    case 'crear':
        $anios->crear_anio($anio,$tipo);
    break;
    case 'editar':
        $anios->editar_anio($id,$anio,$tipo);
    break;
    case 'eliminar':
        $anios->eliminar_anio($id);
    break;
    default:
        $listar = json_encode($anios->listar_anios());
        echo '{"data":'.$listar.'}';
    break;
}

?>