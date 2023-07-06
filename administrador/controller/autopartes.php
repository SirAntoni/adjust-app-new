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
$stock = '';
$opcion = '';


if(isset($_POST['id'])){
    $id = $_POST['id'];
}

if(isset($_POST['color'])){
    $color = $_POST['color'];
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

if(isset($_POST['categoria'])){
    $categoria = $_POST['categoria'];
}

if(isset($_POST['data'])){
    $data = json_decode($_POST['data'], true);
    $opcion = $data['opcion'];
    $categoria = $data['categoria'];
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
        $listar = json_encode($autopartes->listar_autopartes($categoria));
        echo '{"data":'.$listar.'}';
        break;
    case 'crear':
        if (empty($_FILES['cover']['name'])) {
            $nombre_img = "";
        } else {
            $nombre_img = $_FILES['cover']['name'];
        }
        $autopartes->crear_autoparte($uuid,$autoparte,$stock,$nombre_img,$categoria);
    break;
    case 'editar':

        if (empty($_FILES['cover']['name'])) {
            $nombre_img = $_POST['archivo'];
        } else {
            $nombre_img = $_FILES['cover']['name'];
        }

        $autopartes->editar_autoparte($id,$autoparte,$stock,$nombre_img,$color);

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

?>