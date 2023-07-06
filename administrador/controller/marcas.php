<?php 
session_start();
require "../config/conexion.php";
require "../model/marca.php";

$marcas = new Marcas();

$id = '';
$marca = '';
$opcion = '';
$tipo = '';

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

switch ($opcion){
    case 'listar_marcas':
        $listar = json_encode($marcas->listar_marcas());
        echo $listar;
        break;
    case 'crear':
        $marcas->crear_marca($marca,$tipo);
    break;
    case 'editar':
        $marcas->editar_marca($id,$marca,$tipo);
    break;
    case 'eliminar':
        $marcas->eliminar_marca($id);
    break;
    default:
        $listar = json_encode($marcas->listar_marcas());
        echo '{"data":'.$listar.'}';
    break;
}

?>