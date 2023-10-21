<?php 
session_start();
require "../config/conexion.php";
require "../model/web.php";

$web = new Web();

$negocio = '';
$opcion = '';
$direccion = '';
$email = '';
$telefono = '';
$slogan = '';
$nosotros = '';
$mision = '';
$vision = '';
$filtro = '';
$id = '';

if(isset($_POST['opcion'])){
    $opcion = $_POST['opcion'];
}

if(isset($_POST['id'])){
    $id = $_POST['id'];
}

if(isset($_POST['filtro'])){
    $filtro = $_POST['filtro'];
}

if(isset($_POST['direccion'])){
    $direccion = $_POST['direccion'];
}

if(isset($_POST['slogan'])){
    $slogan = $_POST['slogan'];
}

if(isset($_POST['nosotros'])){
    $nosotros = $_POST['nosotros'];
}

if(isset($_POST['mision'])){
    $mision = $_POST['mision'];
}

if(isset($_POST['vision'])){
    $vision = $_POST['vision'];
}

if(isset($_POST['email'])){
    $email = $_POST['email'];
}

if(isset($_POST['telefono'])){
    $telefono = $_POST['telefono'];
}

if(isset($_POST['negocio'])){
    $negocio = $_POST['negocio'];
}


switch ($opcion){
    case 'guardar_datos_generales':
        $web->guardar_datos_generales($negocio,$direccion,$telefono,$email);
    break;
    case 'guardar_logo':
        if (empty($_FILES['logo']['name'])) {
            $logo = $_POST['archivoLogo'];
        } else {
            $logo = $_FILES['logo']['name'];
        }
        $web->guardar_logo($negocio,$logo);
    break;
    case 'guardar_nosotrosImg':
        if (empty($_FILES['nosotrosImg']['name'])) {
            $nosotrosImg = $_POST['archivoNosotros'];
        } else {
            $nosotrosImg = $_FILES['nosotrosImg']['name'];
        }
        $web->guardar_nosotrosImg($negocio,$nosotrosImg);
    break;
    case 'guardar_misionImg':
        if (empty($_FILES['misionImg']['name'])) {
            $misionImg = $_POST['archivoMision'];
        } else {
            $misionImg = $_FILES['misionImg']['name'];
        }
        $web->guardar_misionImg($negocio,$misionImg);
    break;
    case 'guardar_visionImg':
        if (empty($_FILES['visionImg']['name'])) {
            $visionImg = $_POST['archivoVision'];
        } else {
            $visionImg = $_FILES['visionImg']['name'];
        }
        $web->guardar_visionImg($negocio,$visionImg);
    break;
    case 'guardar_slogan':
        $web->guardar_slogan($negocio,$slogan);
    break;
    case 'guardar_nosotros':
        $web->guardar_nosotros($negocio,$nosotros);
    break;
    case 'guardar_mision':
        $web->guardar_mision($negocio,$mision);
    break;
    case 'guardar_vision':
        $web->guardar_vision($negocio,$vision);
    break;
    case 'cargar_filtros':
        echo json_encode($web->cargar_filtros($negocio));
    break;
    case 'crear_filtro':
        $web->crear_filtro($negocio,$filtro);
    break;
    case 'editar_filtro':
        $web->editar_filtro($id,$filtro);
    break;
    case 'eliminar_filtro':
        $web->eliminar_filtro($id);
    break;
    case 'obtener_filtro':
        echo json_encode($web->obtener_filtro($id));
    break;
    default:
        $cargar = json_encode($web->cargar_web($negocio));
        echo $cargar;
    break;
}

?>