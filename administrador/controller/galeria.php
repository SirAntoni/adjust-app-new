<?php 
session_start();
require "../config/conexion.php";
require "../model/galeria.php";


$galeria = new Galeria();

$id = '';
$filtro= '';
$titulo = '';
$descripcion = '';
$imagen = '';
$negocio = '';


if(isset($_POST['id'])){
    $id = $_POST['id'];
}

if(isset($_POST['negocio'])){
    $negocio = $_POST['negocio'];
}


if(isset($_POST['titulo'])){
    $titulo = $_POST['titulo'];
}

if(isset($_POST['filtro'])){
    $filtro = $_POST['filtro'];
}

if(isset($_POST['descripcion'])){
    $descripcion = $_POST['descripcion'];
}

if(isset($_POST['data'])){
    $data = json_decode($_POST['data'], true);
    $opcion = $data['opcion'];
    if(isset($data['auto'])) $auto = $data['auto'];
    if(isset($data['filtro'])) $filtro = $data['filtro'];
}else{
    if(isset($_POST['opcion'])){
        $opcion = $_POST['opcion'];
    }
}


if(isset($_POST['opcion'])){
    $opcion = $_POST['opcion'];
}

switch ($opcion){
    case 'cargar_galeria':
        $listar = json_encode($galeria->cargar_galeria($filtro));
        echo '{"data":'.$listar.'}';
        break;
    case 'crear_galeria':
        if (empty($_FILES['imagen']['name'])) {
            $imagen = "";
        } else {
            $imagen = $_FILES['imagen']['name'];
        }
        $galeria->crear_galeria($filtro,$titulo,$descripcion,$imagen,$negocio);
    break;
    case 'eliminar_galeria':
        $galeria->eliminar_galeria($id);
    break;
    default:
        echo 'Error';
    break;
}

?>