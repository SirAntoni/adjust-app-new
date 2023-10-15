<?php 
session_start();
require "../config/conexion.php";
require "../model/auto.php";
require '../vendor/autoload.php';

use Ramsey\Uuid\Uuid;

$autos = new Autos();

$id = '';
$uuid = Uuid::uuid4()->toString();
$uuid_anios = Uuid::uuid4()->toString();
$nombre = '';
$marca = '';
$tipo = '';
$modelo = '';
$color = '';
$anio = '';
$negocio = '';
$opcion = '';

if(isset($_POST['uuid'])){
    $uuid = $_POST['uuid'];
}

if(isset($_POST['id'])){
    $id = $_POST['id'];
}

if(isset($_POST['nombre'])){
    $nombre = $_POST['nombre'];
}

if(isset($_POST['marca'])){
    $marca = $_POST['marca'];
}

if(isset($_POST['tipo'])){
    $tipo = $_POST['tipo'];
}

if(isset($_POST['modelo'])){
    $modelo = $_POST['modelo'];
}

if(isset($_POST['color'])){
    $color = $_POST['color'];
}

if(isset($_POST['anio'])){
    $anio = $_POST['anio'];
}

if(isset($_POST['negocio'])){
    $negocio = $_POST['negocio'];
}

if(isset($_POST['data'])){
    $data = json_decode($_POST['data'], true);
    $opcion = $data['opcion'];
    $negocio = $data['negocio'];
}else{
    if(isset($_POST['opcion'])){
        $opcion = $_POST['opcion'];
    }
}

$array_anios = '';
if(!empty($_POST['anios'])){
    $array_anios = $_POST['anios'];
    $array_anios = explode(" ",$array_anios);
}



switch ($opcion){
    case 'listar_autos':
        $listar = json_encode($autos->listar_autos($negocio));
        echo '{"data":'.$listar.'}';
        break;
    case 'crear':
        $autos->crear_auto($uuid,$nombre,$marca,$tipo,$modelo,$uuid_anios,$array_anios,$negocio);
    break;
    case 'editar':
        $autos->editar_auto($id,$uuid,$nombre,$marca,$tipo,$modelo,$uuid_anios,$array_anios,$color);
    break;
    case 'eliminar':
        $autos->eliminar_auto($id);
    break;
    case 'obtener_nombre_auto':
        $nombre = $autos->obtener_nombre_auto($uuid);
        echo $nombre['nombre'];
    break;
    case 'listar_anios':
        $anios = $autos->listar_anios($uuid);
        echo json_encode($anios);
    break;
    default:
        echo "ERROR";
    break;
}

?>