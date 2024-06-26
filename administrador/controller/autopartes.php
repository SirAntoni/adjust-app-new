<?php 
session_start();
require "../config/conexion.php";
require "../model/autoparte.php";
require '../vendor/autoload.php';

use Ramsey\Uuid\Uuid;


$autopartes = new Autopartes();

$id = '';
$uuid = Uuid::uuid4()->toString();
$autoparte = '';
$categoria = '';
$color = '';
$tipo = '';
$stock = '';
$padre_id = '';
$opcion = '';
$descgeneral = '';
$detalles = '';


if(isset($_POST['id'])){
    $id = $_POST['id'];
}



if(isset($_POST['color'])){
    $color = $_POST['color'];
}


if(isset($_POST['descgeneralHtml'])){
    $descgeneral = $_POST['descgeneralHtml'];
}

if(isset($_POST['detallesHtml'])){
    $detalles= $_POST['detallesHtml'];
}



if(isset($_POST['uuid'])){
    $uuid = $_POST['uuid'];
}

if(isset($_POST['autoparte'])){
    $autoparte = $_POST['autoparte'];
}

if(isset($_POST['stock'])){
    $stock = $_POST['stock'];
}

if(isset($_POST['tipo'])){
    $tipo = $_POST['tipo'];
}

if(isset($_POST['categoria'])){
    $categoria = $_POST['categoria'];
}

if(isset($_POST['padre_id'])){
    $padre_id = $_POST['padre_id'];
}

if(isset($_POST['data'])){
    $data = json_decode($_POST['data'], true);
    $opcion = $data['opcion'];
    $categoria = $data['categoria'];
    $padre_id = $data['padre_id'];
}else{
    if(isset($_POST['opcion'])){
        $opcion = $_POST['opcion'];
    }
}

if(isset($_POST['opcion'])){
    $opcion = $_POST['opcion'];
}

switch ($opcion){
    case 'listar_autopartes':
        $listar = json_encode($autopartes->listar_autopartes($categoria,$padre_id));
        echo '{"data":'.$listar.'}';
        break;
    case 'crear':
        if (empty($_FILES['cover']['name'])) {
            $nombre_img = "";
        } else {
            $nombre_img = $_FILES['cover']['name'];
        }
        $autopartes->crear_autoparte($uuid,$autoparte,$stock,$nombre_img,$categoria,$padre_id);
    break;
    case 'editar':
        
        if (empty($_FILES['cover']['name'])) {
            $nombre_img = $_POST['archivo'];
        } else {
            $nombre_img = $_FILES['cover']['name'];
        }

        $autopartes->editar_autoparte($id,$autoparte,$stock,$nombre_img,$color,$tipo,$detalles,$descgeneral);

    break;
    case 'eliminar':
        $autopartes->eliminar_autoparte($id);
    break;
    case 'obtener_nombre_autoparte':
        $nombre = $autopartes->obtener_nombre_autoparte($uuid);
        echo $nombre['autoparte'];
    break;
    default:
        echo 'Error';
    break;
}
