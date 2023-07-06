<?php 
session_start();
require "../config/conexion.php";
require "../model/categoria.php";
require '../vendor/autoload.php';

use Ramsey\Uuid\Uuid;


$categorias = new Categorias();

$id = '';
$uuid = Uuid::uuid4()->toString();
$categoria = '';
$auto = '';
$opcion = '';


if(isset($_POST['id'])){
    $id = $_POST['id'];
}

if(isset($_POST['uuid'])){
    $uuid = $_POST['uuid'];
}

if(isset($_POST['categoria'])){
    $categoria = $_POST['categoria'];
}

if(isset($_POST['auto'])){
    $auto = $_POST['auto'];
}

if(isset($_POST['data'])){
    $data = json_decode($_POST['data'], true);
    $opcion = $data['opcion'];
    $auto = $data['auto'];
}else{
    if(isset($_POST['opcion'])){
        $opcion = $_POST['opcion'];
    }
}


if(isset($_POST['opcion'])){
    $opcion = $_POST['opcion'];
}

switch ($opcion){
    case 'listar_categorias':
        $listar = json_encode($categorias->listar_categorias($auto));
        echo '{"data":'.$listar.'}';
        break;
    case 'crear':
        if (empty($_FILES['cover']['name'])) {
            $nombre_img = "";
        } else {
            $nombre_img = $_FILES['cover']['name'];
        }
        
        $categorias->crear_categoria($uuid,$categoria,$nombre_img,$auto);
    break;
    case 'editar':
        if (empty($_FILES['cover']['name'])) {
            $nombre_img = $_POST['archivo'];
        } else {
            $nombre_img = $_FILES['cover']['name'];
        }
        $categorias->editar_categoria($id,$categoria,$nombre_img);
    break;
    case 'eliminar':
        $categorias->eliminar_categoria($id);
    break;
    case 'obtener_nombre_categoria':
        $nombre = $categorias->obtener_nombre_categoria($uuid);
        echo $nombre['categoria'];
        break;
    default:
        echo 'Error';
    break;
}

?>