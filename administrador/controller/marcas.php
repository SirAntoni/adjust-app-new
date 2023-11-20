<?php 
session_start();
require "../config/conexion.php";
require "../model/marca.php";

$marcas = new Marcas();

$id = '';
$marca = '';
$opcion = '';
$tipo = '';
$usuario = '';
$negocio = '';

if(isset($_SESSION['id'])){
    $usuario = $_SESSION['id'];
}

if(isset($_SESSION['negocio'])){
    $negocio = $_SESSION['negocio'];
}

if(isset($_POST['opcion'])){
    $opcion = $_POST['opcion'];
}

if(isset($_POST['id'])){
    $id = $_POST['id'];
}

if(isset($_POST['marca'])){
    $marca = $_POST['marca'];
}

if(isset($_POST['tipo'])){
    $tipo = $_POST['tipo'];
}

if(empty($_POST['tipo']) && $_SESSION['id'] !== '1'){
    $tipo = 1;
}



switch ($opcion){
    case 'listar_marcas':
        $listar = json_encode($marcas->listar_marcas($usuario,$negocio));
        echo $listar;
        break;
    case 'crear':
        $marcas->crear_marca($marca,$tipo,$usuario,$negocio);
    break;
    case 'editar':
        $marcas->editar_marca($id,$marca,$tipo);
    break;
    case 'eliminar':
        $marcas->eliminar_marca($id);
    break;
    default:
        $listar = json_encode($marcas->listar_marcas($usuario,$negocio));
        echo '{"data":'.$listar.'}';
    break;
}

?>